<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form </title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="left">
                <img
                    src="https://media.istockphoto.com/id/1290300704/vector/man-in-call-center-support-customer-support-answering-questions.jpg?s=612x612&w=0&k=20&c=ybVXSP9FUI8j4coZGtUbO363vWf4eqn9PwmjHT6uu4w=">
            </div>
            <div class="right">
                <h2>Contact Us</h2>
                <div id="after_submit"><?php echo $error; ?></div>
                <div class=" contact">
                    <div class="form-container">
                        <form class="form" id="contact_form" action="index.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="username">
                                <input type="text" placeholder="Enter your Name" name="name" value="<?php echo remember_var("name")?>">
                            </div>
                            <div class="useremail">
                                <input type="email" placeholder="Enter your Email" name="email" value="<?php echo remember_var("email")?>">
                            </div>
                            <div class="usermessage">
                                <textarea placeholder="Enter your Message" name="message" cols="30"><?php echo remember_var("message")?></textarea>
                            </div>
                            <div class="usersubmit">
                                <input id="submit" name="submit" type="submit" value="Send email" />
                                <input id="clear" name="clear" type="reset" value="clear form" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>