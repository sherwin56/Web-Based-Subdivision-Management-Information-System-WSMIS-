<!DOCTYPE html>
<html id="adminreserve">
<title>Clubhouse Reservation Receipt</title>
<style>
    @media print {
        .noprint {
            visibility: hidden;
        }
    }
    @page { size: auto;  margin: 4mm; }
</style>
<?php
session_start();
if(!isset($_SESSION['role']))
{
    header("Location: ../../login.php");
}
else
{
    ob_start();
    $_SESSION['clr'] = $_GET['adminreserve'];
    include('../head_css.php'); ?>
    <body class="skin-black" >
    <!-- header logo: style can be found in header.less -->
    <?php

    include "../connection.php";
    ?>

    <div class="col-xs-12 col-sm-6 col-md-6" style="background: white; padding-top: 10px; padding-right: 1px;padding-bottom: 10px;padding-left: 1px; ">
        <div>
            <div style="background: white; padding-right: 19%; padding-left: 19%;">
                <div class="col-xs-12 col-sm-12 col-md-12" style="font-size: 15px; display: block; vertical-align: middle;"><b>
                        <image src="../../img/sanmarino.png" style="width:13%;height:60px; background: white;vertical-align: middle; margin-right: 5px" width="100px" class="pull-left"/>
                        <p style="text-align: center; line-height: 1; font-family: arial; font-stretch: condensed; margin-top: 2.9%;" class="pull-left">SAN MARINO CLASSIC HOMEOWNERS ASSOCIATION, INC.<br>
                            Nia Rd., Brgy. Salawag, Dasmarinas City, Cavite
                        </p></b>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <p class="text-center" style="font-size: 40px;"><b>RECEIPT</b></p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="padding-right: 25%; padding-left: 20%;  font-family: Times New Roman;">
            <?php $qry=mysqli_query($con,"SELECT * from tblreserve where residentid = '".$_GET['resident']."' and reserve_no = '".$_GET['adminreserve']."' ");
            while($row = mysqli_fetch_array($qry)){
                $date = date_create($row['date']);?>
                <div class="pull-left" style="text-align: center;">
                    <p style="font-size: 20px;"><i>No.</i> <b style="color: red;"><?php echo''.($row['reserve_no']).'';?></b></p>
                </div>
                <div class="pull-right" style="text-align: center;">
                    <p style="font-size: 20px;"><i>Date:</i> <?php echo''.(date_format($date,"F j, o")).'';?></p>
                </div>
                <div class="pull-right" style="margin-top: 10%">
                    <?php $qry2 = mysqli_query($con,"SELECT * from tblofficial");
                    while($row2=mysqli_fetch_array($qry2)){
                        if($row2['sPosition'] == "HOA Auditor"){?>
                            <p style="font-size: 20px; text-align: justify; margin-bottom: -27px;"><i>RECEIVED FROM</i> &nbsp;&nbsp;&nbsp;<b><?php echo''.($row2['completeName']).'';?></b></p>
                            <p class="pull-right" style="font-size: 20px; text-align: justify; margin-left: 120px;">________________</p>
                            <?php
                        }
                    }?>
                </div>
                <div class="pull-left" style="text-align: justify;">
                    <p style="font-size: 20px; margin-bottom: -27px;"><i>the sum of pesos</i>&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo'₱'.($row['amount']).'';?></b>
                    </p>
                    <p style="font-size: 20px; text-align: justify; margin-left: 130px;">___________________________</p>
                </div>
                <div class="pull-left" style="text-align: justify;">
                    <p style="font-size: 20px; margin-bottom: -27px;"><i>as payment for</i>
                        &nbsp;<b>CLUBHOUSE RESERVATION</b>
                    </p>
                    <p style="font-size: 20px; text-align: justify; margin-left: 130px;">___________________________</p>
                </div>
            <div class="pull-left" style="">
                <p style="font-size: 20px; margin-bottom: -27px;">Name: &nbsp;&nbsp;&nbsp;<?php echo''.($row['fullname']).'';?></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="pull-left" style="">
                <div class="pull-left" style="">
                    <p style="font-size: 20px; margin-bottom: -27px;">Reservation Start: &nbsp;&nbsp;&nbsp;<?php echo''.($row['startdate']).'';?></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="pull-left" style="">
                    <p style="font-size: 20px; margin-bottom: -27px;">Reservation End: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo''.($row['enddate']).'';?></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>&nbsp;&nbsp;&nbsp
            <div class="pull-left" style="padding-right: 50%; padding-top: 10%;">
                <p style="font-size: 30px; margin-bottom: -27px;">₱ &nbsp;&nbsp;&nbsp;<b><?php echo''.($row['amount']).'';?></b></p>
                <p style="font-size: 20px; text-align: justify; margin-left: 15px;">____________</p>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="pull-right" style="">
            <p style="font-size: 20px; margin-right: 30px; margin-top: -25%">______________</p>
            <p style="font-size: 18px; margin-left: 30px; "><i>Signature</i>  </p>
            </div>
            <?php
        }
        ?>
        </div>
        
                        
        </div>
    </div> 
                <button class="btn btn-primary noprint" style="float: left;" id="printpagebutton" onclick="PrintElem('#reserve')">Print</button>
    </body>
    <?php
    }
    ?>

    <script>
         function PrintElem(elem)
    {
        window.print();
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        //mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        //mywindow.document.write('</head><body class="skin-black" >');
         var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        mywindow.document.write(data);
        //mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();

        printButton.style.visibility = 'visible';
        mywindow.close();

        return true;
    }
    </script>
</html>