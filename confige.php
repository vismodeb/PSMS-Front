<?php

    $servername = "localhost";
    $db_name = "PSMS";
    $username = "root";
    $password = "";

    date_default_timezone_set("Asia/Dhaka");
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    // count any colume value from students table 
    function stRowCount($col,$val){
        global $pdo;
        $stm=$pdo->prepare('SELECT $col PROM students WHERE $col=?');
        $stm->execute(array($val));
        $count = $stm->rowCount();
        return $count;
    }

?>