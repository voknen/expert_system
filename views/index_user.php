<?php
include_once '../functions.php';
include_once '../database/ide_db.php';
include_once '../database/program_languages_db.php';
include_once '../database/technology_db.php';
include_once '../database/user_db.php';

$current_data = selectData();
$user_technologies = selectAllUserTechnologiesById();
$user_technologies = implode(', ', $user_technologies);

$user_ides = selectAllUserIdesById();
$user_ides = implode(', ', $user_ides);

$user_languages = selectAllUserLanguagesById();
$user_languages = implode(', ', $user_languages);

if (!isset($_COOKIE['is_logged'])) {
    header("Location: login.php");
    exit();
}
get_header();
?>
        <div class="main_menu_user">

        </div>
        <p>Name: <?php echo $current_data->firstname . ' ' . $current_data->lastname; ?></p>
        <p>Email: <?php echo $current_data->email; ?></p>
        <p>Minimum Wanted Salary: <?php echo $current_data->salary; ?> lv.</p>
        <p>Experience: <?php echo $current_data->experience; ?> month</p>
        <p>Program Languages: <?php echo $user_languages; ?></p>
        <p>Technologies: <?php echo $user_technologies; ?></p>
        <p>Programming IDEs: <?php echo $user_ides; ?></p>
<?php
include_stylesheets();
include_scripts(); 
get_footer();
?>