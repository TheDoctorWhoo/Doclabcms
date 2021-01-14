<?php 
include_once("db.php");
$nav_column = "";
$queryForColumn = "SELECT id, title FROM `pages`;";
$result = $db->query($queryForColumn);


if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
    	$nav_column .= "<a href = \"index.php?id=".$row['id']."\">".$row['title']."</a><br>";
	}
}
unset($row);

$title = "Error 404";
$header = "Error 404";
$image = "default.png";
$annotation = "Page not found";
$article = "Page not exists";
$date = "NULL";

if(isset($_GET['id'])){
	$mainQuery = "SELECT * FROM `pages` WHERE id = ".$_GET['id'].";";
	if($mainQueryResult = $db->query($mainQuery)){
		$mainQueryRows = $mainQueryResult->fetch_array();
		$title = $mainQueryRows['title'];
		$header = $mainQueryRows['header'];
		$image = $mainQueryRows['image'];
		$annotation = $mainQueryRows['annotation'];
		$article = $mainQueryRows['article'];
		$date = $mainQueryRows['date'];
	}
}
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title><?php echo $title; ?></title>
 </head>
 <body>
 	<div class="header">
 		<a href="createArticle.php">Create a new article.</a>
 	</div>
 	<div class="page">
 		<div class="nav"><?php echo $nav_column; ?></div>
 		<div class="mainPage">
 			<h1><?php echo $header; ?></h1>
 			<div class="pageTop">
 				<img src='<?php echo "/img/".$image;?>' alt="">
 				<div> <?php echo $annotation; ?> </div>
 			</div>
 			<div>
 				<?php echo $article; ?>
 			</div>
 		</div>
 	</div>
 <style>
 	.header{
 		width: 100%;
 		height: 120px;
 		background-color: #f59542;
 	}
 	.page{
 		width: 100%;
 		display: flex;
 		flex-direction: row;
 	}
 	.nav{
 		width: 20%;
 		padding: 10% 5% 5% 0;

 	}
 	.mainPage{
 		width: 80%;
 		padding: 10% 5% 0 5%;
 		display: flex;
 		flex-direction: column;
 	}
 	.pageTop{
 		height: 20%;
 		display: flex;
 		font-display: row;
 		margin-bottom: 25px;
 	}
 	.pageTop img{
 		margin-right: 10px;
 		height: 100%
 	}
 </style>
 </body>
 </html>