<?php

session_start();

include ('connect.php');

if (!isset ($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

if (isset ($_SESSION['alert_message'])) {
    echo "<script>alert('" . $_SESSION['alert_message'] . "');</script>";
    unset($_SESSION['alert_message']);
}

if (isset ($_SESSION["user"])) {
    header("Location: index.php");
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>EV Point</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='style.css'>
    <link rel='stylesheet' href='style1.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>


    <!-- Navbar -->
    <header>
        <!-- Navbar Container -->
        <div class="nav container">
            <!-- Menu Icon -->
            <div id="menu-icon" class="fas fa-bars"></div>
            <!-- Logo -->
            <a href="#" class="logo">EV<span>Point</span></a>
            <!-- Nav List -->
            <ul class="navbar">
                <li><a href="#home" class="active" onclick="handleClick('Home')">Home</a></li>
                <li><a href="#vehicles" onclick="handleClick('vehicles')">Cars</a></li>
                <li><a href="#featured" onclick="handleClick('featured')">Featured</a></li>
                <li><a href="#about" onclick="handleClick('about')">About</a></li>
                <li><a href="#parts" onclick="handleClick('parts')">Parts</a></li>
                <li><a href="#blog" onclick="handleClick('blog')">Our Blog</a></li>
            </ul>
            <div class="s-l" id="login-btn">
                <!-- <button id="viewOrdersBtn" class="bag">My Orders <i class='bx bx-package'></i></button> -->
                <a href="logout.php" class="btn" id="login-btn--">LogOut</a>
            </div>
        </div>
    </header>
    <!-- Home -->
    <section class="home" id="home">
        <div class="home-text">
            <h1>Welcome
                <span style="text-transform: capitalize;">
                    <?php echo $_SESSION['user_name'] ?>
                </span>
            </h1>
            <h1>We Have Everything <br>Your <span>EV Car</span> Need</h1>
            <p>Explore our wide range of accessories and essentials to enhance your<br> electric driving
                experience.Quality, convenience, and comfort, all in one place.</p>
            <!-- Home Button -->
            <a href="#vehicles" class="btn">Discover Now</a>
        </div>
    </section>
    <!-- Car Section -->
    <!-- <section class="cars" id="cars">
        <div class="heading">
            <span>All Cars</span>
            <h2>We have all types of EV cars</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat, deserunt.</p>
        </div>
        Cars Container 
        <div class="cars-container container">
            <?php
            $sqlSelect = "SELECT * FROM cars";
            $result = mysqli_query($conn, $sqlSelect);
            while ($data = mysqli_fetch_array($result)) {
                ?>
                <div class="box">
                    <?php echo "<img class='box-img' src='img/" . basename($data['Image']) . "' alt='Car Image'><br>" ?>
                    <h2>
                        <?php echo $data['Title']; ?>
                    </h2>
                </div>
                <?php
            }
            ?>
            <iframe id="transferFrame" style="display: none;"></iframe>
        </div>
    </section> -->

    <!-- Vehicles Section -->

    <section class="vehicles" id="vehicles">
        <h1 class="heading-v">Popular <span>Vehicles</span></h1>
        <div class="swiper vehicle-slider">
            <div class="swiper-wrapper">
                <?php
                $sqlSelect = "SELECT * FROM cars";
                $result = mysqli_query($conn, $sqlSelect);
                while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <div class="swiper-slide box">
                        <?php echo "<img class='box-img' src='img/" . basename($data['Image']) . "' alt='Car Image'><br>" ?>
                        <div class="content">
                            <h3>
                                <?php echo $data['Title']; ?>
                            </h3>
                            <div class="price"><span>Price start from: </span>
                                ₹
                                <?php echo $data['Price']; ?> lakh
                            </div>
                            <p>
                                new
                                <span class="fas fa-circle"></span>
                                <?php echo $data['ModelYear']; ?>
                                <span class="fas fa-circle"></span>
                                <?php echo $data['Transmission']; ?>
                                <span class="fas fa-circle"></span>
                                <?php echo $data['Fuel Type']; ?>
                                <span class="fas fa-circle"></span>
                                <?php echo $data['Speed']; ?>km/h
                            </p>
                            <a href="booking.php?id=<?php echo $data['ID']; ?>" class="btn">Book Your Test Drive Now</a>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
    </section>

    <!-- Featured Cars Section  -->

    <section class="featured" id="featured">
        <h1 class="heading">Featured <span>Cars</span></h1>
        <div class="wrapper">
            <?php
            $sqlSelect = "SELECT * FROM cars";
            $result = mysqli_query($conn, $sqlSelect);
            while ($data = mysqli_fetch_array($result)) {
                ?>
                <div class="box">
                    <?php echo "<img class='box-img' src='img/" . basename($data['Image']) . "' alt='Car Image'><br>" ?>
                    <h3>
                        <!-- <?php echo $data['Title']; ?> -->
                        <marquee behavior="scroll" direction="left" scrollamount="10">
                            <?php echo $data['Title']; ?>
                        </marquee>
                    </h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">₹
                        <?php echo $data['Price']; ?> Lakh
                    </div>
                    <a href="booking.php?id=<?php echo $data['ID']; ?>" class="btn">Check out</a>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

    <!-- About Section -->
    <article class="abt">
        <Section class="about container" id="about">
            <div class="about-img">
                <img src="img/about2.png" alt="">
            </div>
            <div class="about-text">
                <span>About Us</span>
                <h2>Cheap prices with <br>Quality EV Cars</h2>
                <p>Affordable Excellence: Quality EV Cars at Unbeatable Prices! Discover your next ride today and
                    experience the future of driving. Upgrade your journey with confidence and style..</p>
                <!-- About Button  -->
                <a href="#footer" class="btn">Learn More</a>
            </div>
        </Section>
    </article>
    <!-- Parts Section -->

    <style>
        .q {
            margin-bottom: 12px;
        }

        .lab {
            color: #ffa500;
        }

        #myInput {
            border: 2px solid #ffa500;
            border-radius: 7px;
            max-width: 50px;
            text-align: center;
        }

        .unavailable {
            margin-top: 20px;
            padding: 10px;
            color: red;
            font-size: 18px;
            /* max-width: 100%; */
            font-weight: bolder;
        }
    </style>

    <section class="parts" id="parts">
        <div class="heading">
            <span>What we Offer</span>
            <h2>Upgrade your ride, upgrade your impact</h2>
            <p>Enhance your electric experience with our premium accessories</p>
        </div>
        <!-- Parts Container  -->
        <div class="parts-container container">
            <?php
            $sqlSelect = "SELECT * FROM parts";
            $result = mysqli_query($conn, $sqlSelect);
            while ($data = mysqli_fetch_array($result)) {
                $pq = $data['p_quantity'];
                ?>
                <div class="box">
                    <?php echo "<img class='box-img' src='img/" . basename($data['Image']) . "' alt='Car Image'><br>" ?>
                    <h3>
                        <?php echo $data['p_name']; ?>
                    </h3>
                    <span>₹
                        <?php echo $data['p_price']; ?>
                    </span>
                    <i class='bx bxs-star'>6 Reviews</i>
                    <?php
                    if ($pq > 0) {
                        ?>
                        <form action="order.php?id=<?php echo $data['ID']; ?>" method="post">
                            <div class="q">
                                <label class="lab">Qantity : </label>
                                <input type="number" id="myInput" name="quantity" min="1" step="1" value="1">
                            </div>
                            <button type="submit" class="parts-btn btn">Buy Now</button>
                        </form>
                        <?php
                    } else {
                        ?>
                        <div class="unavailable">Out of Stock</div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <!-- <script>
        var productAvailability = "<?php echo $productAvailability; ?>";

        if (productAvailability === "Unavailable") {
            var buttons = document.getElementsByClassName("parts-btn");
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].disabled = true;
            }
        }
    </script> -->
    <!-- Blog Section -->
    <section class="blog" id="blog">
        <div class="heading">
            <span>Blog and News</span>
            <h2>Our Blog Content</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, optio?</p>
        </div>
        <!-- Blog Container  -->
        <div class="blog-container container">
            <div class="box">
                <img src="img/car1.jpg" alt="">
                <span>Feb 14 2023</span>
                <h3>How to get perfect car at low price</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi, praesentium.</p>
                <a href="#" class="blog-btn">Read More<i class='bx bx-right-arrow-alt'></i></a>
            </div>
            <div class="box">
                <img src="img/car2.jpg" alt="">
                <span>Feb 14 2023</span>
                <h3>How to get perfect car at low price</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi, praesentium.</p>
                <a href="#" class="blog-btn">Read More<i class='bx bx-right-arrow-alt'></i></a>
            </div>
            <div class="box">
                <img src="img/car3.jpg" alt="">
                <span>Feb 14 2023</span>
                <h3>How to get perfect car at low price</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi, praesentium.</p>
                <a href="#" class="blog-btn">Read More<i class='bx bx-right-arrow-alt'></i></a>
            </div>
            <div class="box">
                <img src="img/car4.jpg" alt="">
                <span>Feb 14 2023</span>
                <h3>How to get perfect car at low price</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi, praesentium.</p>
                <a href="#" class="blog-btn">Read More<i class='bx bx-right-arrow-alt'></i></a>
            </div>
        </div>
    </section>
    <!-- Fotter Section -->
    <section class="footer" id="footer">
        <div class="footer-container container">
            <div class="footer-box">
                <a href="#" class="logo">EV<span>Point</span></a>
                <div class="social">
                    <a href="https://www.facebook.com/"><i class='bx bxl-facebook'></i>
                        <a href="https://twitter.com/"><i class='bx bxl-twitter'></i>
                            <a href="https://www.instagram.com/"><i class='bx bxl-instagram'></i>
                                <a href="https://www.youtube.com/"><i class='bx bxl-youtube'></i>
                </div>
            </div>
            <div class="footer-box">
                <h3>Pages</h3>
                <a href="#home">Home</a>
                <a href="#cars">Cars</a>
                <a href="#parts">Parts</a>
                <a href="#blog">Sales</a>
            </div>
            <div class="footer-box">
                <h3>Legal</h3>
                <a href="#">Privacy</a>
                <a href="#">Refund Policy</a>
                <a href="#">Cookie Policy</a>
            </div>
            <div class="footer-box">
                <h3>Contact</h3>
                <p>India</p>
                <p>India</p>
                <a href="feedback.php">Submit Your Feedback</a>
            </div>
        </div>
    </section>

    <!-- CopyRight -->
    <div class="copyright">
        <p>&#169; Ashutosh Shinde All Rights Reserved</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src='main.js'></script>
</body>

</html>