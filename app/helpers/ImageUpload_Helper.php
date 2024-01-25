<?php
    function uploadImage($img, $img_name, $location) {
        $target = PUBROOT.$location.$img_name;

        if (!is_dir(dirname($target))) {
            mkdir(dirname($target), 0777, true);
        }

        if (!move_uploaded_file($img, $target)) {
            error_log("Failed to move uploaded file from $img to $target");
            return false;
        }

        return true;

        // return move_uploaded_file($img, $target);
    }

    function updateImage($old, $img, $img_name, $location) {
        unlink($old);

        $target = PUBROOT.$location.$img_name;

        return move_uploaded_file($img, $target);
    }
    
    // function updateImage($old, $img, $img_name, $location) {
    //     if (!unlink($old)) {
    //         echo "Failed to delete $old";
    //     }
    
    //     $target = PUBROOT.$location.$img_name;
    
    //     if (!move_uploaded_file($img, $target)) {
    //         echo "Failed to upload $img to $target";
    //     }
    // }

    function deleteImage($img) {
        if(unlink($img)){
            return true;
        } else {
            return false;
        }
    }
?>