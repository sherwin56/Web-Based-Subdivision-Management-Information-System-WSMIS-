<!DOCTYPE html>
<html id="adminbuilding">
<title>Building Permit</title>
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
    $_SESSION['clr'] = $_GET['adminbuilding'];
    include('../head_css.php'); ?>
    <body class="skin-black" >
        <!-- header logo: style can be found in header.less -->
        <?php 
        
        include "../connection.php";
        ?>
       
        <div class="col-xs-12 col-sm-6 col-md-5" style="background: white;" >
            <div>
                <div class="col-xs-4 col-sm-6 col-md-3" style="background: white; margin-right:10px; border: 2px solid black;">
                    <center><image src="../../img/sanmarino.png" style="width:90%;height:164px;margin-top:10px;"/></center>
                    <div style="margin-top:20px; text-align: center; word-wrap: break-word;">
                        <?php
                            $qry = mysqli_query($con,"SELECT * from tblofficial");
                            while($row=mysqli_fetch_array($qry)){
                                if($row['sPosition'] == "HOA President"){
                                    echo '
                                    <p>
                                    <b>'.strtoupper($row['completeName']).'</b><br>
                                    <span style="font-size:12px;">HOA President</span>
                                    </p>
                                    ';
                                }elseif($row['sPosition'] == "HOA Vice President"){
                                    echo '
                                    <p>
                                    '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">HOA Vice President</span>
                                    </p>
                                    ';
                                }elseif($row['sPosition'] == "HOA Secretary"){
                                    echo '
                                    <p>
                                    '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">HOA Secretary</span>
                                    </p>
                                    ';
                                }elseif($row['sPosition'] == "HOA Treasurer"){
                                    echo '
                                    <p>
                                    '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">HOA Treasurer</span>
                                    </p>
                                    ';
                                }elseif($row['sPosition'] == "HOA Auditor"){
                                    echo '
                                    <p>
                                    '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">HOA Auditor</span>
                                    </p>
                                    ';
                                }elseif($row['sPosition'] == "Maintenance Committee"){
                                    echo '
                                    <p>
                                    '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">Maintenance Committee</span>
                                    </p>
                                    ';
                                }elseif($row['sPosition'] == "Peace & Order"){
                                    echo '
                                    <p>
                                    '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">Peace & Order</span>
                                    </p>
                                    ';
                                }elseif($row['sPosition'] == "Board of Director"){
                                    echo '
                                    <p>
                                    '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">Board of Director</span>
                                    </p>
                                    ';
                                }elseif($row['sPosition'] == "Legal Affairs Committee"){
                                    echo '
                                    <p>
                                    '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">Legal Affairs Committee</span>
                                    </p>
                                    ';
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="col-xs-7 col-sm-5 col-md-8" style="background: white;  ">
                    <div style="font-size: 16px; algin-items: center; justify-content: center"><b>
                    <center>SAN MARINO CLASSIC<br>
                        HOMEOWNERS<br>
                        ASSOCIATION, INC.<br></b>
                    </center>
                    </div>
                    <div class="pull-left" style="float:left; margin-top: 10px;">
                        <?php $qry2=mysqli_query($con,"SELECT * from tblbuilding where residentid = '".$_GET['resident']."' and permit_no = '".$_GET['adminbuilding']."' ");
                            while($row2 = mysqli_fetch_array($qry2)){
                                echo '<p>Permit No.:<u>'.$row2['permit_no'].'</u></p>';
                            }
                        ?>
                    </div>
                    <div class="pull-right" style="float:right ;margin-top: 10px;">
                       <?php $qry1=mysqli_query($con,"SELECT * from tblbuilding where residentid = '".$_GET['resident']."' and permit_no = '".$_GET['adminbuilding']."' ");
                            while($row1 = mysqli_fetch_array($qry1)){
                                $date = date_create($row1['date']);
                                echo '<p><u>'.(date_format($date,"F j, o")).'</u></p>';
                            }
                        ?>
                    </div>
                    
                    <div class="col-xs-12 col-md-12">
                        <?php
                            $qry=mysqli_query($con,"SELECT * from tblbuilding where residentid = '".$_GET['resident']."' and permit_no = '".$_GET['adminbuilding']."' ");
                            while($row = mysqli_fetch_array($qry)){
                                echo '
                                <p class="text-center" style="font-size: 20px; font-size:bold;">OFFICE OF THE BUILDING INSPECTOR<br><b style="font-size: 28px;">BUILDING PERMIT</b></p>
                                <p style="text-indent:40px;text-align: justify;">
                                This permimit certifies that <u>'.strtoupper($row['ownername']).'</u> has permission to build a <u>'.strtoupper($row['projecttype']).'</u> located on <u>'.strtoupper($row['address']).'</u> provided that the person accepting this permit shall conform to the term of the application 
                                on file in the building department and to the provisions of the statutes and the ordinances relating to the construction, maintenance and inspection of buildings in the town of San Marino Classic, 
                                and the Dasmarinas City building code 780 CMR 8th Edition.
                                <p style="text-indent:40px;text-align: justify;">
                                A certificate of occupancy will be issued upon return of this permit only after all the required inspections have been signed and dated by the appropriate inspector.
                                </p>
                                <p style="text-indent:40px;text-align: justify;">
                                This permit shall become invalid six months from the date of issue if the work permitted has not commenced or is not progressing continuously to completion as far as reasonably practicable.
                                </p>
                                <p style="font-size: 18px; text-align: center;">
                                SUBJECT TP 780 CMR 107.6 CONSTRUCTION CONTROL<br>
                                THIS CARD MUST BE DISPLAYED IN A CONSPICUOUS PLACE ON THE PREMISES
                                </p>
                                
                                ';
                            }
                        ?>
                    </div>  
                    <div class="col-md-5 col-xs-4" style="float:right;margin-top: -0px; margin-right: 100px;">
                        <br><p>_______________________________</p>
                    </div>
                    <p style="float:left;margin-top: -10px; margin-left: 220px;">Building Inspector's Signature</p>
                    </div>
                </div>
            </div> 
        </div>
                <button class="btn btn-primary noprint" style="float: left;" id="printpagebutton" onclick="PrintElem('#building')">Print</button>
                        
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