<?php 

function selectLanguages()
{
    $stmt = connection()->prepare("SELECT * FROM program_languages ORDER BY name");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function insertLanguage($id , $data)
{
    foreach ($data as $value) {
        $stmt = connection()->prepare("INSERT INTO position_program_languages(position_id, position_program_language_id)
                    VALUES(:position_id, :program_id);");  
        $stmt->bindParam(':position_id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':program_id', $value, PDO::PARAM_INT);
        $stmt->execute();   
    }
}

function selectAllLanguagesById($id)
{
    $stmt = connection()->prepare("SELECT pl.name FROM program_languages pl 
                                   JOIN position_program_languages ppl ON pl.id = ppl.position_program_language_id 
                                   WHERE ppl.position_id = :position_id ORDER BY pl.name");
    $stmt->bindParam(':position_id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

function deleteLanguages($id)
{
    $stmt = connection()->prepare("DELETE FROM position_program_languages WHERE position_id = :position_id");
    $stmt->bindParam(':position_id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function selectAllLanguagesIdById($id)
{
    $stmt = connection()->prepare("SELECT pl.id FROM program_languages pl 
                                   JOIN position_program_languages ppl ON pl.id = ppl.position_program_language_id 
                                   WHERE ppl.position_id = :position_id");
    $stmt->bindParam(':position_id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

function deleteUserLanguages($id)
{
    $stmt = connection()->prepare("DELETE FROM user_program_languages WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function insertUserLanguage($id, $data)
{
    foreach ($data as $value) {
        $stmt = connection()->prepare("INSERT INTO user_program_languages(user_id, program_language_id)
                    VALUES(:user_id, :program_id);");  
        $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':program_id', $value, PDO::PARAM_INT);
        $stmt->execute();   
    }
}

function selectAllUserLanguagesIdById()
{
    $id = $_COOKIE['id'];

    $stmt = connection()->prepare("SELECT pl.id FROM program_languages pl 
                                   JOIN user_program_languages upl ON pl.id = upl.program_language_id 
                                   WHERE upl.user_id = :user_id");
    $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

function selectAllUserLanguagesById()
{
    $id = $_COOKIE['id'];

    $stmt = connection()->prepare("SELECT pl.name FROM program_languages pl 
                                   JOIN user_program_languages upl ON pl.id = upl.program_language_id 
                                   WHERE upl.user_id = :user_id");
    $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

function selectByLanguages($languages)
{
    $stmt = connection()->prepare("SELECT DISTINCT ppl.position_id, c.name AS company_name, p.name, p.company_id 
                                   FROM position_program_languages ppl
                                   JOIN positions p ON p.id = ppl.position_id
                                   JOIN companies c ON p.company_id = c.id
                                   WHERE ppl.position_program_language_id IN ($languages)");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}