<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="<?php echo U('Index/insert');?>" method="post" enctype="multipart/form-data">
		<input type="file" name="pic">
		<input type="submit" value="提交">
	</form>
<br><br><br>
	<form action="<?php echo U('Index/inserts');?>" method="post" enctype="multipart/form-data">
	<input type="file" name="pic[]">
	<input type="file" name="pic[]">
	<input type="file" name="pic[]">
	<input type="submit" value="提交">
	</form>
</body>
</html>