<?php
    include "includes/headers.php";
    
    require 'includes/connectdb.php';
    
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>
    <section>
        <h2>Contact</h2>
    </section>
    <section>
        <h2>Fill out the contact form</h2>
        <div>
            <form action="">
                <fieldset>
                    <legend>Personal Information</legend>
                    <div>
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Your name">
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" placeholder="Your@email.com">
                    </div>
                    <div>
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" id="phone" placeholder="555 5 5555 55">
                    </div>
                    <div>
                        <label for="msg">Message:</label>
                        <textarea name="msg" id="msg" placeholder="Write your message here"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Property Information</legend>
                    <div>
                        <label for="vencom">Sell or Buy:</label>
                        <input type="select" name="vencom" id="vencom">
                    </div>
                    <div>
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Contact</legend>
                    <div>
                        <label for="contactForm">Contact Form:</label>
                        <label for="tel">Phone:</label>
                        <input type="radio" name="tel" id="tel">

                        <label for="e-mail">Email:</label>
                        <input type="radio" name="e-mail" id="e-mail">
                    </div>
                    <div>
                        <label for="date">Date:</label>
                        <input type="date" name="date" id="date">
                    </div>
                    <div>
                        <label for="time">Time:</label>
                        <input type="time" name="time" id="time">
                    </div>
                </fieldset>
                <div>
                    <button>Contact Me</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>

<?php
// Include footer file
include "includes/footer.php";
?>