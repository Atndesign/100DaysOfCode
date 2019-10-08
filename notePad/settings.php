<?php 
     try{
        $dbhost = 'localhost';
        $dbname='notepad';
        $dbuser = 'root';
        $dbpass = '';
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
      }
      catch (PDOException $e){
        echo "Error!: " . $e->getMessage() . "<br/>";
        die();
      }
?>