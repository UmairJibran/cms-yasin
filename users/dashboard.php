<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{ ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  
                  	<div class="col-md-2 col-sm-2 box0">
                        <div>
                 
                  </div></div>



                 
                                <?php 
                   

 
{?>
                  

<?php }?>
                  	
                  	
                  	</div><!-- /row mt -->	
                  
                      
                     
                    				
				
				
          </section>
      </section>

  </section>
  <div class="ml-5">
    
  <table class='table'>
    <tr>
      <th>#</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
    <?php
    $userID = $_SESSION['id'];
      $sql = "SELECT * FROM `notif` WHERE `userid` = ${userID} AND `checked` = 0";
      $result = $con->query($sql);
      $rows = $result->num_rows;
      if($rows>=1){
        $c = 0;
        while($data = $result->fetch_assoc()){
          $c++;
          $cnum = $data['prid'];
          $n = $data['id'];
          $sqli = "SELECT `status` FROM `tblcomplaints` WHERE `complaintNumber` = ${cnum}";
          $result1=$con->query($sqli);
          $d=$result1->fetch_assoc();
          $stat=$d['status'];
          echo "
            <tr>
              <td>${c}</td>
              <td>${stat}</td>
              <td><form method='post'><input type='submit' name='submit${n}' value='Dismiss'></td>
            </tr>
          ";
          if(isset($_POST['submit'.$n])){
            $sqli2 = "UPDATE `notif` SET `checked` = '1' WHERE `notif`.`id` = '$n';";
            if($con->query($sqli2)===true){header("location:./dashboard.php");}
          }
        }
      }
    ?>
  </table>
  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
  </body>
</html>
<?php } ?>
