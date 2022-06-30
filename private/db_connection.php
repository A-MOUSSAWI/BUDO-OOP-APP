<?php



function db_conn()
{
    $host = 'localhost';
    $dbname = 'gym_oop';
    $user = 'root';
    $password = '';

    $conn = "mysql:host=$host;dbname=$dbname;charset=UTF8";
    $conn = new PDO($conn, $user, $password);
    return $conn;
   
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (!$conn) {
            echo "CONNECTION FAILED...........";
        }
    } catch (PDOexception $excep_error) {
        echo $excep_error->getMessage();
    }
}

