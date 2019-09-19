<?php
require_once('connect.php');
session_start();
?>
<html>
<head>
	<title>Books</title>
</head>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style/index.css">
<?php include('navbar.php');?>
<style type="text/css">
	body{
		background-repeat: no-repeat;
		background-size: 100%;
		z-index: 0;
	}
</style>
<body background="librarybg1.jpg">
<style type="text/css">
	div,table,th,td,tbody,tr{
		color: white;
	}
</style>

<div class="container">
	
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Book ID</th>
	      <th scope="col">Title</th>
	    </tr>
	  </thead>
	  <tbody>
		<?php 
			include('connect.php');
			$query="SELECT ISBN,TITLE FROM book";

            if(!($result = mysqli_query($conn,$query))){

                echo "Retrieval of data from database failed".mysql_error();
            }
            if(mysqli_num_rows($result)>0){

                while ($row=mysqli_fetch_assoc($result)){

                    echo "<tr><td>".$row["ISBN"]."</td><td>".$row["TITLE"]."</td></tr>";
                }
            }
            else{

                echo "0 Results";
            }

            mysqli_close($conn)?>
        </tbody>
	</table>
</div>
</body>
</html>