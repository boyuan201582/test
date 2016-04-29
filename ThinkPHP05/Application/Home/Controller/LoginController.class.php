<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    
	public function index()
	{
		echo '登录界面';
	}

	public function checkLogin()
	{
		// 验证用户的信息是否正确

		// 如果登录成功，跳转到后台首页（Admin/Index/index）
		// 登陆成功之后，需要将用户的信息存储到session中
		session('admin',$data);

		//存完session之后，跳转到首页

		// 如果登录失败，跳转登陆页
	}

}