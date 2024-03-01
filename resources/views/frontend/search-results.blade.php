@extends('frontend.layouts.master')
@section('content')

<section class="multi_post">
    <div class="container">
        <div class="multi_poster row justify-content-center">
            @if (
                $posts->isNotEmpty() ||
                    $abouts->isNotEmpty() ||
                    $categories->isNotEmpty() ||
                    $contacts->isNotEmpty() ||
                    $countries->isNotEmpty() ||
                    $courses->isNotEmpty() ||
                    $testimonials->isNotEmpty() ||
                    $blogCategories->isNotEmpty() ||
                    $studentDetails->isNotEmpty())
                @if ($posts->isNotEmpty())
                    <h2>Posts</h2>
                    @foreach ($posts as $post)
                        <div class="post-list">
                            <p>{{ $post->title }}</p>
                            <img src="{{ $post->image }}">
                        </div>
                    @endforeach
                @endif

                @if ($abouts->isNotEmpty())
                    <h2>Abouts</h2>
                    @foreach ($abouts as $about)
                        <div class="about-list">
                            <p>{{ $about->title }}</p>
                        </div>
                    @endforeach
                @endif

                @if ($categories->isNotEmpty())
                    <h2>Categories</h2>
                    @foreach ($categories as $category)
                        <div class="category-list">
                            <p>{{ $category->title }}</p>
                        </div>
                    @endforeach
                @endif

                @if ($contacts->isNotEmpty())
                    <h2>Contacts</h2>
                    @foreach ($contacts as $contact)
                        <div class="contact-list">
                            <p>{{ $contact->name }}</p>
                        </div>
                    @endforeach
                @endif

                @if ($countries->isNotEmpty())
                    <h2>Countries</h2>
                    @foreach ($countries as $country)
                        <div class="country-list">
                            <p>{{ $country->name }}</p>
                        </div>
                    @endforeach
                @endif

                @if ($courses->isNotEmpty())
                    <h2>Courses</h2>
                    @foreach ($courses as $course)
                        <div class="course-list">
                            <p>{{ $course->title }}</p>
                        </div>
                    @endforeach
                @endif

                @if ($testimonials->isNotEmpty())
                    <h2>Testimonials</h2>
                    @foreach ($testimonials as $testimonial)
                        <div class="testimonial-list">
                            <p>{{ $testimonial->name }}</p>
                        </div>
                    @endforeach
                @endif

                @if ($blogCategories->isNotEmpty())
                    <h2>Blog Categories</h2>
                    @foreach ($blogCategories as $blogCategory)
                        <div class="blog-category-list">
                            <p>{{ $blogCategory->title }}</p>
                        </div>
                    @endforeach
                @endif

                @if ($studentDetails->isNotEmpty())
                    <h2>Student Details</h2>
                    @foreach ($studentDetails as $studentDetail)
                        <div class="student-detail">
                            <p>Name: {{ $studentDetail->name }}</p>
                        </div>
                    @endforeach
                @endif
            @else
                <div>
                    <h2>No results found</h2>
                </div>
            @endif


        </div>
    </div>

</section>
@endsection
