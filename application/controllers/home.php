<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$data['projects'] = $this->project->getAll();

		$sliders_content = $this->content->getSliderContent();
		$slides = array();
		foreach ($sliders_content as $slider_content ) {
			array_push($slides,$slider_content->image);
		}
		$data['slides'] = $slides;

		$a = array();
		$order = 0;
		foreach ($data['projects'] as $project ) {
			$name = $data['projects'][$order]->name;
			$id = $data['projects'][$order]->id;
			$order++;
			array_push($a,[$name,$id]);
		}
		$data['array'] = $a;

		$featured_images = array();
		$order = 0;
		$featured = $this->project->getFeatured();
		foreach ($featured as $f ) {
			$featured_id = $featured[$order]->id;
			$featured_image = $this->project->getLogo($featured_id)[0]->logo;
			$featured_name = $this->project->getLogo($featured_id)[0]->name;
			$order++;
			array_push($featured_images,[$featured_image,$featured_name]);
		}
		$data['featured_images'] = $featured_images;

		$this->load->model('social');
		$social_links = array();
		$links = $this->social->getAll();
		$data['social_links'] = $links;
		
		if(isset($_POST['subscribe'])){

			$email = $_POST["email"];

			if($email == "") {
				echo "<script type='text/javascript'>alert('Email has to be filled out.');</script>";

			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "<script type='text/javascript'>alert('Email has to be filled out.');</script>"; 

			} else {
			
				date_default_timezone_set("Egypt");
				$date = date("Y-m-d")." ".date("h:i:sa");

				$params = array(
			            "user_identifier" => $email,
			            "date_joined" => $date
			    );

				$insert_flag = 0;
			    $newsletter_users = $this->user->getAllNewsletterData();
			    foreach ($newsletter_users as $newsletter_user ) {
					$user_email = $newsletter_user->user_identifier;
					
					if($user_email == $email){
						$insert_flag = 1;
					}
				}

				if(!$insert_flag) $this->user->insertNewsletterData($params);
				echo "<script type='text/javascript'>alert('You are now subscribed.');</script>"; 
			}
		}

		
		$this->load->view('home.php',$data);
	}

	function project() 
	{ 
		$projects = $this->project->getAll();

		$a = array();
		$order = 0;
		foreach ($projects as $project ) {
			$name = $projects[$order]->name;
			$id = $projects[$order]->id;
			$order++;
			array_push($a,[$name,$id]);
		}
		$data['array'] = $a;

		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
		$actual_link = explode("/",$actual_link); 

		$data['id'] = $this->project->getByName(urldecode($actual_link[5]));

		$data['units'] = $this->unit->getAllByProjectID($data['id']->id);

		$unit_images = array();
		$order = 0;
		if(!empty($data['units'])) {
			foreach ($data['units'] as $unit ) {
				$id = $data['units'][$order]->id;
				$unit_image = $this->unit->getFeaturedImage($id)[0]->image;
				$type = $this->unit->get_unit_type($unit->type_id);
				$type = $type[0]->type;
				$order++;
				array_push($unit_images,[$id,$unit_image,$type]);
			}
		}
		$data['unit_images'] = $unit_images;

		$data['images'] = $this->project->get_images($data['id']->id);

		$this->load->model('social');
		$social_links = array();
		$links = $this->social->getAll();
		$data['social_links'] = $links;

		if(isset($_POST['subscribe'])){

			$email = $_POST["email"];

			if($email == "") {
				echo "<script type='text/javascript'>alert('Email has to be filled out.');</script>";

			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "<script type='text/javascript'>alert('Email has to be filled out.');</script>"; 

			} else {
			
				date_default_timezone_set("Egypt");
				$date = date("Y-m-d")." ".date("h:i:sa");

				$params = array(
			            "user_identifier" => $email,
			            "date_joined" => $date
			    );

				$insert_flag = 0;
			    $newsletter_users = $this->user->getAllNewsletterData();
			    foreach ($newsletter_users as $newsletter_user ) {
					$user_email = $newsletter_user->user_identifier;
					
					if($user_email == $email){
						$insert_flag = 1;
					}
				}

				if(!$insert_flag) $this->user->insertNewsletterData($params);
				echo "<script type='text/javascript'>alert('You are now subscribed.');</script>"; 
			}
		}

		$this->load->view('project.php',$data);
	}

	function findyourhome() 
	{ 
		$projects = $this->project->getAll();

		$a = array();
		$order = 0;
		foreach ($projects as $project ) {
			$name = $projects[$order]->name;
			$id = $projects[$order]->id;
			$order++;
			array_push($a,[$name,$id]);
		}
		$data['array'] = $a;

		$locations = $this->project->getLocations();
		$cities = array();
		$order = 0;
		foreach ($locations as $location ) {
			array_push($cities, $location->location);
			$order++;
		}
		$data['cities'] = $cities;

		$sub_locations = $this->project->getDistricts();
		$districts = array();
		$order = 0;
		foreach ($sub_locations as $sub_location ) {
			array_push($districts, $sub_location->district);
			$order++;
		}
		$data['districts'] = $districts;

		$this->load->model('social');
		$social_links = array();
		$links = $this->social->getAll();
		$data['social_links'] = $links;

		if(isset($_POST['search'])) {
			$units = $this->unit->getByCityAndDistrict($_POST['location'],$_POST['district']);
			$unit_images = array();
			$order = 0;
			if(!empty($units)){
				foreach ($units as $unit ) {
					$type = $this->unit->get_unit_type($unit->type_id);
					$type = $type[0]->type;
					$id = $unit->id;
					$unit_image = $this->unit->getFeaturedImage($id)[0]->image;
					$order++;
					array_push($unit_images,[$id,$unit_image,$type]);
				}

				$units_data = array();
				$order = 0;
				foreach ($units as $unit ) {
					$title = $unit->title;
					$id = $unit->id;
					$area = $unit->area;
					$price = $unit->price;
					$project_id = $unit->project_id;
					$rooms = $unit->rooms;
					$image = $unit_images[$order][1];
					$type = $unit_images[$order][2];
					$order++;
					array_push($units_data,[$id,$title,$area,$price,$project_id,$rooms,$image,$type]);
				}
				$data['units_data'] = $units_data;
			}
			
			$data['search_results'] = $order;
		}

		$this->load->view('findYourHome.php',$data);
	}

	function unit() 
	{ 
		$data['projects'] = $this->project->getAll();

		$a = array();
		$order = 0;
		foreach ($data['projects'] as $project ) {
			$name = $data['projects'][$order]->name;
			$id = $data['projects'][$order]->id;
			$latitude = $data['projects'][$order]->latitude;
			$longitude = $data['projects'][$order]->longitude;
			$order++;
			array_push($a,[$name,$id,$latitude,$longitude]);
		}
		$data['array'] = $a;

		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
		$actual_link = explode("/",$actual_link); 
		$unit_name = urldecode($actual_link[5]);
		$project = $this->unit->getProjectByUnit($unit_name);
		$project_id = $project->project_id;
		$data['units'] = $this->unit->getAllByProjectID($project_id);

		$units = $this->unit->getAll();
		$order = 0;
		foreach ($units as $unit ) {
			$id = $units[$order]->project_id;
			if ($id == $project_id) {
				$proj_id = $id;
				break;
			}
			$order++;
		}

		$data['unit'] = $this->unit->getByProjectAndUnit($proj_id,$unit_name);
		$data['unit_type'] = $this->unit->get_unit_type($data['unit']->type_id);
		$data['images'] = $this->unit->get_images($data['unit']->id);

		$unit_images = array();
		$order = 0;
		foreach ($data['units'] as $unit ) {
			if ($unit->id != $data['unit']->id) {
				$type = $this->unit->get_unit_type($unit->type_id);
				$type = $type[0]->type;
				$id = $unit->id;
				$unit_image = $this->unit->getFeaturedImage($id)[0]->image;
				$order++;
				array_push($unit_images,[$id,$unit_image,$type]);
			}
		}
		$data['unit_images'] = $unit_images;

		$this->load->model('social');
		$social_links = array();
		$links = $this->social->getAll();
		$data['social_links'] = $links;

		if(isset($_POST['subscribe'])){

			$email = $_POST["email"];

			if($email == "") {
				echo "<script type='text/javascript'>alert('Email has to be filled out.');</script>";

			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "<script type='text/javascript'>alert('Email has to be filled out.');</script>"; 

			} else {
			
				date_default_timezone_set("Egypt");
				$date = date("Y-m-d")." ".date("h:i:sa");

				$params = array(
			            "user_identifier" => $email,
			            "date_joined" => $date
			    );

				$insert_flag = 0;
			    $newsletter_users = $this->user->getAllNewsletterData();
			    foreach ($newsletter_users as $newsletter_user ) {
					$user_email = $newsletter_user->user_identifier;
					
					if($user_email == $email){
						$insert_flag = 1;
					}
				}

				if(!$insert_flag) $this->user->insertNewsletterData($params);
				echo "<script type='text/javascript'>alert('You are now subscribed.');</script>"; 
			}
		}

		// printme($data);exit();
		$this->load->view('unit.php',$data);
	}

	function contact() 
	{ 
		$data['projects'] = $this->project->getAll();

		$a = array();
		// printme($a); exit();
		$order = 0;
		foreach ($data['projects'] as $project ) {
			$name = $data['projects'][$order]->name;
			$id = $data['projects'][$order]->id;
			$order++;
			array_push($a,[$name,$id]);
		}
		$data['array'] = $a;

		if(isset($_POST['submitMail'])){

			$user = $_POST["name"];
			$company = $_POST["company"];
			$email = $_POST["email"];
			$headers = "From: $email";
			$msg = $_POST["msg"];
			$msg = wordwrap($msg,70);

			$message = "Sender: ".$user."\nCompany: ".$company."\nMessage: ".$msg;

			echo "<script type='text/javascript'>alert('Message sent.');</script>";

			mail("m.ashraf@enlightworld.com","My subject",$message,$headers);
		}

		$this->load->model('social');
		$social_links = array();
		$links = $this->social->getAll();
		$data['social_links'] = $links;
		
		if(isset($_POST['subscribe'])){

			$email = $_POST["email"];

			if($email == "") {
				echo "<script type='text/javascript'>alert('Email has to be filled out.');</script>";

			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "<script type='text/javascript'>alert('Email has to be filled out.');</script>"; 

			} else {
			
				date_default_timezone_set("Egypt");
				$date = date("Y-m-d")." ".date("h:i:sa");

				$params = array(
			            "user_identifier" => $email,
			            "date_joined" => $date
			    );

				$insert_flag = 0;
			    $newsletter_users = $this->user->getAllNewsletterData();
			    foreach ($newsletter_users as $newsletter_user ) {
					$user_email = $newsletter_user->user_identifier;
					
					if($user_email == $email){
						$insert_flag = 1;
					}
				}

				if(!$insert_flag) $this->user->insertNewsletterData($params);
				echo "<script type='text/javascript'>alert('You are now subscribed.');</script>"; 
			}
		}
		
		$this->load->view('contact.php',$data);
	}
}