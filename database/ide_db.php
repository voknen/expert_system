<?php 

function connection()
{
    require_once 'DBconnect.php';
    $database_connect = new DBconnect();
    $connection = $database_connect->connect();
    return $connection;
}

function selectIdes()
{
    $stmt = connection()->prepare("SELECT * FROM ides ORDER BY name");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function insertIdes($id, $data)
{
    foreach ($data as $value) {
        $stmt = connection()->prepare("INSERT INTO position_ides(position_id, ide_id)
                    VALUES(:position_id, :ide_id);");  
        $stmt->bindParam(':position_id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':ide_id', $value, PDO::PARAM_INT);
        $stmt->execute();   
    }
}

function selectAllIdesById($id)
{
    $stmt = connection()->prepare("SELECT i.name FROM ides i JOIN position_ides pi ON i.id = pi.ide_id 
                        WHERE pi.position_id = :position_id ORDER BY i.name");
    $stmt->bindParam(':position_id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

function deleteIdes($id)
{
    $stmt = connection()->prepare("DELETE FROM position_ides WHERE position_id = :position_id");
    $stmt->bindParam(':position_id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function selectAllIdesIdById($id)
{
    $stmt = connection()->prepare("SELECT i.id FROM ides i JOIN position_ides pi ON i.id = pi.ide_id 
                        WHERE pi.position_id = :position_id");
    $stmt->bindParam(':position_id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

function deleteUserIdes($id)
{
    $stmt = connection()->prepare("DELETE FROM user_ides WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function insertUserIdes($id, $data)
{
    foreach ($data as $value) {
        $stmt = connection()->prepare("INSERT INTO user_ides(user_id, ide_id)
                    VALUES(:user_id, :ide_id);");  
        $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':ide_id', $value, PDO::PARAM_INT);
        $stmt->execute();   
    }
}

function selectAllUserIdesIdById()
{
    $id = $_COOKIE['id'];

    $stmt = connection()->prepare("SELECT i.id FROM ides i 
                                   JOIN user_ides ui ON i.id = ui.ide_id 
                                   WHERE ui.user_id = :user_id");
    $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

function selectAllUserIdesById()
{
    $id = $_COOKIE['id'];

    $stmt = connection()->prepare("SELECT i.name FROM ides i 
                                   JOIN user_ides ui ON i.id = ui.ide_id 
                                   WHERE ui.user_id = :user_id");
    $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

function selectByIdes($ides)
{
    $stmt = connection()->prepare("SELECT DISTINCT pi.position_id, c.name AS company_name, p.name, p.company_id 
                                   FROM position_ides pi
                                   JOIN positions p ON p.id = pi.position_id
                                   JOIN companies c ON p.company_id = c.id
                                   WHERE pi.ide_id IN ($ides)");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}