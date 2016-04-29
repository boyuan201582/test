<?php if (!defined('THINK_PATH')) exit();?><div id="header" style="height:100px;background:red;">
		<h3>查询商品分类信息</h3>
		<ul>
		<?php if(is_array($data)): foreach($data as $key=>$vo): ?><li><a href="#1"><?php echo ($vo['name']); ?></a></li><?php endforeach; endif; ?>
		</ul>
	</div>