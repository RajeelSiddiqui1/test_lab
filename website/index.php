<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SRS Electrical Appliances | Innovating Future</title>
  
  <!-- Bootstrap 5.3 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  
  <!-- FontAwesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  
  <!-- Animate.css for smooth animations -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  
  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6f9;
      color: #333;
    }

    /* Hero Section */
    .hero-section {
      height: 100vh;
      background: linear-gradient(to bottom right, rgba(0,0,0,0.2), rgba(0,0,0,0.3)), url('./assets/img/laboratory-3d-glassware.jpg') no-repeat center center/cover;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      text-align: center;
      position: relative;
    }

    .hero-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.40);
      z-index: 0;
    }

    .hero-content {
      z-index: 1;
      animation: fadeInUp 1.5s ease-out;
    }

    .hero-content h1 {
      font-size: 4rem;
      font-weight: 700;
      margin-bottom: 20px;
      letter-spacing: 2px;
    }

    .hero-content p {
      font-size: 1.5rem;
      margin-bottom: 40px;
      color: #ccc;
    }

    .btn-custom {
      background-color: #FF69B4;
      color: white;
      padding: 15px 40px;
      border-radius: 50px;
      transition: all 0.3s ease;
      font-size: 1.2rem;
      box-shadow: 0 10px 30px rgba(255, 105, 180, 0.4);
    }

    .btn-custom:hover {
      background-color: #FFA07A;
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(255, 160, 122, 0.6);
    }

    /* Advanced Process Section */
    .process-section {
      padding: 100px 0;
      background-color: #fff;
      text-align: center;
    }

    .process-section h2 {
      font-size: 3rem;
      margin-bottom: 50px;
      font-weight: 700;
      letter-spacing: 1.5px;
    }

    .lead {
      font-size: 1.25rem;
    }

    .process-card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: 0.3s ease;
      padding: 50px 20px;
      position: relative;
    }

    .process-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    .process-icon {
      font-size: 4rem;
      color: #FF69B4;
      margin-bottom: 30px;
    }

    .process-card h4 {
      font-size: 1.5rem;
      margin-bottom: 20px;
      font-weight: 500;
    }

    .process-card p {
      font-size: 1rem;
      color: #666;
    }

    /* Footer */
    footer {
      background-color: #1a1a1a;
      color: #ccc;
      padding: 30px 0;
      text-align: center;
      margin-top: 100px;
    }

    footer p {
      margin: 0;
      font-size: 1rem;
      color: #888;
    }

    /* Custom Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

<!-- Hero Section -->
<section class="hero-section">
  <div class="hero-content">
    <h1 class="animate__animated animate__fadeInUp">Welcome to SRS Electrical Appliances</h1>
    <p class="animate__animated animate__fadeInUp tagline">Crafting the Future of Electrical Products</p>
    <p class="lead">We have a network in more than <strong>50 countries</strong> worldwide!</p>
    <a href="login.php" class="btn btn-custom animate__animated animate__fadeInUp">Login</a>
    <a href="signup.php" class="btn btn-outline-light btn-lg ms-3 animate__animated animate__fadeInUp">Signup</a>
  </div>
</section>

<!-- Process Section -->
<section class="process-section">
  <div class="container">
    <h2 class="animate__animated animate__fadeIn">Our Manufacturing Process</h2>
    <div class="row gy-4">
      <div class="col-md-4">
        <div class="process-card animate__animated animate__zoomIn">
          <i class="fas fa-cogs process-icon"></i>
          <h4>Manufacturing</h4>
          <p>Top-notch production of electrical components with precision and care.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="process-card animate__animated animate__zoomIn">
          <i class="fas fa-vial process-icon"></i>
          <h4>Rigorous Testing</h4>
          <p>Our products undergo rigorous testing to ensure industry standards are met.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="process-card animate__animated animate__zoomIn">
          <i class="fas fa-certificate process-icon"></i>
          <h4>CPRI Certification</h4>
          <p>All products receive CPRI approval for quality and reliability before release.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer>
  <p>&copy; 2024 SRS Electrical Appliances | All Rights Reserved</p>
</footer>

<!-- Bootstrap 5.3 JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- FontAwesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

</body>
</html>
