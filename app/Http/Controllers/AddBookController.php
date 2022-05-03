<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddBookRequest;
use App\Models\AddBook;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\ErrorHandler\Debug;
use Illuminate\Support\Facades\Log;

class AddBookController extends Controller
{

  public function AddBook(AddBookRequest $req){
    $AddBook = new AddBook();
    $AddBook->title = $req->input('title');
    $AddBook->author = $req->input('author');
    $AddBook->description = $req->input('description');
    $AddBook->genre = $req->input('genre');
    $AddBook->country = $req->input('country');
    $AddBook->pages = $req->input('pages');
    $AddBook->price = $req->input('price');
    if($req->file('image') != null) {
      $AddBook->image = substr($req->file('image')->store('public/image') , 13);
    }
    $AddBook->save();

    return redirect()->route('add_book')->with('success', 'Книга была добавлена');

    // if(AddBook::where('title')->exists()){
    //   return redirect()->to(route('add_book'))->withErrors([
    //     'titleError' => 'Такая книгу уже существует'
    //   ]);
    // }
  }

  public function allBooks(){
    return view('books', ['data' => AddBook::paginate(8)]);
    // return view('books', ['data' => AddBook::query()->cursorPaginate(2)]);
  }

  public function search(Request $request){
    $AddBook = new AddBook();
    $s = $request->s;
    return view('books', ['data' => AddBook::where('title', 'LIKE', "%{$s}%")->orderBy('title')->paginate(8)]);
  }

  public function showOneBook($id){
    $AddBook = new AddBook();
    return view('one_book', ['data' => $AddBook->find($id)]);
  }

  public function editBook($id){
    $AddBook = new AddBook();
    return view('edit_book', ['data' => $AddBook->find($id)]);
  }

  public function editBookSubmit($id, AddBookRequest $req){
    $AddBook = AddBook::find($id);
    $AddBook->title = $req->input('title');
    $AddBook->author = $req->input('author');
    $AddBook->description = $req->input('description');
    $AddBook->genre = $req->input('genre');
    $AddBook->country = $req->input('country');
    $AddBook->pages = $req->input('pages');
    $AddBook->price = $req->input('price');
    if($req->file('image') != null) {
      $AddBook->image = substr($req->file('image')->store('public/image') , 13);
    }
    else {
      $AddBook->image = $AddBook->image;
    }
    $AddBook->save();

    return redirect()->route('one_book', $id)->with('success', 'Книга была обновлена');
  }

  public function deleteBook($id){
    AddBook::find($id)->delete();
    return redirect()->route('books')->with('success', 'Книга была удалена');
  }

}
