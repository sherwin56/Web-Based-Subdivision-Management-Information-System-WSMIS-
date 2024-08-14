<!DOCTYPE html>
<html id="memorandum">
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
    $_SESSION['clr'] = $_GET['memorandum'];
    include('../head_css.php'); ?>
    <body class="skin-black" >
        <!-- header logo: style can be found in header.less -->
        <?php 
        
        include "../connection.php";
        ?>
       
       <div class="col-xs-12 col-sm-6 col-md-5" style="background: white;">
            <div>
                
                <div style="background: white;">
                    <div style="font-size: 16px; algin-items: center; justify-content: center"><b>
                    <center><image src="../../img/sanmarino.png" style="width:25%;height:120px; background: white;"/></center>
                        <center>SAN MARINO CLASSIC<br>
                        HOMEOWNERS<br>
                        ASSOCIATION, INC.</b></center>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <p class="text-center" style="font-size: 45px; font-family: arial; font-stretch: condensed;"><b>MEMORANDUM</b></p>
                    </div>
                    <div class="pull-left" style="float:left; margin-top: 10px; font-size: 15px;">
                    <?php 
                        $qry=mysqli_query($con,"SELECT *,CONCAT(rm.lname, ', ' ,rm.fname, ' ' ,rm.mname) as residentname,m.id as mid from tblresident rm left join tblmemo m on m.residentid = rm.id where residentid = '".$_GET['resident']."' and memo_id = '".$_GET['memorandum']."' ");
                            while($row = mysqli_fetch_array($qry)){
                                $date = date_create($row['date']);
                                echo '
                                    <p><b>To:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>'.$row['reqto'].'</u></p>
                                    <p><b>From:</b> &nbsp;&nbsp;&nbsp;&nbsp; <u>'.$row['residentname'].'</u></p>
                                    <p><b>Date:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>'.(date_format($date,"F j, o")).'</u></p>
                                    <p><b>Subject:&nbsp;</b> <u>'.$row['subject'].'</u></p><br>
                                    ';
                            }
                        ?>    
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="font-size: 15px;">
                        <?php
                            $qry2=mysqli_query($con,"SELECT * from tblresident rm left join tblmemo m on m.residentid = rm.id where residentid = '".$_GET['resident']."' and memo_id = '".$_GET['memorandum']."' ");
                            while($row = mysqli_fetch_array($qry2)){
                                $date = date_create($row['date']);
                                echo '
                                
                                <b>BACKGROUND:</b><br>
                                <p style="text-indent:40px;text-align: justify;">
                                During their meeting held on '.(date_format($date,"F j, o")).', the Finance Committee discussed the formulation of the budget work session calendar for the Fiscal Year
                                2024-2025 budget.
                                </p>
                                <p style="text-indent:40px;text-align: justify;">
                                City staff requested that a pre-budget work session be scheduled in order that the Council could provide guidance regarding the preparation of the Managers Recommended Budget. 
                                The Finance Committee has recommended that session be held during the Councils normal work session.
                                </p>
                                <p style="text-indent:40px;text-align: justify;">
                                Following the Councils pre-budget work session, budget meetings with the Finance Committee and budget work sessions for the full City Council have been recommended, as provided herein.<br>
                                All budget meetings of the Finance Committee have been scheduled for 5:30 p.m. to allow attendance and participation by all members of the City Council.
                                </p>

                                <b>ANALYSIS:</b><br>
                                <p style="text-indent:40px;text-align: justify;">
                                The following is the budget work session calendar recommended by the Finance Comittee for the Councils consideration.
                                </p>
                                
                                ';
                            }
                        ?>
                    </div>
                </div>  
            </div> 
        </div>
                <button class="btn btn-primary noprint" style="float: left;" id="printpagebutton" onclick="PrintElem('#memorandum')">Print</button>
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