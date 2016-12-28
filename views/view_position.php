<?php
include_once '../functions.php';
include_once '../database/ide_db.php';
include_once '../database/program_languages_db.php';
include_once '../database/technology_db.php';
include_once '../database/position_db.php';

$position_data = selectAllPositionData($_GET['id'], $_GET['company_id']);

$position_technologies = selectAllTechnologiesById($_GET['id']);
$position_technologies = implode(', ', $position_technologies);

$position_ides = selectAllIdesById($_GET['id']);
$position_ides = implode(', ', $position_ides);

$position_languages = selectAllLanguagesById($_GET['id']);
$position_languages = implode(', ', $position_languages);

if (!isset($_COOKIE['is_logged'])) {
    header("Location: login.php");
    exit();
}
get_header();
?>
        <?php if ($_COOKIE['role'] == 'expert') : ?>
            <div class="main_menu_expert">

            </div>
        <?php else: ?>
            <div class="main_menu_user">

            </div>
        <?php endif; ?>    
        <p>Position: <?php echo $position_data->name; ?></p>
        <p>Company Name: <?php echo $position_data->company_name; ?></p>
        <p>Salary: <?php echo $position_data->salary; ?> lv.</p>
        <p>Experience: <?php echo $position_data->experience; ?> month</p>
        <p>Program Languages: <?php echo $position_languages; ?></p>
        <p>Technologies: <?php echo $position_technologies; ?></p>
        <p>Programming IDEs: <?php echo $position_ides; ?></p>

<?php
include_stylesheets();
include_scripts(); 
get_footer();
?>