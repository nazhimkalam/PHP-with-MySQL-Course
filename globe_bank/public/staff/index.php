<?php require_once('../../private/initialize.php') // we can't replace the "../../" part with the part 
// format this is because, we create the paths in initialize.php at start so it's not possible to do this ?>

<?php $page_title = 'Staff Menu'; ?>
<!--setting a variable in php-->
<?php include(SHARED_PATH . '/staff_header.php') ?>

<div id="content">
    <div id="main-menu">
        <h2>Main Menu</h2>
        <ul>
            <li><a href="subjects/index.php">Subjects</a></li>
        </ul>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php')?>