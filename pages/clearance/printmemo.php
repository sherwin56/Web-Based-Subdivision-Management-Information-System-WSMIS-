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
       
       <div class="col-xs-12 col-sm-6 col-md-6" style="background: white; padding-left: 35px; padding-right: 35px;">
            <div>
                
                <div style="background: white;">
                    <div style="font-size: 15px; algin-items: center; justify-content: center">
                    <center><image src="../../img/sanmarino.png" style="width:15%;height:90px; background: white; margin-bottom: 5px;"/></center>
                        <center>SAN MARINO CLASSIC HOMEOWNERS<br>
                        ASSOCIATION, INC.</center>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <p class="text-center" style="font-size: 25px; font-family: arial; font-stretch: condensed;"><b>MEMORANDUM OF AGGREEMENT</b></p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <p style="font-weight:bold; width: 100%; border: 1px solid black;"></p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px; font-size: 14px; padding-left: 15px;">
                    <?php 
                        $qry=mysqli_query($con,"SELECT *,CONCAT(rm.lname, ', ' ,rm.fname, ' ' ,rm.mname) as residentname,m.id as mid from tblresident rm left join tblmemo m on m.residentid = rm.id where residentid = '".$_GET['resident']."' and memo_id = '".$_GET['memorandum']."' ");
                            while($row = mysqli_fetch_array($qry)){
                                $date = date_create($row['date']);
                                echo '
                                    <p>This Memorandum of Agreement (the "Agreement" or "MOA") is effective '.(date_format($date,"F j, o")).',</p>
                                    ';
                            }
                        ?>    
                    </div>
                    <div class="col-xs-4 col-sm-6 col-md-3" style="width: 130px; height: 250px; word-wrap: break-word;">
                        <div style="margin-top: 10px; font-size: 14px; ">
                        <?php 
                        $qry=mysqli_query($con,"SELECT *,CONCAT(rm.lname, ', ' ,rm.fname, ' ' ,rm.mname) as residentname,m.id as mid from tblresident rm left join tblmemo m on m.residentid = rm.id where residentid = '".$_GET['resident']."' and memo_id = '".$_GET['memorandum']."' ");
                            while($row = mysqli_fetch_array($qry)){
                                $date = date_create($row['date']);
                                echo '
                                    <p><b>BETWEEN:</b></p><br><br><br>
                                    <p style="margin-top: 22px;"><b>AND:</b></p>
                                    ';
                            }
                        ?>    
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-6 col-md-9" style="margin-top: 10px; font-size: 14px; width: 80%;">
                        <?php 
                        $qry=mysqli_query($con,"SELECT *,CONCAT(rm.lname, ', ' ,rm.fname, ' ' ,rm.mname) as residentname,m.id as mid from tblresident rm left join tblmemo m on m.residentid = rm.id where residentid = '".$_GET['resident']."' and memo_id = '".$_GET['memorandum']."' ");
                            while($row = mysqli_fetch_array($qry)){
                                $date = date_create($row['date']);
                                echo '
                                    <p><b>SAN MARINO CLASSIC HOMEOWNERS ASSOCIATION, INC.</b> ("Party A"), an individual with 
                                    their main address located at <b>OR</b> a Company organized and existing under the laws of the 
                                    Dasmariñas City of CAVITE, with its head office located at </p>
                                    <p style="text-transform: uppercase;"><b>Nia Rd., Brgy. Salawag</b></p>
                                    <p style="margin-top: 20px;"><b style="text-transform: uppercase;">'.$row['residentname'].'</b> ("Party B"), an individual with their main address 
                                    located at <b>OR</b> a Company organized and existing under the laws of the Dasmariñas City of CAVITE, with its head office located at </p>
                                    <p style="text-transform: uppercase;"><b>'.$row['zone'].'</b></p>
                                    ';
                            }
                        ?>    
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="font-size: 14px; margin-top: -10px;">
                        <?php
                            $qry2=mysqli_query($con,"SELECT * from tblresident rm left join tblmemo m on m.residentid = rm.id where residentid = '".$_GET['resident']."' and memo_id = '".$_GET['memorandum']."' ");
                            while($row = mysqli_fetch_array($qry2)){
                                $date = date_create($row['date']);
                                echo '
                                
                                <p>
                                Collectively, Part A and Part B shall be referred to as the "Parties,"
                                </p>
                                <p>
                                WHEREAS, the purpose of this MOA is to establish the term and conditions under which Part A and Party B will collaborate on a '.$row['subject'].' (the "Collaboration");
                                </p>
                                <p>
                                WHEREAS, the Parties wish to evidence their Agreement in writing.
                                </p><br>

                                
                                <p>
                                <b>NOW, THEREFORE,</b> the Parties agree as follows:
                                </p>
                                ';
                            }
                        ?>
                    </div>
                    <div class="col-xs-4 col-sm-6 col-md-3" style="width: 70px; height: 200px; word-wrap: break-word;">
                        <div style="margin-top: 10px; font-size: 14px; ">
                        <?php 
                        $qry=mysqli_query($con,"SELECT *,CONCAT(rm.lname, ', ' ,rm.fname, ' ' ,rm.mname) as residentname,m.id as mid from tblresident rm left join tblmemo m on m.residentid = rm.id where residentid = '".$_GET['resident']."' and memo_id = '".$_GET['memorandum']."' ");
                            while($row = mysqli_fetch_array($qry)){
                                $date = date_create($row['date']);
                                echo '
                                    <p><b>1.</b></p><br>
                                    <p>1.1.</p><br>
                                    <p style="margin-top: 10px;"><b>2.</b></p><br>
                                    <p>2.1.</p><br>
                                    <p style="margin-top: 20px;"><b>3.</b></p><br>
                                    <p>3.1.</p>
                                    ';
                            }
                        ?>    
                        </div>   
                    </div>
                    <div class="col-xs-4 col-sm-6 col-md-9" style="margin-top: 10px; font-size: 14px; width: 80%;">
                        <?php 
                        $qry=mysqli_query($con,"SELECT *,CONCAT(rm.lname, ', ' ,rm.fname, ' ' ,rm.mname) as residentname,m.id as mid from tblresident rm left join tblmemo m on m.residentid = rm.id where residentid = '".$_GET['resident']."' and memo_id = '".$_GET['memorandum']."' ");
                            while($row = mysqli_fetch_array($qry)){
                                $date = date_create($row['date']);
                                echo '
                                    <p><b>PURPOSE</b></p><br>
                                    <p>The purpose of this MOA is to establish the terms and conditions under which Part A and Part B will collaborate on a '.$row['subject'].'.</p>
                                    <p style="margin-top: 20px;"><b>OBJECTIVE</b></p>
                                    <p style="margin-top: 30px;"">The objective of the Collaboration is to express the willingness of both parties to develop and expand their relationships.</p>
                                    <p style="margin-top: 30px;"><b>TERM</b></p>
                                    <p style="margin-top: 30px;"">The term of this Agreement will be upon the day, effective from '.(date_format($date,"F j, o")).', as specified above.</p>
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