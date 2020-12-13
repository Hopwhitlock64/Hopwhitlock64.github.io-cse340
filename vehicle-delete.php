<?php
if ($_SESSION['loggedin'] == FALSE || $_SESSION['clientData']['clientLevel'] == 1){
 header("Location: /phpmotors/");
 exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/views.css">
    <title>
    <?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?>
    | PHP Motors</title>
    </head>

<body>
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
    <?php
        if (isset($message)) {
        echo $message;
                }
    ?>
      <form autocomplete = "off" method = "post" action="/phpmotors/vehicles/index.php">
        <label for ="invMake"> Inventory Make *</label><br>
        <input name="invMake" readonly id="invMake" type="text" <?php if(isset($invMake)){ echo "value='$invMake'"; } ?> 
        required placeholder = "Ex. Dodge, Ford, Hyundai..."  readonly><br>
        
        <label for="invModel">Inventory Model</label><br>
            <input name="invModel" readonly id="invModel" type="text" <?php if(isset($invModel)){ echo "value='$invModel'"; } ?> 
            required placeholder = "Ex. Charger, F-150, Sonata..." readonly><br>
            <label for="invDescription">Description</label><br>
            <input name="invDescription" readonly id="invDesc" type="text" <?php if(isset($invDescription)){echo "value='$invDescription'";} ?> 
            required readonly><br>
            <input type = "submit" value = "Delete Vehicle">
            <input type="hidden" name="action" value="deleteVehicle">
            <input type="hidden" name="invId" value="
      <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
      elseif(isset($invId)){echo $invId; } ?> ">
      </form>
    <footer id = "footer_page">
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?></footer>
</div>
    <script src = "JS/main.js"></script>
</body>
</html>