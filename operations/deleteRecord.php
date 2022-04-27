<?php
require_once('crud_operations/crud_operations.php');

$obj=new mysqlQuery();

if(isset($_GET['type']) && $_GET['type']=='delete'){
	$id=$obj->get_safe_str($_GET['id']);
	$condition_arr=array('id'=>$id);
	$obj->deleteData('users',$condition_arr);
}

?>