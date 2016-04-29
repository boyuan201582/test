<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="<?php echo U('Index/checkCode');?>" method="post">
		<input type="text" name="code" value="">
		<img src="<?php echo U('Index/code');?>" alt="">
		<input type="submit" value="提交">
	</form>
</body>
</html>