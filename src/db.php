<?php

namespace database;

class dbFunctions
{
    public static function db($query)
    {
        $host = 'docker-mysql-1:3306';
        $user = 'root';
        $pwsd = '123456';
        $db = 'doczilla';
        $connection = mysqli_connect($host, $user, $pwsd, $db);
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    }
}
