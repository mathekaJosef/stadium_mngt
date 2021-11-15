<?php
session_start();
if(isset($_GET['ticket'])){
	
require("../dbengine/dbconnect.php");
$order_ref=$_GET['ticket'];

if(empty($order_ref)){$order_ref=$_SESSION['ORDERREF'];};
$data=mysqli_query($conn,"SELECT * FROM booking_details WHERE order_ref='$order_ref'");
if(($data) && (mysqli_num_rows($data) >0)){?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<style>
    #seat_id{
        font-size: 11px;
    }
    @media print {
        #btnPrint {
            display: none;
        }
    }
</style>
<body>
    <div>
<?php
	
		
//generating fields
$row=mysqli_fetch_assoc($data);
$fullname=$row['fullname'];	
$destination=$row['destination'];
$traveldate=$row['date_reserved'];
$travelclass=$row['class_reserved'];
$seats=$row['seats_reserved'];
$all=$seats;
$amount=$row['amount'];
$paymethod=$row['account'];
$code=$row['transaction_id'];
mysqli_close($conn);
while($seats>0){
?>

<widget type="ticket" class="--flex-column">
    <div class="top --flex-column">
    
        <center><a class="buy" href="#"><?php echo strtoupper($travelclass); ?> TICKET</a></center>
        <br>
        <div class="bandname -bold">TICKET REF: <?php echo $order_ref; ?></div>
        <div class="tourname">Host: <?php echo $destination; ?></div>
    
        <div class="tourname">
        <small>Gates open at 12:00PM. This pass admits <b>1 (One)</b>.</small></div>
        <img src="https://www.tikiti.acuteschool.com/images/events/IMA669428.jpeg" alt="" />
        <div class="deetz --flex-row-j!sb">
        <div class="event --flex-column">
            <div class="date"><?php echo $traveldate; ?></div>
            <div class="location -bold"><?php echo strtoupper($fullname); ?>, (<?php echo $travelclass; ?>)</div>
        </div>
    
        <div class="price --flex-column">
            <div class="label">Price</div>
            <div class="cost -bold">Kes. <?php echo $amount; ?> Via <?php echo $paymethod; ?></div><br>
            <small id="seat_id">SEAT ID: <?php echo $seats; ?> of <?php echo $all; ?></small>
        </div>
    
        </div>
        <center><small>Terms & Conditions Apply</small></center>
        <center><small><a style="text-decoration: none;color:#5D9CEC;" href="#">www.stadium-bookings.co.ke</a></small></center>
    </div>
    <div class="rip"></div>
    <div class="row">
        <div class="bottom col-sm-6">
        <div class="barcode"></div>
        </div>
        <div class="col-sm-6">
        <a class="buy" id="btnPrint" href="#">PRINT TICKET</a>
        </div>
        <br>
    </div>
    <br>
</widget>

<?php
// echo("<div class='ticketbox'>");
// echo ("<a> ORDER REF:</a> <span class='ref'>$order_ref</span>"); 	
// echo("<ul><li>TICKET OWNER: ".$fullname."</li>
// <li>STADIUM/VENUE: ".$destination."</li>
// <li>DATE OF EVENT: ".$traveldate."</li>
// <li>CLASS PER STADIUM ARRANGEMENT: ".$travelclass."</li>
// <li>SEAT ID: ".$seats." of ".$all."</li>
// <li>AMOUNT PAID: ".$amount." Via ".$paymethod." Transaction ID: ".$code."</li>
// </ul>");
// echo ("</div>");

$seats--;
}
?>

</div>

    <script>
        const $btnPrint = document.querySelector("#btnPrint");
        $btnPrint.addEventListener("click", () => {
            window.print();
        });
    </script>
</body>
</html>

<?php
// echo("</body></html>");
}		
}

?>