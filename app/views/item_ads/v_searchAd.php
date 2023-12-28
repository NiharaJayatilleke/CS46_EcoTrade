<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>

<h1>Search Results</h1>

<?php foreach ($data['ads'] as $ad) : ?>
    <div class="ad-item">
        <!-- Display the ad details as needed -->
        <h2><?php echo $ad->item_name; ?></h2>
        <!-- ... other ad details ... -->
    </div>
<?php endforeach; ?>

<?php require APPROOT.'/views/inc/footer.php'; ?>
