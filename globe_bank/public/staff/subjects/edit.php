<?php

require_once('../../../private/initialize.php');

// if id not available in the url then re direction happens
if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/subjects/index.php'));
}

// variable 
$id = $_GET['id'];  // gets the id value and stores it into a variable

//------- EXECUTES WHEN THE SUBMIT BUTTON IS CLICKED--------------- when submit button is clicked then page refreshes and entire code runs again
if(is_post_request()) { //checks if it is a POST request

  // the code below in this block runs when the submit button ("Edit Subject") is clicked

  $subject = [];
  $subject['menu_name'] = $_POST['menu_name'] ?? '';
  $subject['position'] = $_POST['position'] ?? '';
  $subject['visible'] = $_POST['visible'] ?? '';
  $subject['id'] = $id ?? '';

  updating_record_in_database($subject);
  redirect_to(url_for('/staff/subjects/show.php?id=' .$id));

}else{
  $subject_data = find_subjects_by_id($id);

  $subjects_set = find_all_subjects(); // loading all the available subjects in to an array
  $subject_count  = mysqli_num_rows($subjects_set); // returns the number of rows available in the subjects table, this is used to make the drop down list for the options in the position
  mysqli_free_result($subjects_set);
}
//-------------------------------------------------------------------------------------------------

?>

<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject edit">
        <h1>Edit Subject</h1>

        <form action="<?php echo url_for('/staff/subjects/edit.php?id=' .htmlspecialchars(urldecode($id))); ?>"
            method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menu_name"
                        value="<?php echo htmlspecialchars($subject_data['menu_name']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
                        <?php
                          for($i=1; $i <= $subject_count; $i++) {
                            echo "<option value=\"{$i}\"";
                            if($subject_data["position"] == $i) {
                              echo " selected";
                            }
                            echo ">{$i}</option>";
                          }
                        ?>
                    </select>

                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd>
                    <input type="hidden" name="visible" value="0" />
                    <input type="checkbox" name="visible" value="1"
                        <?php if($subject_data['visible']=="1") { echo " checked"; } ?> />
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Subject" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>