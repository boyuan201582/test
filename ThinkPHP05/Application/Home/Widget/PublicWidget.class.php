<?php
namespace Home\Widget;

use Think\Controller;

class PublicWidget extends Controller {  
	// 输出header头部页面  
	public function header(){        
		// 查询分类信息
    	$type = M('type');

    	$data = $type->where('pid=0')->select();
    	$this->assign('data',$data);

    	$this->display('public/header');
	}
}