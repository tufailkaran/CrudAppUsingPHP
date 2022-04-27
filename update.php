<?php 
require_once('crud_operations/crud_operations.php');
$obj=new mysqlQuery();

$name='';
$email='';
$phone='';
$id='';

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=$obj->get_safe_str($_GET['id']);
	$condition_arr=array('id'=>$id);
	$result=$obj->getData('users','*',$condition_arr);
	$name=$result['0']['name'];
	$email=$result['0']['email'];
	$phone=$result['0']['phone'];
}
?>
<!doctype html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Crud App</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
      
	  <style>
		.container{margin-top:100px;}
	  </style>
   </head>
   <body>
      
      <div class="container">
         <div class="card"
            <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Update User</strong> <a href="index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> All Users</a></div>
            
            <div class="card-body">
               <div class="col-sm-6">
                  <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
                  <form method="post" action="updateData.php">
                     <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" name="id" id="id" style="display:none" class="form-control" placeholder="Enter ID" value="<?php echo $id?>">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="<?php echo $name?>">
                     </div>
                     <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email"value="<?php echo $email?>">
                     </div>
                     <div class="form-group">
                        <label>Mobile <span class="text-danger">*</span></label>
                        <input type="tel" class="tel form-control" name="phone" id="phone"  placeholder="Enter Phone" value="<?php echo $phone?>">
                     </div>
                     <div class="form-group">
                        <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Update User</button>

                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
      <script>
      $(function () {
        $('form').submit(function (event) {
         
        event.preventDefault();
         var $form = $(this);
         var action = 'update';
         url = $form.attr('action');
         update_user(url, action);
         
         });
         function update_user(url, action){
            var post = $.post(url,{
               name: $('#name').val(),
               email: $('#email').val(),
               phone: $('#phone').val(),
               id: $('#id').val(),
               action: action
            })
            
            
         }
         
         
      });
    </script>
   </body>
</html>