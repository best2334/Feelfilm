<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">

  
    <title>FeelFilm | Edit Review</title>
  <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>

<body>

 <div class="navbar" id="nav">
  <div>
                <a href="index.html"><h1 class="logo">FeelFilm</h1></a>
                    <a href = "new.html">New</a>
                    <a href="popular.html">Popular</a>
              
                    <div class="dropdown">
                      <button class="btn">Categories 
                        <i class="fa fa-caret-down"></i>
                  		</button>
                      <div class="dropdown-menu">
                        <a href="action.html">Action</a>
                        <a href="comedies.html">Comedies</a>
                        <a href="dramas.html">Dramas</a>
                        <a href="romance.html">Romance</a>
                        <a href="horror.html">Horror</a>
                      </div>
                    </div> 
                    <div class="dropdown">
                      <button class="btn">Streaming 
                        <i class="fa fa-caret-down"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a href="netflix.html">Netflix</a>
                        <a href="disney.html">Disney+</a>
                        <a href="hbo.html">HBO</a>
                      </div>
                    </div> 
  </div> 
        
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i></a>
 </div>    
         
   <div class="sidebar">
        <a href="index.html"><i class="left-menu-icon fas fa-home"></i></a>
        <a href="show.php"><i class="left-menu-icon fas fa-users"></i></a>
        <a href="write.php"><i class="left-menu-icon fas fa-pen"></i></a>
        <a href="login_form.html"><i class="left-menu-icon fas fa-edit"></i></a>
    </div>

<div class="newcontainer" style="text-align: center;">

<div class="submitreview">

<?php
	session_start();
	if($_SESSION['id'] == "")
	{
		echo "Please Login!";
		exit();
	}

  define('DB_HOST', '');
  define('DB_USER', '');
  define('DB_PASS', '');
  define('DB_NAME', '');

$objCon = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($objCon, "utf8");
	
	$strSQL = "UPDATE review SET user_name = '".trim($_POST['txtUserName'])."' 
	,movie_name = '".trim($_POST['txtMovieName'])."',description = '".trim($_POST['txtDesc'])."',category= '".trim($_POST['ddlCate'])."',Streaming='".trim($_POST['ddlStream'])."' WHERE id = '".$_SESSION["id"]."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	
	echo "<script type='text/javascript'>";
	echo "alert('Editing Completed!');";
	echo "</script>";
  echo "Your review updated successfully";
	echo "<br><br>Back to <button><a href='index.html'>Home</a></button>";
	
	mysqli_close($objCon);
?>
  </div>
  </div> 

<script src="script.js"></script>
</body>

</html>
