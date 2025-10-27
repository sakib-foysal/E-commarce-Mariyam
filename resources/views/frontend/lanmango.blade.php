<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mango</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/styles.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <style>
      .testimonial-slider {
  background-color: #5072a7;
  padding: 2em 2em 3em;
}
.testimonial-title {
  color: #fff;
}
.testimonial-title h2 {
  padding-left: 0.2em;
}
.card {
  margin: 0 0.5em;
  box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
  border: none;
  height: 100%;
}
.carousel-control-prev,
.carousel-control-next {
  background-color: #fff;
  width: 3em;
  height: 3em;
  border-radius: 50%;
  top: 60%;
  transform: translateY(-50%);
}

@media (min-width: 576px) {
  .carousel-item {
    margin-right: 0;
    flex: 0 0 50%;
    display: block;
  }
  .carousel-inner {
    display: flex;
  }
}
@media (min-width: 768px) {
  .carousel-inner {
    padding: 1em;
  }
  .carousel-control-prev,
  .carousel-control-next {
    opacity: 1;
    position: absolute;
    left: 1em;
    top: 90%;
    transform: translateY(-50%);
  }
  .carousel-control-next {
    left: 5em;
  }
}

    </style>
   <style>
       @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap');

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body{
    width: 100%;
    max-width: 1280px;
    background:rgb(248, 249, 250);
    margin: 0 auto;
    /* height: 100vh; */
    font-family: 'Outfit', sans-serif;
    padding: 0 25px;
}

/* header */
header{
    padding: 15px 25px;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: #fff;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    z-index: 100;
}

