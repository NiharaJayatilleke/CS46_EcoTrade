<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div class='btn' id="btn"></div>
                <button type="button" class="toggle-btn1" onclick="personal()">Personal Account</button>
                <button type="button" class="toggle-btn2" onclick="collector()">Collector Account</button>
            </div>
            <div class="form-container">
                <form class="input-group" id="personal" action="<?php echo URLROOT; ?>/Users/pBuyerRegister/" method="POST">
                    <h2>personal account</h2>
                    <!-- username -->
                    <input name="username" placeholder="Username" id="username" class="input-field" value="<?php echo $data['username']; ?>">
                    <span class="form-invalid"><?php echo $data['username_err']; ?></span>
                    <!-- email -->
                    <input name="email" placeholder="Email" id="email" class="input-field" value="<?php echo $data['email']; ?>">
                    <span class="form-invalid"><?php echo $data['email_err']; ?></span>
                    <!-- contact number -->
                    <input name="number" placeholder="Contact Number" id="number" class="input-field" value="<?php echo $data['number']; ?>">
                    <span class="form-invalid"><?php echo $data['number_err']; ?></span>
                    <!-- password -->
                    <input name="password" placeholder="Password" id="password" class="input-field" value="<?php echo $data['password']; ?>">
                    <span class="form-invalid"><?php echo $data['password_err']; ?></span>
                    <!-- confirm password -->
                    <input name="confirm_password" placeholder="Confirm Password" id="confirm_password" class="input-field" value="<?php echo $data['confirm_password']; ?>">
                    <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span>
                    <div>
                        <!-- term of service agreement -->
                        <label class="terms" for="agree">
                            <input type="checkbox" class="check-box" name="agree" id="agree" value="yes"/> I agree with the <a href="<?php echo URLROOT; ?>/Users/terms" title="term of services">terms of service</a>
                        </label>
                        <!-- Display the agree_err message -->
                    </div>
                    <div>
                        <span class="form-invalid"><?php echo $data['agree_err']; ?></span>
                    </div>
                    <input type="text" name="user_type" id="user_type" value="rPersonal" required="" hidden="" style="display: none;">
                    <!-- submit button -->
                    <input type="submit" value="Sign Up" class="submit-btn"> <br>
                    <footer>Already have an account? <a href="<?php echo URLROOT; ?>/users/login">Login here</a></footer>
                </form>
                <form class="input-group" id="collector" action="<?php echo URLROOT; ?>/Users/rCollectorRegister/" method="POST" style="display: none;">
                    <h2>collector account</h2>
                    <!-- username -->
                    <input name="username" placeholder="Username" id="username" class="input-field" value="<?php echo $data['username']; ?>">
                    <span class="form-invalid"><?php echo $data['username_err']; ?></span>
                    <!-- email -->
                    <input name="email" placeholder="Email" id="email" class="input-field" value="<?php echo $data['email']; ?>">
                    <span class="form-invalid"><?php echo $data['email_err']; ?></span>
                    <!-- contact number -->
                    <input name="number" placeholder="Contact Number" id="number" class="input-field" value="<?php echo $data['number']; ?>">
                    <span class="form-invalid"><?php echo $data['number_err']; ?></span>
                    <!-- password -->
                    <input name="password" placeholder="Password" id="password" class="input-field" value="<?php echo $data['password']; ?>" >
                    <span class="form-invalid"><?php echo $data['password_err']; ?></span>
                    <!-- confirm password -->
                    <input name="confirm_password" placeholder="Confirm Password" id="confirm_password" class="input-field" value="<?php echo $data['confirm_password']; ?>" >
                    <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span>
                    <div>
                        <!-- term of service agreement -->
                        <label class="terms" for="agree">
                            <input type="checkbox" class="check-box" name="agree" id="agree" value="yes"/> I agree with the <a href="<?php echo URLROOT; ?>/Users/terms" title="term of services">terms of service</a>
                        </label>
                        <!-- Display the agree_err message -->
                    </div>
                    <div>
                        <span class="form-invalid"><?php echo $data['agree_err']; ?></span>
                    </div>
                    <input type="text" name="user_type" id="user_type" value="rCollector" required="" hidden="" style="display: none;">
                    <!-- submit button -->
                    <input type="submit" value="Sign Up" class="submit-btn"> <br>
                    <footer>Already have an account? <a href="<?php echo URLROOT; ?>/users/login">Login here</a></footer>
                </form>
            </div>
        </div>
        <script>
            var x = document.getElementById("personal");
            var y = document.getElementById("collector");
            var z = document.getElementById("btn");

            function collector() {
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px";
                y.style.display = "block";
                x.style.display = "none";
            }

            function personal() {
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0px";
                x.style.display = "block";
                y.style.display = "none";
            }
        </script>
        <?php require APPROOT.'/views/inc/footer.php'; ?>


