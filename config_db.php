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
}