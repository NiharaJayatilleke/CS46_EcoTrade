<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_addpayment.css">

<div class="main">
    <div class="divv">
        <div class="divv-2">
            <div class="divv-3">Make your ad stand out!</div>
            <div class="divv-4">
            Boost your response rate by up to 10 times with Ad Promotions.
            </div>
            <div class="divv-5">
                <div class="divv-6">Select one or more options</div>
                <div class="divv-7">(Optional).</div>
            </div>
            <div class="divv-8">
                <img loading="lazy" src="<?php echo URLROOT?>/public/img/payment/images/new.png" class="img"/>
                <div class="divv-9">Now you can schedule both our packages simultaneously!</div>
            </div>
            <div class="divv-300">
                <div class="divv-22">
                    <div class="divv-23">
                        <div class="divv-24">
                            <div class="divv-25">
                                <img loading="lazy" srcset="<?php echo URLROOT?>/public/img/payment/images/svg.png" class="img-50" />
                                <div class="divv-26">
                                    <div class="divv-27">Premier Visibility Package</div>
                                    <div class="divv-28">
                                    Give your ad the spotlight it deserves by featuring it at the top of our listings for one week or one month!
                                    </div>

                                    <div class="options1">
                                        <label>
                                            <input type="radio" name="package1" value="week" checked>
                                            One Week - Rs. 2000
                                        </label>
                                        <label>
                                            <input type="radio" name="package1" value="month">
                                            One Month - Rs. 7500
                                        </label>
                                        <label>
                                            <input type="radio" name="package1" value="none">
                                            None
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="divv-29">
                                <!-- <div class="divv-30">From Rs 1,100</div> -->
                                <!-- <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/1706ae8f17adcaf7f3403231ebb015c8462dfa93fb8f06f41d3f691158239c4b?" class="img-6" /> -->
                            </div>
                        </div> 

                        <div class="divv-31"></div>
                        <div class="divv-44">
                            <div class="divv-45">
                                <img loading="lazy" src="<?php echo URLROOT?>/public/img/payment/images/alert.png" class="img-10" />
                                URGENT
                            </div>
                            <div class="divv-47">Attention Grabber Package</div>
                        </div>
                        <div class="divv-48">
                            <div class="divv-49">
                            Make your ad stand out from the rest with our Highlight Markers, placing a bright marker on your ad for one week or one month!

                            <div class="options2">
                            <label>
                                <input type="radio" name="package2" value="week">
                                One Week - Rs. 1500
                            </label>
                            <label>
                                <input type="radio" name="package2" value="month">
                                One Month - Rs. 6000
                            </label>
                            <label>
                                <input type="radio" name="package2" value="none">
                                None
                            </label>
                        </div>
                            </div>
                            <div class="divv-50">
                                <!-- <div class="divv-51">From Rs 700</div> -->
                                <!-- <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/1706ae8f17adcaf7f3403231ebb015c8462dfa93fb8f06f41d3f691158239c4b?" class="img-11" /> -->
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </div>
    <div class="divv-57"></div>
    <div class="divv-58">   
        <div class="divv-62">
            <img loading="lazy" src="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" class="img-200" />
            <div class="divv-63">
                <div class="divv-64"><?php echo $data['ad']->item_name ?></div>
                <div class="divv-65">Location: <?php echo $data['ad']->item_location ?></div>
                <div class="divv-66">Rs. <?php echo $data['ad']->item_price ?></div>
            </div>
        </div>
        <div class="divv-67">
            <div class="divv-68">
                <div class="divv-69">
                    <div class="divv-70">Payment summary</div>
                    <div class="divv-71">Bump Up</div>
                </div>
                <div class="divv-72">Rs 2,000</div>
            </div>
            <div class="divv-73"></div>
            <div class="divv-74">
                <div class="divv-75">Total amount</div>
                <div class="divv-76">Rs 2,000</div>
            </div>
        </div>
        <div class="divv-78">
            <div class="divv-80">Pay online</div>
            <img loading="lazy" src="<?php echo URLROOT?>/public/img/payment/images/Untitled design (1).png" class="img-400" />
        </div>
        <a class = "cont-link" href="<?php echo URLROOT ?>/PaymentPortal/index">
            <div class="divv-84">Continue</div> 
        </a>
    </div>
</div>
</div>

<?php require APPROOT . '/views/inc/components/footer.php';?>
