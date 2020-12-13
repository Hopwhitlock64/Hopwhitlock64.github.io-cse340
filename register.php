<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/views.css">
    <title>Register</title>
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
    <?php
        if (isset($message)) {
        echo $message;
                }
    ?>
      <?php 
    if ($_SESSION['loggedin'] == TRUE){
        echo "Welcome " .$_SESSION['clientData']['clientFirstname'];
       }
    ?>
      <form autocomplete = "off" method = "post" action="/phpmotors/accounts/index.php">
        <h1>Register</h1>
        <label>First Name</label>
            <input type = "text" name = "clientFirstname" id = "clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} ?> required><br/>
            <label>Last Name</label>
            <input type = "text" name = "clientLastname" id = "clientLastName" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?> required><br/>
            <label>Email</label>
            <input type = "email" name = "clientEmail" id = "clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> required><br/>
            <label>Password</label>
            <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br> 
            <input type = "password" name = "clientPassword" id = "clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br/>
            <input type = "submit" name = "submit" value = "Register">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="registration">
      </form>
    <footer id = "footer_page">
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?></footer>
</div>
    <script src = "JS/main.js"></script>
</body>
</html>