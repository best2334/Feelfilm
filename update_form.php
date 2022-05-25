<?php
  session_start();
	define('DB_HOST', 'us-cdbr-east-05.cleardb.net');
  define('DB_USER', 'ba80e18674956a');
  define('DB_PASS', '4d38549c');
  define('DB_NAME', 'heroku_46f17315db8623b');

  $objCon = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  mysqli_set_charset($objCon, "utf8");
	
	$strSQL = "SELECT * FROM review WHERE id = '".$_SESSION['id']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
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
  
    <div class="newcontainer">
       
      <h1 class="movie-list-title">REVIEW</h1>
      <br>
      <br>
      <h3>Editing your review here!</h3>
      <br>
      <br>

<div class="review">
      <form name="form1" method="post" action="submit_update.php">
         <label for="txtUserName">Username</label>
    <input type="text" id="txtUserName" name="txtUserName" value="<?php echo $objResult["user_name"];?>">

    <label for="txtMovieName">Movie Name</label>
    <input type="text" id="txtMovieName" name="txtMovieName" value="<?php echo $objResult["movie_name"];?>">

    <label for="txtDesc">Description</label>
    <textarea id="txtDesc" name="txtDesc" cols="40" rows="5" ><?php echo $objResult["description"];?></textarea>
        
    <label for="ddlCate">Category</label>
    <select id="ddlCate" name="ddlCate" >
      <option value="Action" <?php if($objResult["category"]=="Action"){echo "selected";}?>>Action</option>
      <option value="Comedies" <?php if($objResult["category"]=="Comedies"){echo "selected";}?>>Comedies</option>
      <option value="Dramas" <?php if($objResult["category"]=="Dramas"){echo "selected";}?>>Dramas</option>
      <option value="Romance" <?php if($objResult["category"]=="Romance"){echo "selected";}?>>Romance</option>
      <option value="Horror" <?php if($objResult["category"]=="Horror"){echo "selected";}?>>Horror</option>
      <option value="Other" <?php if($objResult["category"]=="Other"){echo "selected";}?>>Other</option>
    </select>

    <label for="ddlStream">Streaming</label>
    <select id="ddlStream" name="ddlStream">
      <option value="Netflix" <?php if($objResult["streaming"]=="Netflix"){echo "selected";}?>>Netflix</option>
      <option value="Disney" <?php if($objResult["streaming"]=="Disney"){echo "selected";}?>>Disney+</option>
      <option value="HBO" <?php if($objResult["streaming"]=="HBO"){echo "selected";}?>>HBO</option>
      <option value="None" <?php if($objResult["streaming"]=="None"){echo "selected";}?>>None</option>
    </select>
        
    <input type="submit" value="Submit">
        </form>
  </div>
</div> 
 
  <script src="script.js"></script>
</body>

</html>
<?php
	mysqli_close($objCon);
?>