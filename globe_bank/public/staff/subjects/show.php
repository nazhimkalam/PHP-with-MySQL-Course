<?php 
    require_once('../../../private/initialize.php');  // loads all the constants and functions we initialized
?>

<?php 
    $id = $_GET['id'] ?? 'no_id'; // ?? means if then condition, means if value is available execute LHS or RHS
?>

<?php 
    $menu_name = $_GET['menu_name'] ?? 'no_name';       // ?? means if then condition, means if value is available execute LHS or RHS
?>

<?php 
    $page_title = 'Subject Page';  // setting the title of the webpage
?>

<?php 
    include(SHARED_PATH.'/staff_header.php');  // calling the common header Module
?>


<div id="content">

    <a class="back-link" href="<?php 
        echo
        url_for('/staff/subjects/index.php');
    ?>">
        &laquo; Back to List
    </a>

    <div class="subject show">
        <br />
        Subject ID: <?php echo htmlspecialchars($id); ?>
        <br />
        Menu Name: <?php echo htmlspecialchars($menu_name) ?>
    </div>
    <br />


    <!-- These are some link examples for explaining purposes -->
    <a href="show.php?name=<?php echo urlencode('John Doe'); ?>">Link 1</a><br />
    <a href="show.php?name=<?php echo urlencode('Widget$More'); ?>">Link 2</a><br />
    <a href="show.php?name=<?php echo urlencode(' !#*?'); ?>">Link 3</a><br />

</div>

<?php include(SHARED_PATH.'/staff_footer.php') ?>