<?php
/*
 *      users
 * |user_id|user_name|
 *
 *      contacts
 * |phone_id|user_id|phone_number|
 *
 *      DB -- PostgreSQL
 */

function init_db()
{
    try {
        $host = '';
        $port = 5432; // Standard PgSQL port
        $dbname = '';
        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
        $username = ''; // std -- postgres
        $passwd = '';
        return new PDO($dsn, $username, $passwd);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br />";
    }
}