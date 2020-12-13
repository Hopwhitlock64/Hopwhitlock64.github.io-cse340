<?php
if ($_SESSION['loggedin'] == FALSE){
 header("Location: /phpmotors/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/views.css">
    <title>Admin View</title>
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
       <h1><?php
           echo "Welcome " .$_SESSION['clientData']['clientFirstname'];
           echo "  " .$_SESSION['clientData']['clientLastname']; 
        ?></h1>
       <h4>You are logged in</h4>
       <?php if (isset($_SESSION['message'])) echo $_SESSION['message']; ?>
       <ul>
       <li>First Name: <?php  echo $_SESSION['clientData']['clientFirstname']; ?>  </li>
       <li>Last Name: <?php  echo $_SESSION['clientData']['clientLastname']; ?>  </li>
       <li>Email: <?php  echo $_SESSION['clientData']['clientEmail']; ?>  </li>
       <li>Client level:  <?php echo $_SESSION['clientData']['clientLevel']; ?> 
       </ul>
       <h3>Account Management</h3>
       <p>Use this link to update account information</p>
       <?php 
                echo "<p><a href='/phpmotors/accounts/?action=mod' title='Account Management'>Account Management</a></p>";
        ?>

       <h3>Inventory Management</h3>
       <p>Use this link to manage inventory</p>
       <?php 
            if (intval($_SESSION['clientData']['clientLevel']) === 3) {
                echo "<p><a href='/phpmotors/vehicles' title='Vehicle Management'>Vehicle Management</a></p>";
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