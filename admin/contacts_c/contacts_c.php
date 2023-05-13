<?php ob_start(); require_once('../lib/atz.php');?>
<?php 
class contact_controller extends atz{

	public function __construct() { 

		$this->check_login();
		
		$this->post = array(
			'Contact_Name'=>'',
			'Contact_Subject' =>'',
			'Contact_Phone'=>'',
			'Contact_Email'=>'',
			
			'Contact_Message'=>'',
			'Contact_Created'=> date('Y-m-d H:i:s'),
			'Contact_Update'=> date('Y-m-d H:i:s')
		);
	}

	public function get_contact(){
		$contact = $this->select('contact');
		return $contact;
	}

	

	public function get_contact_detail(){

		

		if(isset($_GET['id'])){

			$contact  = $this->select('contact',array('contact_ID'=>$_GET['id']));
			$contact_detail = array();
			
			if($contact){
				$contact = $contact[0];

				if(!empty($contact['Contact_Contact_ID'])){
					$contact_detail = $this->select_in('contact','Contact_ID IN ('.$contact['Contact_Contact_ID'].')');
				}
			
				
			}

			return $contact_detail;
		}

		
		
	}

}
?>