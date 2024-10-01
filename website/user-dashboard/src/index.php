<?php
include("conn.php");

session_start();
if(!isset ($_SESSION['email'])){
header("location:login.php");
exit();
}
?>


<?php
include("header.php");
?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

  
  <div class="container my-3">
<div class="row">
    
    <h2 class="text-center">User Information</h2></h>
    <div class="row my-3">
    <div class="col-md-5 mt-3" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
       <img src="../../../images/products/laboratory-3d-glassware.jpg" alt="" class="mt-3" style="height: 36rem; width:100%;">
    </div>

    <div class="col-md-7 mt-3">
 
            <form action="" method="post" class="p-3 rounded-3" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['full_name']?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']?>" required>
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" class="form-control" id="department" name="department" value="<?php echo $_SESSION['department']?>" required>
                </div>
                <div class="mb-3">
                    <label for="contact_number" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" value="<?php echo $_SESSION['contact_number']?>" required>
                </div>
                <div class="mb-3">
                <label for="country" class="form-label">Select Country</label>
                                    <select class="form-control" id="country" name="country" value="" required>
                                        <option  ><?php echo $_SESSION['country']?></option>
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
                                        <option value="Israel">Israel</option>
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
                </div>
                <div class="mb-3">
                <label for="contact_number" class="form-label">Created at</label>
                <input type="text" class="form-control" 
             value="<?php echo $_SESSION['created_at']?>" readonly>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        
    </div>
    </div>
</div>

</div>

</div>