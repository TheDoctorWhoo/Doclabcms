<?php 
include_once 'db.php';

$query = "INSERT INTO `pages` (title, header, image, annotation, article, date) VALUES (%s)";
$valsNames;


$valsNames .= isset($_POST['title']) ? "'".$_POST['title']."'," : "NULL,";
$valsNames .= isset($_POST['header']) ? "'".$_POST['header']."'," : "NULL,";
$uploaddir = 'W:/domains/webInstitutCmsLab1/img/';
$uploadfile = $uploaddir . basename($_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
$valsNames .= "'".basename($_FILES['image']['name'])."',";
$valsNames .= isset($_POST['annotation']) ? "'".$_POST['annotation']."'," : "NULL,";
$valsNames .= isset($_POST['article']) ? "'".$_POST['article']."'," : "NULL,";
$valsNames .= "now()";
$formatedQuery = sprintf($query, $valsNames);
$result = $db->query($formatedQuery);
echo $formatedQuery;
echo $result;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<a href="index.php?id=1">Main Page</a>
	<form action="createArticle.php" method="POST" enctype="multipart/form-data">
		<label for="">Введите название:</label><br>
		<input name="title" type="text"><br>
		<label for="">Введите заголовок:</label><br>
		<input name="header" type="text"><br>
		<label for="">Загрузите изображение:</label><br>
		<input name="image" type="file"><br>
		<label for="">Напишите аннотацию к статье:</label><br>
		<textarea name="annotation" cols="30" rows="5"></textarea><br>
		<label for="">Напишите статью:</label><br>
		<textarea name="article" cols="30" rows="10"></textarea><br>
		<input type="submit">
	</form>
	<style>
		form{
			width: 300px;
		}
		label{
			margin-top: 5px;
		}
	</style>
</body>
</html>