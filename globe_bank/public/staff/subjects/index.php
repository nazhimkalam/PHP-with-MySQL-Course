<?php require_once('../../../private/initialize.php')?>

<?php 

    //  this is a query string which is passed into a variable $subject_query
    $subject_query = "SELECT * FROM subjects ORDER BY position ASC";

    // getting the  RESULT SET from the executed query STRING
    $subject_result_set = mysqli_query($db, $subject_query);

    // checking result set available or not using the function you created in the database.php file
    confirm_result_set($subject_result_set,$subject_query);

?>

<?php $page_title = 'Subjects'; ?>
<!--setting a variable in php-->
<?php include(SHARED_PATH . '/staff_header.php') ?>

<div id="content">
    <div class="subjects listing">
        <h1>Subjects</h1>

        <div class="actions">
            <a class="action" href="<?php echo url_for('/staff/subjects/new.php'); ?>">Create New Subjects</a>
        </div>

        <table class="list">
            <tr>
                <th>ID</th>
                <th>Position</th>
                <th>Visible</th>
                <th>Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

            <!-- The code below is looping through the subject called $subject_result_set and creating a row for it -->

            <?php while($element = mysqli_fetch_assoc($subject_result_set)) { ?>

            <tr>
                <td> <?php echo $element['id']; ?></td>
                <td> <?php echo $element['position']; ?></td>
                <td> <?php echo $element['visible'] == 1 ? 'true' : 'false'; ?></td>
                <td> <?php echo $element['menu_name']; ?></td>

                <td> <a class="action" href="<?php echo url_for('staff/subjects/show.php?id='.htmlspecialchars(urldecode($element['id']))
                        .'&menu_name='.htmlspecialchars(urldecode($element['menu_name'])));?>">
                        View </a>
                </td>

                <td> <a class="action"
                        href="<?php echo url_for('/staff/subjects/edit.php?id='.htmlspecialchars(urldecode($element['id']))); ?>">
                        Edit </a> </td>
                <td> <a class="action" href=""> Delete </a> </td>
            </tr>

            <?php } ?>
        </table>

        <?php
            // EMPTYING THE subject_result_set BECAUSE WE NO LONGER NEED THAT QUERY RESULT
            mysqli_free_result($subject_result_set);
        ?>

    </div>
</div>

<!-- We call the footer to be displayed over here -->
<?php include(SHARED_PATH . '/staff_footer.php')?>