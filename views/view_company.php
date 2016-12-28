<?php
include_once '../functions.php';
include_once '../database/position_db.php';

$positions = selectAllPositions($_GET['id']);

if (!isset($_COOKIE['is_logged'])) {
    header("Location: login.php");
    exit();
}
get_header();
?>

        <div class="main_menu_expert">

        </div>
        <a href="/expert_system/views/add_position.php?id=<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">Add New Position</a><br/>
        <h3>All company positions</h3>
        <table border="1">
            <th>№</th>
            <th>Name</th>
            <?php if (!empty($positions)) : ?>
                <?php foreach ($positions as $key => $position) : ?>
                    <tr>
                        <td><?php echo $key + 1 ; ?></td>
                        <td><a href="/expert_system/views/view_position.php?id=<?php echo $position->id; ?>&company_id=<?php echo $_GET['id']; ?>"><?php echo $position->name; ?></a></td>
                        <td><a href="/expert_system/views/edit_position.php?id=<?php echo $position->id; ?>&company_id=<?php echo $_GET['id']; ?>">Edit</a></td>
                        <td><a class="delete-position" href="javascript:void(0);" data-company-id="<?php echo $_GET['id']; ?>" data-id="<?php echo $position->id; ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="2">No data<td>        
                </tr>    
            <?php endif; ?>
        </table>
<?php
include_stylesheets();
include_scripts(); 
get_footer();
?>