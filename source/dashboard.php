
<?php 
//allow the config
define('__CONFIG__',true);
//require the config
require_once "../inc/config.php";

Page::ForceLogin();

$User =new User($_SESSION['user_id']);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />
</head>
<body>
<div class="uk-section uk-container ">
<h2>Dashboard</h2>
<p>Hello <?php echo $User->email ;?>, you registered at <?php  echo $User->reg_time; ?></p>
<p> <a href="../source/logout.php"><h3>Logout</h3></a> </p>

</div>
<?php require_once "../inc/footer.php"; ?>

</body>
</html>