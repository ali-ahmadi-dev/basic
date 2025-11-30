<?php

namespace App\Http\Controllers\Backend;
use App\Models\Review;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;


class ReviewController extends Controller
{

   public function AllReview(){
      $review = Review::latest()->get();
      return view('admin.backend.review.all_review' , compact('review'));
   }//end method




      public function AddReview(){
     
      return view('admin.backend.review.add_review');
   }//end method

}
