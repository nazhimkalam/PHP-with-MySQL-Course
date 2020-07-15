<?php 
    require_once('../../../private/initialize.php');

    // this is to deal with errors
    $test = $_GET['test'] ?? '';
    
    if($test == '404'){
        error_404();
    }else if($test == '500'){
        error_500();
    }else if($test == 'redirect'){
        redirect_to(url_for('/staff/subjects/index.php'));
    }

    // setting the subject count
    $subjects_set = find_all_subjects(); // loading all the available subjects in to an array
    $subject_count  = mysqli_num_rows($subjects_set) + 1; 
    mysqli_free_result($subjects_set);

    $subject_data =[];
    $subject_data['position'] = $subject_count;
?>

<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject new">
        <h1>Create Subject</h1>

        <form action="<?php echo url_for('/staff/subjects/create.php') ?>" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menu_name" value="" /></dd>
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
                    <input type="checkbox" name="visible" value="1" />
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Create Subject" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>