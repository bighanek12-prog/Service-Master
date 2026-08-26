<?php



 include('navbar.php');
// The contact Us Form wont work with Local Host but it will work on Live Server
if(isset($_REQUEST['submit'])) {
 // Checking for Empty Fields
 if(($_REQUEST['name'] == "") || ($_REQUEST['subject'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['message'] == "")){
  // msg displayed if required field missing

  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Please fill in all  fields </div>';
  
 } else {
 $name = $_REQUEST['name'];
 $subject = $_REQUEST['subject'];
 $email = $_REQUEST['email'];
 $message = $_REQUEST['message'];

 $mailTo = "kunalbighane@gmail.com";
 $headers = "From: ". $email;
 $txt = "You have received an email from ". $name. ".\n\n".$message;
  // mail($mailTo, $subject, $txt, $headers);
 $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Sent Successfully </div>';

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Service Master</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

  
  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Contact Us
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
        <form action="" method="POST">
          <div>
          <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div>
              <!-- <input type="text" placeholder="Phone Number" /> -->
              <input type="text" class="form-control" name="subject" placeholder="Subject">              
            </div>
            <div>
              <!-- <input type="email" placeholder="Email" /> -->
              <input type="email" class="form-control" name="email" placeholder="E-mail">
            </div>
            <div>
              <input type="text" class="message-box" name="message" placeholder="Message" />
              <!-- <textarea class="form-control" name="message" placeholder="How can we help you?" style="height:150px;"></textarea> -->
            </div>
            <div class="d-flex ">
              <button type="submit" value="Send" name="submit" >
                SEND
              </button>
            </div>
            <?php if(isset($msg)) {echo $msg; } ?>
          </form>
        </div>
        <div class="col-md-6">
          <strong>Branch:</strong><br>
          Service Master Pvt Ltd,<br>
          Om Nagar , Navi Mumbai,
          Maharashtra - 441414<br>
          Phone:+00987654321<br>
          Email: kunalbighane@gmail.com<br>
          
          <br> <br> <br> <br>
          <strong>Headquater:</strong><br>
          Service Master Pvt Ltd,<br>
           Sakkardara Sqr , Nagpur,
          Maharashtra - 440009<br>
          Phone: +00123456789<br>
          Email: kunalbighane@gmail.com<br>
          
        </div>
        
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->


  <!-- footer section -->
  <?php
  include('footer.php');
    ?>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>
</html>

