<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="<?php echo U('User/insert');?>" method="post" enctype="multipart/form-data">
		<table width="500" border="1">
			<tr>
				<th>用户名</th>
				<th><input type="text" name="username" value=""></th>
			</tr>
			<tr>
				<th>年龄</th>
				<th><input type="text" name="age" value=""></th>
			</tr>
			<tr>
				<th>头像上传</th>
				<th><input type="file" name="pic"></th>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" value="提交"></th>
			</tr>
		</table>
	</form>
</body>
</html>