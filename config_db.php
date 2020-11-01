<?php

function init_db()
{
    try {
        $host = 'localhost';
        $port = 5432;
        $dbname = 'test';
        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
        $username = 'postgres';
        $passwd = 'q0735516';
        return new PDO($dsn, $username, $passwd);
        //$db_connection =
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br />";
    }


    /*
    try {
        $sql = 'Select * FROM pg_database';
        echo '<pre>';

        foreach ($dbconn->query($sql) as $row) {
            print_r($row);
        }
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br />";
    }

    */

    /*
    $db = new PDO("mysql:host=localhost;dbname=someproj", "root", "");

    if (!$db)
    {
        echo "Ошибка создания бд";
    }
    return $db;
    */
}

?>