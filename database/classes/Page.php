<?php
class Page {
//Force the user to be logged in or redirect
public static function ForceLogin()
{

    if(isset($_SESSION['user_id'])){
        //the user is allowed here
      
    }else{
        //the user is not allowed here
        header("Location: ../source/login.php");exit;
}
}
//Force the user to be

public static function ForceDashboard()
{

    if(isset($_SESSION['user_id'])){
        //the user is allowed here but redirect anyway
        header("Location: ../source/dashboard.php");exit;
    }else{
        //the user is not allowed here
       
}
}
}


?>