<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php';?>

<div class = "rcollector-body">
    <div class="collector-container">
        <header>Recycle Center Registration</header>
        
        <form action="<?php echo URLROOT; ?>/RecycleCenters/register" method="POST" enctype="multipart/form-data">

            <!-- first page -->
            <div class="form first">
                <div class="collector-details companyid">
                    <span class="collector-title">User Identification</span>
                    
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
                            <label>Telephone Number<span class="required">*</span></label>
                            <input type="tel" name = "com_address" id="com_address" placeholder="Enter company telephone number">
                        </div>
                        
                        <div class="collector-input-field">
                            <label>Address<span class="required">*</span></label>
                            <input type="text" name = "address" id="nic" placeholder="Enter Company Address"  >
                        </div>
                        
                    </div>    
                </div>

                <div class="collector-details company">
                    <span class="collector-title">Center Details</span>
                    <div class="collector-fields">
                        
                    <div class="collector-input-field">
                            <label>Company Email<span class="required">*</span></label>
                            <input type="text" name = "com_email" id="com_name" placeholder="Enter Company email">
                        </div>

                        <div class="collector-input-field">
                            <label>Company Name<span class="required">*</span></label>
                            <input type="text" name = "com_name" id="com_name" placeholder="Enter Company name">
                        </div>

                        
                        <div class="collector-input-field">
                            <label>Registration Number<span class="required">*</span></label>
                            <input type="text" name = "reg_number" id="reg_number" placeholder="Enter Company Registration Number"  >
                        </div>
                        
                        <div class="collector-input-field">
                            <label>Company Website : <span class="example"> - URL </span></label>
                            <input type="text" name="vehicle_reg" id="vehicle_reg" placeholder="Vehicle Registration No" >
                        </div>
                        

                        <div class="collector-input-field">
                            <label for="company_type">Type of the Company<span class="required">*</span></label>
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
                            <label for="other">Please specify<span class="required">*</span></label>
                            <input type="text" id="other" name="other">
                        </div>

                    </div>
                        <button class="nextBtn">
                            <span class="btnText">Next</span> <i class="uil uil-navigator"></i>
                        </button>
                </div>
            </div>

            <!-- second page -->
            <div class="form second ">
                <div class="collector-details owner">
                    <span class="collector-title"> Optional Details</span>
                    
                    <div class="collector-fields">
                        <div class="collector-input-field">
                            <label> Owner's Name</label>
                            <input type="text" id="owner_name" name="owner_name" placeholder="Enter your Name" >
                        </div>

                        <div class="collector-input-field">
                            <label>NIC No.</label>
                            <input type="text" id="nic" name="nic" placeholder="Enter NIC" >
                        </div>
                        
                        <div class="collector-input-field">
                            <label>Personal Address</label>
                            <input type="text" id="owner_address" name="owner_address" placeholder="Enter Personal Address" >
                        </div>
                        
                        <div class="collector-input-field">
                            <label>Telephone Number</label>
                            <input type="number" id="telephone" name="telephone" placeholder="Enter telephone number" >
                        </div>
                        

                        <div class="collector-input-field">
                            <label for="operation_days">Do you have recycling equipment?</label>
                            <select name="operation_days" id="operation_days">
                                <option value="">Select...</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="collector-details categories">
                    <span class="collector-title" style="margin-top: 30px;">Select Recycling Categories<span class="required">*</span></span>
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
 