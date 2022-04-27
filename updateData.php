<?php
require_once('crud_operations/crud_operations.php');
$obj=new mysqlQuery();

$name='';
$email='';
$mobile='';
$id='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=$obj->get_safe_str($_GET['id']);
	$condition_arr=array('id'=>$id);
	$result=$obj->getData('users','*',$condition_arr);
	$name=$result['0']['name'];
	$email=$result['0']['email'];
	$phone=$result['0']['phone'];
}
if($_POST['action'] === 'update'){
	$name=$obj->get_safe_str($_POST['name']);
	$email=$obj->get_safe_str($_POST['email']);
	$phone=$obj->get_safe_str($_POST['phone']);
	$id=$obj->get_safe_str($_POST['id']);
    $condition_arr=array('name'=>$name,'email'=>$email,'phone'=>$phone);
	
	if($id!=''){
		$obj->updateData('users',$condition_arr,'id',$id);
	}
	
}

?>
	<script>
	window.location.href='index.php';
	</script>
	<?php


?>