<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="sidebar">
    <ul class="nav-links"> 
    <?php if (($_SESSION['userType'])!='pBuyer') : ?>
        <li>
      
            <?php if (($_SESSION['userType'])=='admin') : ?>
                <a href="<?php echo URLROOT ?>/admin/index">
            <?php elseif (($_SESSION['userType'])=='moderator') : ?>
                <a href="<?php echo URLROOT ?>/moderators/index">
            <?php elseif (($_SESSION['userType'])=='center') : ?>
                <a href="<?php echo URLROOT ?>/RecycleCenters/index">
            <?php elseif (($_SESSION['userType'])=='collector') : ?>
                <a href="<?php echo URLROOT ?>/collectors/index">
            <?php elseif (($_SESSION['userType'])=='seller'||'pSeller'||'rSeller') : ?>
                <a href="<?php echo URLROOT ?>/seller/index">
            <?php endif; ?>
                    <i class='bx bxs-user-circle'></i>
                    <span class="link_name">Dashboard</span>
                </a>
       
        </li>
        <li class="edit-profile-link">
            <?php if (($_SESSION['userType'])=='admin') : ?>
                <a href="<?php echo URLROOT ?>/admin/index?#settings-content">
            <?php elseif (($_SESSION['userType'])=='moderator') : ?>
                <a href="<?php echo URLROOT ?>/moderators/index#settings-content">
            <?php elseif (($_SESSION['userType'])=='center') : ?>
                <a href="<?php echo URLROOT ?>/RecycleCenters/index#settings-content">
            <?php elseif (($_SESSION['userType'])=='collector') : ?>
                <a href="<?php echo URLROOT ?>/collectors/index#settings-content">
            <?php elseif (($_SESSION['userType'])=='seller'||'pSeller'||'rSeller') : ?>
                <a href="<?php echo URLROOT ?>/seller/index#settings-content">
            <?php endif; ?>
                    <i class='bx bxs-user-circle'></i>
                    <span class="link_name">Edit profile</span>
                </a>
        </li>
        <?php endif; ?>
  
        <li class="logout-link">
            <a href="<?php echo URLROOT ?>/Users/logout">
                <i class='bx bx-log-out'></i>
                <span class="link_name">Logout</span>
            </a>
        </li>
    </ul>
</div>
