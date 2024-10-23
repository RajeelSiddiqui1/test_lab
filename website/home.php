<?php
include("conn.php");

session_start();
if(!isset($_SESSION["email"]) ){
    header("login.php");
    exit();
}
?>

<?php
include("header.php");
?>
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <img src="assets/img/men-lab-doing-experiments-close-up.jpg" alt="" data-aos="fade-in">

      <div class="container position-relative">

        <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
          <h2>Welcome to SRS Electrical Appliances</h2>
          <p>Your Trusted Partner in Electrical Products Manufacturing and Testing</p>
        </div><!-- End Welcome -->

        <div class="content row gy-4">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
              <h3>Why SRS Electrical Appliances?</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
              </p>
              <div class="text-center">
                <a href="#about" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-stretch">
  <div class="d-flex flex-column justify-content-center">
    <div class="row gy-4">

      <div class="col-xl-4 d-flex align-items-stretch">
        <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
          <i class="bi bi-tools"></i> <!-- Icon for manufacturing processes -->
          <h4>Manufacturing Excellence</h4>
          <p>SRS Electrical Appliances manufactures high-quality products like switch gears, fuses, capacitors, and resistors.</p>
        </div>
      </div><!-- End Icon Box -->

      <div class="col-xl-4 d-flex align-items-stretch">
        <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
          <i class="bi bi-check-circle"></i> <!-- Icon for testing and quality assurance -->
          <h4>Thorough Testing Process</h4>
          <p>Each product is subjected to rigorous testing conditions to ensure reliability and safety.</p>
        </div>
      </div><!-- End Icon Box -->

      <div class="col-xl-4 d-flex align-items-stretch">
        <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
          <i class="bi bi-shield-lock"></i> <!-- Icon for certification -->
          <h4>CPRI Certification</h4>
          <p>Successful products are sent to CPRI for final testing and certification before market release.</p>
        </div>
      </div><!-- End Icon Box -->

    </div>
  </div>
</div>

        </div><!-- End  Content-->

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4 gx-5">

          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
          </div>

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
  <h3>About Us</h3>
  <p>
  <!-- <a href="logout.php" class="btn btn-danger">kvhkv</a> -->
    SRS Electrical Appliances is a leading manufacturer of high-quality electrical products, including switch gears, fuses, capacitors, and resistors. We pride ourselves on our rigorous testing processes to ensure that every product meets the highest standards of safety and reliability before it reaches the market.
  </p>
  <ul>
    <li>
      <i class="bi bi-tools"></i> <!-- Icon for manufacturing -->
      <div>
        <h5>Expert Manufacturing Processes</h5>
        <p>Our state-of-the-art manufacturing facilities employ the latest technologies to produce reliable electrical appliances.</p>
      </div>
    </li>
    <li>
      <i class="bi bi-check-circle"></i> <!-- Icon for testing -->
      <div>
        <h5>Comprehensive Testing Procedures</h5>
        <p>Each product undergoes thorough testing to meet strict quality standards, ensuring safety and performance.</p>
      </div>
    </li>
    <li>
      <i class="bi bi-shield-lock"></i> <!-- Icon for certification -->
      <div>
        <h5>CPRI Certification</h5>
        <p>We partner with CPRI for certification, guaranteeing our products comply with national and international standards.</p>
      </div>
    </li>
  </ul>
</div>


        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">

      <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
        <i class="bi bi-battery-charging"></i> <!-- Icon for products -->
        <div class="stats-item">
          <span data-purecounter-start="0" data-purecounter-end="5000" data-purecounter-duration="2" class="purecounter"></span>
          <p>Products Manufactured</p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
        <i class="bi bi-check-circle"></i> <!-- Icon for successful tests -->
        <div class="stats-item">
          <span data-purecounter-start="0" data-purecounter-end="4500" data-purecounter-duration="2" class="purecounter"></span>
          <p>Successful Tests</p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
        <i class="bi bi-shield-lock"></i> <!-- Icon for certifications -->
        <div class="stats-item">
          <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="2" class="purecounter"></span>
          <p>Certifications Obtained</p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
        <i class="bi bi-clock"></i> <!-- Icon for years of experience -->
        <div class="stats-item">
          <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="2" class="purecounter"></span>
          <p>Years of Experience</p>
        </div>
      </div><!-- End Stats Item -->

    </div>
  </div>
</section>

<script>
  new PureCounter();
