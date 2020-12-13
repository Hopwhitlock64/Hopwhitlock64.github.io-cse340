<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; 
       require_once '../library/connections.php';
       require_once '../model/main-model.php';
       require_once '../model/accounts-model.php';
       require_once '../model/reviews-model.php';
       require_once '../library/functions.php';
       ?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/views.css">
    <title>Delete Review</title>
    </head>
    <body>
    <form autocomplete = "off" method = "post" action="/phpmotors/reviews/">
        <label for ="reviewText"> Review Text </label><br>
        <input name="reviewText" readonly id="reviewText" type="text" <?php if(isset($reviewText)){ echo "value='$reviewText'"; } ?> required readonly><br>
            <input type = "submit" value = "Delete Review">
            <input type="hidden" name="action" value="reviewDelete">
            <input type="hidden" name="reviewId" value="
      <?php if(isset($reviewData['reviewId'])){ echo $reviewData['reviewId'];} 
      elseif(isset($reviewData)){echo $reviewData; } ?> ">

    <form action = '/phpmotors/reviews/' method = 'post'>
    <input type = 'submit' value = 'Submit' id='submitReviewBtn'>
    <input type='hidden' name='action' value='delete'>
    </body>
</html>