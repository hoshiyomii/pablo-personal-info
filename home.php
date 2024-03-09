<?php
    session_start();
    if(!isset($_SESSION["users"])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link rel = stylesheet href = layout.css>

    <script src="https://kit.fontawesome.com/a7742dae7e.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim" rel="stylesheet">

</head>
<body>

    <div class = "wrapper">

        <header class = "header">
            <img src = "miyo.png" id = "mimomimame"></img>
            <h1 class = "spacer"></h1>
            <nav>
                <ul class = "nav-menu">
                    <li>
                        <a href = "aboutme.php"><button class = "contact-btn nav-btn">About Me</button></a>
                    </li>

                    <li>
                        <a href = "portfolio.php"><button class = "contact-btn nav-btn">Portfolio</button></a>
                    </li>

                    <li>
                        <a href = "blogs.php"><button class = "contact-btn nav-btn">Blogs and Articles</button></a>
                    </li>

                    <li>
                        <a href = "contact.php"><button class = "contact-btn nav-btn">Contacts</button></a>
                    </li>

                    <li>
                        <a href = "resume.php"><button class = "contact-btn nav-btn">Resume</button></a>
                    </li>

                    <li>
                        <a href = "faq.php"><button class = "contact-btn nav-btn">FAQ</button></a>
                    </li>

                    <li>
                        <a href = "policies.php"><button class = "contact-btn nav-btn">Policies and Terms of Services</button></a>
                    </li>

                    <li>
                        <a href = "logout.php"><button class = "contact-btn nav-btn">Log Out</button></a>
                    </li>
                    
                </ul>
            </nav>



        </header>

        <div class = "main">
            <div class = "content">
                <h1 id="hello">Hello Welcome!</h1>
                <p id="here">Hello there I'm Mika call me Mikee, a lazy programmer and artist who loves art and designing website. I am also love playing any types of games like Valorant, Counter Strike 2, Fortnite, and so on. Come and see my stuff.</p>
                <p id="here">Here you can see all of stuff i have such as my artworks, recent website/application I made, and my hobbies as well.</p>
                <!-- <p id="ps">Ps: Commissions, Website and Mobile Design, and Crochets are currently closed</p> -->
            </div>
            
        </div>

        <!-- <div class = "side side-bar-1">
            uncomment to add another side bar
        </div> -->

        <div class = "side side-bar-2">
            <img src = "miyo.jpg" id = "mamamio"></img>
        </div>

        <footer class = "footer">

        </footer>

    </div>

    
</body>
</html>