<?php
include 'config.php';
// <?php
// include 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])){

 $name = $_POST['name'];
  $email = $_POST['email'];
  $phone =$_POST['subject'];
  $message =$_POST['message'];

$sql = "INSERT INTO service (name, email, subject, message)
          VALUES ('$name', '$email', '$subject', '$message')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        // $_SESSION['user'] = $username;
        echo '<script language="javascript">';
        echo 'alert("Received Your Message"); "';
        echo '</script>';
        
        $name = "";
        $email = "";
        $subject = "";
        $message = "";
        // header("Location: index.php");
      } else {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
      }


	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'faizanali88980@gmail.com';
	$mail->Password = 'ogzwjcnowoyazdsm';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;

	$mail->setFrom('faizanali88980@gmail.com');
	$mail->addAddress($_POST['email']);
	$mail->isHTML(true);
	$mail->Subject ='Message from: '.$_POST["name"];
	$mail->Body = $_POST['message'];
	$mail->send();

	 echo '<script language="javascript">';
        echo 'alert("Message Send"); location.href="service1.php"';
        echo '</script>';

}	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PAINT SHOP</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-dark py-2 pe-3 border-end border-white" href=""><i class="bi bi-telephone text-secondary me-2"></i>+91 987654321</a>
                        <a class="text-dark py-2 px-3" href=""><i class="bi bi-envelope text-secondary me-2"></i>faizanali@gmailcom</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-body py-2 px-3 border-end border-white" href="">
                            <i class="fab fa-facebook-f text-secondary"></i>
                        </a>
                        <a class="text-body py-2 px-3 border-end border-white" href="">
                            <i class="fab fa-twitter text-secondary"></i>
                        </a>
                        <a class="text-body py-2 px-3 border-end border-white" href="">
                            <i class="fab fa-linkedin-in text-secondary"></i>
                        </a>
                        <a class="text-body py-2 px-3 border-end border-white" href="">
                            <i class="fab fa-instagram text-secondary"></i>
                        </a>
                        <a class="text-body py-2 ps-3" href="">
                            <i class="fab fa-youtube text-secondary"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm px-5 py-3 py-lg-0">
        <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-paint-roller text-secondary me-3"></i>Paint Shop</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4 border-end border-5 border-primary">
                <a href="index1.php" class="nav-item nav-link">Home</a>
                <a href="about1.php" class="nav-item nav-link">About</a>
                <a href="service1.php" class="nav-item nav-link active">Service</a>
                <div class="nav-item dropdown">
                    <a href="product1.php" class="nav-link nav-item" >Products</a>
                    <div class="dropdown-menu m-0">
                        <!-- <a href="blog.html" class="dropdown-item">Blog Grid</a>
                        <a href="detail.html" class="dropdown-item">Blog Detail</a>
                        <a href="team.html" class="dropdown-item">The Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a> -->
                    </div>
                </div>
                <a href="contact1.php" class="nav-item nav-link">Contact</a>
            </div>
            <div class="d-none d-lg-flex align-items-center ps-4">
                <!-- <i class="fa fa-2x fa-mobile-alt text-secondary me-3"></i> -->
                <div>
                    <h5 class="text-primary mb-1"><a href="index.php">Logout</a></h5>
                    <!-- <h6 class="text-light m-0">+012 345 6789</h6> -->
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 bg-hero" style="margin-bottom: 90px;">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-1 text-dark">Our Services</h1>
                    <div class="pt-2">
                        <a href="" class="btn btn-secondary rounded-pill py-2 px-4 mx-2">Home</a>
                        <a href="" class="btn btn-secondary rounded-pill py-2 px-4 mx-2">Our Services</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h1 class="display-5">Professional Painting Services</h1>
                <hr class="w-25 mx-auto text-primary" style="opacity: 1;">
            </div>
            <div class="row gy-4 gx-3">
                <div class="col-lg-4 col-md-6 pt-5">
                    <div class="service-item d-flex flex-column align-items-center justify-content-center text-center p-5 pt-0">
                        <div class="service-icon p-3">
                            <div><i class="fa fa-2x fa-paint-brush"></i></div>
                        </div>
                        <h3 class="mt-5">Regular Painting</h3>
                        <!-- <a class="btn shadow-none text-secondary" href="">View Detail<i class="bi bi-arrow-right ms-1"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5">
                    <div class="service-item d-flex flex-column align-items-center justify-content-center text-center p-5 pt-0">
                        <div class="service-icon p-3">
                            <div><i class="fa fa-2x fa-paint-roller"></i></div>
                        </div>
                        <h3 class="mt-5">Wall Painting</h3>
                        <!-- <a class="btn shadow-none text-secondary" href="">View Detail<i class="bi bi-arrow-right ms-1"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5">
                    <div class="service-item d-flex flex-column align-items-center justify-content-center text-center p-5 pt-0">
                        <div class="service-icon p-3">
                            <div><i class="fa fa-2x fa-brush"></i></div>
                        </div>
                        <h3 class="mt-5">Floor Coating</h3>
                        <!-- <a class="btn shadow-none text-secondary" href="">View Detail<i class="bi bi-arrow-right ms-1"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5">
                    <div class="service-item d-flex flex-column align-items-center justify-content-center text-center p-5 pt-0">
                        <div class="service-icon p-3">
                            <div><i class="fa fa-2x fa-eraser"></i></div>
                        </div>
                        <h3 class="mt-5">Graffiti Removal</h3>
                        <!-- <a class="btn shadow-none text-secondary" href="">View Detail<i class="bi bi-arrow-right ms-1"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5">
                    <div class="service-item d-flex flex-column align-items-center justify-content-center text-center p-5 pt-0">
                        <div class="service-icon p-3">
                            <div><i class="fa fa-2x fa-spray-can"></i></div>
                        </div>
                        <h3 class="mt-5">Mildew Removal</h3>
                        <!-- <a class="btn shadow-none text-secondary" href="">View Detail<i class="bi bi-arrow-right ms-1"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5">
                    <div class="service-item d-flex flex-column align-items-center justify-content-center text-center p-5 pt-0">
                        <div class="service-icon p-3">
                            <div><i class="fa fa-2x fa-city"></i></div>
                        </div>
                        <h3 class="mt-5">Window Washing</h3>
                        <!-- <a class="btn shadow-none text-secondary" href="">View Detail<i class="bi bi-arrow-right ms-1"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h1 class="display-5">Please Drop Us a Message for Further Information</h1>
                <hr class="w-25 mx-auto text-primary" style="opacity: 1;">
            </div>
    </div>
    </div>
    <div class="row justify-content-center position-relative" style="margin-top: -200px; z-index: 1;">
        <div class="col-lg-8">
            <div class="bg-primary p-5 m-5 mb-0">
                <form method="POST">
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control bg-light border-0" placeholder="Your Name" name="name" style="height: 55px;">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" class="form-control bg-light border-0" placeholder="Your Email" name="email" style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control bg-light border-0" placeholder="Subject" name="subject" style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <input class="form-control bg-light border-0" rows="5" name="message" placeholder="Message">
                        </div>
                       
                        <div class="col-12">
                        <button class="btn btn-secondary w-100 py-3" name="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Testimonial Start -->
    <div class="container-fluid bg-primary bg-testimonial py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row g-0 justify-content-end">
                <div class="col-lg-6">
                    <h1 class="display-5 mb-4">Testimonials</h1>
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item">
                            <p class="fs-4 fw-normal"><i class="fa fa-quote-left text-secondary me-3"></i>Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat dolor rebum sit ipsum.</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid p-1 bg-secondary" src="img/testimonial-1.jpg" alt="">
                                <div class="ps-3">
                                    <h3>Anabella</h3>
                                    <span class="text-uppercase">Senior Associate</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <p class="fs-4 fw-normal"><i class="fa fa-quote-left text-secondary me-3"></i>Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat dolor rebum sit ipsum.</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid p-1 bg-secondary" src="img/testimonial-2.jpg" alt="">
                                <div class="ps-3">
                                    <h3>Steve</h3>
                                    <span class="text-uppercase">Operator</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row gx-0">
                <div class="col-lg-6" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about-2.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 my-lg-5 py-lg-5">
                    <div class="about-end bg-primary p-5">
                        <h1 class="display-5 mb-4">Why Choose Us?</h1>
                        <p>Tempor erat elitr at rebum at at clita. Diam dolor diam ipsum et, tempor sit sit diam amet et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor magna dolore erat amet </p>
                        <a href="" class="btn btn-secondary rounded-pill py-md-3 px-md-5 mt-4">Get A Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Call To Action Start -->
    <!-- <div class="container-fluid bg-primary bg-call-to-action py-5" style="margin-top: 90px;">
        <div class="container py-5">
            <div class="row g-0 justify-content-start">
                <div class="col-lg-6">
                    <h1 class="display-5 mb-4">Do You Have Any Project?</h1>
                    <p class="fs-4 fw-normal">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat dolor rebum sit ipsum.</p>
                    <a href="" class="btn btn-secondary rounded-pill py-md-3 px-md-5 mt-4">Contact Us</a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Call To Action Start -->
    

    <!-- Footer Start -->
    <div class="container-fluid bg-dark bg-footer text-light py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary">Get In Touch</h4>
                    <hr class="w-25 text-secondary mb-4" style="opacity: 1;">
                    <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>faizanali@gmail.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary me-3"></i>+91 987654321</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary">Our Services</h4>
                    <hr class="w-25 text-secondary mb-4" style="opacity: 1;">
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Regular Painting</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Wall Painting</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Floor Coating</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Graffiti Removal</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Mildew Removal</a>
                        <a class="text-light" href="#"><i class="fa fa-angle-right me-2"></i>Window Washing</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary">Quick Links</h4>
                    <hr class="w-25 text-secondary mb-4" style="opacity: 1;">
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Our Services</a>
                        <!-- <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Meet The Team</a> -->
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Products</a>
                        <a class="text-light" href="#"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary">Newsletter</h4>
                    <hr class="w-25 text-secondary mb-4" style="opacity: 1;">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-3 border-0" placeholder="Your Email">
                            <button class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                    <h6 class="text-primary mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-primary text-dark py-4">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">Copyright &copy; <a class="text-dark fw-bold" href="#">Your Site Name</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-dark fw-bold" href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-secondary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>