<?php

namespace App\Http\Controllers\Backend;
use App\Models\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

use Intervention\Image\Drivers\Gd\Driver;

class ReviewController extends Controller
{

   public function AllReview(){
      $review = Review::latest()->get();
      return view('admin.backend.review.all_review' , compact('review'));
   }//end method




      public function AddReview(){
     
      return view('admin.backend.review.add_review');
   }//end method


    public function StoreReview(StoreReviewRequest $request){

  
      $save_url = null;

     if ($request->file('image')) {
          $image=$request->file('image');
          $manager = new ImageManager(new Driver());
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          $img = $manager->read($image);
          $img->resize(60, 60)->save(public_path('upload/review/'.$name_gen));
          $save_url = 'upload/review/' . $name_gen;
     

     }

            Review::create([

            'name' => $request->name,
            'position' => $request->position,
            'image' => $save_url,
            'message' => $request->message,

          ]);

            $notification = array (
           
            'message' => ' ویرایش با موفقعیت انجام شد ',
            'alert-type'=>'success'

            );
      return redirect()->route('all.review')->with($notification);
     
   }//end method




   public function EditReview($id){

      $review = Review::find($id);

       return view('admin.backend.review.edit_review', compact('review') );

   }//end method



 public function UpdateReview(StoreReviewRequest $request, $id)
{
    // پیدا کردن رکورد بر اساس ID
    $review = Review::findOrFail($id);

    $save_url = $review->image; // مسیر قبلی تصویر

    // اگر تصویر جدید آپلود شد
    if ($request->hasFile('image') && $request->file('image')->isValid()) {

        // حذف تصویر قبلی اگر وجود داشت
        if ($review->image && file_exists(public_path($review->image))) {
            unlink(public_path($review->image));
        }

        $image = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $img = $manager->read($image);
        $img->resize(60, 60)->save(public_path('upload/review/' . $name_gen));

        $save_url = 'upload/review/' . $name_gen;
    }

    // آپدیت رکورد
    $review->update([
        'name' => $request->name,
        'position' => $request->position,
        'image' => $save_url,
        'message' => $request->message,
    ]);

    // پیام موفقیت
    $notification = [
        'message' => 'ویرایش با موفقیت انجام شد',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.review')->with($notification);
}

}
