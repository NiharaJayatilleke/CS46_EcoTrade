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
                            
                            <input type="checkbox" id="e_waste" name="categories[]" value="e_waste">
                            <label for="Other">Other</label>
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
                    <button class="nextBtn">
                        <span class="btnText">Next</span> <i class="uil uil-navigator"></i>
                    </button>
                </div>
            </div>

            <!-- second page -->

            <div class="form second ">
                <div class="collector-details vehicle">
                    <span class="collector-title">Vehicle Details</span>
                    
                    <div class="collector-fields">
                        <div class="collector-input-field">
                            <label for="Vehicle">Vehicle type<span class="required">*</span></label>
                            <select name="vehicle_type" id="vehicle_type">
                                <option value="">Select...</option>
                                <option value="Truck">Truck</option>
                                <option value="Van">Van</option>
                                <option value="Pickup Truck">Pickup Truck</option>
                                <option value="Cargo Van">Cargo Van</option>
                                <option value="SUV">SUV (Sport Utility Vehicle)</option>
                                <option value="Compact Car">Compact Car</option>
                                <option value="Electric Vehicle">Electric Vehicle</option>
                                <option value="Bicycle">Bicycle</option>
                                <option value="Motorcycle">Motorcycle</option>
                                <option value="Trailer">Trailer</option>
                            </select>

                        </div>

                        <div class="collector-input-field">
                            <label>Vehicle Registration No. <span class="example">(e.g:- AAB 3456)</span> <span class="required">*</span></label>
                            <input type="text" name="vehicle_reg" id="vehicle_reg" placeholder="Vehicle Registration No" >
                        </div>

                        <div class="collector-input-field">
                            <label>Vehicle Make<span class="required">*</span></label>
                            <input type="text" name="make" id="make" placeholder="Enter Vehicle Make" >
                        </div>

                        <div class="collector-input-field">
                            <label>Vehicle Model<span class="required">*</span></label>
                            <input type="text" name="model" id="model" placeholder="Enter Vehicle Model" >
                        </div>

                        <div class="collector-input-field">
                            <label>Vehicle Insurance Details <span class="required">*</span></label>
                            <input type="text" name="insurance" id="insurance" placeholder="Enter Vehicle Insurance Details" >
                        </div>

                        <div class="collector-input-field">
                            <label>Vehicle Color <span class="required">*</span></label>
                            <input type="text" name="color" id="color" placeholder="Enter Vehicle Color" >
                        </div>
                    </div>
                </div>

                <div class="collector-details location">
                    <span class="collector-title">Select Collecting Locations</span>
                    
                    <div class="collector-fields">
                        <!-- First field (required) -->
                        <div class="collector-input-field">
                            <label>Select District 1<span class="required">*</span></label>
                            <select name="district1" id="district1" class="district-select" required>
                                <option value="">Select...</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Matale">Matale</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Galle">Galle</option>
                                <option value="Matara">Matara</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Vavuniya">Vavuniya</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Kegalle">Kegalle</option>
                            </select>
                        </div>

                        <!-- Second field (optional) -->
                        <div class="collector-input-field">
                            <label>Select District 2</label>
                            <select name="district2" id="district2" class="district-select">
                                <option value="">Select...</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Matale">Matale</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Galle">Galle</option>
                                <option value="Matara">Matara</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Vavuniya">Vavuniya</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Kegalle">Kegalle</option>
                            </select>
                        </div>

                        <!-- Third field (optional) -->
                        <div class="collector-input-field">
                            <label>Select District 3</label>
                            <select name="district3" id="district3" class="district-select">
                            <option value="">Select...</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Matale">Matale</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Galle">Galle</option>
                                <option value="Matara">Matara</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Vavuniya">Vavuniya</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Kegalle">Kegalle</option>
                            </select>
                        </div>

                        <!-- Fourth field (optional) -->
                        <div class="collector-input-field">
                            <label>Select District 4</label>
                            <select name="district4" id="district4" class="district-select">
                            <option value="">Select...</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Matale">Matale</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Galle">Galle</option>
                                <option value="Matara">Matara</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Vavuniya">Vavuniya</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Kegalle">Kegalle</option>
                            </select>
                        </div>

                        <!-- Fifth field (optional) -->
                        <div class="collector-input-field">
                            <label>Select District 5</label>
                            <select name="district5" id="district5" class="district-select">
                            <option value="">Select...</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Matale">Matale</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Galle">Galle</option>
                                <option value="Matara">Matara</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Vavuniya">Vavuniya</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Kegalle">Kegalle</option>
                            </select>
                        </div>
                    </div>
                </div>


                    <div class="buttons">
                        <button class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </button>

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
 