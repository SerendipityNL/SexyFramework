<?php
class Base_Model {

	// Initiate some variables
	public $insert_id = null;
	public $errors = array();
	protected $_data = null;
	
	// Database (table) variables
	private $_db_link;
	private $_table = null;
	
	// Query variables
	private $_select = '*';
	private $_where = null;
	private $_order = null;
	private $_limit = null;

	// Magic setter function
	public function __set($name, $value) {
		$this->_data[$name] = $value;
	}

	// Magic getter function
	public function __get($name) {
		return $this->_data[$name];
	}

	// Initialize this class
	public function initialize($id) {

		// Create the database connection
		$this->_db_link = load::database();
		
		if (isset($this->_set_table)) {
			$this->_table = $this->_set_table;
		}
		else {
			// Set the table name
			$this->_table = p(strtolower(get_class($this)));
		}

		if (is_numeric($id)) {
			$this->set($this->find($id));
		}

	}

	public function set($data) {
		// Check if any data has been passed
		if( ! empty($data)) {

			// Typecast the data to an array
			$data = (array) $data;

			// Check if it's an array
			if (is_array($data)) {

				// Loop through the array
				foreach($data as $name => $value) {

					// Set the variables
					$this->$name = $value;
				}
			}
		}
		
	}

	public function insert($data) {

		// Check if the data validates
		if($this->validate($data)) {
			// Set the timestamps
			$data['created_at'] = date('Y-m-d H:i:s');
			$data['updated_at'] = date('Y-m-d H:i:s');

			// Build the insert query
			$sql = "INSERT INTO ".$this->_table." SET ".$this->sanitize_values($data);

			// Execute the query
			$this->exec_query($sql);

			// Set the insert_id
			$this->insert_id = $this->_db_link->insert_id;

			// The data validates, return true
			return true;
		}
		else {
			// The data doesn't validates, return false
			return false;
		}
		
	}

	public function update($data, $fields, $values = null) {
		// Check if the data validates
		if ($this->validate($data)) {
			if (is_numeric($fields)) {
				$this->where('id = ?', $fields);
			}
			else {
				$this->where($fields, $values);
			}
			// Set the timestamps
			$data['updated_at'] = date('Y-m-d H:i:s');

			// Build the update query
			$sql = "UPDATE ".$this->_table." SET ".$this->sanitize_values($data)." WHERE ".$this->_where;

			// Execute the query
			$this->exec_query($sql);

			// The data validates, return true
			return true;
		}
		else {
			// The data doesn't validates, return false
			return false;
		}
	}

	public function delete($fields = null, $values = null) {
		// If the first value passed is an integer, this is the id of the field that needs to be removed
		if (is_numeric($fields)) {
			$this->where('id = ?', $fields);
		}
		// If not, this is an other type of variable and it is treated as the value for the SQL WHERE
		else {
			$this->where($fields, $values);
		}
		
		// Build the SQL
		$sql = 'DELETE FROM '.$this->_table.' WHERE '.$this->_where;
		
		// Execute the SQL
		$this->exec_query($sql);
	}

	/*
	* ->find()			= get all rows
	* ->find(1)			= get row by id
	*/
	public function find($id = null) {
		// Check if an number has been passed
		if (is_numeric($id)) {

			// A number has been passed, find the row with the corrosponding id
			$this->where('id = ?', $id);

			// Limit to one result
			$this->limit(1);
		}

		// Begin building the query
		$sql = "SELECT ".$this->_select." FROM ".$this->_table;
		
		// Append the where data to the query if it isn't empty
		if ( ! empty($this->_where)) {
			$sql .= ' WHERE '.$this->_where;
		}

		// Append the order by data to the query if it isn't empty
		if ( ! empty($this->_order)) {
			$sql .= ' ORDER BY '.$this->_order;
		}

		// Set the result limit
		if ( ! empty($this->_limit)) {
			$sql .= ' LIMIT '.$this->_limit;
		}

		// If the argument 'one' is passed, return just the first row
		if ($id == 'one' OR is_numeric($id)) {
			return $this->fetch_row($sql);
		}
		else {
			// Return multiple rows
			return $this->fetch_rows($sql);
		}
	}

	public function fetch_row($sql) {
		return $this->fetch('single_row', $sql);
	}

	public function fetch_rows($sql) {
		return $this->fetch('multiple_rows', $sql);
	}

	public function select($fields = '*') {
		// Set the select fields
		$this->_select = $fields;

		// Return $this, needed for method chaining
		return $this;
	}

