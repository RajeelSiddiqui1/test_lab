<?php
include("conn.php");

session_start();
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}
?>

<?php include("header.php"); ?>

<main class="main">


    

  <section id="tester" class="doctors section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Tester's</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
            <form method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <input type="text" id="search-bar" name="search" class="form-control" placeholder="Search for testers">
            </div>
        </form>
            </div>
        </div>
    </div>

    <!-- Area where search results will be displayed -->
    <div class="container" id="search-results">
        <!-- Results will be appended here dynamically via AJAX -->
    </div>

    <div class="container mt-3">
      <div class="row gy-4">
        <?php
        $query = "
          SELECT p.id AS id, p.fullname, p.email, p.education, p.skills, p.work_experince, p.protfolio, p.country, p.image, c.c_name
          FROM show_tester_to_user p
          INNER JOIN category c ON p.category_id = c.id
          WHERE p.category_id = c.id;
        ";

        // Run the query
        $result = mysqli_query($conn, $query);

        // Display the testers' details if records are found
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="col-lg-6 mt-3" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic">
                <img src="../images/testers/<?php echo $row['image']; ?>" height="150" width="100%" alt="Tester Image">
              </div>
              <div class="member-info">
                <h4><?php echo $row['fullname']; ?></h4>
                <span><?php echo $row['email']; ?></span>
                <p><strong class="text-black">Education: </strong><?php echo $row['education']; ?></p>
                <h6><strong class="text-black">Category: </strong><?php echo $row['c_name']; ?></h6>
                <!-- Modal Trigger Button -->
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#testerModal" 
                  data-fullname="<?php echo $row['fullname']; ?>"
                  data-email="<?php echo $row['email']; ?>"
                  data-education="<?php echo $row['education']; ?>"
                  data-skills="<?php echo $row['skills']; ?>"
                  data-work_experince="<?php echo $row['work_experince']; ?>"
                  data-protfolio="<?php echo $row['protfolio']; ?>"
                  data-country="<?php echo $row['country']; ?>"
                  data-image="<?php echo $row['image']; ?>"
                >
                  View Details
                </button>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section><!-- /Doctors Section -->
</main>

<!-- Modal Structure -->
<div class="modal fade" id="testerModal" tabindex="-1" aria-labelledby="testerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-5">
            <!-- Image will be shown here -->
            <img src="" id="testerImage" class="img-fluid" alt="Tester Image">
          </div>
          <div class="col-md-7 text-black"> 
            <!-- Tester Info will be shown here -->
            <h4 id="testerFullname" class="text-black"></h4> 
            <p><strong class="text-black">Email:</strong> <span id="testerEmail" class="text-black"></span></p> 
            <p><strong class="text-black">Education:</strong> <span id="testerEducation" class="text-black"></span></p> 
            <p><strong class="text-black">Skills:</strong> <span id="testerSkills" class="text-black"></span></p> 
            <p><strong class="text-black">Work Experience:</strong> <span id="testerWorkExperience" class="text-black"></span></p> 
            <p><strong class="text-black">protfolio:</strong> <a href="#" target="_blank" id="testerprotfolio" class="text-black">View protfolio</a></p> 
            <p><strong class="text-black">Country:</strong> <span id="testerCountry" class="text-black"></span></p> 
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var testerModal = document.getElementById('testerModal');
  testerModal.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget;
    var fullname = button.getAttribute('data-fullname');
    var email = button.getAttribute('data-email');
    var education = button.getAttribute('data-education');
    var skills = button.getAttribute('data-skills');
    var workExperience = button.getAttribute('data-work_experince');
    var protfolio = button.getAttribute('data-protfolio');
    var country = button.getAttribute('data-country');
    var image = button.getAttribute('data-image');

    // Update modal content
    document.getElementById('testerFullname').textContent = fullname;
    document.getElementById('testerEmail').textContent = email;
    document.getElementById('testerEducation').textContent = education;
    document.getElementById('testerSkills').textContent = skills;
    document.getElementById('testerWorkExperience').textContent = workExperience;
    document.getElementById('testerprotfolio').setAttribute('href', protfolio);
    document.getElementById('testerCountry').textContent = country;
    document.getElementById('testerImage').setAttribute('src', '../images/testers/' + image);
  });
});

$(document).ready(function() {
    $('#search-bar').keyup(function() {
        let searchQuery = $(this).val(); // Get the search term

        if (searchQuery.length > 0) {
            $.ajax({
                url: 'live/tester.php',
                method: 'POST',
                data: { search: searchQuery },
                success: function(data) {
                    $('#search-results').html(data); 
                }
            });
        } else {
            $('#search-results').html(''); 
        }
    });
});
</script>

<?php include("footer.php"); ?>
