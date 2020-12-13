<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/views.css">
    <title>
    <?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?>
    | PHP Motors</title>
    </head>

<body>
    <div class = "content">
    <header id = "header_page">
       <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; 
       require_once '../library/connections.php';
       require_once '../model/main-model.php';
       require_once '../model/accounts-model.php';
       require_once '../model/reviews-model.php';
       require_once '../library/functions.php';
       ?> 
       
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
    <?php
        if (isset($message)) {
        echo $message;
                }
    ?>
    
<?php  if(isset($carDisplay)){
    echo $tnDisplay;
    echo $carDisplay;
} 
?>
<h1>Customer Reviews</h1>
<?php 
$clientId = $_SESSION['clientData']['clientId'];
if (isset($_SESSION['loggedin'])){
    echo "<h3>Write a review for this vehicle</h3>";
    echo "<label><strong>Screen Name: </strong></label>";
    $screen = substr($_SESSION['clientData']['clientFirstname'], 0, 1) . $_SESSION['clientData']['clientLastname'];
    echo $screen;
    echo "<form action='/phpmotors/reviews/' method='post'>
                     <textarea name = 'reviewText' rows='4' cols='50' id = 'reviewText' required placeholder = 'Enter a review...'></textarea><br>
                     <input type='hidden' name='invId' value='";
    echo "$invId"   ;    
    echo "'>
                        <input type='hidden' name='clientId' value='";
    echo "$clientId";
    echo "'>
                     <input type = 'submit' value = 'Submit' id='submitReviewBtn'>
                                 <input type='hidden' name='action' value='add'>
                     </form>";
}
else{
    echo "<h3 class='signinReview'>You need to sign in to write a review</h3>
    <a href='/phpmotors/accounts/?action=signin' class='signinReview'><strong>Sign In</strong></a>";  
}
    ?>
    <?php
    if(isset($reviewDisplay)){
        echo $reviewDisplay;
    }
    ?>


      <footer id = "footer_page">
         <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?></footer>    
    </div>
    <script src = "JS/main.js"></script>
</body>
</html>