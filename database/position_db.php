<?php 

function insertPosition($data)
{
    $db = new PDO('mysql:host=localhost;dbname=expert_system','root','', 
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $stmt = $db->prepare("INSERT INTO positions(name, experience, salary, company_id)
            VALUES(:name, :experience, :salary, :company_id);");  
    $stmt->bindParam(':name', trim($data['name']), PDO::PARAM_STR);
    $stmt->bindParam(':experience', trim($data['experience']), PDO::PARAM_STR);
    $stmt->bindParam(':salary', trim($data['salary']), PDO::PARAM_STR);
    $stmt->bindParam(':company_id', $data['id'], PDO::PARAM_INT);
    $stmt->execute();

    return $db->lastInsertId();
    
}

function selectAllPositions($id)
{
    $db = new PDO('mysql:host=localhost;dbname=expert_system','root','', 
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $stmt = $db->prepare("SELECT * FROM positions WHERE company_id = :company_id ORDER BY name ");
    $stmt->bindParam(':company_id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function selectAllPositionData($id, $company_id)
{
    $db = new PDO('mysql:host=localhost;dbname=expert_system','root','', 
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $stmt = $db->prepare("SELECT p.name, p.experience, p.salary, c.name AS company_name 
                          FROM positions p 
                          JOIN companies c ON c.id = p.company_id
                          WHERE p.company_id = :company_id AND p.id = :id");
    $stmt->bindParam(':company_id', $company_id, PDO::PARAM_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ);
}

function updatePosition($data)
{
    $db = new PDO('mysql:host=localhost;dbname=expert_system','root','', 
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $stmt = $db->prepare("UPDATE positions SET name = :name, salary = :salary, experience = :experience WHERE id = :id");
    $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
    $stmt->bindParam(':salary', $data['salary'], PDO::PARAM_STR);
    $stmt->bindParam(':experience', $data['experience'], PDO::PARAM_STR);
    $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
    $stmt->execute();
}

function deletePosition($data)
{
    $db = new PDO('mysql:host=localhost;dbname=expert_system','root','', 
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $stmt = $db->prepare("DELETE FROM positions WHERE id = :id AND company_id = :company_id");
    $stmt->bindParam(':company_id', $data['company_id'], PDO::PARAM_INT);
    $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
    $stmt->execute();
}

function selectBySalary($salary)
{
    $db = new PDO('mysql:host=localhost;dbname=expert_system','root','', 
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $stmt = $db->prepare("SELECT p.id AS position_id, p.name, p.salary, p.experience, p.company_id,c.name AS company_name 
                          FROM positions p 
                          JOIN companies c ON p.company_id = c.id
                          WHERE p.salary >= $salary");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function selectByExperience($experience)
{
    $db = new PDO('mysql:host=localhost;dbname=expert_system','root','', 
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $stmt = $db->prepare("SELECT p.id AS position_id, p.name, p.salary, p.experience, p.company_id,c.name AS company_name 
                          FROM positions p 
                          JOIN companies c ON p.company_id = c.id
                          WHERE p.experience <= $experience");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function selectDataById($id)
{
    $db = new PDO('mysql:host=localhost;dbname=expert_system','root','', 
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $stmt = $db->prepare("SELECT p.id AS position_id, p.name, p.salary, p.experience, p.company_id,c.name AS company_name FROM positions p JOIN companies c ON p.company_id = c.id WHERE p.id = $id");
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ);
}

function getMostAppropriatePositionsId($positions)
{
    $position_ids = array();
    $positions_count = array_count_values($positions);
    foreach ($positions_count as $key => $value) {
        if ($value >= 4) {
            $position_ids[] = $key;
        }
    }

    return $position_ids;
}

function selectFullDataByIds($ids)
{
    $full_data = array();
    foreach ($ids as $id) {
        $full_data[] = selectDataById($id);
    }

    return $full_data;
}