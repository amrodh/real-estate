<?php


class User extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    

    function logIn($username,$password)
    { 
      $user = $this->getUserByUsername($username);
      $password = passwordEncryption($password,$user->password_salt);

      if($password == $user->password){
        return true;
      }else{
        return false;
      }
      
    }



    function getUsersLimit($limit=null)
    {   
        if(!$limit)
          $limit = 100;
        $q = $this
              ->db
              ->select('username,email,date_joined,is_active,is_valid,first_name,last_name,gender')
              ->limit($limit)
              ->order_by('date_joined','desc')
              ->get('user');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 
    }

    function deleteUser($username)
    {
      $q = $this
              ->db
              ->where('username',$username)
              ->delete('user');

          if($this->db->affected_rows() != 1){
            return false;
          }

          return true;
    }


     function updateUser($id,$params)
     {
         $q = $this
              ->db
              ->where('id',$id)
              ->update('user',$params);

       if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
     }

    function getAllUsers($argument=null)
    {

      if(!$argument)
       $default = 'id,username,email,date_joined,is_active,is_valid,first_name,last_name';
      else
        $default = $argument;
      $q = $this
              ->db
              ->select($default)
              ->order_by('date_joined','desc')
              ->where('id !=',1)
              ->get('user');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

    function getUserByUsername($username)
     {
          $q = $this
              ->db
              ->where('username',$username)
              ->limit(1)
              ->get('user');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false;  
     }


      function getUserArray($username)
     {
          $q = $this
              ->db
              ->where('username',$username)
              ->limit(1)
              ->get('user');

           if($q->num_rows >0){
              return $q->row_array();
           } 

           return false;  
     }

     function getUserFavorites($id)
     {
          $q = $this
              ->db
              ->where('user_id',$id)
              ->get('user_favorites');

           if($q->num_rows >0){
              return $q->result();
           } 
           return false; 
     }

     function insertFavorite ($params)
     {
          $query = $this->db->insert_string('user_favorites', $params);
          $query = $this->db->query($query);
          if($this->db->affected_rows() != 1){
            return false;
          }
          return true;
     }

     function deleteFavorite ($userID, $propertyID)
     {

          $q = $this
              ->db
              ->where('user_id',$userID)
              ->where('property_id', $propertyID)
              ->delete('user_favorites');
          if($this->db->affected_rows() != 1){
            return false;
          }
          return true;
     }

     function getRootByUsername($username)
     {
        $q = $this
              ->db
              ->where('username',$username)
              ->where('id',1)
              ->limit(1)
              ->get('user');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 
     }

     function getUserByEmail($email)
     {
          $q = $this
              ->db
              ->where('email',$email)
              ->limit(1)
              ->get('user');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false;  
     }

     function insertTempEmail($id,$email,$type)
     {
          $q = $this
              ->db
              ->where('user_id',$id)
              ->delete('user_validation');

           
          $this->updateUser($id,array("is_valid"=>0));
              
          $params = array();
          $params['user_id'] = $id;
          $params['email']   = $email;
          $params['token']   = tokenGenerator();
          $params['is_valid'] = 1;
          $params['type'] = $type;

          $query = $this->db->insert_string('user_validation', $params);
          $query = $this->db->query($query);

          if($this->db->affected_rows() != 1){
              return false;
            }
            return true;
     }

      function checkToken($token)
      {
          $q = $this
              ->db
              ->where('token',$token)
              ->limit(1)
              ->get('user_validation');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 
      }

      function getToken($token)
      {
          $q = $this
              ->db
              ->where('id',$token)
              ->limit(1)
              ->get('user_validation');
           if($q->num_rows >0){

              return $q->row();
           } 

           return false; 
      }

      function getUserByID($ID)
     {
          $q = $this
              ->db
              ->where('id',$ID)
              ->limit(1)
              ->get('user');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false;  
     }

   function insertUser($params)
   {  
      $salt = saltGenerator();
      $params['password_salt'] = $salt;
      $params['password'] = passwordEncryption($params['password'],$salt);
      $query = $this->db->insert_string('user', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;

   }

   function updatePassword($userId, $password){
      $user = $this->getUserByID($userId);
      $salt = $user->password_salt;
      $params['password'] = passwordEncryption($password,$salt);
      $update = $this->updateUser($userId,$params);
      if ($update){
          $validation = array('is_valid' => 1);
          $this->updateUser($userId, $validation);
          return true;
      }
      else
        return false;
   }


   function changePassword($userID,$current,$new)
   {
      $user = $this->getUserByID($userID);
      $currentPassword = passwordEncryption($current,$user->password_salt);
      if($currentPassword == $user->password){
        $params = array(
               'password' => passwordEncryption($new,$user->password_salt),
            );
        $update = $this->updateUser($userID,$params);
        if($update)
          echo 'true';
        else
          echo 'false';
      }else{
        echo 'false';
      }
      exit();
   }

   function getAllNewsletterData()
    {

      $q = $this
              ->db
              ->get('user_newsletter');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }


   function insertNewsletterData($params)
   {

      $query = $this->db->insert_string('user_newsletter', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }
        return true;
   }


   function deleteNewsletterData($id)
   {

      $q = $this
              ->db
              ->where('id',$id)
              ->delete('user_newsletter');

          if($this->db->affected_rows() != 1){
            return false;
          }

          return true;
   }


   function is_subscribed($userID)
   {
      $q = $this
            ->db
            ->select('*')
            ->where('user_identifier',$userID)
            ->get('user_newsletter');

      if($q->num_rows >0){
              return true;
           } 

           return false; 
   }


   function getSubscribedUsers()
   {
   	 $q = $this
              ->db
              ->order_by('date_joined','desc')
              ->get('user_newsletter');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false;
   }

   function insertContactInformation($params, $interests)
   {
        $interestArray = array();

        $query = $this->db->insert_string('contacts', $params);
        $query = $this->db->query($query);

        $id = $this->db->insert_id();

        if($this->db->affected_rows() != 1){
            return false;
        }else{
            foreach ($interests as $interest) {
                $interestArray['userid'] = $id;
                $interestArray['interest'] = $interest;
                $query = $this->db->insert_string('contacts_interest', $interestArray);
                $query = $this->db->query($query);
            }
            return true;
        }
            
   }


   function populateDB()
   {
    $males =" Foster  
              Alfonzo  
              Ross  
              Rodolfo  
              Nelson  
              Grady  
              Genaro  
              Kip  
              Bradley  
              Cedric  
              Marco  
              Warren  
              Freddie  
              Hank  
              Timmy  
              Erin  
              Alfredo  
              Travis  
              Neal  
              Guadalupe  
              Danilo  
              Matthew  
              Alonso  
              Walter  
              Hubert  
              Tory  
              Jayson  
              Collin  
              Erich  
              Andreas  
              Jan  
              Victor  
              Brady  
              Marcelino  
              Willie  
              Wilson  
              Virgil  
              Damion  
              Mike  
              Terrence  
              Mario  
              Dwight  
              Chadwick  
              Raul  
              Rey  
              Edward  
              Kirk  
              Raymon  
              Merle  
              Teodoro  
              Hugh  
              Jacques  
              Tomas  
              Hong  
              Margarito  
              Mel  
              Luis  
              Wally  
              Deangelo  
              Kenny  
              Lane  
              Benito  
              John  
              Rufus  
              Frankie  
              Rudolf  
              Lucas  
              Darius  
              Jesus  
              Royal  
              Refugio  
              Samual  
              Jim  
              Orlando  
              Dan  
              Elijah  
              Shirley  
              Ward  
              Manuel  
              Jon  
              Edmond  
              Edgar  
              Leonard  
              Jae  
              Odis  
              Gregorio  
              Rich  
              Kristopher  
              Ali  
              Lou  
              Steven  
              Amado  
              Jamey  
              Houston  
              Cortez  
              Miguel  
              Dorsey  
              Erasmo  
              Randall  
              Russ  
              Lance  
              Rayford  
              Porfirio  
              Mitch  
              Ivory  
              Lewis  
              Jamey  
              Alfonso  
              Kenneth  
              Efrain  
              Bradley  
              Burt  
              Colton  
              Hank  
              Lowell  
              Dwight  
              Garrett  
              Rudolf  
              Ramiro  
              Isaias  
              Nolan  
              Spencer  
              Merrill  
              Charley  
              Ismael  
              Giovanni  
              Wm  
              Williams  
              Luciano  
              Buddy  
              Dudley  
              Alfredo  
              Stanford  
              Lloyd  
              Art  
              Kelley  
              Jordan  
              Carson  
              Elisha  
              Elroy  
              Mark  
              Kendrick  
              Milo  
              Claude  
              Blake  
              Lindsey  
              Scottie  
              Armando  
              Ervin  
              Harrison  
            ";
    $females = "Leora  
                Odette  
                Edith  
                Britteny  
                Silvana  
                Beverly  
                Yee  
                Jolie  
                Debrah  
                Karima  
                Cleopatra  
                Lida  
                Marybelle  
                Louella  
                Lizzie  
                Maricela  
                Louvenia  
                Vashti  
                Tanya  
                Kia  
                Madelaine  
                Katharyn  
                Kenyetta  
                Evie  
                Rachell  
                Fransisca  
                Rashida  
                Theresia  
                Marsha  
                Caitlyn  
                Rochelle  
                Carline  
                Terese  
                Neva  
                Elise  
                Rosena  
                Shenna  
                Annabell  
                Doloris  
                Alysha  
                Dina  
                Rhonda  
                Kristi  
                Kyla  
                Trisha  
                Margot  
                Lakeshia  
                Priscila  
                Delila  
                Elin  
                Reena  
                Jung  
                Adrianne  
                Floretta  
                Katherine  
                Lakiesha  
                Ling  
                Cecila  
                Jesica  
                Deedee  
                Marquita  
                Antonietta  
                Dung  
                Joselyn  
                Alda  
                Blythe  
                Gladis  
                Gudrun  
                Shauna  
                Ivana  
                Tempie  
                Mikki  
                Renda  
                Fawn  
                Paola  
                Sheridan  
                Asia  
                Aline  
                Sharie  
                Annette  
                Maia  
                Allie  
                Marylouise  
                Malorie  
                Mona  
                Yahaira  
                Mathilde  
                Ladawn  
                Phung  
                Shaquita  
                Lavonda  
                Angla  
                Margart  
                Lezlie  
                Nathalie  
                Keira  
                Ebonie  
                Raquel  
                Kara  
                Lashell  
                Cora  
                Marhta  
                Nakita  
                Eneida  
                Ranee  
                Cheryle  
                Helaine  
                Terrie  
                Mitzi  
                Luba  
                Arie  
                Chassidy  
                Patty  
                Argentina  
                Ema  
                Mariela  
                Lelia  
                Lydia  
                Ena  
                Exie  
                Lakia  
                Lashon  
                Malka  
                Mercy  
                Rolande  
                Shavonne  
                Danica  
                Arletta  
                Toya  
                Bertha  
                Sherrill  
                Mathilda  
                Shira  
                Miranda  
                Valencia  
                Berta  
                Terese  
                Sondra  
                Rosann  
                Gita  
                Blossom  
                Tresa  
                Wanita  
                Samara  
                Sheba  
                Margot  
                Viola  
                Nikki  
                Alina  
                Britteny  
" ; 
    $males = array_filter(explode('  ', trim($males)));
    $females = array_filter(explode('  ', trim($females)));
    $jobs = array("Software Developer","Computer Systems Analyst","Dentist","Nurse Practitioner","Pharmacist","Registered Nurse","Physical Therapist","Physician","Web Developer","Dental Hygienist","Database Administrator","Physician Assistant","Occupational Therapist","Market Research Analyst","Phlebotomist","Civil Engineer","Mechanical Engineer","High School Teacher","Teacher","Unemployed");

      $inputs = array();
      $inputs['gender'] = rand(0,1);
      if($inputs['gender'] == 1){
        $inputs['first_name'] = trim($males[array_rand($males, 1)]);
        $inputs['last_name'] = trim($males[array_rand($males, 1)]);
      }else{
        $inputs['first_name'] = trim($females[array_rand($females, 1)]);
        $inputs['last_name'] = trim($females[array_rand($females, 1)]);
      }
      
      $inputs['first_name'] = preg_replace("/[^A-Za-z0-9]/", '', $inputs['first_name']);
       $inputs['last_name'] = preg_replace("/[^A-Za-z0-9]/", '', $inputs['last_name']);
      $inputs['username'] = $inputs['first_name'].'.'.$inputs['last_name'].'_'.rand(100,10000);
      $inputs['email'] = $inputs['username'].'@test.com';
      $inputs['password_salt'] = saltGenerator();
      $inputs['password'] = passwordEncryption('testtest',$inputs['password_salt']);
      $inputs['is_active'] = rand(0,1);
      $inputs['is_valid'] = rand(0,1);
      $inputs['location'] = "Egypt";
      $inputs['phone'] = rand(1000000,999999999);
      unset($inputs['gender']);
      $query = $this->db->insert_string('user', $inputs);
      $query = $this->db->query($query);
   }

  
  

  
  


    
}


