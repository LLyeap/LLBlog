<?php
namespace App\Store;
use Illuminate\Support\Facades\DB;

class AdminStore{
    // 表名
    protected static $table = 'data_admin_login';

    /*
     * 查找一条记录
     * @param array $where
     * @return mixed(false | mixed)
     * @author
     */
    public function getOneData($where)
    {
        if(empty($where)) return false;
        return DB::table(self::$table)->where($where)->first();
    }

    /*
     * 添加记录到数据库
     * @param array $data
     * @return bool
     * @author
     */
    public function addData($data)
    {
        if(empty($data)) return false;
        return DB::table(self::$table)->insert($data);
    }

    /*
     * 更新记录到数据库
     * @param array $where
     * @param array $data
     * @return bool
     * @author
     */
    public function updateData($where, $data)
    {
        if(empty($where) || empty($data)) return false;
        return DB::table(self::$table)->where($where)->update($data);
    }
}
