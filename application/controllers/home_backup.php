<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$data['session'] = $this->session;
		$tmp = $this->session->flashdata('loginError');

		if($tmp){
			$data['loginError'] = $this->session->flashdata('loginError');
			$data['login_username'] = $this->session->flashdata('login_username');
			$data['loginErrorType'] = $this->session->flashdata('loginErrorType');
		}

			$data = $this->init();

		$data['title'] = 'ColdWell Banker | Home';	

		//$this->load->model('service');
		$this->load->model('content');

		$data['slides'] = $this->content->getActiveSliders();
		$data['cities'] = $this->database->getCities();

		// printme($this->database->getPropertyTypes(1));exit();

		// $data['propertyType1'] = $this->service->Getpropertytypes(1);
		//$data['propertyType2'] = $this->service->Getpropertytypes(2);

		// $districts = $this->service->getAllDistricts();
		// $neighborhoods = array();
		// foreach ($districts as $key => $district) {
		// 	$neighborhoods[$key] = $this->service->getNeighborhoods($district['id']);
		// }
		//printme($neighborhoods);exit();
		
		// $data['featuredProperties']=$this->service->getFeaturedProperties();
		// foreach ($data['featuredProperties'] as $property) {
		// 	$data['featuredImages'][$property->PropertyId] = $this->service->getPropertyImages($property->PropertyId,$property->UnitId);		
		// }


		$this->load->view($data['languagePath'].'home',$data);
	}


	public function getFeaturedProperties()
	{	
		$data = $this->init();
		$this->load->model('service');

		$data['featuredProperties']=$this->service->getFeaturedProperties();
		 foreach ($data['featuredProperties'] as $property) {
		 	$data['featuredImages'][$property->PropertyId] = $this->service->getPropertyImages($property->PropertyId,$property->UnitId);		
		 }
		 $this->load->view('featuredProperties',$data);
	}

	public function authenticate()
	{
		$this->load->model('user');
		$username = $_POST['username'];
		$password = $_POST['password'];
		$currentUrl = $_POST['currentUrl'];

		// printme($_POST);
		// exit();

		$user = $this->user->getUserByUsername($username);
		if($user){
			$login = $this->user->login($user->username,$password);
			if($login){
				$this->startSession($user);
				redirect($currentUrl);
				exit();
			}else{
				// $data['loginError'] = 'Password is not correct';
				// $data['loginErrorType'] = '1';
				 $this->session->set_flashdata('loginError', 'Password is not correct');
				 $this->session->set_flashdata('loginErrorType', '1');
			}
		}else{
			// $data['loginError'] = 'Username does not exsist';
			// $data['loginErrorType'] = '2';
			 $this->session->set_flashdata('loginError', 'Username does not exist');
			 $this->session->set_flashdata('loginErrorType', '2');

		}
		//printme($currentUrl);exit();
		$this->session->set_flashdata('login_username', $username);
		redirect($currentUrl);

	}





	public function startSession($user)
	{
		$this->session->set_userdata($user);
		// printme($user->id);exit();
		$this->load->model('user');
		$params = array('is_active' => 1);
		$this->user->updateUser($user->id, $params);
	}


	public function logout()
	{	
		$userid = $this->session->userdata['id'];
		$this->load->model('user');
		$params = array('is_active' => 0);
		$this->user->updateUser($userid, $params);
		$this->session->sess_destroy();
		$this->session->unset_userdata();
		redirect($_POST['currentUrl']);
	}

	public function register ()
	{

		$data = $this->init();

		if(isset($data['loggedIn']) && $data['loggedIn'] == 1)
			redirect(base_url());

		$data['title'] = 'ColdWell Banker | Registration';
		$data['countryCodes'] = $this->database->getCountryCodes();
		//printme($data['countryCodes'] );exit();
		if(isset($_POST['submit'])){
			$firstname = $_POST['first_name'];
			$lastname = $_POST['last_name'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$location	 = $_POST['location'];
			$code	 = $_POST['country_Code'];
			$phone	 = $_POST['phone'];
			$password = $_POST['password'];
			$birthday = $_POST['birthday'];
			if (isset($_POST['newsletter']))
			{
				$newsletter = $_POST['newsletter'];
			}
			$data['params'] = $_POST;


			if (empty($_POST['first_name'])){
				$data['firstNameError'] = 'Insert First Name';
			}
			elseif (empty($_POST['last_name'])) {
				$data['lastNameError'] = 'Insert Last Name';
			}elseif (empty($_POST['username'])) {
				$data['usernameError'] = 'Insert Username';
			}elseif (empty($_POST['email'])) {
				$data['emailError'] = 'Insert email';
			}elseif (empty($_POST['location'])){
				$data['locationError'] = 'Insert location';
			}elseif (empty($_POST['phone'])){
				$data['phoneError'] = 'Insert phone number';
			}elseif (empty($_POST['location'])){
				$data['passwordError'] = 'Insert password';
			}elseif (empty($_POST['birthday'])) {
				$data['birthdayError'] = 'Insert birthday';
			}else
			{
				// printme($_POST);exit();
				$user = $this->user->getUserByUsername($username);
				if ($user)
				{
					$data['registrationError'] = 'Username already exists';
				}else{
					$userData = array('username' => $_POST['username'],
						'email' => $_POST['email'],
						'first_name' => $_POST['first_name'],
						'last_name' => $_POST['last_name'],
						'location' => $_POST['location'],
						'phone' => $_POST['country_Code'].$_POST['phone'],
						'password' => $_POST['password'],
						'birthday' => $_POST['birthday'],
						'is_valid' => 0
						);

					// printme($userData);exit();

					if ($this->user->insertUser($userData))
					{	
						$insertToken = $this->user->insertTempEmail($this->db->insert_id(),$_POST['email'],1);
						$this->registrationValidation($this->db->insert_id());
						$user = $this->user->getUserByUsername($userData['username']);
						$this->startSession($user);

						if (isset($_POST['newsletter']))
						{	
							$params['user_identifier'] = $this->db->insert_id();
							$this->user->insertNewsletterData($params);
						}
						if ($data['language'] !== 'ar' && $data['language'] !== 'en')
						{
							redirect(base_url());
						}else{
							redirect(base_url().$data['language']);
						}
						
					}
				}
			}
		}
		$this->load->view($data['languagePath'].'register',$data);
	}

	public function registrationValidation($id)
	{	
		$token = $this->user->getToken($id);
		$body = '
		Please Validate your account by clicking on the following link 
		</br>
		 <a href="'.base_url().'validate/'.$token->token.'"> Validate My Account</a>
		';
		$this->smtpmailer('Welcome To ColdWell Banker',$body,$token->email, '');
	}

	public function emailUpdateValidation($id)
	{	
		$token = $this->user->getToken($id);
		//printme($token);exit();
		$body = '
		Please Validate updating your email by clicking on the following link 
		</br>
		 <a href="'.base_url().'validate/'.$token->token.'"> Verify Email Update</a>
		';
		$this->smtpmailer('Email Update Verification',$body,$token->email, '');
	}

	public function forgotPasswordValidation($id, $language)
	{
		$token = $this->user->getToken($id);
		// printme($token);exit();
		$body = '
		Please click on the following link to reset your password.
		</br>
		 <a href="'.base_url().$language.'/resetpassword/'.$token->token.'"> Reset Password</a>
		';
		$this->smtpmailer('Reset Password',$body,$token->email, '');
	}

	public function profile()
	{
		$this->load->model('user');
		$this->load->model('service');
		$username = $this->session->userdata('username');
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Profile';
		// printme($data['user']->id);exit();
		if(!isset($data['user']))
			redirect('home');

		$data['favorites'] = $this->user->getUserFavorites($data['user']->id);
		$data['favoritesArray'] = array();
		$data['favoritesImages'] = array();
		foreach ($data['favorites'] as $key => $property) {

			$data['favoritesArray'][$key] = $this->service->getPropertyByID($property->property_id);
			// printme();exit();
			$data['favoritesImages'][$property->property_id] = $this->service->getPropertyImages($property->property_id,$data['favoritesArray'][$key]->UnitId);		

		}

		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$email = $_POST['email'];
			$location = $_POST['location'];
			$phone = $_POST['phone'];

			if (empty($username)) {
				$data['usernameError'] = 'Insert Username';
			}elseif (empty($email)) {
				$data['emailError'] = 'Insert email';
			}elseif (empty($location)) {
				$data['locationError'] = 'Insert location';			
			}elseif(empty($phone)){
				$data['phoneError'] = 'Insert phone';
			}
			else{
				$user = $this->user->getUserByUsername($username);
				if ($user){

					if($user ->username == $this->session->userdata('username'))
					{
						$params = array('username' => $username,
						'location' => $location,
						'phone' => $phone);

						$emailtmp = $this->user->getUserByEmail($email);
						if ($emailtmp){
							if($emailtmp ->email == $this->session->userdata('email'))
							{
								$update = $this->user->updateUser($data['user']->id, $params);
								$data['user'] = $this->user->getUserByUsername($username);
								$this->startSession($data['user']);
								if($update){
									$data['update'] = true;
								}
							}
							else{
								$data['updateEmailError'] = 'Email already exists';
							}
						}
						else{
							 $update = $this->user->updateUser($data['user']->id, $params);
							if ($_POST['email'] != $this->session->userdata('email')){
								if ($this->user->insertTempEmail($this->session->userdata('id'),$_POST['email'],2))
								{
							// printme($data['user']->id);exit();

									$this->emailUpdateValidation($this->db->insert_id());

									$data['emailUpdateMessage'] = 'Please login to your email to confirm email update.';	
								}
								
							}

							$data['user'] = $this->user->getUserByUsername($username);
							$this->startSession($data['user']);
							if($update){
								$data['update'] = true;
							}
						}
					}
					else{
						$data['updateError'] = 'Username already exists';
					}
				}	
				else{
					$params = array('username' => $username,
					'location' => $location,
					'phone' => $phone);

					$emailtmp = $this->user->getUserByEmail($email);
					if ($emailtmp){
						if($emailtmp ->email == $this->session->userdata('email'))
						{
							$update = $this->user->updateUser($data['user']->id, $params);
							$data['user'] = $this->user->getUserByUsername($username);
							$this->startSession($data['user']);
							if($update){
								$data['update'] = true;
							}else{
								$data['update'] = false;
							}
						}
						else{
							$data['updateEmailError'] = 'Email already exists';
						}
					}
					else{
						$update = $this->user->updateUser($data['user']->id, $params);
						
						if ($_POST['email'] != $this->session->userdata('email')){
							if ($this->user->insertTempEmail($this->session->userdata('id'),$_POST['email'],2))
							{
								$this->emailUpdateValidation($this->db->insert_id());
								$data['emailUpdateMessage'] = 'Please login to your email to confirm email update.';	
							}
							
						}

						$data['user'] = $this->user->getUserByUsername($username);
						$this->startSession($data['user']);
						if($update){
							$data['update'] = true;
						}else{
							$data['update'] = false;
						}
					}


					// $update = $this->user->updateUser($data['user']->id, $params);
					// $data['user'] = $this->user->getUserByUsername($username);
					// $this->startSession($data['user']);
					// if($update){
					// 	$data['update'] = true;
					// }else{
					// 	$data['update'] = false;
					// }
				}

			}
		}
		$this->load->view($data['languagePath'].'profile', $data);
	}

	public function validateToken()
	{
		$this->load->model('user');
		$token = $this->uri->uri_string;
		$token = explode('validate/', $token);
		$token = $token[1];
		$tokenInfo = $this->user->checkToken($token);
		if ($tokenInfo->is_valid == 1)
		{
			$date = explode(' ', $tokenInfo->date_joined);
			$date = explode('-', $date[0]);
			$today = date('j');

			$diff = $today - $date[2];
			if ($diff < 1)
			{	
				$user = $this->user->getUserByID($tokenInfo->user_id);
				$is_valid = $user->is_valid;
				if($tokenInfo->type == 1){
					$params = array('is_valid' => 1);
					$this->user->updateUser($tokenInfo->user_id, $params);
					$this->startSession($user);
					redirect('home');
				}elseif($tokenInfo->type == 2){
					$params = array('email' => $tokenInfo->email,'is_valid' => 1);
					$emailUpdate = $this->user->updateUser($tokenInfo->user_id, $params);
					redirect('home');
				}else{
					// token == 3 change password
					// $this->session->set_flashdata('email', $tokenInfo->email);
					// $this->session->set_flashdata('token', $token);
					// redirect('resetpassword');
				}
			}
			else
			{
				echo "Confirmation email expired";
			}
		}
	}	

	public function shareProperty()
	{
		$this->load->model('user');
		$this->load->model('property');
		$this->load->model('service');

		$username = $this->session->userdata('username');
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Share your Property';
		$data['cities'] = $this->service->getCities();
		
		if (isset($_POST['submit'])){
			// printme($_POST);exit();
			$data['params'] = $_POST;
			// printme($_FILES);exit();
			if (empty($_POST['area']) || $_POST['area'] == 'Select Area'){
				$data['insertError'] = $this->lang->line('shareProperty_missing_area');
			}elseif (empty($_POST['shareProperty_lob']) || $_POST['shareProperty_lob'] == 'Select Category' || $_POST['shareProperty_lob'] == 'إختار الفئة'){
				$data['insertError'] = $this->lang->line('shareProperty_missing_category');
			}elseif (empty($_POST['shareProperty_type']) || $_POST['shareProperty_type'] == 'Select Type') {
				$data['insertError'] = $this->lang->line('shareProperty_missing_type');
			}elseif (empty($_POST['price']) || $_POST['price'] == 'Select Price') {
				$data['insertError'] = $this->lang->line('shareProperty_missing_price');
			}elseif (empty($_POST['city']) || $_POST['city'] == 'Select City') {
				$data['insertError'] = $this->lang->line('shareProperty_missing_city');
			}elseif (empty($_POST['district']) || $_POST['district'] == 'Select District') {
				$data['insertError'] = $this->lang->line('shareProperty_missing_district');
			}elseif (empty($_POST['address'])) {
				$data['insertError'] = $this->lang->line('shareProperty_missing_address');
			}elseif (empty($_POST['features'])) {
				$data['insertError'] = $this->lang->line('shareProperty_missing_features');
			}else{
				
				if ($_POST['shareProperty_lob'] == 1){
					$category = 'Residential';
				}elseif ($_POST['shareProperty_lob'] == 2) {
					$category = 'Commercial';
				}elseif ($_POST['shareProperty_lob'] == 3) {
					$category = 'Auctions';
				}elseif ($_POST['shareProperty_lob'] == 4) {
					$category = 'Commercial Projects';
				}

				$city = $this->service->getCityByID($_POST['city']);
				if ($_POST['district'] != 0){
					$district = $this->service->getDistrictByID($_POST['city'],$_POST['district']);
				}else{
					$district = '';
				}
				
				$propertyType = $this->service->getPropertyTypeByID($_POST['shareProperty_lob'],$_POST['shareProperty_type']);

				$params = array ('user_id' => $data['user']->id,
					'area' => $_POST['area'],
					'category' => $category,
					'type' => $propertyType,
					'price' => $_POST['price'],
					'district' => $district,
					'features' => $_POST['features'],
					'address' => $_POST['address'],
					'city' => $city);
				// printme($params);exit();
				if ($this->property->insertProperty($params))
				{
					if(isset($_FILES) && $_FILES['img']['name']['0'] != "" ){
							$images = array();
							$params = array();
							$params['property_id'] = $this->db->insert_id();
							$i = 0;
							foreach ($_FILES['img']['name'] as $name) {
							 	$images['image_'.$i]['name'] = $name;
							 	$images['image_'.$i]['type'] = $_FILES['img']['type'][$i];
							 	$images['image_'.$i]['size'] = $_FILES['img']['size'][$i];
							 	$images['image_'.$i]['tmp_name'] = $_FILES['img']['tmp_name'][$i];
							 	$i++;
							}
							$count=0;
							foreach ($images as $image) {
								$fileExtension = explode('.',$image['name']);
								$_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
								$_FILES['userfile']['tmp_name'] = $image['tmp_name'];
								$_FILES['userfile']['size'] = $image['size'];
								$params['image_url'] = $_FILES['userfile']['name'];
								$this->config->set_item('allowed_types','pdf|jpg|jpeg|png');
								if (!isset($data['imageFlag'])){
									$upload = uploadme($this);
									if(!isset($upload['error'])){
										$this->load->model('property');
										$this->property->insertImage($params);
										$data['insertProcess'] = true;

										$imageAttachments[$count] = getcwd().'/application/static/upload/'.$_FILES['userfile']['name'];
										$count++;
										
									}else{
										$this->property->deleteProperty($params['property_id']);
										$data['insertProcess'] = false;
										$data['imageFlag'] = true; 
									}
								}
								
							}
							$firstname = $data['user']->first_name;
							$lastname = $data['user']->last_name;
							$phone = $data['user']->phone;
							$email = $data['user']->email;
							$body = 'Name: '.$firstname.' '.$lastname.'<br>
									E-mail: '.$email.'<br>
									Phone: '.$phone.'<br>
									Property Type: '.$propertyType;
							if(isset($imageAttachments)){
								$this->smtpmailer('Share Property',$body,'s.nahal@enlightworld.com', $imageAttachments);
							}else{
								$this->smtpmailer('Share Property',$body,'s.nahal@enlightworld.com', '');
							}
						}
						$data['insertProcess'] = true;
				}else{
					$data['insertError'] = "Error Inserting Property Data";
				}
				
			}
		}
		$this->load->view($data['languagePath'].'share_property', $data);
	}


	public function subscribeuser()
	{
		if($_POST['id'] == 'user'){
			$params['user_identifier'] = $this->session->userdata['id'];
		}else{
			$params['user_identifier'] = $_POST['id'];
		}
		// printme($_POST['id']);
		$process = $this->user->insertNewsletterData($params);
		if($process)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function viewAllProperties ()
	{
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Available Properties';
		$this->load->model('property');
		$this->load->model('service');
		$this->load->model('user');
		$data['cities'] = $this->service->getCities();
		$data['serviceTypes'] = $this->service->getServiceType();
		$data['propertyType1'] = $this->service->Getpropertytypes(1);
		$data['propertyType2'] = $this->service->Getpropertytypes(2);


		if (isset($data['loggedIn'])){
			// printme('hello');exit();
			$data['userFavorites'] = $this->user->getUserFavorites($data['user']->id);
			if(is_array($data['userFavorites'])){
				foreach ($data['userFavorites'] as $property) {
					$userFavorites[] = $property->property_id;
				}
			}else{
				$userFavorites = array();
			}
			// printme($userFavorites);exit();
		}


		if(isset($_POST['contact_submit'])){
			printme($_POST);
			exit();
		}

		//printme($userFavorites);exit();

		if (isset($_POST['increment'])){
			$data['increment'] = $_POST['increment'];
			$data['lastResult'] = $_POST['lastResult'];
		}else{
			$data['increment'] = 0;
		}

		if (isset($_POST['searchSubmit1']))
		{
			// printme($_POST);exit();
			if ($_POST['typeName'] == 0)
			{
				$type = '';
			}else{
				$type = $_POST['typeName'];
			}

			if ($_POST['city'] == 0)
			{
				$boxLocation = '';
			}
			else{
				if ($_POST['districtName'] == 0)
				{
					$boxLocation = $this->service->getCityByID($_POST['city']);
				}
				else{
					$boxLocation = $this->service->getDistrictByID($_POST['city'], $_POST['districtName']);
				}
			}

			if ($_POST['contractType'] == 0)
			{
				$propertyFor = '';

			}else{
				$propertyFor = $this->service->getServiceTypeByID($_POST['contractType']);
			}

			if ($_POST['price'] == 0)
			{
				$priceLowerLimit = 0;
				$priceUpperLimit = 1000000000000000000;
			}else{
				if ($_POST['price'] == 20000000)
				{
					$priceLowerLimit = $_POST['price'];
					$priceUpperLimit = 1000000000000000000;
				}else{
					$price = explode(' - ', $_POST['price']);
					$priceLowerLimit = $price[0];
					$priceUpperLimit = $price[1];
				}
			}

			if ($_POST['area'] == 0)
			{
				$areaLowerLimit = 0;
				$areaUpperLimit = 1000000000000000;
			}else{
				if ($_POST['area'] == 1000)
				{
					$priceLowerLimit = $_POST['area'];
					$priceUpperLimit = 1000000000000000000;
				}else{
					$area = explode(' - ', $_POST['area']);
					$areaLowerLimit = $area[0];
					$areaUpperLimit = $area[1];
				}
			}

			$searchParams = array(
				'PropertyType' => $type,
				'BoxLocation' => $boxLocation,
				'PropertyFor' => $propertyFor,
				'PriceLowerLimit' => $priceLowerLimit,
				'PriceUpperLimit' => $priceUpperLimit,
				'AreaLowerLimit' => $areaLowerLimit,
				'AreaUpperLimit' => $areaUpperLimit
			);

			$data['searchResults'] = $this->service->Search($searchParams);
			if ($data['searchResults']['totalResults'] != 0){
				$data['totalResults'] = $data['searchResults']['totalResults'];
				$data['searchResults'] = $data['searchResults']['results'];
				$data['resultCount'] = $data['totalResults'];
				$data['images'] = array();
				foreach ($data['searchResults'] as $property) {
					if(isset($userFavorites)){
						if(in_array($property->PropertyId,$userFavorites)){
							$property->is_favorite = 1;
						}else{
							$property->is_favorite = 0;
						}
					}
					$data['images'][$property->PropertyId] = $this->service->getPropertyImages($property->PropertyId,$property->UnitId);
				}
			}else{
				$data['resultCount'] = 0;
				$data['totalResults'] = 0;
				$data['noResults'] = "Sorry, there were no results that match your criteria";
			}
		}elseif (isset($_POST['searchSubmit3'])) {
			if ($_POST['type_2'] == 0)
			{
				$type = '';
			}else{
				$type = $_POST['type_2'];
			}

			if ($_POST['city_2'] == 0)
			{
				$boxLocation = '';
			}
			else{
				if ($_POST['districtName_2'] == 0)
				{
					$boxLocation = $this->service->getCityByID($_POST['city_2']);
				}
				else{
					$boxLocation = $this->service->getDistrictByID($_POST['city_2'], $_POST['districtName_2']);
				}
			}

			if ($_POST['contractType_2'] == 0)
			{
				$propertyFor = '';

			}else{
				$propertyFor = $_POST['contractType_2'];
			}

			if ($_POST['price_2'] == 0)
			{
				$priceLowerLimit = 0;
				$priceUpperLimit = 1000000000000000000;
			}else{
				if ($_POST['price_2'] == 20000000)
				{
					$priceLowerLimit = $_POST['price_2'];
					$priceUpperLimit = 1000000000000000000;
				}else{
					$price = explode(' - ', $_POST['price_2']);
					$priceLowerLimit = $price[0];
					$priceUpperLimit = $price[1];
				}
			}

			if ($_POST['area_2'] == 0)
			{
				$areaLowerLimit = 0;
				$areaUpperLimit = 10000000000000;
			}else{
				if ($_POST['area_2'] == 1000)
				{
					$priceLowerLimit = $_POST['area_2'];
					$priceUpperLimit = 1000000000000000000;
				}else{
					$area = explode(' - ', $_POST['area_2']);
					$areaLowerLimit = $area[0];
					$areaUpperLimit = $area[1];
				}
			}

			$searchParams = array(
				'PropertyType' => $type,
				'BoxLocation' => $boxLocation,
				'PropertyFor' => $propertyFor,
				'PriceLowerLimit' => $priceLowerLimit,
				'PriceUpperLimit' => $priceUpperLimit,
				'AreaLowerLimit' => $areaLowerLimit,
				'AreaUpperLimit' => $areaUpperLimit
			);

			$data['searchResults'] = $this->service->Search($searchParams);
			if ($data['searchResults']['totalResults'] != 0){
				$data['totalResults'] = $data['searchResults']['totalResults'];
				$data['searchResults'] = $data['searchResults']['results'];
				$data['resultCount'] = $data['totalResults'];
				$data['images'] = array();
				foreach ($data['searchResults'] as $property) {
					if(isset($userFavorites)){
						if(in_array($property->PropertyId,$userFavorites)){
							$property->is_favorite = 1;
						}else{
							$property->is_favorite = 0;
						}
					}
					$data['images'][$property->PropertyId] = $this->service->getPropertyImages($property->PropertyId,$property->UnitId);
				}
			}else{
				$data['resultCount'] = 0;
				$data['totalResults'] = 0;
				$data['noResults'] = "Sorry, there were no results that match your criteria";
			}

		}elseif (isset($_POST['searchSubmit4'])) {
			if ($_POST['type_3'] == 0)
			{
				$type = '';
			}else{
				$type = $_POST['type_3'];
			}

			if ($_POST['city_3'] == 0)
			{
				$boxLocation = '';
			}
			else{
				if ($_POST['districtName_3'] == 0)
				{
					$boxLocation = $this->service->getCityByID($_POST['city_3']);
				}
				else{
					$boxLocation = $this->service->getDistrictByID($_POST['city_3'], $_POST['districtName_3']);
				}
			}

			if ($_POST['contractType_3'] == 0)
			{
				$propertyFor = '';

			}else{
				$propertyFor = $_POST['contractType_3'];
			}

			if ($_POST['price_3'] == 0)
			{
				$priceLowerLimit = 0;
				$priceUpperLimit = 1000000000000000000;
			}else{
				if ($_POST['price_3'] == 20000000)
				{
					$priceLowerLimit = $_POST['price_3'];
					$priceUpperLimit = 1000000000000000000;
				}else{
					$price = explode(' - ', $_POST['price_3']);
					$priceLowerLimit = $price[0];
					$priceUpperLimit = $price[1];
				}
			}

			if ($_POST['area_3'] == 0)
			{
				$areaLowerLimit = 0;
				$areaUpperLimit = 100000000000000;
			}else{
				if ($_POST['area_3'] == 1000)
				{
					$priceLowerLimit = $_POST['area_3'];
					$priceUpperLimit = 1000000000000000000;
				}else{
					$area = explode(' - ', $_POST['area_3']);
					$areaLowerLimit = $area[0];
					$areaUpperLimit = $area[1];
				}
			}

			$searchParams = array(
				'PropertyType' => $type,
				'BoxLocation' => $boxLocation,
				'PropertyFor' => $propertyFor,
				'PriceLowerLimit' => $priceLowerLimit,
				'PriceUpperLimit' => $priceUpperLimit,
				'AreaLowerLimit' => $areaLowerLimit,
				'AreaUpperLimit' => $areaUpperLimit
			);

			$data['searchResults'] = $this->service->Search($searchParams);
			if ($data['searchResults']['totalResults'] != 0){
				$data['totalResults'] = $data['searchResults']['totalResults'];
				$data['searchResults'] = $data['searchResults']['results'];
				$data['resultCount'] = $data['totalResults'];
				$data['images'] = array();
				foreach ($data['searchResults'] as $property) {
					if(isset($userFavorites)){
						if(in_array($property->PropertyId,$userFavorites)){
							$property->is_favorite = 1;
						}else{
							$property->is_favorite = 0;
						}
					}
					$data['images'][$property->PropertyId] = $this->service->getPropertyImages($property->PropertyId,$property->UnitId);
				}
			}else{
				$data['resultCount'] = 0;
				$data['totalResults'] = 0;
				$data['noResults'] = "Sorry, there were no results that match your criteria";
			}
		}elseif (isset($_GET['category'])){
			if($_GET['category'] == 'home' && isset($_GET['contractType2']))
			{
				if ($_GET['contractType2'] == 'rent'){
					$propertyFor = 2;
				}elseif ($_GET['contractType2'] = 'sale'){
					$propertyFor = 1;
				}
				$searchParams = array(
					'PropertyType' => '',
					'BoxLocation' => '',
					'PropertyFor' => $propertyFor,
					'PriceLowerLimit' => 0,
					'PriceUpperLimit' => 100000000000000,
					'AreaLowerLimit' => 0,
					'AreaUpperLimit' => 100000000000000, 
					'lineOfBusiness' => 1
				);	
				$data['searchResults'] = $this->service->Search($searchParams);
				if ($data['searchResults']['totalResults'] != 0)
				{
					$data['searchResults'] = $data['searchResults']['results'];
					$results = array();
					$count = 0;
					foreach ($data['searchResults'] as $result) {
						// if ($result->LineofBusinessFK == 2)
						// {
							// if ($result->SalesTypeStr == 'Sale' || $result->SalesTypeStr == 'Sale/Rent ')
							// {
								$results[$count] = $result;
								$count++;
							// }
						// }
						
					}
					$data['searchResults'] = $results;
					$data['commercial'] = true;
					$data['commercialSale'] = true;
					$data['resultCount'] = $count;
					$data['totalResults'] = $count;
					$data['images'] = array();
					foreach ($data['searchResults'] as $property) {
						if(isset($userFavorites)){
							if(in_array($property->PropertyId,$userFavorites)){
								$property->is_favorite = 1;
							}else{
								$property->is_favorite = 0;
							}
						}
						$data['images'][$property->PropertyId] = $this->service->getPropertyImages($property->PropertyId,$property->UnitId);
					}
				}else{
					$data['totalResults'] = 0;
					$data['resultCount'] = 0;
					$data['noResults'] = "Sorry, there were no results that match your criteria";
				}
			}

		}elseif (isset($_GET['contractType'])) {
			if ($_GET['contractType'] == 'buy')
			{
				$searchParams = array(
					'PropertyType' => '',
					'BoxLocation' => '',
					'PropertyFor' => 1,
					'PriceLowerLimit' => 0,
					'PriceUpperLimit' => 100000000000000,
					'AreaLowerLimit' => 0,
					'AreaUpperLimit' => 100000000000000
				);

				$data['searchResults'] = $this->service->Search($searchParams);
				if ($data['searchResults']['totalResults'] != 0)
				{
					$data['searchResults'] = $data['searchResults']['results'];
					$results = array();
					$count = 0;
					foreach ($data['searchResults'] as $result) {
						// if ($result->LineofBusinessFK == 2 || $result->LineofBusinessFK == 4)
						// {
							// if ($result->SalesTypeStr == 'Sale' || $result->SalesTypeStr == 'Sale/Rent ')
							// {
								$results[$count] = $result;
								$count++;
							// }
						// }
						
					}
					$data['searchResults'] = $results;
					$data['commercial'] = true;
					$data['commercialSale'] = true;
					$data['resultCount'] = $count;
					$data['totalResults'] = $count;
					$data['images'] = array();
					foreach ($data['searchResults'] as $property) {
						if(isset($userFavorites)){
							if(in_array($property->PropertyId,$userFavorites)){
								$property->is_favorite = 1;
							}else{
								$property->is_favorite = 0;
							}
						}
						$data['images'][$property->PropertyId] = $this->service->getPropertyImages($property->PropertyId,$property->UnitId);
					}
				}else{
					$data['totalResults'] = 0;
					$data['resultCount'] = 0;
					$data['noResults'] = "Sorry, there were no results that match your criteria";
				}
				
			}else{
				$searchParams = array(
					'PropertyType' => '',
					'BoxLocation' => '',
					'PropertyFor' => 2,
					'PriceLowerLimit' => 0,
					'PriceUpperLimit' => 100000000000000,
					'AreaLowerLimit' => 0,
					'AreaUpperLimit' => 100000000000000
				);

				$data['searchResults'] = $this->service->Search($searchParams);

				if ($data['searchResults']['totalResults'] != 0){
					$data['searchResults'] = $data['searchResults']['results'];
					$results = array();
					$count = 0;
					foreach ($data['searchResults'] as $result) {
						// if ($result->LineofBusinessFK == 2 || $result->LineofBusinessFK == 4)
						// {
							// if ($result->SalesTypeStr == 'Rent' || $result->SalesTypeStr == 'Sale/Rent ')
							// {
								$results[$count] = $result;
								$count++;
							// }
						// }
					}
					$data['searchResults'] = $results;
					$data['commercial'] = true;
					$data['commercialRent'] = true;
					$data['resultCount'] = $count;
					$data['totalResults'] = $count;
					$data['images'] = array();
					foreach ($data['searchResults'] as $property) {
						if(isset($userFavorites)){
							if(in_array($property->PropertyId,$userFavorites)){
								$property->is_favorite = 1;
							}else{
								$property->is_favorite = 0;
							}
						}
						$data['images'][$property->PropertyId] = $this->service->getPropertyImages($property->PropertyId,$property->UnitId);
					}
				}else{
					$data['totalResults'] = 0;
					$data['resultCount'] = 0;
					$data['noResults'] = "Sorry, there were no results that match your criteria";
				}

			}
		}elseif (isset($_GET['district'])) {
			if ($_GET['type'] == 'villa'){
				$type = '10';
			}elseif ($_GET['type'] == 'apartment') {
				$type = '1';
			}else{
				$type = '11';
			}
			$searchParams = array(
				'PropertyType' => $type,
				'BoxLocation' => $_GET['district'],
				'PropertyFor' => 3,
				'PriceLowerLimit' => 0,
				'PriceUpperLimit' => 100000000000000,
				'AreaLowerLimit' => 0,
				'AreaUpperLimit' => 100000000000000
			);

			$data['searchResults'] = $this->service->Search($searchParams);
			if ($data['searchResults']['totalResults'] != 0){
				$data['totalResults'] = $data['searchResults']['totalResults'];
				$data['resultCount'] = $data['totalResults'];
				$data['searchResults'] = $data['searchResults']['results'];
				$data['images'] = array();
				foreach ($data['searchResults'] as $property) {
					if(isset($userFavorites)){
						if(in_array($property->PropertyId,$userFavorites)){
							$property->is_favorite = 1;
						}else{
							$property->is_favorite = 0;
						}
					}
					$data['images'][$property->PropertyId] = $this->service->getPropertyImages($property->PropertyId,$property->UnitId);
				}
			}else{
				$data['totalResults'] = 0;
				$data['resultCount'] = 0;
				$data['noResults'] = "Sorry, there were no results that match your criteria";
			}
			
		}elseif (isset($_GET['featured'])){
			$searchParams = array(
				'PropertyType' => '',
				'BoxLocation' => '',
				'PropertyFor' => 3,
				'PriceLowerLimit' => 0,
				'PriceUpperLimit' => 100000000000000,
				'AreaLowerLimit' => 0,
				'AreaUpperLimit' => 100000000000000,
				'isFeatured' =>true,
				'useFeaturedFilter' => true
			);

			$data['searchResults'] = $this->service->Search($searchParams);
			// printme($data['searchResults']);exit();

			if ($data['searchResults']['totalResults'] != 0){
				$data['totalResults'] = $data['searchResults']['totalResults'];
				$data['resultCount'] = $data['searchResults']['totalResults'];
				$data['searchResults'] = $data['searchResults']['results'];
				$data['images'] = array();
				foreach ($data['searchResults'] as $property) {
					if(isset($userFavorites)){
						if(in_array($property->PropertyId,$userFavorites)){
							$property->is_favorite = 1;
						}else{
							$property->is_favorite = 0;
						}
					}
					$data['images'][$property->PropertyId] = $this->service->getPropertyImages($property->PropertyId,$property->UnitId);
				}
			}else{
				$data['totalResults'] = 0;
				$data['resultCount'] = 0;
				$data['noResults'] = "Sorry, there were no results that match your criteria";
			}
		}else{
			$searchParams = array(
				'PropertyType' => '',
				'BoxLocation' => '',
				'PropertyFor' => 3,
				'PriceLowerLimit' => 0,
				'PriceUpperLimit' => 100000000000000,
				'AreaLowerLimit' => 0,
				'AreaUpperLimit' => 100000000000000
			);

			$data['searchResults'] = $this->service->Search($searchParams);
			// printme($data['searchResults']);exit();

			if ($data['searchResults']['totalResults'] != 0){
				$data['totalResults'] = $data['searchResults']['totalResults'];
				$data['resultCount'] = $data['searchResults']['totalResults'];
				$data['searchResults'] = $data['searchResults']['results'];
				$data['images'] = array();
				foreach ($data['searchResults'] as $property) {
					if(isset($userFavorites)){
						if(in_array($property->PropertyId,$userFavorites)){
							$property->is_favorite = 1;
						}else{
							$property->is_favorite = 0;
						}
					}
					$data['images'][$property->PropertyId] = $this->service->getPropertyImages($property->PropertyId,$property->UnitId);
				}
			}else{
				$data['totalResults'] = 0;
				$data['resultCount'] = 0;
				$data['noResults'] = "Sorry, there were no results that match your criteria";
			}
			
		}

		$this->load->view($data['languagePath'].'view_all_properties',$data);
	}

	public function compareProperties ()
	{
		$data = $this->init();
		$this->load->model('property');
		$this->load->model('service');
		$data['title'] = 'Coldwell Banker | Compare Properties';
		if(isset($_POST['compareSubmit']))
		{
			$properties = array();
			$count = 0;
			foreach ($_POST['property_chkbx'] as $key => $property) {
				$propertyID = explode('_', $property);
				$propertyID = $propertyID[1];
				$data['properties'][$propertyID] = $this->service->getPropertyByID($propertyID);
				$UnitId = $data['properties'][$propertyID]->UnitId;
				$data['images'][$propertyID] = $this->service->getPropertyImages($propertyID, $UnitId);
				$count++;
			}
			$data['propertyCount'] = $count;
		}

		$this->load->view($data['languagePath'].'compare_properties',$data);
	}

	public function propertyDetails ()
	{
		$data = $this->init();
		// $data['title'] = 'ColdWell Banker | Registration';
		$propertyId = explode('/', $data['uri']);
		$data['propertyId'] = $propertyId[1];
		$this->load->model('property');
		$this->load->model('service');
		$this->load->model('user');
		$data['searchResults'] = $this->service->getPropertyByID($data['propertyId']);
		$data['title'] = 'ColdWell Banker | '.$data['searchResults']->PrpertyTypeStr.' for '.$data['searchResults']->SalesTypeStr.' in '.$data['searchResults']->LocationProject.', '.$data['searchResults']->LocationDistrict.', '.$data['searchResults']->LocationCity;
		// printme($data['searchResults']);exit();

		$data['images'] = $this->service->getPropertyImages($data['propertyId'], $data['searchResults']->UnitId);

		if (isset($_POST['submit'])){
			if (empty($_POST['firstName'])){
				$data['contactError'] = "Please insert First Name";
			}elseif (empty($_POST['lastName'])) {
				$data['contactError'] = "Please insert Last Name";
			}elseif (empty($_POST['email'])){
				$data['contactError'] = "Please insert E-mail";
			}elseif (empty($_POST['phone'])) {
				$data['contactError'] = "Please insert Phone";
			}elseif (!isset($_POST['interest'])){
				$data['contactError'] = "Please choose your interest";
			}else{

				foreach ($_POST['interest'] as $interest) {
					$interests[] = $interest;
				}
				$params = array(
					'first_name' => $_POST['firstName'],
					'last_name' => $_POST['lastName'],
					'email' => $_POST['email'],
					'phone' => $_POST['phone'],
					'comments' => $_POST['comments'], 
					'propertyId' => $data['propertyId']
					);
				if ($this->user->insertContactInformation($params, $interests)){

					$data['contactSuccess'] = "Your Contact Info was inserted successfully!";
					$body = 'Name: '.$_POST['firstName'].' '.$_POST['lastName'].'<br>
						E-mail: '.$_POST['email'].'<br>
						Phone: '.$_POST['phone'].'<br>
						PropertyID: '.$data['propertyId'].'<br>
						Property Address: '.$data['searchResults']->LocationProject.', '.$data['searchResults']->LocationDistrict.', '.$data['searchResults']->LocationCity.'<br>
						Property Type: '.$data['searchResults']->PrpertyTypeStr.'<br>
						Comments: '.$_POST['comments'];
					$this->smtpmailer('Property Inquiries',$body,'s.nahal@enlightworld.com', '');
				}
			}
		}


		// $data['images'] = $this->service->getPropertyImages($data['propertyId'],$data['searchResults']->UnitId);
		$this->load->view($data['languagePath'].'property_details',$data);
	}

	public function careers ()
	{
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Careers';
		$this->load->view($data['languagePath'].'careers',$data);
	}

	public function uploadCV ()
	{
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Apply Now';
		$this->load->model('user');

		// printme($data['uri']);

		$vacancy_id = $data['uri'];

		if($vacancy_id == 'uploadCV'){
			$vacancy_id = 11;

		}else{
			$expodeCV = explode('uploadCV/', $vacancy_id);
			$vacancy_id = $expodeCV[1];

		}

		if(isset($_POST['submit']))
		{

			if (isset($data['loggedIn'])){
				$firstname = $data['user']->first_name;
				$lastname = $data['user']->last_name;
				$email = $data['user']->email;
				$id = $data['user']->id;
			}
			else{
				if (empty($_POST['uploadcv_app_firstname'])){
					$data['uploadError'] = $this->lang->line('uploadCV_missing_firstname');
				}elseif (empty($_POST['uploadcv_app_lastname'])) {
					$data['uploadError'] = $this->lang->line('uploadCV_missing_lastname');
				}elseif (empty($_POST['uploadcv_app_email'])) {
					$data['uploadError'] = $this->lang->line('uploadCV_missing_email');
				}elseif (!isset($_FILES)){
					$data['uploadError'] = $this->lang->line('uploadCV_missing_file');
				}else{
					$firstname = $_POST['uploadcv_app_firstname'];
					$lastname = $_POST['uploadcv_app_lastname'];
					$id = $_POST['uploadcv_app_email'];
					$email = $_POST['uploadcv_app_email'];
					$data['params'] = $_POST;
				}
			}
			
			$filename = explode('.', $_FILES['userfile']['name']);
			$filename = $filename[0];
			$ext = explode('.', $_FILES['userfile']['name']);
			$ext = $ext[1];
			// if ($ext != 'pdf' && $ext != 'doc' &&)
			$_FILES['userfile']['name'] = $filename.'_'.time().'.'.$ext;
			$this->config->set_item('upload_path',getcwd().'/application/static/upload/careers');
			$this->config->set_item('allowed_types','pdf|doc|docx');
			
			$upload = uploadme($this);
			if(isset($upload['upload_data'])){
				$params = array('user_identifier' => $id,
				'first_name' => $firstname,
				'last_name' => $lastname,
				'vacancy_id' => $vacancy_id,
				'cv' => $_FILES['userfile']['name']
				);
				if ($this->vacancy->insertEnrollment($params))
				{
					$data['uploadSuccess'] = $this->lang->line('uploadCV_success');
					$body = 'Name: '.$firstname.' '.$lastname.'<br>
							E-mail: '.$email.'<br>
							Vacancy: '.$vacancy_id;
					$attachment = getcwd().'/application/static/upload/careers/'.$_FILES['userfile']['name'] ;
					// printme($attachment);exit();
					$this->smtpmailer('CV Application',$body,'s.nahal@enlightworld.com', $attachment);
				}
			}else{
				$uploadError = uploadme($this);
				$data['uploadError'] = $uploadError['error']." (pdf, doc and docx)";
			}

			
			
		}

		$this->load->view($data['languagePath'].'upload_cv',$data);
	}

	public function joinUs ()
	{
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Join Us';
		$this->load->model('vacancy');
		$data['vacancies'] = $this->vacancy->getVacancies();
		$this->load->view($data['languagePath'].'join_us',$data);
	}

	public function marketIndex ()
	{
		$data = $this->init();
		$data['districts'] = $this->database->getAllDistricts();
		$data['title'] = 'ColdWell Banker | Market Index';
		$this->load->view($data['languagePath'].'market_index',$data);
	}

	public function auction ()
	{
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Auctions';
		
		$data['auctions'] = $this->property->getAuctions();
		$data['recentAuctions'] = $this->property->getRecentAuctions();
		$data['upcomingAuctions'] = $this->property->getUpcomingAuctions();
		$this->load->view($data['languagePath'].'auction',$data);
	}

	public function init()
	{	
		$data = array();
		
		if(isset($this->session->userdata['id'])){
			$this->load->model('user');
			$data['loggedIn'] = true;
			$data['user'] = $this->user->getUserByUsername($this->session->userdata['username']);
			if ($data['user']->is_valid == 1)
			{
				$data['is_valid'] = $data['user']->is_valid;
			}
			$this->load->model('service');
			// $data['cities'] = $this->service->getCities();
			if ($this->user->is_subscribed($data['user']->id))
			{
				$data['is_subscribed'] = true;
			}
			else{
				$data['is_subscribed'] = false;
			}
		}


		$tmp = $this->session->flashdata('loginError');

		if($tmp){
			$data['loginError'] = $this->session->flashdata('loginError');
			$data['login_username'] = $this->session->flashdata('login_username');
			$data['loginErrorType'] = $this->session->flashdata('loginErrorType');
		}

		
		$uri = $this->uri->uri_string;
		// printme($uri);exit();
		$posAr = strpos($uri, 'ar/');
		$posEn = strpos($uri, 'en/');
		$posAr2 = strpos($uri, 'ar');
		$posEn2 = strpos($uri, 'en');
		
		if ($posEn !== false || $posEn2 !== false ){
			if ($posAr == false || $posAr2 == false)
			{
				// printme($uri);exit();
				$explodeAr = explode('ar/', $uri);
				$explodeEn = explode('en/', $uri);
				// printme($explodeAr);
				// printme($explodeEn);exit();
				if ($explodeAr[0] == $uri)
				{
					$data['uri'] = explode('en/', $uri);
					if(isset($data['uri'][1])){
						$data['uri'] = $data['uri'][1];
					}else{
						$data['uri'] = $uri;
					}
				}
				elseif ($explodeEn[0] == $uri){
					$data['uri'] = explode('ar/', $uri);
					if(isset($data['uri'][1])){
						$data['uri'] = $data['uri'][1];
					}else{
						$data['uri'] = $uri;
					}
				}
			}
			else{
				$data['uri'] = explode('en/', $uri);
				if(isset($data['uri'][1])){
					$data['uri'] = $data['uri'][1];
				}else{
					$data['uri'] = $uri;
				}
			}
			
		}
		elseif ($posAr !== false || $posAr2 !== false){
			if ($posEn == false || $posEn2 == false){
				$explodeAr = explode('ar/', $uri);
				$explodeEn = explode('en/', $uri);
				if ($explodeEn[0] == $uri)
				{
					$data['uri'] = explode('ar/', $uri);
					if(isset($data['uri'][1])){
						$data['uri'] = $data['uri'][1];
					}else{
						$data['uri'] = $uri;
					}
				}
				elseif ($explodeAr[0] == $uri){
					$data['uri'] = explode('en/', $uri);
					if(isset($data['uri'][1])){
						$data['uri'] = $data['uri'][1];
					}else{
						$data['uri'] = $uri;
					}
				}
			}
			else{
				$data['uri'] = explode('en/', $uri);
				if(isset($data['uri'][1])){
					$data['uri'] = $data['uri'][1];
				}else{
					$data['uri'] = $uri;
				}
			}
		}
		else{
			// printme($uri);
			$data['uri'] = $uri;
		}
		if (($uri == 'en') || ($uri == 'ar')){
			$data['uri'] = '';
		}
		// printme($data['uri']);

		$data['language'] = $this->uri->segment(1);
		$data['languagePath'] = '';
		if($data['language'] == 'ar')
			$data['languagePath'] = 'arabic/';

		$this->loadLanguage($data['language']);
		//$this->load->model('service');
		//$data['districts'] = $this->service->getAllDistricts();

		return $data;
		
	}


	public function loadLanguage($lang)
	{	

		if($lang == 'ar')
			$lang = 'arabic';
		else
			$lang = 'english';

		$this->lang->load('home', $lang);
		$this->lang->load('auction', $lang);
		$this->lang->load('compare', $lang);
		$this->lang->load('careers', $lang);
		$this->lang->load('error', $lang);
		$this->lang->load('joinus', $lang);
		$this->lang->load('marketindex', $lang);
		$this->lang->load('profile', $lang);
		$this->lang->load('propertyalert', $lang);
		$this->lang->load('propertydetails', $lang);
		$this->lang->load('register', $lang);
		$this->lang->load('search', $lang);
		$this->lang->load('searchhome', $lang);
		$this->lang->load('shareproperty', $lang);
		$this->lang->load('trainingcenter', $lang);
		$this->lang->load('uploadcv', $lang);
		$this->lang->load('viewallproperties', $lang);
		$this->lang->load('forgetpassword', $lang);
		$this->lang->load('resetpassword', $lang);
		$this->lang->load('offices', $lang);
		$this->lang->load('featuredProperties', $lang);
		$this->lang->load('about', $lang);
		// $this->lang->load('viewallproperties', $lang);
	}

	public function insertPropertyAlert()
	{
		printme($_POST);
		$name = $_POST['name'];
		if(filter_var($name, FILTER_VALIDATE_EMAIL)) {
	        $params['user_identifier'] = $name;
	    }
	    else {
	       $user = $this->user->getUserByUsername($name);
	        $params['user_identifier'] = $user->id;
	    }


	    $params['property_data'] = $_POST['data'];
	    $insertProcess = $this->property->insertPropertyAlert($params);
	    if($insertProcess)
	    	echo 'true';
	    else
	    	echo 'false';
	    
			exit();
	}

	public function getDistricts()
	{
		$this->load->model('service');
		$data = $this->init();
		$data['districts'] = $this->service->getDistricts($_POST['id']);
		$data['key'] = $_POST['key'];

		if ($data['districts'] != 0)
		{
			$this->load->view('districtselect', $data);
		}
	}


		function checkmail($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
	       return true;
	   else
	   	return false;
	    
	}


function smtpmailer($subject,$body,$to, $attachment) { 

		 date_default_timezone_set('America/Los_Angeles');
		 $config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 's.nahal@enlightworld.com', // change it to yours
		  'smtp_pass' => '01069393641', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
			);

		  $this->load->library('email', $config);
		  $this->email->set_newline("\r\n");
		  $this->email->from('test@ColdWell.com'); // change it to yours
		  $this->email->to($to); // change it to yours
		  $this->email->subject($subject);
		  $this->email->message($body);
		  // printme($attachment);exit();
		  if ($attachment != '')
		  {
		  		if (is_array($attachment)){
		  			foreach ($attachment as $value) {
		  				// printme($value);
		  				$this->email->attach($value);
		  			}
		  		}else{
		  			$this->email->attach($attachment);
		  		}
	  			
		  }
		  

		  if($this->email->send())
		  {
		  	// echo $this->email->print_debugger();die;
			return true;
		}
		 else
			{
			 show_error($this->email->print_debugger());
			}
}

