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

  
    <title>FeelFilm | Write Review</title>
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

  define('DB_HOST', '');
  define('DB_USER', '');
  define('DB_PASS', '');
  define('DB_NAME', '');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($conn, "utf8");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
	
	if(trim($_POST["txtUserName"]) == "")
	{
		echo "Please input Userame!";
		exit();	
	}
	
	if(trim($_POST["txtMovieName"]) == "")
	{
		echo "Please input Movie Name!";
		exit();	
	}	
	
	if(trim($_POST["txtDesc"]) == "")
	{
		echo "Please input Description!";
		exit();	
	}
		
	if(trim($_POST["ddlCate"]) == "")
	{
		echo "Please input Category!";
		exit();	
	}	
	
	if(trim($_POST["ddlStream"]) == "")
	{
		echo "Please input Streaming!";
		exit();	
	}	
	
	
	$strSQL = "INSERT INTO review (user_name,movie_name,description,category,streaming) VALUES (	'".$_POST["txtUserName"]."','".$_POST["txtMovieName"]."','".$_POST["txtDesc"]."','".$_POST["ddlCate"]."','".$_POST["ddlStream"]."')";
	
if ($conn->query($strSQL) === TRUE) {
  echo "Your review created successfully<br>";
} else {
  echo "Error: " . $strSQL . "<br>" . $conn->error;
}

echo " Please remember your <b>id</b> for Edit or Delete your Review!!!<br><br>";

echo "<b>Username : '".$_POST["txtUserName"]."'</b><br>";


$sql = "SELECT id FROM review WHERE user_name= '".$_POST["txtUserName"]."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<b>id: " . $row["id"]. "</b><br><br>" ;
  }
} else {
  echo "0 results";
}

echo "Go to <button><a href='write.php'>Review page</a></button> for create another review<br>";
echo "<br><br>Back to <button><a href='index.html'>Home</a></button>";

$conn->close();
?>

</div>
</div> 

<script src="script.js"></script>
</body>

</html>
