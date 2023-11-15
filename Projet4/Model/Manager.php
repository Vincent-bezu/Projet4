<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=vincentprojet4;port=3308;charset=utf8', 'root', '');
        return $db;
    }
}