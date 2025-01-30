<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="home.css">
    <title>AURA</title>
 
       
</head>

<body>
    
    <!--shiriti navigimit-->
<nav>

    <label class="logo">AURA</label>
    <ul>
        <li><a href="home.html">Home</a></li>
        <li><a href="aboutUs.html">About Us</a></li>
        <li><a href="products.html">Products</a></li>
        <li><a href="sales.html">Sales</a></li>
        <li><a href="contactUs.html">Contact Us</a></li>
        <li><a href="login.php"><i class="fa fa-user-plus"></i> </a></li>
    </ul>
</nav>

<div class="sidebar-toggle">
    <i class="fa fa-arrow-left"></i> 
</div>


<div class="sidebar">
    <h2>Side Menu</h2>
    <ul>
        <li><a href="home.html"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="aboutUs.html"><i class="fa fa-user"></i> About Us</a></li>
        <li><a href="contactUs.html"><i class="fa fa-envelope"></i> Contact</a></li>
        <li><a href="sales.html"><i class="fa fa-gift"></i> Sales</a></li>
                    <li><a href="products.html">Makeup Products</a></li>
                </ul>
                <a href="Logout.php" class="sidebar-btn">Log out</a>

            </div>
        </li>
    </ul>
</div>
<!--Pjesa kryesore e faqes-->
<div class="hero">
    <div class="container">
        <div class="hero-elements">
            <h1 class="title">Holiday Wonderlights Limited Edition </h1>
        </div>
    </div>
</div>


<div class="product-grid">

    <div class="product-box">
        <img src="Makeup/eyeshadow.png" alt="Product1" class="product-image">
        <h3 class="product-title">Eyeshadow</h3>
        <button class="product-button">View Details</button>
    </div>

    <div class="product-box">
        <img src="Makeup/paletteNyx.png" alt="Product2" class="product-image">
        <h3 class="product-title">Contour</h3>
        <button class="product-button">View Details</button>
    </div>

    <div class="product-box">
        <img src="Makeup/lip.liner.mario.png" alt="Product3" class="product-image">
        <h3 class="product-title">LipLiner</h3>
        <button class="product-button">View Details</button>
    </div>

    <div class="product-box">
        <img src="Makeup/mascaraClinique.png" alt="Product4" class="product-image">
        <h3 class="product-title">Mascara</h3>
        <button class="product-button">View Details</button>
    </div>

    <div class="product-box">
        <img src="Makeup/benefit.png" alt="Product5" class="product-image">
        <h3 class="product-title">Brow Setter</h3>
        <button class="product-button">View Details</button>
    </div>

    <div class="product-box">
        <img src="Makeup/fenty.png" alt="Product6" class="product-image">
        <h3 class="product-title">Highlighter</h3>
        <button class="product-button">View Details</button>
    </div>


</div>


<div id="kontenti">
    <header>
    <img name="mySlide" id="slideshow" />
    </header>
    </div>


    

<div class="Products" id="Products">
    <div class="container">
        <h1>Products</h1>

        <div class="card">
            <div class="front">
                <img src="Makeup/ysl.webp" alt="lips products">
                <h2>Lipsticks</h2>
            </div>
        </div>

        <div class="card">
            <div class="front">
                <img src="Makeup/huda.webp" alt="Face products">
                <h2>Baking Powders</h2>
            </div>
        </div>

        <div class="card">
            <div class="front">
                <img src="Makeup/rare.webp" alt="Face products">
                <h2>Blushes</h2>
            </div>
        </div>

        <div class="card">
            <div class="front">
                <img src="Makeup/foundation.webp" alt="Face products">
                <h2>Foundations</h2>
            </div>
        </div>
    </div>
</div>



<footer>

    <div class="footer-container">
  
      <div class="footer-info">
  
        <h4>AURA - Cosmetics</h4>
  
        <p><i class = "fa fa-map-marker"></i><a href="Mother Teresa, Gjakova, Kosovo">Mother Teresa, Gjakova, Kosovo</a></p>
  
        <p><i class = "fa fa-phone"></i> +383 49 636 828 </p>
  
        <p><i class="fa fa-envelope"></i> <a href="mailto:auracosmetics@gmail.com">auracosmetics@gmail.com</a></p>
  
      </div>
  
      
  
      <div class="footer-social">
  
        <a href="#" target="_blank">Facebook</a>
  
        <a href="#" target="_blank">Twitter</a>
  
        <a href="#" target="_blank">Instagram</a>

        <p>&copy; 2024 AURA. All rights reserved.</p>
  
  
      </div>
  
    </div>
  
  </footer>
 <script>
  var i = 0;
  var imgArray = [
  "Makeup/HeroRare.jpg",
  "Makeup/rarefotos.jpg",
  "Makeup/baking.jpg",
  "Makeup/qikatslider.png",
  "Makeup/sherki.webp"
  ];
  function ndrroImg() {
  document.getElementById('slideshow').src = imgArray[i];
  if (i < imgArray.length - 1) {
  i++;
  } else {
  i = 0;
  }
  setTimeout("ndrroImg()",4000 )
  }
  document.body.addEventListener('load', ndrroImg());
  </script>

  <script>
    
    document.querySelector('.sidebar-toggle').addEventListener('click', function() {
        document.querySelector('.sidebar').classList.toggle('open');
        const arrow = document.querySelector('.sidebar-toggle i');
        if (document.querySelector('.sidebar').classList.contains('open')) {
            arrow.classList.remove('fa-arrow-left');
            arrow.classList.add('fa-arrow-right');
        } else {
            arrow.classList.remove('fa-arrow-right');
            arrow.classList.add('fa-arrow-left');
        }
    });
</script>

 
</body>
</html> 