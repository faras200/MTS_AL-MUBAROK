@extends('guests.layouts.main')

@section('container')
    <div class="container">
        <h2 class="title" style="margin-top:0px; padding-top:10px;">{{ $post['title'] }}</h2>
        <h5>Post By
            <a href="/home?authors={{ $post->user->username }}">{{ $post->user->name }} </a>in
            <a href="/home?category={{ $post->category->slug }}">{{ $post->category->name }} </a>
            {{ $post->created_at->diffForHumans() }}
        </h5>


        <style>
            p img {
                min-width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
                display: block !important;
                /* Mengubah img menjadi elemen block */
                margin-left: auto !important;
                /* Mengatur margin kiri otomatis */
                margin-right: auto !important;
                /* Mengatur margin kanan otomatis */
            }


            p input {
                max-width: 100% !important;
                height: auto !important;
            }

            p {
                text-align: justify !important;
            }
        </style>
        <p class="mb-5">{!! $post->body !!}</p>

        <div class="mt-5" id="disqus_thread"></div>
        <script>
            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document,
                    s = d.createElement('script');
                s.src = 'https://skripsifaras.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
                Disqus.</a></noscript>
    </div>
@endsection
