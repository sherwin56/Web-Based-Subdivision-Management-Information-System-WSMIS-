<!DOCTYPE html>
<html id="solicit">
    <title>Solicitation</title>
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
    $_SESSION['clr'] = $_GET['solicit'];
    include('../head_css.php'); ?>
    <body class="skin-black" >
        <!-- header logo: style can be found in header.less -->
        <?php 
        
        include "../connection.php";
        ?>
       
       <div class="col-xs-12 col-sm-6 col-md-5" style="background: white; padding-top: 20px;padding-right: 50px;padding-bottom: 20px;padding-left: 50px;">
            <div>
                
                <div style="background: white;">
                    <div style="font-size: 16px; algin-items: center; justify-content: center"><b>
                    <center><image src="../../img/sanmarino.png" style="width:25%;height:120px; background: white;"/></center>
                        <center>SAN MARINO CLASSIC<br>
                        HOMEOWNERS<br>
                        ASSOCIATION, INC.</b></center>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <p class="text-center" style="font-size: 50px; font-family: arial; font-stretch: condensed;"><b>SOLICITATION</b></p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="float:left; margin-top: 10px; font-size: 18px;">
                    <?php $qry=mysqli_query($con,"SELECT * from tblresident rs left join tblsolicit s on s.residentid = rs.id where residentid = '".$_GET['resident']."' and solicit_no = '".$_GET['solicit']."' ");                  
                            while($row = mysqli_fetch_array($qry)){
                                $date = date_create($row['date']);
                                echo '
                                    
                                    <p>'.(date_format($date,"F j, o")).'</u></p>
                                    ';
                            }
                        ?>    
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="float:left; margin-top: 10px; font-size: 18px;">
                    <?php $qry2 = mysqli_query($con,"SELECT * from tblofficial");                  
                            while($row = mysqli_fetch_array($qry2)){
                                if($row['sPosition'] == "HOA President"){
                                    echo '
                                    <p><br>
                                    Dear <b>'.strtoupper($row['completeName']).'</b>,<br>
                                    </p><br>
                                    ';
                                }
                            }
                        ?>    
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12" style="font-size: 18px;">
                        <?php
                            $qry3=mysqli_query($con,"SELECT * from tblresident rs left join tblsolicit s on s.residentid = rs.id where residentid = '".$_GET['resident']."' and solicit_no = '".$_GET['solicit']."' ");
                            while($row = mysqli_fetch_array($qry3)){
                                echo '
                                
                                
                                <p style="text-align: justify;">
                                My name is '.strtoupper($row['fname']).' and I am a resident of San Marino Classic, I would like to ask for your help to make a donation for our project the deals with '.strtoupper($row['project']).'.
                                </p>
                                <p style="text-align: justify;">
                                We need your help to accomplish our goals and objectives. Your donation will be highly appreciated and will be used only for the project.
                                </p>
                                <p style="text-align: justify;">
                                We thank you in advance for your contribution. Please call us at '.strtoupper($row['contact']).' when you may make your donation, or send a check in the pre-stamped envelope included in this letter.
                                </p>
                                <p style="text-align: justify;"><br>
                                Regards,
                                <br><br></p>


                                
                                <p>'.strtoupper($row['fname']).'</p>';
                            }
                        ?>
                    </div>
                </div>  
            </div> 
        </div>
                <button class="btn btn-primary noprint" style="float: left;" id="printpagebutton" onclick="PrintElem('#solicit')">Print</button>
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