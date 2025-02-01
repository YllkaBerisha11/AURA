<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); 
    exit;
}

echo "Welcome, " . $_SESSION['email'] . "!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Products</title>
</head>
<body>
    <nav>
        <label class="logo">AURA</label>
        <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="aboutUs.html">About Us</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="sales.html">Sales</a></li>
        <li><a href="contactUs.php">Contact Us</a></li>
        <li><a href="login.php"><i class="fa fa-user-plus"></i> </a></li>
            <li><a href="#" id="cart-icon"><i class="fa fa-shopping-cart"></i> <span id="cart-count">0</span></a></li>
            <li><a href="#" id="favorites-icon"><i class="fa fa-heart"></i> <span id="favorites-count">0</span></a></li>
        </ul>
    </nav>

    
    <div id="cart-dropdown" class="dropdown">
        <h3>Cart</h3>
        <ul id="cart-items"></ul>
        <p id="cart-total"></p>
        <button id="clear-cart">Clear Cart</button>
    </div>

  
    <div id="favorites-dropdown" class="dropdown">
        <h3>Favorites</h3>
        <ul id="favorites-items"></ul>
        <button id="clear-favorites">Clear Favorites</button>
    </div>
</body>
</html>

      
</head>
<body>
    <div class="container">
        <h1>Popular Makeup Products</h1>
        <div class="product-grid">
            <div class="product-box">
                <img src="Makeup/eyeshadow.png" alt="Product1" class="product-image">
                <h3 class="product-title">Eyeshadow</h3>
                <p class="product-price">$15</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/paletteNyx.png" alt="Product2" class="product-image">
                <h3 class="product-title">Contour</h3>
                <p class="product-price">$17</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/lip.liner.mario.png" alt="Product3" class="product-image">
                <h3 class="product-title">LipLiner</h3>
                <p class="product-price">$10</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/mascaraClinique.png" alt="Product4" class="product-image">
                <h3 class="product-title">Mascara</h3>
                <p class="product-price">$20</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/benefit.png" alt="Product5" class="product-image">
                <h3 class="product-title">Brow Setter</h3>
                <p class="product-price">$22</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/fenty.png" alt="Product6" class="product-image">
                <h3 class="product-title">Highlighter</h3>
                <p class="product-price">$25</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/rareblush.jpg" alt="Product7" class="product-image"S>
                <h3 class="product-title">Rare Beauty Blush</h3>
                <p class="product-price">$20</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/rare highlighter.jpg" alt="Product8" class="product-image">
                <h3 class="product-title">Rare Beauty Highlighter</h3>
                <p class="product-price">$25</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/kikolipstick.jpg" alt="Product9" class="product-image">
                <h3 class="product-title">Kiko Lipstick</h3>
                <p class="product-price">$15</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/kikogloss.jpg" alt="Product10" class="product-image">
                <h3 class="product-title">Kiko Lip Gloss</h3>
                <p class="product-price">$12</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/ysl.jpg" alt="Product11" class="product-image">
                <h3 class="product-title">YSL Lip Balm</h3>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/yslrpimer.jpg" alt="Product12" class="product-image">
                <h3 class="product-title">YSL Primer</h3>
                <p class="product-price">$40</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/browpen.jpg" alt="Product13" class="product-image">
                <h3 class="product-title">ABH Brow Pencil</h3>
                <p class="product-price">$18</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/abh.jpg" alt="Product14" class="product-image">
                <h3 class="product-title">ABH Eyeshadow</h3>
                <p class="product-price">$35</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/elfprimer.jpg" alt="Product15" class="product-image">
                <h3 class="product-title">e.l.f. Glow Primer</h3>
                <p class="product-price">$10</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/elf.jpg" alt="Product16" class="product-image">
                <h3 class="product-title">e.l.f. Putty Primer</h3>
                <p class="product-price">$9</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/ysl.webp" alt="Product17" class="product-image">
                <h3 class="product-title">YSL Lipstick</h3>
                <p class="product-price">$45</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/huda.webp" alt="Product18" class="product-image">
                <h3 class="product-title">HudaBeauty Powder</h3>
                <p class="product-price">$48</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
    
            <div class="product-box">
                <img src="Makeup/rare.webp" alt="Product19" class="product-image">
                <h3 class="product-title">Blushes</h3>
                <p class="product-price">$35</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
            </div>
            <div class="product-box">
                <img src="Makeup/foundation.webp" alt="Product20" class="product-image">
                <h3 class="product-title">Foundations</h3>
                <p class="product-price">$55</p>
                <button class="add-to-cart">Add to Cart</button>
                <button class="favorite">
                    <i class="far fa-heart"></i> 
                </button>
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
        let cartCount = 0;
        let favoritesCount = 0;

      
        function addToCart(product) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.push(product);
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartCount();
        }

       
        function addToFavorites(product) {
            let favorites = JSON.parse(localStorage.getItem("favorites")) || [];
            favorites.push(product);
            localStorage.setItem("favorites", JSON.stringify(favorites));
            updateFavoritesCount();
        }

        
        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            document.getElementById('cart-count').textContent = cart.length;
        }

       
        function updateFavoritesCount() {
            let favorites = JSON.parse(localStorage.getItem("favorites")) || [];
            document.getElementById('favorites-count').textContent = favorites.length;
        }

        
        window.onload = function() {
            updateCartCount();
            updateFavoritesCount();
        };

     
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', (e) => {
                const product = {
                    name: e.target.previousElementSibling.previousElementSibling.textContent, 
                    price: e.target.previousElementSibling.textContent, 
                    image: e.target.previousElementSibling.previousElementSibling.previousElementSibling.src 
                };
                addToCart(product);
            });
        });

        document.querySelectorAll('.favorite').forEach(button => {
            button.addEventListener('click', (e) => {
                const product = {
                    name: e.target.previousElementSibling.textContent, 
                    price: e.target.previousElementSibling.previousElementSibling.textContent,
                    image: e.target.previousElementSibling.previousElementSibling.previousElementSibling.src 
                };
                addToFavorites(product);
            });
        });
    </script>
    <script>
        document.getElementById('cart-icon').addEventListener('click', () => {
  const cartDropdown = document.getElementById('cart-dropdown');
  toggleDropdown(cartDropdown, 'cart');
});


