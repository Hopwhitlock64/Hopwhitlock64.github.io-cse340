<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "CSS/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Kanit:wght@500&display=swap">
    <title>Template</title>
    </head>

<body>
<header id = "header_page">
       <?php 
       require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?> 
       </header>
       <nav id = "page_nav">
       <?php echo $navList; ?>
       </nav>

       <h2>Content Title Here</h2>
       <?php  // Get the database connection file 
 require_once 'library/connections.php'; ?>
       <?php // Get the PHP Motors model for use as needed
 require_once 'model/main-model.php'; ?>
       <?php  // Get the array of classifications
	$classifications = getClassifications();
    //var_dump($classifications);
   // exit; ?>
      <form method = "post" action = "index.php">
        <h1>Sign In</h1>
        Email:<br/>
        <input type = "email" name = "email"><br/>
        Password:<br/>
        <input type = "password" name = "password">
        <input type = "submit" value = "Sign In">
      </form>  
    <footer id = "footer_page">
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?></footer>
    <script src = "JS/main.js"></script>
</body>
</html>