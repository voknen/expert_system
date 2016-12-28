<?php
include_once '../functions.php';
?>
<?php if(isset($_COOKIE['is_logged'])){
    header("Location: index_" . $_COOKIE['role'] . ".php");
    exit();
}

get_header();
?>
        <form id="login-form" action="../library/ajax.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter your email"><br/>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter your password"><br/>
            <input type="hidden" name="action" value="login_form_action">
            <input type="submit" value="Log in"><br/>
            <a href="/expert_system/views/register.php">You are new?</a>
        </form>
<?php
include_stylesheets();
include_scripts(); 
get_footer();
?>