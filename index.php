<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SRS Electrical Appliances</title>
  <!-- Bootstrap 5.3 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts for Professional Typography -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <!-- FontAwesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f2f5;
    }

    /* Hero Section */
    .hero-section {
      height: 100vh;
      background: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('./assets/img/laboratory-3d-glassware.jpg') no-repeat center center/cover;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      text-align: center;
    }

    .hero-content h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .hero-content p {
      font-size: 1.25rem;
      font-weight: 300;
      margin-bottom: 40px;
    }

    .btn-custom {
      background-color: #FF69B4;
      color: white;
      padding: 15px 30px;
      border-radius: 50px;
      transition: 0.3s;
      font-size: 1.1rem;
    }

    .btn-custom:hover {
      background-color: #FFA07A;
    }

    /* Process Section */
    .process-section {
      padding: 50px 0;
      background-color: #fff;
    }

    .process-section h2 {
      font-size: 2.5rem;
      margin-bottom: 40px;
      font-weight: 700;
    }

    .process-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      transition: 0.3s;
    }

    .process-card:hover {
      transform: scale(1.05);
    }

    .process-card .card-body {
      padding: 40px 20px;
      text-align: center;
    }

    .process-icon {
      font-size: 3rem;
      color: #FF69B4;
      margin-bottom: 20px;
    }

    /* Footer */
    footer {
      background-color: #343a40;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    footer p {
      margin: 0;
      font-size: 1rem;
    }
  </style>
</head>
<body>

<!-- Hero Section -->
<section class="hero-section">
  <div class="hero-content">
    <h1>Welcome to SRS Electrical Appliances</h1>
    <p>Innovating the future with top-quality electrical products</p>
    <a href="login.php" class="btn btn-custom">Login</a>
    <a href="signup.php" class="btn btn-outline-light btn-lg ms-3">Signup</a>
  </div>
</section>

<!-- Process Section -->
<section class="process-section text-center">
  <div class="container">
    <h2>Our Manufacturing Process</h2>
    <div class="row">
      <!-- Manufacturing Step -->
      <div class="col-md-4 mb-4">
        <div class="card process-card">
          <div class="card-body">
            <i class="fas fa-industry process-icon"></i>
            <h4>Manufacturing</h4>
            <p>We craft high-quality components including switch gears, capacitors, and resistors.</p>
          </div>
        </div>
      </div>

      <!-- Testing Step -->
      <div class="col-md-4 mb-4">
        <div class="card process-card">
          <div class="card-body">
            <i class="fas fa-vial process-icon"></i>
            <h4>Rigorous Testing</h4>
            <p>Each product undergoes rigorous testing to ensure top performance.</p>
          </div>
        </div>
      </div>

      <!-- CPRI Approval -->
      <div class="col-md-4 mb-4">
        <div class="card process-card">
          <div class="card-body">
            <i class="fas fa-certificate process-icon"></i>
            <h4>CPRI Certification</h4>
            <p>Our products are certified by CPRI to meet the highest industry standards.</p>
          </div>
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
