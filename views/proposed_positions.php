<?php
include_once '../functions.php';
include_once '../database/ide_db.php';
include_once '../database/program_languages_db.php';
include_once '../database/technology_db.php';
include_once '../database/user_db.php';
include_once '../database/position_db.php';

$current_data = selectData();

$current_technologies = selectAllUserTechnologiesIdById();
$current_technologies = implode(',', $current_technologies);

$current_languages = selectAllUserLanguagesIdById();
$current_languages = implode(',', $current_languages);

$current_ides = selectAllUserIdesIdById();
$current_ides = implode(',', $current_ides);

$positions_by_salary = selectBySalary($current_data->salary);
$positions_by_experience = selectByExperience($current_data->experience);
$positions_by_technologies = selectByTechnologies($current_technologies);
$positions_by_ides = selectByIdes($current_ides);
$positions_by_languages = selectByLanguages($current_languages);

$most_appropriate_positions = array();

if (!isset($_COOKIE['is_logged'])) {
    header("Location: login.php");
    exit();
}
get_header();
?>
        <div class="main_menu_user">

        </div>        
        <?php if (!empty($positions_by_salary)) : ?>
            <div id="by-salary" class="positions" style="display: none;">
                <h3>Proposed Positions By Your Wanted Salary</h3>
                <table border="1">
                    <th>№</th>
                    <th>Position Name</th>
                    <th>Company Name</th>
                    <th>More Information</th>
                    <?php foreach ($positions_by_salary as $key => $position) :?>
                        <?php $most_appropriate_positions[] =  $position->position_id; ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $position->name; ?></td>
                            <td><?php echo $position->company_name; ?></td>
                            <td><a href="/expert_system/views/view_position.php?id=<?php echo $position->position_id; ?>&company_id=<?php echo $position->company_id; ?>" target="_blank">View More</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>    
        <?php endif; ?>
        <?php if(!empty($positions_by_experience)) : ?>
            <div id="by-experience" class="positions" style="display: none;">
                <h3>Proposed Positions By Your Experience</h3>  
                <table border="1">
                        <th>№</th>
                        <th>Position Name</th>
                        <th>Company Name</th>
                        <th>More Information</th>
                        <?php foreach ($positions_by_experience as $key => $position) :?>
                            <?php $most_appropriate_positions[] =  $position->position_id; ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $position->name; ?></td>
                                <td><?php echo $position->company_name; ?></td>
                                <td><a href="/expert_system/views/view_position.php?id=<?php echo $position->position_id; ?>&company_id=<?php echo $position->company_id; ?>" target="_blank">View More</a></td>
                            </tr>
                        <?php endforeach; ?>
                </table> 
            </div>     
        <?php endif; ?>    
        <?php if(!empty($positions_by_technologies)) : ?>
            <div id="by-technology" class="positions" style="display: none;">
                <h3>Proposed Positions By Your Technologies</h3>  
                <table border="1">
                        <th>№</th>
                        <th>Position Name</th>
                        <th>Company Name</th>
                        <th>More Information</th>
                        <?php foreach ($positions_by_technologies as $key => $position) :?>
                            <?php $most_appropriate_positions[] =  $position->position_id; ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $position->name; ?></td>
                                <td><?php echo $position->company_name; ?></td>
                                <td><a href="/expert_system/views/view_position.php?id=<?php echo $position->position_id; ?>&company_id=<?php echo $position->company_id; ?>" target="_blank">View More</a></td>
                            </tr>
                        <?php endforeach; ?>
                </table> 
            </div>     
        <?php endif; ?>   
        <?php if(!empty($positions_by_ides)) : ?>
            <div id="by-ide" class="positions" style="display: none;"> 
                <h3>Proposed Positions By Your IDEs</h3>  
                <table border="1">
                        <th>№</th>
                        <th>Position Name</th>
                        <th>Company Name</th>
                        <th>More Information</th>
                        <?php foreach ($positions_by_ides as $key => $position) :?>
                            <?php $most_appropriate_positions[] =  $position->position_id; ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $position->name; ?></td>
                                <td><?php echo $position->company_name; ?></td>
                                <td><a href="/expert_system/views/view_position.php?id=<?php echo $position->position_id; ?>&company_id=<?php echo $position->company_id; ?>" target="_blank">View More</a></td>
                            </tr>
                        <?php endforeach; ?>
                </table>  
            </div>    
        <?php endif; ?>  
        <?php if(!empty($positions_by_languages)) : ?>       
            <div id="by-language" class="positions" style="display: none;">
                <h3>Proposed Positions By Your Program Languages</h3>  
                <table border="1">
                        <th>№</th>
                        <th>Position Name</th>
                        <th>Company Name</th>
                        <th>More Information</th>
                        <?php foreach ($positions_by_languages as $key => $position) :?>
                            <?php $most_appropriate_positions[] =  $position->position_id; ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $position->name; ?></td>
                                <td><?php echo $position->company_name; ?></td>
                                <td><a href="/expert_system/views/view_position.php?id=<?php echo $position->position_id; ?>&company_id=<?php echo $position->company_id; ?>" target="_blank">View More</a></td>
                            </tr>
                        <?php endforeach; ?>
                </table>   
            </div>    
        <?php endif; ?>
        <?php 
            $position_ids = getMostAppropriatePositionsId($most_appropriate_positions); 
            $full_data = selectFullDataByIds($position_ids);
        ?>
        <?php if (!empty($full_data)) : ?>
            <div id="most-appropriate" class="positions">
                <h3>Most Appropriate Positions</h3>
                <table border="1">
                        <th>Position Name</th>
                        <th>Company Name</th>
                        <th>More Information</th>
                        <?php foreach ($full_data as $key => $data) :?>
                            <?php if ($current_data->experience < $data->experience) : ?>
                                <?php continue; ?>
                            <?php else : ?>
                                <tr>
                                    <td><?php echo $data->name; ?></td>
                                    <td><?php echo $data->company_name; ?></td>
                                    <td><a href="/expert_system/views/view_position.php?id=<?php echo $data->position_id; ?>&company_id=<?php echo $data->company_id; ?>" target="_blank">View More</a></td>
                                </tr>
                            <?php endif; ?>    
                        <?php endforeach; ?>
                </table>
            </div>    
        <?php endif; ?> 
        <br/><br/> 
        <label for="show-positions">Find Positions</label>
        <select id="show-positions">
            <option value="most-appropriate">Most Appropriate</option>
            <option value="by-ide">By My IDEs</option>
            <option value="by-language">By My Languages</option>
            <option value="by-technology">By My Technology</option>
            <option value="by-salary">By My Salary</option>
            <option value="by-experience">By My Experience</option>
        </select>  
<?php
include_stylesheets();
include_scripts(); 
get_footer();
?>        