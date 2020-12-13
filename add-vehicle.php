<?php
if ($_SESSION['loggedin'] == FALSE || $_SESSION['clientData']['clientLevel'] == 1){
 header("Location: /phpmotors/");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/views.css">
    <title>Add Vehicle</title>
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
       <?php
         if(isset($_SESSION['clientData']['clientFirstname'])){
            echo "<a href='/phpmotors/accounts/index.php?action=admin' class='cookieName'>Welcome ";
            echo $_SESSION['clientData']['clientFirstname'];
            echo "</a>";
           }
    ?>
       </nav>
    <?php
        if (isset($message)) {
        echo $message;
                }
    ?>
      <form autocomplete = "off" method = "post" action="/phpmotors/vehicles/index.php">
        <h1>Add a vehicle</h1>
        <label>Enter a Make</label><br>
        <input name="invMake" id="invMake" type="text" <?php if(isset($invMake)){echo "value='$invMake'";} ?> required placeholder = "Ex. Dodge, Ford, Hyundai..."><br>
            <label>Enter a Model</label><br>
            <input name="invModel" id="invModel" type="text" <?php if(isset($invModel)){echo "value='$invModel'";} ?> required placeholder = "Ex. Charger, F-150, Sonata..."><br>
            <label>Enter Description</label><br>
            <input name="invDescription" id="invDesc" type="text" <?php if(isset($invDescription)){echo "value='$invDescription'";} ?> required><br>
            <label>Enter a price</label><br>
            <input name="invPrice" id="invPrice" type="text" <?php if(isset($invPrice)){echo "value='$invPrice'";} ?> required placeholder = "Ex. 20500.43"><br>
            <label>Enter number in stock</label><br>
            <input name="invStock" id="invStock" type="number" <?php if(isset($invStock)){echo "value='$invStock'";} ?> required placeholder = "Use whole numbers"><br>
            <label>Enter a color</label><br>
            <input name="invColor" id="invColor" type="text" <?php if(isset($invColor)){echo "value='$invColor'";} ?> required placeholder = "Ex. Red, Blue, Silver..."><br>
            <label>Select classification</label><br>
            <?php echo $classList; ?><br>
            <input type = "submit" name = "submit" value = "Add Vehicle">
            <input type="hidden" name="action" value="manageForm">
      </form>
    <footer id = "footer_page">
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?></footer>
</div>
    <script src = "JS/main.js"></script>
</body>
</html>