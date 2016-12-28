<?php
include_once '../functions.php';

if (!isset($_COOKIE['is_logged'])) {
    header("Location: login.php");
    exit();
}
get_header();
?>
        <div class="main_menu_expert">

        </div>
        <form id="add-company" action="../library/ajax.php" method="post">
            <label for="name">Company Name</label>
            <input type="text" name="name" placeholder="Enter company name"><br/>
            <label for="address">Address</label>
            <input type="text" name="address" placeholder="Enter company address"><br/>
            <input type="hidden" name="action" value="add_company_action">
            <input type="submit" value="Add"><br/>
        </form>
<?php
include_stylesheets();
include_scripts(); 
get_footer();
?>