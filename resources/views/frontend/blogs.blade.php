@extends('frontend.layouts.master')

@section('content')
    <div class="background">
        <h1 class="page_title">{{ $category->title }}</h1>
    </div>




    <section class="blog_section">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <?php
                    $maxLength = 200; // Set your desired maximum length
                    
                    // Get the raw content and strip all tags
                    $strippedContent = strip_tags($post->content);
                    
                    // Decode HTML entities to handle double encoding
                    $decodedContent = htmlspecialchars_decode($strippedContent);
                    
                    // Escape HTML entities
                    $escapedContent = htmlspecialchars($decodedContent);
                    
                    // Take a substring of the escaped content
                    $trimmedContent = substr($escapedContent, 0, $maxLength);
                    ?>



                    <div class="col-md-4">
                        <figure class="snip1527">
                            <div class="image"><img src="{{ $post->firstImagePath }}" /></div>
                            <figcaption>
                                {{-- <div class="date"><span class="day">28</span><span class="month">Oct</span></div> --}}
                                <h3>{{ $post->title }}</h3>
                                <p>

                                    {{ $trimmedContent }}...
                                </p>
                            </figcaption>
                            <a href="{{ route('post.render', ['id' => $post->id]) }}"></a>
                        </figure>
                    </div>
                @endforeach

            </div>





        </div>
    </section>


    <script>
        $(".hover").mouseleave(
            function() {
                $(this).removeClass("hover");
            }
        );
    </script>
@endsection
