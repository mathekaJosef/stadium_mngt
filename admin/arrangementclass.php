<?php require ("session.php")?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta content="Semantic-UI-Forest, collection of design, themes and templates for Semantic-UI." name="description" />
    <meta content="Semantic-UI, Theme, Design, Template" name="keywords" />
    <meta content="PPType" name="author" />
    <meta content="#ffffff" name="theme-color" />
    <title>Admin Dashboard</title>
    <link href="static/dist/semantic-ui/semantic.min.css" rel="stylesheet" type="text/css" />
    <link href="static/stylesheets/default.css" rel="stylesheet" type="text/css" />
    <link href="static/stylesheets/pandoc-code-highlight.css" rel="stylesheet" type="text/css" />
    <script src="static/dist/jquery/jquery.min.js"></script>
	<script src="admin.js"></script>
  </head>
  <body>
    <div class="ui inverted huge borderless fixed fluid menu">
      <a class="header item">MACHAKOS STADIUM SYSTEM</a>
      <div class="right menu">
        <a class="item" href="logout.php">Log out</a>
      </div>
    </div>
	
    <div class="ui grid">
      <div class="row">
        <div class="column" id="sidebar">
          <div class="ui secondary vertical fluid menu">
            <a class="item" href="bookings.php">Bookings</a><a class="item " href="transactions.php">Transactions</a><a class="active item" href="arrangementclass.php">Arrangement Classes</a><a class="item">Export</a>
			    </div>
        </div>
		
        <div class="column" id="content" style="display:none">
	<div class="ui grid">
            <div class="row">
         <h1 class="ui huge header">All Stadium Arrangement Classes</h1>
         </div>
        <div class="ui horizontal divider"> Arrangement Classes Available</div>      
		<div class="row">
            <table class="ui single line striped selectable center aligned  table">
<thead><tr><th>Stadium Class</th><th>Class Capacity</th><th>Class Price (Ksh)</th><th>Description/Offer</th></tr></thead>
<tbody>
  <tr>
    <td>VVIP</td>
    <?php
     require_once('../dbengine/dbconnect.php');
     $sql1 = mysqli_query($conn, "SELECT COUNT(seats_reserved) AS num FROM booking_details WHERE class_reserved = 'VVIP'");
     $row1 = mysqli_fetch_assoc($sql1);
    ?>
    <td><?php echo $row1['num'];?></td>
    <td>1000</td>
    <td>#</td>
  </tr>
  <tr>
    <td>VIP</td>
    <?php
     require_once('../dbengine/dbconnect.php');
     $sql2 = mysqli_query($conn, "SELECT COUNT(seats_reserved) AS num FROM booking_details WHERE class_reserved = 'VIP'");
     $row2 = mysqli_fetch_assoc($sql2);
    ?>
    <td><?php echo $row2['num'];?></td>
    <td>500</td>
    <td>#</td>
  </tr>
  <tr>
    <td>Regular</td>
    <?php
     $sql3 = mysqli_query($conn, "SELECT COUNT(seats_reserved) AS num FROM booking_details WHERE class_reserved = 'Regular'");
     $row3 = mysqli_fetch_assoc($sql3);
    ?>
    <td><?php echo $row3['num'];?></td>
    <td>200</td>
    <td>#</td>
  </tr>
</tbody>
            </table>
            </div>
			</div>	
		</div>
      
	  </div>
    </div>
    <style type="text/css">
      body {
        display: relative;
      }
      
      #sidebar {
        position: fixed;
        top: 51.8px;
        left: 0;
        bottom: 0;
        width: 18%;
        background-color: #f5f5f5;
        padding: 0px;
      }
      #sidebar .ui.menu {
        margin: 2em 0 0;
        font-size: 16px;
      }
      #sidebar .ui.menu > a.item {
        color: #337ab7;
        border-radius: 0 !important;
      }
      #sidebar .ui.menu > a.item.active {
        background-color: #337ab7;
        color: white;
        border: none !important;
      }
      #sidebar .ui.menu > a.item:hover {
        background-color: #4f93ce;
        color: white;
      }
      
      #content {
        margin-left: 19%;
        width: 81%;
        margin-top: 3em;
        padding-left: 3em;
        float: left;
      }
      #content > .ui.grid {
        padding-right: 4em;
        padding-bottom: 3em;
      }
      #content h1 {
        font-size: 36px;
      }
      #content .ui.divider:not(.hidden) {
        margin: 0;
      }
      #content table.ui.table {
        border: none;
      }
      #content table.ui.table thead th {
        border-bottom: 2px solid #eee !important;
      }
    </style>
  </body>
</html>
