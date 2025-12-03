@php
    $slider = App\Models\Slider::find(1);
@endphp

<div class="lonyo-hero-section light-bg">
    <div class="container">
        <div class="row">

            <!-- متن -->
            <div class="col-lg-7 d-flex align-items-center">
                <div class="lonyo-hero-content" data-aos="fade-up" data-aos-duration="700">
                    <h1 class="hero-title">{{ $slider->title }}</h1>
                    <p class="text">{{ $slider->description }}</p>

                    <div class="mt-50" data-aos="fade-up" data-aos-duration="900">
                        <a href="{{ $slider->link }}" class="lonyo-default-btn hero-btn">
                            ایجاد حساب کاربری رایگان
                        </a>
                    </div>
                </div>
            </div>

            <!-- عکس -->
            <div class="col-lg-5">
                <div class="lonyo-hero-thumb" data-aos="fade-left" data-aos-duration="700">
                    <img src="{{ asset($slider->image) }}" alt="">
                    <div class="lonyo-hero-shape">
                        <img src="{{ asset('frontend/assets/images/shape/hero-shape1.svg') }}" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


{{--      
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
document.addEventListener("DOMContentLoaded", () => {

    const titleElement = document.getElementById("slider-title");
    const descElement  = document.getElementById("slider-description");

    async function saveChanges(element) {
        const sliderId = element.dataset.id;
        const field    = element.id === "slider-title" ? "title" : "description";
        const newValue = element.innerText.trim();

        if (!sliderId) {
            console.error("Slider ID is missing!");
            return;
        }

        try {
            const response = await fetch(`/edit-slider/${sliderId}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ [field]: newValue })
            });

            const data = await response.json();
            console.log(data);
        } catch (error) {
            console.error(error);
        }
    }

    // فقط روی المان‌های ویرایش‌پذیر Enter ثبت کنیم
    ;[titleElement, descElement].forEach(el => {

        el.addEventListener("keydown", function(e){
            if (e.key === "Enter") {
                e.preventDefault();
                saveChanges(el);
                el.blur(); // برای خروج از حالت ویرایش
            }
        });

        el.addEventListener("blur", function(){
            saveChanges(el);
        });
    });
});
</script> --}}



