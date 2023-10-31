<div class="topnav">
  <div class="items">
    <div class="item logo">
      <a href="">
        <img src="../public/img/logo.png" alt="Logo" class="logo" width="80" height="30">
      </a>
    </div>
    <div class="links">
      <div class="item"><a href="">Home</a></div>
      <div class="item"><a href="<?php echo URLROOT ?>/Users/login">Login</a></div>
      <div class="item"><a href="<?php echo URLROOT ?>/Users/register">SignUp</a></div>
      <div class="item"><a href="<?php echo URLROOT ?>/Item_Ads/itemAd">Post ad</a></div>
      <div class="item"><a href="#wishlist">Saved Ads</a></div>
      <div class="item user-dropdown">
        <div class="dropdown">
          <a href="#" onclick="toggleUserDropdown()" class="user-dropdown-toggle">
            <img src="../public/img/user.png" alt="user" class="user" width="80" height="30">
          </a>
          <div class="dropdown-menu user-dropdown-content" id="userDropdown">
            <a href="<?php echo URLROOT ?>/Users/profile">Profile</a>
            <a href="<?php echo URLROOT ?>/Users/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function toggleUserDropdown() {
  var dropdown = document.getElementById("userDropdown");
  dropdown.classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.user-dropdown-toggle')) {
    var dropdown = document.getElementById("userDropdown");
    if (dropdown.classList.contains('show')) {
      dropdown.classList.remove('show');
    }
  }
}
</script>


<div class="sidebar">
  <div class="sidebar-brand">
    


