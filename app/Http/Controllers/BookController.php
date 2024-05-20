<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }
    public function create()
    {
        return view('books.create');
    }
    public function store(Request $request)
    {
        try {
            $book = new Book();
            $book->name = $request->name;
            $book->code = $request->code;
            $book->author = $request->author;
            $book->save();
            return redirect()->route('books.index')->with('successMessage','Thêm thành công');
        }
        catch (\Throwable $th) {
            return redirect()->route('books.index')->with('errorMessage','Thêm thất bại');
        }
    }
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }
    public function update(Request $request, string $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->name = $request->name;
            $book->code = $request->code;
            $book->author = $request->author;
            $book->save();
            return redirect()->route('books.index')->with('successMessage','Cập nhật thành công');
        }
        catch (\Throwable $th) {
            return redirect()->route('books.index')->with('errorMessage','Cập nhật thất bại');
        }
    }
    public function destroy(string $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();
            return redirect()->route('books.index')->with('successMessage','Xóa thành công');
        }
        catch (\Throwable $th) {
            return redirect()->route('books.index')->with('errorMessage','Xóa thất bại');
        }
    }
}
