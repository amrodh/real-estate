<?php
class Hooks {
    var $CI;
    function Hooks()
    {
        $this->CI =& get_instance();
        if(!isset($this->CI->session))  
        $this->CI->load->library('session'); 
    }
    
    function checkSession()
    {
        
        // $url = explode("/", $_SERVER['REQUEST_URI']);
        // //printme($url);exit();
        //  if(count($url) <= 2)
        //     return;

        // $userdata = $this->CI->session->userdata;
        // if(count($userdata) == 0){
        //     //printme($url);exit();
        //     redirect($url[1]);
        // }
    }


}?>