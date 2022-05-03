<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddBook;

class FavoritesController extends Controller
{
  public function addToFavorites($id, Request $request)
  {
      $book = AddBook::find($id);
      if(!$book) {
          abort(404);
      }
      $favorites = session()->get('favorites');

      if(!$favorites) {
          $favorites = [
                  $id => [
                    "title" => $book->title,
                    "author" => $book->author,
                    "price" => $book->price,
                    "image" => $book->image
                  ]
          ];
          session()->put('favorites', $favorites);
          return redirect()->back()->with('success', 'Книга добавлена в фавориты!');
      }

      $favorites[$id] = [
        "title" => $book->title,
        "author" => $book->author,
        "price" => $book->price,
        "image" => $book->image
      ];
      session()->put('favorites', $favorites);
      return redirect()->back()->with('success', 'Книга добавлена в фавориты!');
  }

  public function removeFavorites($id)
  {
      if($id) {
          $favorites = session()->get('favorites');
          if(isset($favorites[$id])) {
              unset($favorites[$id]);
              session()->put('favorites', $favorites);
          }
          session()->flash('success', 'Книга удалена');
          return redirect()->back()->with('success', 'Книга удалена!');
      }
  }
}
