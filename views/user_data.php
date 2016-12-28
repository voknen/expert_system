<?php
include_once '../functions.php';
include_once '../database/ide_db.php';
include_once '../database/program_languages_db.php';
include_once '../database/technology_db.php';
include_once '../database/user_db.php';

$ides = selectIdes();
$technologies = selectTechnologies();
$languages = selectLanguages();
$current_data = selectData();
$current_technologies = selectAllUserTechnologiesIdById();
$current_languages = selectAllUserLanguagesIdById();
$current_ides = selectAllUserIdesIdById();

if (!isset($_COOKIE['is_logged'])) {
    header("Location: login.php");
    exit();
}
get_header();
?>
        <div class="main_menu_user">

        </div>
        <form id="edit-user-data" action="../library/ajax.php" method="post">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" placeholder="Enter your first name" value="<?php echo isset($current_data->firstname) ? $current_data->firstname : ''; ?>"><br/>
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" placeholder="Enter your last name" value="<?php echo isset($current_data->lastname) ? $current_data->lastname : ''; ?>"><br/>
            <label for="address">Experience</label>
            <input type="text" name="experience" placeholder="Enter your experience in month" value="<?php echo isset($current_data->experience) ? $current_data->experience : ''; ?>"> month<br/>
            <label for="salary">Salary</label>
            <input type="text" name="salary" placeholder="Enter min salary you want" value="<?php echo isset($current_data->salary) ? $current_data->salary : ''; ?>"><br/>
            <label for="languages">Program Languages</label>
            <select name="languages[]" multiple="multiple">
                <?php foreach ($languages as $language) : ?>
                    <option value="<?php echo $language->id; ?>" <?php echo in_array($language->id, $current_languages) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                <?php endforeach; ?>
            </select><br/>
            <label for="technologies">Program Technologies</label>
            <select name="technologies[]" multiple="multiple">
                <?php foreach ($technologies as $technology) : ?>
                    <option value="<?php echo $technology->id; ?>" <?php echo in_array($technology->id, $current_technologies) ? 'selected' : ''; ?>><?php echo $technology->name; ?></option>
                <?php endforeach; ?>
            </select><br/>
            <label for="ides">Program IDEs</label>
            <select name="ides[]" multiple="multiple">
                <?php foreach ($ides as $ide) : ?>
                    <option value="<?php echo $ide->id; ?>" <?php echo in_array($ide->id, $current_ides) ? 'selected' : ''; ?>><?php echo $ide->name; ?></option>
                <?php endforeach; ?>
            </select><br/>
            <input type="hidden" name="action" value="edit_user_data_action">
            <input type="submit" value="Edit Your Data"><br/>
        </form>
<?php
include_stylesheets();
include_scripts(); 
get_footer();
?>