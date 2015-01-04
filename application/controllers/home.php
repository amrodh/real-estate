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
		// printme($a); exit();
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
		// printme($actual_link); exit();

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

		$data['unit'] = $this->unit->getByProjectID($proj_id);
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