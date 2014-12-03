<?php


class Project extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }
    
    function getAll()
    {

      $q = $this
              ->db
              ->get('project');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

     function getByName($name)
    {

      $q = $this
              ->db
              ->where('name',$name)
              ->limit(1)
              ->get('project');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 

    }

    function getByID($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('project');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 

    }



    function delete($id)
    {
      $q = $this
              ->db
              ->where('id',$id)
              ->delete('project');

          if($this->db->affected_rows() != 1){
            return false;
          }

          return true;
    }



  


   function insert($params)
   {  

      $query = $this->db->insert_string('project', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;

   }

   function insert_image($params)
   {
      $query = $this->db->insert_string('project_image', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
   }

   function get_images($id)
   {
       $q = $this
              ->db
              ->where('project_id',$id)
              ->get('project_image');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 
   }


     function update($id,$params)
     {
         $q = $this
              ->db
              ->where('id',$id)
              ->update('project',$params);

       if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
     }


}


