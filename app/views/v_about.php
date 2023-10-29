<?php require APPROOT . '/views/inc/components/header.php'; ?>
    <h1>EcoTrade</h1>
    <h2>Users</h2>
    <?php foreach($data['users'] as $user) : ?>
        <p><?php echo $user->name; ?> <?php echo $user->age; ?></p>
    <?php endforeach; ?>
<?php require APPROOT . '/views/inc/components/footer.php'; ?>
        