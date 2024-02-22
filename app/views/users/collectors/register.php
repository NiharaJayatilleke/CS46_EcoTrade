<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/components/topnavbar.php';?>

<div class = "collector-body">
    <div class="collector-container">
        <header>Collector Registration</header>
        
        <form action="#">
            <div class="form first">
                <div class="collector-details personal">
                    <span class="collector-title">Personal Details</span>
                    
                    <div class="collector-fields">
                        <div class="collector-input-field">
                            <label>Full Name<span class="required">*</span></label>
                            <input type="text" placeholder="Enter your full name" required>
                        </div>
                        <div class="collector-input-field">
                            <label>Email<span class="required">*</span></label>
                            <input type="text" placeholder="Enter your email" required>
                        </div>
                        <div class="collector-input-field">
                            <label>NIC/Passport No.<span class="required">*</span></label>
                            <input type="text" placeholder="NIC/Passport No." required>
                        </div>
                        <div class="collector-input-field">
                            <label>Address<span class="required">*</span></label>
                            <input type="text" placeholder="Enter your home Address" required>
                        </div>
                        <!-- <div class="collector-input-field">
                            <label>Date of birth<span class="required">*</span></label>
                            <input type="date" placeholder="Enter your DOB" required>
                        </div> -->

                        <div class="collector-input-field">
                            <label>Mobile Number<span class="required">*</span></label>
                            <input type="number" placeholder="Enter your mobile number" required>
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
                    </div>
                </div>

                <div class="collector-details company">
                    <span class="collector-title">Company Details (Optional)</span>
                    
                    <div class="collector-fields">
                        <div class="collector-input-field">
                            <label>Company Name</label>
                            <input type="text" placeholder="Enter your Company name" >
                        </div>
                        <div class="collector-input-field">
                            <label>Office Email</label>
                            <input type="text" placeholder="Enter your Company email" >
                        </div>
                        <div class="collector-input-field">
                            <label>Address</label>
                            <input type="text" placeholder="Enter your Company Address" >
                        </div>

                        <div class="collector-input-field">
                            <label>Telephone Number</label>
                            <input type="number" placeholder="Enter your mobile number" >
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
                            <input type="text" placeholder="Enter the registration no." required>
                        </div>
                    </div>
                </div>
            
            </div>
        </form>
    </div>
</div>