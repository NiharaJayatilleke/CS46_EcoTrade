<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_addpayment.css">




<div class="w3-row-padding">

<div class="w3-third w3-margin-bottom">
  
  <ul class="w3-ul w3-border w3-center w3-hover-shadow">
    <li class="w3-green w3-xlarge w3-padding-32">Pay and Highlight Your Ad</li>
    <li class="w3-padding-16"><b>Bring it to TOP</li>
    <li class="w3-padding-16"><b>Make more REACH</li>
    <li class="w3-padding-16"><b>Get more CUSTOMERS</li>
    <li class="w3-padding-16"><b>At small COST</li>
    
    <li class="w3-padding-16">
        <div class="AddPayment_d1">
            <div class="AddPayment_d2">
                <h2 class="w3-wide">$25</h2>
                <span class="w3-opacity">per month</span>
            </div>
        </div>
    </li>
    
    <li class="w3-light-grey w3-padding-24">
    <button class="w3-button w3-green w3-padding-large" onclick="redirectToWebsite()">Pay Now</button>
     
    </li>
  </ul>

  <script>
        function redirectToWebsite() {
            // Replace "https://example.com" with the actual URL you want to link to
            window.location.href = "http://localhost/ecotrade/PaymentPortal/index";
        }
    </script>

</div>


</div>
<?php require APPROOT . '/views/inc/components/footer.php';?>