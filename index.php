<?php include('./header.php');
require_once "./config.php";
?>




                <header class="hero flex items-center">
                    <div class="container">
                        <div class="welcome flex items-center">
                            <span>Welcome to</span>
                            <img src="./icons/new logo.svg" alt="" height="77">
                        </div>
                        <h1>The World Best <span>Shoping</span> Website</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the
                            industry's standard dummy.</p>
                        <div>
                            <button class="btn btn-primary">Read More</button>
                            <button class="btn btn-secondary">Shop Now</button>
                        </div>
                        <div class="hero-image">
                            <img src="./images/hero-img.png" alt="" width="410px" height="400px">
                        </div>
                    </div>
                </header>

                <section class="top-products">
                    <div class="container">
                        <h1 class="section-heading">Top products</h1>
                        <div class="slider">
                            <button class="slider-btn prev-btn"><img src="./icons/pre.svg" alt=""></button>
                            <button class="slider-btn next-btn"><img src="./icons/next.svg" alt=""></button>
                            <div class="food-slider">
                                <?php
                                    $sql = "SELECT * FROM pizzas";
                                    $result = $conn->query($sql);
                                    if($result->num_rows > 0){
                                        while($row = $result->fetch_assoc()){
                                            echo '<div class="food-card magic-shadow-sm">
                                            <div class="product-image flex items-center justify-center">
                                                <img src='.str_replace('..','.', $row['pizza_img']).' alt="">
                                            </div>
                                            <hr>
                                            <div>
                                                <h2 class="text-center">'.$row['pizza_name'].'</h2>
                                                <div class="stars flex justify-center items-center">
                                                    <img src="./icons/start-filled.svg" alt="">
                                                    <img src="./icons/start-filled.svg" alt="">
                                                    <img src="./icons/start-filled.svg" alt="">
                                                    <img src="./icons/star-grey.svg" alt="">
                                                    <img src="./icons/star-grey.svg" alt="">
                                                </div>
                                                <div class="price text-center">
                                                ₹'.$row['pizza_price'].'
                                                </div>
                                                <div class="flex justify-center">
                                                <form action="checkout_form.php" method="post" style="width:100%;" class="flex justify-center">
                                                     <input type="hidden" name="id" value='.$row['pizza_id'].'> 
                                                    <button type="submit" name="order">
                                                        <img src="./icons/cart-2.svg" alt="">
                                                         <span>Order Now</span>
                                                    </button>
                                                </form>
                                                </div>
                                                <div class="flex justify-center" style="margin-top:8px;">
                                                    <button>
                                                        <img src="./icons/cart-2.svg" alt="">
                                                        <a href="" style="text-decoration:none">View Details</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div> ';
                                        }
                                    }
                                    ?>
                                
                            </div>
                        </div>
                        <div class="text-center btn-wrapper">
                            <button class="btn btn-secondary">View More</button>
                        </div>
                    </div>
                </section>
                <section class="about-meal">
                    <div class="container">
                        <h1 class="section-heading">About Fresh Meal</h1>
                        <div class="about-meal-wrap flex">
                            <div class="flex-1">
                                <img src="./images/yogurt.png" alt="">
                            </div>
                            <div class="flex-1">
                                <h2>Freshmeal is a long established fact that a reader will be distracted</h2>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                    piece of
                                    classical Latin literature from 45 BC, making it over 2000 years old. Richard
                                    McClintock, a
                                    Latin professor at Hampden Sydney College in Virginia, The standard chunk of Lorem
                                    Ipsum used
                                    since the 1500s is reproduced below for those interested.</p>
                                <button class="btn btn-secondary">Read More</button>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="our-services">
                    <div class="container">
                        <h1 class="section-heading">Our services</h1>
                        <div class="card-wrapper flex">
                            <div class="service-card magic-shadow-sm">
                                <img class="icon" src="./icons/transport.svg" alt="">
                                <h2>Free Home delivery</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <button class="btn btn-secondary">Read More</button>
                            </div>
                            <div class="service-card magic-shadow-sm">
                                <img class="icon" src="./icons/bag.svg" alt="">
                                <h2 class="text-primary">30 Days ReturnServices</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <button class="btn btn-primary">Read More</button>
                            </div>
                            <div class="service-card magic-shadow-sm">
                                <img class="icon" src="./icons/usd.svg" alt="">
                                <h2>Money Back Guaranted</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <button class="btn btn-secondary">Read More</button>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="big-deal">
                    <div class="container">
                        <h1 class="section-heading text-pure">Big Deals of the Week</h1>
                        <div class="timer">
                            <div>
                                <span>02</span>
                                <span>Days</span>
                            </div>
                            <div>
                                <span>24</span>
                                <span>Hours</span>
                            </div>
                            <div>
                                <span>55</span>
                                <span>Minutes</span>
                            </div>
                            <div>
                                <span>58</span>
                                <span>Seconds</span>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="latest-news">
                    <div class="container">
                        <h1 class="section-heading">Lastest News from Blog</h1>
                        <div class="article-wrapper">
                            <article class="card magic-shadow-sm">
                                <div>
                                    <img src="./images/coffee.jpg" alt="">
                                </div>
                                <div class="card-content">
                                    <div class="post-meta flex items-center justify-between">
                                        <span>July 03, 2017</span>
                                        <div>
                                            <span>Posted by <strong>FreshMeal</strong></span>
                                            <span class="comment-count">12 Comments</span>
                                        </div>
                                    </div>

                                    <h2>Lorem Ipsum is simply dummy text of the printing</h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a
                                        page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                        more
                                        letters.</p>
                                </div>
                            </article>
                            <article class="card magic-shadow-sm">
                                <div>
                                    <img src="./images/donut.jpg" alt="">
                                </div>
                                <div class="card-content">
                                    <div class="post-meta flex items-center justify-between">
                                        <span>July 03, 2017</span>
                                        <div>
                                            <span>Posted by <strong>FreshMeal</strong></span>
                                            <span class="comment-count">12 Comments</span>
                                        </div>
                                    </div>

                                    <h2>Lorem Ipsum is simply dummy text of the printing</h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a
                                        page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                        more
                                        letters.</p>
                                </div>
                            </article>
                        </div>
                        <div class="text-center btn-wrapper">
                            <button class="btn btn-secondary">View All</button>
                        </div>
                    </div>
                </section>

                <section class="subscribe">
                    <div class="container flex items-center">
                        <div>
                            <img src="./images/rasberry.png" alt="">
                        </div>
                        <div>
                            <h1>Subscribe to your newsletter</h1>
                            <p>Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many
                                web sites
                                still in their infancy.</p>
                            <div class="input-wrap">
                                <input type="email" placeholder="email@freshmeal.com">
                                <button>Subscribe</button>
                            </div>
                        </div>
                    </div>
                </section>

<?php include('./footer.php') ?>