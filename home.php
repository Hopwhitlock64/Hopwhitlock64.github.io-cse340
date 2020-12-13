<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "CSS/home.css">
    <title>Home</title>
   
</head>
<body>
    <?php // Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php'; ?>
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
            <main>
            <h1>Welcome to PHP Motors!</h1>
                <div class = "delorean">
                    <h2>DMC Delorean</h2>
                        <p>3 Cup holders</p>
                        <p>Superman doors</p>
                        <p>Fuzzy dice!</p>

                        <img class = "ownbtn" src = "images/site/own_today.png" alt = "own today button"> 
                </div>
                <img src = "images/vehicles/delorean.jpg" alt = "delorean picture" id = "delorean">
             
                <h2>Delorean Upgrades</h2>     
                <div class = "upgrades">
                        <!-- <h2>Delorean Upgrades</h2>  -->
                        <div class="box box1"><div class="box box1"><img src = "images/upgrades/flux-cap.png" alt = "flux capaciter"></div></div>
                        <!-- <img  class="box box1" src = "images/upgrades/flux-cap.png" alt = "flux capaciter"> -->
                        <div class="box box2"><div class="box box2"><img src = "images/upgrades/flame.jpg" alt = "flame upgrade"></div></div>
                        <div class="box box3"><div class="box box3"><img src = "images/upgrades/hub-cap.jpg" alt = "hub cap"></div></div>
                        <div class="box box4"><div class="box box4"><img  src = "images/upgrades/bumper_sticker.jpg" alt = "bumper sticker"></div></div>
                       
                    </div>
                    <section class = "reviews">
                        <h3>DMC Delorean Reviews</h3>
                        <ul>
                            <li>"So fast its like traveling in time." (4/5)</li>
                            <li>"Coolest ride on the road." (4/5)</li>
                            <li>"I'm feeling Marty Mcfly!" (5/5)</li>
                            <li>"The most futuristic ride of our day." (4.5/5)</li>
                            <li>"80's livin and I love it!" (5/5)</li>
                        </ul>
                    </section>
            </main>
                    <footer id = "footer_page">
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?></footer>
                </div>
            
           </body>    
</html>