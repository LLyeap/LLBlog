<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdminService as AdminServer;

class RegisterController extends Controller
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
        return view('admin.register');
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
        // 验证
        $this->validate($request, [
            'email'                 => 'required|E-Mail',
            'password'              => 'required|min:5',
            'password_confirmation' => 'required|same:password',
        ]);
        // 查询是否存在数据库
        $data['ip'] = $request->getClientIp();
        $result     = self::$adminServer->addUser($data);
        switch ($result) {
            case 'isset':
                return back()->withErrors('账户已存在');
            break;
            case 'error':
                return back()->withErrors('数据写入失败');
            break;
            case 'yes':
                return redirect('/login');
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
}
