<?php
if ($_SESSION['loggedin'] == FALSE || $_SESSION['clientData']['clientLevel'] == 1){
 header("Location: /phpmotors/");
}

// Build the classifications option list
$classifList = '<select name="classificationId" id="classificationId">';
$classifList .= "<option>Choose a Car Classification</option>";
foreach ($classificationsList as $classification) {
 $classifList .= "<option value='$classification[classificationId]'";
 if(isset($classificationId)){
  if($classification['classificationId'] === $classificationId){
   $classifList .= ' selected ';
  }
 } elseif(isset($invInfo['classificationId'])){
 if($classification['classificationId'] === $invInfo['classificationId']){
  $classifList .= ' selected ';
 }
}
$classifList .= ">$classification[classificationName]</option>";
}
$classifList .= '</select>';

?>
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
        <h1>
        <?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?>
    </h1>
        <label>Enter a Make</label><br>
        <input name="invMake" id="invMake" type="text" <?php if(isset($invMake)){ echo "value='$invMake'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?> required placeholder = "Ex. Dodge, Ford, Hyundai..."><br>
            <label>Enter a Model</label><br>
            <input name="invModel" id="invModel" type="text" <?php if(isset($invModel)){ echo "value='$invModel'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?> required placeholder = "Ex. Charger, F-150, Sonata..."><br>
            <label>Enter Description</label><br>
            <input name="invDescription" id="invDesc" type="text" <?php if(isset($invDescription)){echo "value='$invDescription'";} elseif(isset($invInfo['invDescription']) && isset($invInfo['invDescription'])) {echo "value='$invInfo[invDescription]'"; } ?> required><br>
            <label>Enter a price</label><br>
            <input name="invPrice" id="invPrice" type="text" <?php if(isset($invPrice)){echo "value='$invPrice'";}  elseif(isset($invInfo['invPrice']) && isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; } ?> required placeholder = "Ex. 20500.43"><br>
            <label>Enter number in stock</label><br>
            <input name="invStock" id="invStock" type="number" <?php if(isset($invStock)){echo "value='$invStock'";}  elseif(isset($invInfo['invStock']) && isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; } ?> required placeholder = "Use whole numbers"><br>
            <label>Enter a color</label><br>
            <input name="invColor" id="invColor" type="text" <?php if(isset($invColor)){echo "value='$invColor'";}  elseif(isset($invInfo['invColor']) && isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; } ?> required placeholder = "Ex. Red, Blue, Silver..."><br>
            <label>Select classification</label><br>
            <?php echo $classList; ?><br>
            <input type = "submit" name = "submit" value = "Modify/Update Vehicle">
            <input type="hidden" name="action" value="updateVehicle">
            <input type="hidden" name="invId" value="
      <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
      elseif(isset($invId)){ echo $invId; } ?>
      ">
      </form>
    <footer id = "footer_page">
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?></footer>
</div>
    <script src = "JS/main.js"></script>
</body>
</html>