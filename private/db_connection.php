<?php

function db_conn()
{
    $host = 'localhost';
    $dbname = 'gym_oop';
    $user = 'root';
    $password = '';

    $connectionString = "mysql:host=$host;dbname=$dbname;charset=UTF8";
    $connection = new PDO($connectionString, $user, $password);

    return $connection;
}
