<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Validator;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Отображение страницы
     */
    public function index()
    {
        return view('books.index');
    }
    /**
     * Получить список книг
     */
    public function getBooks()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function getBook($id, Request $request)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|exists:books|int',
        ]);

        if ($validator->fails()) {
            return redirect('books')
                ->withErrors($validator)
                ->withInput();
        }

        $book = Book::find($id);

        return view('books.book', [
            'book' => $book
        ]);
    }

    public function deleteBook($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();

            $response = [
                'status' => 'success',
                'message' => 'Успешно удалено',
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }

        return response()->json($response);
    }
}
