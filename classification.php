<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/views.css">
    <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>
    </head>
   
<body>
<?php  // Get the database connection file 
 require_once '../library/connections.php'; ?>
       <?php // Get the PHP Motors model for use as needed
 require_once '../model/main-model.php'; ?>
    <div class = "content">
    <header id = "header_page">
       <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?> 
       </header>
       <?php
         if(isset($_SESSION['clientData']['clientFirstname'])){
            echo "<a href='/phpmotors/accounts/index.php?action=admin' class='cookieName'>Welcome ";
            echo $_SESSION['clientData']['clientFirstname'];
            echo "</a>";
           }
    ?>
       <nav id = "page_nav">
       <?php echo $navList; ?>
      
       </nav>
<h1><?php echo $classificationName; ?> vehicles</h1>
<?php if(isset($message)){
 echo $message; }
 ?>
<?php if(isset($vehicleDisplay)){
 echo $vehicleDisplay;
} ?>

    <footer id = "footer_page">
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?></footer>
</div>
    <script src = "JS/main.js"></script>
</body>
</html>