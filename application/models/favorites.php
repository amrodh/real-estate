<?php


class Favorites extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

     
    function getUserFavorites($userID)
    {

      $q = $this
              ->db
              ->where('user_id',$userID)
              ->get('user_favorites');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }
   
function test()
{
  //for ($i=0; $i < 100 ; $i++) { 
    //  $this->populateDB();
  //}
}



   function populateDB()
   {

      $users = range(4,103);
      foreach ($users as $userID ) {
          for ($i=0; $i < 4 ; $i++) { 

             $inputs = array();
             $query = $this->db->query("
                     SELECT id FROM property ORDER BY rand() limit 1 ");
             $inputs['user_id'] = $userID;
             $inputs['property_id'] = $query->result_array()[0]['id'];
             $query = $this->db->insert_string('user_favorites', $inputs);
             $query = $this->db->query($query);
          }

      }
      $query = $this->db->insert_string('user_favorites', $inputs);
      $query = $this->db->query($query);
   }

  
  

  
  


    
}


