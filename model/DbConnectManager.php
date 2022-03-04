<?php
// namespace wood4s\blog\db;

class DbConnectManager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        return $db;
    }
}