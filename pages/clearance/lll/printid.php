<!DOCTYPE html>
<html id="idappli">
<title>ID Application</title>
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
    $_SESSION['clr'] = $_GET['idappli'];
    include('../head_css.php'); ?>
    <body class="skin-black" >
        <!-- header logo: style can be found in header.less -->
        <?php 
        
        include "../connection.php";
        ?>
       
       <div class="col-xs-12 col-sm-6 col-md-6" style="background: white; padding-top: 10px;padding-right: 1px;padding-bottom: 10px;padding-left: 1px; ">
       <div>
                <div style="background: white; padding-right: 10px; padding-left: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12" style="font-size: 25px; display: block; vertical-align: middle;"><b>
                    <image src="../../img/sanmarino.png" style="width:13%;height:80px; background: white;vertical-align: middle; margin-right: 10px" width="100px" class="pull-left"/>
                        <p style="text-align: center; line-height: 1; font-family: arial; font-stretch: condensed; margin-top: 2.5%;" class="pull-left">SAN MARINO CLASSIC HOMEOWNERS ASSOCIATION, INC.<br>
                                                 Nia Rd., Brgy. Salawag, Dasmarinas City, Cavite
                        </p></b>
                    </div>
                </div>  
        </div>
        <div class="pull-left" style="background: white; margin-right:20px; margin-top: 30px; padding-left: 10px;">
                    <?php
                    $qry=mysqli_query($con,"SELECT * from tblresident ri left join tblid i on i.residentid = ri.id where residentid = '".$_GET['resident']."' and id_no = '".$_GET['idappli']."' ");
                    while($row = mysqli_fetch_array($qry)){
                        echo'<center><image src="../resident/image/'.basename($row['image']).'" style="width:160px;height:180px;"/></center>';
                    }
                    ?>
                    <div style="margin-top:1px; text-align: center; word-wrap: break-word; font-family: arial; line-height: 1.5;">
                            <?php $qry2=mysqli_query($con,"SELECT * from tblresident ri left join tblid i on i.residentid = ri.id where residentid = '".$_GET['resident']."' and id_no = '".$_GET['idappli']."' ");
                            while($row2=mysqli_fetch_array($qry2)){
                                echo '<u style="font-size: 25px; font-stretch: condensed;"><b>'.strtoupper($row2['id_no']).'</b></u><br>
                                            <p style="font-size: 18px;">I.D. No.</p>
                                            ';
                            }
                            
                            
                        ?>
                    </div>
            </div>
            <div class="pull-left" style="background: white; text-align: center; margin-right:5px; margin-top: 10px; padding-right: 10px;">
                    <div style="margin-top:1px; word-wrap: break-word;">
                            <?php $qry3=mysqli_query($con,"SELECT *,CONCAT(ri.lname, ', ' ,ri.fname, ' ' ,ri.mname) as residentname,i.id as iid from tblresident ri left join tblid i on i.residentid = ri.id where residentid = '".$_GET['resident']."' and id_no = '".$_GET['idappli']."' ");
                            while($row3=mysqli_fetch_array($qry3)){
                                echo'<p style="font-size: 33px; margin-bottom: -28px; text-transform: uppercase;"><b>'.$row3['residentname'].'</b></p>
                                     <p style="font-size: 20px; margin-bottom: -5px;"><b>_____________________________________________</b></p>
                                     <p style="font-size: 20px; margin-bottom: 0px;">NAME</p>
                                     <p style="font-size: 33px; margin-bottom: -28px; text-transform: uppercase;"><b>'.$row3['zone'].'</b></p>
                                     <p style="font-size: 20px; margin-bottom: -5px;"><b>_____________________________________________</b></p>
                                     <p style="font-size: 20px; margin-bottom: 22px;">ADDRESS</p>
                                     <p style="font-size: 20px; margin-bottom: -5px;"><b>_____________________________________________</b></p>
                                     <p style="font-size: 20px; margin-bottom: 1px;">SIGNATURE</p>
                                ';
                            }
                            
                            
                        ?>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12" style="font-size: 25px;margin-top: 100px; padding-top: 50px;padding-right: 55px;padding-bottom: 20px;padding-left: 45px;">
                    <p style="text-align: center; line-height: 1.3; font-family: arial; font-stretch: condensed;">
                    THIS IS CERTIFY THAT THE BEARER OF THIS CARD IS A BONA FIDE<br>
                    <u style="font-size: 40px; font-stretch: normal; line-height: 0.9;"><b>HOMEOWNER</b></u><br>
                    OF SAN MARINO CLASSIC SUBD., AND THIS CARD<br>
                    IS VALID ONLY WITHIN THE SMC PREMISES.
                </p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" style="font-size: 25px;margin-top: 20px; padding-top: 50px;padding-right: 40px;padding-bottom: 20px;padding-left: 30px;">
                    <?php
                    $qry4 = mysqli_query($con,"SELECT * from tblofficial");
                    while($row4=mysqli_fetch_array($qry4)){
                        if($row4['sPosition'] == "HOA President"){
                            echo '
                                <div class="pull-left" style="text-align: center; line-height: 1;">
                                <p style="font-size: 20px;"><b>'.strtoupper($row4['completeName']).'</b></p>
                                <p style="font-size: 18px;">HOA President</p>
                                </div>
                            ';
                        }elseif($row4['sPosition'] == "Peace & Order"){
                            echo '
                                <div class="pull-right" style="text-align: center; line-height: 1;">
                                <p style="font-size: 20px;"><b>'.strtoupper($row4['completeName']).'</b></p>
                                <p style="font-size: 18px;">Peace and Order</p>
                                </div>
                        ';
                        }
                    }
                    ?>
                </div>
            </div>          
        </div>
    </div> 
        
        
                <button class="btn btn-primary noprint" style="float: left;" id="printpagebutton" onclick="PrintElem('#idappli')">Print</button>
                        
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