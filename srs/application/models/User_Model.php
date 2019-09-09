<?php
class User_Model extends CI_Model {
	public function __construct() {
	   $this->load->database();
	}

	function validateUser($data){
		$userId = $data['userId'];
		$password = $data['password'];
		$type = $data['type'];

		// $data['password'] = md5($password);

		$this -> db -> select('userId, password');
   		$this -> db -> from('users');
   		$this -> db -> where('userId', $userId);
   		$this -> db -> where('password', $password);
   		$this -> db -> where('type', $type);
   		$this -> db -> limit(1);
   		$query = $this -> db -> get();
   		  
   		if($query -> num_rows() == 1){
 
     		return true; 
 			}
   		else{
    		 return false;
 			 }

}

	function insertAddUser($data){

		$data['created_at'] = date('Y-m-d H:i:s');
		return $this->db->insert('employee', $data);
	}
	function insertAddingDoctor($data){

		$data['created_at'] = date('Y-m-d H:i:s');
		return $this->db->insert('doctor',$data);
	}
	function get_all_employees(){
		
		$res=array();
		$query=$this->db->get('employee');
		if($query->num_rows()>0){
			$res['bool']=true;
			$res['employeeData']=$query->result_array();
		}else{
			$res['bool']=false;
		}
		return $res;
	}
	function get_all_hospitals(){
		
		$res=array();
		$query=$this->db->get('hospital');
		if($query->num_rows()>0){
			$res['bool']=true;
			$res['hospitalData']=$query->result_array();
		}else{
			$res['bool']=false;
		}
		return $res;
	}
	function update_employee_data($request,$id) {
		
		$name = $request->name;
		$mobile =$request->mobile;
		$email =$request->email;
		$role=$request->role;
		$data = array(
			'name'=>$name,
			'mobile'=>$mobile,
			'email'=>$email,
			'role'=>$role,
			'updated_at' =>date('Y-m-d H:i:s')

		);
		$this->db->where('id', $id); 
		return $this->db->update('employee', $data);
	}
	function update_service_data($request,$id) {
		
		$name = $request->name;
		$data = array(
			'name'=>$name,
			'updated_at' =>date('Y-m-d H:i:s')

		);
		$this->db->where('id', $id); 
		return $this->db->update('service', $data);
	}
	function get_all_doctors(){
		$res=array();
		$this->db->select('d.id,d.name as name,s.name as name_1,d.mobile,d.email')
				->from('doctor as d')
				->join('specialization as s','s.id = d.specialization','left');
				$qry = $this->db->get();
		if($qry->num_rows()>0){
			$res['bool']=true;
			$res['doctorsData']=$qry->result_array();
		} else {
			$res['bool']=false;
		}
		return $res;
	}
	function get_ParticularService($id){
		$res=array();
		$this->db->select('p.id,p.particular,p.price,p.service_id,p.corporate_price')
				->from('particular as p')
				->where('p.service_id', $id);
				$qry = $this->db->get();
		if($qry->num_rows()>0){
			$res['bool']=true;
			$res['particularservice']=$qry->result_array();
		} else {
			$res['bool']=false;
		}
		return $res;
	}
	function get_all_particulars(){
		
		$res=array();
		$query=$this->db->get('particular');
		if($query->num_rows()>0){
			$res['bool']=true;
			$res['particularData']=$query->result_array();
		}else{
			$res['bool']=false;
		}
		return $res;
	}
	function get_all_roles(){
		
		$res=array();
		$query=$this->db->get('role');
		if($query->num_rows()>0){
			$res['bool']=true;
			$res['rolesData']=$query->result_array();
		}else{
			$res['bool']=false;
		}
		return $res;
	}
	function get_all_services(){
		
		$res=array();

		$query=$this->db->get('service');
		if($query->num_rows()>0){
			$res['bool']=true;
			$res['serviceData']=$query->result_array();
		}else{
			$res['bool']=false;
		}
		return $res;
	}
	function update_doctors_data($request, $id) {
		$name = $request->name;
		$mobile =$request->mobile;
		$email =$request->email;
		$hospital =$request->hospital;
		$specialization =$request->specialization;


		$data = array(
			'name'=>$name,
			'mobile'=>$mobile,
			'email'=>$email,
			'specialization'=>$specialization,
			'hospital'=>$hospital,
			'updated_at' =>date('Y-m-d H:i:s')

		);

		$this->db->where('id', $id);  
		return $this->db->update('doctor', $data);
	}
	function insertSpecialization($data){

		$data['created_at'] = date('Y-m-d H:i:s');
		return $this->db->insert('specialization', $data);
	}
	function get_all_specialization(){
		
		$res=array();
		$query=$this->db->get('specialization');
		if($query->num_rows()>0){
			$res['bool']=true;
			$res['specializationData']=$query->result_array();
		}else{
			$res['bool']=false;
		}
		return $res;
	}
	function update_specialization_data($request, $id) {
		$name = $request->name;
		
		$data = array(
			'name'=>$name,
			'updated_at' =>date('Y-m-d H:i:s')

		);

		$this->db->where('id', $id);  
		return $this->db->update('specialization', $data);
	}
	function insertHospital($data){

		$data['created_at'] = date('Y-m-d H:i:s');
		return $this->db->insert('hospital', $data);
	}
	function update_hospital_data($request, $id) {
		$name = $request->name;
		
		$data = array(
			'name'=>$name,
			'updated_at' =>date('Y-m-d H:i:s')

		);
		$this->db->where('id', $id);  
		return $this->db->update('hospital', $data);
	}
	function insertPatient($data){

		$data['created_at'] = date('Y-m-d H:i:s');
		return $this->db->insert('patient', $data);
	}
	function insertParticular($data){

		$data['created_at'] = date('Y-m-d H:i:s');
		return $this->db->insert('particular', $data);
	}
	function insertService($data){

		$data['created_at'] = date('Y-m-d H:i:s');
		return $this->db->insert('service', $data);
	}
	function get_all_patients(){
		
		$res=array();
		$query=$this->db->get('patient');
		if($query->num_rows()>0){
			$res['bool']=true;
			$res['patientData']=$query->result_array();
		}else{
			$res['bool']=false;
		}
		return $res;
	}
	function update_patient_data($request, $id) {
		$name = $request->name;
		$email = $request->email;
		$mobile = $request->mobile;
		$gender = $request->gender;
		$address = $request->address;
		$area = $request->area;
		
		$data = array(
			'name'=>$name,
			'email'=>$email,
			'mobile'=>$mobile,
			'gender'=>$gender,
			'address'=>$address,
			'area'=>$area,
			'updated_at' =>date('Y-m-d H:i:s')

		);

		$this->db->where('id', $id);  
		return $this->db->update('patient', $data);
	}
	function update_particular_data($request, $id) {
		$particular = $request->particular;
		$price = $request->price;
		$corporate_price=$request->corporate_price;
		
		$data = array(
			'particular'=>$particular,
			'price'=>$price,
			'corporate_price'=>$corporate_price,
			'updated_at' =>date('Y-m-d H:i:s')

		);

		$this->db->where('id', $id);  
		return $this->db->update('particular', $data);
	}

	
}
?>