<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	echo CONTROLLER_NAME.'<br>';	//获取控制器名
    	echo ACTION_NAME;	//获取请求的方法名
    	$this->display();
    }

    // 生成验证码
    public function code()
    {
    	// 1.实例化验证码类
    	$config = array(
    			'useImgBg' => true,
    			'fontSize' => '40',
    			'useCurve' => false,
    			'length' => 2,
    			// 'useZh'	=> true,
    			'codeSet' => '16',
    			'zhSet' => '我爱你咱们做好基友吧'
    		);
    	$verify = new \Think\Verify($config);

    	// 2.调用方法生成验证码
    	$verify->entry();
    }

    // 验证用户的验证码是否正确
    public function checkCode()
    {
    	// 1.实例化验证码类
    	$verify = new \Think\Verify();

    	// dump(session());
    	// 2.执行验证
    	// $res = $verify->check(I('post.code'));
    	// dump($res);
    }

    public function add()
    {
    	$this->display();
    }

    public function insert()
    {
    	// 1.实例化文件上传类
    	$config = array(
    			'rootPath' => 'Public/',	// 根路径（必写）
    			'savePath' => 'Uploads/',	// 保存路径（必写）
    			'maxSize'	=> '600000',	// 上传文件大小
    			'exts'		=> array('gif','png','jpg')	// 后缀
    		);
    	$upload = new \Think\Upload($config);

    	// 2.执行上传(单文件)
    	$info = $upload->uploadOne($_FILES['pic']);
    	dump($info);

    	echo $upload->getError();
    }

    public function inserts()
    {
    	// dump($_FILES);
    	// 1.实例化文件上传类
    	$config = array(
    			'rootPath' => 'Public/',
    			'savePath' => 'Uploads/',
    			'exts'		=> array('jpg','png','gif')
    		);
    	$upload = new \Think\Upload($config);

    	// 2.执行上传
    	$info = $upload->upload();
    	dump($info);
    }

    public function demo()
    {
    	// 1.实例化图片处理类
    	$image = new \Think\Image();

    	// 2.打开图片并处理(文件路径相对于index.php)
    	$path = './Public/Uploads/2016-02-25/';
    	$filename = '56ce5da98adaf.jpg';
    	$image->open($path.$filename);

    	// 3.裁剪
    	// $image->crop(400,400)->save($path.'c_'.$filename);
    	// crop(裁剪宽度，裁剪高度，裁剪起始横坐标，纵坐标)
    	// $image->crop(400,400,230,140)->save($path.'c_'.$filename);

    	// 4.缩放
    	// thumb(缩放的宽度，高度，方式)
    	// $image->thumb(200,200,2)->save($path.'t_'.$filename);

    	// 5.添加图片水印
    	// water(文件,水印图片位置参数，透明度)
    	// $image->water($path.'t_'.$filename,3,30)->save($path.'w_'.$filename);

    	// 6.文本水印
    	// text(文本信息，字体文件路径，文字大小，文字颜色，文字位置)
    	$image->text('合路情趣用品店','./ThinkPHP/Library/Think/Verify/ttfs/1.ttf',30,'#f4f4f4',3)->save($path.'tt_'.$filename);
    }

}