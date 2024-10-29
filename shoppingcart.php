<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shopping Website</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
</head>

<body>
    <header class="header">
        <a href="#" class="logo"><i class="fas fa-shopping-basket"></i> groco</a>
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#features">features</a>
            <a href="#products">products</a>
            <a href="#categories">categories</a>
            <a href="#review">reviews</a>
            <a href="#blogs">blogs</a>
        </nav>
        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn"></div>
            <div class="fas fa-user" id="login-btn"></div>
        </div>
        <form action="" class="search-form">
            <input type="search" id="search-box" placeholder="Search here....">
            <label for="search-box" class="fas fa-search"></label>
        </form>
        <div class="shopping-cart">
            <div class="box">
                <i class="fas fa-trash"></i>
                <img src="image/cart-img-1.png" alt="">
                <div class="content">
                    <h3>Watermelon</h3>
                    <span class="price">PHP 100/-</span>
                    <span class="quantity">QTY:1</span>
                </div>
            </div>
            <div class="box">
                <i class="fas fa-trash"></i>
                <img src="image/cart-img-1.png" alt="">
                <div class="content">
                    <h3>Watermelon</h3>
                    <span class="price">PHP 100/-</span>
                    <span class="quantity">QTY:1</span>
                </div>
            </div>
            <div class="box">
                <i class="fas fa-trash"></i>
                <img src="image/cart-img-1.png" alt="">
                <div class="content">
                    <h3>Watermelon</h3>
                    <span class="price">PHP 100/-</span>
                    <span class="quantity">QTY:1</span>
                </div>
            </div>
            <div class='total'> total: PHP 100</div>
            <a href="#" class="btn">checkout</a>
        </div>
        <form action="" class="login-form">
            <h3>Login</h3>
            <input type="email" placeholder="Enter Email" class="box">
            <input type="password" placeholder="Enter password" class="box">
            <input type="submit" value="Login" class="btn">
            <p>forget your password?<a href="#">click here</a></p>
            <p>Don't have an account? <a href="#"> Register now </a></p>
        </form>
    </header>

    <!-- home section start -->
    <section class="home" id="home">
        <div class="content">
            <h3>Anlaki ng<span> TITI NI </span>Neal Tracy Jestingor</h3>
            <p> Masarap subuin </p>
            <a href="#" class="btn">shop now</a>
        </div>
    </section>
    <!-- home section end -->

    <!-- feature section start -->
    <section class="features" id="features">
        <h1 class="heading">our <span> Mandaluyong Milker</span></h1>
        <div class="box-container">
            <div class="box">
                <img src="image/penis1.webp" alt="">
                <h3> Fresh and Organic</h3>
                <p>Burat ni julian</p>
                <a href="#" class="btn">read more</a>
            </div>
            <div class="box">
                <img src="image/penis1.webp" alt="">
                <h3> Fresh and Organic</h3>
                <p>Burat ni julian</p>
                <a href="#" class="btn">read more</a>
            </div>
            <div class="box">
                <img src="image/penis1.webp" alt="">
                <h3> Fresh and Organic</h3>
                <p>Burat ni julian</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>
    </section>
    <!-- feature section ends -->

    <?php
    $host = 'localhost';
    $dbname = 'perfume';
    $username = 'root';
    $password = '';

    $db = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $query = "SELECT ProductImage, ProductName, ProductPrice, ProductID FROM menperfume";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = array();

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    ?>
   <!-- product start -->
<style>
    .box {
        width: 500px;
        height: 450px;
        /* Add any other styles you want for the product boxes */
    }

    .btn {
        width: 120px;
        /* Adjust the width as needed */
    }
</style>

<section class="products" id="products">
    <h1 class="heading"><span>For Mens</span></h1>
    <div class="swiper product-slider">
        <div class="swiper-wrapper">
            <?php $count = 0; ?>
            <?php foreach ($products as $product) : ?>
                <?php if ($count >= 5) break; ?>
                <div class="swiper-slide">
                    <div class="box">
                        <a href="product_description.php?id=<?= $product['ProductID'] ?>">
                            <div class="product-box">
                                <img src="data:image/jpeg;base64,<?= base64_encode($product['ProductImage']) ?>" alt="">
                                <h3 class="product-name"><?= $product['ProductName'] ?></h3>
                                <div class="price"><?= $product['ProductPrice'] ?></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <br>
                                <a href="product_description.php?id=<?= $product['ProductName'] ?>" class="btn">add to cart</a>
                            </div>
                        </a>
                    </div>
                </div>
                <?php $count++; ?>
            <?php endforeach; ?>
        </div>

        <!-- Navigation arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <div class="swiper product-slider">
        <div class="swiper-wrapper">
            <?php $count = 0; ?>
            <?php foreach ($products as $product) : ?>
                <?php if ($count < 5) {
                    $count++;
                    continue;
                } ?>
                <?php if ($count > 10) break; ?>
                <div class="swiper-slide">
                    <div class="box">
                        <a href="product_description.php?id=<?= $product['ProductID'] ?>">
                            <div class="product-box">
                                <img src="data:image/jpeg;base64,<?= base64_encode($product['ProductImage']) ?>" alt="">
                                <h3 class="product-name"><?= $product['ProductName'] ?></h3>
                                <div class="price"><?= $product['ProductPrice'] ?></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <br>
                                <a href=""class="btn">add to cart</a>
                            </div>
                        </a>
                    </div>
                </div>
                <?php $count++; ?>
            <?php endforeach; ?>
        </div>

        <!-- Navigation arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="scripts.js"></script>
    <script src="path/to/swiper.min.js"></script>
    <script>
        var swiper = new Swiper('.product-slider', {
            slidesPerView: 'auto',
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>

</html>