	public function where($fields, $values) {

		// Get data around the question mark
		$field = explode('?', $fields);

		// Strip all data after the last question mark
		$field = array_slice($field, 0, -1);

		// Check if $values is an array
		if (is_array($values)) {

			// Check if the number of $values matches the number of $fields
			if (count($values) == count($field)) {

				// Loop through the fields
				for ($i = 0; $i < count($field); $i++) {

					// Escape the value
					$value = $this->escape($values[$i]);

					// Check if the value is an integer, if it's not, wrap in value in ''
					$value = (is_numeric($value)) ? $value : "'".$value."'";

					// Append the where clause to the class where variable
					$this->_where .= $field[$i].$value;
				}
			}
			else {
				// Stop the script showing an error message
				die('Error: The number of fields don\'t match the number of values in the WHERE clause.');
			}
			
		}
		else {
			// Loop through the fields
			for($i = 0; $i < count($field); $i++) {

				// Escape the value
				$value = $this->escape($values);

				// Check if the value is an integer, if it's not, wrap in value in ''
				$value = (is_numeric($value)) ? $value : "'".$value."'";

				// Append the where clause to the class where variable
				$this->_where .= $field[$i].$value;
			}
		}

		// Return $this, needed for method chaining
		return $this;
	}
	
	public function sort($field) {
		// Set the order and escape the field
		$this->_order = $this->escape($field);

		// Return $this, needed for method chaining
		return $this;
	}

	public function join($join_with, $join_on) {
		/*
		$local_key = klant_id
		$foreign_key = klanten.id
		
		LEFT JOIN klanten ON users.klant_id = klanten.id

		$category->join('users','category.user_id = user.id')
		*/

	}

	public function limit($start, $offset = null) {
		
		// Set the first number of the SQL LIMIT
		$this->_limit = $start;
		
		// If available, set the second number of the SQL LIMIT
		if ( ! empty($offset)) {
			$this->_limit .= ', '.$offset;
		}
		// Return $this, needed for method chaining
		return $this;

	}

	/*
	* if ($rule == ''){
	* 	 validate::($field)
	* }
	*/
	public function validate($data) {

		// Check if there are validation rules
		if ( ! empty($this->_validation_rules)) {
				
			// Strip the array
			foreach ($this->_validation_rules as $field => $ruleslist) {

				foreach ($ruleslist as $rules) {
					
					foreach ($rules as $rule => $msg){
						// Set the data that needs to be passed on to the validate function
						$input = $data[$field];
						
						// Check wether the rule has a value, i.e. min_length:3
						if (strstr($rule, ':')){
							
							// Split the value of the name of the rule
							list($new_rule, $rule_value) = explode(':', $rule);
							
							// Fill an array with the value that the validation returns
							if ( ! validate::$new_rule($input, $field, $rule_value)){
								$this->errors[] = ut($msg);
							}
							
							
						}
						else {
							// Fill an array with the value that the validation returns
							if ( ! validate::$rule($input, $field)){
								$this->errors[] = ut($msg);
							}
						}
					}
					
				}

			}
			if( ! empty($this->errors)){
				return false;
			}
			else {
				return true;
			}
			
		}
		else {
			// When there is nothing to validate, continue
			return true;
		}
		
	}

	private function fetch($num, $sql) {
		// Execute the sql query
		$query = $this->exec_query($sql);

		// Check if it returns any rows
		if ($query->num_rows) {

			if ($num == 'single_row') {
				// Return a single row
				$rdata = $query->fetch_assoc();
			}
			else {
				// Loop through the results and build a new array
				while($row = $query->fetch_assoc()) {
					$rdata[] = $row;
				}
			}	
			// Return the results
			return $rdata;
		}
		else {
			// No results found, return null
			return null;
		}
	}

	private function exec_query($sql) {

		// If debugging is 1, show the sql query to execute
		if (DEBUG_MODE == 1) {
			echo $sql.'<br />';
		}

		// Execute the query
		$results = $this->_db_link->query($sql);

		// Reset the class variables
		$this->reset();

		// Return the results
		return $results;
	}
	
	// Reset all the variables so the values won't be passed to the next query
	private function reset() {
		$this->_select = '*';
		$this->_where = null;
		$this->_order = null;
		$this->_limit = null;
	}

	private function sanitize_values($data) {
		
		// Check whether $data is an array or an object
		if (is_array($data) OR is_object($data)) {
		
			// Loop through the data
			foreach ($data as $field => $value) {

				// Escape the value
				$value = $this->escape($value);

				// Check if the value is an integer, if it's not, wrap in value in ''
				//$value = (is_numeric($value)) ? $value : "'".$value."'";
				$value = "'".$value."'";

				// Build the array
				$rdata[] = $field." = ".$value;
			}
			// Combine the data and separate the values with a comma
			$rdata = implode(', ', $rdata);
		}
		else {
			$rdata = null;
		}

		// Return the data
		return $rdata;

	}
	
	private function escape($string) {
		// Remove excessive spaces
		$string = trim($string);

		// Strip HTML tags
		$string = strip_tags($string); 

		// Escape the string
		$string = $this->_db_link->real_escape_string($string);

		// Return a clean and sanitized string
		return $string;
	}

}
?>