<?php 
    if (!isset($page_title)) {          // if page_title is not available then display "Staff Area"
        $page_title = "Staff Area";
    }
?>

<!doctype html>

<html lang="en">

<head>
    <title>GBI <?php echo htmlspecialchars($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/staff.css'); ?>" media="all">
</head>

<body>
    <header>
        <h1>GBI Staff Area</h1>
    </header>

    <nav>
        <ul>
            <li><a href="<?php echo url_for('/staff/index.php') ?>">Menu</a></li>
        </ul>
    </nav>