<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/views.css">
    <title>Sign In</title>
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
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
   }
?>
      <form id = "signinForm" autocomplete = "off" action="/phpmotors/accounts/" method="post">
        <h1>Sign In</h1>
            <label><strong>Email: </strong></label>
            <input type = "email" name = "clientEmail" required><br/>
            <label><strong>Password: </strong></label>
            <span>(Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character)</span><br> 
            <input type = "password" name = "clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
            <input type = "submit" value = "Sign In" id = "signButton">
            <input type="hidden" name="action" value="signin">
      </form>
      <a href = "?action=register">Not a member yet?</a>
    <footer id = "footer_page">
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?></footer>
</div>
    <script src = "JS/main.js"></script>
</body>
</html>