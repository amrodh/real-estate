<?php


class Super extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }



    function logIn($username,$password)
    { 
      $user = $this->getSuperByUsername($username);
      $password = passwordEncryption($password,$user->password_salt);

      if($password == $user->password){
        return true;
      }else{
        return false;
      }
      
    }


    function getSuperByUsername($username)
   {
        $q = $this
            ->db
            ->where('username',$username)
            ->limit(1)
            ->get('super_user');

         if($q->num_rows >0){
            return $q->row();
         } 

         return false;  
   }

    
}


