<a class="courses-list-item position-relative d-block overflow-hidden mb-2"
   href="{{ '/' . $generalLangPrefix . 'courses/' . $course->name }}">
    <img class="img-fluid" src="{{ $course->image }}" alt="">
    <div class="courses-text">
        <h4 class="text-center text-white px-3">{{ $course->title }}</h4>
        <div class="border-top w-100 mt-3">
            <div class="d-flex justify-content-between p-4">
                <span class="text-white"><!--i class="fa fa-user mr-2"></i-->@lang('courses.course_details_page.age'): {{ $course->age }}</span>
                <span class="text-white"><!--i class="fa fa-calendar mr-2"></i-->@lang('courses.course_details_page.duration'): {{ $course->duration }}</span>
            </div>
        </div>
    </div>
</a>
