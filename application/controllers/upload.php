
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload extends Base_Controller {

	public function __construct()
    {
    	parent::__construct();    	
	}

	public function upload(){
		$data = array();		

		if(isset($_GET['files']))
		{  
		    $error = false;
		    $files = array();

		    $uploaddir = FCPATH.'/upload/meal/';
		    foreach($_FILES as $file)
		    {
		        if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])))
		        {
		            $files[] = $uploaddir .$file['name'];
		        }
		        else
		        {
		            $error = true;
		        }
		    }
		    $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
		}
		else
		{
		    $data = array('success' => 'Form was submitted', 'formData' => $_POST);
		}

		echo json_encode($data);
		exit;
	}
}

?>