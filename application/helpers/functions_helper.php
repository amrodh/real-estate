<?php 


	function printme($field)
	{
		echo '<pre>'.print_r($field,true).'</pre>';
	}

	function saltGenerator()
	{
		return random_string();
	}

	function tokenGenerator()
	{
		$time = time();
		$token = sha1($time.random_string());
		return $token;
	}

	

	function passwordEncryption($string,$random)
	{
		$string = md5(md5($string).$random);
		return $string;
	}

	function uploadMe($object)
	{
		$object->upload->initialize($object->config->config);
	if (!$object->upload->do_upload())
		{
			$error = array('error' => $object->upload->display_errors());
			return $error;
		}
		else
		{
			$data = array('upload_data' => $object->upload->data());
			return $data;
			
		}
	}


	function generateMap($latitude,$longitude,$height,$width)
	{
		echo '
		 <iframe
                  width="'.$height.'"
                  height="'.$width.'"
                  frameborder="0" style="border:0"
                  src="https://www.google.com/maps/embed/v1/view?key=AIzaSyCNNfcTu6tsiWJkLtEZWyaPk2_syUlGue0&center='.$latitude.','.$longitude.'&zoom=18&maptype=satellite">
                </iframe>
		';
	}






	
 ?>