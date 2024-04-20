<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php';?>

<div class = "rcollector-body">
    <div class="collector-container">
        <header>Recycle Center Registration</header>
        
        <form action="<?php echo URLROOT; ?>/RecycleCenters/register" method="POST" enctype="multipart/form-data">
            <div class="form first">
                <div class="collector-details personal">
                    <span class="collector-title">Center Details</span>
                    
                    <div class="collector-fields">
                        <div class="collector-input-field">
                            <label>Company Name<span class="required">*</span></label>
                            <input type="text" name = "username" id="username" placeholder="Enter Company name">
                        </div>

                        
                        <div class="collector-input-field">
                            <label>Registration Number<span class="required">*</span></label>
                            <input type="text" name = "email" id="email" placeholder="Enter Registraion Number"  >
                        </div>

                        <div class="collector-input-field">
                            <label>Mobile Number<span class="required">*</span></label>
                            <input type="tel" name = "number" id="number" placeholder="Enter your mobile number">
                        </div>
                        
                        <div class="collector-input-field">
                            <label>Address<span class="required">*</span></label>
                            <input type="text" name = "nic" id="nic" placeholder="Enter Address" required >
                        </div>
                        
<!--           
                        <div class="collector-input-field">
                            <label>Fax (Optional)<span class="required"></span></label>
                            <input type="text" id="address" name="address" placeholder="Enter Fax" required>
                        </div> -->

                        <div class="collector-input-field">
                            <label>Categories<span class="required">*</span></label>
                        <div class="checkbox-options">

                            <input type="checkbox" id="plastic" name="categories[]" value="plastic">
                            <label for="plastic">Plastic</label>
                            
                            <input type="checkbox" id="polythene" name="categories[]" value="polythene">
                            <label for="polythene">Polythene</label>
                            
                            <input type="checkbox" id="paper_cardboard" name="categories[]" value="paper_cardboard">
                            <label for="paper_cardboard">Paper/Cardboard</label>
                            
                            <input type="checkbox" id="glass" name="categories[]" value="glass">
                            <label for="E-Waste">E-Waste</label>
                            
                            <!-- <input type="checkbox" id="e_waste" name="categories[]" value="e_waste">
                            <label for="Other">Other</label> -->
                        </div>
                        </div>


                        <!-- <div class="collector-input-field">
                            <label>Driver's License Information <span class="required">*</span></label>
                            <input type="text" placeholder="Enter Driver's License Information" >
                        </div> -->


                        <!-- <div class="collector-input-field">
                            <label>Date of birth<span class="required">*</span></label>
                            <input type="date" placeholder="Enter your DOB" required>
                        </div> -->
                    </div>    
                </div>

                <div class="collector-details company">
                    <span class="collector-title">Owner Details (Optional)</span>
                    
                    <div class="collector-fields">
                        <div class="collector-input-field">
                            <label> Name</label>
                            <input type="text" id="com_name" name="com_name" placeholder="Enter your Name" >
                        </div>

                        <div class="collector-input-field">
                            <label>Email</label>
                            <input type="text" id="com_email" name="com_email" placeholder="Enter your Email" >
                        </div>

                        <div class="collector-input-field">
                            <label>Personal Address</label>
                            <input type="text" id="com_address" name="com_address" placeholder="Enter Personal Address" >
                        </div>

                        <div class="collector-input-field">
                            <label>Telephone Number</label>
                            <input type="number" id="telephone" name="telephone" placeholder="Enter telephone number" >
                        </div>
<!-- 
                        <div class="collector-input-field">
                            <label for="gender">Type of the Company</label>
                            <select name="company_type" id="company_type">
                                <option value="">Select...</option>
                                <option value="Sole Proprietorship">Sole Proprietorship</option>
                                <option value="Partnership">Partnership</option>
                                <option value="Limited Liability Company (LLC)">Limited Liability Company (LLC)</option>
                                <option value="Corporation">Corporation</option>
                                <option value="Nonprofit Organization">Nonprofit Organization</option>
                                <option value="Social Enterprise">Social Enterprise</option>
                                <option value="Government Agency">Government Agency</option>
                                <option value="Community Organization">Community Organization</option>
                                <option value="Recycling Center">Recycling Center</option>
                                <option value="Waste Management Company">Waste Management Company</option>
                                <option value="other">Other</option>
                            </select>
                        </div> -->

                        <div class="collector-input-field">
                            <label>NIC</label>
                            <input type="text" id="reg_number" name="reg_number" placeholder="Enter NIC" >
                        </div>
                    </div>
                    <!-- <button class="nextBtn">
                        <span class="btnText">Next</span> <i class="uil uil-navigator"></i>
                    </button>
                </div>
            </div> -->


                    <!-- <div class="buttons">
                        <button class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </button> -->

                        <button type="submit" class="submit">
                            <span class="submit">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/collectors/register.js"></script>
 