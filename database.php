<?php
$username = "books";
$password = "BOOKshop2019";
$root = "127.0.0.1";

function connecter($root, $username, $password)
{
    $connect = mysqli_connect($root, $username, $password);
    if ($connect->connect_error) {
        echo "error : " . connect_error;
    } else
        echo "connected successfuly";

    return $connect;
}

function deconnecter($con)
{
    $discon = mysqli_close($con);
    if (!$discon) {
        echo "error";
    } else
        echo "disconnected successfuly";
}

function create_DB($name)
{
    global $root, $username, $password;
    $sql = "CREATE DATABASE IF NOT EXISTS " . $name;
    if (mysqli_query(connecter($root, $username, $password), $sql)) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . mysqli_error(connecter($root, $username, $password));
    }
}

function create_Table($name, $bd, array $colums)
{
    global $root, $username, $password;
    $result = mysqli_query(connecter($root, $username, $password), "SHOW TABLES LIKE '" . $name . "'");
    if ($result) {
        if ($result->num_rows == 1) {
            echo "Table exists\n";
        }
    } else {
        $sql = "CREATE TABLE " . $bd . "." . $name . "(";
        for ($i = 0; $i < sizeof($colums) - 1; $i++) {
            $sql = $sql . $colums[$i] . ",";
        }
        $sql = $sql . $colums[sizeof($colums) - 1] . ");";
        if (mysqli_query(connecter($root, $username, $password), $sql)) {
            echo "table" . $name . "created successfully\n";
        } else {
            echo "Error creating table: ". $name;
        }
    }
}

$col_categories = ["cat_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT", "name varchar(20)"];
$col_items = ["item_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT", "name varchar(20)", "description varchar(20)", "price float", "CONSTRAINT catId FOREIGN KEY (cat_id) references categories(cat_id)"];




