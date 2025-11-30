@extends('admin.admin_master')

@section('admin')

<div class="content">

    <!-- Start Content -->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1 text-end">
                <h4 class="fs-18 fw-semibold m-0">اضافه کردن نظرات</h4>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <div class="card border mb-0">

                    <div class="card-header text-end">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title mb-0">اطلاعات شخصی</h4>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                            <!-- Name -->
                            <div class="form-group mb-3 text-end">
                                <label class="form-label">نام</label>
                                <input class="form-control text-end" name="name" type="text">
                            </div>

                            <!-- Position -->
                            <div class="form-group mb-3 text-end">
                                <label class="form-label">موقعیت</label>
                                <input class="form-control text-end" name="position" type="text">
                            </div>

                            <!-- Message -->
                            <div class="form-group mb-3 text-end">
                                <label class="form-label">پیام</label>
                                <textarea class="form-control text-end" name="message"></textarea>
                            </div>

                            <!-- Image preview -->
                            <div class="form-group mb-3 text-end">
                                <label class="form-label">پیش‌ نمایش تصویر</label>
                                <div>
                                    <img src="{{ url('upload/image_photo.jpg') }}"
                                        class="rounded-circle avatar-xxl img-thumbnail float-end"
                                        id="showimage" alt="تصویر پروفایل">
                                </div>
                            </div>

                            <!-- Upload -->
                            <div class="form-group mb-3 text-end ">
                                <label class="form-label"></label>
                                <input class="form-control" id="image" name="photo" type="file">
                            </div>

                            <!-- Submit -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">ویرایش</button>
                            </div>

                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

<!-- Image Preview Script -->
<script>
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
