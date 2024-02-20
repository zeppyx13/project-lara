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
        }
    </style>
    <link rel="stylesheet" href="css/home.css">
@endsection
{{-- main --}}
@section('container')
    <div class="div heading">
        <h1 id="companionMethods" class="text-center te"></h1>
    </div>
    <hr class="garis">
    {{--  --}}
    <div class="container badge text-center">
        <div class="row position-relative">
            {{--  --}}
            <div class="col-7 quotes-container">
                <i id="quotes" class="mt-2"></i>
            </div>
            {{--  --}}
            <div class="col-1">
            </div>
            <div class="col-4 weather-container">
                <div id="suhu">
                </div>
                <div id="cuaca">
                </div>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="search">
        <form class="d-flex" role="search">
            <input class="form-control me-2 mt-4" type="search" placeholder="Search Some Article" aria-label="Search">
        </form>
    </div>
    <div id="gambar">

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
{{-- cuaca --}}
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
<script>
    $.ajax({
        url: 'https://api.openweathermap.org/data/2.5/weather',
        type: 'get',
        dataType: 'json',
        data: {
            'lang': 'id',
            'appid': '<?php echo env('API_KEY_CUACA'); ?>',
            'units': 'metric',
            'q': 'Denpasar'
        },
        success: function(result) {
            $('#suhu').html(result.name + ', ' + result.main.feels_like + '°C')
            $('#cuaca').html(result.weather[0].description +
                `<img width="55" height="55" src="https://openweathermap.org/img/wn/` + result.weather[
                    0].icon + `.png" alt="">`)
        }
    })
</script>
{{-- background --}}
<script>
    $.ajax({
        url: 'https://api.unsplash.com/photos/random?',
        type: 'get',
        dataType: 'json',
        data: {
            'client_id': '<?php echo env('API_Key_BACKGROUND'); ?>',
            'count': '1',
        },
        success: function(result) {
            document.body.style.backgroundImage = 'url(' + result[0].urls.regular + ')';
        },
        error: function() {
            document.body.style.backgroundImage = 'url(assets/img/photo-bg.avif)'
        }
    })
</script>
{{-- end js --}}
