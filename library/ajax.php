<?php

if ($_POST['action'] == 'register_form_action') {
    $post_data = $_POST;
    unset($post_data['action']);
    register_action($post_data);
} else if ($_POST['action'] == 'login_form_action') {
    $post_data = $_POST;
    unset($post_data['action']);
    login_action($post_data);
} else if ($_POST['action'] == 'add_company_action') {
    $post_data = $_POST;
    unset($post_data['action']);
    add_company_action($post_data);
} else if ($_POST['action'] == 'edit_company_action') {
    $post_data = $_POST;
    unset($post_data['action']);
    edit_company_action($post_data);
} else if ($_POST['action'] == 'add_position_action'){
    $post_data = $_POST;
    unset($post_data['action']);
    add_position_action($post_data);
} else if ($_POST['action'] == 'delete_position_action') {
    $post_data = $_POST;
    unset($post_data['action']);
    delete_position_action($post_data);
} else if ($_POST['action'] == 'edit_position_action') {
    $post_data = $_POST;
    unset($post_data['action']);
    edit_position_action($post_data);
} else if ($_POST['action'] == 'edit_user_data_action') {
    $post_data = $_POST;
    unset($post_data['action']);
    add_user_data_action($post_data);
}

function login_action($data)
{
    $validator = include 'validator/login_form.php';

    if ($validator->isValid($data)) {
        include '../database/user_db.php';
        $success = select($data['email'], $data['password']);

        if (!$success['loginPassword']) {
            http_response_code(400);
            $json_string = json_encode(array(
                "email" => array(
                    "exists" => "Email or password are wrong"
                ),
                "password" => array(
                    "exists" => "Email or password are wrong"
                )
            ));
            echo $json_string;
        } else {
            // $_SESSION['is_logged'] = true;
            // $_SESSION['id'] = $success['user_id'];

            http_response_code(200);
            $json_string = json_encode(array(
                "role"      => $success['role'],
                "user_id"   => $success['user_id'],
                "is_logged" => true
            ));
            echo $json_string;            
        }
    } else {
        http_response_code(400);
        $json_string = json_encode($validator->getErrors());
        echo $json_string;
    }
    header('Content-type: application/json');
}

function register_action($data)
{    
    $validator = include 'validator/register_form.php';
    
    if ($validator->isValid($data)) {
        include '../database/user_db.php';

        if (exists($data['email'])) {
            http_response_code(400);
            $json_string = json_encode(array("email" => array("exists" => "Already registered")));
            echo $json_string;
        } else {
            register($data);
            http_response_code(200);
            $json_string = json_encode(array("success" => "Your registration is successful"));
            echo $json_string;            
        }
    } else {
        http_response_code(400);
        $json_string = json_encode($validator->getErrors());
        echo $json_string;
    }
    header('Content-type: application/json');
}

function add_company_action($data)
{
    $validator = include 'validator/add_company_form.php';
    
    if ($validator->isValid($data)) {
        include '../database/company_db.php';

        if (exists($data)) {
            http_response_code(400);
            $json_string = json_encode(array("name" => array("exists" => "Already added")));
            echo $json_string;
        } else {
            http_response_code(200);
            $json_string = json_encode(array("success" => "Your company is added successfully"));
            echo $json_string;            
        }
    } else {
        http_response_code(400);
        $json_string = json_encode($validator->getErrors());
        echo $json_string;
    }
    header('Content-type: application/json');
}

function edit_company_action($data)
{
    $validator = include 'validator/add_company_form.php';
    if ($data['id'] != '') {
        if ($validator->isValid($data)) {
            include '../database/company_db.php';

            if (!update($data)) {
                http_response_code(400);
                $json_string = json_encode(array("name" => array("exists" => "Wrong ID or same data")));
                echo $json_string;
            } else {
                http_response_code(200);
                $json_string = json_encode(array("success" => "Your company is edited successfully"));
                echo $json_string;            
            }
        } else {
            http_response_code(400);
            $json_string = json_encode($validator->getErrors());
            echo $json_string;
        }
    } else {
        http_response_code(400);
        $json_string = json_encode(array("name" => array("exists" => "Wrong ID")));
        echo $json_string;
    }
    
    header('Content-type: application/json');
}

