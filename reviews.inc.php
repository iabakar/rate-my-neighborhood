<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {

?>
        <script type="text/javascript">
            alert("You must login before writing reviews");
            window.location.href = "login.php";
        </script>
<?php
    } else {

        // post a new review

        require('includes/mysqli_connect.php');
        $zipcode = $_SESSION["zipcode"];
        $Livability =  $_POST['Livability'];
        $Amenities = $_POST['Amenities'];
        $Cost_of_Living = $_POST['Cost_of_Living'];
        $Crime = $_POST['Crime'];
        $Employment = $_POST['Employment'];
        $Housing = $_POST['Housing'];
        $Schools = $_POST['Schools'];



        $comments =mysqli_real_escape_string($dbc,$_POST['comments']);
        $userID = $_SESSION['user_id'];
        
        $query = "INSERT INTO reviews (Livability, Amenities, CostOfLiving, Crime, Employment, housing, Schools, Comments, userID, zipcode) 
        VALUES ('$Livability' ,'$Amenities', '$Cost_of_Living', '$Crime', '$Employment', '$Housing', '$Schools','$comments', '$userID', '$zipcode')";
        $result = @mysqli_query($dbc, $query)or die(mysqli_error($dbc));


        if ($result) {
            ?>
            <script type="text/javascript">
            alert("Reviews Received successfully!");
            window.location.href = "reviews.php";
            </script>
            <?php


        }
    
    }


}
