<!-- <!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/contact.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/style.css">

	<link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-all.min.css">
	<link rel="stylesheet" href="css/master.css">
	<title></title>

</head> -->



<!DOCTYPE html>
<html lang="en">

<head>
	<title>RATE MY NEIGHBORHOOD</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-all.min.css">

 <link rel="stylesheet" href="css/master.css">

<style>
* {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
    background-color: #FAF9F6;
}

section {
    height: 100vh;
    width: 100%;
}

header {

    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 200px;
    transition: 0.5s ease;
}

header .brand {
    color: black;
    font-size: 1.5em;
    font-weight: 700;
    text-transform: uppercase;
    text-decoration: none;
}

header .navigation .navigation-items a{
    position: relative;
    color: black;
    font-size: 1em;
    font-weight: 500;
    text-decoration: none;
    margin-left: 20px;
    transition: 0.3s ease;
}

header .navigation .navigation-items a:before{
    width: 100%;
}
body {
    background-color: #FAF9F6;
}
.heading {
    text-transform: uppercase;
    font-size: 3.5rem;
    letter-spacing: 3px;
    margin-top: 3rem;
    margin-right: -3px;
    text-align: center;
    color: #333;
    position: relative;
}

.heading::after {
    content:"";
    width: 10rem;
    height: .8rem;
    background-color: black;
    position: absolute;
    bottom: -2rem;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 2rem;
}


</style>
</head>

<body>
<header>
<a href="#" class="brand">Rate My Neighborhood</a>
	<div class="navigation">
        <div class="navigation-items">
            <a href="index.html">Home</a>
            <a href="login.php">Login</a>
            <a href="reviews.php">Review</a>
            <a href="about.html">About Us</a>
            <a href="contact.html">Contact</a>
        </div>
    </div>
</header>
			


	<div class="container">
		<!-- <h3>Navbar Forms</h3>
  <p>Use the .navbar-form class to vertically align form elements (same padding as links) inside the navbar.</p> -->

		<?php

		session_start();

		if ($_SERVER["REQUEST_METHOD"] == "GET") {

			if (isset($_GET["zipcode"])) {

				$_SESSION["zipcode"] = $_GET["zipcode"];


				// $zipcode = $_SESSION['zipcode']; 
				//14420

			} else {
				$_SESSION['zipcode'] = 14420;
			}
		}
		require('includes/mysqli_connect.php');


		$zipcode = $_SESSION["zipcode"];

		//$zipcode = 13208; 


		$query = "SELECT ROUND(AVG(Livability),2) as 'Livability' ,round(avg(Amenities),2) as'Amenities', round(AVG(CostOfLiving),2) as 'CostOfLiving',round( avg(Crime),2) as 'Crime', round( AVG(Employment),2) as 'Employment', round( avg(housing),2) as 'housing', round( AVG(Schools),2) as 'Schools' FROM reviews WHERE zipcode = '$zipcode'";

		$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));

		$numrows = mysqli_num_rows($result);


		if ($numrows <= 0) {
			echo "Unable to retrieve orders for $zipcode Please Try again";

			exit();
		}

		$row = mysqli_fetch_array($result);

if($row['Livability'] == 0) {

$row['Livability'] = 0;
$row['Amenities']= 0; 
$row['CostOfLiving'] = 0; 
$row['Crime'] = 0; 
$row['Employment'] = 0; 
$row['housing'] = 0; 
$row['Schools'] = 0; 


}




	//($row);
// //		print($zipcode);

		?>

		<br><br><br>
		<div class="mapouter">
			<div class="gmap_canvas"><iframe width="600" height="700" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo ($zipcode); ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br>
				<style>
					.mapouter {
						position: relative;
						text-align: right;
						height: 500px;
						width: 600px;
					}
				</style><a href="https://www.embedgooglemap.net">embed a google map</a>
				<style>
					.gmap_canvas {
						overflow: hidden;
						background: none !important;
						height: 500px;
						width: 600px;
					}
				</style>

			</div>
		</div>
		<br><br>
		<div style=" position: absolute;
