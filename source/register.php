
<?php 
//allow the config
define('__CONFIG__',true);
//require the config
require_once "../inc/config.php";
Page::ForceDashboard();
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
<div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid="">
<form class="uk-form-stacked js-register">
<h2>Register</h2>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Email</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="form-stacked-text1" type="email" placeholder="Some text...">
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Password</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="form-stacked-text2" type="password" placeholder="Some text...">
        </div>
    </div>
    <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none' ></div>
    <div class="uk-margin">
      <button class="uk-button uk-button-default" type="submit">Register</button>
    </div>

</form>
</div>    
</div>
<?php require_once "../inc/footer.php"; ?>

</body>
</html>