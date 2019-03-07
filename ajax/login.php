
<?php 
//allow the config
define('__CONFIG__',true);
//require the config
require_once "../inc/config.php";


//sever is a global variable 
if($_SERVER['REQUEST_METHOD']=='POST'  )
{
    //alway return json format
    header('Content-Type: application/json');
   
    $return=[];
    $email=Filter::String( $_POST['email']);
    $password=$_POST['password'];

    // make sure the user does not exist
    $User_found= User::Find($email,true);
    
    if($User_found)
    {
       
    //user exists, try and sign them in 
    $user_id = (int)  $User_found['user_id'];
    $hash = (string) $User_found['password'];
    
   
if(password_verify($password, $hash)){
    //user is signed in
    $return['redirect']='../source/dashboard.php';

    $_SESSION['user_id']=$user_id;
    
}else{
    //Invalid user email/passwoed combo
    $return['error']="Invalid user email/password combo";
}
    $return['error']= "You already have an account";
    

    }else{
    //they need to create a new account
    $return['error']="You do not have an account. <a href='../source/register.php'>Create one new account now?</a> ";
     }

     //make sure the user can be added and is added
    // return the proper information back to javascript to redirext us.

    echo json_encode($return,JSON_PRETTY_PRINT);
    exit;
}else {
    //DIE .Kill the script.Redirect the user. Do something regardless
    exit("Invalid URL!!!");
      }

?>