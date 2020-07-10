<?php class User{

	private $id;
	private $user;
	private $password;

    public static function loadUser($user){
     $sql = new Database();

		$results = $sql->select("SELECT * FROM users WHERE user = :USER", array(
			":USER"=>$user
		));

		if (count($results) > 0) {
        $row = $results[0];
        return $row;
    	}
    
    }
    public static function authUser($user , $pass){
		$theUser = User::loadUser($user);		
		if(!empty($theUser)){        
        if(password_verify($pass , $theUser['password'])){
        	$_SESSION['user'] = $user;
    		header("Location: restrict.php");
        }else{
        echo "Usuário ou senha inválidos";
        }
		}else{
		echo "Usuário ou senha inváidos";	
		}
	}	
}