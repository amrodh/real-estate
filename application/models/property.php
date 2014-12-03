<?php


class Property extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    

    function deleteProperty($id)
    {
      $q = $this
              ->db
              ->where('id',$id)
              ->delete('property');

          if($this->db->affected_rows() != 1){
            return false;
          }

          return true;
    }


     function deleteAuction($id)
    {
      $q = $this
              ->db
              ->where('id',$id)
              ->delete('auction');

          if($this->db->affected_rows() != 1){
            return false;
          }

          return true;
    }


     function updateProperty($id,$params)
     {
         $q = $this
              ->db
              ->where('id',$id)
              ->update('property',$params);

       if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
     }

      function updateAuction($id,$params)
     {
         $q = $this
              ->db
              ->where('id',$id)
              ->update('auction',$params);

       if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
     }




    function getAllProperties()
    {

      $q = $this
              ->db
              ->order_by('date_joined','desc')
              ->get('property');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }


    function getPropertyImages($id)
    {
      $q = $this
              ->db
              ->where('property_id',$id)
              ->get('property_image');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 
    }

    function getUserProperties($userID)
    {

      $q = $this
              ->db
              ->where('user_id',$userID)
              ->get('property');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }


    function getPropertyByID($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('property');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 

    }

     function getPropertiesAlert()
    {

      $q = $this
              ->db
              ->get('user_property_alert');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

    function checkNewProperty($where,$data)
    {
      // Call the service and check for new properties
    }


  

     function getAuctions()
    {

      $q = $this
              ->db
              ->get('auction');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

     function getAuctionById($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('auction');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false; 

    }


     function getAuctionByIdArray($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('auction');

           if($q->num_rows >0){
              return $q->row_array();
           } 

           return false; 

    }

    function getRecentAuctions()
    {
      date_default_timezone_set('Europe/London');
      $date = new DateTime('now');
      $date =  $date->format('2014-m-d');

      $q = $this
              ->db
               ->where('date_held <', $date)
              ->order_by('date_held','desc')
              ->get('auction');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

     function getUpcomingAuctions()
    {
      date_default_timezone_set('Europe/London');
      $date = new DateTime('now');
      $date =  $date->format('2014-m-d');

      $q = $this
              ->db
              ->where('date_held >', $date)
              ->order_by('date_held','asc')
              ->get('auction');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

     
   function insertPropertyAlert($params)
   {  

      $query = $this->db->insert_string('user_property_alert', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;

   }


   function testauctions()
   {

    // date_default_timezone_set('Europe/London');
    //   for ($i=1; $i < 11; $i++) { 
    //         $params['title'] = 'Tips for Marketing Your Home to Potential Buyers';
    //         $params['text'] = 'Lorem ipsum dolor sit amet, ex sed partem prompta, ne usu altera maluisset consetetur. Ex vel corpora mnesarchum, te fastidii epicurei qui, ad vidit omnis convenire vel. Qui suas error choro id, nonumy lucilius iudicabit eum et. An per quis vituperatoribus. Utroque veritus mea cu, cum quod mazim ei.';
    //         $params['image'] = 'test.png';

    //         $date = new DateTime(now());
    //         $date->modify('+'.$i.' day');
    //         $params['date_held'] =  $date->format('2014-m-d');
    //         $this->insertAuction($params);
    //         // printme($params);
            
    //   }
   }

   function insertAuction($params)
   {
      $query = $this->db->insert_string('auction', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
   }



   function insertProperty($params)
   {  

      $query = $this->db->insert_string('property', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;

   }

   function insertImage($params)
   {
        $query = $this->db->insert_string('property_image', $params);
        $query = $this->db->query($query);

          if($this->db->affected_rows() != 1){
              return false;
            }

            return true;
   }


   
function test()
{
  for ($i=0; $i < 100 ; $i++) { 
      $this->populateDB();
  }
}



   function populateDB()
   {
      $inputs = array();
      $types = array('Apartment','Furnished Apartment','Chalet','Building','Villas','Land','Shop / Showroom','Office / Company','Other Types');
      $district = array('Greater Cairo','Alexandria','North Coast','Marsa Matruh','Ain ElSokhna','Red Sea / Hurghada','Ras Sidr','Sharm el Sheikh','Dakahlia / Mansoura');
      $inputs['area'] = '2688 SqFt';
      $inputs['type'] = $types[array_rand($types,1)];
      $inputs['district'] = $district[array_rand($types,1)];
      $inputs['address'] = ' 114 Concord Drive , Greenville, NC 27858';
      $inputs['features'] = 'Quiet Neighborhood; New carpet and vinyl flooring; perfect for Investor with Rental $450-$485. Inexpensive Living';
      $inputs['price'] = rand(10000,1000000);
      $inputs['is_valid'] = rand(0,1);
      $inputs['user_id'] = rand(2,103);
      $inputs['city'] = "Egypt";
      $query = $this->db->insert_string('property', $inputs);
      $query = $this->db->query($query);
   }

  
  

  
  


    
}


