<?php
include_once '../functions.php';
include_once '../database/company_db.php';

$companies = select();

if (!isset($_COOKIE['is_logged'])) {
    header("Location: login.php");
    exit();
}
get_header();
?>
        <div class="main_menu_expert">

        </div>

        <table border="1">
            <th>№</th>
            <th>Name</th>
            <th>Address</th>
            <?php if (!empty($companies)) : ?>
                <?php foreach ($companies as $key => $company) : ?>
                    <tr>
                        <td><?php echo $key + 1 ; ?></td>
                        <td><a href="/expert_system/views/view_company.php?id=<?php echo $company->id; ?>"><?php echo $company->name; ?></a></td>
                        <td><?php echo $company->address; ?></td>
                        <td><a href="/expert_system/views/edit_company.php?id=<?php echo $company->id; ?>">Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3">No data<td>        
                </tr>    
            <?php endif; ?>
        </table>
<?php
include_stylesheets();
include_scripts(); 
get_footer();
?>