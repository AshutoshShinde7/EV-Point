<?php
session_start();
include('connect.php');
if (isset($_SESSION["user"])) {
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
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#cars">Cars</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#parts">Parts</a></li>
                <li><a href="#blog">Our Blog</a></li>
            </ul>
            <div class="s-l" id="login-btn">
                <a href="login.php" class="btn" id="login-btn--">Login</a>
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
            <p>Lorem ipsum dolor sit amet consectetur <br>adipisicing elit. Aut, enim.</p>
            <!-- Home Button -->
            <a href="#vehicles" class="btn">Discover Now</a>
        </div>
    </section>
    <!-- Car Section -->
    <section class="cars" id="cars">
        <div class="heading">
            <span>All Cars</span>
            <h2>We have all types of EV cars</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat, deserunt.</p>
        </div>
        <!-- Cars Container  -->
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
    </section>

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
                                <?php echo $data['Model-Year']; ?>
                                <span class="fas fa-circle"></span>
                                <?php echo $data['Transmission']; ?>
                                <span class="fas fa-circle"></span>
                                <?php echo $data['Fuel Type']; ?>
                                <span class="fas fa-circle"></span>
                                <?php echo $data['Speed']; ?>km/h
                            </p>
                            <a href="booking.php" class="btn">Book Your Test Drive Now</a>
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
        <h1 class="heading">Featured Cars</h1>
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
                    <a href="" class="btn">check out</a>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

    <!-- Service Section -->
    <!-- <section class="services" id="services">
        <h1>Our <span>Services</span></h1>
        <div class="box-container">
            <div class="box">
                <i class="fas fa-car"></i>
                <h3>Car Selling</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, illum?</p>
                <a href="parts_sell_form.php" class="btn">Read More</a>
            </div>
            <div class="box">
                <i class="fas fa-tools"></i>
                <h3>Parts Repair</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, illum?</p>
                <a href="parts_sell_form.php" class="btn">Read More</a>
            </div>
            <div class="box">
                <i class="fas fa-car-crash"></i>
                <h3>Car Insurance</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, illum?</p>
                <a href="parts_sell_form.php" class="btn">Read More</a>
            </div>
            <div class="box">
                <i class="fas fa-car-battry"></i>
                <h3>Battery Replacement</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, illum?</p>
                <a href="parts_sell_form.php" class="btn">Read More</a>
            </div>
            <div class="box">
                <i class="fas fa-gas-pump"></i>
                <h3>Oil Change</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, illum?</p>
                <a href="parts_sell_form.php" class="btn">Read More</a>
            </div>
            <div class="box">
                <i class="fas fa-headset"></i>
                <h3>24/7 Support</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, illum?</p>
                <a href="parts_sell_form.php" class="btn">Read More</a>
            </div>
        </div>
    </section> -->

    <!-- About Section -->
    <Section class="about container" id="about">
        <div class="about-img">
            <img src="img/about2.png" alt="">
        </div>
        <div class="about-text">
            <span>About Us</span>
            <h2>Cheap prices with <br>Quality EV Cars</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium iure quam rerum a. Obcaecati,
                soluta.</p>
            <!-- About Button  -->
            <a href="parts_sell_form.php" class="btn">Learn More</a>
        </div>
    </Section>
    <!-- Parts Section -->

    <style>
        .q {
            margin-bottom: 5px;
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
    </style>

    <section class="parts" id="parts">
        <div class="heading">
            <span>What we Offer</span>
            <h2>Our Car is always Excellent</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, optio?</p>
        </div>
        <!-- Parts Container  -->
        <div class="parts-container container">
            <?php
            if (isset($_POST['submit'])) {
                $pqunatity = $_POST['quantity'];
            }
            $sqlSelect = "SELECT * FROM parts";
            $result = mysqli_query($conn, $sqlSelect);
            while ($data = mysqli_fetch_array($result)) {
                ?>
                <div class="box">
                    <?php echo "<img class='box-img' src='img/" . basename($data['Image']) . "' alt='Car Image'><br>" ?>
                    <h3>
                        <?php echo $data['p_name']; ?>
                    </h3>
                    <span>
                        ₹
                        <?php echo $data['p_price']; ?>
                    </span>
                    <i class='bx bxs-star'>6 Reviews</i>
                    <form action="order.php" method="post">
                        <div class="q">
                            <label for="quantity" class="lab">Qantity : </label>
                            <input type="number" id="myInput" name="quantity" value="1">
                        </div>
                        <a href="order.php?id=<?php echo $data['ID']; ?>& quantity=$pquqntity" type="submit" id="parts"
                            class="btn">Buy Now</a>
                    </form>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <!-- Blog Section  -->
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
    <section class="footer">
        <div class="footer-container container">
            <div class="footer-box">
                <a href="#" class="logo">EV<span>Point</span></a>
                <div class="social">
                    <a href="#"><i class='bx bxl-facebook'></i>
                        <a href="#"><i class='bx bxl-twitter'></i>
                            <a href="#"><i class='bx bxl-instagram'></i>
                                <a href="#"><i class='bx bxl-youtube'></i>
                </div>
            </div>
            <div class="footer-box">
                <h3>Page</h3>
                <a href="#home">Home</a>
                <a href="#cars">Cars</a>
                <a href="#parts">Parts</a>
                <a href="#blog">Sales</a>
            </div>
            <div class="footer-box">
                <h3>Legal</h3>
                <a href="#">Privecy</a>
                <a href="#">Refund Policy</a>
                <a href="#">Cookie Policy</a>
            </div>
            <div class="footer-box">
                <h3>Contact</h3>
                <p>India</p>
                <p>India</p>
                <p>India</p>
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