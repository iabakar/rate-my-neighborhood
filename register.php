<html>
<head>
    <title> RATE MY NEIGHBORHOOD Registration page </title>
<meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" type="text/css" href="register.css">
</head>

    <body>
    <header>
    <a href="#" class="brand">Rate My Neighborhood</a>
    <div class="navigation">
        <div class="navigation-items">
            <a href="index1.html">Home</a>
            <a href="login.php">Login</a>
            <a href="reviews.php">Review</a>
            <a href="about.html">About Us</a>
            <a href="contact.html">Contact</a>
        </div>
    </div>
    </header>
 
    <div class="login-box">
    <img src="asset/avatar.png" class="avatar">
    <h1> REGISTER </h1>


            <form method="POST" action="includes/user.inc.php">

            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" autofocus="" required="">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required="">
<p>First name:</p>
<input type="text" name="firstName" placeholder="First Name" required="">
            <p>Last Name:</p>

<input type="text" name="LastName" placeholder="Last Name" required="">
            
<input type="submit" name="submit" value="Register">
            <p> existing user?<a href="login.php">  Login Here</a></p><br>




            </form>


        </div>

    </body>
</html>
