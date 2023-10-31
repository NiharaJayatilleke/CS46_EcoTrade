<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>



    <div class="form-container">
        <div class="form-header">
        <center><h1>Reset Moderator Password</h1></center>
        <p><b>Please enter the email address associated with your registered account.</b></p>
        
        </div>
        <form action="" method="POST">

            <!-- email -->
            <div class="form-input-title">Email</div>
            <input type="text" name="email" placeholder="Email" id="email" class="email" value="<?php echo $data['email'];?>" >
            <span class="form-invalid"><?php echo $data['email_err'];?></span>

            
            <!-- submit button -->
            <br>
            <input type="submit" value="Receive Email" class="form-btn">
              
        </form>
    </div>

<?php require APPROOT.'/views/inc/footer.php'; ?>