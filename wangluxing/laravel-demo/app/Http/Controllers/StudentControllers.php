<?php
namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentControllers extends Controller
{
    //学生列表页
    public function index()
    {
        $students = Student::paginate(6);
        return view('student.index',[
            'students' => $students,
        ]);
    }
    //添加页面
    public function create()
    {
        $student = new Student();
        $student->sex='0';

        return view('student.create',[
            'student'=>$student
        ]);

    }
    //保存添加

    public function save(Request $request)
    {

        if ($request->isMethod('POST')){
            //1.控制器验证
            $validator=\Validator::make($request->input(),[
                'Student.name'=>'required|min:2|max:20',
                'Student.age' =>'required|integer',
                'Student.sex' =>'required|integer',
            ],[
                'required'=>':attribute 为必填项',
                'min'=>':attribute 长度不符合',
                'integer'=>':attribute 必须为整数',
            ],[
                'Student.name'=>'姓名',
                'Student.age'=>'年龄',
                'Student.sex'=>'姓别',
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        $data=$request->input('Student');


        if(Student::create($data)){
            return redirect('student/index')->with('sucess','添加成功');
        }else{

            return redirect()->back();
        }
    }
    public function update(Request $request,$id)
    {
        $student = Student::find($id);
        if ($request->isMethod('POST')){
            $data = $request->input('Student');
            $student->name=$data['name'];
            $student->age=$data['age'];
            $student->sex=$data['sex'];
            if ($student->save()){
                return redirect('student/index')->with('success','修改成功-'.$id);
            }
        }

        return view('student.update',[
            'student'=>$student
        ]);
    }

    public function detail($id)
    {
        $student=Student::find($id);
        return view('student.datail',[
            'student'=>$student
        ]);

    }
    public function delete($id)
    {
        $student=Student::find($id);
        if ($student->delete()){
            return redirect('student/index')->with('success','删除成功_'.$id);
        }else{
            return redirect('student/index')->with('success','删除失败_'.$id);
        }

    }
}