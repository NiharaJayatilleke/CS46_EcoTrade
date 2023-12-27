<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="hero">
        <div class = "form-box">
            <div class = "button-box">
                <div class = 'btn' id = "btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Personal Account</button>
                <button type="button" class="toggle-btn" onclick="signup()"> Collector Account</button>
            </div>
            <form class ="input-group" id="login" action="<?php echo URLROOT; ?>/users/login" method="post">
                <input type="text" class="input-field" name="username" placeholder="Username" required>
                <input type="text" class="input-field" name="email" placeholder="Email" required>
                <input type="password" class="input-field" name="password" placeholder="Password" required>
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="submit" class="submit-btn">Log in</button>
            </form>

            <form class ="input-group" id="signup" action="<?php echo URLROOT; ?>/users/register" method="post">
                <input type="text" class="input-field" name="username" placeholder="Username" required>
                <input type="text" class="input-field" name="email" placeholder="Email" required>
                <input type="password" class="input-field" name="password" placeholder="Password" required>
                <input type="password" class="input-field" name="confirm_password" placeholder="Confirm Password" required>
                <input type="checkbox" class="check-box"><span>I agree to the terms & conditions</span>
                <button type="submit" class="submit-btn">Sign up</button>
            </form>
        </div> 

        <script>
            var x = document.getElementById("login");
            var y = document.getElementById("signup");
            var z = document.getElementById("btn");

            function signup(){
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px";
            }

            function login(){
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0px";
            }

        </script>

<?php require APPROOT.'/views/inc/footer.php'; ?>

