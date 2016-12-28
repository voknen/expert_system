<?php

if (!function_exists('connection')) {
    function connection()
    {
        require_once 'DBconnect.php';
        $database_connect = new DBconnect();
        $connection = $database_connect->connect();
        return $connection;
    }
}

function select($email, $password)
{   
    $login = array('loginPassword' => false);

    $stmt = connection()->prepare("SELECT id, password, role FROM users WHERE email = :email");
    $stmt->bindParam(':email', trim($email) , PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);

    if (password_verify(trim($password), $result->password) == true) {
        $login = array(
            'loginPassword' => true,
            'role'          => $result->role,
            'user_id'       => $result->id
        );
    }

    return $login;
}

function exists($email)
{
    $exists = false;

    $stmt = connection()->prepare("SELECT email FROM users WHERE email = :email");
    $stmt->bindParam(':email', trim($email), PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetch()) {
        $exists=true;
    }
    return $exists;
}

function register($data)
{
    $hashed_password = password_hash(trim($data['password']), PASSWORD_DEFAULT);
    $stmt = connection()->prepare("INSERT INTO users(firstname, lastname, email, password, role)
            VALUES(:firstname, :lastname, :email, :hashedPassword, :role);");  
    $stmt->bindParam(':firstname', trim($data['firstname']), PDO::PARAM_STR);
    $stmt->bindParam(':lastname', trim($data['lastname']), PDO::PARAM_STR);
    $stmt->bindParam(':email', trim($data['email']), PDO::PARAM_STR);
    $stmt->bindParam(':hashedPassword', $hashed_password, PDO::PARAM_STR);
    $stmt->bindParam(':role', $data['role'], PDO::PARAM_STR);
    $stmt->execute();
}

function selectData()
{
    $id = $_COOKIE['id'];
    $db = new PDO('mysql:host=localhost;dbname=expert_system','root','', 
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $stmt = $db->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ);
}

function update($id, $data)
{
    $stmt = connection()->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, salary = :salary, experience = :experience WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':firstname', trim($data['firstname']), PDO::PARAM_STR);
    $stmt->bindParam(':lastname', trim($data['lastname']), PDO::PARAM_STR);
    $stmt->bindParam(':salary', trim($data['salary']), PDO::PARAM_STR);
    $stmt->bindParam(':experience', trim($data['experience']), PDO::PARAM_STR);
    $stmt->execute();
}