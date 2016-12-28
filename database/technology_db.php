<?php 

function selectTechnologies()
{
    $stmt = connection()->prepare("SELECT * FROM technologies ORDER BY name");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function insertTechnology($id, $data)
{
    foreach ($data as $value) {
        $stmt = connection()->prepare("INSERT INTO position_technology(position_id, technology_id)
                    VALUES(:position_id, :technology_id);");  
        $stmt->bindParam(':position_id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':technology_id', $value, PDO::PARAM_INT);
        $stmt->execute();   
    }
}

function selectAllTechnologiesById($id)
{
    $stmt = connection()->prepare("SELECT t.name FROM technologies t 
                                   JOIN position_technology pt ON t.id = pt.technology_id 
                                   WHERE pt.position_id = :position_id ORDER BY t.name");
    $stmt->bindParam(':position_id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

function deleteTechnologies($id)
{
    $stmt = connection()->prepare("DELETE FROM position_technology WHERE position_id = :position_id");
    $stmt->bindParam(':position_id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function selectAllTechnologiesIdById($id)
{
    $stmt = connection()->prepare("SELECT t.id FROM technologies t 
                                   JOIN position_technology pt ON t.id = pt.technology_id 
                                   WHERE pt.position_id = :position_id");
    $stmt->bindParam(':position_id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

function deleteUserTechnologies($id)
{
    $stmt = connection()->prepare("DELETE FROM user_technologies WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function insertUserTechnology($id, $data)
{
    foreach ($data as $value) {
        $stmt = connection()->prepare("INSERT INTO user_technologies(user_id, technology_id)
                    VALUES(:user_id, :technology_id);");  
        $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':technology_id', $value, PDO::PARAM_INT);
        $stmt->execute();   
    }
}

function selectAllUserTechnologiesIdById()
{
    $id = $_COOKIE['id'];

    $stmt = connection()->prepare("SELECT t.id FROM technologies t 
                                   JOIN user_technologies ut ON t.id = ut.technology_id 
                                   WHERE ut.user_id = :user_id");
    $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

function selectAllUserTechnologiesById()
{
    $id = $_COOKIE['id'];

    $stmt = connection()->prepare("SELECT t.name FROM technologies t 
                                   JOIN user_technologies ut ON t.id = ut.technology_id 
                                   WHERE ut.user_id = :user_id");
    $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

function selectByTechnologies($technologies)
{
    $stmt = connection()->prepare("SELECT DISTINCT pt.position_id, c.name AS company_name, p.name, p.company_id 
                                   FROM position_technology pt
                                   JOIN positions p ON p.id = pt.position_id
                                   JOIN companies c ON p.company_id = c.id
                                   WHERE pt.technology_id IN ($technologies)");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}