<?php

namespace App\Http\Controllers\Backend;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Requests\UpdateSliderRequest;

class SliderController extends Controller
{
    public function GetSlider(){
         $slider = Slider::find(1);
         return view('admin.backend.sliders.get_slider' , compact('slider') );
    }





    

 public function UpdateSlider(UpdateSliderRequest $request, $id)
{
    // پیدا کردن رکورد بر اساس ID
    $slider = Slider::findOrFail($id);

    $save_url = $slider->image; // مسیر قبلی تصویر

    // اگر تصویر جدید آپلود شد
    if ($request->hasFile('image') && $request->file('image')->isValid()) {

        // حذف تصویر قبلی اگر وجود داشت
        if ($slider->image && file_exists(public_path($slider->image))) {
            unlink(public_path($slider->image));
        }

        $image = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $img = $manager->read($image);
        $img->resize(306, 618)->save(public_path('upload/slider/' . $name_gen));

        $save_url = 'upload/slider/' . $name_gen;
    }

    // آپدیت رکورد
    $slider->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $save_url,
        'link' => $request->link,
    ]);

    // پیام موفقیت
    $notification = [
        'message' => 'ویرایش با موفقیت انجام شد',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification);
}

}
