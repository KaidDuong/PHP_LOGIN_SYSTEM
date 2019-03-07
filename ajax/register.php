
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

    // make sure the user does not exist
    $User_found= User::Find($email);

    if($User_found)
    {
    //user exists
    //we can also check to see if they are able to log in
    $return['error']= "You already have an account";
    $return['is_logged_in']=false;

    }else{
    //user does not exist. add them now.
     $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
     

    $addUser= $con->prepare("INSERT INTO users ( email ,password) VALUES (LOWER(:email),:password)");
    $addUser->bindParam(':email',$email,PDO::PARAM_STR);
    $addUser->bindParam(':password',$password,PDO::PARAM_STR);
    $addUser->execute();

    $user_id= $con->lastInsertId();

    $_SESSION['user_id']=(int)$user_id;

    $return['redirect']='../source/dashboard.php?Message=Welcome';
    $return['is_logged_in']=true;
     }

     //make sure the user can be added and is added
    // return the proper information back to javascript to redirext us.

     //$return['redirect']='../source/index.php?this-was-a-redirect';
    // $return['name']='Kaid Duong';
    echo json_encode($return,JSON_PRETTY_PRINT);
    exit;
}else {
    //DIE .Kill the script.Redirect the user. Do something regardless
    exit("Invalid URL!!!");
      }

?>