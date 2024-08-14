<!DOCTYPE html>
<html id="sticker">
    <title>Car Sticker</title>
<style>
    @media print {
        .noprint {
        visibility: hidden;
         }
    }
    @page { size: auto;  margin: 4mm; }

    body{
        margin-top: 100px;
        margin-left: 100px;
        background: #000;
    }
    .octagonWrap {
        width:300px;
        height:300px;
        float: left;
        position: relative;
        overflow: hidden;
    }
    .octagon{
        position: absolute;
        top: 0; right: 0; bottom: 0; left: 0;
        overflow: hidden;
        transform: rotate(45deg);
        background: #777;
        border: 3px solid black;
        }
    .octagon:before{
        position: absolute;
        top: -3px; right: -3px; bottom: -3px; left: -3px;
        transform: rotate(45deg);
        content: '';
        border: inherit;
        }
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
    $_SESSION['clr'] = $_GET['sticker'];
    include('../head_css.php'); ?>
    <body class="skin-black" >
        <!-- header logo: style can be found in header.less -->
        <?php 
        
        include "../connection.php";
        ?>
       
       <div class="col-xs-12 col-sm-6 col-md-4" style="background: white; padding-top: 20px;padding-right: 50px;padding-bottom: 20px;padding-left: 50px; display: flex;align-items: center;justify-content:center;">
            <div class="octagonWrap">
                
                <div class="octagon" style="background: white; padding-top: -3px;">
                <?php $qry=mysqli_query($con,"SELECT * from tblresident rc left join tblsticker c on c.residentid = rc.id where residentid = '".$_GET['resident']."' and sticker_no = '".$_GET['sticker']."' ");
                    while($row = mysqli_fetch_array($qry)){
                        echo'<div style="margin-bottom: -25px;"><p style="text-align:center; font-size: 60px; font-weight: bold;">'.($row['sticker_no']).'</p></div>';
                    }
                ?>
                    
                    <div style="padding-left: 20px;">
                        <image class="pull-left" src="../../img/sanmarino.png" style="width:55%;height:150px; background: white;"/>
                        <p class="pull-left" style="font-size: 55px; line-height: 0.7; font-weight: bold;">20<br>24</p>
                    </div>
                    <div class="pull-left" style="font-family: Times New Roman; display: flex; text-align: center; font-size: 11px; font-stretch: condensed; padding-left: -3px; padding-right: -3px; transform: rotate(-45deg); padding-left: 160px; padding-top: 25px; width: 100%;">
                    <p>A PRIVATE RESIDENTIAL COMMUNITY<br>
                        <b style="font-size: 12px;">SAN MARINO CLASSIC</b>
                </p>
                </div>
                </div> 
            </div> 
        </div>
                <button class="btn btn-primary noprint" style="float: left;" id="printpagebutton" onclick="PrintElem('#sticker')">Print</button>
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