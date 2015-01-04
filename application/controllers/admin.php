<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function index()
	{
		$data['error'] = 0;
		if($this->session->flashdata('login')){
			$login = $this->session->flashdata('login');
			$login = $login['login'];
			if($login == 0)
				$data['error'] = 1;
		}
		if(isset($this->session->userdata['id'])){
				
			if($this->session->userdata['id'] != 1){
				$data['error'] = 0;
			}else{
				redirect('admin/dashboard');
			}
		}

		$this->load->view('admin/home',$data);
	}

	public function authenticate()
	{
		if(!isset($_POST['username']))
			redirect('admin');

		$this->load->model('user');
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user = $this->user->getRootByUsername($username);

		if($user){

			$login = $this->user->logIn($username,$password);
			if($login){
				$this->startSession($user);
				redirect('admin/dashboard');
				exit();
			}

		}

		$data['login'] = 0;
		$this->session->set_flashdata('login',$data);
		redirect('admin');

	}

	public function dashboard()
	{	
		$data = $this->init();
		$this->load->view('admin/dashboard',$data);
	}

	public function users()
	{
		$data = $this->init();
		$this->load->model('user');
		$data['users'] = $this->user->getAllUsers();
		$this->load->view('admin/users',$data);
	}

	public function projects()
	{
		$data = $this->init();
		$data['projects'] = $this->project->getAll();
		//printme($data);exit();
		$this->load->view('admin/projects',$data);
	}


	public function userProfile()
	{
		$data = $this->init();

		$username = $this->uri->uri_string;
		$username = explode('users/', $username);
		$username = $username[1];
		$this->load->model('user');
		$this->load->model('property');
		$this->load->model('favorites');
		$data['user'] = $this->user->getUserByUsername($username);
		$data['properties'] = $this->property->getUserProperties($data['user']->id);
		$data['favorites'] = $this->favorites->getUserFavorites($data['user']->id);

		if(is_array($data['favorites'])){
			foreach ($data['favorites'] as $favorite ) {
				$property = $this->property->getPropertyByID($favorite->property_id);
				$favorite->property = $property[0];
			}
		}


		if(isset($_POST['id'])){
			
			if(isset($_POST['confirmdelete'])){
				$this->user->deleteUser($username);
				redirect('admin/users');
			}

			if(isset($_POST['confirmedit'])){
				$userId = $data['user']->id;
				unset($_POST['id']);
				unset($_POST['confirmedit']);


				$update = $this->user->updateUser($userId,$_POST);
				$updatedUser = $this->user->getUserByID($userId);
				// $this->startSession($updateUser);
				redirect('admin/users/'.$updatedUser->username);

				
			}
			
		}


		if(isset($_POST['username'])){
			if(isset($_POST['delete'])){
				$this->load->view('admin/userdelete', $data);
				return;
			}
			if(isset($_POST['edit'])){
				$data['params'] = $this->user->getUserArray($username);
				$this->load->view('admin/useredit', $data);
				return;
			}
		}
		
		$this->load->view('admin/userprofile', $data);

	}





	public function propertyalert()
	{
		$data = $this->init();

		$alerts = $this->property->getPropertiesAlert();
		if(is_array($alerts)){
			foreach ($alerts as $alert) {
				if(!$this->checkmail($alert->user_identifier)){
					$alert->user_identifier = $this->user->getUserByID($alert->user_identifier);
				}

				$data_tmp = explode(',',$alert->property_data );
				$data_output = array();
				foreach ($data_tmp as $i) {
					$i = explode('=', $i);
					$data_output[$i[0]] = str_replace("'", "", $i[1]);
				}
				$alert->property_data = $data_output;
			}

		}
		$data['alerts'] = $alerts;
		$this->load->view('admin/propertyalert',$data);
	}


	public function newsletter()
	{	
		$data = $this->init();
		$users = $this->user->getSubscribedUsers();
		
		if(is_array($users)){
			foreach ($users as $user) {
				if(!$this->checkmail($user->user_identifier))
					$user->user_identifier = $this->user->getUserByID($user->user_identifier);
			}
		}
		
		$data['users'] = $users;
		$this->load->view('admin/newsletter', $data);
	}


	public function newsletterSend()
	{
		$data = $this->init();
		$users = $this->user->getSubscribedUsers();
		if(is_array($users)){
			foreach ($users as $user) {
				$identifier = $user->user_identifier;
				if(!$this->checkmail($identifier)){
					$tmp = $this->user->getUserByID($identifier);
					$user->user_identifier = $tmp->email;
				}
			}
		}


		$min = 0;
		$max = count($users);
		$mails = "";
		foreach ($users as $user ) {
			if($min == 0)
				$mails .= $user->user_identifier;
			else
				$mails .= ','.$user->user_identifier;

			$min++;
		}
		//$this->smtpmailer($subject,$body,$mails);
		
	}

	public function  createNewsletter()
	{
		$data = $this->init();

		$users = $this->user->getSubscribedUsers();
		
		if(is_array($users)){
			foreach ($users as $user) {
				if(!$this->checkmail($user->user_identifier))
					$user->user_identifier = $this->user->getUserByID($user->user_identifier)->email;
			}
		}

		$data['users'] = $users;

		if(isset($_POST['confirmsingle'])){
			$recievers = "";
			if(isset($_POST['checkAll'])){

				foreach ($users as $user) {
					if(!$this->checkmail($user->user_identifier)){
						$recievers.= $this->user->getUserByID($user->user_identifier)->email.',';
					}else{
						$recievers.= $user->user_identifier.',';
					}
				}
			}else{
					foreach ($_POST['singlecheck'] as $user) {
					$recievers .= $user.',';
					}
					
			}
			$this->sendSingle($_POST,$recievers);
		}elseif (isset($_POST['confirmBanner'])) {
			// printme($_POST);exit();
			$recievers = "";
			if(isset($_POST['checkAll'])){

				foreach ($users as $user) {
					if(!$this->checkmail($user->user_identifier)){
						$recievers.= $this->user->getUserByID($user->user_identifier)->email.',';
					}else{
						$recievers.= $user->user_identifier.',';
					}
				}
			}else{
					foreach ($_POST['singlecheck'] as $user) {
					$recievers .= $user.',';
					}
					
			}
			$this->sendBanner($_POST,$recievers);
		}elseif(isset($_POST['confirmProperties'])){
			// printme($_POST);exit();

			$recievers = "";
			if(isset($_POST['checkAll'])){

				foreach ($users as $user) {
					if(!$this->checkmail($user->user_identifier)){
						$recievers.= $this->user->getUserByID($user->user_identifier)->email.',';
					}else{
						$recievers.= $user->user_identifier.',';
					}
				}
			}else{
					foreach ($_POST['singlecheck'] as $user) {
					$recievers .= $user.',';
					}
					
			}
			$this->sendProperties($_POST,$recievers);
		}

		if(isset($_POST['singlepreview'])){
			// printme($_POST);exit();
			$path = $this->config->config['upload_path'];
			$this->config->set_item('upload_path',$path.'/temp');
			$fileExtension = explode('.',$_FILES['userfile']['name']);
			$_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
			$upload = uploadme($this);

			if(isset($upload['error'])){
				$data['params'] = $_POST;
				$data['error'] = $upload['error'];
				printme($upload['error']);exit();
			}else{
				$_POST['image'] = $upload['upload_data']['file_name'];
				$data['params'] = $_POST;
				$this->load->view('admin/newsletter_single', $data);
				return;
			}
		}

		if (isset($_POST['bannerspreview'])){
			$path = $this->config->config['upload_path'];
			$this->config->set_item('upload_path',$path.'/temp');

			if(isset($_FILES) && $_FILES['img']['name']['0'] != "" ){
				$images = array();
				$params = array();
				$imageNames = array();
				$params['property_id'] = $this->db->insert_id();
				$i = 0;
				foreach ($_FILES['img']['name'] as $name) {
				 	$images['image_'.$i]['name'] = $name;
				 	$images['image_'.$i]['type'] = $_FILES['img']['type'][$i];
				 	$images['image_'.$i]['size'] = $_FILES['img']['size'][$i];
				 	$images['image_'.$i]['tmp_name'] = $_FILES['img']['tmp_name'][$i];
				 	$i++;
				}
				$x = 0;
				foreach ($images as $image) {
					$fileExtension = explode('.',$image['name']);
					$_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
					$_FILES['userfile']['tmp_name'] = $image['tmp_name'];
					$_FILES['userfile']['size'] = $image['size'];
					$params['image_url'] = $_FILES['userfile']['name'];

					$upload = uploadme($this);
					if(isset($upload['error'])){
						$data['params'] = $_POST;
						// 
						$data['error'] = $upload['error'];
					}else{
						$imageNames['image_'.$x] = $_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
						$data['params'] = $_POST;
					}
					$x++;
				}
				$data['imgCount'] = $i;
				$data['images'] = $imageNames;
				$_POST['images'] = $data['images'];
				$this->load->view('admin/newsletter_banner', $data);
				return;
			}
		}

		if (isset($_POST['propertiespreview']))
		{
			$this->load->model('service');
			$path = $this->config->config['upload_path'];
			$this->config->set_item('upload_path',$path.'/temp');
			$properties = array();
			foreach ($_POST['properties'] as $key => $property) {
				$data['properties'][$key]=$this->service->getPropertyByID($property);
				$data['images'][$property] = $this->service->getPropertyImages($property, $data['properties'][$key]->UnitId);
			}
			// printme($data['images']);exit();
			$data['params'] = $_POST;
			
			$this->load->view('admin/newsletter_properties', $data);
			return;
		}

		$this->load->view('admin/createnewsletter', $data);
	}



	public function sendSingle($params,$list)
	{
		$data['params'] = $params;
		$body = $this->load->view('admin/single_template', $data, true);
		$this->smtpmailer('NewsLetter',$body,'s.nahal@enlightworld.com');
	}

	public function sendBanner($params,$list)
	{
		$data['params'] = $params;
		$body = $this->load->view('admin/banner_template', $data, true);
		$this->smtpmailer('NewsLetter',$body,'s.nahal@enlightworld.com');
	}

	public function sendProperties($params, $list)
	{
		$this->load->model('service');
		$data['params'] = $params;
		// printme($params);exit();
		foreach ($params['properties'] as $key => $property) {
			// printme($);
			$data['properties'][$key]=$this->service->getPropertyByID($property);
			$data['images'][$property] = $this->service->getPropertyImages($property, $data['properties'][$key]->UnitId);
		}
		// printme($data);exit();
		$body = $this->load->view('admin/properties_template', $data, true);
		$this->smtpmailer('New Properties',$body,'s.nahal@enlightworld.com');
	}


	public function checkpasswordchange()
	{
		$data = $this->init();
		
		$userID = $_POST['id'];
		$changePassword = $this->user->changePassword($userID,$_POST['current'],$_POST['new_1']);
		//printme($user);
	}


	public function vacancies()
	{
		$data = $this->init();
		
		$data['vacancies'] = $this->vacancy->getAllVacancies();
		$this->load->view('admin/vacancies', $data);
	}


	public function units()
	{
		$data = $this->init();
		
		$data['units'] = $this->unit->getAll();
		$this->load->view('admin/units', $data);
	}

	

	public function showVacancy()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('vacancies/', $id);
		$id = $id[1];

		$data['vacancy'] = $this->vacancy->getVacancyById($id);
		$data['users'] = $this->vacancy->getUsersEnrolled($id);
		if(is_array($data['users'])){
			foreach ($data['users'] as $user) {
				if(!$this->checkmail($user->user_identifier)){
					$user->user_identifier = $this->user->getUserByID($user->user_identifier);
				}
			}
		}

		if(isset($_POST['delete'])){
			$this->load->view('admin/vacancydelete', $data);
			return;
		}

		if(isset($_POST['edit'])){
			$data['params'] = $this->vacancy->getArray($id);
			$this->load->view('admin/vacancyedit', $data);
			return;
		}

		if(isset($_POST['confirmdelete'])){
			$this->vacancy->delete($id);
			redirect('admin/vacancies');
		}

		if(isset($_POST['confirmedit'])){
			unset($_POST['confirmedit']);
			$this->vacancy->update($id,$_POST);
			redirect('admin/vacancies/'.$data['vacancy']->id);
		}

		$this->load->view('admin/vacancyprofile', $data);
	}

	public function downloadcv()
	{
		$data = $this->init();

		$name = $this->uri->uri_string;
		$name = explode('download/', $name);
		$name = $name[1];
		$path = base_url().'application/static/upload/careers/'.$name;
		header("Content-disposition: attachment; filename=".$name);
		header("Content-type: application/pdf");
		readfile($path);

	}

	public function auction()
	{	
		
		$data = $this->init();

		$data['auctions'] = $this->property->getAuctions();
		$this->load->view('admin/auction', $data);

	}


	public function courses()
	{	
		$data = $this->init();
		
		$data['courses'] = $this->course->getCourses();
		// printme($data['courses']);exit();
		$this->load->view('admin/courses', $data);

	}


	public function offices()
	{	
		$data = $this->init();
		
		$data['offices'] = $this->office->getOffices();
		$this->load->view('admin/offices', $data);

	}


	public function showProject()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('projects/', $id);
		$id = $id[1];
		$id = urldecode($id);

		$data['project'] = $this->project->getByID($id);

		$data['project']->images = $this->project->get_images($data['project']->id);
		// printme($data['project']); exit();


		if(isset($_POST['delete'])){
			$this->load->view('admin/projectdelete', $data);
			return;
		}

		if(isset($_POST['edit'])){
			$data['params'] = $this->project->getByID($id);
			$this->load->view('admin/projectedit', $data);
			return;
		}

		if(isset($_POST['confirmedit_hidden']) && !isset($_POST['cancel'])){

			unset($_POST['confirmedit_hidden']);

			if(isset($_POST['is_featured']))
				$_POST['is_featured'] = 1;
			else
				$_POST['is_featured'] = 0;

			$this->project->update($data['project']->id,$_POST);
			$data['project'] = $this->project->getByID($data['project']->id);
			redirect('admin/projects/'.$data['project']->id);
		}

		if(isset($_POST['confirmdelete'])){
			$this->project->delete($data['project']->id);
			redirect('admin/projects');
		}

		// printme($data);
		// exit();
		$this->load->view('admin/projectprofile', $data);
	}

	public function showAuction()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('auctions/', $id);
		$id = $id[1];

		$data['auction'] = $this->property->getAuctionById($id);


		if(isset($_POST['delete'])){
			$this->load->view('admin/auctiondelete', $data);
			return;
		}

		if(isset($_POST['edit'])){
			$data['params'] = $this->property->getAuctionByIdArray($id);
			$this->load->view('admin/auctionedit', $data);
			return;
		}

		if(isset($_POST['confirmdelete'])){
			$this->property->deleteAuction($id);
			redirect('admin/auctions');
		}

		if(isset($_POST['confirmedit'])){

			unset($_POST['confirmedit']);
			if($_FILES['userfile']['error'] != 0){
				$this->property->updateAuction($id,$_POST);
				redirect('admin/auctions/'.$data['auction']->id);
			}else{
				$path = $this->config->config['upload_path'];
				$this->config->set_item('upload_path',$path.'/auctions');

				$fileExtension = explode('.',$_FILES['userfile']['name']);
				$_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];

				$upload = uploadme($this);

				if(isset($upload['error'])){

					$data['params'] = $this->property->getAuctionByIdArray($id);
					$data['error'] = $upload['error'];
					$this->load->view('admin/auctionedit', $data);
					return;
				}

				$_POST['image'] = $_FILES['userfile']['name'];
				$this->property->updateAuction($id,$_POST);
				redirect('admin/auctions/'.$data['auction']->id);
				// printme($_FILES);
				// exit();
			}
			
			
		}


		$this->load->view('admin/auctionprofile', $data);
	}


	public function showUnit()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('units/', $id);
		$id = $id[1];

		$data['unit'] = $this->unit->getByID($id);

		$data['unit']->images = $this->unit->get_images($data['unit']->id);

		$type = $this->unit->get_unit_type($data['unit']->type_id);

		$project = $this->project->getByID($data['unit']->project_id);
		$data['unit']->type_id = $type[0]->type;
		$data['unit']->project = $project;

		 // printme($data);
		 // exit();

		if(isset($_POST['delete'])){
			$this->load->view('admin/unitdelete', $data);
			return;
		}

		if(isset($_POST['edit'])){
			$data['params'] = $this->unit->getByID($id);
			$this->load->view('admin/unitedit', $data);
 			return;
		}

		// printme($_POST);
		// exit();
		if(isset($_POST['confirmedit_hidden']) && !isset($_POST['cancel'])){


			unset($_POST['confirmedit_hidden']);

			if(isset($_POST['is_featured']))
				$_POST['is_featured'] = 1;
			else
				$_POST['is_featured'] = 0;

				$this->unit->update($data['unit']->id,$_POST);
				$data['unit'] = $this->unit->getByID($data['unit']->id);
				redirect('admin/units/'.$data['unit']->id);
		}

		if(isset($_POST['confirmdelete'])){
			$this->unit->delete($data['unit']->id);
			redirect('admin/units');
		}
	
		$this->load->view('admin/unitprofile', $data);
		//printme($data['unit']);

	}

	public function showCourse()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('courses/', $id);
		$id = $id[1];


		$data['course'] = $this->course->getCourseByID($id);

		// printme($data['course'] );exit();

		if(isset($_POST['delete'])){
			$this->load->view('admin/coursedelete', $data);
			return;
		}

		if(isset($_POST['edit'])){
			$data['params'] = $this->course->getArray($id);
			$this->load->view('admin/courseedit', $data);
			return;
		}

		if(isset($_POST['confirmdelete'])){
			$this->course->delete($id);
			redirect('admin/courses');
		}

		if(isset($_POST['confirmedit'])){

			unset($_POST['confirmedit']);
			if($_FILES['userfile']['error'] != 0){
				$this->course->update($id,$_POST);
				redirect('admin/courses/'.$data['course']->id);
			}else{
				$path = $this->config->config['upload_path'];
				$this->config->set_item('upload_path',$path.'/courses');

				$fileExtension = explode('.',$_FILES['userfile']['name']);
				$_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];

				$upload = uploadme($this);
				if(isset($upload['error'])){

					$data['params'] = $this->course->getArray($id);
					$data['error'] = $upload['error'];
					$this->load->view('admin/courseedit', $data);
					return;

				}
				$_POST['image'] = $_FILES['userfile']['name'];
				$this->course->update($id,$_POST);
				redirect('admin/courses/'.$data['course']->id);
			}
			
			
		}


		$this->load->view('admin/courseprofile', $data);
	}


	public function showOffice()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('offices/', $id);
		$id = $id[1];
		
		$data['office'] = $this->office->getOfficeByID($id);

		if(isset($_POST['delete'])){
			$this->load->view('admin/officedelete', $data);
			return;
		}

		if(isset($_POST['edit'])){
			$data['params'] = $this->office->getArray($id);
			$this->load->view('admin/officeedit', $data);
			return;
		}

		if(isset($_POST['confirmdelete'])){
			$this->office->deleteOffice($id);
			redirect('admin/offices');
		}

		if(isset($_POST['confirmedit'])){
			unset($_POST['confirmedit']);
			$this->office->update($id,$_POST);
			redirect('admin/offices/'.$data['office']->id);
		}


		

		$this->load->view('admin/officeprofile', $data);
	}


	public function showProperty()
	{
		$data = $this->init();
		
		$id = $this->uri->uri_string;
		$id = explode('properties/', $id);
		$id = $id[1];

		
		$data['property'] = $this->property->getPropertyById($id);
		$data['images']   = $this->property->getPropertyImages($id);
		$this->load->view('admin/propertyprofile', $data);
	}



	public function newUnit()
	{
		$data = $this->init();
		
		$data['types'] = $this->unit->getTypes();
		$data['projects'] = $this->project->getAll();

		// printme($data['projects']);
		// exit();

		if(isset($_POST['submit']))
		{
			unset($_POST['submit']);

			$units = $this->unit->getAll();
			$count = 0;
			$flag = 1;
			foreach ($units as $unit) {
				$unit_name = $this->unit->getAll()[$count]->title;
				$unit_projID = $this->unit->getAll()[$count]->project_id;
				$curr_project_id = $_POST['project_id'];
				$curr_name = $_POST['title'];
				// printme($unit_name);
				// printme($unit_projID);
				// printme($curr_name);
				// printme($curr_project_id);
				$nameCheck = strcasecmp($curr_name,$unit_name);
				$projIdCheck = strcasecmp($curr_project_id,$unit_projID);

				if($nameCheck == 0 && $projIdCheck == 0) {
					echo "<script>alert(JSON.stringify('Duplicate name! Please choose another.'));</script>";
					$flag = 0;
				}
				$count++; 
			}

			if(isset($_POST['is_featured']))
				$_POST['is_featured'] = 1;
			else 
				$_POST['is_featured'] = 0;

			// printme($_POST);
			// exit();
			if($flag == 1) {
				$insert = $this->unit->insert($_POST);
			
				if($insert){
					$unit_id = $this->db->insert_id();
					$inputs=array('unit_id'=>$unit_id);
					$files = $_FILES['userfile'];
					$index=0;
					$tmpFiles=array();
					$path = $this->config->config['upload_path'];
					$this->config->set_item('upload_path',$path.'/units');
					// $this->unit->insert_unit_image($_FILES['userfile']['name'][0]);

					foreach ($files['name'] as $name) {

						$_FILES['userfile']['name'] = $name;
						$_FILES['userfile']['type'] = $files['type'][$index];
						$_FILES['userfile']['tmp_name'] = $files['tmp_name'][$index];
						$_FILES['userfile']['error'] = $files['error'][$index];
						$_FILES['userfile']['size'] = $files['size'][$index];

						$fileExtension = explode('.',$_FILES['userfile']['name']);
						$_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
						$inputs['image'] = $_FILES['userfile']['name'];
						$this->unit->insert_image($inputs);

						$upload = uploadme($this);
						$index++;
					}
					redirect('admin/units/'.$unit_id);
				}
			}
			$data['params'] = $_POST;
		}

		$this->load->view('admin/newUnit', $data);

	}

	public function newCourse()
	{
		$data = $this->init();
		

		if(isset($_POST['submit']))
		{
			
			unset($_POST['submit']);
			$insert = $this->course->insertCourse($_POST);
			if($insert){
				redirect('admin/courses/'.$this->db->insert_id());
			}
		}

		$this->load->view('admin/newcourse', $data);
	}



	public function newOffice()
	{
		$data = $this->init();
		if(isset($_POST['submit']))
		{
			$data['params'] = $_POST;
			unset($_POST['submit']);
			$insert = $this->office->insertOffice($_POST);

			redirect('admin/offices/'.$this->db->insert_id());
		}
		$this->load->view('admin/newoffice', $data);
	}


	public function NewAuction()
	{	
		$data = $this->init();
		

		if(isset($_POST['submit']))
		{

			$fileExtension = explode('.',$_FILES['userfile']['name']);
			$_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
			$path = $this->config->config['upload_path'];
			$this->config->set_item('upload_path',$path.'/auctions');

			unset($_POST['submit']);
			$_POST['image'] = $_FILES['userfile']['name'];
			// printme($_POST);exit();
			$insert = $this->property->insertAuction($_POST);
			if($insert){

				$upload = uploadme($this);
				if($upload){
					redirect('admin/auctions/'.$this->db->insert_id());
				}else{
					$data['error'] = true;
					$data['errorMsg'] = 'Upload Failed, Try again';
				}

			}
		}

		$this->load->view('admin/newauction', $data);
	}


	public function NewVacancy()
	{	
		$data = $this->init();
		

		if(isset($_POST['submit']))
		{

			

			unset($_POST['submit']);
			//printme($_POST);exit();
			$insert = $this->vacancy->insertVacancy($_POST);
			if($insert){

					redirect('admin/vacancies/'.$this->db->insert_id());

			}
		}

		$this->load->view('admin/newvacancy', $data);
	}




	


	public function properties()
	{
		
		
		$data = $this->init();


		$data['properties'] = $this->property->getAllProperties();
		if(is_array($data['properties'])){
			foreach ($data['properties'] as $property){
			$property->user = $this->user->getUserByID($property->user_id);
			}
		}
		
		$this->load->view('admin/properties',$data);
	}

	function createUser()
	{	
		$data = $this->init();

		if(isset($_POST['submit'])){
			$this->load->model('user');
			$user = $this->user->getUserByUsername($_POST['username']);
			if($user){
				$data['error'] = 'Username not available';
				$data['params'] = $_POST;
			}else{
				$user = $this->user->getUserByEmail($_POST['email']);
				if($user){
					$data['error'] = 'Email not available';
					$data['params'] = $_POST;
				}else{
					if($_POST['password'] != $_POST['confirm']){
						$data['error'] = 'Password not confirmed correctly';
						$data['params'] = $_POST;
					}else{
						unset($_POST['confirm']);
						unset($_POST['submit']);
						$insert = $this->user->insertUser($_POST);
						if($insert){
							redirect('admin/users/'.$_POST['username']);
						}else{
							$data['error'] = 'Process Failed, Try again';
							$data['params'] = $_POST;
						}

					}
				}	
			}
			
			
		}

		$this->load->view('admin/newuser',$data);
	}


	function addSocialLink()
	{
		$data = $this->init();
		$this->load->model('social');

		if(isset($_POST['submit'])){
			unset($_POST['submit']);

			$insert = $this->social->insert($_POST);

			if($insert){
				$id = $this->db->insert_id();
				$logo = $_FILES['image'];
				$logoName = $logo['name'];
				//printme($logoName);

				$path = $this->config->config['upload_path'];
				$defaultPath = $path;
				$this->config->set_item('upload_path',$path.'/social_links/');
				$target_dir = $this->config->config['upload_path'];
				$target_file = $target_dir.$logoName;
				move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
				$this->social->update($id,array('image'=>$logoName));

				redirect('admin/social');
			}

			$data['params'] = $_POST;

		}

		$this->load->view('admin/newsociallink',$data);
	}


	function createProject()
	{	
		$data = $this->init();

		if(isset($_POST['submit'])){

			$proj = $this->project->getAll();
			$count = 0;
			$flag = 1;
			foreach ($proj as $project) {
				$proj_name = $this->project->getAll()[$count]->name;

				if(strcasecmp($_POST['name'],$proj_name) == 0) {
					// echo "<script>alert('Duplicate name! Please choose another.');window.location.href='';</script>";
					echo "<script>alert(JSON.stringify('Duplicate name! Please choose another.'));</script>";
					$flag = 0;
				}
				$count++; 
			}

			if(isset($_POST['is_featured']))
				$_POST['is_featured'] = 1;
			else 
				$_POST['is_featured'] = 0;

			unset($_POST['submit']);

			if($flag == 1) {
				$insert = $this->project->insert($_POST);

				if($insert){

					$project_id = $this->db->insert_id();
					$files = $_FILES['userfile'];

					$logo = $_FILES['logo'];
					$fileExtension = explode('.',$logo['name']);
					$logoName = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
					

					$path = $this->config->config['upload_path'];
					// printme($path);exit();
					$defaultPath = $path;
					$this->config->set_item('upload_path',$path.'/logos/');
					$target_dir = $this->config->config['upload_path'];
					$target_file = $target_dir.$project_id.'_'.$logoName;
					move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file);
					$logoName = $project_id.'_'.$logoName;
					$this->project->update($project_id,array('logo'=>$logoName));
					//$upload = uploadme($this);

					$index=0;
					$tmpFiles=array();
					$path = $defaultPath;
					$this->config->set_item('upload_path',$path.'/projects');
					// $upload = uploadme($this);
					$inputs['project_id'] = $project_id;
					foreach ($files['name'] as $name) {
						
						$_FILES['userfile']['name'] = $name;
						$_FILES['userfile']['type'] = $files['type'][$index];
						$_FILES['userfile']['tmp_name'] = $files['tmp_name'][$index];
						$_FILES['userfile']['error'] = $files['error'][$index];
						$_FILES['userfile']['size'] = $files['size'][$index];

						$fileExtension = explode('.',$_FILES['userfile']['name']);
						$_FILES['userfile']['name'] = $fileExtension[0].'_'.$inputs['project_id'].'.'.$fileExtension[1];
						$inputs['image'] = $_FILES['userfile']['name'];
						// printme($inputs); exit();
						$this->project->insert_image($inputs);
						$upload = uploadme($this);
						$index++;
					}
					redirect('admin/projects');
				}
		}
			
			$data['params'] = $_POST;
		}

		$this->load->view('admin/newproject',$data);
	}

	function changelogo()
	{
		$data = $this->init();

		if(isset($_POST['submit'])){

			// printme($_FILES);
			// exit();
			unset($_POST['submit']);

			$logo = $_FILES['logo'];
			//printme($logo); exit();
			$fileExtension = explode('.',$logo['name'][0]);
			$logoName = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
			// printme($logoName); exit();


			$current_url = $_SERVER["REQUEST_URI"];
			$project_id = explode('/',$current_url);
			$project_id = $project_id[4];
			
			$path = $this->config->config['upload_path'];
			$defaultPath = $path;
			$this->config->set_item('upload_path',$path.'/logos/');
			$target_dir = $this->config->config['upload_path'];
			$target_file = $target_dir.$project_id.'_'.$logoName;
			move_uploaded_file($_FILES["logo"]["tmp_name"][0], $target_file);  
			$logoName = $project_id.'_'.$logoName;
			$this->project->update($project_id,array('logo'=>$logoName));
			//$upload = uploadme($this);

			redirect('admin/projects/'.$project_id);
			
			$data['params'] = $_POST;
		}

		$this->load->view('admin/changelogo',$data);
	}

	function content()
	{	
		$data = $this->init();
		
		$data['slides'] = $this->content->getSliderContent();
		$this->load->view('admin/content',$data);
	}

	function social()
	{
		$data = $this->init();
		$this->load->model('social');
		$data['social_links'] = $this->social->getAll();
// printme($_POST['cancel']);
		if(isset($_POST['save'])){
			printme("string");
			printme($_POST); exit();
			$id = $_POST['name_id'];
			$this->social->update($data['id'],$_POST);
			redirect('admin/social');
		}

		$this->load->view('admin/social',$data);	
	}

	public function deleteContent()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('deletecontent/', $id);
		$data['id'] = $id[1];

		if(isset($_POST['id'])){
			if(isset($_POST['cancel'])){
				redirect('admin/content');
			}
			
			$this->content->deleteSlide($_POST['id']);
			redirect('admin/content');

		}

		$this->load->view('admin/deletecontent',$data);
	}


	public function editContent()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('editcontent/', $id);
		$data['id'] = $id[1];

		if(isset($_POST['id'])){

			if(isset($_POST['cancel'])){
				redirect('admin/content');
			}

			$tmp = $_FILES;
			$images = array("'image'","'logo'","'alt_logo'");

			foreach ($images as $image) {

				if( ($tmp['userfile']['error'][$image]) == 0){

					$path = $this->config->config['upload_path'];
					$this->config->set_item('upload_path',$path.'/slider');

					$_FILES['userfile']['name']     = $tmp['userfile']['name'][$image];
					$_FILES['userfile']['type']     = $tmp['userfile']['type'][$image];
					$_FILES['userfile']['tmp_name'] = $tmp['userfile']['tmp_name'][$image];
					$_FILES['userfile']['error']    = $tmp['userfile']['error'][$image];
					$_FILES['userfile']['size']     = $tmp['userfile']['size'][$image];
					$fileExtension = explode('.',$_FILES['userfile']['name']);

					if($image == "'image'")
					$_POST['image'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
					if($image == "'logo'")
					$_POST['logo'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
					if($image == "'alt_logo'")
					$_POST['alt_logo'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];

					if($image == "'image'")
					$_FILES['userfile']['name'] = $_POST['image'];
					if($image == "'logo'")
					$_FILES['userfile']['name'] = $_POST['logo'];
					if($image == "'alt_logo'")
					$_FILES['userfile']['name'] = $_POST['alt_logo'];
					
					$upload = uploadme($this);
					if(isset($upload['error'])){
						$data['error'] = 'Upload Failed, Please try again';
						$data['params'] = $_POST;
						$data['old_params'] = $this->content->getSliderByIDArray($data['id']);
						$this->load->view('admin/editcontent',$data);
						return;
					}
				}
			}

			unset($_POST['submit']);
			$this->content->updateSlide($data['id'],$_POST);
			redirect('admin/content');
		}

		$data['params'] = $this->content->getSliderByIDArray($data['id']);
		$this->load->view('admin/editcontent',$data);
	}

	public function addContent()
	{
		$data = $this->init();

		if(isset($_POST['submit'])){

			$data['params'] = $_POST;
			$activeSlides = $this->content->getActiveSliders();
			if(!$activeSlides){
				$_POST['order'] = 1;
			}else{
				$count = count($activeSlides);
				$_POST['order']  = $count+1;
			}

			if(isset($_FILES)){
				$path = $this->config->config['upload_path'];
				// printme($path);exit();
				$this->config->set_item('upload_path',$path.'/slider');
				
				$tmp = $_FILES;
				$_FILES['userfile']['name']     = $tmp['userfile']['name']["'image'"];
				$_FILES['userfile']['type']     = $tmp['userfile']['type']["'image'"];
				$_FILES['userfile']['tmp_name'] = $tmp['userfile']['tmp_name']["'image'"];
				$_FILES['userfile']['error']    = $tmp['userfile']['error']["'image'"];
				$_FILES['userfile']['size']     = $tmp['userfile']['size']["'image'"];
				$fileExtension = explode('.',$_FILES['userfile']['name']);
				$_POST['image'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
				$_FILES['userfile']['name'] = $_POST['image'];
				
				$upload = uploadme($this);
				if(isset($upload['error'])){
					echo 'yes';
					$data['error'] = 'Upload Failed, Please try again';
					$this->load->view('admin/newcontent',$data);
					return;
				}

				// $_FILES['userfile']['name']     = $tmp['userfile']['name']["'logo'"];
				// $_FILES['userfile']['type']     = $tmp['userfile']['type']["'logo'"];
				// $_FILES['userfile']['tmp_name'] = $tmp['userfile']['tmp_name']["'logo'"];
				// $_FILES['userfile']['error']    = $tmp['userfile']['error']["'logo'"];
				// $_FILES['userfile']['size']     = $tmp['userfile']['size']["'logo'"];
				// $fileExtension = explode('.',$_FILES['userfile']['name']);
				// $_POST['logo'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
				// $_FILES['userfile']['name'] = $_POST['logo'];

				

				// $upload = uploadme($this);
				// if(isset($upload['error'])){
				// 	echo 'yes';
				// 	$data['error'] = 'Upload Failed, Please try again';
				// 	$this->load->view('admin/newcontent',$data);
				// 	return;
				// }

				// $_FILES['userfile']['name']     = $tmp['userfile']['name']["'alt_logo'"];
				// $_FILES['userfile']['type']     = $tmp['userfile']['type']["'alt_logo'"];
				// $_FILES['userfile']['tmp_name'] = $tmp['userfile']['tmp_name']["'alt_logo'"];
				// $_FILES['userfile']['error']    = $tmp['userfile']['error']["'alt_logo'"];
				// $_FILES['userfile']['size']     = $tmp['userfile']['size']["'alt_logo'"];
				// $fileExtension = explode('.',$_FILES['userfile']['name']);
				// $_POST['alt_logo'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
				// $_FILES['userfile']['name'] = $_POST['alt_logo'];

				

				// $upload = uploadme($this);
				// if(isset($upload['error'])){
				// 	echo 'yes';
				// 	$data['error'] = 'Upload Failed, Please try again';
				// 	$this->load->view('admin/newcontent',$data);
				// 	return;
				// }

				unset($_POST['submit']);
				$_POST['is_active'] = 1;
				//printme($_POST);exit();
				$this->content->insertSlide($_POST);
				echo "<script type='text/javascript'>alert('Slide inserted');</script>";
			}

			
		}
		$this->load->view('admin/newcontent',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata();
		redirect(base_url());
	}

	public function startSession($user)
	{
		$this->session->set_userdata($user);
	}

	public function script()
	{	
		 $this->load->model('service');
		 // $this->vacancy->populateDB();
		// $this->service->getProperty(199876);
		//$this->service->importDistrictsIntoDB();

	}


		function checkmail($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
	       return true;
	   else
	   	return false;
	    
	}






	public function init()
	{	
		$data = array();

		if(isset($this->session->userdata['id'])){
			$this->load->model('user');
			$data['loggedIn'] = true;
			$data['loggedUser'] = $this->user->getUserByUsername($this->session->userdata['username']);
			if($data['loggedUser']->id != 1)
				redirect('admin');
		}else{
			redirect('admin');
		}

		$request = $this->uri->uri_string;
		$request = explode('admin/', $request);
		$data['request'] = explode('/', $request[1]);
		$data['request'] = $data['request'][0];


		return $data;
		
	}


	public function deleteprojectimage()
	{
		$id = $_GET['id'];
		$image = $this->project->get_image_ByID($id);
		$this->project->delete_image($id);
		$project_images = $this->project->get_images($image->project_id);

		

		$sliderHTML = '<ul class="bxslider" style="height: 200px!important;">';
		if (is_array($project_images)) {
			foreach ($project_images as $image) {
				$sliderHTML .= '<li><img class="slider_imgs" src="'.base_url().'application/static/upload/projects/'.$image->image.'"></li>';
			}
			$sliderHTML .= '</ul>';
		}else{
			echo '<div class="alert alert-warning" role="alert">None Available</div>';
			exit();
		}

		echo $sliderHTML;
		exit();		
		
	}

	public function deletesociallink()
	{
		$this->load->model('social');
		$id = $_GET['id'];
		//printme($id); exit();
		$this->social->delete($id);
		redirect('admin/social');
	}

	public function deletenewslettermail()
	{
		$this->load->model('user');
		$id = $_GET['id'];
		// printme($id); exit();
		$this->user->deleteNewsletterData($id);
		redirect('admin/newsletter');
	}

	public function addprojectimage()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('addprojectimage/', $id);
		$id = $id[1];
		$id = urldecode($id);
		$project_name = $this->project->getByID($id)->name;

		if(isset($_POST['submit'])){

			unset($_POST['submit']);

				$files = $_FILES['userfile'];
				$index=0;
				$tmpFiles=array();
				$path = $this->config->config['upload_path'];
				$this->config->set_item('upload_path',$path.'/projects');

				foreach ($files['name'] as $name) {

					$_FILES['userfile']['name'] = $name;
					$_FILES['userfile']['type'] = $files['type'][$index];
					$_FILES['userfile']['tmp_name'] = $files['tmp_name'][$index];
					$_FILES['userfile']['error'] = $files['error'][$index];
					$_FILES['userfile']['size'] = $files['size'][$index];
					// printme($_FILES['userfile']); exit();

					$fileExtension = explode('.',$_FILES['userfile']['name']);
					$_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
					$inputs['image'] = $_FILES['userfile']['name'];
					$inputs['project_id'] = $id;
					$this->project->add_project_image($inputs);
					$upload = uploadme($this);
					$index++;
				}
				redirect('admin/projects/'.$id);
		 // }
			
			// $data['params'] = $_POST;
		 }

		$this->load->view('admin/addprojectimage', $data);
	}

	public function addunitimage()
	{
		$data = $this->init();

		$id = $this->uri->uri_string;
		$id = explode('addunitimage/', $id);
		$id = $id[1];
		$id = urldecode($id);
		// printme($id); exit();

		if(isset($_POST['submit'])){

			unset($_POST['submit']);

				$files = $_FILES['userfile'];
				$index=0;
				$tmpFiles=array();
				$path = $this->config->config['upload_path'];
				$this->config->set_item('upload_path',$path.'/units');

				foreach ($files['name'] as $name) {
// printme($files); exit();
					$_FILES['userfile']['name'] = $name;
					$_FILES['userfile']['type'] = $files['type'][$index];
					$_FILES['userfile']['tmp_name'] = $files['tmp_name'][$index];
					$_FILES['userfile']['error'] = $files['error'][$index];
					$_FILES['userfile']['size'] = $files['size'][$index];

					$fileExtension = explode('.',$_FILES['userfile']['name']);
					$_FILES['userfile']['name'] = $fileExtension[0].'_'.time().'.'.$fileExtension[1];
					$inputs['image'] = $_FILES['userfile']['name'];
					$inputs['unit_id'] = $id;
					// printme($inputs); exit();
					$this->unit->add_unit_image($inputs);
					$upload = uploadme($this);
					$index++;
				}
				redirect('admin/units/'.$id);
			
			// $data['params'] = $_POST;
		 }

		$this->load->view('admin/addunitimage', $data);
	}


	public function unitNameValidation()
	{
		
		$check = $this->unit->checkUnitName($_GET['value']);
		if(!$check)
			echo 'false';
		else
			echo 'true';
	}

	public function projectNameValidation()
	{
		
		$check = $this->project->checkProjectName($_GET['value']);
		if(!$check)
			echo 'false';
		else
			echo 'true';
	}

	public function deleteunitimage()
	{
		$id = $_GET['id'];
		$image = $this->unit->get_image_ByID($id);
		//printme($image); exit();
		$this->unit->delete_image($id);

		$unit_images = $this->unit->get_images($image->unit_id);

		

		$sliderHTML = '<ul class="bxslider" style="height: 200px!important;">';
		if (is_array($unit_images)) {
			foreach ($unit_images as $image) {
				$sliderHTML .= '<li><img class="slider_imgs" src="'.base_url().'application/static/upload/units/'.$image->image.'"></li>';
			}
			$sliderHTML .= '</ul>';
		}else{
			echo '<div class="alert alert-warning" role="alert">None Available</div>';
			exit();
		}

		echo $sliderHTML;
		exit();
	}
	

	public function checkPropertyAlert()
	{
		$alerts = $this->property->getPropertiesAlert();
		foreach ($alerts as $alert ) {
			$propertyData = explode(',', $alert->property_data);
			$max = count($propertyData);
			$min = 0;
			$where='';
			foreach ($propertyData as $x) {
				if($min == 0)
					$where .= $x;
				else
					$where .= ' && '.$x;

				$min++;
			}
			$checkNewProperty = $this->property->checkNewProperty($where,$alert->date_joined);
			//printme($checkNewProperty);
			// wait for the response from the service, then check the result set and send the email
		}
	}


	function smtpmailer($subject,$body,$to) { 

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


		  if($this->email->send())
			return true;
		 else
			{
			 show_error($this->email->print_debugger());
			}
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */