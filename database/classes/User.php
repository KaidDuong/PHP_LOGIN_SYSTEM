<?php
//if there is no constant defined called __CONFIG__ , do not load this file
if(!defined('__CONFIG__'))
{
    exit("you do not have a config file");
}

class User{

    private $con;
    public $email;
    public $reg_time;
    public $user_id;

    public function __construct(int $user_id )
    {
        $this->con = DB::getConnection();

        $user_id= Filter::Int($user_id);

        $user=$this->con->prepare("SELECT user_id, email,reg_time FROM users Where user_id= :user_id LIMIT 1");
        $user->bindParam(':user_id',$user_id,PDO::PARAM_INT);
        $user->execute();

        if($user->rowCount()==1){
            $user =$user->fetch(PDO::FETCH_OBJ);

            $this->email= (string)$user->email;
            $this->user_id=(int)$user->user_id;
            $this->reg_time=(string)$user->reg_time;
        
        }else{
            //no user was found
            //redirect to logout
            header("Location: ../source/logout.php");exit;
        
        }
    }

    //Find User in database
public static function Find( $email, $return_ASSOC = false)
{
    
    $con= DB::getConnection(); 

    $email=(string) Filter::String($email);

    $findUser=$con->prepare("SELECT user_id,password FROM users WHERE email = LOWER(:email) LIMIT 1");
    $findUser->bindParam(':email',$email,PDO::PARAM_STR);
    $findUser->execute();
    
    if($return_ASSOC){

        return $findUser->fetch(PDO::FETCH_ASSOC);

    }
    $User_found=(boolean)$findUser->rowCount();

    return $User_found;

}
}



?>