function trainingCenter()
{
	$this->load->model('course');
	$data = $this->init();
	$data['courses'] = $this->course->getCourses();
	// printme($data['courses']);
	$data['title'] = 'ColdWell Banker | Training Center';
	$this->load->view($data['languagePath'].'training_center', $data);
}

function forgotPassword()
{
	$this->load->model('user');
	$data = $this->init();
	$data['title'] = 'Coldwell Banker | Forgot Password';
	if ($data['language'] !== 'en' && $data['language'] !== 'ar'){
		$language = 'en';
	}
	else{
		$language = $data['language'];
	}
	if(isset($_POST['submit'])){
		$email =$this->user->getUserByEmail($_POST['email']);
		if ($email){
			if ($this->user->insertTempEmail($email->id,$_POST['email'],3))
			{
				$this->forgotPasswordValidation($this->db->insert_id(), $language);
				$data['resetPasswordMessage'] = 'Please login to your email to reset password.';	
			}
			
		}
	}
	$this->load->view($data['languagePath'].'forgot_password', $data);
}

function resetpassword()
{
	$this->load->model('user');
	$data = $this->init();
	$data['title'] = 'Coldwell Banker | Reset Password';
	$token = $this->uri->uri_string;
	$token = explode('resetpassword/', $token);
	$token = $token[1];

	$tokenInfo = $this->user->checkToken($token);
	$data['token'] = $tokenInfo->token;
	$data['user_email'] = $tokenInfo->email;
	if ($tokenInfo->is_valid == 1)
	{
		$date = explode(' ', $tokenInfo->date_joined);
		$date = explode('-', $date[0]);
		$today = date('j');

		$diff = $today - $date[2];
		if ($diff < 1)
		{
			if (isset($_POST['submit'])){
				if (empty($_POST['password'])){
					$data['resetError'] = 'Please enter new password';
				}elseif(empty($_POST['confrimpassword'])){
					$data['resetError'] = 'Please confirm password';
				}
				else{
					$data['user'] = $this->user->getUserByEmail($data['user_email']);
					$update = $this->user->updatePassword($data['user']->id,$_POST['password']);
					if ($update)
					{
						$this->startSession($data['user']);
						redirect('home');
					}
				}
			}
		}
	}
	$this->load->view($data['languagePath'].'reset_password', $data);
}

	function getPropertyTypes()
	{
		$lob = $_POST['lob'];
		// $this->load->model('service');
		$data = $this->init();
		$data['propertyType'] = $this->database->getPropertyTypes($lob);
		$data['key'] = $_POST['key'];
		if ($data['propertyType'] != 0)
		{
			$this->load->view('propertyselect', $data);
		}
	}

	function offices()
	{
		$data = $this->init();
		$this->load->model('office');
		$this->load->model('user');
		$data['title'] = 'ColdWell Banker | Offices';
		$data['offices'] = $this->office->getOffices();


		if (isset($_POST['submit']))
		{
			if(!isset($data['loggedIn']))
			{
				if (empty($_POST['contact_firstName']))
				{
					$data['contactError'] = $this->lang->line('offices_missing_firstName');
				}elseif (empty($_POST['contact_lastName'])) {
					$data['contactError'] = $this->lang->line('offices_missing_lastName');
				}elseif (empty($_POST['contact_email'])) {
					$data['contactError'] = $this->lang->line('offices_missing_email');
				}elseif (empty($_POST['contact_phone'])) {
					$data['contactError'] = $this->lang->line('offices_missing_phone');
				}elseif (empty($_POST['contact_subject'])) {
					$data['contactError'] = $this->lang->line('offices_missing_subject');
				}else{

					$params = array(
						'first_name' => $_POST['contact_firstName'],
						'last_name' => $_POST['contact_lastName'],
						'email' => $_POST['contact_email'],
						'phone' => $_POST['contact_phone'],
						'comments' => $_POST['contact_subject'], 
						'propertyId' => ''
						);

					$interests = array();
					if ($this->user->insertContactInformation($params, $interests)){
						echo 1;
						$body = 'Name: '.$_POST['contact_firstName'].' '.$_POST['contact_lastName'].'<br>
								E-mail: '.$_POST['contact_email'].'<br>
								Phone: '.$_POST['contact_phone'].'<br>
								Comments: '.$_POST['contact_subject'];
						$this->smtpmailer('Contact Request',$body,'s.nahal@enlightworld.com', '');
						// $data['contactSuccess'] = $this->lang->line('offices_contact_success');
					}else{
						echo 0;
						// $data['contactError'] = $this->lang->line('offices_contact_error');
					}
				}
			}else{
				$firstname = $data['user']->first_name;
				$lastname = $data['user']->last_name;
				$phone = $data['user']->phone;
				$email = $data['user']->email;
				$params = array(
						'first_name' => $firstname,
						'last_name' => $lastname,
						'email' => $email,
						'phone' => $phone,
						'comments' => $_POST['contact_subject'], 
						'propertyId' => ''
						);

				$interests = array();
				if ($this->user->insertContactInformation($params, $interests)){
					echo 1;
					$body = 'Name: '.$firstname.' '.$lastname.'<br>
							E-mail: '.$email.'<br>
							Phone: '.$phone.'<br>
							Comments: '.$_POST['contact_subject'];
					$this->smtpmailer('Contact Request',$body,'s.nahal@enlightworld.com', '');
					// $data['contactSuccess'] = $this->lang->line('offices_contact_success');
				}else{
					echo 0;
					// $data['contactError'] = $this->lang->line('offices_contact_error');
				}
				// printme($firstname);exit();
			}
			
		}
		$this->load->view($data['languagePath'].'offices', $data);
	}

	function insertContact ()
	{
		$this->load->model('user');
		$data = $this->init();
		$interests = array();
		$params = array(
			'first_name' => $_POST['firstname'],
			'last_name' => $_POST['lastname'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'comments' => $_POST['comments'], 
			'propertyId' => $_POST['propertyID']
			);
		// printme($params);
		if ($this->user->insertContactInformation($params, $interests)){
			echo 1;
			$body = 'Name: '.$_POST['firstname'].' '.$_POST['lastname'].'<br>
					E-mail: '.$_POST['email'].'<br>
					Phone: '.$_POST['phone'].'<br>
					PropertyID: '.$_POST['propertyID'].'<br>
					Comments: '.$_POST['comments'];
			$this->smtpmailer('Property Inquiries',$body,'s.nahal@enlightworld.com', '');
		}else{
			echo 0;
		}
	}

	function insertFavorite()
	{
		$params = array(
			'user_id' => $_POST['userID'],
			'property_id' => $_POST['propertyID']
		);
		if ($this->user->insertFavorite($params)){
			echo 1;
		}else{
			echo 0;
		}
	}

	function deleteFavorite()
	{
		$userID = $_POST['userID'];
		$propertyID = $_POST['propertyID'];
		if ($this->user->deleteFavorite($userID, $propertyID)){
			echo 1;
		}else{
			echo 0;
		}
	}



	function about()
	{
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | About Us';
		$this->load->view($data['languagePath'].'about', $data);
	}
	function franchise()
	{
		$data = $this->init();
		$data['title'] = 'ColdWell Banker | Franchise';
		$this->load->view($data['languagePath'].'franchise', $data);
	}

	function displayOffice()
	{
		$data = $this->init();
		$this->load->model('office');
		$data['currentLang'] = $_POST['lang'];
		$data['officeInfo'] = $this->office->getOfficeByID($_POST['id']);
		$this->load->view('displayOffice', $data);
	}

	function displayMap()
	{
		$data = $this->init();
		$this->load->model('office');
		$data['officeInfo'] = $this->office->getOfficeByID($_POST['id']);
		echo $data['officeInfo']->address_en;
		//printme($data['officeInfo']->address_en);exit();
		//$this->load->view('displayMap', $data);
	}

	function newsletterSingle()
	{
		$data = $this->init();
		$this->load->view('newsletter_single', $data);
	}

	function newsletterBanner()
	{
		$data = $this->init();
		$this->load->view('newsletter_banner', $data);
	}

	function newsletterProperties()
	{
		$data = $this->init();
		$this->load->view('newsletter_properties', $data);
	}

	// function createExcel()
	// {
	// 	$this->load->library('excel');
	// 	$this->load->model('service');
	// 	$this->excel->setActiveSheetIndex(0);
	// 	$categories = array(
	// 		0 => 'Residential', 
	// 		1 => 'Commercial'
	// 		);
	// 	$propertyType1 = $this->service->Getpropertytypes(1);
	// 	$propertyType2 = $this->service->Getpropertytypes(2);
	// 	$districts = $this->service->getAllDistricts();
	// 	$contractTypes = array(
	// 		0 => 'Sale',
	// 		1 => 'Rent'
	// 		);
	// 	$alphas = range('A', 'Z');
	// 	// printme(phpinfo());exit();
	// 	$count = 1;
	// 	foreach ($categories as $category) {
	// 		if($category == 'Residential')
	// 		{
	// 			foreach ($propertyType1 as $type1) {

	// 				foreach ($districts as $district) {
						
	// 					foreach ($contractTypes as $contractType) {

	// 						$this->excel->getActiveSheet()->SetCellValue('A'.$count, $category);
	// 						$this->excel->getActiveSheet()->SetCellValue('B'.$count, $type1);
	// 						$this->excel->getActiveSheet()->SetCellValue('C'.$count, $district['name']);
	// 						$this->excel->getActiveSheet()->SetCellValue('D'.$count, $contractType);
	// 						$count++;
	// 					}
	// 				}
	// 			}
	// 		}else{
	// 			foreach ($propertyType1 as $type2) {

	// 				foreach ($districts as $district) {
						
	// 					foreach ($contractTypes as $contractType) {

	// 						$this->excel->getActiveSheet()->SetCellValue('A'.$count, $category);
	// 						$this->excel->getActiveSheet()->SetCellValue('B'.$count, $type1);
	// 						$this->excel->getActiveSheet()->SetCellValue('C'.$count, $district['name']);
	// 						$this->excel->getActiveSheet()->SetCellValue('D'.$count, $contractType);
	// 						$count++;
	// 					}
	// 				}
	// 			}
	// 		}
			
	// 	}
	// 	$this->excel->save(getcwd().'/application/static/input2.xls');
	// 	exit();
	// 	// $this->excel->getActiveSheet()->SetCellValue('B2', "whatever");
		
		
	// }
} 