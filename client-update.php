<?php
if ($_SESSION['loggedin'] == FALSE){
 header("Location: /phpmotors/");
}
// var_dump($_SESSION['clientData']);
// exit; 

$clientEmail =  $_SESSION['clientData']['clientEmail'];
$clientFirstName =  $_SESSION['clientData']['clientFirstname'];
$clientLastName =  $_SESSION['clientData']['clientLastname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/views.css">
    <title> PHP Motors</title>
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
      <form autocomplete = "off" method = "post" action="/phpmotors/accounts/">
        <h2>Account Update </h2>
    <label>First Name</label>''
            <input type = "text" name = "clientFirstname" id = "clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} 
            elseif(isset($_SESSION['clientData']['clientFirstname'])) {echo "value=$clientFirstName"; } ?> required><br/>
            <label>Last Name</label>
            <input type = "text" name = "clientLastname" id = "clientLastName" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}
             elseif(isset($_SESSION['clientData']['clientLastname'])) {echo "value=$clientLastName"; } ?> required><br/>
            <label>Email</label>
            <input type = "email" name = "clientEmail" id = "clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} 
            elseif(isset( $_SESSION['clientData']['clientEmail'])) {echo "value= $clientEmail"; } ?> required><br/>     
            <input type = "submit" name = "submit" value = "update account">
            <input type="hidden" name="action" value="updateAccount">
            <input type="hidden" name="clientId" value="
      <?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];}  ?> ">
      </form>

      <form  autocomplete = "off" method = "post" action="/phpmotors/accounts/">
      <h2>Change Password</h2>
      <label>Password</label>
            <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br> 
            <input type = "password" name = "clientPassword" id = "clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br/>
            <input type = "submit" name = "submit" value = "change password">
            <input type="hidden" name="action" value="changePassword">
            <input type="hidden" name="clientId" value="
      <?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];}  ?> ">
      </form>
    <footer id = "footer_page">
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?></footer>
</div>
    <script src = "JS/main.js"></script>
</body>
</html>