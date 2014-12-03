<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$hook['post_controller'] = array(
                                'class'    => 'Hooks',
                                'function' => 'checkSession',
                                'filename' => 'admin.php',
                                'filepath' => 'hooks',
                                'params'   => ''
                                );




?>