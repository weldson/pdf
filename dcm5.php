<?php
    $db = 'sqlite:diagnosticos.db';
    $conn = new PDO($db);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare('INSERT INTO dcmV(cod, transtorno)
        VALUES(:cod, :transtorno)');
    
    $stmt->bindParam(':cod', $cod);
    $stmt->bindParam(':transtorno', $doenca);
    $file = fopen("dsm.txt", "r");
    while(!feof($file)){
        $line = fgets($file);
        $pos = strpos($line, ' ');
        $doenca = substr($line, $pos);
        $cod = strtok($line, ' ');
        $stmt->execute();
    }
    fclose($file);
    echo "sucesso";

    // $conn = new PDO("mysql:host=$server;dbname=dsm", $user, $password);
    //     $conn->exec("SET CHARACTER SET utf8");
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //     $stmt = $conn->prepare('INSERT INTO diagnosticos (cid10, transtorno)
    //         VALUES (:cid10, :transtorno)');
    //     $stmt->bindParam(':cid10', $cod);
    //     $stmt->bindParam(':transtorno', $doenca);
    //     $file = fopen("dsm.txt", "r");
    //     while(! feof($file)){
    //         $line = fgets($file);
    //         $pos = strpos($line, ' ');
    //         $doenca = substr($line, $pos);
    //         $cod = strtok($line, ' ');

    //         $stmt->execute();
    //         // echo $cod."<br/>";
    //     }
    //     fclose($file);
    //     echo "sucesso";

    //     $conn = null;