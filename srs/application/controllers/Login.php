<?php
#
# Copyright (c) 2019 by:
# ITCrats Info Solutions
# @author JANI SHAIK
# @created 08/08/2019
#

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('User_Model');
	}

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{
		$this->load->view('login');
	}

	/**
	* Dashboard
	*
	*/
	public function dashboard() {
		$this->load->view('header');
		$this->load->view('adminModules/dashboard');
		$this->load->view('footer');
	}
	public function  logging(){

		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata, true);
		echo json_encode($this->User_Model->validateUser($request));
	}
	public function dashboardModules(){
		$this->load->view('header');
		$this->load->view('dashboardModules');
		$this->load->view('footer');
	}
	public function patient() {
		$this->load->view('header');
		$this->load->view('patient');
		$this->load->view('footer');
	}
	public function getPatientsData() {
		echo json_encode($this->User_Model->get_all_patients());
		
	}
	public function addingPatient (){
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata, true);
		echo $this->User_Model->insertPatient($request);
	}
	function update_patient () {
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$id = $request->id;
		echo $this->User_Model->update_patient_data($request, $id);

	}
	public function referralDoctors() {
		$this->load->view('header');
		$this->load->view('ReferralDoctors');
		$this->load->view('footer');
	}
	public function addingDoctor(){
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata, true);
		echo $this->User_Model->insertAddingDoctor($request);

	}
	public function getDoctors() {
		echo json_encode($this->User_Model->get_all_doctors());
		
	}
	function update_doctor() {
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$id = $request->id;
		echo $this->User_Model->update_doctors_data($request, $id);

	}
	public function getSpecializationData() {
		echo json_encode($this->User_Model->get_all_specialization());
		
	}
	public function getHospitalData() {
		echo json_encode($this->User_Model->get_all_hospitals());
		
	}
	public function userAccounts() {
		$this->load->view('header');
		$this->load->view('UserAccounts');
		$this->load->view('footer');
	}
	public function getRoles() {
		echo json_encode($this->User_Model->get_all_roles());
		
	}
	public function getEmployees() {
		echo json_encode($this->User_Model->get_all_employees());
		
	}
	public function createUser(){
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata, true);
		echo $this->User_Model->insertAddUser($request);

	}
	function update_employee() {
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$id = $request->id;
		echo $this->User_Model->update_employee_data($request, $id);

	}
	public function services() {
		$this->load->view('header');
		$this->load->view('services');
		$this->load->view('footer');
	}
	public function getServices() {
		echo json_encode($this->User_Model->get_all_services());
		
	}
	public function addingService (){
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata, true);
		echo $this->User_Model->insertService($request);
	}
	function update_service() {
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$id = $request->id;
		echo $this->User_Model->update_service_data($request, $id);

	}
	public function addingParticular (){
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata, true);
		echo $this->User_Model->insertParticular($request);
	}
	public function getParticularService() {
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		 $id = $request->id;
		// echo $this->User_Model->get_ParticularService($id);
		echo json_encode($this->User_Model->get_ParticularService($id));
		
	}
	function update_particular () {
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$id = $request->id;
		echo $this->User_Model->update_particular_data($request, $id);

	}
	public function specialization() {
		$this->load->view('header');
		$this->load->view('specialization');
		$this->load->view('footer');
	}
	public function specializationData(){
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata, true);
		echo $this->User_Model->insertSpecialization($request);
	}
	function update_specialization () {
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$id = $request->id;
		echo $this->User_Model->update_specialization_data($request, $id);

	}
	public function hospital() {
		$this->load->view('header');
		$this->load->view('hospital');
		$this->load->view('footer');
	}
	public function hospitalData(){
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata, true);
		echo $this->User_Model->insertHospital($request);
	}
	function update_hospital () {
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$id = $request->id;
		echo $this->User_Model->update_hospital_data($request, $id);

	}


}
