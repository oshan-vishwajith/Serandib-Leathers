 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <title>Contact Us</title>
    <style>
         
        .theme-switch-wrapper {
            display: none;
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <div class="left-col">
            <img class="logo" src="logo.png" alt="Logo">
        </div>
        <div class="right-col">
            <div class="theme-switch-wrapper">
                <label class="theme-switch" for="checkbox">
                    <input type="checkbox" id="checkbox">
                    <div class="slider round"></div>
                </label>
                <div class="description">Dark Mode</div>
            </div>
            <h1>Contact us</h1>
            <p>Have questions or need something special? Get in touch! You can email, call, or message us on social media. We're happy to help!</p>
            <form id="contact-form" method="post">
                <label for="name">Full name</label>
                <input type="text" id="name" name="name" placeholder="Your Full Name" required>
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Your Email Address" required>
                <label for="message">Message</label>
                <textarea rows="6" placeholder="Your Message" id="message" name="message" required></textarea>
                <button type="submit" id="submit" name="contact_submit">Submit</button>
                <div class="info">
                <h3>Leathercraft@gmail.com</h3>
                <h3>0662258978</h3>
                <h3>Homagama</h3>
            </div>
            </form>
        </div>
    </div>


</body>
</html>


<?php 

if (isset($_POST['contact_submit'])) {
    
    // $name=$_POST['name'];
    // $email=$_POST['email'];
    // $message=$_POST['message'];
    echo "<script>alert('Submitted Successfully')</script>";

    echo "<script>window.open('index.php','_self')</script>";


}

?>