</script>


        </div>

      </div>

    </section><!-- /Stats Section -->

    


    <!-- Doctors Section -->
    <section id="tester" class="doctors section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Tester's</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>

    
    <!-- Area for search results -->
    <div class="container" id="search-results">
        <!-- Results will be dynamically loaded here via AJAX -->
    </div>

    <!-- List of testers -->
    <div class="container mt-3">
        <div class="row gy-4">
            <?php
            $query = "
                SELECT p.id, p.fullname, p.email, p.education, p.skills, p.work_experience, p.portfolio, p.country, p.image, c.c_name
                FROM cpri_show_to_user p
                INNER JOIN category c ON p.category_id = c.id
                WHERE p.category_id = c.id;
            ";

            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-lg-6 mt-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic">
                            <img src="../images/testers/<?php echo $row['image']; ?>" height="150" width="100%" alt="Tester Image">
                        </div>
                        <div class="member-info">
                            <h4><?php echo $row['fullname']; ?></h4>
                            <span><?php echo $row['email']; ?></span>
                            <p><strong class="text-black">Education:</strong> <?php echo $row['education']; ?></p>
                            <h6><strong class="text-black">Category:</strong> <?php echo $row['c_name']; ?></h6>
                            <!-- Modal Trigger Button -->
                            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#testerModal"
                                data-fullname="<?php echo $row['fullname']; ?>"
                                data-email="<?php echo $row['email']; ?>"
                                data-education="<?php echo $row['education']; ?>"
                                data-skills="<?php echo $row['skills']; ?>"
                                data-work_experience="<?php echo $row['work_experience']; ?>"
                                data-portfolio="<?php echo $row['portfolio']; ?>"
                                data-country="<?php echo $row['country']; ?>"
                                data-image="<?php echo $row['image']; ?>">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Modal Structure -->
<div class="modal fade" id="testerModal" tabindex="-1" aria-labelledby="testerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <img src="" id="testerImage" class="img-fluid" alt="Tester Image">
                    </div>
                    <div class="col-md-7 text-black">
                        <h4 id="testerFullname" class="text-black"></h4>
                        <p><strong class="text-black">Email:</strong> <span id="testerEmail"></span></p>
                        <p><strong class="text-black">Education:</strong> <span id="testerEducation"></span></p>
                        <p><strong class="text-black">Skills:</strong> <span id="testerSkills"></span></p>
                        <p><strong class="text-black">Work Experience:</strong> <span id="testerWorkExperience"></span></p>
                        <p><strong class="text-black">Portfolio:</strong> <a href="#" id="testerPortfolio" target="_blank">View Portfolio</a></p>
                        <p><strong class="text-black">Country:</strong> <span id="testerCountry"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Script to handle the modal population -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var testerModal = document.getElementById('testerModal');
    testerModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var fullname = button.getAttribute('data-fullname');
        var email = button.getAttribute('data-email');
        var education = button.getAttribute('data-education');
        var skills = button.getAttribute('data-skills');
        var workExperience = button.getAttribute('data-work_experience');
        var portfolio = button.getAttribute('data-portfolio');
        var country = button.getAttribute('data-country');
        var image = button.getAttribute('data-image');

        // Update modal content
        document.getElementById('testerFullname').textContent = fullname;
        document.getElementById('testerEmail').textContent = email;
        document.getElementById('testerEducation').textContent = education;
        document.getElementById('testerSkills').textContent = skills;
        document.getElementById('testerWorkExperience').textContent = workExperience;
        document.getElementById('testerPortfolio').setAttribute('href', portfolio);
        document.getElementById('testerCountry').textContent = country;
        document.getElementById('testerImage').setAttribute('src', '../images/testers/' + image);
    });
});

</script>

    <!-- Faq Section -->
   

    <div class="container section-title" data-aos="fade-up">
    <h2>Categories</h2>
    <p>Explore a wide range of categories for different products.</p>
</div><!-- End Section Title -->

<div class="container">

<div class="row gy-4">
    <?php
    $query = "SELECT * FROM `category`";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>

    <div class="col-md-4 mt-3">
        <div class="card shadow-lg h-100" style="background:#1B1B1B; border-radius: 10px; overflow: hidden;">
            <img src="../images/category/<?php echo $row['c_image']?>" style="height: 16rem; object-fit: cover; border-bottom: 3px solid #FF69B4;" alt="Product Image">
            <div class="card-body text-center" style="background-color: #333; padding: 1.5rem;">
                <h5 class="card-title text-light" style="font-weight: bold;"><?php echo $row['c_name']?></h5>
                <p class="card-text text-light" style="font-size: 0.9rem; line-height: 1.4;"><?php echo substr($row['c_desc'], 0, 120).'...'?></p>
                <a href="category_detail.php?id=<?php echo $row['id']?>" class="btn btn-outline-light mt-3" style="padding: 0.5rem 1.5rem; font-weight: 500;">View Details</a>
            </div>
        </div>
    </div>

    <?php } ?>
</div>


</div>

    

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <div class="container">

        <div class="row align-items-center">

          <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
            <h3>Testimonials</h3>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
            </p>
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

            <div class="swiper init-swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="d-flex">
                      <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img flex-shrink-0" alt="">
                      <div>
                        <h3>Saul Goodman</h3>
                        <h4>Ceo &amp; Founder</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="d-flex">
                      <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img flex-shrink-0" alt="">
                      <div>
                        <h3>Sara Wilsson</h3>
                        <h4>Designer</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="d-flex">
                      <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img flex-shrink-0" alt="">
                      <div>
                        <h3>Jena Karlis</h3>
                        <h4>Store Owner</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="d-flex">
                      <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img flex-shrink-0" alt="">
                      <div>
                        <h3>Matt Brandon</h3>
                        <h4>Freelancer</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="d-flex">
                      <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img flex-shrink-0" alt="">
                      <div>
                        <h3>John Larson</h3>
                        <h4>Entrepreneur</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div><!-- End testimonial item -->

              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- /Testimonials Section -->



  </main>


  <?php
include("footer.php");
?>