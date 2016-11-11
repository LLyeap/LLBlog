<?php

namespace App\Services;

use App\Tools\Common;
use Illuminate\Support\Facades\Session;
use App\Store\AdminStore;

class AdminService
{
    protected static $adminStore = null;

    public function __construct(AdminStore $adminStore)
    {
        self::$adminStore = $adminStore;
    }


    /**
     * 注册管理员
     *
     * @param array $data
     * @return mixed(false|array)
     *
     * 2016-11-09
     */
    public function addUser($data)
    {
        // 查询邮箱是否已经注册
        $temp = self::$adminStore->getOneData(['email'=>$data['email']]);
        if($temp) return 'isset';
        // 纯净数据
        unset($data['_token']);
        unset($data['password_confirmation']);
        // 写入数据
        $data['guid']       = Common::getUuid();
        $data['password']   = Common::cryptString($data['email'], $data['password']);
        $data['addtime']    = $_SERVER['REQUEST_TIME'];
        $info = self::$adminStore->addData($data);
        // 写入失败
        if(!$info) return 'error';
        // 写入成功
        return 'yes';
    }

    /**
     * 注册管理员
     *
     * @param array $data
     * @return mixed(false|array)
     *
     * 2016-11-09
     */
    public function loginCheck($data)
    {
        // 查询用户是否存在 密码是否正确
        $pass = Common::cryptString($data['email'], $data['password']);
        $temp = self::$adminStore->getOneData(['email'=>$data['email'],'password'=>$pass]);
        if(!$temp) return 'error';
        if($temp->status!='1') return 'status';
        unset($temp->password);

        $time = $_SERVER['REQUEST_TIME'];
        $res  = self::$adminStore->updateData(['guid'=>$temp->guid],['ip'=>$data['ip'],'logintime'=>$time]);
        if(!$res) {
            return 'update';
        }
        Session::put('user',$temp);
        return 'yes';
    }
}
