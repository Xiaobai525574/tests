<?php
namespace App\Http\Controllers;
use App\Student;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\EventListener\ValidateRequestListener;

class StudentController extends Controller{
    //学生列表页；
    public function index()
    {
        $students = Student::paginate(10);
        return view('student/index',
            ['students'=>$students]);
    }
    //添加页面
    public function create(Request $request)
    {
        if($request->isMethod('POST'))
        {
            //控制器验证
            $this->validate($request,[
                'Student.name'=>'required|min:2|max:20',
                'Student.age'=>'required|integer',
                'Student.sex'=>'required|integer',
            ],[
                'required'=>':attribute 为必填项',
                'min'=>':attribute 最小长度不符合要求',
                'integer'=>':attribute 必须为整数',
            ],[
                'Student.name'=>'姓名',
                'Student.age'=>'年龄',
                'Student.sex'=>'性别'
            ]);
            //Validator类验证
//            $validator = \Validator::make($request->input(),[
//                'Student.name'=>'required|min:2|max:20',
//                'Student.age'=>'required|integer',
//                'Student.sex'=>'required|integer',
//            ],[
//                'required'=>':attribute 为必填项',
//                'min'=>':attribute 最小长度不符合要求',
//                'integer'=>':attribute 必须为整数',
//            ],[
//                'Student.name'=>'姓名',
//                'Student.age'=>'年龄',
//                'Student.sex'=>'性别'
//            ]);
//            if($validator->fails()){
//                return redirect()->back()-$this->withErrors($validator)->withInput();
//            }
            $data = $request->input('Student');
            if(Student::create($data))
            {
                return redirect('student/index')->with('success','添加成功');
            }
            else
            {
                return rediret()->back();
            }
        }
        return view('student/create');
    }
    // 添加保存
    public function save(Request $request)
    {
        $data = $request->input('Student');
        $student = new Student();
        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->sex = $data['sex'];
        if($student->save())
        {
            return redirect('student/index');
        }
        else
        {
            return rediret()->back();
        }
    }
}