.nav{
    max-width: 1280px;
    margin: 0 auto;
    height: 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav ul{
    display: flex;
}
.nav ul li{
    list-style-type: none;
    margin-left: 20px;
    font-size: 20px;
}

.nav ul li a{
    text-decoration: none;
    color: #00000097;
}

.nav ul li a:hover{
    color: #0d6efd;
    /* text-decoration: underline; */
    border-bottom: 3px solid #e91e61;
}

/* .nav ul li a:active, .nav ul li a:visited{
    color: #5855555e;
} */

.menu{
    display: none;
}

/* hero section */
.hero-container{
    margin-top: 55px;
    display: flex;
    gap: 20px;
    justify-content: space-between;
    align-items: center;
    height: 90vh;
    padding-top: 80px;
}

.content{
    width: 50%;
}

.content h2{
    font-size: 3.8em;
}
.content p{
    margin: 20px 0;
    font-size: 1.5em;
    color: rgb(59, 61, 62);
    line-height: 2.18rem;
}

button{
    padding: 0.75rem 1.2rem ;
    border-radius: 20px;
    font-size: 1.25em;
    cursor: pointer;
    transition: all ease-in-out .15s;
    align-items: center;
}
.btn{
    background: #282828;
    color: #fff;
    border: none;
}

.btn:hover{
    background: #0b0b0b;
}

.btn-outline{
    border: 1px solid #0d6efd;
    background: transparent;
    color: #0d6efd;
    margin-left: 5px;
}

button i{
    font-size: 0.78em;
}

/* blob */
.blob{
    background-image: url(../img/mango1.jpg);
    width: 380px;
    height: 380px;
    background-size: cover;
    -webkit-background-position: center;
    background-position: center center;
    margin: 20px;
    box-shadow: 0 5px 5px 5px rgba(13, 110, 253, 0.2);
    animation: animate 5s ease-in-out infinite;
    transition: all 1s ease-in-out;
}

@keyframes animate {
    0%, 100%{
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
    }
    50%{
        border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;
    }
}


/* about styles */
.about{
    padding: 100px 0;
    text-align: center;
    width: 78%;
    margin: 0 auto;
}

.about h2{
    font-size: 2.5em;
}

.about p, .right-side p{
    font-size: 1.2em;
    color: rgb(59, 61, 62);
    line-height: 1.67rem;
    padding-top: 20px;
}

.container{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 10px;
}

.left-side,.right-side {
    width: 50%;
    margin: 20px 0;
}

.left-side img{
    width: 90%;
    /* height: 500px; */
    border-radius: 4px;
    /* background-position: center center; */
    object-fit: cover;
}

.right-side .btn{
    margin-top: 20px;
}

/* Service section */
.services{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.services .service-card{
    position: relative;
    width: 350px;
    padding: 40px;
    background: #fff;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    margin: 20px;
    text-align: center;
    box-sizing: border-box;
    overflow: hidden;
}

.services .service-card::before{
    content: '';
    width: 50%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background: rgba(255, 255, 255, 0.2);
    z-index: 2;
}

.service-card .number{
    position: relative;
    width: 80px;
    height: 80px;
    background: #000;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    font-size: 40px;
    font-weight: 700;
    transition: 1s;
}
.service-card:nth-child(1) a,
.service-card:nth-child(1) .number{
    background: #e91e61;
    box-shadow: 0 0 0 #e91e61;
}

.service-card:nth-child(1):hover .number{
    box-shadow: 0 0 0 400px #e91e61;
}

.service-card:nth-child(2) a,
.service-card:nth-child(2) .number{
    background: #23e627;
    box-shadow: 0 0 0 #23e627;
}

.service-card:nth-child(2):hover .number{
    box-shadow: 0 0 0 400px #23e627;
}

.service-card:nth-child(3) a,
.service-card:nth-child(3) .number{
    background: #2196f4;
    box-shadow: 0 0 0 #2196f4;
}

.service-card:nth-child(3):hover .number{
    box-shadow: 0 0 0 400px #2196f4;
}

.service-card .service-text{
    position: relative;
    transition: .5s;
}
.service-card:hover .service-text{
    color: #fff;
}

.service-card:hover .number{
    color: #000;
    background: #fff;
}

.service-card:hover .service-text a{
    background: #fff;
}

.service-text h3{
    margin: 20px 0;
}
.service-text a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    text-decoration: none;
    color: #000;
    border-radius: 5px;
    font-weight: 500;
    transition: .5s;
}

/* contact form */
.form{
    margin: 30px 0;
}
input, textarea{
    display: block;
    width: 76%;
    padding: 15px 10px;
    margin: 15px 0;
    background: #fff;
    border-radius: 4px;
    border: none;
    resize: none;
}

footer{
    position: absolute;
    width: 100%;
    background: #000;
    left: 0;
    right: 0;
    margin-top: 100px;
    min-height: 96px;
    color: #fff;
}

.footer-container{
    max-width: 1280px;
    margin: 10px auto;
    display: flex;
    justify-content: space-between;
    padding: 50px 25px;

}
.footer-container h3{
    margin-top: 25px;
    margin-bottom: 20px;
}
.footer-container p{
    width: 380px;
    margin: 15px 0;
}

.footer-container a{
    color: #fff;
    font-weight: 500;
}

.social-icon{
    display: flex;
    gap: 20px;
    margin-top: 15px;
}

.social-icon i{
    font-size: 24px;
    cursor: pointer;
}

.social-icon i:hover{
    transform: scale(1.2);
    transition: all .4s;
}


/* Media Quary */
@media screen and (max-width: 576px) {

    .nav ul{
        display: none;
    }

    .menu{
        display: block;
    }

    .hero-container{
        flex-direction: column-reverse;
        height: 100%;
    }
    .content{
        width: 100%;
    }
    .content h2{
        font-size: 2.4em;
    }
    .blob{
        width: 280px;
        height: 280px;
    }

    .about{
        width: 100%;
    }
    .container{
        flex-direction: column;
    }
    .left-side, .right-side{
        width: 100%;
    }
    input, textarea{
        width: 100%;
    }
    .footer-container{
        flex-direction: column-reverse;
    }
}
   </style>
    
  </head>
  <body>
    <!-- header -->
    <!-- <header>
        <nav class="nav">
            <h3><span style="color: #0d6efd;">CREATIVE</span><span>ART</span></h3>
            <div class="menu"><i class="fa-solid fa-bars"></i></div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header> -->
    <!-- hero section -->
    <section class="hero-container">
      <!-- content -->
      <div class="content">
        <h2>Bangladeshi Mangoes, Fresh From Our Farms</h2>
        <p>
          Welcome to Mariyum Traders, your trusted source for the juiciest Bangladeshi mangoes. Grown with care and delivered with love, our mangoes promise an unforgettable burst of sweetness in every bite. Experience the taste of summer with Mariyam Traders.
        </p>
        <div>
          <button class="btn">
            <i class="fa-regular fa-circle-play"></i> I want to book
          </button>
          
        </div>
      </div>

      <!-- animated blob -->
      <div>
        <div class="blob"></div>
      </div>
    </section>

    <!-- about me section -->
    <section  id="about">
      <div class="about"> 
        <h2>Full details</h2>
        <p>
          
Certainly! Here's a detailed description for your landing page:

Welcome to [Your Business Name], Your Gateway to Exquisite Bangladeshi Mangoes

At Maryam traders, we take immense pride in bringing you the finest Bangladeshi mangoes, renowned for their exceptional taste, vibrant color, and irresistible aroma. Our journey begins from 2 years ago from satkhira, Bangladesh, where our dedicated farmers nurture each mango tree with care and expertise. From the moment the start to the final harvest, our commitment to quality shines through every step of the cultivation process.
        </p>
      </div>

      <!-- about details -->
      <div class="container">
        <!-- left side -->
        <div class="left-side">
          <img src="img/mango2.jpg" alt="" />
        </div>
        <!-- right side -->
        <div class="right-side">
          <h2>So, Who We Are?</h2>
          <p>
            At Mariyam Traders, we're more than just mango exporters; we're passionate advocates for Bangladesh's rich agricultural heritage and its exceptional produce. Our mission is simple: to bring the finest Bangladeshi mangoes from satkhira the district of fine mangoes, to your table, all while promoting ethical farming practices, supporting local communities, and fostering environmental stewardship. Upholding values of quality, sustainability, integrity, and innovation, our dedicated team ensures that every mango we deliver meets the highest standards of taste, freshness, and fairness. Join us on our journey to celebrate the flavors of Bangladesh and experience the unmatched joy of biting into a ripe, juicy Bangladeshi mango. Whether you're a mango enthusiast, a culinary connoisseur, or simply someone who appreciates life's finer pleasures, Mariyam Traders welcomes you to savor the sweetness of summer with us.
          </p>
        
          
        </div>
      </div>
    </section>

    <!-- Service section -->
    <section  id="services">
      <div class="about">
        <h2>Our Process</h2>
        <p>
          At Mariyam Traders, our process from start to finish is meticulously designed to ensure that each mango we deliver embodies the essence of freshness and flavor. It begins in the lush orchards of Bangladesh, where our skilled farmers nurture the mango trees with care and expertise. From blossom to harvest, every mango is handpicked at the peak of ripeness, guaranteeing optimal taste and texture. Once harvested, the mangoes undergo rigorous quality checks to ensure they meet our strict standards. They are then carefully packed and shipped directly from our farms to your doorstep, preserving their natural sweetness and nutrients along the way. Our commitment to quality, sustainability, and customer satisfaction shines through in every step of the process, allowing you to enjoy the finest Bangladeshi mangoes with confidence and delight.
        </p>
      </div>

      <div class="services">
        <div class="service-card">
          <div class="number">01</div>
          <div class="service-text">
            <h3>First Service</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Blanditiis asperiores repudiandae, tenetur voluptatibus nobis
              dolores.
            </p>
            <a href="#">Read More</a>
          </div>
        </div>
        <div class="service-card">
          <div class="number">02</div>
          <div class="service-text">
            <h3>Second Service</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Blanditiis asperiores repudiandae, tenetur voluptatibus nobis
              dolores.
            </p>
            <a href="#">Read More</a>
          </div>
        </div>
        <div class="service-card">
          <div class="number">03</div>
          <div class="service-text">
            <h3>Third Service</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Blanditiis asperiores repudiandae, tenetur voluptatibus nobis
              dolores.
            </p>
            <a href="#">Read More</a>
          </div>
        </div>
      </div>
    </section>
 <!--Faq section-->
   <!--Section: FAQ-->
<section>
  <h3 class="text-center mb-4 pb-2 text-primary fw-bold">FAQ</h3>
  <p class="text-center mb-5">
    Find the answers for the most frequently asked questions below
  </p>

  <div class="row">
    <div class="col-md-6 col-lg-4 mb-4">
      <h6 class="mb-3 text-primary"><i class="far fa-paper-plane text-primary pe-2"></i> A simple
        question?</h6>
      <p>
        <strong><u>Absolutely!</u></strong> We work with top payment companies which guarantees
        your
        safety and
        security. All billing information is stored on our payment processing partner.
      </p>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
      <h6 class="mb-3 text-primary"><i class="fas fa-pen-alt text-primary pe-2"></i> A question
        that
        is longer then the previous one?</h6>
      <p>
        <strong><u>Yes, it is possible!</u></strong> You can cancel your subscription anytime in
        your
        account. Once the subscription is
        cancelled, you will not be charged next month.
      </p>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
      <h6 class="mb-3 text-primary"><i class="fas fa-user text-primary pe-2"></i> A simple
        question?
      </h6>
      <p>
        Currently, we only offer monthly subscription. You can upgrade or cancel your monthly
        account at any time with no further obligation.
      </p>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
      <h6 class="mb-3 text-primary"><i class="fas fa-rocket text-primary pe-2"></i> A simple
        question?
      </h6>
      <p>
        Yes. Go to the billing section of your dashboard and update your payment information.
      </p>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
      <h6 class="mb-3 text-primary"><i class="fas fa-home text-primary pe-2"></i> A simple
        question?
      </h6>
      <p><strong><u>Unfortunately no</u>.</strong> We do not issue full or partial refunds for any
        reason.</p>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
      <h6 class="mb-3 text-primary"><i class="fas fa-book-open text-primary pe-2"></i> Another
        question that is longer than usual</h6>
      <p>
        Of course! We’re happy to offer a free plan to anyone who wants to try our service.
      </p>
    </div>
  </div>
</section>
<!--Section: FAQ-->
    <!--Faq section end-->
<!--Testimonial section start-->
<div class="testimonial-slider">
  <div id="carouselExampleControls" class="carousel carousel-dark">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="testimonial-title">
            <i class="bi bi-quote display-1"></i>
            <h2 class="fw-bold display-6">What our customers say</h2>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <div class="col-md-8">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card">
                <div class="img-wrapper"><img src="https://codingyaar.com/wp-content/uploads/headshot-1-scaled.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                  <h5 class="card-title">Card title 1</h5>
                  <i class="bi bi-star-fill text-warning pe-1"></i>
                  <i class="bi bi-star-fill text-warning pe-1"></i>
                  <i class="bi bi-star-fill text-warning pe-1"></i>
                  <i class="bi bi-star-fill text-warning pe-1"></i>
                  <i class="bi bi-star-fill text-warning pe-1"></i>
                  <p class="card-text">Some quick example text to build on the card title and make up
                    the bulk of the
                    card's content.</p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card">
                <div class="img-wrapper"><img src="https://codingyaar.com/wp-content/uploads/headshot-2-scaled.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                  <h5 class="card-title">Card title 2</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up
                    the bulk of the
                    card's content.</p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card">
                <div class="img-wrapper"><img src="https://codingyaar.com/wp-content/uploads/headshot-3-scaled.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                  <h5 class="card-title">Card title 3</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up
                    the bulk of the
                    card's content.</p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card">
                <div class="img-wrapper"><img src="https://codingyaar.com/wp-content/uploads/headshot-4-scaled.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                  <h5 class="card-title">Card title 4</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up
                    the bulk of the
                    card's content.</p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card">
                <div class="img-wrapper"><img src="https://codingyaar.com/wp-content/uploads/headshot-5-scaled.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                  <h5 class="card-title">Card title 5</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up
                    the bulk of the
                    card's content.</p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card">
                <div class="img-wrapper"><img src="https://codingyaar.com/wp-content/uploads/headshot-6-scaled.jpg" class="d-block w-100" alt="..."> </div>
                <div class="card-body">
                  <h5 class="card-title">Card title 6</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up
                    the bulk of the
                    card's content.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--testimonial end-->
    <!-- contact me section -->
    <section id="contact">
      <div class="about">
        <h2>Contact</h2>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur
          consectetur quas iure tempora, magnam aliquid voluptatum sit,
          voluptates odit alias veniam quos sapiente cupiditate itaque.
          Voluptatum sint corrupti enim ab!
        </p>
      </div>

      <div class="container">
        <!-- left side -->
        <div class="left-side">
          <img src="img/contact.png" alt="" />
        </div>
        <!-- right side -->
        <div class="right-side">
          <h2>Let's talk. <br />Tell me more about your project!</h2>
         <div class="form">
            <form action="{{ route('form.submit') }}" method="POST">
              @csrf
              <label for="name">Name:</label>
              <input type="text" name="name" id="name" placeholder="Type your name here" required />
              
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" placeholder="Your email address here" required />
              
              <label for="phone">Phone:</label>
              <input type="text" name="phone" id="phone" placeholder="Your phone number here" required />
              
              <label for="message">Messages:</label>
              <textarea name="message" id="message" cols="50" rows="10" placeholder="Message" required></textarea>
              
              <button type="submit">Submit</button>
          </form>
          </div>

          <button class="btn">Send Message</button>
        </div>
      </div>
    </section>

    <script>
      var multipleCardCarousel = document.querySelector("#carouselExampleControls");

if (window.matchMedia("(min-width: 576px)").matches) {
  var carousel = new bootstrap.Carousel(multipleCardCarousel, {
    interval: false
  });
  var carouselWidth = $(".carousel-inner")[0].scrollWidth;
  var cardWidth = $(".carousel-item").width();
  var scrollPosition = 0;
  $("#carouselExampleControls .carousel-control-next").on("click", function () {
    if (scrollPosition < carouselWidth - cardWidth * 3) {
      scrollPosition += cardWidth;
      $("#carouselExampleControls .carousel-inner").animate(
        { scrollLeft: scrollPosition },
        600
      );
    }
  });
  $("#carouselExampleControls .carousel-control-prev").on("click", function () {
    if (scrollPosition > 0) {
      scrollPosition -= cardWidth;
      $("#carouselExampleControls .carousel-inner").animate(
        { scrollLeft: scrollPosition },
        600
      );
    }
  });
} else {
  $(multipleCardCarousel).addClass("slide");
}

    </script>

    <!-- footer section -->
    <footer>
        <div class="footer-container">
            <div>
                <h3>CREATIVEART</h3>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, ad officia totam quae natus voluptate consectetur adipisicing elit.</p>
                 <p>@copyright 2023 || All rights preserved by <a href="">Md Shamim Reza</a></p>
            </div>
            <div>
                <h3>SOCIAL LINKS</h3>
                <div class="social-icon">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-youtube"></i>
                </div>
            </div>
        </div>
    </footer>
  </body>
</html>
