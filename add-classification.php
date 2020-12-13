<?php
if ($_SESSION['loggedin'] == FALSE || $_SESSION['clientData']['clientLevel'] == 1){
 header("Location: /phpmotors/");
}
// if ($_SESSION['loggedin'] == TRUE) && (isset($_COOKIE['firstname'])){   
// }
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
        <h1>Add Classification</h1>
        <label>Enter a new classification</label><br>
        <input name="classificationName" id="classificationName" type="text" <?php if(isset($classificationName)){echo "value='$classificationName'";} ?> required placeholder = "Enter a new classification"><br>
            <input type = "submit" name = "submit" value = "addClassification" >
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="newClassification">
      </form>
    <footer id = "footer_page">
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?></footer>
</div>
    <script src = "JS/main.js"></script>
</body>
</html>