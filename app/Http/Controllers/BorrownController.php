<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrown;
use App\Models\Student;
use App\Models\BorrownDetail;
use App\Models\Book;

class BorrownController extends Controller
{
    public function index(Request $request)
    {
        $query = Borrown::with('student');
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->whereHas('student', function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        $borrowns = $query->get();
        return view('borrowns.index', compact('borrowns'));
    }
    public function create()
    {
        $students = Student::all();
        $books = Book::all();
        return view('borrowns.create', compact('students','books'));
    }
    public function store(Request $request)
    {
        try {
            $borrown = new Borrown();
            $borrown->borrownDate = $request->borrownDate;
            $borrown->student_id = $request->student_id;
            $borrown->save();
            $bookIds = $request->input('books');

        // Lưu các chi tiết phiếu mượn vào cơ sở dữ liệu
        foreach ($bookIds as $bookId) {
            $borrownDetail = new BorrownDetail();
            $borrownDetail->borrown_id = $borrown->id;
            $borrownDetail->book_id = $bookId;
            $borrownDetail->note = 'Chưa có ghi chú';
            $borrownDetail->save();
        }
            return redirect()->route('borrowns.index')->with('successMessage','Thêm thành công phiếu mượn');
        }
        catch (\Throwable $th) {
            return redirect()->route('borrowns.index')->with('errorMessage','Thêm thất bại');
        }
    }
    public function show(string $id)
    {
        $borrownDetails = BorrownDetail::where('borrown_id', $id)->with('borrown', 'book')->get();
        return view('borrowns.show', compact('borrownDetails'));
    }
    public function edit(string $id)
    {
        $borrown = Borrown::findOrFail($id);
        $students = Student::all();
        return view('borrowns.edit', compact('borrown','students'));
    }
    public function update(Request $request, string $id)
    {
        try {
            $borrown = Borrown::findOrFail($id);
            $borrown->borrownDate = $request->borrownDate;
            $borrown->student_id = $request->student_id;
            $borrown->save();
            return redirect()->route('borrowns.index')->with('successMessage','Sửa thành công phiếu mượn');
        } catch (\Throwable $th) {
            return redirect()->route('borrowns.index')->with('errorMessage','Sửa thất bại');
        }
    }
    public function destroy(string $id)
    {
        $borrown = Borrown::findOrFail($id);
        $borrown->delete();
        return redirect()->route('borrowns.index')->with('successMessage','Xóa thành công phiếu mượn');
    }
}
