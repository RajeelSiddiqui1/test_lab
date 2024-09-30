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

<!-- Services Section -->
<section id="services" class="services section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Services</h2>
    <p>Providing top-notch solutions in electrical appliances and customer satisfaction.</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="fas fa-lightbulb"></i> <!-- Icon for product design -->
          </div>
          <a href="#" class="stretched-link">
            <h3>Innovative Product Design</h3>
          </a>
          <p>We specialize in creating innovative and energy-efficient designs for a wide range of electrical appliances.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="fas fa-cogs"></i> <!-- Icon for manufacturing -->
          </div>
          <a href="#" class="stretched-link">
            <h3>Quality Manufacturing</h3>
          </a>
          <p>Our state-of-the-art manufacturing facilities ensure high-quality production standards for all our appliances.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="fas fa-wrench"></i> <!-- Icon for repair services -->
          </div>
          <a href="#" class="stretched-link">
            <h3>Expert Repair Services</h3>
          </a>
          <p>We provide professional repair services for all types of electrical appliances, ensuring they function optimally.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="fas fa-truck"></i> <!-- Icon for delivery -->
          </div>
          <a href="#" class="stretched-link">
            <h3>Reliable Delivery</h3>
          </a>
          <p>Our reliable delivery services ensure that your appliances reach you safely and on time.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="fas fa-headset"></i> <!-- Icon for customer support -->
          </div>
          <a href="#" class="stretched-link">
            <h3>24/7 Customer Support</h3>
          </a>
          <p>Our dedicated customer support team is available 24/7 to assist you with any queries or issues.</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="fas fa-star"></i> <!-- Icon for warranties -->
          </div>
          <a href="#" class="stretched-link">
            <h3>Product Warranties</h3>
          </a>
          <p>All our products come with warranties, ensuring peace of mind and satisfaction with your purchase.</p>
        </div>
      </div><!-- End Service Item -->

    </div>
  </div>
</section><!-- /Services Section -->


    <!-- Appointment Section -->
   

    <!-- Departments Section -->
    <section id="departments" class="departments section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>SRS Electrical Appliances</h2>
    <p>Manufacturers of high-quality electrical products like switch gears, fuses, capacitors, resistors, and more.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row">
      <div class="col-lg-3">
        <ul class="nav nav-tabs flex-column">
          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" href="#departments-tab-1">Manufacturing Process</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-2">Product Testing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-3">CPRI Testing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-4">Re-manufacturing</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="tab-content">
          <!-- Manufacturing Process Tab -->
          <div class="tab-pane active show" id="departments-tab-1">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Manufacturing Process</h3>
                <p class="fst-italic">SRS Electrical Appliances specializes in the production of electrical components such as switch gears, fuses, capacitors, and resistors.</p>
                <p>Our advanced manufacturing units ensure high-quality products using the latest technologies. Every product is rigorously checked for quality and durability before it is sent for testing. This process guarantees that our products meet the necessary industry standards and customer expectations.</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="assets/img/manufacturing.jpg" alt="Manufacturing Process" class="img-fluid">
              </div>
            </div>
          </div>
          <!-- Product Testing Tab -->
          <div class="tab-pane" id="departments-tab-2">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Product Testing</h3>
                <p class="fst-italic">Once the products are manufactured, they undergo an extensive testing process at our in-house laboratories.</p>
                <p>Each product is subjected to various testing conditions to ensure safety, reliability, and performance. Our testing process simulates real-world conditions to verify that the products are ready for use in different environments.</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="assets/img/testing.jpg" alt="Product Testing" class="img-fluid">
              </div>
            </div>
          </div>
          <!-- CPRI Testing Tab -->
          <div class="tab-pane" id="departments-tab-3">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>CPRI Testing</h3>
                <p class="fst-italic">After successfully passing internal tests, the products are sent to CPRI (Central Power Research Institute) for certification.</p>
                <p>CPRI's certification ensures that our products comply with national and international standards. This step is crucial for releasing the products into the market and gaining customer trust.</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="assets/img/cpri-testing.jpg" alt="CPRI Testing" class="img-fluid">
              </div>
            </div>
          </div>
          <!-- Re-manufacturing Tab -->
          <div class="tab-pane" id="departments-tab-4">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Re-manufacturing Process</h3>
                <p class="fst-italic">In the event that a product fails any of the tests, it is sent back for re-manufacturing.</p>
                <p>The product goes through a refinement process to correct any identified issues. After re-manufacturing, the product undergoes testing once again to ensure it meets the required standards before being released.</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="assets/img/remanufacturing.jpg" alt="Re-manufacturing Process" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</section><!-- /Departments Section -->
</main>

<?php
include("footer.php");
?>