<?php


class Unit extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    

    function delete($id)
    {
      $q = $this
              ->db
              ->where('id',$id)
              ->delete('unit');

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
              ->update('unit',$params);

       if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
     }



     function insert($params)
   {  

      $query = $this->db->insert_string('unit', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;

   }

   function add_unit_image($params)
   {
      $query = $this->db->insert_string('unit_image', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
   }


   function checkUnitName($value)
   {
       $q = $this
              ->db
              ->where('title',$value)
              ->get('unit');

           if($q->num_rows >0){
              return false;
           } 

           return true; 
   }



    function getAll()
    {

      $q = $this
              ->db
              ->get('unit');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }


    function getAllByProjectID($id)
    {

      $q = $this
              ->db
              ->where('project_id',$id)
              ->get('unit');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }



     function getTypes()
    {

      $q = $this
              ->db
              ->get('unit_type');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }


    function get_images($id)
    {
      $q = $this
              ->db
              ->where('unit_id',$id)
              ->get('unit_image');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 
    }


  function insert_image($params)
   {
      $query = $this->db->insert_string('unit_image', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
   }


  // function insert_unit_image($params)
  //  {
  //     $query = $this
  //                 ->db
  //                 ->where()
  //                 ->update('unit', $params); 
      
  //     if($this->db->affected_rows() != 1){
  //         return false;
  //       }

  //       return true;
  //  }


   function get_unit_type($id)
   {
      $q = $this
              ->db
              ->where('id',$id)
              ->get('unit_type');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false;
   }



    function getByID($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('unit');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 

    }


    function getProjectByUnit($unit_name)
    {

      $q = $this
              ->db
              ->where('title',$unit_name)
              ->limit(1)
              ->get('unit');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 

    }


    function getByProjectID($id)
    {

      $q = $this
              ->db
              ->where('project_id',$id)
              ->limit(1)
              ->get('unit');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 

    }

     function getFeatured()
    {

      $q = $this
              ->db
              ->where('is_featured',1)
              ->get('unit');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

    function getFeaturedImage($id)
    {
      $q = $this
              ->db
              ->where('unit_id',$id)
              ->limit(1)
              ->get('unit_image');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 
    }

    function get_image_ByID($id)
   {
    $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('unit_image');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 
   }

      function delete_image($id)
    {
      $q = $this
              ->db
              ->where('id',$id)
              ->delete('unit_image');

          if($this->db->affected_rows() != 1){
            return false;
          }

          return true;
    }

    
}


