<!DOCTYPE html>

<html lang="en">

<head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Index Page</title>
        <center>

                <link rel="stylesheet" href="css/login.css">

                <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.css">

                <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                <style>
                        .toggle-container {
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin-top: 10px;
                                flex-wrap: wrap
                        }

                        .toggle-container label {
                                /* justify-content: right; */
                                margin-left: 10px;
                        }

                        .main-content {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                flex-direction: column;
                                margin-top: 50px;
                        }

                        .search-form {
                                display: none;
                                margin-top: 20px;
                        }

                        .search-form input[type="text"],
                        .search-form select {
                                margin-right: 10px;
                        }

                        #search {
                                width: 500px;
                                margin: 30px
                        }
                        
                </style>

</head>

<body background="Image/basnet.jpg">

        <div class="title">

                <span>Result Management System</span>
                <br>
        </div>
        </center>
        <div class="toggle-container">
                <input type="checkbox" id="toggle-button" style="transform: scale(1.5);">
                <label for="toggle-button">Toggle Search</label>
        </div>
        <div class="search-form" id="search-form">
                <form>
                        <input type="text" id="search" onkeyup="searchData(this.value)" placeholder="Search...">
                        <div id="results"></div>
                </form>
        </div>
        <div class="main">

                <div class="search">

                        <form id="class-form" action="./student.php" method="get">

                                <fieldset>

                                        <legend class="heading">For Students</legend>


                                        <?php

                                        include('init.php');


                                        $class_result = mysqli_query($conn, "SELECT `name` FROM `class`");

                                        echo '<select name="class">';

                                        echo '<option selected disabled>Select Class</option>';

                                        while ($row = mysqli_fetch_array($class_result)) {

                                                $display = $row['name'];

                                                echo '<option value="' . $display . '">' . $display . '</option>';

                                        }

                                        echo '</select>'

                                                ?>


                                        <input type="text" name="rn" placeholder="Roll No">

                                        <input type="submit" value="Get Result">

                                </fieldset>

                        </form>


                </div>


        </div>
        <center>
                <h1><a href="index1.html"><img src="Image/back.png" width="100px" height="40px"></a></h1>
        </center>
        <div class="footer">
                <div class="footinfo">
                        <center>
                                <p>Copyright @2022 All Right Reserved. Designed by:<b> Sanjok Dhungana</b></p>

                </div>
        </div>
        </center>
</body>
</center>
<script>
        const toggleButton = document.getElementById("toggle-button");
        const searchForm = document.getElementById("search-form");
        const classForm = document.getElementById("class-form");

        // Hide the search form by default
        searchForm.style.display = "none";

        toggleButton.addEventListener("change", function () {
                if (this.checked) {
                        searchForm.style.display = "block";
                        classForm.style.display = "none";
                } else {
                        searchForm.style.display = "none";
                        classForm.style.display = "block";
                }
        });

        function searchData(searchTerm) {
      if (searchTerm.trim() !== '') {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("results").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "search.php?search=" + searchTerm, true);
        xhttp.send();
      } else {
        document.getElementById("results").innerHTML = '';
      }
    }
    function showDetails(userId, class_name) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          alert(this.responseText);
        }
      };
      window.location.href = "student.php?rn=" + encodeURIComponent(userId) + "&class=" + encodeURIComponent(class_name);
    }
</script>

</html>


<?php

include("init.php");

session_start();


if (isset($_POST["userid"], $_POST["password"])) {

        $username = $_POST["userid"];

        $password = $_POST["password"];

        $sql = "SELECT userid FROM admin_login WHERE userid='$username' and password = '$password'";
        $result = mysqli_query($conn, $sql);


        // $row=mysqli_fetch_array($result);

        $count = mysqli_num_rows($result);


        if ($count == 1) {

                $_SESSION['login_user'] = $username;

                header("Location: dashboard.php");

        } else {

                echo '<script language="javascript">';

                echo 'alert("Invalid Username or Password")';

                echo '</script>';

        }


}

?>