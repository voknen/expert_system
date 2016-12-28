<?php
include_once '../functions.php';
?>
<?php 
if(isset($_COOKIE['is_logged'])){
    header("Location: index_" . $_COOKIE['role'] . ".php");
    exit();
}
get_header();
?>
        <form id="register-form" action="../library/ajax.php" method="post">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" placeholder="Enter your first name"><br/>
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" placeholder="Enter your last name"><br/>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter your email"><br/>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter your password"><br/>
            <label for="select_role">Select your role</label>
            <select name="role">
                <option value="">Select your role</option>
                <option value="user">User</option>
                <option value="expert">Expert</option>
            </select><br/>
            <input type="hidden" name="action" value="register_form_action">
            <input type="submit" value="Register"><br/>
            <a href="/expert_system/views/login.php">Already has a registration?</a>
        </form>        
<?php
include_stylesheets();
include_scripts(); 
get_footer();
?>