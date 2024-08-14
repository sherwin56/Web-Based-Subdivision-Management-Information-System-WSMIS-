<!DOCTYPE html>
<html id="memorecord1">
    <title>Memorandum</title>
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
    $_SESSION['clr'] = $_GET['memorecord1'];
    include('../head_css.php'); ?>
    <body class="skin-black" >
        <!-- header logo: style can be found in header.less -->
        <?php 
        
        include "../connection.php";
        ?>
       
       <div class="col-xs-12 col-sm-6 col-md-8" style="background: white; padding-top: 10px;padding-right: 1px;padding-bottom: 10px;padding-left: 1px; ">
       <div>
                <div style="background: white; padding-right: 10px; padding-left: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12" style=" display: block; vertical-align: middle;">
                    <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>Date</th>
                        <th>Resident Name</th>
                        <th>Request Type</th>
                        <th>Payment</th>
                        <th>Reference No.</th>
                        <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $squery = mysqli_query($con, "SELECT *,CONCAT(rm.lname, ', ' ,rm.fname, ' ' ,rm.mname) as residentname,m.id as mid from tblresident rm left join tblmemo m on m.residentid = rm.id where residentid = '".$_GET['resident']."' and memo_id = '".$_GET['memorecord1']."' ");
                    while($row = mysqli_fetch_array($squery))
                    {
                        echo '
                        <tr>
                            <td>'.$row['date'].'</td>
                            <td>'.$row['residentname'].'</td>
                            <td>'.$row['req_type'].'</td>
                            <td>'.$row['payment'].'</td>
                            <td>'.$row['ref_no'].'</td>
                            <td>₱'.$row['amount'].'</td>
                        </tr>
                        ';
                        }

                    ?>
                    </tbody>
                    </table>
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