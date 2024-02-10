@extends('web.weblayout')
@section('content')

<div class="background">
    <h2>
      Dont take a <span>Screenshot</span> or<span> Record a video</span> of
      the screen because this will result in a ban
    </h2>
    <h3>Do not refresh the page</h3>
    <div class="video">
      <video controls  controlsList="nodownload" >
        <source  id="videoSource" src={{route('videos.show2', $content_url) }} type="video/mp4">
        </video>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: '{{ route('forget-session') }}',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log('Session forgotten');
                },
                error: function(xhr, status, error) {
                    console.error('Error forgetting session: ' + error);
                }
            });
        }, 2500);
     });
    </script>
    <script>
        // تعطيل الفأرة ولوحة المفاتيح
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('mousemove', disableInput);
            document.addEventListener('keydown', disableInput);

            setTimeout(function() {
                document.removeEventListener('mousemove', disableInput);
                document.removeEventListener('keydown', disableInput);
            }, 5000);
        });

        function disableInput(event) {
            event.preventDefault();
        }
    </script>

@endsection
