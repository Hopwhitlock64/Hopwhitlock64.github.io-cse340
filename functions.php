<?php
function checkEmail($clientEmail){
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}
// Check the password for the minimum characteristics
function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
    return preg_match($pattern, $clientPassword);
   }
   // builds navigation list
function navigationList($classifications){
    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
     $navList .= "<li><a href='/phpmotors/vehicles/?action=classification&classificationName=".urlencode(
       $classification['classificationName']).
       "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
}

// Build the classifications select list 
function buildClassificationList($classifications){ 
    $classificationList = '<select name="classificationId" id="classificationList">'; 
    $classificationList .= "<option>Choose a Classification</option>"; 
    foreach ($classifications as $classification) { 
     $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
    } 
    $classificationList .= '</select>'; 
    return $classificationList; 
   }
// displays vehicle details
   function buildVehiclesDisplay($vehicles){
    $dv = '<ul id="inv-display">';
    foreach ($vehicles as $vehicle) {
    //  $dv .= '<li>';
    //  $dv .= "<a href='/phpmotors/vehicles/?action=vehicleMain&invId=".urlencode($vehicle['invId'])."'><img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'></a>";
    //  $dv .= '<hr>';
    //  $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";
    //  $dv .= "<p>Price: $ $vehicle[invPrice]</p>";
    //  $dv .= '<hr>';
    //  $dv .= '</li>';
     $dv .= "<a href='/phpmotors/vehicles/?action=vehicleMain&invId=".urlencode($vehicle['invId'])."'>
     <img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'></a>";
    //  $dv .= '<hr>';
     $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";
     $dv .= "<p>Price: $ $vehicle[invPrice]</p>";
     $dv .= '<hr>';
    }
    $dv .= '</ul>';
    return $dv;

   }
function vehicleDetailDisplay($details){
    $vd = '<ul id="car-display">';
    foreach($details as $detail){
        $vd .= '<li>';
        // $vd .= "<img src='$detail[invImage]' alt='Image of $detail[invMake] on phpmotors.com' class = 'carImg'>";
        // $vd .= "<h2>$detail[invMake] $detail[invModel]</h2>";
        // $vd .= "<p>Description: </p>$detail[invDescription]";
        // $vd .= "<p>Price:$ </p>$detail[invPrice]";
        // $vd .= "<p>Stock: </p>$detail[invStock]";
        // $vd .= "<p>Color: </p>$detail[invColor]";
        $vd .= '</li>';
        $vd .= "<img src='$detail[invImage]' alt='Image of $detail[invMake] on phpmotors.com' class = 'carImg'>";
        $vd .= "<h2>$detail[invMake] $detail[invModel]</h2>";
        $vd .= "<p>Description: </p>$detail[invDescription]";
        $vd .= "<p>Price:$ </p>$detail[invPrice]";
        $vd .= "<p>Stock: </p>$detail[invStock]";
        $vd .= "<p>Color: </p>$detail[invColor]";
        // $vd .= "<h1>Reviews</h1>";
        // $vd .= "<a href='/phpmotors/accounts/?action=signin'>signin</a>to write a review";
        // $vd .= "<p></p>$review[reviewText]";
        // $vd .= "<p>Date: </p>$review[reviewDate]";
    }
    // foreach($reviews as $review){
    //         $vd .= "<h1>Reviews</h1>";
    //     $vd .= "<p></p>$review[reviewText]";
    //     $vd .= "<p>Date: </p>$review[reviewDate]";
    // }
    $vd .= '</ul>';
        return $vd;
}

function buildReviewDisplay($reviewData){
    $rd = '';
    foreach($reviewData as $data){
        $firstInitial = substr($data['clientFirstname'], 0, 1);
        $reviewDate = strtotime($data['reviewDate']);
        $reviewDate = date("F j, Y, g:i a", $reviewDate);

        $rd .= '<div class = "reviewDiv">';
        $rd .= '<h2> Reviewer Name: ';
        $rd .= "$firstInitial$data[clientLastname]";
        $rd .= '</h2>';
        $rd .= '<i>';
        $rd .= "$data[reviewText]";
        $rd .= '</i>';
        $rd .= '<br>';
        $rd .= '<p>';
        $rd .= 'Date: ';
        $rd .= "$reviewDate";
        $rd .= '</p>';
        $rd .= '</div>';

    }
    return $rd;
}

function buildReviewDisplayAdmin($reviewData){
    $dv = '';
    foreach($reviewData as $data){
        $firstInitial = substr($data['clientFirstname'], 0, 1);
        $reviewDate = strtotime($data['reviewDate']);
        $reviewDate = date("F j, Y, g:i a", $reviewDate);

        $dv .= '<div class = "reviewDiv">';
        $dv .= '<h2> Reviewer Name:';
        $dv .= "$firstInitial$data[clientLastname]";
        $dv .= '</h2>';
        $dv .= '<i>';
        $dv .= "$data[reviewText]";
        $dv .= '</i>';
        $dv .= '<br>';
        $dv .= '<p>';
        $dv .= 'Date: ';
        $dv .= "$reviewDate";
        $dv .= '</p>';
        $dv .= "<a href='phpmotors/reviews/?action=editReview&reviewId=".urlencode($data['reviewId'])."'>Edit Review</a><br>";
        $dv .= '<br>';
        $dv .= "<a href='phpmotors/reviews/?action=Reviewdelete&reviewId=".urlencode($data['reviewId'])."'>Delete Review</a><br>";
        $dv .= '<br>';
        $dv .= '</div>';

    }
    return $dv;
}

