

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>

    <link rel = stylesheet href = contacts.css>

    <script src="https://kit.fontawesome.com/a7742dae7e.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">


</head>
<body>

    <div class = "wrapper">

        <header class = "header">
            <img src = "miyo.png" id = "mimomimame"></img>
            <h1 class = "spacer"></h1>
            <nav>
                <ul class = "nav-menu">
                    <li>
                        <a href = "home.php"><button class = "contact-btn nav-btn">Back</button></a>
                    </li>

                    <li>
                        <a href = "portfolio.php"><button class = "contact-btn nav-btn">Portfolio</button></a>
                    </li>

                    <li>
                        <a href = "blogs.php"><button class = "contact-btn nav-btn">Blogs and Articles</button></a>
                    </li>

                    <li>
                        <a href = "aboutme.php"><button class = "contact-btn nav-btn">About Me</button></a>
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
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <h2 class="text-center mb-4">Contact Me</h2>

                        <form action="contact.php" method="post">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter the subject" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter your message" required></textarea>
                            </div>
                            <button type="submit" class="btn nav-btn" name = "submit">Submit</button>
                        </form>
                        <?php
                            if(isset ($_POST["submit"])) {
                                echo "<br><div class= 'alert alert-success'> Your message has been sent to us! </div>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class = "side side-bar-1">
            uncomment to add another side bar
        </div> -->

        <div class = "side side-bar-2">
            <h1 class = "side-header">Hey There!</h1>
            <p>If you have any concern, suggestions, or inquiries. Please feel free to contact me using the form.</p>
            <p>Alternatively, you can reach out using my social media links:</p>
        </div>

        <footer class = "footer">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <h2 class="text-center mb-4">My Social Media</h2>
                        <div class="d-flex justify-content-center">
                            <a href="https://www.facebook.com/Kosettee" target="_blank" class="mr-3"><i class="fab fa-facebook-f social-icon"></i></a>
                            <a href="https://github.com/Sayozuki" target="_blank" class="mr-3"><i class="fab fa-github social-icon"></i></a>
                            <a href="https://twitter.com/YoonaKels" target="_blank" class="mr-3"><i class="fab fa-twitter social-icon"></i></a>
                            <a href="https://www.instagram.com/hinazukia/" target="_blank" class="mr-3"><i class="fab fa-instagram social-icon"></i></a>
                            <a href="https://www.discord.com" target="_blank" class="mr-3"><i class="fab fa-discord social-icon">Discord: yoona_yuna</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    
</body>
</html>