function add_position_action($data)
{
    $validator = include 'validator/add_position_form.php';

    if ($data['id'] != '') {
        if ($validator->isValid($data)) {
            include_once '../database/ide_db.php';
            include_once '../database/program_languages_db.php';
            include_once '../database/technology_db.php';
            include_once '../database/position_db.php';

            $lastInsertedId = insertPosition($data);
            insertTechnology($lastInsertedId, $data['technologies']);
            insertLanguage($lastInsertedId, $data['languages']);
            insertIdes($lastInsertedId, $data['ides']);
            http_response_code(200);
            $json_string = json_encode(array("success" => "Position is added successfully"));
            echo $json_string; 
        } else {
            http_response_code(400);
            $json_string = json_encode($validator->getErrors());
            echo $json_string;
        }
    } else {
        http_response_code(400);
        $json_string = json_encode(array("name" => array("exists" => "Wrong ID")));
        echo $json_string;
    }
    
    header('Content-type: application/json');
}

function edit_position_action($data)
{
    $validator = include 'validator/add_position_form.php';

    if ($data['id'] != '') {
        if ($validator->isValid($data)) {
            include_once '../database/ide_db.php';
            include_once '../database/program_languages_db.php';
            include_once '../database/technology_db.php';
            include_once '../database/position_db.php';

            deleteIdes($data['id']);
            deleteLanguages($data['id']);
            deleteTechnologies($data['id']);
            updatePosition($data);
            insertTechnology($data['id'], $data['technologies']);
            insertLanguage($data['id'], $data['languages']);
            insertIdes($data['id'], $data['ides']);
            
            http_response_code(200);
            $json_string = json_encode(array("success" => "Position is edited successfully"));
            echo $json_string; 
        } else {
            http_response_code(400);
            $json_string = json_encode($validator->getErrors());
            echo $json_string;
        }
    } else {
        http_response_code(400);
        $json_string = json_encode(array("name" => array("exists" => "Wrong ID")));
        echo $json_string;
    }
    
    header('Content-type: application/json');
}

function delete_position_action($data)
{
    include_once '../database/ide_db.php';
    include_once '../database/program_languages_db.php';
    include_once '../database/technology_db.php';
    include_once '../database/position_db.php';
    deleteIdes($data['id']);
    deleteLanguages($data['id']);
    deleteTechnologies($data['id']);
    deletePosition($data);

    http_response_code(200);
    $json_string = json_encode(array("success" => true, "id" => $data['company_id']));
    echo $json_string;

    header('Content-type: application/json');
}

function add_user_data_action($data)
{
    $validator = include 'validator/user_data_form.php';
    
    if ($validator->isValid($data)) {
        include_once '../database/ide_db.php';
        include_once '../database/program_languages_db.php';
        include_once '../database/technology_db.php';
        include_once '../database/user_db.php';

        deleteUserIdes($_COOKIE['id']);
        deleteUserLanguages($_COOKIE['id']);
        deleteUserTechnologies($_COOKIE['id']);
        insertUserTechnology($_COOKIE['id'], $data['technologies']);
        insertUserLanguage($_COOKIE['id'], $data['languages']);
        insertUserIdes($_COOKIE['id'], $data['ides']);
        
        update($_COOKIE['id'], $data);
        
        http_response_code(200);
        $json_string = json_encode(array("success" => "Your is edited successfully"));
        echo $json_string;
    } else {
        http_response_code(400);
        $json_string = json_encode($validator->getErrors());
        echo $json_string;
    }
    header('Content-type: application/json');
}