<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
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
		// printme($data);exit();

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

		// $data['unit_images'] = $this->unit->get_images($data['id']->id);

		$data['images'] = $this->project->get_images($data['id']->id);

		// printme ($data); exit();

		$this->load->view('project.php',$data);
	}

	function unit() 
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

		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
		$actual_link = explode("/",$actual_link); 
		$unit_name = urldecode($actual_link[5]);
		$project = $this->unit->getProjectByUnit($unit_name);
		$project_id = $project->project_id;
		$data['units'] = $this->unit->getAllByProjectID($project_id);
		// printme($unit_name); exit();

		$units = $this->unit->getAll();
		$order = 0;
		foreach ($units as $unit ) {
			$id = $units[$order]->project_id;
			 // printme($project_id);exit();
			if ($id == $project_id) {
				$proj_id = $id;
				break;
			}
			$order++;
		}

		$data['unit'] = $this->unit->getByProjectID($proj_id);

		// printme($data['unit']); exit();
		
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

		$this->load->view('contact.php',$data);
	}
}