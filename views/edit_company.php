<?php
include_once '../functions.php';

if (!isset($_COOKIE['is_logged'])) {
    header("Location: login.php");
    exit();
}
get_header();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    include_once '../database/company_db.php';
    $data = select_data($_GET['id']);
}
?>
        <div class="main_menu_expert">

        </div>
        <form id="edit-company" action="../library/ajax.php" method="post">
            <label for="name">Company Name</label>
            <input type="text" name="name" placeholder="Enter company name" value="<?php echo isset($data->name) ? $data->name : ''; ?>"><br/>
            <label for="address">Address</label>
            <input type="text" name="address" placeholder="Enter company address" value="<?php echo isset($data->address) ? $data->address : ''; ?>"><br/>
            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : ''; ?>">
            <input type="hidden" name="action" value="edit_company_action">
            <input type="submit" value="Edit"><br/>
        </form>
<?php
include_stylesheets();
include_scripts(); 
get_footer();
?>