<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php';?>

<div class = "rcollector-body">
    <div class="collector-container">
        <header>Recycle Center Registration</header>
        
        <form action="<?php echo URLROOT; ?>/RecycleCenters/register" method="POST" enctype="multipart/form-data">

            <!-- first page -->
            <div class="form first">
                <div class="collector-details personal">
                    <span class="collector-title">Center Details</span>
                    
                    <div class="collector-fields">
                        <div class="collector-input-field">
                            <label>Company Name<span class="required">*</span></label>
                            <input type="text" name = "com_name" id="com_name" placeholder="Enter Company name">
                        </div>

                        
                        <div class="collector-input-field">
                            <label>Registration Number<span class="required">*</span></label>
                            <input type="text" name = "reg_number" id="reg_number" placeholder="Enter Company Registration Number"  >
                        </div>

                        <div class="collector-input-field">
                            <label>Telephone Number<span class="required">*</span></label>
                            <input type="tel" name = "com_address" id="com_address" placeholder="Enter company telephone number">
                        </div>
                        
                        <div class="collector-input-field">
                            <label>Address<span class="required">*</span></label>
                            <input type="text" name = "address" id="nic" placeholder="Enter Company Address"  >
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
                                <option value="Waste Management Company">Waste Management Company</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="collector-input-field" id="other-input" style="display: none;">
                            <label for="other">Please specify:</label>
                            <input type="text" id="other" name="other">
                        </div>
                        
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

                        <div class="collector-input-field">
                            <label>NIC No.</label>
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
                                <option value="Other">Other</option>
                            </select>
                        </div>

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
                    <span class="collector-title">Select Recycling Categories<span class="required">*</span></span>
                    <div class="collector-fields categories">
                        <!-- Checkbox fields -->
                        <div class="collector-input-field">
                            <?php foreach ($data['categories'] as $categories): ?>
                                <label>
                                    <input type="checkbox" name="categories[]" value="<?= $categories->id ?>" >
                                    <?= $categories->name ?>
                                </label>
                            <?php endforeach; ?>
                            <label>
                                <input type="checkbox" id="other-checkbox" name="categories[]" value="other">
                                Other
                            </label>
                            <div id="other-input" style="display: none;">
                                <label for="other-category">Please specify:</label>
                                <input type="text" id="other-category" name="other_category">
                            </div>
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

<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/center/register.js"></script>
 