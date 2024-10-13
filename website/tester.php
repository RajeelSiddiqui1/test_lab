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

    <div class="container">
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
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
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
                  data-work_experience="<?php echo $row['work_experince']; ?>"
                  data-portfolio="<?php echo $row['protfolio']; ?>"
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
            <p><strong class="text-black">Portfolio:</strong> <a href="#" target="_blank" id="testerPortfolio" class="text-black">View Portfolio</a></p> 
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
// Populate the modal with data when triggered
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

<?php include("footer.php"); ?>