top: 50px;
right: 200px; font-size: medium;">

			<form method="POST" action="reviews.inc.php">
				<div class="form-group">

					<h2>
						</h>How Do You Rate <?php echo ($zipcode); ?> </h2>

					<label>Livability:</label> <br>


					<input data-role="rating" data-value="3" data-values="1, 2, 3, 4, 5" data-star-color="green" data-stared-color="red" name="Livability">
					<br> <label>Amenities:</label> <br>

					<input data-role="rating" data-value="3" data-values="1, 2, 3, 4, 5" data-star-color="green" data-stared-color="red" name="Amenities">
					<br> <label>Cost of Living:</label> <br>

					<input data-role="rating" data-value="3" data-values="1, 2, 3, 4, 5" data-star-color="green" data-stared-color="red" name="Cost_of_Living">
					<br> <label>Crime:</label> <br>

					<input data-role="rating" data-value="3" data-values="1, 2, 3, 4, 5" data-star-color="green" data-stared-color="red" name="Crime">
					<br> <label>Employment:</label> <br>

					<input data-role="rating" data-value="3" data-values="1, 2, 3, 4, 5" data-star-color="green" data-stared-color="red" name="Employment">
					<br> <label>Housing:</label> <br>

					<input data-role="rating" data-value="3" data-values="1, 2, 3, 4, 5" data-star-color="green" data-stared-color="red" name="Housing">
					<br> <label>Schools</label> <br>

					<input data-role="rating" data-value="3" data-values="1, 2, 3, 4, 5" data-star-color="green" data-stared-color="red" name="Schools"> <br>
					<label class="form-label" for="textAreaExample">Comments</label>

					<div class="form-outline">

						<textarea class="form-control" id="textAreaExample1" name="comments" rows="4"></textarea>
					</div>

					<br>
					<input class="button primary" type="submit" value="Submit Review" name="submit">
				</div>
			</form>
		</div>
		<br>
		<br>
		<h1>Overview of <?php echo ($zipcode); ?></h1>
		<nav class="category-menu-new" style="background-color:#FAF9F6;display: flex;
justify-content:flex-start;">
			<a style="pointer-events: none;" href="/mount+morris-ny/livability/"><em>Livability</em><i class="ndx5__"><?php echo $row['Livability']; ?></i> </a>
			<a style="pointer-events: none;" href="/mount+morris-ny/livability/#amenities-jmp"><em>Amenities</em><i class="ndx5_3"><?php echo $row['Amenities']; ?></i> </a>
			<a style="pointer-events: none;" href="/mount+morris-ny/cost-of-living/"><em>Cost of Living</em><i class="ndx5_3"><?php echo $row['Amenities']; ?></i> </a>
			<a style="pointer-events: none;" href="/mount+morris-ny/crime/"><em>Crime</em><i class="ndx5_4"><?php echo $row['Crime']; ?></i> </a>
			<a style="pointer-events: none;" href="/mount+morris-ny/employment/"><em>Employment</em><i class="ndx5_1"><?php echo $row['Employment']; ?></i> </a>
			<a style="pointer-events: none;" href="/mount+morris-ny/real-estate/"><em>Housing</em><i class="ndx5_0"><?php echo $row['housing']; ?></i> </a>
			<a style="pointer-events: none;" href="/mount+morris-ny/schools/"><em>Schools</em><i class="ndx5_0"><?php echo $row['Schools']; ?></i> </a>
		</nav>
		<br><br>
		<hr>
		<strong>
			<label for="comments"> Comments</label> <br> <br>
		</strong>
		<?php


		$query = "Select comments, reviewDate, userId from reviews where zipcode = '$zipcode'";

		$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));

		// mysqli_data_seek($result, 0);

		// output data of each row
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {



			$d = new DateTime($row['reviewDate']);
			echo "<b> Date: </b>" . $d->format('F jS, Y');

			print("<b> User: </b> " . $row['userId']);

		?>
			<br>
			<input class="form-control" style="width: 623px; height: 48px; color:blue; font-size: 15px;" type="text" value="<?php echo $row['comments']; ?>" aria-label="readonly input example" readonly> <br><br>

			<!-- <textarea class="form-control" disabled  id="textAreaExample1" name="comments" rows="4" style="width: 623px; height: 48px;"><?php echo $row['comments']; ?></textarea> -->
		<?php

		}

		?>



		<script src="https://cdn.korzh.com/metroui/v4/js/metro.min.js"></script>
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.sticky.js"></script>
		<script src="js/main.js"></script>

		<!-- <div class="hero" style="background-image: url('images/hero_1.jpg');"></div> -->



		<!-- </body>

</html> -->


	</div>

</body>

</html>
