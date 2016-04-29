<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table width="500" border="1">
		<tr>
			<td colspan="6">
				<form><!-- 搜索默认请求当前页面，采用get方式请求 -->
					用户名：<input type="text" name="username" value="<?php echo I('get.username');?>"><br>
					年龄：<input type="text" name="start" value="<?php echo I('get.start');?>"> - 
						<input type="text" name="end" value="<?php echo I('get.end');?>"><br>
					性别：<select name="sex" id="">
						<option value="">--请选择--</option>
						<option value="1" <?php echo I('get.sex')==1 ? 'selected' : '';?>>男</option>
						<option value="2"  <?php echo I('get.sex')==2 ? 'selected' : '';?>>女</option>
					</select>
					<input type="submit" value="提交">
				</form>
			</td>
		</tr>
		<tr>
			<th>编号</th>
			<th>姓名</th>
			<th>年龄</th>
			<th>性别</th>
			<th>头像</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
			<td><?php echo ($vo['id']); ?></td>
			<td><?php echo ($vo['username']); ?></td>
			<td><?php echo ($vo['age']); ?></td>
			<td><?php echo ($vo['sex']==1 ? '男' : '女'); ?></td>
			<td><img src="/PHP129/ThinkPHP05/Public/<?php echo empty($vo['pic']) ? 'default.jpg' : $vo['pic'];?>" width="50" alt=""></td>
			<td>
				<a href="">修改</a>
				<a href="">刪除</a>
			</td>
		</tr><?php endforeach; endif; ?>
		<tr>
			<td colspan="6"><?php echo ($show); ?></td>
		</tr>
	</table>
</body>
</html>