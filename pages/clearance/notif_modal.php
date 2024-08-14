<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        #alertpopover
        {
        display:block;
        position: absolute;
        bottom:50px;
        left:50px;
        }
        .wrap {
            display: table-cell;
            vertical-align: bottom;
            height: auto;
            width:400px;
        }
        .alert_default
        {
        color: #333333;
        background-color: #f2f2f2;
        border-color: #cccccc;
        }
    </style>
</head>
<body>
<div id="alertpopover">
    <div class="wrap">
     <div class="cont">

     </div>
    </div>
   </div> 
</body>
<script>
$(document).ready(function(){

	setInterval(function(){
	load_last_notification()
	}, 2000);
    
	function load_last_notification(){
        $.ajax({
		url:"notif.php",
		method:"POST",
		success:function(data){
		$('.cont').html(data);
		}
	})
    }
});
</script>
</html>