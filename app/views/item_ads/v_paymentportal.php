<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_paymentportal.css">
<div class="paymentpage">
<div class="containerpaymentport">

    <form id="paymentForm">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" name="fullName" placeholder="john deo">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" name="email" placeholder="example@example.com" value="<?php echo $data['user']->email; ?>"  readonly>
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" name="address" placeholder="room - street - locality">
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" name="city" placeholder="mumbai">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" name="state" placeholder="india">
                    </div>
                    <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" name="zipCode" placeholder="123 456">
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="../public/img/payment/images/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" name="nameOnCard" placeholder="mr. john deo">
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" name="creditCardNumber" placeholder="1111-2222-3333-4444">
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" name="expMonth" placeholder="january">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" name="expYear" placeholder="2022">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" name="cvv" placeholder="1234">
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="Proceed to Checkout" class="payment-submit-btn">
        <div>
            <button type="button" onclick="paymentGateway(event)">Pay Here</button>
        </div>

    </form>

</div>    

<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/payment.js"></script>

<?php require APPROOT . '/views/inc/components/footer.php';?>
