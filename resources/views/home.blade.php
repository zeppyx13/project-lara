@extends('layout.main')
{{-- css --}}
@section('css')
    <style>
        body {
            margin: 0;
            padding: 0;
            background-size: cover;
            background-position: center;
            height: 100vh;
            background-color: black;
        }
    </style>

    <style>
        --img-bg: "assets/img/photo-bg.avif";

        .img-bg {
            position: absolute;
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }

        .img-bg::before {
            content: "";
            background-image: var(--img-bg);
            background-size: cover;
            position: absolute;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            /* opacity: 0.5; */
            filter: blur(5px);
            z-index: -4;
        }

        h1 {
            position: relative;
        }
    </style>
    <link rel="stylesheet" href="css/home.css">
@endsection
{{-- main --}}
@section('container')
    <div class="img-bg"></div>
    <div class="div heading">
        <h1 id="companionMethods" class="text-center fs-1"></h1>
    </div>
    <hr class="garis">
    {{--  --}}
    <div class="container badge text-center">
        <div class="row position-relative">
            {{--  --}}
            <div class="col-7 quotes-container" class="fs-4">
                <i id="quotes" class="mt-2"></i>
            </div>
            {{--  --}}
            <div class="col-1">
            </div>
            <div class="col-4 weather-container" id="container-suhu">
                <div id="suhu" class="fs-4">
                </div>
                <div id="cuaca" class="fs-4">
                </div>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="search">
        <form class="d-flex" role="search">
            <input class="form-control me-2 mt-4" type="search" placeholder="Find Some things" aria-label="Search">
        </form>
    </div>
    <div class="container">
        <div class="row d-flex justify-center">
            <div class="col-md-8">

            </div>
        </div>
    </div>
    {{-- container hasil --}}
    <div id="gambar" style="z-index:2;">
    </div>
@endsection
{{-- js --}}
@section('ketik-ketik')
    <script>
        new TypeIt("#companionMethods", {
                speed: 50,
                waitUntilVisible: true,
            })
            .type("Walcome", {
                delay: 300
            })
            .move(-5)
            .delete(1)
            .type("e")
            .move(null, {
                to: "END"
            })
            .type(" To")
            .pause(300)
            .type(" Gu-Blg")
            .move(-1)
            .type("o")
            .move(null, {
                to: "END"
            })
            .go();
    </script>
@endsection
{{-- AI --}}
<script type="importmap">
    {
      "imports": {
        "@google/generative-ai": "https://esm.run/@google/generative-ai"
      }
    }
  </script>
<script type="module">
    const out = document.getElementById("quotes")
    import {
        GoogleGenerativeAI
    } from "@google/generative-ai";

    // Fetch your API_KEY
    const API_KEY = "<?php echo env('API_KEY_AI'); ?>"

    // Access your API key (see "Set up your API key" above)
    const genAI = new GoogleGenerativeAI(API_KEY);

    async function run() {
        // For text-only input, use the gemini-pro model
        const model = genAI.getGenerativeModel({
            model: "gemini-pro"
        });

        const prompt = "<?php echo env('AI_PARAMETER'); ?>"

        const result = await model.generateContent(prompt);
        const response = await result.response;
        const text = response.text();
        out.innerHTML = text
    }
    run();
    // ...
</script>
<script type="module">
    const out = document.getElementById("quotes")
    import {
        GoogleGenerativeAI
    } from "@google/generative-ai";

    // Fetch your API_KEY
    const API_KEY = "<?php echo env('API_KEY_AI'); ?>"

    // Access your API key (see "Set up your API key" above)
    const genAI = new GoogleGenerativeAI(API_KEY);

    async function run() {
        // For text-only input, use the gemini-pro model
        const model = genAI.getGenerativeModel({
            model: "gemini-pro"
        });

        const prompt = "hai"

        const result = await model.generateContent(prompt);
        const response = await result.response;
        const text = response.text();
        console.log(text)
    }
    run();
    // ...
</script>
{{-- cuaca --}}
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
<script>
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        console.log("Geolocation is not supported by this browser.");
    }

    function showPosition(position) {
        console.log(position.coords.latitude)
        console.log(position.coords.longitude)
        $.ajax({
            url: 'https://api.openweathermap.org/data/2.5/weather',
            type: 'get',
            dataType: 'json',
            data: {
                'lang': 'id',
                'appid': '<?php echo env('API_KEY_CUACA'); ?>', // Ini merupakan PHP, pastikan kode PHP ini di-render oleh server
                'units': 'metric',
                'lat': position.coords.latitude,
                'lon': position.coords.longitude
            },
            success: function(result) {
                $('#suhu').html(result.name + ', ' + result.main.feels_like + '°C');
                $('#cuaca').html(' ' + result.weather[0].description +
                    `<img style='z-index:3;' width="80" height="80" src="https://openweathermap.org/img/wn/` +
                    result.weather[0].icon + `.png" alt="">`);
            }
        });
    }

    function showError(error) {
        let con = document.getElementById('container-suhu');
        switch (error.code) {
            case error.PERMISSION_DENIED:
                con.innerHTML = `                
                <div class="fs-5 mt-3">
                    User denied the request for Geolocation.
                </div>`;
                break;
            case error.POSITION_UNAVAILABLE:
                con.innerHTML = `                
                <div class="fs-5 mt-3">
                    Location information is unavailable.
                </div>`;
                break;
            case error.TIMEOUT:
                con.innerHTML = `                
                <div class="fs-5 mt-3">
                    The request to get user location timed out.
                </div>`;
                break;
            case error.UNKNOWN_ERROR:
                con.innerHTML = `                
                <div class="fs-5 mt-3">
                    An unknown error occurred.
                </div>`;
                break;
        }
    }
</script>
{{-- background --}}
<script>
    let r = document.querySelector(":root")
    // console.log(imgBg)
    $.ajax({
        url: 'https://api.unsplash.com/photos/random?',
        type: 'get',
        dataType: 'json',
        data: {
            'client_id': '<?php echo env('API_Key_BACKGROUND'); ?>',
            'count': '1',
        },
        success: function(result) {
            r.style.setProperty('--img-bg', 'url(' + result[0].urls.regular + ')')
            // imgBg.targetstyle.backgroundImage = 'url(' + result[0].urls.regular + ')';
            // console.log(result[0].color);
        },
        error: function() {
            r.style.setProperty('--img-bg', 'url(assets/img/photo-bg.avif)')

            // imgBg.style.backgroundImage = 'url(assets/img/photo-bg.avif)'
        }
    })
    // $.ajax({
    //     url: 'https://api.unsplash.com/photos/random?',
    //     type: 'get',
    //     dataType: 'json',
    //     data: {
    //         'client_id': '<?php echo env('API_Key_BACKGROUND'); ?>',
    //         'count': '1',
    //     },
    //     success: function(result) {
    //         // document.body.style.backgroundImage = 'url(' + result[0].urls.regular + ')';
    //         // console.log(result[0].color);
    //     },
    //     error: function() {
    //         document.body.style.backgroundImage = 'url(assets/img/photo-bg.avif)'
    //     }
    // })
</script>
{{-- end js --}}
