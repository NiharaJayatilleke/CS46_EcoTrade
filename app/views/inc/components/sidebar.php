<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="sidebar">
  
<ul class="nav-links">
<li>
    <a href="<?php echo URLROOT ?>/Users/profile">
    <i class='bx bxs-user-circle'></i>
        <span class="link_name">Profile</span>
    </a>
</li>
<li>
    <div class="icon-link">
        <a href="#">
            <i class='bx bx-collection'></i>
        <span class="link_name">Category</span>
    </a>
    <i class='bx bxs-chevron-down arrow'></i>
    </div>
    <ul class="sub-menu">
        <li><a href="#">cardbord</a></li>
        <li><a href="#">plastic</a></li>
        <li><a href="#">xxx</a></li>
    </ul>
</li>
<li>
    <a href="<?php echo URLROOT ?>/Users/logout">
        <i class='bx bx-log-out'></i>
        <span class="link_name">Logout</span>
</a>
</li>
</ul>
</div>

<script>
    let arrow = document.querySelectorAll(".arrow")[0];
    let sub_menu = document.querySelectorAll(".sub-menu")[0];

    arrow.addEventListener("click", (e)=>{
        sub_menu.classList.toggle("active");
        // arrow.classList.toggle("rotate");

        console.log("clicked");
    });
    


</script>