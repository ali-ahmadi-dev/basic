@extends('admin.admin_master')

@section('admin')
 

                <div class="content">

                    <!-- Start Content-->
                    <div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">پروفایل</h4>
                            </div>
                        </div>




                         <div class="row" dir="ltr" lang="fa">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <div class="align-items-center">
                        <div class="d-flex align-items-center flex-row-reverse">
                            <img src=" {{(!empty( $profiledata->photo)) ? url('upload/user_images/'.$profiledata->photo) :  url('upload/image_photo.jpg') }} "
                                class="rounded-circle avatar-xxl img-thumbnail float-end" alt="تصویر پروفایل">

                            <div class="overflow-hidden me-4 text-end">
                                <h4 class="m-0 text-dark fs-20">{{$profiledata->name}}</h4>
                                <p class="my-1 text-muted fs-16"> {{ $profiledata->email }} </p>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="tab-pane pt-4" id="profile_setting" role="tabpanel" aria-labelledby="setting_tab">
                    <div class="row">

                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="card border mb-0">

                                    <div class="card-header text-end">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="card-title mb-0">اطلاعات شخصی</h4>
                                            </div><!--end col-->
                                        </div>
                                    </div>

                                    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    <div class="card-body">

                                        <div class="form-group mb-3 row text-end">
                                            <label class="form-label">نام</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control text-end" name="name" type="text" value="{{  $profiledata->name }}">
                                            </div>
                                        </div>

                                               
                                        <div class="form-group mb-3 row text-end">
                                            <label class="form-label">ایمیل</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control text-end" name="email" type="email"  value="{{  $profiledata->email}}">
                                            </div>
                                        </div>  
                                        
                                        <div class="form-group mb-3 row text-end">
                                            <label class="form-label"> شماره تلفن </label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control text-end" name="phone" type="text" value="{{  $profiledata->phone}}">
                                            </div>
                                        </div>

                                         <div class="form-group mb-3 row text-end">
                                            <label class="form-label">ادرس</label>
                                            <div class="col-lg-12 col-xl-12">
                                           <textarea class="form-control" name="address"> {{ $profiledata->address }}</textarea>
                                            </div>
                                        </div>
                                    <div class="form-group mb-3 row text-end">
                                            <label class="form-label"></label>
                                            <div class="col-lg-12 col-xl-12">
                                                        <img src=" {{(!empty( $profiledata->photo)) ? url('upload/user_images/'.$profiledata->photo) :  url('upload/image_photo.jpg') }} "
                                class="rounded-circle avatar-xxl img-thumbnail float-end" id="showimage" alt="تصویر پروفایل">
                                            </div>
                                        </div>





                                        <div class="form-group mb-3 row text-end">
                                            <label class="form-label">انتخاب عکس</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control " id="image" name="photo" type="file" value="{{  $profiledata->photo}}">
                                            </div>
                                        </div>



                     
                          
                                            <button type="submit" class="btn btn-primary ">ویرایش</button>

                     
                     

                                    </div><!--end card-body-->
                                    </form>
                                </div>
                            </div>


                            <div class="col-lg-6 col-xl-6">
                                <div class="card border mb-0">

                                    <div class="card-header text-end">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="card-title mb-0">تغییر رمز عبور</h4>
                                            </div><!--end col-->
                                        </div>
                                    </div>

                                    <form action="{{ route('admin.password.update') }}" method="POST">
                                        @csrf
                                    <div class="card-body mb-0">
                                        <div class="form-group mb-3 row text-end">
                                            <label class="form-label">رمز عبور قدیمی</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control text-end  @error('old_password') is-invalid @enderror " id="old_password" name="old_password" type="password"
                                                    placeholder="رمز عبور قدیمی">

                                               <div class="text-danger">
                                                     @error('old_password')
                                                             {{ $message }}
                                                    @enderror
                                               </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3 row text-end">
                                            <label class="form-label">رمز عبور جدید</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control text-end  @error('new_password') is-invalid @enderror " id="new_password" name="new_password" type="password"
                                                    placeholder="رمز عبور جدید">

                                                        <div class="text-danger">
                                                     @error('new_password')
                                                             {{ $message }}
                                                    @enderror
                                               </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3 row text-end">
                                            <label class="form-label"> تکرار رمز عبور جدید</label>
                                            <div class="col-lg-12 col-xl-12">
                                                <input class="form-control text-end  @error('new_password_confirmation') is-invalid @enderror " id="new_password_confirmation" name="new_password_confirmation" type="password"
                                                    placeholder="تأیید رمز عبور">
                                             <div class="text-danger">
                                                     @error('new_password_confirmation')
                                                             {{ $message }}
                                                    @enderror
                                               </div>
                                            </div>
                                        </div>

                                        <div class="form-group row text-end">
                                            <div class="col-lg-12 col-xl-12">
                                                <button type="submit" class="btn btn-primary">تغییر رمز عبور</button>
                                            </div>
                                        </div>

                                    </div><!--end card-body-->
                                </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div> <!-- پایان تنظیمات پروفایل -->


          
        </div>
    </div>
    </div>
    </div>




                    </div>

             </div>



 <script >
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('showimage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>


   
@endsection
