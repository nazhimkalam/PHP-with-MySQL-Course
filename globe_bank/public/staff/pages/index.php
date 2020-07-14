<?php require_once('../../../private/initialize.php'); ?>

<?php
  //  this is a query string which is passed into a variable $page_query
  $page_query = "SELECT * FROM pages ORDER BY subject_id ASC, position ASC";

  // getting the  RESULT SET from the executed query STRING
  $page_result_set = mysqli_query($db, $page_query);

  // checking result set available or not using the function you created in the database.php file
  confirm_result_set($page_result_set,$page_query);
?>

<?php $page_title = 'Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <div class="pages listing">
        <h1>Pages</h1>

        <div class="actions">
            <a class="action" href="<?php echo url_for('/staff/pages/new.php'); ?>">Create New Page</a>
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

            <!-- The code below is looping through the subject called $page_result_set and creating a row for it -->

            <?php while($page = mysqli_fetch_assoc($page_result_set)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($page['id']); ?></td>
                <td><?php echo htmlspecialchars($page['position']); ?></td>
                <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
                <td><?php echo htmlspecialchars($page['menu_name']); ?></td>
                <td><a class="action"
                        href="<?php echo url_for('/staff/pages/show.php?id=' . htmlspecialchars(urldecode($page['id']))); ?>">View</a>
                </td>
                <td><a class="action"
                        href="<?php echo url_for('/staff/pages/edit.php?id=' . htmlspecialchars(urldecode($page['id']))); ?>">Edit</a>
                </td>
                <td><a class="action" href="">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
        <?php
            // EMPTYING THE page_result_set BECAUSE WE NO LONGER NEED THAT QUERY RESULT
            mysqli_free_result($page_result_set);
        ?>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>