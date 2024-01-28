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
            <div class="icon-link" id="categories-link" >
                <a href="#">
                    <i class='bx bxs-chevron-down arrow'></i>
                    <span class="link_name">All Categories</span>
                </a>
            </div>
            <form action="<?php echo URLROOT; ?>/Search/filtersechandAds" method="GET">
            <ul class="sub-menu">
                <!-- <li><input type="checkbox" id="furnitureCheckbox"><label for="furnitureCheckbox" name="category[]" value="Furniture"><a href="#">Furniture</a></label></li>
                <li><input type="checkbox" id="electronicsCheckbox"><label for="electronicsCheckbox" name="category[]" value="Electronics"><a href="#">Electronics</a></label></li>
                <li><input type="checkbox" id="clothingCheckbox"><label for="clothingCheckbox" name="category[]" value="Clothing"><a href="#">Clothing</a></label></li>
                <li><input type="checkbox" id="booksCheckbox"><label for="booksCheckbox" name="category[]" value="Books"><a href="#">Books</a></label></li>
                <li><input type="checkbox" id="kitchenwareCheckbox"><label for="kitchenwareCheckbox" name="category[]" value="Kitchenware"><a href="#">Kitchenware</a></label></li>
                <li><input type="checkbox" id="homedecoCheckbox"><label for="homedecoCheckbox" name="category[]" value="Home Deco"><a href="#">Home Deco</a></label></li>
                <li><input type="checkbox" id="sportsEquipmentCheckbox"><label for="sportsEquipmentCheckbox" name="category[]" value="Sports Equipment"><a href="#">Sports Equipment</a></label></li>
                <li><input type="checkbox" id="appliancesCheckbox"><label for="appliancesCheckbox" name="category[]" value="Appliances"><a href="#">Appliances</a></label></li> -->
                
            <?php
                $allCategories = ['Furniture', 'Electronics', 'Clothing', 'Books', 'Kitchenware', 'Home Deco', 'Sports Equipment', 'Appliances'];
                $selectedCategory = '';

                foreach ($allCategories as $category) {
                    $isChecked = in_array($category, explode(',', $selectedCategory)) ? 'checked' : ''; // Use explode to convert the comma-separated string to an array
                    echo "<li><input type='checkbox' id='{$category}Checkbox' name='category[]' value='{$category}' {$isChecked}><label for='{$category}Checkbox'><a href='#'>{$category}</a></label></li>";
                }
            ?>

            </ul>
            </form>
        </li>
        <li class="logout-link">
            <a href="<?php echo URLROOT ?>/Users/logout">
                <i class='bx bx-log-out'></i>
                <span class="link_name">Logout</span>
            </a>
        </li>
    </ul>
</div>


<script>
    let categoriesLink = document.getElementById("categories-link");
    let arrow = categoriesLink.querySelector(".arrow");
    let sub_menu = document.querySelector(".sub-menu");
    let logoutLink = document.querySelector(".logout-link");

    // categoriesLink.addEventListener("click", (e) => {
    //     sub_menu.classList.toggle("active");
    //     arrow.classList.toggle("rotate");
    //     logoutLink.style.display = sub_menu.classList.contains("active") ? "none" : "block";
    //     console.log("clicked");
    // });
    categoriesLink.addEventListener("mouseenter", () => {
        sub_menu.classList.add("active");
        arrow.classList.add("rotate");
        logoutLink.style.display = "none";
        console.log("mouseenter");
    });

    categoriesLink.addEventListener("mouseleave", () => {
        sub_menu.classList.remove("active");
        arrow.classList.remove("rotate");
        logoutLink.style.display = "block";
        console.log("mouseleave");
    });

    sub_menu.addEventListener("mouseenter", () => {
        sub_menu.classList.add("active");
        arrow.classList.add("rotate");
        logoutLink.style.display = "none";
    });
    sub_menu.addEventListener("mouseleave", () => {
        sub_menu.classList.remove("active");
        arrow.classList.remove("rotate");
        logoutLink.style.display = "block";
    });


</script>
