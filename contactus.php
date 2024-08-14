<?php
include 'connection.php';

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $inquiry = $_POST['inquiry'];
    
    $sql = "INSERT INTO `tblinquiries`(`fullname`, `email`, `subject`, `inquiry`) VALUES ('$fullname','$email','$subject','$inquiry')";
    $result = mysqli_query($con, $sql);
        if ($result) {
            echo 'Inquiry has been sent successfully';
            header('location:https://smclwebsystem.000webhostapp.com/index.html');
        } else {
            $error;
            echo '<script>alert("Data Not Inserted")</script>';
        }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact Us Page</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Map and Contact Us -->
	<section class="text-gray-600 body-font relative" id="smclmap">
	   <form method="post">
	  <div class="absolute inset-0 bg-gray-300">
	    <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4837.042442055298!2d120.97403221149138!3d14.3342297834832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d5a2ca270f3b%3A0x4d2e8061b523cda2!2sSan%20Marino%20Classic!5e1!3m2!1sen!2sph!4v1693358003057!5m2!1sen!2sph" style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe> 
	  </div>
	  <div class="container px-5 py-24 mx-auto flex">
	    <div class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
	      <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Contact Us</h2>
	      <p class="leading-relaxed mb-5 text-gray-600">
	      	Send your inquiries | complaints | requests here. 
	      </p>
	     
	      <div class="relative mb-4">
	          
	        <label for="fullname" class="leading-7 text-sm text-gray-600">Full Name</label>
	        <input type="text" id="funame" name="fullname" class="form-control w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
	      </div>
	      <div class="relative mb-4">
	        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
	        <input type="email" id="email" name="email" class="form-control w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
	      </div>
	      <div class="relative mb-4">
	        <label for="subject" class="leading-7 text-sm text-gray-600">Subject</label>
	        <input type="text" id="subj" name="subject" class="form-control w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
	      </div>
	      <div class="relative mb-4">
	        <label for="inquiry" class="leading-7 text-sm text-gray-600" >Inquiry</label>
	        <textarea id="inquiry" name="inquiry" class="form-control w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
	      </div>
	      <button class="text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg" name="submit" id="submit">Send</button>
	      <p class="text-xs text-gray-500 mt-3">For urgent queries you may call our office number: +63-987-5000-980</p>
	    </div>
	  </div>
	  </form>
	</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>	
</body>
</html>