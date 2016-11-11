<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Services\AdminService as AdminServer;
use App\Tools\Common;

class LoginController extends Controller
{
    protected static $adminServer = null;

    public function __construct(AdminServer $adminServer)
    {
        self::$adminServer = $adminServer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // 验证码校验
        if ($data['captcha'] != Session::get('code')) {
            return back()->withErrors('验证码错误!');
        }

        // 验证
        $this->validate($request, [
            'email'    => 'required|E-Mail',
            'password' => 'required|min:5'
        ]);
        $data['ip'] = $request->getClientIp();

        $info = self::$adminServer->loginCheck($data);
        switch ($info){
            case  'status':
                return back()->withErrors('账户被锁定');
            break;
            case 'udate':
                Log::error('登录数据异常', $data);
                return back()->withErrors('数据异常');
            break;
            case 'error':
                return back()->withErrors('账户或密码错误');
            break;
            case 'yes':
                return redirect('/');
            break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 验证码
     *
     * 2016-11-09
     */
    public function captcha($tmp)
    {
        return Common::captcha($tmp);
    }

    /**
     * 登出
     *
     * 2016-11-09
     */
    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
