<?php
    $server = "localhost";
    $user = "root";
    $password = "123456";

    try{
        $conn = new PDO("mysql:host=$server;dbname=dianosticos.db", $user, $password);
        $conn->exec("SET CHARACTER SET utf8");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare('INSERT INTO dcmV (cod, transtorno)
            VALUES (:cod, :transtorno)');
        $stmt->bindParam(':cod', $cod);
        $stmt->bindParam(':transtorno', $doenca);
        $file = fopen("dsm.txt", "r");
        while(! feof($file)){
            $line = fgets($file);
            $pos = strpos($line, ' ');
            $doenca = substr($line, $pos);
            $cod = strtok($line, ' ');

            $stmt->execute();
            // echo $cod."<br/>";
        }
        fclose($file);
        echo "sucesso";

        $conn = null;
    }
    catch(PDOException $e){
        echo "Falha: ".$e->getMessage();
    }
    // for( $i = 1; $i <= 20; $i++){
    //     $file = fopen($i.".txt", "r");
    //     while(! feof($file)){
    //         $line = fgets($file);
    //         // $pos = strpos($line, ' ');
    //         // $doenca = substr($line, $pos);
    //         $cod = strtok($line, ' ');
    //         echo $cod."<br/>";
    //     }
    //     fclose($file);
    // }
    