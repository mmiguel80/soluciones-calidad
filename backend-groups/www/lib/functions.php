<?php

include 'database.php';

function get_all_group_list()
{
    $pdo = Database::connect();
    $sql = "SELECT * FROM `group` ORDER BY 1";

    try {

        $query = $pdo->prepare($sql);
        $query->execute();
        $all_group_info = $query->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    Database::disconnect();
    return $all_group_info;
}

function get_single_group_info($id)
{
    $pdo = Database::connect();
    $sql = "SELECT * FROM `group` where id = {$id} ";

    try {

        $query = $pdo->prepare($sql);
        $query->execute();
        $group_info = $query->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    Database::disconnect();
    return $group_info;
}




function update_group_info($id,$name)
{
    $pdo = Database::connect();
    $sql = "UPDATE `group` SET name = '{$name}' where id = '{$id}'";
    $status = [];

    try {

        $query = $pdo->prepare($sql);
        $result = $query->execute();
        if($result)
        {
            $status['message'] = "Data updated";
            $status['code'] = 200;
        }
        else{
            $status['message'] = "Data is not updated";
            $status['code'] = 400;
        }

    } catch (PDOException $e) {

        $status['message'] = $e->getMessage(); 
        $status['code'] = 500;
    }

    Database::disconnect();
    return $status;
}


function add_group_info($name)
{
    $pdo = Database::connect();
    $sql = "INSERT INTO `group`(`name`) VALUES('{$name}')";
    $status = [];

    try {

        $query = $pdo->prepare($sql);
        $result = $query->execute();
        if($result)
        {
            $status['message'] = "Data inserted";
            $status['code'] = 201;
        }
        else{
            $status['message'] = "Data is not inserted";
            $status['code'] = 400;
        }

    } catch (PDOException $e) {

        $status['message'] = $e->getMessage();
        $status['code'] = 500; 
    }

    Database::disconnect();
    return $status;
}

function delete_group_info($id)
{
    $pdo = Database::connect();
    $sql ="DELETE FROM `group` where id = '{$id}'";
    $status = [];

    try {

        $query = $pdo->prepare($sql);
        $result = $query->execute();
        if($result)
        {
            $status['message'] = "Data deleted";
            $status['code'] = 200;
        }
        else{
            $status['message'] = "Data is not deleted";
            $status['code'] = 400;
        }

    } catch (PDOException $e) {

        $status['message'] = $e->getMessage();
        $status['code'] = 500; 
    }

    Database::disconnect();
    return $status;
}