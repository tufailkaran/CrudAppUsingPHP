<?php
require_once('crud_operations/crud_operations.php');
$obj=new mysqlQuery();


if($_POST['action'] === 'insert'){
	$name=$obj->get_safe_str($_POST['name']);
	$email=$obj->get_safe_str($_POST['email']);
	$phone=$obj->get_safe_str($_POST['phone']);
	$condition_arr=array('name'=>$name,'email'=>$email,'phone'=>$phone);
	
	$obj->insertData('users',$condition_arr);
	

}


?>
	