<?php

class ParentClass
{
	static public $table_name = '';
	static public $class_name = '';
	static public $db_columns = [];
	static public $db;

	static public function set_database($database)
	{
		self::$db = $database;
	}

	static public function find_all()
	{
		$sql = 'SELECT * FROM ' . static::$table_name;
		$statement = self::$db->query($sql);
		$row = $statement->fetchAll(PDO::FETCH_CLASS, static::$class_name);
		return $row;
	}

	static public function find_by_id($id)
	{
		$sql = 'SELECT * FROM ' . static::$table_name . ' WHERE id = ' . $id;
		$statement = self::$db->query($sql);
		$row = $statement->fetchObject(static::$class_name);
		return $row;
	}

	static public function check_email_exists($email)
	{
		$sql = "SELECT 1 FROM " . static::$table_name . " WHERE email = '$email' LIMIT 1";

		$statement = self::$db->query($sql);

		return $statement->rowCount() > 0;
	}

	static public function delete($id)
	{
		$sql = 'DELETE FROM ' . static::$table_name . ' WHERE id = ' . $id;
		$statement = self::$db->query($sql);
		$row = $statement->fetchObject(static::$class_name);
		return $row;
	}

	public function attributes()
	{
		$attributes = [];
		foreach (static::$db_columns as $column) {
			if ($column == 'id') {
				continue;
			}
			$attributes[$column] = $this->$column;
		}
		return $attributes;
	}

	public function create()
	{
		$sql = "INSERT INTO " . static::$table_name . " (";
		$sql .= join(', ', array_keys($this->attributes()));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($this->attributes()));
		$sql .= "')";
		$result = self::$db->query($sql);
		return $result;
	}

	public function update($id)
	{
		$attribute_pairs = [];
		foreach ($this->attributes() as $key => $value) {
			if ($key == 'hashed_password') {
				continue;
			}
			$attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE " . static::$table_name . " SET ";
		$sql .= join(', ', $attribute_pairs);
		$sql .= " WHERE id= " . $id;
		$sql .= " LIMIT 1";
		$result = self::$db->query($sql);
		return $result;
	}

	public static function find_email($email)
	{
		$sql = "SELECT * FROM " . static::$table_name . " WHERE email = '$email' LIMIT 1";
		$statement = self::$db->query($sql);
		return $statement->fetchObject(static::$class_name);
	}
}
