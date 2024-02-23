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
                            <input type="text" placeholder="Enter your full name" >
                        </div>

                        <div class="collector-input-field">
                            <label for="gender">Gender<span class="required">*</span></label>
                            <select id="gender" name="gender" >
                                <option value="">Select...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="collector-input-field">
                            <label>Email<span class="required">*</span></label>
                            <input type="text" placeholder="Enter your email" >
                        </div>

                        <div class="collector-input-field">
                            <label>NIC/Passport No.<span class="required">*</span></label>
                            <input type="text" placeholder="NIC/Passport No." >
                        </div>

                        <!-- <div class="collector-input-field">
                            <label>Mobile Number<span class="required">*</span></label>
                            <input type="number" placeholder="Enter your mobile number" required>
                        </div> -->

                        <div class="collector-input-field">
                            <label>Driver's License Information <span class="required">*</span></label>
                            <input type="text" placeholder="Enter Driver's License Information" >
                        </div>

                        <div class="collector-input-field">
                            <label>Address<span class="required">*</span></label>
                            <input type="text" placeholder="Enter your home Address" >
                        </div>

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
                            <input type="text" placeholder="Enter your Company Name" >
                        </div>

                        <div class="collector-input-field">
                            <label>Office Email</label>
                            <input type="text" placeholder="Enter your Company Email" >
                        </div>

                        <div class="collector-input-field">
                            <label>Address</label>
                            <input type="text" placeholder="Enter Company Address" >
                        </div>

                        <div class="collector-input-field">
                            <label>Telephone Number</label>
                            <input type="number" placeholder="Enter Company telephone number" >
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
                            <input type="text" placeholder="Enter the company registration no." >
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
                            <input type="text" placeholder="Vehicle Registration No" >
                        </div>

                        <div class="collector-input-field">
                            <label>Vehicle Make</label>
                            <input type="text" placeholder="Enter Vehicle Make" >
                        </div>

                        <div class="collector-input-field">
                            <label>Vehicle Model</label>
                            <input type="text" placeholder="Enter Vehicle Model" >
                        </div>

                        <div class="collector-input-field">
                            <label>Vehicle Insurance Details <span class="required">*</span></label>
                            <input type="text" placeholder="Enter Vehicle Insurance Details" >
                        </div>

                        <div class="collector-input-field">
                            <label>Vehicle Color <span class="required">*</span></label>
                            <input type="text" placeholder="Enter Vehicle Color" >
                        </div>
                    </div>
                </div>

                <div class="collector-details company">
                    <span class="collector-title">Company Details (Optional)</span>
                    
                    <div class="collector-fields">
                        <div class="collector-input-field">
                            <label>Company Name</label>
                            <input type="text" placeholder="Enter your Company Name" >
                        </div>

                        <div class="collector-input-field">
                            <label>Office Email</label>
                            <input type="text" placeholder="Enter your Company Email" >
                        </div>

                        <div class="collector-input-field">
                            <label>Address</label>
                            <input type="text" placeholder="Enter Company Address" >
                        </div>

                        <div class="collector-input-field">
                            <label>Telephone Number</label>
                            <input type="number" placeholder="Enter Company telephone number" >
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
                            <input type="text" placeholder="Enter the company registration no." >
                        </div>
                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>

                        <button class="nextBtn">
                            <span class="btnText">Next</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/collectors/register.js"></script>

<!-- <script>
    const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input");

    nextBtn.addEventListener("click", () => {
        allInput.forEach(input => {
            if (input.value !== "") {
                form.classList.add('secActive');
            } else {
                form.classList.remove('secActive');
            }
        });
    });

    backBtn.addEventListener("click", () => form.classList.remove('secActive'));

</script> -->
