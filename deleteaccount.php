<?php
#setcookie("name",$_POST['name'],time()+60);
session_start();

if ($_SESSION['authuser'] != 1) {
    echo " Access not granted ";
    exit();
}

?>
<html>

<head>
    <title>
        Delete Account
    </title>
</head>

<body>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blogdb";
    #echo "Movie Review of ".ucfirst($_POST['name'])."<br><br>";

    $dsn = "mysql:host=" . $servername . ";dbname=" . $dbname;
    $pdo = new PDO($dsn, $username, $password);
    if (isset($_GET["type"]) && $_GET['type'] == 1) {

        $id = $_GET['id'];

        $sql = "
    DELETE FROM users WHERE uid=:id ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        echo "<script>
       alert('Account Deleted');
           window.location.href='admindashboard.php';
           </script>";
    }
    else {

        $id = $_GET['id'];

        $sql = "
    DELETE FROM users WHERE uid=:id ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

            echo "<script>
            alert('Account Deleted');
            window.location.href='index.php';
            </script>";
    }
    
    ?>