document.getElementById('favorites-icon').addEventListener('click', () => {
  const favoritesDropdown = document.getElementById('favorites-dropdown');
  toggleDropdown(favoritesDropdown, 'favorites');
});


function toggleDropdown(dropdown, type) {
  if (dropdown.style.display === 'block') {
    dropdown.style.display = 'none';
  } else {
    dropdown.style.display = 'block';
    updateDropdownContent(dropdown, type);
  }
}


function updateDropdownContent(dropdown, type) {
  const list = dropdown.querySelector('ul');
  list.innerHTML = ''; 
  let items = JSON.parse(localStorage.getItem(type)) || [];
  let total = 0;

  items.forEach((item, index) => {
    const listItem = document.createElement('li');
    listItem.innerHTML = `
      <img src="${item.image}" alt="${item.name}">
      <span>${item.name} - ${item.price}</span>
      <button onclick="removeItem('${type}', ${index})">Hiq</button>
    `;
    list.appendChild(listItem);

    
    if (type === 'cart') {
      total += parseFloat(item.price.replace('$', ''));
    }
  });

  if (type === 'cart') {
    dropdown.querySelector('#cart-total').textContent = `Totali: $${total.toFixed(2)}`;
  }
}


function removeItem(type, index) {
  let items = JSON.parse(localStorage.getItem(type)) || [];
  items.splice(index, 1); 
  localStorage.setItem(type, JSON.stringify(items));
  updateDropdownContent(
    document.getElementById(type === 'cart' ? 'cart-dropdown' : 'favorites-dropdown'),
    type
  );
  if (type === 'cart') updateCartCount();
  if (type === 'favorites') updateFavoritesCount();
}


document.getElementById('clear-cart').addEventListener('click', () => {
  localStorage.setItem('cart', JSON.stringify([]));
  updateCartCount();
  document.getElementById('cart-dropdown').style.display = 'none';
});

document.getElementById('clear-favorites').addEventListener('click', () => {
  localStorage.setItem('favorites', JSON.stringify([]));
  updateFavoritesCount();
  document.getElementById('favorites-dropdown').style.display = 'none';
});
    </script>
</body>
</html>
