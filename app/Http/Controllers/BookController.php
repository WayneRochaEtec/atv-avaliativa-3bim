<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function listBooks(){
        $books = Book::paginate(10);
        
        return view('consult_book', compact('books'));
    }

    public function addBookView(){
        return view('add_book');
    }

    public function editBookView($id){
        $book = Book::find($id);

        return view('edit_book', ["book" => $book]);
    }

    public function addBook(Request $request){
        try {
            $bookData = $this->sanitizeBookData($request);

            Book::create([
                "name" => $bookData["name"],
                "author" => $bookData["author"],
                "publishing_house" => $bookData["publishing_house"],
                "release_year" => $bookData["release_year"]
            ]);
    
            return redirect('/books/new')->with('status', 'sucess');
        } catch(Exception $e){
            return redirect('/books/new')->with('status', 'fail');
        }
    }

    public function editBook(Request $request, $id){
        try {
            $book = Book::find($id);
            $bookData = $this->sanitizeBookData($request);

            $book->update([
                "name" => $bookData["name"],
                "author" => $bookData["author"],
                "publishing_house" => $bookData["publishing_house"],
                "release_year" => $bookData["release_year"]
            ]);
    
            return redirect('/books/edit/' . $id)->with('status', 'sucess');
        } catch(Exception $e){
            return redirect('/books/edit/' . $id)->with('status', 'fail');
        }
    }
    
    public function deleteBook($id){
        try {
            $book = Book::find($id);

            $book->delete();
    
            return redirect('/books')->with('delete_status', 'sucess');
        } catch(Exception $e){
            return redirect('/books')->with('delete_status', 'fail');
        }
    }

    private function sanitizeBookData($book){
        return [
            "name" => trim($book->name),
            "author" => trim($book->author),
            "publishing_house" => trim($book->publishing_house),
            "release_year" => new \DateTime($book->release_year)
        ];
    }
}
