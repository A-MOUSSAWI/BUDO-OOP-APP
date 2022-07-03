<?php

require_once 'parent.class.php';

class Admin extends ParentClass
{

	public $id;
	static public $table_name = 'admins';
	static public $class_name = 'Admin';
	static public $db_columns = ['id', 'firstname', 'lastname', 'email', 'hashed_password'];
	public $firstname;
	public $lastname;
	public $email;
	public $password;
	public $hashed_password;


	public function __construct($args = [])
	{
		if (!empty($args)) {
			$this->firstname = $args['firstname'];
			$this->lastname = $args['lastname'];
			$this->email = $args['email'];

			$this->hashed_password = password_hash($args['password'], PASSWORD_BCRYPT);
		}
	}


	public function create()
	{
		return parent::create();
	}

	public function verify_password($password)
	{
		return password_verify($password, $this->hashed_password);
	}
}
