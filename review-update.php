
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
    <title>Update Review</title>
    </head>
    <body>
        
    <form action='/phpmotors/reviews/' method = "post">
        <textarea name = 'reviewText' required placeholder = 'Edit your review...'></textarea><br>
            <input type = 'submit' value = 'Save'>
            <input type='hidden' name='action' value='update'>
                    </form>
    </body>
</html>