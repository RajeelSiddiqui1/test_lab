<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advanced Password Generator</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <style>
    body {
      background-color: #121212;
      color: #ffffff;
      font-family: Arial, sans-serif;
      overflow: hidden;
      /* Prevent scrolling due to background spots */
    }

    /* Full-screen spots background */
    .background {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: radial-gradient(circle at 10% 20%, rgba(255, 99, 71, 0.4), transparent 20%),
        radial-gradient(circle at 30% 80%, rgba(30, 144, 255, 0.4), transparent 20%),
        radial-gradient(circle at 60% 30%, rgba(255, 215, 0, 0.4), transparent 20%),
        radial-gradient(circle at 80% 50%, rgba(75, 0, 130, 0.4), transparent 20%),
        radial-gradient(circle at 40% 90%, rgba(255, 105, 180, 0.4), transparent 20%);
      z-index: -1;
      /* Keep the background behind other elements */
    }

    .password-box {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      padding: 30px;
      margin-top: 50px;
    }

    .input-group input {
      cursor: not-allowed;
      border-right: none;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
    }

    .input-group .btn {
      border-left: none;
      background-color: #007bff;
    }

    .btn:hover,
    .form-check-input:checked {
      background-color: #0056b3;
    }

    #copyBtn i {
      transition: transform 0.2s ease;
    }

    #copyBtn:hover i {
      transform: scale(1.1);
    }

    #toast {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1055;
      display: none;
    }

    .progress {
      height: 8px;
    }
  </style>
</head>

<body>

  <div class="background"></div>

  <div class="container">
    <div class="password-box mx-auto col-lg-5">
      <h1 class="text-center mb-4">Password Generator</h1>

      <!-- Password Display and Copy Button -->
      <div class="input-group mb-3">
        <input type="text" id="generatedPassword" class="form-control" placeholder="Generated password" readonly>
        <button class="btn btn-outline-primary text-light" id="copyBtn" type="button">
          <i class="fas fa-copy"></i> Copy
        </button>
      </div>

      <!-- Password Length Slider -->
      <div class="mb-3">
        <label for="lengthRange" class="form-label">Password Length: <span id="lengthValue">8</span></label>
        <input type="range" class="form-range" min="8" max="30" id="lengthRange" value="8">
      </div>

      <!-- Password Options (Checkboxes) -->
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="includeNumbers">
        <label class="form-check-label" for="includeNumbers">Include Numbers</label>
      </div>

      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="includeCharacters">
        <label class="form-check-label" for="includeCharacters">Include Special Characters</label>
      </div>

      <!-- Password Strength Indicator -->
      <div class="mb-3">
        <label for="passwordStrength" class="form-label">Password Strength</label>
        <div class="progress">
          <div id="passwordStrength" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>

      <!-- Generate Password Button -->
      <button id="generateBtn" class="btn btn-primary w-100">Generate Password</button>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="toast align-items-center text-white bg-success border-0" role="alert">
      <div class="d-flex">
        <div class="toast-body">
          Password copied to clipboard!
        </div>
        
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        <div class="mt-3">
          <a href="login.php"  style="text-decoration:none;">login</a>
          <a href="signup.php"  style="text-decoration:none;">Signup</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const lengthRange = document.getElementById('lengthRange');
    const lengthValue = document.getElementById('lengthValue');
    const includeNumbers = document.getElementById('includeNumbers');
    const includeCharacters = document.getElementById('includeCharacters');
    const generatedPassword = document.getElementById('generatedPassword');
    const generateBtn = document.getElementById('generateBtn');
    const copyBtn = document.getElementById('copyBtn');
    const toast = document.getElementById('toast');
    const passwordStrength = document.getElementById('passwordStrength');

    // Update the displayed length value
    lengthRange.addEventListener('input', () => {
      lengthValue.textContent = lengthRange.value;
    });

    // Password generator function
    function generatePassword() {
      let length = parseInt(lengthRange.value);
      let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

      if (includeNumbers.checked) {
        characters += '0123456789';
      }

      if (includeCharacters.checked) {
        characters += '!@#$%^&*()_+-={}[]|:;\'<>,.?/~';
      }

      let password = '';
      for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        password += characters[randomIndex];
      }
      generatedPassword.value = password;

      // Password strength logic
      let strength = (length >= 12 && includeNumbers.checked && includeCharacters.checked) ? 100 :
        (length >= 8 && (includeNumbers.checked || includeCharacters.checked)) ? 60 : 30;
      passwordStrength.style.width = `${strength}%`;
      passwordStrength.classList.toggle('bg-danger', strength < 50);
      passwordStrength.classList.toggle('bg-warning', strength >= 50 && strength < 80);
      passwordStrength.classList.toggle('bg-success', strength >= 80);
    }

    // Event listener to generate password
    generateBtn.addEventListener('click', generatePassword);

    // Copy password to clipboard
    copyBtn.addEventListener('click', () => {
      generatedPassword.select();
      document.execCommand('copy');

      // Show toast notification
      const toastBootstrap = new bootstrap.Toast(toast);
      toastBootstrap.show();
    });

    // Generate password on initial load
    window.onload = generatePassword;
  </script>

</body>

</html>