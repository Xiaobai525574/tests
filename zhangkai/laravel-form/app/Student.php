<?php
/**
 * Created by PhpStorm.
 * User: zhangkai
 * Date: 2018/6/27
 * Time: 11:23
 */
namespace App;
use Illuminate\Database\Eloquent\Model;

class Student extends Model{
    protected $table = 'student';
    public $timestamps=true;
    protected $fillable = ['name','age','sex'];
    protected function getDateFormat()
    {
        return time();
    }
    protected function asDateTime($value)
    {
        return $value;
    }

}