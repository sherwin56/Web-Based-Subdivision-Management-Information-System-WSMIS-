<?php
if(isset($_POST['btn_add'])){
    $txt_cnum = $_POST['txt_cnum'];
    $ddl_resident = $_POST['ddl_resident'];
    $txt_findings = $_POST['txt_findings'];
    $txt_purpose = $_POST['txt_purpose'];
    $txt_ornum = $_POST['txt_ornum'];
    $txt_amount = $_POST['txt_amount'];
    $date = date('Y-m-d');

    $chkdup = mysqli_query($con,"SELECT * from tblclearance where clearanceNo = ".$txt_cnum." ");
    $num_rows = mysqli_num_rows($chkdup);

    if(isset($_SESSION['role'])){
        $action = 'Added Clearance with clearance number of '.$txt_cnum;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    if($num_rows == 0){
        if($_SESSION['role'] == "Administrator"){
        $query = mysqli_query($con,"INSERT INTO tblclearance (clearanceNo,residentid,findings,purpose,orNo,samount,dateRecorded,recordedBy,status) 
            values ('$txt_cnum','$ddl_resident', '$txt_findings','$txt_purpose', '$txt_ornum', '$txt_amount', '$date', '".$_SESSION['username']."','Approved')") or die('Error: ' . mysqli_error($con));
        }
        else{
        $query = mysqli_query($con,"INSERT INTO tblclearance (clearanceNo,residentid,findings,purpose,orNo,samount,dateRecorded,recordedBy,status) 
            values ('$txt_cnum','$ddl_resident', '$txt_findings','$txt_purpose', '$txt_ornum', '$txt_amount', '$date', '".$_SESSION['username']."','New')") or die('Error: ' . mysqli_error($con));
        }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }
    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }
}

if(isset($_POST['btn_req'])){
    $chkblot = mysqli_query($con,"select * from tblresident where '".$_SESSION['userid']."' not in (select complainant from tblblotter)");
    $num_row = mysqli_num_rows($chkblot);
    if($num_row > 0)
    {
        $chk = mysqli_query($con,"select * from tblresident where id = '".$_SESSION['userid']."' ");
        while($row = mysqli_fetch_array($chk)){

            if($row['lengthofstay'] < 6){
                $_SESSION['lengthofstay'] = 1;
                header ("location: ".$_SERVER['REQUEST_URI']);
            }
            else{
                $txt_purpose = $_POST['txt_purpose'];
                $date = date('Y-m-d');
                $reqquery = mysqli_query($con,"INSERT INTO tblclearance (clearanceNo,residentid,findings,purpose,orNo,samount,dateRecorded,recordedBy,status) 
                    values ('','".$_SESSION['userid']."','','$txt_purpose','','','$date','".$_SESSION['role']."','New') ")or die('Error: ' . mysqli_error($con));

                if($reqquery == true)
                {
                    header ("location: ".$_SERVER['REQUEST_URI']);
                } 
            }
        }
    } 
    else{
        $_SESSION['blotter'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Building Permit Form
if(isset($_POST['btn_buildingreq'])){
    $txtreqtype = $_POST['txtreqtype'];
    $txt_owner = $_POST['txt_owner'];
    $txt_desc = $_POST['txt_desc'];
    $date = date("Y-m-d");
    $txt_address = $_POST['txt_address'];
    $payment1 = $_POST['payment1'];
    $txt_ref = $_POST['txt_ref'];
    $chk = mysqli_query($con,"select * from tblresident where id = '".$_SESSION['userid']."' ");
        while($row = mysqli_fetch_array($chk)){

    if($num_rows == 0){
        if($_SESSION['role'] == "Administrator"){
            if($payment1 == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblbuilding (permit_no,ownername,projecttype,address,date,payment,ref_no,status,req_type,residentid,amount,balance,seen) 
                values ('0','$txt_owner', '$txt_desc','$txt_address', '$date', '$payment1', '0', 'New','$txtreqtype','0','0','0','0')") or die('Error: ' . mysqli_error($con));
            }elseif ($payment1 == "Gcash"){
                $query = mysqli_query($con,"INSERT INTO tblbuilding (permit_no,ownername,projecttype,address,date,payment,ref_no,status,req_type,residentid,amount,balance,seen) 
            values ('0','$txt_owner', '$txt_desc','$txt_address', '$date', '$payment1', '$txt_ref', 'New','$txtreqtype','0','0','0','0')") or die('Error: ' . mysqli_error($con));
            }
        }
        else{
            if($payment1 == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblbuilding (permit_no,ownername,projecttype,address,date,payment,ref_no,status,req_type,residentid,amount,balance,seen) 
                values ('0','$txt_owner', '$txt_desc','$txt_address', '$date', '$payment1', '0', 'New','$txtreqtype','".$_SESSION['userid']."','0','0','0')") or die('Error: ' . mysqli_error($con));
            }elseif ($payment1 == "Gcash"){
                $query = mysqli_query($con,"INSERT INTO tblbuilding (permit_no,ownername,projecttype,address,date,payment,ref_no,status,req_type,residentid,amount,balance,seen) 
            values ('0','$txt_owner', '$txt_desc','$txt_address', '$date', '$payment1', '$txt_ref', 'New','$txtreqtype','".$_SESSION['userid']."','0','0','0')") or die('Error: ' . mysqli_error($con));
            }
        }
        
        if ($query){
            $last_id = mysqli_insert_id($con);
            if($last_id){
                $user_id = $last_id;
                $sql = "UPDATE tblbuilding SET permit_no = '".$user_id."' WHERE id = '".$last_id."'";
                $res = mysqli_query($con, $sql);
            }
        }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }

    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }
}
}
//Admin Building Permit Button
if(isset($_POST['btn_adminbuilding'])){
    $adminpermitdate = $_POST['adminpermitdate'];
    $txt_residentidbp = $_POST['txt_residentidbp'];
    $txtadmindesc = $_POST['txtadmindesc'];
    $txtadminaddress = $_POST['txtadminaddress'];
    $adminamount = $_POST['adminamount'];
    $adminpayment = $_POST['adminpayment'];
    $txtadminbpref = $_POST['txtadminbpref'];

            if($_SESSION['role'] == "Administrator")
            {
                if($adminpayment == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblbuilding (permit_no,ownername,projecttype,address,date,payment,ref_no,status,req_type,residentid,amount,balance) 
                values ('0','$txt_residentidbp', '$txtadmindesc','$txtadminaddress', '$adminpermitdate', '$adminpayment', '0', 'Approved','Construction Bond','0','$adminamount','0')") or die('Error: ' . mysqli_error($con));
                }elseif ($adminpayment == "Gcash"){
                    $query = mysqli_query($con,"INSERT INTO tblbuilding (permit_no,ownername,projecttype,address,date,payment,ref_no,status,req_type,residentid,amount,balance) 
                values ('0','$txt_residentidbp', '$txtadmindesc','$txtadminaddress', '$adminpermitdate', '$adminpayment', '$txtadminbpref', 'Approved','Construction Bond','0','$adminamount','0')") or die('Error: ' . mysqli_error($con));
                }
            }
            if ($query){
            $last_id = mysqli_insert_id($con);
            if($last_id){
                $user_id = $last_id;
                $sql = "UPDATE tblbuilding SET permit_no = '".$user_id."' WHERE id = '".$last_id."'";
                $res = mysqli_query($con, $sql);
            }
        }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    

    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }
        
    
}


//For Memorandum Form
if(isset($_POST['btn_memreq'])){
    $txtreqmem = $_POST['txtreqmem'];
    $txt_sub = $_POST['txt_sub'];
    $txt_fn = $_POST['txt_fn'];
    $txtaddress = $_POST['$txtaddress'];
    $date = date("Y-m-d");
    $payment2 = $_POST['payment2'];
    $txt_memref = $_POST['txt_memref'];

    if($num_rows == 0){
        if($_SESSION['role'] == "Administrator"){
            if($payment2 == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblmemo (memo_id,date,subject,fname,address,payment,ref_no,status,req_type,residentid,amount,seen) 
                values ('0','$date', '$txt_sub','$txt_fn', '$txtaddress', '$payment2', '0', 'New','$txtreqmem','".$_SESSION['userid']."','0','0')") or die('Error: ' . mysqli_error($con));
            }elseif ($payment2 == "Gcash"){
                $query = mysqli_query($con,"INSERT INTO tblmemo (memo_id,date,subject,fname,address,payment,ref_no,status,req_type,residentid,amount,seen) 
                values ('0','$date', '$txt_sub','$txt_fn', '$txtaddress', '$payment2', '$txt_memref', 'New','$txtreqmem','".$_SESSION['userid']."','0','0')") or die('Error: ' . mysqli_error($con));
            }
        }
        else{
            if($payment2 == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblmemo (memo_id,date,subject,fname,address,payment,ref_no,status,req_type,residentid,amount,seen) 
                values ('0','$date', '$txt_sub','$txt_fn', '$txtaddress', '$payment2', '0', 'New','$txtreqmem','".$_SESSION['userid']."','0','0')") or die('Error: ' . mysqli_error($con));
            }elseif ($payment2 == "Gcash"){
                $query = mysqli_query($con,"INSERT INTO tblmemo (memo_id,date,subject,fname,address,payment,ref_no,status,req_type,residentid,amount,seen) 
                values ('0','$date', '$txt_sub','$txt_fn', '$txtaddress', '$payment2', '$txt_memref', 'New','$txtreqmem','".$_SESSION['userid']."','0','0')") or die('Error: ' . mysqli_error($con));
            }
        }
        if ($query){
                $last_id = mysqli_insert_id($con);
                if($last_id){
                    $user_id = $last_id;
                    $sql = "UPDATE tblmemo SET memo_id = '".$user_id."' WHERE id = '".$last_id."'";
                    $res = mysqli_query($con, $sql);
                }
            }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }

    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }

}

//Admin Memorandum Button
if(isset($_POST['btn_adminmemo'])){
    $adminmemodate = $_POST['adminmemodate'];
    $txtadminfn = $_POST['txtadminfn'];
    $txtadminaddress = $_POST['txtadminaddress'];
    $txtadminsubject = $_POST['txtadminsubject'];
    $adminamount = $_POST['adminamount'];
    $adminpayment = $_POST['adminpayment'];
    $txtadminmemoref = $_POST['txtadminmemoref'];

    if($num_rows == 0){
        if($_SESSION['role'] == "Administrator")
            {
                if($adminpayment == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblmemo (memo_id,date,subject,fname,address,payment,ref_no,status,req_type,residentid,amount) 
                values ('0','$adminmemodate', '$txtadminsubject','$txtadminfn','$txtadminaddress', '$adminpayment', '0', 'Approved','Memorandum','0','$adminamount')") or die('Error: ' . mysqli_error($con));
                }elseif ($adminpayment == "Gcash"){
                    $query = mysqli_query($con,"INSERT INTO tblmemo (memo_id,date,subject,fname,address,payment,ref_no,status,req_type,residentid,amount) 
                values ('0','$adminmemodate', '$txtadminsubject','$txtadminfn','$txtadminaddress', '$adminpayment', '$txtadminmemoref', 'Approved','Memorandum','0','$adminamount')") or die('Error: ' . mysqli_error($con));
                }
            }
            if ($query){
                $last_id = mysqli_insert_id($con);
                if($last_id){
                    $user_id = $last_id;
                    $sql = "UPDATE tblmemo SET memo_id = '".$user_id."' WHERE id = '".$last_id."'";
                    $res = mysqli_query($con, $sql);
                }
            }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }

    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }

}

//For Solicitation Form
if(isset($_POST['btn_solicit'])){
    $txtsolicit = $_POST['txtsolicit'];
    $txtsub = $_POST['txtsub'];
    $txtfn = $_POST['txtfn'];
    $txt_contact = $_POST['txt_contact'];
    $date = date('Y-m-d');
    $payment3 = $_POST['payment3'];
    $txt_solref = $_POST['txt_solref'];


    if($num_rows == 0){
        if($_SESSION['role'] == "Administrator"){
            if($payment3 == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblsolicit (solicit_no,project,fname,contact,payment,ref_no,status,req_type,residentid,amount,date,seen) 
                values ('0','$txtsub', '$txtfn','$txt_contact', '$payment3', '0', 'New','$txtsolicit','".$_SESSION['userid']."','0','$date','0')") or die('Error: ' . mysqli_error($con));
            }elseif ($payment3 == "Gcash"){
                $query = mysqli_query($con,"INSERT INTO tblsolicit (solicit_no,project,fname,contact,payment,ref_no,status,req_type,residentid,amount,date,seen) 
                values ('0','$txtsub', '$txtfn','$txt_contact', '$payment3', '$txt_solref', 'New','$txtsolicit','".$_SESSION['userid']."','0','$date','0')") or die('Error: ' . mysqli_error($con));
            }
        }
        else{
            if($payment3 == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblsolicit (solicit_no,project,fname,contact,payment,ref_no,status,req_type,residentid,amount,date,seen) 
                values ('0','$txtsub', '$txtfn','$txt_contact', '$payment3', '0', 'New','$txtsolicit','".$_SESSION['userid']."','0','0000-00-00','0')") or die('Error: ' . mysqli_error($con));
            }elseif ($payment3 == "Gcash"){
                $query = mysqli_query($con,"INSERT INTO tblsolicit (solicit_no,project,fname,contact,payment,ref_no,status,req_type,residentid,amount,date,seen) 
                values ('0','$txtsub', '$txtfn','$txt_contact', '$payment3', '$txt_solref', 'New','$txtsolicit','".$_SESSION['userid']."','0','0000-00-00','0')") or die('Error: ' . mysqli_error($con));
            }
        }
        if ($query){
                $last_id = mysqli_insert_id($con);
                if($last_id){
                    $user_id = $last_id;
                    $sql = "UPDATE tblsolicit SET solicit_no = '".$user_id."' WHERE id = '".$last_id."'";
                    $res = mysqli_query($con, $sql);
                }
            }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }

    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }

}

//Admin Solicitation Form
if(isset($_POST['btn_adminsolicit'])){
    $adminsoldate = $_POST['adminsoldate'];
    $txtadminfn = $_POST['txtadminfn'];
    $txtadminpn = $_POST['txtadminpn'];
    $txtadmincontact = $_POST['txtadmincontact'];
    $adminamount = $_POST['adminamount'];
    $adminpayment = $_POST['adminpayment'];
    $txtadminsolref = $_POST['txtadminsolref'];

    if($num_rows == 0){
        if($_SESSION['role'] == "Administrator")
            {
                if($adminpayment == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblsolicit (solicit_no,project,fname,contact,payment,ref_no,status,req_type,residentid,amount,date) 
                values ('0','$txtadminpn', '$txtadminfn','$txtadmincontact','$adminpayment', '0','Approved','Solicitation','0','$adminamount','$adminsoldate')") or die('Error: ' . mysqli_error($con));
                }elseif ($adminpayment == "Gcash"){
                    $query = mysqli_query($con,"INSERT INTO tblsolicit (solicit_no,project,fname,contact,payment,ref_no,status,req_type,residentid,amount,date) 
                    values ('0','$txtadminpn','$txtadminfn','$txtadmincontact','$adminpayment','$txtadminsolref','Approved','Solicitation','0','$adminamount','$adminsoldate')") or die('Error: ' . mysqli_error($con));
                }
            }
            if ($query){
                $last_id = mysqli_insert_id($con);
                if($last_id){
                    $user_id = $last_id;
                    $sql = "UPDATE tblsolicit SET solicit_no = '".$user_id."' WHERE id = '".$last_id."'";
                    $res = mysqli_query($con, $sql);
                }
            }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }

    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }

}

//For ID Application Form
if(isset($_POST['btn_idreq'])){
    $txtidappli = $_POST['txtidappli'];
    $txtfname = $_POST['txtfname'];
    $date = date('Y-m-d');
    $payment4 = $_POST['payment4'];
    $txt_idref = $_POST['txt_idref'];


    if($num_rows == 0){
        if($_SESSION['role'] == "Administrator"){
            if($payment4 == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblid (id_no,date,fname,payment,ref_no,residentid,status,amount,req_type,seen) 
                values ('0','$date', '$txtfname', '$payment4', '0','".$_SESSION['userid']."','New','0','$txtidappli','0')") or die('Error: ' . mysqli_error($con));
            }elseif ($payment4 == "Gcash"){
                $query = mysqli_query($con,"INSERT INTO tblid (id_no,date,fname,payment,ref_no,residentid,status,amount,req_type,seen) 
                values ('0','$date', '$txtfname', '$payment4', '$txt_idref','".$_SESSION['userid']."','New','0','$txtidappli','0')") or die('Error: ' . mysqli_error($con));
            }
        }
        else{
            if($payment4 == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblid (id_no,date,fname,payment,ref_no,residentid,status,amount,req_type,seen) 
                values ('0','0000-00-00', '$txtfname', '$payment4', '0','".$_SESSION['userid']."','New','0','$txtidappli','0')") or die('Error: ' . mysqli_error($con));
            }elseif ($payment4 == "Gcash"){
                $query = mysqli_query($con,"INSERT INTO tblid (id_no,date,fname,payment,ref_no,residentid,status,amount,req_type,seen) 
                values ('0','0000-00-00', '$txtfname', '$payment4', '$txt_idref','".$_SESSION['userid']."','New','0','$txtidappli','0')") or die('Error: ' . mysqli_error($con));
            }
        }
        if ($query){
                $last_id = mysqli_insert_id($con);
                if($last_id){
                    $user_id = $last_id;
                    $sql = "UPDATE tblid SET id_no = '".$user_id."' WHERE id = '".$last_id."'";
                    $res = mysqli_query($con, $sql);
                }
            }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }

    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }

}

//Admin ID Application
if(isset($_POST['btn_addadminid'])){
    $txt_residentid = $_POST['txt_residentid'];
    $txt_resident = $_POST ['txt_resident'];
    $txt_date = $_POST['txt_date'];
    $txt_amount = $_POST['txt_amount'];
    $adminpayment = $_POST['adminpayment'];
    $txtadminidref = $_POST['txtadminidref'];

    if($num_rows == 0){
        if($_SESSION['role'] == "Administrator")
            {
                if($adminpayment == "Cash"){
                    $query = mysqli_query($con,"INSERT INTO tblid (id_no,date,fname,payment,ref_no,amount,status,residentid,req_type)
                    values ('0','$txt_date','".$row['residentname']."','$adminpayment','0','$txt_amount','Approved','$txt_residentid','ID Application')") or die('Error: ' . mysqli_error($con));
                }elseif ($adminpayment == "Gcash"){
                    $query = mysqli_query($con,"INSERT INTO tblid (id_no,date,fname,payment,ref_no,amount,status,residentid,req_type) 
                    values ('0','$txt_date','".$row['residentname']."','$adminpayment','$txtadminidref','$txt_amount','Approved','$txt_residentid','ID Application')") or die('Error: ' . mysqli_error($con));
                }
            }
            if ($query){
                $last_id = mysqli_insert_id($con);
                if($last_id){
                    $user_id = $last_id;
                    $sql = "UPDATE tblid SET id_no = '".$user_id."' WHERE id = '".$last_id."'";
                    $res = mysqli_query($con, $sql);
                }
            }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }

    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }
    
}

//For Car Sticker Form
if(isset($_POST['btn_stickerreq'])){
    $txtsticker = $_POST['txtsticker'];
    $txtfnamesticker = $_POST['txtfnamesticker'];
    $date = date('Y-m-d');
    $payment5 = $_POST['payment5'];
    $txt_stickerref = $_POST['txt_stickerref'];


    if($num_rows == 0){
        if($_SESSION['role'] == "Administrator"){
            if($payment5 == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblsticker (sticker_no,date,fname,payment,ref_no,amount,status,residentid,req_type,seen) 
                values ('0','$date','$txtfnamesticker','$payment5','0','0', 'New','".$_SESSION['userid']."','$txtsticker','0')") or die('Error: ' . mysqli_error($con));
            }elseif ($payment5 == "Gcash"){
                $query = mysqli_query($con,"INSERT INTO tblsticker (sticker_no,date,fname,payment,ref_no,amount,status,residentid,req_type,seen) 
                values ('0','$date,'$txtfnamesticker','$payment5','$txt_stickerref','0', 'New','".$_SESSION['userid']."','$txtsticker','0')") or die('Error: ' . mysqli_error($con));
            }
        }
        else{
            if($payment5 == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblsticker (sticker_no,date,fname,payment,ref_no,amount,status,residentid,req_type,seen) 
                values ('0','0000-00-00', '$txtfnamesticker','$payment5','0','0', 'New','".$_SESSION['userid']."','$txtsticker','0')") or die('Error: ' . mysqli_error($con));
            }elseif ($payment5 == "Gcash"){
                $query = mysqli_query($con,"INSERT INTO tblsticker (sticker_no,date,fname,payment,ref_no,amount,status,residentid,req_type,seen) 
                values ('0','0000-00-00', '$txtfnamesticker','$payment5','$txt_stickerref','0', 'New','".$_SESSION['userid']."','$txtsticker','0')") or die('Error: ' . mysqli_error($con));
            }
        }
        if ($query){
                $last_id = mysqli_insert_id($con);
                if($last_id){
                    $user_id = $last_id;
                    $sql = "UPDATE tblsticker SET sticker_no = '".$user_id."' WHERE id = '".$last_id."'";
                    $res = mysqli_query($con, $sql);
                }
            }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }

    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }

}

//Admin Car Sticker
if(isset($_POST['btn_addadminsticker'])){
    $txt_residentid = $_POST['txt_residentid'];
    $txt_resident = $_POST ['txt_resident'];
    $txt_date = $_POST['txt_date'];
    $txt_amount = $_POST['txt_amount'];
    $adminpayment = $_POST['adminpayment'];
    $txtadminstickerref = $_POST['txtadminstickerref'];

    if($num_rows == 0){
        if($_SESSION['role'] == "Administrator")
            {
                if($adminpayment == "Cash"){
                    $query = mysqli_query($con,"INSERT INTO tblsticker (sticker_no,date,fname,payment,ref_no,amount,status,residentid,req_type)
                    values ('0','$txt_date','".$row['residentname']."','$adminpayment','0','$txt_amount','Approved','$txt_residentid','Car Sticker')") or die('Error: ' . mysqli_error($con));
                }elseif ($adminpayment == "Gcash"){
                    $query = mysqli_query($con,"INSERT INTO tblsticker (sticker_no,date,fname,payment,ref_no,amount,status,residentid,req_type) 
                    values ('0','$txt_date','".$row['residentname']."','$adminpayment','$txtadminstickerref','$txt_amount','Approved','$txt_residentid','Car Sticker')") or die('Error: ' . mysqli_error($con));
                }
            }
            if ($query){
                $last_id = mysqli_insert_id($con);
                if($last_id){
                    $user_id = $last_id;
                    $sql = "UPDATE tblsticker SET sticker_no = '".$user_id."' WHERE id = '".$last_id."'";
                    $res = mysqli_query($con, $sql);
                }
            }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }

    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }
    
}

//For Monthly Due Form
if(isset($_POST['btn_monthlyreq'])){
    $txtmonthly = $_POST['txtmonthly'];
    $txtfnamemonthly = $_POST['txtfnamemonthly'];
    $txt_month = $_POST['txt_month'];
    $date = date('Y-m-d');
    $payment6 = $_POST['payment6'];
    $txt_monthlyref = $_POST['txt_monthlyref'];

            

    if($num_rows == 0){
        if($_SESSION['role'] == "Administrator"){
            if($payment6 == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblmonthly (monthly_no,date,fname,month,payment,ref_no,amount,status,residentid,req_type,seen) 
                values ('0','$date','$txtfnamemonthly','$txt_month','$payment6','0','0', 'New','".$_SESSION['userid']."','$txtmonthly','0')") or die('Error: ' . mysqli_error($con));
            }elseif ($payment6 == "Gcash"){
                $query = mysqli_query($con,"INSERT INTO tblmonthly (monthly_no,date,fname,month,payment,ref_no,amount,status,residentid,req_type,seen) 
                values ('0','$date','$txtfnamemonthly','$txt_month','$payment6','$txt_monthlyref','0', 'New','".$_SESSION['userid']."','$txtmonthly','0')") or die('Error: ' . mysqli_error($con));
            }
        }
        else{
            if($payment6 == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblmonthly (monthly_no,date,fname,month,payment,ref_no,amount,status,residentid,req_type,seen) 
                values ('0','0000-00-00', '$txtfnamemonthly','$txt_month','$payment6','0','0', 'New','".$_SESSION['userid']."','$txtmonthly','0')") or die('Error: ' . mysqli_error($con));
            }elseif ($payment6 == "Gcash"){
                $query = mysqli_query($con,"INSERT INTO tblmonthly (monthly_no,date,fname,month,payment,ref_no,amount,status,residentid,req_type,seen) 
                values ('0','0000-00-00', '$txtfnamemonthly','$txt_month','$payment6','$txt_monthlyref','0', 'New','".$_SESSION['userid']."','$txtmonthly','0')") or die('Error: ' . mysqli_error($con));
            }
        }
        if ($query){
                $last_id = mysqli_insert_id($con);
                if($last_id){
                    $user_id = $last_id;
                    $sql = "UPDATE tblmonthly SET monthly_no = '".$user_id."' WHERE id = '".$last_id."'";
                    $res = mysqli_query($con, $sql);
                }
            }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }

    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }

}

//Admin Monthly Due
if(isset($_POST['btn_addadminmonthly'])){
    $txt_residentid = $_POST['txt_residentid'];
    $txt_resident = $_POST ['txt_resident'];
    $txt_date = $_POST['txt_date'];
    $txt_month = $_POST['txt_month'];
    $txt_amount = $_POST['txt_amount'];
    $adminpayment = $_POST['adminpayment'];
    $txtadminmonthlyref = $_POST['txtadminmonthlyref'];

    if($num_rows == 0){
        if($_SESSION['role'] == "Administrator")
            {
                if($adminpayment == "Cash"){
                    $query = mysqli_query($con,"INSERT INTO tblmonthly (monthly_no,date,fname,month,payment,ref_no,amount,status,residentid,req_type)
                    values ('0','$txt_date','".$row['residentname']."','".$row['month']."','$adminpayment','0','$txt_amount','Approved','$txt_residentid','Monthly Due')") or die('Error: ' . mysqli_error($con));
                }elseif ($adminpayment == "Gcash"){
                    $query = mysqli_query($con,"INSERT INTO tblmonthly (monthly_no,date,fname,month,payment,ref_no,amount,status,residentid,req_type) 
                    values ('0','$txt_date','".$row['residentname']."','".$row['month']."','$adminpayment','$txtadminmonthlyref','$txt_amount','Approved','$txt_residentid','Monthly Due')") or die('Error: ' . mysqli_error($con));
                }
            }
            if ($query){
                $last_id = mysqli_insert_id($con);
                if($last_id){
                    $user_id = $last_id;
                    $sql = "UPDATE tblmonthly SET monthly_no = '".$user_id."' WHERE id = '".$last_id."'";
                    $res = mysqli_query($con, $sql);
                }
            }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }

    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }
    
}

//For Clubhouse Reservation Form
if(isset($_POST['btn_reservereq'])){
    $date = date('Y-m-d');
    $txtreserve = $_POST['txtreserve'];
    $txtfnreserve = $_POST['txtfnreserve'];
    $txttitle = $_POST['txttitle'];
    $txtrdesc = $_POST['txtrdesc'];
    $txtsdatereserve = $_POST['txtsdatereserve'];
    $txtedatereserve = $_POST['txtedatereserve'];
    $payment7 = $_POST['payment7'];
    $txt_reserveref = $_POST['txt_reserveref'];
            

    if($num_rows == 0){
        if($_SESSION['role'] == "Administrator"){
            if($payment7 == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblreserve (reserve_no,date,fullname,startdate,payment,ref_no,amount,residentid,status,req_type,title,description,enddate,seen) 
                values ('0','$date',$txtfnreserve','$txtsdatereserve','$payment7','0','0', '".$_SESSION['userid']."','New','$txtreserve','$txttitle','$txtrdesc','$txtedatereserve','0')") or die('Error: ' . mysqli_error($con));
            }elseif ($payment7 == "Gcash"){
                $query = mysqli_query($con,"INSERT INTO tblreserve (reserve_no,date,fullname,startdate,payment,ref_no,amount,residentid,status,req_type,title,description,enddate,seen) 
                values ('0','$date','$txtfnreserve','$txtsdatereserve','$payment7','$txt_reserveref','0', '".$_SESSION['userid']."','New','$txtreserve''$txttitle','$txtrdesc','$txtedatereserve','0')") or die('Error: ' . mysqli_error($con));
            }
        }
        else{
            if($payment7 == "Cash"){
                $query = mysqli_query($con,"INSERT INTO tblreserve (reserve_no,date,fullname,startdate,payment,ref_no,amount,residentid,status,req_type,title,description,enddate,seen) 
                values ('0','$date','$txtfnreserve','$txtsdatereserve','$payment7','0','0', '".$_SESSION['userid']."','New','$txtreserve','$txttitle','$txtrdesc','$txtedatereserve','0')") or die('Error: ' . mysqli_error($con));
            }elseif ($payment7 == "Gcash"){
                $query = mysqli_query($con,"INSERT INTO tblreserve (reserve_no,date,fullname,startdate,payment,ref_no,amount,residentid,status,req_type,title,description,enddate,seen) 
                values ('0','$date','$txtfnreserve','$txtsdatereserve','$payment7','$txt_reserveref','0', '".$_SESSION['userid']."','New','$txtreserve','$txttitle','$txtrdesc','$txtedatereserve','0')") or die('Error: ' . mysqli_error($con));
            }
        }
        if ($query){
                $last_id = mysqli_insert_id($con);
                if($last_id){
                    $user_id = $last_id;
                    $sql = "UPDATE tblreserve SET reserve_no = '".$user_id."' WHERE id = '".$last_id."'";
                    $res = mysqli_query($con, $sql);
                }
            }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }

    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }

}

//Admin Clubhouse Reservation
if(isset($_POST['btn_adminreserve'])){
    $date = date('Y/m/d');
    $txtadminfn = $_POST['txtadminfn'];
    $txttitle = $_POST['txttitle'];
    $txtrdesc = $_POST['txtrdesc'];
    $txtsdatereserve = $_POST['txtsdatereserve'];
    $txtedatereserve = $_POST['txtedatereserve'];
    $adminamount = $_POST['adminamount'];
    $adminpayment = $_POST['adminpayment'];
    $txtadminresref = $_POST['txtadminresref'];

    if($num_rows == 0){
        if($_SESSION['role'] == "Administrator")
            {
                if($adminpayment == "Cash"){
                    $query = mysqli_query($con,"INSERT INTO tblreserve (reserve_no,fullname,startdate,payment,ref_no,amount,residentid,status,req_type,title,description,enddate,date) 
                    values ('0','$txtadminfn','$txtsdatereserve','$adminpayment','0','$adminamount', '0','Approved','Clubhouse Reservation','$txttitle','$txtrdesc','$txtedatereserve','$date')") or die('Error: ' . mysqli_error($con));
                }elseif ($adminpayment == "Gcash"){
                    $query = mysqli_query($con,"INSERT INTO tblreserve (reserve_no,fullname,startdate,payment,ref_no,amount,residentid,status,req_type,title,description,enddate,date) 
                    values ('0','$txtadminfn','$txtsdatereserve','$adminpayment','$txtadminresref', '$adminamount','0','Approved','Clubhouse Reservation','$txttitle','$txtrdesc','$txtedatereserve','$date')") or die('Error: ' . mysqli_error($con));
                }
            }
            if ($query){
                $last_id = mysqli_insert_id($con);
                if($last_id){
                    $user_id = $last_id;
                    $sql = "UPDATE tblreserve SET reserve_no = '".$user_id."' WHERE id = '".$last_id."'";
                    $res = mysqli_query($con, $sql);
                }
            }
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }

    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }

}

//For Building Permit Approve
if(isset($_POST['btn_approve']))
{
    $txt_id = $_POST['hidden_id'];
    $date = $_POST['date'];
    $txt_amount = $_POST['txt_amount'];

    $approve_query = mysqli_query($con,"UPDATE tblbuilding set date = '".$date."', amount = '".$txt_amount."', status='Approved' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

    if($approve_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Memorandum Approve
if(isset($_POST['btn_approvememo']))
{
    $txtmemoid = $_POST['hidden_idmemo'];
    $txtmemoamount = $_POST['txtmemoamount'];

    $approve_query = mysqli_query($con,"UPDATE tblmemo set amount = '".$txtmemoamount."', status='Approved' where id = '".$txtmemoid."' ") or die('Error: ' . mysqli_error($con));

    if($approve_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Solicitation Approve
if(isset($_POST['btn_approvesolicit']))
{
    $txtsolicitid = $_POST['hidden_idsolicit'];
    $txtsolicitamount = $_POST['txtsolicitamount'];

    $approve_query = mysqli_query($con,"UPDATE tblsolicit set amount = '".$txtsolicitamount."', status='Approved' where id = '".$txtsolicitid."' ") or die('Error: ' . mysqli_error($con));

    if($approve_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For ID Application Approve
if(isset($_POST['btn_approveid']))
{
    $txt_idappli = $_POST['hidden_idappli'];
    $txt_idamount = $_POST['txt_idamount'];

    $approve_query = mysqli_query($con,"UPDATE tblid set amount = '".$txt_idamount."', status='Approved' where id = '".$txt_idappli."' ") or die('Error: ' . mysqli_error($con));

    if($approve_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Car Sticker Approve
if(isset($_POST['btn_approvesticker']))
{
    $txt_stickerid = $_POST['hidden_stickerid'];
    $txt_stickeramount = $_POST['txt_stickeramount'];

    $approve_query = mysqli_query($con,"UPDATE tblsticker set amount = '".$txt_stickeramount."', status='Approved' where id = '".$txt_stickerid."' ") or die('Error: ' . mysqli_error($con));

    if($approve_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Monthly Due  Approve
if(isset($_POST['btn_approvemonthly']))
{
    $txt_monthlyid = $_POST['hidden_monthlyid'];
    $txt_monthlyamount = $_POST['txt_monthlyamount'];

    $approve_query = mysqli_query($con,"UPDATE tblmonthly set amount = '".$txt_monthlyamount."', status='Approved' where id = '".$txt_monthlyid."' ") or die('Error: ' . mysqli_error($con));

    if($approve_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Clubhouse Reservation Approve
if(isset($_POST['btn_approvereserve']))
{
    $hidden_idreserve = $_POST['hidden_idreserve'];
    $txt_reserveamount = $_POST['txt_reserveamount'];

    $approve_query = mysqli_query($con,"UPDATE tblreserve set amount = '".$txt_reserveamount."', status='Approved' where id = '".$hidden_idreserve."' ") or die('Error: ' . mysqli_error($con));

    if($approve_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Building Permit Disapprove
if(isset($_POST['btn_disapprove']))
{

    $txt_id = $_POST['hidden_id'];
    $disapprove_query = mysqli_query($con,"UPDATE tblbuilding set status='Disapproved' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

    if($disapprove_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Memorandum Disapprove
if(isset($_POST['btnmemodisapprove']))
{

    $txtmemoid = $_POST['hidden_idmemo'];
    $disapprove_query = mysqli_query($con,"UPDATE tblmemo set status='Disapproved' where id = '".$txtmemoid."' ") or die('Error: ' . mysqli_error($con));

    if($disapprove_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Solicitation Disapprove
if(isset($_POST['btnsolicitdisapprove']))
{

    $txtsolicitid = $_POST['hidden_idsolicit'];
    $disapprove_query = mysqli_query($con,"UPDATE tblsolicit set status='Disapproved' where id = '".$txtsolicitid."' ") or die('Error: ' . mysqli_error($con));

    if($disapprove_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For ID Application Disapprove
if(isset($_POST['btn_disapproveid']))
{

    $txtidappli = $_POST['hidden_idappli'];
    $disapprove_query = mysqli_query($con,"UPDATE tblid set status='Disapproved' where id = '".$txtidappli."' ") or die('Error: ' . mysqli_error($con));

    if($disapprove_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Car Sticker Disapprove
if(isset($_POST['btn_disapprovesticker']))
{

    $txtstickerid = $_POST['hidden_stickerid'];
    $disapprove_query = mysqli_query($con,"UPDATE tblsticker set status='Disapproved' where id = '".$txtstickerid."' ") or die('Error: ' . mysqli_error($con));

    if($disapprove_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Monthly Due Disapprove
if(isset($_POST['btn_disapprovemonthly']))
{

    $txtmonthlyid = $_POST['hidden_monthlyid'];
    $disapprove_query = mysqli_query($con,"UPDATE tblmonthly set status='Disapproved' where id = '".$txtmonthlyid."' ") or die('Error: ' . mysqli_error($con));

    if($disapprove_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Clubhouse Reservation Disapprove
if(isset($_POST['btn_disapprovereserve']))
{

    $hidden_idreserve = $_POST['hidden_idreserve'];
    $disapprove_query = mysqli_query($con,"UPDATE tblmonthly set status='Disapproved' where id = '".$hidden_idreserve."' ") or die('Error: ' . mysqli_error($con));

    if($disapprove_query == true){
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Building Permit Save
if(isset($_POST['btn_save']))
{
    $txt_id = $_POST['hidden_id'];
    $txt_editpermit = $_POST['txt_editpermit'];
    $editdate = $_POST['editdate'];
    $txt_edit_amount = $_POST['txt_edit_amount'];

    $chk = mysqli_query($con,"select * from tblbuilding where id = '".$txt_id."' ");
        while($row = mysqli_fetch_array($chk)){
        $amount = $row["amount"];
        $balance += $txt_edit_amount;
        $balance -= $amount;
            $update_query = mysqli_query($con,"UPDATE tblbuilding set permit_no= '".$txt_editpermit."', date = '".$editdate."', amount = '".$txt_edit_amount."' , balance = '".$balance."' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

            if(isset($_SESSION['role'])){
                $action = 'Update Building Permit with permit number of '.$txt_editpermit;
                $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
            }

            if($update_query == true){
                $_SESSION['edited'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
}

//For Memorandum Save
if(isset($_POST['btn_reqsave']))
{
    $txtmemoid = $_POST['hidden_idmemo'];
    $txt_editmemo = $_POST['txt_editmemo'];
    $editdate = $_POST['editdatememo'];
    $txt_edit_amount = $_POST['txt_editamountmemo'];

    $update_query = mysqli_query($con,"UPDATE tblmemo set memo_id= '".$txt_editmemo."', date = '".$editdate."', amount = '".$txt_edit_amount."' where id = '".$txtmemoid."' ") or die('Error: ' . mysqli_error($con));

    if(isset($_SESSION['role'])){
        $action = 'Update Permit with permit number of '.$txt_editmemo;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    if($update_query == true){
        $_SESSION['edited'] = 1;
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Solicitation Save
if(isset($_POST['btn_solicitsave']))
{
    $txtsolicitid = $_POST['hidden_idsolicit'];
    $txt_editsol = $_POST['txt_editsol'];
    $editdate = $_POST['editdatesol'];
    $txt_edit_amount = $_POST['txt_editamountsol'];

    $update_query = mysqli_query($con,"UPDATE tblsolicit set solicit_no= '".$txt_editsol."', date = '".$editdate."', amount = '".$txt_edit_amount."' where id = '".$txtsolicitid."' ") or die('Error: ' . mysqli_error($con));

    if(isset($_SESSION['role'])){
        $action = 'Update Permit with permit number of '.$txt_editsol;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    if($update_query == true){
        $_SESSION['edited'] = 1;
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For ID Application Save
if(isset($_POST['btn_idsave']))
{
    $txtidappli = $_POST['hidden_idappli'];
    $txt_editid = $_POST['txt_editid'];
    $edit_iddate = $_POST['edit_iddate'];
    $txtedit_idamount = $_POST['txtedit_idamount'];

    $update_query = mysqli_query($con,"UPDATE tblid set id_no= '".$txt_editid."', date = '".$edit_iddate."', amount = '".$txtedit_idamount."' where id = '".$txtidappli."' ") or die('Error: ' . mysqli_error($con));

    if(isset($_SESSION['role'])){
        $action = 'Update Permit with permit number of '.$txt_editid;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    if($update_query == true){
        $_SESSION['edited'] = 1;
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Car Sticker Save
if(isset($_POST['btn_stickersave']))
{
    $txtstickerid= $_POST['hidden_stickerid'];
    $txt_editsticker = $_POST['txt_editsticker'];
    $editdatesticker = $_POST['editdatesticker'];
    $txt_editamountsticker = $_POST['txt_editamountsticker'];

    $update_query = mysqli_query($con,"UPDATE tblsticker set sticker_no= '".$txt_editsticker."', date = '".$editdatesticker."', amount = '".$txt_editamountsticker."' where id = '".$txtstickerid."' ") or die('Error: ' . mysqli_error($con));

    if(isset($_SESSION['role'])){
        $action = 'Update Car Sticker with sticker number of '.$txt_editsticker;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    if($update_query == true){
        $_SESSION['edited'] = 1;
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Monthly Due Save
if(isset($_POST['btn_monthlysave']))
{
    $txtmonthlyid= $_POST['hidden_monthlyid'];
    $txt_editmonthly = $_POST['txt_editmonthly'];
    $editdatemonthly = $_POST['editdatemonthly'];
    $txt_editamountmonthly = $_POST['txt_editamountmonthly'];

    $update_query = mysqli_query($con,"UPDATE tblmonthly set monthly_no= '".$txt_editmonthly."', date = '".$editdatemonthly."', month = '".$txt_editmonth."', amount = '".$txt_editamountmonthly."' where id = '".$txtmonthlyid."' ") or die('Error: ' . mysqli_error($con));

    if(isset($_SESSION['role'])){
        $action = 'Update monthly due with monthly number of '.$txt_editmonthly;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    if($update_query == true){
        $_SESSION['edited'] = 1;
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Clubhouse Reservation Save
if(isset($_POST['btn_reservesave']))
{
    $hidden_idreserve= $_POST['hidden_idreserve'];
    $txt_reserveno= $_POST['txt_reserveno'];
    $txtedit_title = $_POST['txtedit_title'];
    $txtedit_desc = $_POST['txtedit_desc'];
    $edit_sdate = $_POST['edit_sdate'];
    $edit_edate = $_POST['edit_edate'];

    $update_query = mysqli_query($con,"UPDATE tblreserve set reserve_no = '".$txt_reserveno."', title = '".$txtedit_title."', description = '".$txtedit_desc."', startdate = '".$edit_sdate."', enddate = '".$edit_edate."' where id = '".$hidden_idreserve."' ") or die('Error: ' . mysqli_error($con));

    if(isset($_SESSION['role'])){
        $action = 'Update clubhouse reservation with reservation number of '.$txt_reserveno;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    if($update_query == true){
        $_SESSION['edited'] = 1;
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

//For Building Permit Delete
if(isset($_POST['btn_delete']))
{
    if(isset($_POST['chk_delete']))
    {
        foreach($_POST['chk_delete'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblbuilding where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
        foreach($_POST['chk_deletememo'] as $value)
        {
            $delete_query2 = mysqli_query($con,"DELETE from tblmemo where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

//For Memorandum Delete
if(isset($_POST['btn_deletememo']))
{
    if(isset($_POST['chk_deletememo']))
    {
        foreach($_POST['chk_deletememo'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblmemo where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

//For Solicit Delete
if(isset($_POST['btn_deletesol']))
{
    if(isset($_POST['chk_deletesolicit']))
    {
        foreach($_POST['chk_deletesolicit'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblsolicit where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

//For ID Application Delete
if(isset($_POST['btn_deleteid']))
{
    if(isset($_POST['chk_deleteid']))
    {
        foreach($_POST['chk_deleteid'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblid where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

//For Sticker Delete
if(isset($_POST['btn_deletesticker']))
{
    if(isset($_POST['chk_deletesticker']))
    {
        foreach($_POST['chk_deletesticker'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblsticker where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

//For Monthly Due Delete
if(isset($_POST['btn_deletemonthly']))
{
    if(isset($_POST['chk_deletemonthly']))
    {
        foreach($_POST['chk_deletemonthly'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblmonthly where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

//For Clubhouse Reservation Delete
if(isset($_POST['btn_deletereserve']))
{
    if(isset($_POST['deleteModalreserve']))
    {
        foreach($_POST['deleteModalreserve'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblreserve where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}
?>