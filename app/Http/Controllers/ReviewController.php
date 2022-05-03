<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Models\User;
use App\Models\AddBook;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\ErrorHandler\Debug;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function AddReview(ReviewRequest $req){
      $AddReview = new AddReview();
      $AddReview->review = $req->input('review');
      $AddReview->user_id = Auth::id();
      $AddReview->user_id = Auth::login();
      $AddReview->book_id = AddBook::id();

      $AddReview->save();

      return redirect()->route('one_book')->with('success', 'Отзыв опубликован');
    }

    public function ShowReviews(){
      $reviews = AddReview::with('user', 'AddBook')->where('user_id', = ,Auth::id(), 'book_id', = ,AddBook::id())->get();
      return view('Reviews', ['Reviews' => $reviews]);
    }
}
