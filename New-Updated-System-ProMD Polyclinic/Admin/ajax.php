<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
#UPDATE PROFILE
if($action == 'update'){
	$save = $crud->save_patient();
	if($save)
		echo $save;
}

if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'logout2'){
	$logout = $crud->logout2();
	if($logout)
		echo $logout;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'save_patient'){
	$save = $crud->save_patient();
	if($save)
		echo $save;
}
if($action == 'save_profile'){
	$save = $crud->save_profile();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}

if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == 'forgot'){
	$save = $crud->forgot();
	if($save)
		echo $save;
}
if($action == "save_settings"){
	$save = $crud->save_settings();
	if($save)
		echo $save;
}
if($action == "save_category"){
	$save = $crud->save_category();
	if($save)
		echo $save;
}
if($action == "delete_category"){
	$save = $crud->delete_category();
	if($save)
		echo $save;
}
if($action == "save_doctor"){
	$save = $crud->save_doctor();
	if($save)
		echo $save;
}
if($action == "doc_status"){
	$save = $crud->doc_status();
	if($save)
		echo $save;
}
if($action == "status_doctor"){
	$save = $crud->status_doctor();
	if($save)
		echo $save;
}
if($action == "delete_doctor"){
	$save = $crud->delete_doctor();
	if($save)
		echo $save;
}
if($action == "save_schedule"){
	$save = $crud->save_schedule();
	if($save)
		echo $save;
}
if($action == "set_appointment"){
	$save = $crud->set_appointment();
	if($save)
		echo $save;
}
if($action == "edit_appointment"){
	$save = $crud->edit_appointment();
	if($save)
		echo $save;
}

if($action == "edit_multiple_appointment"){
	$save = $crud->edit_multiple_appointment();
	if($save)
		echo $save;
}

if($action == "delete_appointment"){
	$save = $crud->delete_appointment();
	if($save)
		echo $save;
}
if($action == "update_appointment"){
	$save = $crud->update_appointment();
	if($save)
		echo $save;
}
if($action == "delete_inv"){
	$save = $crud->delete_inv();
	if($save)
		echo $save;
}
if($action == "save_events"){
	$save = $crud->save_events();
	if($save)
		echo $save;
}
if($action == "delete_event"){
	$save = $crud->delete_event();
	if($save)
		echo $save;
}




