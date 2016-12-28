<?php 

function connection()
{
    require_once 'DBconnect.php';
    $database_connect = new DBconnect();
    $connection = $database_connect->connect();
    return $connection;
}

function exists($data)
{
    $exists = false;

    $stmt = connection()->prepare("SELECT id FROM companies WHERE name = :name AND address = :address LIMIT 1");
    $stmt->bindParam(':name', trim($data['name']), PDO::PARAM_STR);
    $stmt->bindParam(':address', trim($data['address']), PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetch()) {
        $exists = true;
    } else {
        insert($data);
    }
    return $exists;
}

function insert($data)
{   
    $expert_id = $_COOKIE['id'];
    $stmt = connection()->prepare("INSERT INTO companies(name, address, expert_id)
            VALUES(:name, :address, :expert_id);");  
    $stmt->bindParam(':name', trim($data['name']), PDO::PARAM_STR);
    $stmt->bindParam(':address', trim($data['address']), PDO::PARAM_STR);
    $stmt->bindParam(':expert_id', $expert_id, PDO::PARAM_INT);
    $stmt->execute();
}

function select()
{
    $expert_id = $_COOKIE['id'];
    $stmt = connection()->prepare("SELECT * FROM companies WHERE expert_id = :expert_id");
    $stmt->bindParam(':expert_id', $expert_id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function update($data)
{
    $expert_id = $_COOKIE['id'];
    $stmt = connection()->prepare("UPDATE companies SET name = :name, address = :address WHERE expert_id = :expert_id AND id = :id;");  
    $stmt->bindParam(':name', trim($data['name']), PDO::PARAM_STR);
    $stmt->bindParam(':address', trim($data['address']), PDO::PARAM_STR);
    $stmt->bindParam(':expert_id', $expert_id, PDO::PARAM_INT);
    $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->rowCount();
}

function select_data($id)
{
    $expert_id = $_COOKIE['id'];
    $stmt = connection()->prepare("SELECT * FROM companies WHERE expert_id = :expert_id AND id = :id LIMIT 1");
    $stmt->bindParam(':expert_id', $expert_id, PDO::PARAM_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ);
}
