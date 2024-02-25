<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="ag-page-404">
    <div class="ag-toaster-wrap">
        <div class="ag-toaster">
            <div class="ag-toaster_back"></div>
            <div class="ag-toaster_front">
                <div class="ag-toaster_lever js-toaster_lever"></div>
            </div>
            <div class="ag-toaster_toast-handler">
                <div class="ag-toaster_shadow"></div>
                <div class="js-toaster_toast ag-toaster_toast js-ag-hide"></div>
            </div>
        </div>

        <canvas id="canvas-404" class="ag-canvas-404"></canvas>
        <img class="ag-canvas-404_img" src= "../public/img/404/smoke.png">
    </div>
</div>
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/404.js"></script>


<?php require APPROOT . '/views/inc/footer.php'; ?>