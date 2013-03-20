<?php
class load {

	private static $database;

	public static function database() {
		if ( ! self::$database) {
			self::$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

			// Select the right database
			if ( ! self::$database->select_db(DB_NAME)) {
				die('Could not select the database!');
			}
		}
		return self::$database;
	}

	public static function model($name, $id = null) {
		// Set the model name (uppercase first, and singuralize the model name)
		$model_name = ucfirst($name).'_Model';

		// Set the path to the model
		$model_path = 'application/models/'.strtolower($model_name).'.php';

		// Check if the model file exists
		if (file_exists($model_path)) {

			// Include the base model
			include_once 'core/base_model.php';

			// Include the file
			require_once $model_path;


			// Check if the model class exists
			if (class_exists($model_name)) {

				// Create a new model instance
				$model = new $model_name();

				// Call the initialize function
				$model->initialize($id);

				// Return the model
				return $model;
			}
			else {
				return null;
			}
		}
		else {
			return null;
		}
	}

	public static function view($template = null) {
		// Include the base view
		include_once 'core/base_view.php';

		// Return a new view object
		return new Base_View($template);
	}

}
?>