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
            <!-- <i class='bx bx-collection'></i> -->
            <i class='bx bxs-chevron-down arrow'></i>
        <span class="link_name">All Categories</span>
        </a>
        <!-- <i class='bx bxs-chevron-down arrow'></i> -->
    </div>
    <ul class="sub-menu">
        <!-- <li><a href="#">All</a></li> -->
        <li><a href="#">Furniture</a></li>
        <li><a href="#">Electronics</a></li>
        <li><a href="#">Clothing</a></li>
        <li><a href="#">Books</a></li>
        <li><a href="#">Kitchenware</a></li>
        <li><a href="#">Home Deco</a></li>
        <li><a href="#">Appliances</a></li>
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