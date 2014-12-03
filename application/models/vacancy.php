<?php


class Vacancy extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    

    

     
    function getVacancies()
    {

      $q = $this
              ->db
              ->where('id !=',11)
              ->get('vacancy');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }



    function delete($id)
    {
      $q = $this
              ->db
              ->where('id',$id)
              ->delete('vacancy');

          if($this->db->affected_rows() != 1){
            return false;
          }

          return true;
    }


    function getAllVacancies()
    {

      $q = $this
              ->db
              ->get('vacancy');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }


    function getVacancyByName($name)
    {

      $q = $this
              ->db
              ->where('name',$name)
              ->limit(1)
              ->get('vacancy');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 

    }


   function insertVacancy($params)
   {  

      $query = $this->db->insert_string('vacancy', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;

   }


    function getVacancyByID($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('vacancy');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 

    }


      function getArray($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('vacancy');

           if($q->num_rows >0){
              return $q->row_array();
           } 

           return false; 

    }


     function update($id,$params)
     {
         $q = $this
              ->db
              ->where('id',$id)
              ->update('vacancy',$params);

       if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
     }


    function getUsersEnrolled($vacancy_id)
    {
         $q = $this
              ->db
              ->where('vacancy_id',$vacancy_id)
              ->get('enrollment');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 
    }


    function insertEnrollment($params)
    {
      $query = $this->db->insert_string('enrollment', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
    }

     

   




   function populateDB()
   {
        exit();
        $vacancies = $this->getVacancies();
        foreach ($vacancies as $vacancy) {
            
            for ($i=0; $i < 10; $i++) { 

                  $params['vacancy_id'] = $vacancy->id;
                  $params['cv'] = 'test.pdf';
                  $toss = rand(0,1);
                  if($toss == 1){
                     $query = $this->db->query("
                           SELECT id,first_name,last_name FROM user ORDER BY rand() limit 1 ");
                     $params['user_identifier'] = $query->result_array();
                     $params['user_identifier'] = $params['user_identifier'][0]['id'];
                     $params['first_name'] = $query->result_array();
                     $params['first_name'] = $params['first_name'][0]['first_name'];
                     $params['last_name'] = $query->result_array();
                     $params['last_name'] = $params['last_name'][0]['last_name'];
                  }else{
                    $params['user_identifier'] = 'test@test.com';
                    $params['first_name'] = 'test';
                    $params['last_name'] = 'test';
                  }

                    $this->insertEnrollment($params);
            }
           

        }
      
   }

  
  

  
  


    
}


