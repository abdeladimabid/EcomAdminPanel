<?php
$username = "root";
$password = "";
$root = "localhost";

function connecter($root, $username, $password)
{
    $connect = mysqli_connect($root, $username, $password);
    if ($connect->connect_error) {
        echo "error : " . connect_error;
    } else
        echo "connected to MySql successfully <br> <br>";

    return $connect;
}

function deconnecter($con)
{
    $discon = mysqli_close($con);
    if (!$discon) {
        echo "error: disconnexion failed";
    } else
        echo "disconnected from MySql successfully <br> <br>";
}

function create_DB($name)
{
    global $root, $username, $password;
    $sql = "CREATE DATABASE IF NOT EXISTS " . $name;
    if (mysqli_query(connecter($root, $username, $password), $sql)) {
        echo "Database " . $name . " created successfully <br>";
    } else {
        echo "Error creating database " . $name . "<br>" ;
    }
}

function create_Table($name, $bd, array $colums)
{
    global $root, $username, $password;
    $result = mysqli_query(connecter($root, $username, $password), "SHOW TABLES LIKE '" . $name . "'");
    if ($result) {
        if ($result->num_rows == 1) {
            echo "Table " . $name . " exists already <br>";
        }
    } else {
        $sql = "CREATE TABLE " . $bd . "." . $name . "(";
        for ($i = 0; $i < sizeof($colums) - 1; $i++) {
            $sql = $sql . $colums[$i] . ",";
        }
        $sql = $sql . $colums[sizeof($colums) - 1] . ");";
        if (mysqli_query(connecter($root, $username, $password), $sql)) {
            echo "table " . $name . " created successfully <br>";
        } else {
            echo "Error creating table: ". $name . "<br>";
        }
    }
}

$col_categories = ["cat_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT", "name varchar(20)"];
$col_items = ["item_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT", "name varchar(20)", "description varchar(20)", "price float", "cat_id int(11)", "FOREIGN KEY (cat_id) REFERENCES Categories(cat_id)"];

create_DB("Store");
create_Table("Categories", "Store", $col_categories);
create_Table("Items", "Store", $col_items);


