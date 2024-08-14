<?php
if(isset($_POST['btn_add'])){

    $txt_position = $_POST['txt_position'];
    $txt_cname = $_POST['txt_cname'];
    $txt_contact = $_POST['txt_contact'];
    $txt_address = $_POST['txt_address'];


    if(isset($_SESSION['role'])){
        $action = 'Added Official named '.$txt_cname;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    $q = mysqli_query($con,"SELECT * from tblofficial where sPosition = '".$txt_position."' ");
    $ct = mysqli_num_rows($q);

    if($ct == 0){
        $query = mysqli_query($con,"INSERT INTO tblofficial (sPosition,completeName,pcontact,paddress) 
        values ('$txt_position', '$txt_cname', '$txt_contact', '$txt_address')") or die('Error: ' . mysqli_error($con));
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


if(isset($_POST['btn_save']))
{
    $txt_id = $_POST['hidden_id'];
    $txt_edit_position = $_POST['txt_edit_position'];
    $txt_edit_cname = $_POST['txt_edit_cname'];
    $txt_edit_contact = $_POST['txt_edit_contact'];
    $txt_edit_address = $_POST['txt_edit_address'];


    if(isset($_SESSION['role'])){
        $action = 'Update Official named '.$txt_edit_position;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    $update_query = mysqli_query($con,"UPDATE tblofficial set sPosition = '".$txt_edit_position."', completeName = '".$txt_edit_cname."', pcontact = '".$txt_edit_contact."', paddress = '".$txt_edit_address."' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

    if($update_query == true){
        $_SESSION['edited'] = 1;
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}


if(isset($_POST['btn_delete']))
{
    if(isset($_POST['chk_delete']))
    {
        foreach($_POST['chk_delete'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblofficial where id = '$value' ") or die('Error: ' . mysqli_error($con));

            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}


?>
