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
            <!-- <form action="<?php echo URLROOT; ?>/Search/filtersechandAds" method="GET"> -->
            <ul class="sub-menu">
                <li><input type="checkbox" id="furnitureCheckbox">Furniture</li>
                <li><input type="checkbox" id="electronicsCheckbox">Electronics</li>
                <li><input type="checkbox" id="clothingCheckbox">Clothing</li>
                <li><input type="checkbox" id="booksCheckbox">Books</li>
                <li><input type="checkbox" id="kitchenwareCheckbox">Kitchenware</li>
                <li><input type="checkbox" id="homedecoCheckbox">Home Deco</li>
                <li><input type="checkbox" id="sportsEquipmentCheckbox">Sports Equipment</li>
                <li><input type="checkbox" id="appliancesCheckbox">Appliances</li>
            <!--                 
            <?php
                $allCategories = ['Furniture', 'Electronics', 'Clothing', 'Books', 'Kitchenware', 'Home Deco', 'Sports Equipment', 'Appliances'];
                $selectedCategory = '';
               
                foreach ($allCategories as $category) {
                    $isChecked = in_array($category, explode(',', $selectedCategory)) ? 'checked' : ''; 
                    echo "<li><input type='checkbox' id='{$category}Checkbox' name='category[]' value='{$category}' {$isChecked}><label for='{$category}Checkbox'><a href='#'>{$category}</a></label></li>";
                }
            ?> -->

            </ul>
            <!-- </form> -->
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

<script>
    var categoryList=['furnitureCheckbox', 'electronicsCheckbox', 'clothingCheckbox', 'booksCheckbox', 'kitchenwareCheckbox', 'homedecoCheckbox', 'sportsEquipmentCheckbox', 'appliancesCheckbox']
    var selectedCategory = [];
    
    categoryList.forEach((item) => {
        var element=document.getElementById(item);
        if (element) {
            element.addEventListener('change', function () {
                toggleContent(item);
            });
        }
    });

        function toggleContent(item) {
            if (selectedCategory.includes(item)) {
                selectedCategory = selectedCategory.filter(x => x !== item);
            }else{
                selectedCategory.push(item);
            }
            console.log(selectedCategory);
            
            var all_ads=document.getElementsByClassName('ad-index-container');
            if(selectedCategory.length<=0){
                // show all ads
                for(var i=0;i<all_ads.length;i++) {
                    var item = all_ads[i];
                    item.style.display="block";
                }
            } else{
                // hide all ads
                for(var i=0;i<all_ads.length;i++) {
                    var item = all_ads[i];
                    item.style.display="none";
                }
                // show relevent ads
                for(var i=0;i<selectedCategory.length;i++) {
                    var ads=document.getElementsByClassName(selectedCategory[i]);
                    console.log(selectedCategory[i]);
                    for(var j=0;j<ads.length;j++) {
                        var item = ads[j];
                        item.style.display="block";
                    }    
                }
            }
            
        }

</script>
