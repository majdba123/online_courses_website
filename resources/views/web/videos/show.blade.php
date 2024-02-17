@extends('web.weblayout')
@section('content')
<div class="background">
    <script>
        document.addEventListener('contextmenu', function (e) {
            e.preventDefault();
        });
    </script>
    <h2>
        Dont take a <span class="red">Screenshot</span> or<span class="red"> Record a video</span> of
        the screen because this will result in a ban
    </h2>
    <h3>Do not refresh the page</h3>
    <div class="video">
        <video controls autoplay controlsList="nodownload">
            <source id="videoSource" src={{route('videos.show2', $content_url) }} type="video/mp4">
        </video>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

@endsection
<style>
    .body {
        background-color: #eeeeee;
    }

    .red {
        color: red;
    }

    .background {
        text-align: center;
        align-items: center;
        padding: 50px 200px 10px 200px;
    }

    video {
        border-radius: 30px;
        width: 100%;
        height: 100%;
        padding-bottom: 20px;
        padding: 20px;
        background-color: #00aeef;
    }

    @media screen and (max-width: 500px) {
        h1 {
            font-size: 20px;
        }

        .background {
            padding: 0px;
        }

        .question {
            display: block;
        }

        video {
            height: 300px;
        }
    }
</style>


<script>
    document.addEventListener('keyup', (e) => {
        if (e.code === 'PrintScreen' || e.altKey) {
            // User has pressed the Alt key, the Print Screen key, or the F12 key
            navigator.clipboard.writeText('').then(() => {
                console.log('User ');
            }).catch((error) => {
                console.error('Failed : ', error);
            });
            location.reload(); // Refresh the page
        }
    });


    document.addEventListener('keydown', (e) => {
        if (e.keyCode === 123) {
            // User has pressed the F12 key
            e.preventDefault();
        }
    });
</script>
