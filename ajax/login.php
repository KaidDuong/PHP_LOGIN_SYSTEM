
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
    $findUser= $con->prepare("SELECT user_id,password from users where email= LOWER(:email) LIMIT 1");
    $findUser->bindParam(':email',$email,PDO::PARAM_STR);
    $findUser->execute();

    if($findUser->rowCount()==1)
    {
       
    //user exists, try and sign them in 
    
    $User=$findUser->fetch(PDO::FETCH_ASSOC);
    
    $user_id = (int) $User['user_id'];
    $hash = (string)$User['password'];
    
   
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