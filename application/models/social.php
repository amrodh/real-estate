<?php


class Social extends CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }


    function insert($params)
   {  

      $query = $this->db->insert_string('social_links', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;

   }

   function update($id,$params)
     {
         $q = $this
              ->db
              ->where('id',$id)
              ->update('social_links',$params);

       if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
     }


    function delete($id)
    {
      $q = $this
              ->db
              ->where('id',$id)
              ->delete('social_links');

          if($this->db->affected_rows() != 1){
            return false;
          }

          return true;
    }
  
   function getAll()
    {

      $q = $this
              ->db
              ->get('social_links');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

}


