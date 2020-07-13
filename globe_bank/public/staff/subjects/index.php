<?php require_once('../../../private/initialize.php')?>

<?php 

    // Array containing Arrays inside and is assigned into a variable called $subjects
    $subjects = [
        ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'About Globe Bank'],
        ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Consumer'],
        ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
        ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial'],
    ]

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

            <!-- The code below is looping through the array called $subjects and creating a row for it -->
            <?php foreach ($subjects as $element) {?>

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

    </div>
</div>

<!-- We call the footer to be displayed over here -->
<?php include(SHARED_PATH . '/staff_footer.php')?>