// function vehicleReviewDisplay($reviews){
//     $vd = '<ul id="car-display">';
// foreach($reviews as $review){
//     $vd .= "<h1>Reviews</h1>";
//         $vd .= "<p></p>$review[reviewText]";
//         $vd .= "<p>Date: </p>$review[reviewDate]";
// }
/* * ********************************
*  Functions for working with images
* ********************************* */
function vehicleThumbnailDisplay($tnImages){
    $td = '<ul id="detail-display">';
    foreach($tnImages as $tnImage){
        $td .= '<li>';
        $td .= "<img src='$tnImage[imgPath]' alt='Image of $tnImage[imgName]'>";
        $td .= '</li>';
    }
    $td .= '</ul>';
        return $td;
}



// Adds "-tn" designation to file name
function makeThumbnailName($image) {
    $i = strrpos($image, '.');
    $image_name = substr($image, 0, $i);
    $ext = substr($image, $i);
    $image = $image_name . '-tn' . $ext;
    return $image;
   }

// Build images display for image management view
function buildImageDisplay($imageArray) {
    $id = '<ul id="image-display">';
    foreach ($imageArray as $image) {
     $id .= '<li>';
     $id .= "<img src='$image[imgPath]' title='$image[invMake] $image[invModel] image on PHP Motors.com' alt='$image[invMake] $image[invModel] image on PHP Motors.com'>";
     $id .= "<p><a href='/phpmotors/uploads?action=delete&imgId=$image[imgId]&filename=$image[imgName]' title='Delete the image'>Delete $image[imgName]</a></p>";
     $id .= '</li>';
   }
    $id .= '</ul>';
    return $id;
   }

   // Build the vehicles select list
function buildVehiclesSelect($vehicles) {
    $prodList = '<select name="invId" id="invId">';
    $prodList .= "<option>Choose a Vehicle</option>";
    foreach ($vehicles as $vehicle) {
     $prodList .= "<option value='$vehicle[invId]'>$vehicle[invMake] $vehicle[invModel]</option>";
    }
    $prodList .= '</select>';
    return $prodList;
   }

   // Handles the file upload process and returns the path
// The file path is stored into the database
function uploadFile($name) {
    // Gets the paths, full and local directory
    global $image_dir, $image_dir_path;
    if (isset($_FILES[$name])) {
     // Gets the actual file name
     $filename = $_FILES[$name]['name'];
     if (empty($filename)) {
      return;
     }
    // Get the file from the temp folder on the server
    $source = $_FILES[$name]['tmp_name'];
    // Sets the new path - images folder in this directory
    $target = $image_dir_path . '/' . $filename;
    // Moves the file to the target folder
    move_uploaded_file($source, $target);
    // Send file for further processing
    processImage($image_dir_path, $filename);
    // Sets the path for the image for Database storage
    $filepath = $image_dir . '/' . $filename;
    // Returns the path where the file is stored
    return $filepath;
    }
   }

   // Processes images by getting paths and 
// creating smaller versions of the image
function processImage($dir, $filename) {
    // Set up the variables
    $dir = $dir . '/';
   
    // Set up the image path
    $image_path = $dir . $filename;
   
    // Set up the thumbnail image path
    $image_path_tn = $dir.makeThumbnailName($filename);
   
    // Create a thumbnail image that's a maximum of 200 pixels square
    resizeImage($image_path, $image_path_tn, 200, 200);
   
    // Resize original to a maximum of 500 pixels square
    resizeImage($image_path, $image_path, 500, 500);
   }

   // Checks and Resizes image
function resizeImage($old_image_path, $new_image_path, $max_width, $max_height) {
     
    // Get image type
    $image_info = getimagesize($old_image_path);
    $image_type = $image_info[2];
   
    // Set up the function names
    switch ($image_type) {
    case IMAGETYPE_JPEG:
     $image_from_file = 'imagecreatefromjpeg';
     $image_to_file = 'imagejpeg';
    break;
    case IMAGETYPE_GIF:
     $image_from_file = 'imagecreatefromgif';
     $image_to_file = 'imagegif';
    break;
    case IMAGETYPE_PNG:
     $image_from_file = 'imagecreatefrompng';
     $image_to_file = 'imagepng';
    break;
    default:
     return;
   } // ends the swith
   
    // Get the old image and its height and width
    $old_image = $image_from_file($old_image_path);
    $old_width = imagesx($old_image);
    $old_height = imagesy($old_image);
   
    // Calculate height and width ratios
    $width_ratio = $old_width / $max_width;
    $height_ratio = $old_height / $max_height;
   
    // If image is larger than specified ratio, create the new image
    if ($width_ratio > 1 || $height_ratio > 1) {
   
     // Calculate height and width for the new image
     $ratio = max($width_ratio, $height_ratio);
     $new_height = round($old_height / $ratio);
     $new_width = round($old_width / $ratio);
   
     // Create the new image
     $new_image = imagecreatetruecolor($new_width, $new_height);
   
     // Set transparency according to image type
     if ($image_type == IMAGETYPE_GIF) {
      $alpha = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
      imagecolortransparent($new_image, $alpha);
     }
   
     if ($image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF) {
      imagealphablending($new_image, false);
      imagesavealpha($new_image, true);
     }
   
     // Copy old image to new image - this resizes the image
     $new_x = 0;
     $new_y = 0;
     $old_x = 0;
     $old_y = 0;
     imagecopyresampled($new_image, $old_image, $new_x, $new_y, $old_x, $old_y, $new_width, $new_height, $old_width, $old_height);
   
     // Write the new image to a new file
     $image_to_file($new_image, $new_image_path);
     // Free any memory associated with the new image
     imagedestroy($new_image);
     } else {
     // Write the old image to a new file
     $image_to_file($old_image, $new_image_path);
     }
     // Free any memory associated with the old image
     imagedestroy($old_image);
   } // ends resizeImage function

