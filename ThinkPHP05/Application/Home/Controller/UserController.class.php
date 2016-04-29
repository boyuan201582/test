<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    
    // 用户列表页
    public function index()
    {
        
        // 1.实例化model
        $user = M('user');

        // 2.接收搜索条件（判断对应的搜索条件是否存在）
        $wherelist = [];
        // 用户名
        if (!empty($_GET['username'])) {
            $wherelist['username'] = array('like',"%{$_GET['username']}%");
        }

        // 年龄
        if (!empty($_GET['start'])) {
            $wherelist['age'][] = array('gt',$_GET['start']);
        }
        if (!empty($_GET['end'])) {
            $wherelist['age'][] = array('lt',$_GET['end']);
        }

        // 性别
        if (!empty($_GET['sex'])) {
            $wherelist['sex'] = $_GET['sex'];
        }

        // 2.获取总条数
        $count = $user->where($wherelist)->count();
        // 实例化page类
        $page = new \Think\Page($count, 10);
        // 展示页码
        $this->assign('show',$page->show());

        // 3.查询
        $data = $user->where($wherelist)->limit($page->firstRow,$page->listRows)->select();

        // 4.分配变量
        $this->assign('data', $data);

        // 5.输出模板
        $this->display();
    }

    // 用户添加页
    public function add()
    {
        $this->display();
    }

    // 执行用户信息添加
    public function insert()
    {
        // dump($_POST);
        // dump($_FILES);
        /*
        1.执行文件上传，获取文件名
        2.如果需要进行裁剪(缩放水印),通过图片处理类
        3.将处理之后的文件名组装到$_POST中
        3.执行数据信息的添加操作
        */
        // 1.执行文件上传
        // 1.1 实例化并配置
        $config = array(
                'rootPath' => 'Public/',
                'savePath' => 'Uploads/',
                'exts'     => array('gif','png','jpg')
            );
        $upload = new \Think\Upload($config);

        // 1.2.执行上传
        $info = $upload->uploadOne($_FILES['pic']);

        // dump($info);exit;
        // 1.3.判断文件是否成功
        if (!$info) {
            $this->error($upload->getError());
        } else {
            // 进行图片处理
            // 1.5 实例化图片处理类
            $image = new \Think\Image();

            // 1.6 打开图片进行缩放
            $path = 'Public/';
            $image->open($path.$info['savepath'].$info['savename'])->thumb(100,100,6)->save($path.$info['savepath'].'t_'.$info['savename']);
        }

        // 2.实例化Model类
        $user = M('user');

        // 3.创建数据对象
        $_POST['pic'] = $info['savepath'].'t_'.$info['savename'];
        $res = $user->create();

        // 4.判断
        if ($res) {
            // 5.执行添加操作
            $result = $user->add();

            // 6.判断
            if ($result) {
                // echo 'ok';
                $this->success('添加成功',U('User/index'));
            } else {
                // echo 'no';
                $this->error('添加失败');
            }
        } else {
            $this->error($user->getError());
        }
    }

}