<?php


class Content extends CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }

   

    function getSliderContent()
    {

      $q = $this
              ->db
              ->get('home_slider');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

     function getActiveSliders()
    {

      $q = $this
              ->db
              ->where('is_active','1')
              ->get('home_slider');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false; 

    }

    function getSliderByID($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('home_slider');

           if($q->num_rows >0){
              return $q->row();
           } 

           return false;
    }

    function getSliderByIDArray($id)
    {

      $q = $this
              ->db
              ->where('id',$id)
              ->limit(1)
              ->get('home_slider');

           if($q->num_rows >0){
              return $q->row_array();
           } 

           return false;
    }

    function getSlidersWhere($where)
    {

      $q = $this
              ->db
              ->where($where)
              ->get('home_slider');

           if($q->num_rows >0){
              return $q->result();
           } 

           return false;
    }




    function insertSlide($params)
    {
      $query = $this->db->insert_string('home_slider', $params);
      $query = $this->db->query($query);

      if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
    }

    function updateSlide($id,$params)
     {
         $q = $this
              ->db
              ->where('id',$id)
              ->update('home_slider',$params);

       if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
     }


    function deleteSlide($id)
    {

        $slide = $this->getSliderByID($id);
        // $slideOrder = $slide->order;

        // $where = array('order >' => $slideOrder);
        // $sliders = $this->getSlidersWhere($where);

        

        $q = $this
              ->db
              ->where('id',$id)
              ->delete('home_slider');

          if($this->db->affected_rows() != 1){
            return false;
          }


         //  foreach ($sliders as $slide) {
         //    $update = array('order'=>$slide->order-1);
         //    $this->updateSlide($slide->id,$update);
         // }


          return true;

          
    }



  
   

}


