<?php
include_once '../functions.php';
include_once '../database/ide_db.php';
include_once '../database/program_languages_db.php';
include_once '../database/technology_db.php';

$ides = selectIdes();
$technologies = selectTechnologies();
$languages = selectLanguages();

if (!isset($_COOKIE['is_logged'])) {
    header("Location: login.php");
    exit();
}
get_header();
?>
        <div class="main_menu_expert">

        </div>
        <form id="add-position" action="../library/ajax.php" method="post">
            <label for="name">Position Name</label>
            <input type="text" name="name" placeholder="Enter position name"><br/>
            <label for="address">Experience</label>
            <input type="text" name="experience" placeholder="Enter experience in month">month<br/>
            <label for="salary">Salary</label>
            <input type="text" name="salary" placeholder="Enter salary"><br/>
            <label for="languages">Program Languages</label>
            <select name="languages[]" multiple="multiple">
                <?php foreach ($languages as $language) : ?>
                    <option value="<?php echo $language->id; ?>"><?php echo $language->name; ?></option>
                <?php endforeach; ?>
            </select><br/>
            <label for="technologies">Program Technologies</label>
            <select name="technologies[]" multiple="multiple">
                <?php foreach ($technologies as $technology) : ?>
                    <option value="<?php echo $technology->id; ?>"><?php echo $technology->name; ?></option>
                <?php endforeach; ?>
            </select><br/>
            <label for="ides">Program IDEs</label>
            <select name="ides[]" multiple="multiple">
                <?php foreach ($ides as $ide) : ?>
                    <option value="<?php echo $ide->id; ?>"><?php echo $ide->name; ?></option>
                <?php endforeach; ?>
            </select><br/>
            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : ''; ?>">
            <input type="hidden" name="action" value="add_position_action">
            <input type="submit" value="Add Position"><br/>
        </form>
<?php
include_stylesheets();
include_scripts(); 
get_footer();
?>