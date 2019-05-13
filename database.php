<?php
$username = "root";
$password = "";
$root = "localhost";

function connecter($root, $username, $password)
{
    $connect = mysqli_connect($root, $username, $password);
    if ($connect->connect_error) {
        echo "<script> console.log('error !!!')</script>";
    } else {
        echo "<script> console.log('connected to MySql successfully')</script>";
    }
    return $connect;
}

function connect_db($root, $username, $password, $db)
{
    $connect = mysqli_connect($root, $username, $password, $db);
    if ($connect->connect_error) {
        echo "<script> console.log('error !!!')</script>";
    } else {
        echo "<script> console.log('connected to MySql successfully')</script>";
    }
    return $connect;
}

function deconnecter($con)
{
    $discon = mysqli_close($con);
    if (!$discon) {
        echo "<script> console.log('error: disconnexion failed')</script>";
    } else
        echo "<script> console.log('disconnected from MySql successfully')</script>";
}

function create_DB($name)
{
    global $root, $username, $password;
    $sql = "CREATE DATABASE IF NOT EXISTS " . $name;
    if (mysqli_query(connecter($root, $username, $password), $sql)) {
        echo "<script> console.log('Database " . $name . " created successfully')</script>";
        deconnecter(connecter($root, $username, $password));
    } else {
        echo "<script> console.log('Error creating database " . $name . "')</script>" ;
    }
}

function create_Table($name, $bd, array $colums)
{
    global $root, $username, $password;
    $result = mysqli_query(connecter($root, $username, $password), "SHOW TABLES LIKE '" . $name . "'");
    if ($result) {
        if ($result->num_rows == 1) {
            echo "<script> console.log('Table " . $name . " exists already')</script>";
        }
    } else {
        $sql = "CREATE TABLE " . $bd . "." . $name . "(";
        for ($i = 0; $i < sizeof($colums) - 1; $i++) {
            $sql = $sql . $colums[$i] . ",";
        }
        $sql = $sql . $colums[sizeof($colums) - 1] . ");";
        if (mysqli_query(connecter($root, $username, $password), $sql)) {
            echo "<script> console.log('table " . $name . " created successfully')</script>";
            deconnecter(connecter($root, $username, $password));
        } else {
            echo "<script> console.log('Error creating table: ". $name . "')</script>";
        }
    }
}

$col_categories = ["cat_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT", "name varchar(20)"];
$col_items = ["item_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT", "name varchar(20)", "description varchar(20)", "price float", "cat_id int(11)", "FOREIGN KEY (cat_id) REFERENCES Categories(cat_id)", "img varchar(500) DEFAULT 'upload/default.jpg'"];

create_DB("Store");
create_Table("Categories", "Store", $col_categories);
create_Table("Items", "Store", $col_items);


