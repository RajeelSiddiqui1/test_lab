<?php
include("conn.php");

if (isset($_POST["signup"])) {
    $na = $_POST['fullName'];
    $em = $_POST['email'];
    $educ = $_POST['education'];
    $cont = $_POST['contact'];
    $wk = $_POST['work_experience'];
    $sk = $_POST['skills'];
    $pro = $_POST['portfolio'];
    $com = $_POST['comments'];
    $country = $_POST['country'];
    $salary = $_POST['salary'];
    $catId = $_POST['category_id'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    $hash_password = password_hash($pass, PASSWORD_DEFAULT);

    if ($pass == $cpass) {
        // Fix the SQL query by using quotes around strings
        $CheckQuery = "SELECT * FROM `testers` WHERE `full_name`='$na' AND `email`='$em'";
        $CheckResult = mysqli_query($conn, $CheckQuery);

        if (mysqli_num_rows($CheckResult) == 0) {
            $query = "INSERT INTO `testers`(`full_name`, `email`, `education`, `contact_number`, `work_experience`,`salary`, `skills`, `portfolio_url`, `comments`, `country`, `category_id`, `password`, `status`) 
            VALUES ('$na','$em','$educ','$cont','$wk','$salary','$sk','$pro','$com','$country','$catId','$hash_password','pending')";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script>alert('Registration Successful.... wait for admin response');
                window.location.href='signup.php';
                </script>";
            } else {
                echo "<script>alert('Error during registration')</script>";
            }
        } else {
            echo "<script>alert('Name and email already exist.');</script>";
        }
    } else {
        echo "<script>alert('Password didn\'t match.');</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #121212;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
        }

        .card-registration {
            border-radius: 15px;
            background-color: #1f1f1f;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        h3 {
            color: #ff69b4;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
        }

        .form-control {
            background-color: #333;
            border: 1px solid #444;
            color: #fff;
        }

        .form-control:focus {
            background-color: #444;
            border-color: #ff69b4;
            box-shadow: none;
        }

        .btn-primary,
        .btn-secondary {
            background-color: #ff69b4;
            border: none;
            padding: 10px;
            font-weight: 600;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            background-color: #ff3399;
        }

        .step-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #ff69b4;
        }

        label {
            color: #ccc;
        }

        .error-message {
            color: red;
            font-size: 0.875rem;
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        a {
            color: #ff69b4;
            text-decoration: none;
        }

        a:hover {
            color: #ff3399;
        }

        @media (max-width: 576px) {
            .col-md-6 {
                max-width: 100%;
            }
        }

        .position-relative {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 75%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .form-control {
            padding-right: 40px;
            /* Space for the icon */
        }
    </style>
</head>

<body>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-5 mb-4 mt-2">
                <div class="card card-registration">
                    <div class="card-body ">
                        <h3>Sign Up</h3>
                        <form id="registrationForm" method="POST" enctype="multipart/form-data" novalidate>

                            <!-- Step 1: Personal Information -->
                            <div class="step active" id="step1">
                                <div class="step-title">Step 1: Personal Information</div>
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    <input type="text" id="fullName" class="form-control" name="fullName" required>
                                    <div class="error-message" id="nameError"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" required>
                                    <div class="error-message" id="emailError"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="education" class="form-label">Highest Level of Education</label>
                                    <select class="form-select" id="education" name="education" required>
                                        <option value="" disabled selected>Select your education level</option>
                                        <option value="High School">High School</option>
                                        <option value="Associate Degree">Associate Degree</option>
                                        <option value="Bachelors Degree">Bachelors Degree</option>
                                        <option value="Masters Degree">Masters Degree</option>
                                        <option value="PhD">PhD</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contact Number</label>
                                    <input type="tel" id="contact" class="form-control" name="contact" required>
                                    <div class="error-message" id="contactError"></div>
                                </div>

                                <div class="mt-4 d-grid">
                                    <button type="button" class="btn btn-primary btn-lg" id="nextStep">Next</button>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="login.php">Already have an account? Login</a>
                                </div>
                            </div>

                            <!-- Step 2: Account Information -->
                            <div class="step" id="step2">
                                <div class="step-title">Step 2: Account Information</div>

                                <div class="mb-3">
                                    <label for="workExperience" class="form-label">Work Experience (Years)</label>
                                    <input type="number" class="form-control" id="workExperience" name="work_experience" min="0" required>
                                </div>

                                <div class="mb-3">
                                    <label for="country" class="form-label">Select Country</label>
                                    <select class="form-control" id="country" name="country" required>
                                        <option value="" disabled selected>Select your country</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="France">France</option>
                                        <option value="Japan">Japan</option>
                                        <option value="China">China</option>
                                        <option value="India">India</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Finland">Finland</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Chile">Chile</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Venezuela">Venezuela</option>
                                    </select>
                                    <div class="error-message" id="countryError"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="salary">Select your salary range:</label>
                                    <select name="salary" class="form-control" id="salary" required>
                                        <option value="" disabled selected>Select your salary</option>
                                        <option value="$20000-$30000">$20,000 - $30,000</option>
                                        <option value="$30001-$40000">$30,001 - $40,000</option>
                                        <option value="$40001-$50000">$40,001 - $50,000</option>
                                        <option value="$50001-$60000">$50,001 - $60,000</option>
                                        <option value="$60001-$70000">$60,001 - $70,000</option>
                                        <option value="$70001-$80000">$70,001 - $80,000</option>
                                        <option value="$80001-$90000">$80,001 - $90,000</option>
                                        <option value="$90001-$100000">$90,001 - $100,000</option>
                                        <option value="$100001+">$100,001+</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="skills" class="form-label">Skills</label>
                                    <textarea class="form-control" id="skills" name="skills" rows="3" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="portfolio" class="form-label">Portfolio/LinkedIn URL (Optional)</label>
                                    <input type="url" class="form-control" id="portfolio" name="portfolio">
                                </div>
                                <div class="mt-4 d-grid">
                                    <button type="button" class="btn btn-secondary btn-lg" id="prevStep">Back</button>
                                    <button type="button" class="btn btn-primary btn-lg mt-2" id="nextStep">Next</button>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="login.php">Already have an account? Login</a>
                                </div>
                            </div>

                            <div class="step" id="step3">
                                <div class="step-title">Step 2: Account Information</div>
                                <div class="mb-3">
                                    <label for="comments" class="form-label">Additional Comments</label>
                                    <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <option value="" selected>Choose Filed</option>
                                        <?php
                                        $categoryQuery = "SELECT * FROM category";
                                        $categoryResult = mysqli_query($conn, $categoryQuery);
                                        while ($category = mysqli_fetch_assoc($categoryResult)) { ?>
                                            <option value="<?php echo $category['id']; ?>"><?php echo $category['c_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="mb-3 position-relative">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    <span class="toggle-password" onclick="togglePassword('password', 'toggleIconPassword')" style="color: #ff69b4;">
                                        <i class="fas fa-eye" id="toggleIconPassword"></i>
                                    </span>
                                    <div class="error-message" id="passwordError"></div>
                                </div>

                                <div class="mb-3 position-relative">
                                    <label for="cpassword" class="form-label">Confirm Password</label>
                                    <input type="password" id="cpassword" class="form-control" name="cpassword" required>
                                    <span class="toggle-password" onclick="togglePassword('cpassword', 'toggleIconCPassword')" style="color: #ff69b4;">
                                        <i class="fas fa-eye" id="toggleIconCPassword"></i>
                                    </span>
                                    <div class="error-message" id="cpasswordError"></div>
                                </div>


                                <div class="mt-4 d-grid">
                                    <button type="button" class="btn btn-secondary btn-lg" id="prevStep">Back</button>
                                    <button type="submit" class="btn btn-primary btn-lg my-2" name="signup">Submit</button>
                                </div>

                                <div class="text-center mt-3">
                                    <a href="login.php">Already have an account? Login</a>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get elements for next, previous buttons and all step divs
        const nextStepBtns = document.querySelectorAll('.btn.btn-primary');
        const prevStepBtns = document.querySelectorAll('.btn.btn-secondary');
        const steps = document.querySelectorAll('.step');

        // Add event listeners for "Next" buttons
        nextStepBtns.forEach((button, index) => {
            button.addEventListener('click', function() {
                steps[index].classList.remove('active');
                steps[index + 1].classList.add('active');
            });
        });

        // Add event listeners for "Back" buttons
        prevStepBtns.forEach((button, index) => {
            button.addEventListener('click', function() {
                steps[index + 1].classList.remove('active');
                steps[index].classList.add('active');
            });
        });

        // Toggle Password Visibility
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>