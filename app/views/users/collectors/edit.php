<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php';?>

<div class = "collector-body">
    <div class="collector-container">
        <header>Collector Registration</header>
        
        <form action="<?php echo URLROOT?>/Collectors/edit" method="POST" enctype="multipart/form-data">
            <div class="form first">
                <div class="collector-details personal">
                    <span class="collector-title">Personal Details</span>
                    
                    <div class="collector-fields">
                        <div class="collector-input-field">
                            <label>Full Name<span class="required">*</span></label>
                            <input type="text" name = "username" id="username" placeholder="Enter your full name" value = "<?php echo $data['user']->username?>"readonly>
                        </div>

                        
                        <div class="collector-input-field">
                            <label>Email<span class="required">*</span></label>
                            <input type="text" name = "email" id="email" placeholder="Enter your email" value = "<?php echo $data['user']->email?>"readonly >
                        </div>

                        <div class="collector-input-field">
                            <label>Mobile Number<span class="required">*</span></label>
                            <input type="tel" name = "number" id="number" placeholder="Enter your mobile number" value = "<?php echo $data['user']->number?>"readonly >
                        </div>
                        
                        <div class="collector-input-field">
                            <label>NIC/Passport No.<span class="required">*</span></label>
                            <input type="text" name="nic" id="nic" placeholder="NIC/Passport No." required>
                        </div>
                        
                        <div class="collector-input-field">
                            <label for="gender">Gender<span class="required">*</span></label>
                            <select id="gender" name="gender" required>
                                <option value="">Select...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="collector-input-field">
                            <label>Address<span class="required">*</span></label>
                            <input type="text" id="address" name="address" placeholder="Enter your Address" required>
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
                    <span class="collector-title">Company Details (Optional)</span>
                    
                    <div class="collector-fields">
                        <div class="collector-input-field">
                            <label>Company Name</label>
                            <input type="text" id="com_name" name="com_name" placeholder="Enter your Company Name" >
                        </div>

                        <div class="collector-input-field">
                            <label>Office Email</label>
                            <input type="text" id="com_email" name="com_email" placeholder="Enter your Company Email" >
                        </div>

                        <div class="collector-input-field">
                            <label>Address</label>
                            <input type="text" id="com_address" name="com_address" placeholder="Enter Company Address" >
                        </div>

                        <div class="collector-input-field">
                            <label>Telephone Number</label>
                            <input type="number" id="telephone" name="telephone" placeholder="Enter Company telephone number" >
                        </div>

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
                        </div>

                        <div class="collector-input-field">
                            <label>Registration Number</label>
                            <input type="text" id="reg_number" name="reg_number" placeholder="Enter the company registration no." >
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
                            <select name="vehicle_type" id="vehicle_type" required>
                                <option value="">Select...</option>
                                <option value="Cart">Cart</option>
                                <option value="Tuk">Tuk</option>
                                <option value="Pickup Truck">Pickup Truck</option>
                                <option value="Cargo Van">Cargo Van</option>
                                <option value="Compact Car">Car</option>
                                <option value="Electric Vehicle">Electric Vehicle</option>
                                <option value="Bicycle">Bicycle</option>
                                <option value="Motorcycle">Motorcycle</option>
                                <option value="Trailer">Trailer</option>
                            </select>
                        </div>
                        <!-- <div class="collector-input-field" id="otherField" style="display: none;">
                            <label for="other_vehicle">Please specify<span class="required">*</span></label>
                            <input type="text" id="other_vehicle" name="other_vehicle">
                        </div> -->

                        <div class="collector-input-field">
                            <label>Vehicle Registration No <span class="example">(e.g:KY 3456)</span></label>
                            <input type="text" name="vehicle_reg" id="vehicle_reg" placeholder="Vehicle Registration No" >
                        </div>

                        <div class="collector-input-field">
                            <label>Vehicle Model</label>
                            <input type="text" name="model" id="model" placeholder="Enter Vehicle Model" >
                        </div>

                        <div class="collector-input-field">
                            <label>Vehicle Color </label>
                            <input type="text" name="color" id="color" placeholder="Enter Vehicle Color" >
                        </div>
                    </div>
                </div>

                <div class="collector-details location">
                    <span class="collector-title">Select Collecting Locations<span class="required">*</span></span>
                    <div class="collector-fields districts">
                        <!-- Checkbox fields -->
                        <div class="collector-input-field">
                            <?php foreach ($data['districts'] as $district): ?>
                                <label>
                                    <input type="checkbox" name="districts[]" value="<?= $district->id ?>" >
                                    <?= $district->name ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


                    <div class="buttons">
                        <button type="button" class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </button>

                        <button type="submit" class="submit" onclick="confirmTerms(event)">
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
 