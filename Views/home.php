<?php
 $obj = new PaymentValidate($_POST['email'], $_POST['password'], $_POST['confirm_Password'], $_Post['credit_card'], $_Post['cvv']);
 $obj->validate_email($email);
 $obj->validate_password($password);
 $obj->validate_credit($credit_card);
 $obj->validate_cvv($cvv);
 $errorEmail = $obj->erroremail;
 $errorPassword = $obj->error_password;
 $errorConfirmPassword = $obj->error_confirm_password;
 $errorCredit = $obj->error_credit_card;
 $errorCvv = $obj->error_cvv;
 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>payment</title>
	<link rel="stylesheet" type="text/css" href="../Static/css/home-style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="icon" type="image/png" href="logo.gif"/>
	<link rel="stylesheet" type="text/css" href="css/aos.css">
<script type="text/javascript" src="js/aos.js"></script>
  
	<!-- bs code JS -->
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!--productsection-links-->
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Chewy">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</head>
<body>
	 <header>
     <nav class="navbar">
  <span class="navbar-toggle" id="js-navbar-toggle">
  <svg width="24" height="24" viewBox="0 0 24 24">
  <path d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z"></path>
    </svg></span>
  <a href="#" class="logo"><img  class="ai" src="logo.gif" width="75">
    <h4 style="color: #007bff">shutterstock</h4>
  </a>
  <ul class="main-nav" id="js-menu">
    <li><a href="#" class="nav-links">Home</a></li>
    <li><a href="#" class="nav-links">About Us</a></li>
    <li><a href="#" class="nav-links">mission</a></li>
    <li><a href="#" class="nav-links">vision</a></li>
    <li><a href="#" class="nav-links">Blog</a></li>
    <li><a href="#" class="nav-links">Contact Us</a></li>
  </ul>
  <div name="search">
  <label class="search-box">
    <input type="text" />
    <span></span>
  </label> 
</div>
</nav>
<script type="text/javascript">
  let mainNav = document.getElementById('js-menu');
let navBarToggle = document.getElementById('js-navbar-toggle');

navBarToggle.addEventListener('click', function () {
    
    mainNav.classList.toggle('active');
});
</script>
  </header>

   <!--first section-->
   <section id="block">
    <div class="row">
        <div class="col-12">
           <div class="blck">
                         <div class="container">
                <span class="text1">Welcome To</span>
                <span class="text2">our store</span>
              </div>
           </div>        
        </div>
    </div>
  </section> 

<div class="content">
    <form method="$_POST" action="<?php echo $_SERVER["PHP_SELF"]?>" >
        
        <div>
            <input type="email" id="f4" placeholder=" ">
            <p class = "error"><?php echo $errorEmail;?></p>
            <label for="f4">email</label>
        </div>

        <div>
            <input type="password" id="f3" pattern="[A-Za-z0-9]{6,}" placeholder=" ">
            <p class = "error"><?php echo $errorPassword;?></p>
            <label for="f3">Password field</label>
            
        </div>
        <div>
            <input type="password" id="f3" pattern="[A-Za-z0-9]{6,}" placeholder=" ">
            <p class = "error"><?php echo $errorConfirmPassword;?></p>
            <label for="f3">confirm_Password field</label>
        </div>

        <div>
            <input type="text" id="f5" pattern="[0-9]{13,16}" placeholder=" ">
            <p class = "error"><?php echo $errorCredit;?></p>
            <label for="f5">Credit Card</label>
        </div>
        <div>
            <textarea id="f6" placeholder=" " required></textarea>
            <p class = "error"><?php echo $errorCvv;?></p>
            <label for="f6">cvv</label>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
<!--footer-->
<!-- FOOTER START -->
<section id="end">
<div class="footer">
  <div class="contain">
  <div class="col">
    <h1>Company</h1>
    <ul>
      <li>About</li>
      <li>Mission</li>
      <li>Services</li>
      <li>Social</li>
      <li>Get in touch</li>
    </ul>
  </div>
  <div class="col">
    <h1>Products</h1>
    <ul>
      <li>Robots</li>
      <li>AI system</li>
      <li>Services</li>
      <li>machine learn</li>
      <li>Neurolink</li>
    </ul>
  </div>
  <div class="col">
    <h1>Accounts</h1>
    <ul>
      <li>About</li>
      <li>Mission</li>
      <li>Services</li>
      <li>Social</li>
      <li>Get in touch</li>
    </ul>
  </div>
  <div class="col">
    <h1>Resources</h1>
    <ul>
      <li>Webmail</li>
      <li>Redeem code</li>
      <li>WHOIS lookup</li>
      <li>Site map</li>
      <li>Web templates</li>
      <li>Email templates</li>
    </ul>
  </div>
  <div class="col">
    <h1>Support</h1>
    <ul>
      <li>Contact us</li>
      <li>Web chat</li>
      <li>Open ticket</li>
    </ul>
  </div>
  <div class="col social">
    <h1>Social</h1>
    <ul>
      <li></li>
      <li><img src="images/face.png" width="32" style="width: 32px;"></li>
      <li><img src="images/in.png" width="32" style="width: 32px;"></li>
    </ul>
  </div>
<div class="clearfix"></div>
</div>
 
    <div class="copy_text">
      <p>Copyright &copy; 2021</p>
      
    </div>
   
</div>
</section>
<!-- END OF FOOTER -->
</body>
</html>

