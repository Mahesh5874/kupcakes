<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>KupCakes | HOME </title>
	<link rel="icon" type="image/png" href="css\images\favicon.png">
  <link rel="manifest" href="manifest.json">
    <meta name="viewport" content="width=device-width, intial-scale=1" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="index.css?version=699">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    
    
      <style type="text/css">
    body{
      margin: 0;
      padding: 0;
    }

    .slider {
      width: 100%;
      height: 650px;
      margin: 0px;
      box-sizing: border-box;
      overflow: hidden;
      

    }

    img {
      width: 100%;
      height: 650px;
      animation: ani 10s linear;

    }

    @keyframes ani {
      0% {
        transform: scale(1.3);
      }
      10% {
        transform: scale(1);
      }
      100% {
        transform: scale(1);
      }
    }
  </style>
</head>
<body>
	
	<nav>
	<div class="cover">
     <div class="header">
          <h2 class="logo"><span class="blueLogo">Kup</span><span class="PinkLogo">Cakes</span></h2>
          <input type="checkbox" id="chk">
          <label for="chk" class="show-menu-btn">
            <i class="fas fa-bars"></i>
          </label>

          <ul class="menu">
            <a href="index.php" id="home">Home</a>
            <a href="about_us2.html" id="aboutus">About</a>
            <a href="menu.php" id="services">menu</a>
            
            <label for="chk" class="hide-menu-btn">
              <i class="fas fa-times"></i>
            </label>
          </ul>
     </div>
    </div>	    
  </nav>
  <div class="cover1"></div>
  <div class="backimg">
    <div class="slider">

      <div id="img">
        <img src="c.jpg">
      </div>

    </div>
  </div>
  <div class="team-section">
    <div class="inner-width">
      <h1>Meet Our Chef's</h1>
      <div class="pers">


        <div class="pe">
          <img src="chef/p1.jpg" alt="">
          <div class="p-name">Rajeev Malhotra</div>
          <div class="p-des"></div>
          <div class="p-sm">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>

        <div class="pe">
          <img src="chef/p2.jpg" alt="">
          <div class="p-name">Rajan Gupta</div>
          <div class="p-des"></div>
          <div class="p-sm">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>

        <div class="pe">
          <img src="chef/p3.jpg" alt="">
          <div class="p-name">Jovita Rodrigues</div>
          <div class="p-des"></div>
          <div class="p-sm">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>

      </div>

    </div>
  </div>

    <div class="testimonials2">
      <div class="inner2">
        <h1>Testimonials</h1>
        <div class="border2"></div>

        <div class="row2">
          <div class="col2">
            <div class="testimonial2">
              <img src="p1.png" alt="">
              <div class="name2">Tejas</div>
              <div class="stars2">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
              </p>
            </div>
          </div>

          <div class="col2">
            <div class="testimonial2">
              <img src="p2.png" alt="">
              <div class="name2">Piyush</div>
              <div class="stars2">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
              </p>
            </div>
          </div>

          <div class="col2">
            <div class="testimonial2">
              <img src="p3.png" alt="">
              <div class="name2">Jessica
              </div>
              <div class="stars2">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
              </div>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="contact-section3" id="contactus">
      <div class="inner-width3">
        <h1>Get in touch with us</h1>
        <input type="text" class="name3" placeholder="Your Name">
        <input type="email" class="email3" placeholder="Your Email">
        <textarea rows="1" placeholder="Message" class="message3"></textarea>
        <button>Get in touch</button>
      </div>
    </div>
    <div class="footer">
    <div id="map"></div>
      <!-- Replace the value of the key parameter with your own API key. -->
    <div class="info">

      <h1>REACH US</h1>
      <h2>Address:</h2>
      <p>St. Francis Institute of Technology<br>Sardar Vallabhai Patel Rd, Near Bhagwati Hospital, Mount Poinsur, Borivali West, Mumbai, Maharashtra 400103</p>
      <h2>Phone number:</h2>
      <p>+91 9004780857/9876543210</p>
      <h2>Our Centres:</h2>
      <p><a href="contact.xml">Click here to get the list of our centres in INDIA</a></p>
      <div class="p-sm1">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
    </div>
    </div>
    </div>

<script type="text/javascript">
      var images = ['a.jpg', 'b.jpg', 'c.jpg'];

      var x = 0;

      var imgs = document.getElementById('img');

      setInterval(slider, 2000);


      function slider() {

        if (x < images.length) {
          x = x + 1;
        } else {
          x = 1;
        }


        imgs.innerHTML = "<img src=" + images[x - 1] + ">";


      }

    </script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa75D5faK3aPSFQ7o1AH9RiAJYX_VA1T4&callback=initMap">
</script>

<script type="text/javascript">
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: 19.18117, lng: 72.854201};
  var uluru1 = {lat: 25, lng: 80};
  // The map, centered at Uluru
  var map = new google.maps.Map(document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
  var marker1 = new google.maps.Marker({position: uluru1, map: map});
}
</script>
<?php

if(!isset($_SESSION['username'])){
  echo "<div class='user_div' ><form name='logout' class='user' action='login.html' method='post'><input type='submit' value='login' id='login' class='btn'></form></div>";
}
else{
  echo "<div class='user_div'><div class='login_name'>".$_SESSION['username']."<br>";
  echo $_SESSION['email']."</div><div class='user_div'><form name='logout' class='user' action='logout.php' method='post'><input type='submit' value='logout' id='logout' class='btn'></form></div>";
}
?>
</body>
</html>
