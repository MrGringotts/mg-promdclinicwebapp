<?php
session_start();
ini_set('display_errors', 1);
require_once('assets/vendor/autoload.php');
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login2(){
		extract($_POST);
		
		if($type == 1 || $type == 2 || $type == 4){
			
			$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".$password."' and type ='".$type."' ");
			
			if($qry->num_rows > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if($key != 'password')
						$_SESSION['login_'.$key] = $value;
				}
					return 1;
			}else{
				return 3;
			}
			
		}else{
			
			$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".$password."' and type ='3' ");
			if($qry->num_rows > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if($key != 'password')
						$_SESSION['login_'.$key] = $value;
				}
					return 1;
			}else{
				return 3;
			}
		}
	}
	
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}
	
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		
		$chk_user = $this->db->query("SELECT * FROM users WHERE name LIKE '%$name%' ")->num_rows;
		if($chk_user > 0){
			return 2;
			exit;
		}
		
		$chk = $this->db->query("SELECT * FROM users where username = '$username' ")->num_rows;
		if($chk > 0){
			return 3;
			
		}
		
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		$data .= ", password = '$password' ";
		$data .= ", type = '$type' ";
		
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	
	function save_patient(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", address = '$address' ";
		$data .= ", contact = '$contact' ";
		$data .= ", username = '$username' ";
		$data .= ", password = '$password' ";
		
		
		$save = $this->db->query("UPDATE users set ".$data." WHERE id=".$id);
		
			return 1;
		
	}

	#UPDATE PROFILE
	function update_profile(){
		
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", address = '$address' ";
		$data .= ", contact = '$contact' ";
		$data .= ", username = '$username' ";
		$data .= ", password = '$password' ";

		$save = $this->db->query("UPDATE users SET ".$data." WHERE id=".$id);
		
		return 1;
		
	}

	function delete_users(){
		extract($_POST);
		$delete = $this->db->query("DELETE * FROM users where id = ".$id);
		if($delete)
			return 1;
	}

	
	function save_profile(){
		
		extract($_POST);
		
		if($logintype == 4){

			if($_FILES['img']['tmp_name'] != ''){
				
				
				$data = " username = '$username' ";
				$data .= ", password = '$password' ";
				
				$save_user = $this->db->query("UPDATE users set ".$data." WHERE id=".$id." ");
				
				$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
				$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
				$data1 = " img_path = '$fname' ";
				
				$save_img = $this->db->query("UPDATE doctors_list set ".$data1." WHERE id=".$doctorid);
				
				return 1;

			}else{
			
				
				$data = " username = '$username' ";
				$data .= ", password = '$password' ";

				$save_user = $this->db->query("UPDATE users set ".$data." WHERE id=".$id);
				
				return 1;
			}
			
		}else{
			
			$data = " username = '$username' ";
			$data .= ", password = '$password' ";
			
			$save_user = $this->db->query("UPDATE users set ".$data." WHERE id=".$id);
			
			return 1;
			
		}
		

	}
	
	function signup(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", address = '$address' ";
		$data .= ", contact = '$contact' ";
		$data .= ", username = '$username' ";
		$data .= ", password = '$password' ";
		$data .= ", type = 3";
		$chk = $this->db->query("SELECT * FROM users where username = '$username' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
		$chk = $this->db->query("SELECT * FROM users where contact = '$contact' ")->num_rows;
		if($chk > 0){
			return 3;
			exit;
		}
		
			$save = $this->db->query("INSERT INTO users set ".$data);
		if($save){
			$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".$password."' ");
			if($qry->num_rows > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if($key != 'password')
						$_SESSION['login_'.$key] = $value;
				}
			}
			return 1;
		}
	}
	
	function delete_user(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = ".$id);
		if($delete)
			return 1;
	}

	
	function forgot(){
		extract($_POST);
		
		$data = " contact = '$contact' ";
		
		$chk = $this->db->query("SELECT * FROM users where type = '3' AND contact LIKE '%$contact%' ")->num_rows;
		if($chk > 0){
			$qry_setting = $this->db->query("SELECT * FROM system_settings");
			$row_setting = $qry_setting->fetch_array();
			
			$token = $row_setting['token'];
			$deviceID = $row_setting['device_id'];
			$options =[];

			$verify_patient = $this->db->query("SELECT * FROM users where contact LIKE '%$contact%' ");
			$row_ver_patient = $verify_patient->fetch_array();
			
			$patient_username = $row_ver_patient['username'];
			$patient_password = $row_ver_patient['password'];
			
			$phone_number = $row_ver_patient['contact'];
			$message = "Hello this is from ProMD Polyclinic - Online Appointment. To login, username: ".$patient_username." and password: ".$patient_password.".";
			$smsGateway = new SmsGateway($token);
			$result = $smsGateway->sendMessageToNumber($phone_number, $message, $deviceID, $options);
						
			return 1;
			exit;
		}
			
	}

	function save_settings(){
		extract($_POST);
		
		
		$data = " name = '".str_replace("'","&#x2019;",$name)."' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
					$data .= ", cover_img = '$fname' ";

		}
		
		if(isset($chk) && $chk == 'uncheck'){
			
			$chk_token = $this->db->query("SELECT token, device_id FROM system_settings ");
			$ro_chk = $chk_token->fetch_array();
				$device = $ro_chk['device_id'];
				$token = $ro_chk['token'];
				
			$data .= ", device_id = '$device' ";
			$data .= ", token = '$token' ";
			
		}elseif(isset($chk) && $chk == 'check'){
			
			$data .= ", device_id = '$deviceid' ";
			$data .= ", token = '$token' ";
			
		}

		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if($chk->num_rows > 0){
			$save = $this->db->query("UPDATE system_settings set ".$data);
		}else{
			$save = $this->db->query("INSERT INTO system_settings set ".$data);
		}
		if($save){
		$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}
			
			return 1;
			
				}
	}

	
	function save_category(){
		extract($_POST);
		
		if(empty($id)){
			$data = " name = '$name' ";
			$data .= ", description = '$desc' ";
			
			if($_FILES['img']['tmp_name'] != ''){
                $fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
                $move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
                $data .= ", img_path = '$fname' ";

            }else{
				$data .=", img_path = 'default-specialty.png' ";
			}
			
			$save = $this->db->query("INSERT INTO medical_specialty set ".$data);
			
		}else{
			
			$data = " name = '$name' ";
			$data .= ", description = '$desc' ";
			if($_FILES['img']['tmp_name'] != ''){
                $fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
                $move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
                $data .= ", img_path = '$fname' ";

            }
			
			$save = $this->db->query("UPDATE medical_specialty set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_category(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM medical_specialty where id = ".$id);
		if($delete)
			return 1;
	}
	function save_doctor(){
		extract($_POST);
		
		
		if(empty($id)){
				$chk_doctor = $this->db->query("SELECT * FROM doctors_list where name = '$name' ")->num_rows;
				if($chk_doctor > 0){
					return 2;
				}
				
				$chk = $this->db->query("SELECT * FROM users where username = '$username' ")->num_rows;
				if($chk > 0){
					return 3;
				}
				
				$data = " name = '$name' ";
				$data .= ", name_pref = '$name_pref' ";
				$data .= ", clinic_roomno = '$clinic_roomno' ";
				$data .= ", contact = '$contact' ";
				$data .=" , specialty_ids = '[".implode(",",$specialty_ids)."]' ";
				
				if($_FILES['img']['tmp_name'] != ''){
					$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
					$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
					$data .= ", img_path = '$fname' ";

				}else{
					$data .= ", img_path = 'default-md.png' ";
				}
				
				$data .= ", status = '$status' ";
				
				$save = $this->db->query("INSERT INTO doctors_list set ".$data);
			
			
				$ins_doctor = $this->db->query("SELECT * FROM doctors_list WHERE name='$name' ");
				$ins_row = $ins_doctor->fetch_array();
				$doc_id = $ins_row['id'];
				
				$data1 = " id = null ";
                $data1 .= ", doctor_id = '$doc_id' ";
				$data1 .= ", name = '$name' ";
                $data1 .= ", birthdate = '' ";
				$data1 .= ", address = '' ";
				$data1 .= ", contact = '' ";
				$data1 .= ", username = '$username' ";
				$data1 .= ", password = '$password' ";
				$data1 .= ", type = '4' ";
			
				$save1 = $this->db->query("INSERT INTO users set ".$data1);

                if($save1){
                    return 1;
                }
		}else{
			
				$data = " name = '$name' ";
				$data .= ", name_pref = '$name_pref' ";
				$data .= ", clinic_roomno = '$clinic_roomno' ";
				$data .= ", contact = '$contact' ";
				$data .=" , specialty_ids = '[".implode(",",$specialty_ids)."]' ";
				
				if($_FILES['img']['tmp_name'] != ''){
					$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
					$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
					$data .= ", img_path = '$fname' ";

				}
				
				$data .= ", status = '$status' ";
				
				$save = $this->db->query("UPDATE doctors_list set ".$data."  where id=".$id);
				
				$data1 = " name = '$name' ";
				$data1 .= ", username = '$username' ";
				$data1 .= ", password = '$password' ";
				$data1 .= ", type = '4' ";
				$save1 = $this->db->query("UPDATE users set ".$data1."  where doctor_id=".$id);

                if($save1){
                    return 1;
                }
		}
		
			
	}
	
	function status_doctor(){
		extract($_POST);
		$data = " status = '$status' ";
		$save = $this->db->query("UPDATE doctors_list set ".$data." where id=".$id);
		return 1;
		
	}
	
	function doc_status(){
		extract($_POST);
		
		$ver_doc = $this->db->query("SELECT * FROM doctors_list WHERE id = '".$id."' ");
		$doc_row = $ver_doc->fetch_array();
		
		if($doc_row['status'] == 0){
			$doc_stat = 1;
		}elseif($doc_row['status'] == 1){
			$doc_stat = 0;
		}
		
		$save = $this->db->query("UPDATE doctors_list set status = '".$doc_stat."' where id=".$id);
		return 1;
		
	}
	
	
	function delete_doctor(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM doctors_list where id = ".$id);
		$delete = $this->db->query("DELETE FROM users where doctor_id = ".$id);
		if($delete)
			return 1;
	}

	function save_schedule(){
		extract($_POST);
		
		$delete_sched = $this->db->query("DELETE FROM doctors_schedule where doctor_id =".$doctor_id);
		
	
		foreach($days as $k => $val){
			
			
			$a = strtotime($time_from[$k]);
			$b = strtotime($time_to[$k]);
	
		
			for($i = 0; $i < $b - $a; $i += 3600) {
			
			  $t = date('H:i', $a + $i);
			  $f = date('H:i', strtotime($t) + 3600);
			
				$data = " doctor_id = '$doctor_id' ";
				$data .= ", day = '$days[$k]' ";
				$data .= ", f_time_frame = '$time_from[$k]' ";
				$data .= ", t_time_frame = '$time_to[$k]' ";
				$data .= ", time_from = '$t' ";
				$data .= ", time_to = '$f' ";
			
				if(isset($check[$k])){
					$save[] = $this->db->query("INSERT INTO doctors_schedule set ".$data);
				}
			
			}
			
			
		}

			if(isset($save)){
				return 1;
			}
	}


	function set_appointment(){
		$limit = '20';
        $result = $this->db->query("SELECT * FROM appointment_list");
        $count = $result->num_rows;

        if($count < $limit){

		extract($_POST);
			$a_date = date('Y-m-d',strtotime($date));
			
			
			$date_now = date("d-F-Y");
			$b_date = date("d-m-Y", strtotime($date));
			if(strtotime($b_date) < strtotime(date("d-m-Y"))){
				return json_encode(array('status'=>2,"msg"=>"Date must not less than today's date (".$date_now.")."));
				exit;
			}
			
			$doc_no_patient = $this->db->query("SELECT * FROM appointment_list WHERE doctor_id = '".$doctor_id."' AND a_date='".$a_date."' ")->num_rows;
			
			if($doc_no_patient == 2){
				return json_encode(array('status'=>2,"msg"=>"There is no available slot for the selected date of appointment."));
				exit;
			}
				
			// $chk = $this->db->query("SELECT * FROM `appointment_list` where `doctor_id` = '$doctor_id' AND `patient_id` = '$patient_id' AND a_date = '$a_date' ")->num_rows;
			// if($chk > 0){
			// 	return json_encode(array(
			// 		'status'=>2,"msg"=>"You are already scheduled for that date."
			// 	));
			// 	exit;
			// }
			

			$data = " doctor_id = '$doctor_id' ";
			$data .= ", patient_id = '$patient_id' ";
			$data .= ", a_date = '$a_date' ";
			
			foreach ($time as $key => $value){
				$data .= ", a_time  = '$value' ";
			}
			
			if(isset($status)){
			$data .= ", status = '$status' ";
			}else{
			$data .= ", status = 0 ";	
			}
			
			//09976975062
			if(isset($id) && !empty($id)){
				
				$save = $this->db->query("UPDATE appointment_list set ".$data." where id = ".$id);
				
				$qry_patient = $this->db->query("SELECT * FROM users where id = ".$patient_id." ");
					if($qry_patient->num_rows > 0){
						$row_patient = $qry_patient->fetch_array();
						
							$patient_name = $row_patient['name'];
							$phone_number = $row_patient['contact'];
							
							$qry_appointment = $this->db->query("SELECT * FROM appointment_list WHERE id = ".$id);
							$row_appointment = $qry_appointment->fetch_array();
		
							$app_date = date('F d, Y', strtotime($row_appointment['a_date']));
							$app_time = $row_appointment['a_time'];
							
				
							$qry_setting = $this->db->query("SELECT * FROM system_settings");
							$row_setting = $qry_setting->fetch_array();
							
							
							$token = $row_setting['token'];
							$deviceID = $row_setting['device_id'];
							$options =[];

							if($status == '1'){
								
								$message = "Hi! ".$patient_name." This is from ProMD Polyclinic - Online Appointment. We would like to inform you that your appointment on ".$app_date." ".$app_time." was confirmed. Note This Message is computer generated please do not reply ";
								$smsGateway = new SmsGateway($token);
								$result = $smsGateway->sendMessageToNumber($phone_number, $message, $deviceID, $options);
								
							}elseif($status == '2'){
								
								$message = "Hi ".$patient_name." This is from ProMD Polyclinic - Online Appointment. We would like to inform you that your appointment was rescheduled on ".$app_date." ".$app_time." Note This Message is computer generated please do not reply ";
								$smsGateway = new SmsGateway($token);
								$result = $smsGateway->sendMessageToNumber($phone_number, $message, $deviceID, $options);
							}						

					}
			
			}else{
				$save = $this->db->query("INSERT INTO appointment_list set ".$data);
			}
			if($save){
			
			}	return json_encode(array('status'=>1));
		  }
		  
	}
	
	function edit_appointment(){
		extract($_POST);
		
			$a_date = date('Y-m-d',strtotime($date));
			
			$date_now = date("d-F-Y");
			$b_date = date("d-m-Y", strtotime($date));
			if(strtotime($b_date) < strtotime(date("d-m-Y"))
			){
				return json_encode(array('status'=>2,"msg"=>"Date must not less than today's date (".$date_now.")."));
				exit;
			}
			
			$doc_no_patient = $this->db->query("SELECT * FROM appointment_list WHERE doctor_id = '".$doctor_id."' AND a_date='".$a_date."' ")->num_rows;
			
			if($doc_no_patient == 1){
				return json_encode(array('status'=>2,"msg"=>"There is no available slot for the selected date of appointment."));
				exit;
			}
			
			$data = " a_date = '$a_date' ";
			
			foreach ($time as $key => $value){
				$data .= ", a_time  = '$value' ";
			}
			
			if(isset($r_id) && !empty($r_id)){
				
				$save = $this->db->query("UPDATE appointment_list set ".$data." where id = ".$r_id);
			}
			if($save){
				return json_encode(array('status'=>1));
			}
	}
	
		function edit_multiple_appointment(){
		extract($_POST);
			
			$date_from = date('Y-m-d',strtotime($datefrom));
			$date_to = date('Y-m-d',strtotime($dateto));
			$date_now = date("d-F-Y");
			$b_date = date("d-m-Y", strtotime($dateto));
			
			$chk_doc_no_patient = $this->db->query("SELECT * FROM appointment_list WHERE doctor_id = '".$doctor_id."' AND a_date='".$date_from."' ")->num_rows;
			if($chk_doc_no_patient == 0){
				return json_encode(array('status'=>2,"msg"=>"There is appointment for the selected date."));
				exit;
			}
			
			
			//$a_date = date('Y-m-d',strtotime($date));
			
			
			if(strtotime($b_date) < strtotime(date("d-m-Y"))){
				return json_encode(array('status'=>2,"msg"=>"Date must not less than today's date (".$date_now.")."));
				exit;
			}
			
			$doc_no_patient = $this->db->query("SELECT * FROM appointment_list WHERE doctor_id = '".$doctor_id."' AND a_date='".$date_to."' ")->num_rows;
			
			if($doc_no_patient == 2){
				return json_encode(array('status'=>2,"msg"=>"There is no available slot for the selected date of appointment."));
				exit;
			}
			
			
			
			$data = " a_date = '$date_to' ";
			$data .= ", status = '2' ";
			
			
			$qry_setting = $this->db->query("SELECT * FROM system_settings");
			$row_setting = $qry_setting->fetch_array();
			$token = $row_setting['token'];
			$deviceID = $row_setting['device_id'];
			$options =[];
					
				$search_patient = $this->db->query("SELECT * FROM appointment_list where doctor_id = '".$doctor_id."' AND a_date='".$date_from."' ");
				while($row_sp=$search_patient->fetch_array()){
					$r_id = $row_sp['id'];
					$save = $this->db->query("UPDATE appointment_list set ".$data." where id = '".$r_id."' ");
					
					$p_id = $row_sp['patient_id'];
					$app_date = date('F d, Y', strtotime($row_sp['a_date']));
					$app_time = $row_sp['a_time'];
					
					$send_reschedule = $this->db->query("SELECT * FROM users where id = '".$p_id."' ");
					$row_sr = $send_reschedule->fetch_array();
					
					$patient_name = $row_sr['name'];
					$phone_number = $row_sr['contact'];
					$patient_phone = $row_sr['contact'];
					
					$message = "Hi depas".$patient_name."! This is from Labuan General Hospital - Online Appointment. We would like to inform you that your appointment was rescheduled to ".$app_date." at ".$app_time." was confirmed. Note This Message is computer generated please do not reply ";
					$smsGateway = new SmsGateway($token);
					$result = $smsGateway->sendMessageToNumber($patient_phone, $message, $deviceID, $options);
				}
				
	
			
			if($save){
				
				return json_encode(array('status'=>1));
			}
	}
	
	function delete_appointment(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM appointment_list where id = ".$id);
		if($delete)
			return 1;
	}
	
	function save_events(){
		extract($_POST);
		
		if($id <> null){
            $data = " event_date = '$date_event' ";
            $data .= ", title = '$title' ";
            $data .= ", content = '$content' ";
            if($_FILES['img']['tmp_name'] != ''){
                            $fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
                            $move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
                        $data .= ", img_path = '$fname' ";

            }
			$save = $this->db->query("UPDATE events set ".$data." WHERE id=".$id);
        
        }else{

            $data = " event_date = '$date_event' ";
            $data .= ", title = '$title' ";
            $data .= ", content = '$content' ";
            if($_FILES['img']['tmp_name'] != ''){
                            $fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
                            $move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
                        $data .= ", img_path = '$fname' ";

            }else{
                $data .= ", img_path = '' ";
            }
          
            $save = $this->db->query("INSERT INTO events set ".$data);
		}
		if($save){
		
			return 1;
		}

		
		if($save){
		
			return 1;
		}
	}
	

	function delete_event(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM events where id = ".$id);
		if($delete)
			return 1;
	}

}

?>
	