<?php require APPROOT . '/views/inc/header.php'; ?>

<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  .verified_container {
    max-width: 800px;
    margin: 100px auto;
    padding: 100px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center; /* Center content horizontally */
  }

  .verified_container h1 {
    color: #333;
    margin-bottom: 30px;
  }

  .verified_container p{
    color: #666;
    margin-bottom: 10px; /* Add spacing below paragraphs */
  }
  
  .signup-button {
    display: inline-block; /* Make the button inline with text */
    padding: 10px 50px; /* Add padding to the button */
    background-color:#2d7b33 ; /* Green background color */
    color: white; /* White text color */
    border: none; /* Remove button border */
    border-radius: 5px; /* Add rounded corners */
    text-decoration: none; /* Remove underline from link */
    transition: background-color 0.3s ease; 
  }

  .signup-button:hover {
    background-color: #45a049; /* Darken the background color on hover */
  }
</style>

<div class="verified_container">
  <h1>Invalid Token</h1>
  <p>Sorry, the token for this user could not be found.</p>
  <p>Please contact support for assistance.</p>
  <a href="<?php echo URLROOT ?>/Users/register" class="signup-button">Sign Up</a>
</div>

<!-- <?php require APPROOT.'/views/inc/components/footer.php'; ?>  -->

