<?php
$conn= mysqli_connect('','','','') 
or die("Error: " . mysqli_error($conn));
mysqli_query($conn, "SET NAMES 'utf8' ");
$query=mysqli_query($conn,"SELECT COUNT(id) FROM review");
	$row = mysqli_fetch_row($query);

	$rows = $row[0];

	$page_rows = 4; 

	$last = ceil($rows/$page_rows);

	if($last < 1){
		$last = 1;
	}

	$pagenum = 1;

	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}

	if ($pagenum < 1) {
		$pagenum = 1;
	}
	else if ($pagenum > $last) {
		$pagenum = $last;
	}

	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

	$nquery=mysqli_query($conn,"SELECT * from review $limit");

	$paginationCtrls = '';

	if($last != 1){

	if ($pagenum > 1) {
$previous = $pagenum - 1;
		$paginationCtrls .= '<button class="btnreview"><a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a></button> &nbsp; &nbsp; ';

		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		$paginationCtrls .= '<button class="btnreview"><a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a></button> &nbsp; ';
			}
	}
}

	$paginationCtrls .= ''.$pagenum.' &nbsp; ';

	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<button class="btnreview"><a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a></button> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}

if ($pagenum != $last) {
$next = $pagenum + 1;
$paginationCtrls .= ' &nbsp; &nbsp; <button class="btnreview"><a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a></button> ';
}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    
    <title>FeelFilm | Reviews</title>
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
      <div class="row">
        <?php
						while($row = mysqli_fetch_array($nquery)){
              ?> 
            <div class="columnreview">
            <div id="reviewcard" class="cardreview">
            <div class="cardcontainer">
             <?php  echo "<br>Username: ". $row["user_name"]. "<br><br>Movie Name: ". $row["movie_name"] . "<br>Description: ". $row["description"] . "<br>Category: ". $row["category"] . "<br>Streaming: ". $row["streaming"] . "<br>";
              ?>
            </div>
            </div>
            </div>
            
        <?php
            }
              ?>
      </div>
      <br>
      <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
      <?php      
            $conn->close();
            ?>
                </div> 
  
  <script src="script.js"></script>
</body>

</html>
