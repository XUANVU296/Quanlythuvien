<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }
    public function create()
    {
        return view('students.create');
    }
    public function store(StoreStudentRequest $request)
    {
        try {
            $student = new Student();
            $student->name = $request->name;
            $student->code = $request->code;
            $student->group = $request->group;
            $student->save();
            return redirect()->route('students.index')->with('successMessage','Thêm thành công');
        }
        catch (\Throwable $th) {
            return redirect()->route('students.index')->with('errorMessage','Thêm thất bại');
        }
    }
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }
    public function update(UpdateStudentRequest $request, string $id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->name = $request->name;
            $student->code = $request->code;
            $student->group = $request->group;
            $student->save();
            return redirect()->route('students.index')->with('successMessage','Cập nhật thành công');
        }
        catch (\Throwable $th) {
            return redirect()->route('students.index')->with('errorMessage','Cập nhật thất bại');
        }
    }
    public function destroy(string $id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();
            return redirect()->route('students.index')->with('successMessage','Xóa thành công');
        }
        catch (\Throwable $th) {
            return redirect()->route('students.index')->with('errorMessage','Xóa thất bại');
        }
    }
}
