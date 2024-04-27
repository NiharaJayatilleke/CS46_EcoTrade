<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php';?>

<div class = "collector-body">
    <div class="collector-container">
        <header>Edit Details</header>
        
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
                            <input type="text" name="nic" id="nic" placeholder="NIC/Passport No." value="<?php echo $data['collector']->nic ?>" required >
                        </div>
                        
                        <div class="collector-input-field">
                            <label for="gender">Gender<span class="required">*</span></label>
                            <select id="gender" name="gender" required>
                                <option value="">Select...</option>
                                <option value="male" <?php echo $data['collector']->gender == 'male' ? 'selected' : ''; ?>>Male</option>
                                <option value="female" <?php echo $data['collector']->gender == 'female' ? 'selected' : ''; ?>>Female</option>
                                <option value="other" <?php echo $data['collector']->gender == 'other' ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </div>

                        <div class="collector-input-field">
                            <label>Address<span class="required">*</span></label>
                            <input type="text" id="address" name="address" placeholder="Enter your Address" value="<?php echo $data['collector']->address ?>" required>
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
                            <input type="text" id="com_name" name="com_name" placeholder="Enter your Company Name" value="<?php echo $data['collector']->com_name ?>" >
                        </div>

                        <div class="collector-input-field">
                            <label>Office Email</label>
                            <input type="text" id="com_email" name="com_email" placeholder="Enter your Company Email" value="<?php echo $data['collector']->com_email ?>">
                        </div>

                        <div class="collector-input-field">
                            <label>Address</label>
                            <input type="text" id="com_address" name="com_address" placeholder="Enter Company Address" value="<?php echo $data['collector']->com_address ?>">
                        </div>

                        <div class="collector-input-field">
                            <label>Telephone Number</label>
                            <input type="number" id="telephone" name="telephone" placeholder="Enter Company telephone number" value="<?php echo $data['collector']->telephone ?>">
                        </div>

                        <div class="collector-input-field">
                            <label for="gender">Type of the Company</label>
                            <select name="company_type" id="company_type">
                                <option value="">Select...</option>
                                <option value="Sole Proprietorship" <?php echo $data['collector']->company_type == 'Sole Proprietorship' ? 'selected' : ''; ?>>Sole Proprietorship</option>
                                <option value="Partnership" <?php echo $data['collector']->company_type == 'Partnership' ? 'selected' : ''; ?>>Partnership</option>
                                <option value="Limited Liability Company (LLC)" <?php echo $data['collector']->company_type == 'Limited Liability Company (LLC)' ? 'selected' : ''; ?>>Limited Liability Company (LLC)</option>
                                <option value="Corporation" <?php echo $data['collector']->company_type == 'Corporation' ? 'selected' : ''; ?>>Corporation</option>
                                <option value="Nonprofit Organization" <?php echo $data['collector']->company_type == 'Nonprofit Organization' ? 'selected' : ''; ?>>Nonprofit Organization</option>
                                <option value="Social Enterprise" <?php echo $data['collector']->company_type == 'Social Enterprise' ? 'selected' : ''; ?>>Social Enterprise</option>
                                <option value="Government Agency" <?php echo $data['collector']->company_type == 'Government Agency' ? 'selected' : ''; ?>>Government Agency</option>
                                <option value="Community Organization" <?php echo $data['collector']->company_type == 'Community Organization' ? 'selected' : ''; ?>>Community Organization</option>
                                <option value="Recycling Center" <?php echo $data['collector']->company_type == 'Recycling Center' ? 'selected' : ''; ?>>Recycling Center</option>
                                <option value="Waste Management Company" <?php echo $data['collector']->company_type == 'Waste Management Company' ? 'selected' : ''; ?>>Waste Management Company</option>
                                <option value="other" <?php echo $data['collector']->company_type == 'other' ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </div>

                        <div class="collector-input-field">
                            <label>Registration Number</label>
                            <input type="text" id="reg_number" name="reg_number" placeholder="Enter the company registration no." value="<?php echo $data['reg_number']->telephone ?>">
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
                    
                    <div class="collector-input-field">
                        <label for="Vehicle">Vehicle type<span class="required">*</span></label>
                        <select name="vehicle_type" id="vehicle_type" required>
                            <option value="">Select...</option>
                            <option value="Cart" <?php echo $data['collector']->vehicle_type == 'Cart' ? 'selected' : ''; ?>>Cart</option>
                            <option value="Tuk" <?php echo $data['collector']->vehicle_type == 'Tuk' ? 'selected' : ''; ?>>Tuk</option>
                            <option value="Pickup Truck" <?php echo $data['collector']->vehicle_type == 'Pickup Truck' ? 'selected' : ''; ?>>Pickup Truck</option>
                            <option value="Cargo Van" <?php echo $data['collector']->vehicle_type == 'Cargo Van' ? 'selected' : ''; ?>>Cargo Van</option>
                            <option value="Compact Car" <?php echo $data['collector']->vehicle_type == 'Compact Car' ? 'selected' : ''; ?>>Car</option>
                            <option value="Electric Vehicle" <?php echo $data['collector']->vehicle_type == 'Electric Vehicle' ? 'selected' : ''; ?>>Electric Vehicle</option>
                            <option value="Bicycle" <?php echo $data['collector']->vehicle_type == 'Bicycle' ? 'selected' : ''; ?>>Bicycle</option>
                            <option value="Motorcycle" <?php echo $data['collector']->vehicle_type == 'Motorcycle' ? 'selected' : ''; ?>>Motorcycle</option>
                            <option value="Trailer" <?php echo $data['collector']->vehicle_type == 'Trailer' ? 'selected' : ''; ?>>Trailer</option>
                        </select>
                    </div>
                        <!-- <div class="collector-input-field" id="otherField" style="display: none;">
                            <label for="other_vehicle">Please specify<span class="required">*</span></label>
                            <input type="text" id="other_vehicle" name="other_vehicle">
                        </div> -->

                        <div class="collector-input-field">
                            <label>Vehicle Registration No <span class="example">(e.g:KY 3456)</span></label>
                            <input type="text" name="vehicle_reg" id="vehicle_reg" placeholder="Vehicle Registration No" value="<?php echo $data['collector']->vehicle_reg; ?>">
                        </div>

                        <div class="collector-input-field">
                            <label>Vehicle Model</label>
                            <input type="text" name="model" id="model" placeholder="Enter Vehicle Model" value="<?php echo $data['collector']->model; ?>">
                        </div>

                        <div class="collector-input-field">
                            <label>Vehicle Color </label>
                            <input type="text" name="color" id="color" placeholder="Enter Vehicle Color" value="<?php echo $data['collector']->color; ?>">
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

                        <button type="submit" class="submit" onclick="confirmTermsUpdate(event)">
                            <span class="submit">Update</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/collectors/register.js"></script>
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/collectors/edit.js"></script>
 