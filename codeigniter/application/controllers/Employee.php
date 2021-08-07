<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

  public function __construct(){

    parent::__construct();
    $this->load->helper('url');

    // Load model
    $this->load->model('Employee_model');

  }

  public function index(){

    // load view
    $this->load->view('emp_view');

  }

  public function empList(){
    // POST data
    $postData = $this->input->post();

    // Get data
    $data = $this->Employee_model->getEmployees($postData);

    echo json_encode($data);
  }

}