<?php


class office extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    

    

     
    function getOffices()
    {

      $q = $this
              ->db
              ->get('office');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }



    function deleteOffice($id)
    {
      $q = $this
              ->db
              ->where('id',$id)
              ->delete('office');

          if($this->db->affected_rows() != 1){
            return false;
          }

          return true;
    }


  


    function getOfficeByID($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('office');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 

    }


    function update($id,$params)
    {
       $q = $this
              ->db
              ->where('id',$id)
              ->update('office',$params);

       if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
    }

     function getArray($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('office');

           if($q->num_rows >0){
              return $q->row_array();
           } 

           return false; 

    }



   function insertOffice($params)
   {  

      $query = $this->db->insert_string('office', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;

   }


   

  

   
   




  
  

  
  


    
}


