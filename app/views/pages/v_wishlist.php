<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_wishlist_styles.css"> -->
    
<div class="wishlist_container">
    <h1>My Wishlist</h1>
        <table class="wishlist">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Item Category</th>
                <th></th>
            </tr>
        </thead>
            <tbody>
            <?php foreach ($data['wishlist'] as $item): ?>
                <tr onclick="location.href = '<?php echo URLROOT . '/ItemAds/show/' . $item->p_id;?>';">
                
                    <td><img src="../public/img/items/<?php echo $item->item_image;?>"></td>
                    <td><?php echo $item->item_price;?></td>
                    <td class="capitalize"><?php echo $item->item_category;?></td>
                    <td><button onclick="removeFromWishlist(<?php echo $item->p_id;?>);">Remove AD</button></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
</div>
    </body>
    <script>
        function removeFromWishlist(id){
        fetch("http://localhost/ecotrade/Wishlist/removeItem", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            credentials: "include",
            body: 'ad_id='+id,
            }).then(response => response.text())
            .then(text => {
                if (text){
                    location.reload();
                }
            })
            .catch((error) => {console.error("An error occurred:", error);});
        }
    </script>
</html>
<?php require APPROOT . '/views/inc/components/footer.php'; ?>

       





        
                   

              
                   



    