<?php
include 'config.php';
date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['login']))
{
	$log_sts=mysqli_query($conn,"select * from users where Email='$_POST[email]' AND Password='$_POST[password]'");
	$loc=mysqli_num_rows($log_sts);
	if($loc)
	{
		$fet_da=mysqli_fetch_array($log_sts);
		session_start();
		$_SESSION['id']=$fet_da['user_id'];
		$_SESSION['Email']=$fet_da['Email'];
		$_SESSION['Name']=$fet_da['Name'];
		$_SESSION['Gender']=$fet_da['Gender'];
		$sess_count=0;
        $_SESSION['sess_count']=$sess_count;
		header("location:forum.php");

	}else
	{
		echo "<script>alert('Invalid Credentials')</script>";
	}
}

//signin stage 1

if(isset($_POST['sub_stage1']))
{
	$check_email=mysqli_query($conn,"select * from users where Email='".$_POST['email']."'");
	$chek_cou=mysqli_num_rows($check_email);
	if($chek_cou==0)
	{
	if($_POST['password']==$_POST['con_pwd'])
	{
	$ins_s1=mysqli_query($conn,"INSERT INTO `users`(`Name`, `Email`, `Password`, `Gender`, `Birthday_Date`, `designation`, `company`, `industry`,`phone`) VALUES ('".$_POST['username']."','".$_POST['email']."','".$_POST['pwd']."','".$_POST['gender']."','".$_POST['day'].$_POST['month'].$_POST['year']."','".$_POST['designation']."','".$_POST['company']."','".$_POST['industry']."','".$_POST['phone']."')");
	
	if($ins_s1)
	{
		
		$path = "fb_users/".$_POST['gender']."/".$_POST['email']."/Profile/";
		$path2 ="fb_users/".$_POST['gender']."/".$_POST['email']."/Post/";
		$path3 ="fb_users/".$_POST['gender']."/".$_POST['email']."/Cover/";
		$path4="fb_users/".$_POST['gender']."/".$_POST['email']."/Projects/";
		mkdir($path, 0, true);
		mkdir($path2, 0, true);
		mkdir($path3, 0, true);
		mkdir($path4, 0, true);
		
	$last_user=mysqli_insert_id($conn);
	$ins_use_info=mysqli_query($conn,"insert into user_info (user_id,mobile_no,Email)values('$last_user','$_POST[phone]','$_POST[email]')");
	$in_se_q=mysqli_query($conn,"insert into user_secret_quotes (user_id) values('$last_user')");
	$ins_folio=mysqli_query($conn,"insert into folio (user_id)values('$last_user')");
	
	
	
	$ins_profile_pic=mysqli_query($conn,"insert into user_profile_pic (user_id)values('$last_user')");
	$ins_cover_pic=mysqli_query($conn,"insert into user_cover_pic (user_id)values('$last_user')");
	header("location:signup2.php?id=$last_user");
	}
	else
	{
		echo "<script>alert(' Registration Fail')</script>";
	}
	
	
	//header("location:signup2.php?id=$id");
	}else
	{
		echo "<script>alert('Chech Ur verify Password')</script>";
	}
	}else
	{
		echo "<script>alert('Existed Email')</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>LN BUSINESS</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/font/font-awesome/css/font-awesome.min.css">
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="assets/js/jquery.mousewheel.js"></script>
	<script>
	$(function(){
		$("#page-wrap").wrapInner("<table cellspacing=35><tr>");
		$(".post").wrap("<td></td>");
		$("body").mousewheel(function(event, delta) {
			this.scrollLeft -= (delta * 30);
			event.preventDefault();
		});   
	});
	</script>
    <style>
	hr{
		color:#fff;
	}
	</style>
</head>
<body>
	<div>
<nav class="navbar navbar-inverse navbar-fixed-top" style="height:10%;">
            <div class="container">
                <div class="navbar-header">
                    <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> -->
                    <a class="navbar-brand" href="#" style="font-family: Stencil Std;color: #808080;">
    LN BUSINESS</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">

                        <li style=" padding-left:30px; padding-top:10px; padding-right:100px; ">
                        	<div style="background-color:#808080;padding-right:5px;">
                            <input type="text" style="width:350px; height:30px;background-color:#808080; border:0px; color:#fff;margin-left:5px;">
                            <i class="fa  fa-2x fa-search" style="color:#fff; padding-top:5px;"></i>
                        </div>
                        </li>
                        <li class="active">
                            <a href="#" style="font-family:Stencil Std; font-size:24px; padding-left:25px; padding-right:25px; color: #fff;">F</a>
                        </li>
                        <li>
                            <a href="#about" style="font-family:Stencil Std; font-size:24px; padding-left:25px; padding-right:25px; color: #808080;">M</a>
                        </li>
                                               <li style="height:50px;line-height:13px;padding-top:3px;">
                            <p class="diary" style="padding-top:0px; padding-left:50px;color:#808080"><span class="day" style="font-family:Stencil Std; font-size:10px;">friday</span><br><span class="month" style="font-family:Stencil Std; font-size:10px;">March</span><br><span class="year" style="font-family:Stencil Std; font-size:10px;">2017</span></p>
                        </li>
                        <li style="height:50px;">
                            <!--<hr style="width:0px; height:10px;" class="vertical" />-->
                            <div style="border-left:2px solid #d3d3d3;margin-top:6px; margin-left:4px; margin-right:4px;height:40px;" class="line_div">
</div>
                        </li>
                        <li style="height:50px; float:right;">
                            <span class="date" style="font-family:Stencil Std; font-size:40px; padding-top:5px; padding-right:10px;color:#808080;">31</span>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse style="height:600px;background-color:#fff; float:left" -->
            </div>
        </nav>
        
        <div class="paper">
         <div class="container-fluid" style="padding-top:10px;">
         <div class="forms jumbotron" align="center" style="width:500px;margin-left:300px">
         <form method="post">
         <div class="form-group">
      <label style="margin-left:-170px">email:</label>
      <input type="text" class="form-control" style="width:200px" name="email">
    </div>
    <div class="form-group">
      <label  style="margin-left:-150px">password:</label>
      <input type="password" class="form-control" style="width:200px" name="password">
    </div>
    <button type="submit" class="btn" name="login">sign up</button>
    <br><br>
         </form>
         </div>
         </div>
         </div>
         
         
         </div>
         <div>
        
    <footer >
    </footer>
</div>
<br>
         </body>
         </html>