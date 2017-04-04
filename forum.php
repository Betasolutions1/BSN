<?php 
include'config.php';
session_start();
if(!$_SESSION['Email'])
{
	header("location:signup.php");
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
         
         
            <div class="row">
            
            <!--recent topics -->
                <div class="col-lg-3" style="height:500px;background-color:#808080; float:left">
                <div class="row">
                
                    <div class="title col-md-12">
                    <h3 style="color:#fff;">Category</h3>
					</div>
                    <div class="col-md-12" >
                    <div class="recent-post" style="color:#fff;overflow-y:scroll;width:230px;height:400px">
                    
                    <?php
                        $dis_indu=mysqli_query($conn,"select * from add_industry");
						while($ddii=mysqli_fetch_array($dis_indu))
						{
							$qt_cou_exe=mysqli_query($conn,"select * from question where INDUSTRY_ID='$ddii[INDUSTRY_ID]'");
							$di_cou=mysqli_num_rows($qt_cou_exe);
						?>                   
                    
                   <span><h5><?php echo $ddii['INDUSTRY_NAME'];?> &nbsp (<?php echo $di_cou;?>)</h5></span>
                    <hr>
                    <?php } ?>
                    </div>                    
                    </div>
                    <div class="col-md-12">
                    <div style="background-color:#808080;padding-right:5px;">
                            <input type="text" style="width:170px; height:30px;background-color:#fff; border:0px; color:;margin-left:10px;">
                            <i class="fa  fa-2x fa-search" style="color:#fff; padding:2px"></i>
                        </div>
                    </div>
					</div>
                </div>
                <!--end recent topics-->
                
               <!--forums begin-->
                <div class="col-lg-1" >

                </div>
                
                <div class="col-lg-8" style="height:500px;background-color:#808080;width:750px; float:right;color:#fff;">
                <div class="title" align="right" style="color:#fff">
                <h4>Forum</h4>
                </div>
                <div class="hr">
                <hr>
                </div>
                
                <div style="overflow-y:scroll;height:400px;">
                
                 <?php
                                            $dis_geet_qut=mysqli_query($conn,"select * from question order by  q_id desc");
											while($qust_d=mysqli_fetch_array($dis_geet_qut))
											{
												$ans=mysqli_query($conn,"select * from answered where `quest_id`='$qust_d[q_id]' ");
												$ans2=mysqli_num_rows($ans);
												$qusr_exe=mysqli_query($conn,"select * from users where user_id='$qust_d[user_id]'");
												$quser=mysqli_fetch_array($qusr_exe);
												$qusr_pic_exe=mysqli_query($conn,"select * from user_profile_pic where user_id='$quser[user_id]'");
												$qusrpic=mysqli_fetch_array($qusr_pic_exe);
											?>
                
                <div class="row" style="color:#fff">
                
                
                <div class="col-md-10" align="right" style="margin-left:80px;margin-right:-80px;color:#fff;">
                
                
                
                <div class="row">
                <div class="col-md-12" style="color:#fff;">
                <div class="row">
                <div class="col-md-2" align="left" >
                <span style="margin-left:-80px;color:#fff;" class="glyphicon glyphicon-comment"></span>&nbsp;+<?php echo $ans2;?> 
                </div>
                <div class="col-md-10" >
                <h5 ><?php echo $qust_d['question'];?></h5>
                </div>
                
                <div class="col-md-2" align="left" >
                <span style="margin-left:-80px;color:#fff;"><?php echo $qust_d['datetime'];?></span>
                </div>
                <div class="col-md-10" style="color:#fff;">
                <span><?php echo $quser['Name'];?>/<?php echo $quser['designation'];?>/<?php echo $quser['company'];?>/<?php echo $quser['industry'];?></span>
                </div>
                </div>
                </div>
                </div>
                
                
                
                </div>
                <?php
                                                    if($qusrpic['image']!='')
													{
													?>
                <div class="col-md-2" align="right">
                <img src="fb_users/<?php echo $quser['Gender']?>/<?php echo $quser['Email'];?>/Profile/<?php echo $qusrpic['image'];?>" class="img-circle" height="50" width="50" alt="">
               
                </div>
                     <?php
													}else
													{
														?>
                                                        <img src="images/profile/sq.PNG" width="80px" style="margin-left:0px;" >
                                                        <?php
													}
														?>
                
                </div>
                
                <div class="hr">
                <hr>
                </div>
                
                <?php } ?>
             
                
                </div>
                <!--forum end-->
                
                
                </div>
            </div>
         </div>
        </div>
        </div>
        <!--footer-->
        <div>
        
    <footer >
    </footer>
</div>
<br>

    </body>
    </html>
