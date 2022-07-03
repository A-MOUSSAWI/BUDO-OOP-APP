<?php

require_once 'parent.class.php';

class Player extends ParentClass
{
	public $id;
	static public $table_name = 'players';
	static public $class_name = 'Player';
	static public $db_columns = ['id', 'firstname', 'lastname', 'email', 'hashed_password'];
	public $firstname;
	public $lastname;
	public $email;
	public $game;
	public $password;
	public $hashed_password;
	public $date_of_registration;


	public function __construct($args = [])
	{
		if (!empty($args)) {
			$this->firstname = $args['firstname'];
			$this->lastname = $args['lastname'];
			$this->email = $args['email'];
			$this->game = $args['game'];

			$this->hashed_password = password_hash($args['password'] ?? "", PASSWORD_BCRYPT);
		}
	}

	public function create()
	{
		Parent::create();

		$last_id = self::$db->lastInsertId();
		foreach ($this->game as $game_id) {
			$sql = "INSERT INTO registration (game_id, player_id) VALUES ('$game_id','$last_id')";
			$sql = self::$db->query($sql);
		}
	}

	public function verify_password($password)
	{
		return password_verify($password, $this->hashed_password);
	}

	static public function find_games($id)
	{
		$sql = "SELECT games.game_name, registration.date_of_registration
		FROM registration
		INNER JOIN games ON registration.game_id=games.id
		INNER JOIN players ON registration.player_id =players.id where players.id='$id'";
		$statement = self::$db->query($sql);
		return  $statement->fetchAll(PDO::FETCH_CLASS);
		
	}
}
