<?php
function connect_db()
{
    try
    {
        $connection = new PDO('mysql:host=localhost;dbname=SeminaryRegist;charset=utf8', 'root', '');
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e)
    {
        // Proccess error
        echo 'Cannot connect to database: ' . $e->getMessage();
    }

    return $connection;
}

$conn=connect_db();
 ?>
