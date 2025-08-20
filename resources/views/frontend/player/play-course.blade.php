@extends('layouts.app')
@push('styles')
    <style>
        #spotplayer{
            width:100%;
            height:500px;
        }
    </style>
@endpush
@section('content')
    <div class="container mx-auto p-4">
        <h1  class="text-xl font-bold mb-4">{{ $license->course->title ?? 'SpotPlayer Video' }}</h1>

        <div id="player"></div>

    </div>
        <script src="https://app.spotplayer.ir/assets/js/app-api.js"></script>
        <script >
            async function Play() {
                try {
                    const sp = new SpotPlayer(document.getElementById('player'), '/spotx', false);
                    await sp.Open("{{$license->spotplayer_key}}");
                }
                catch(ex) {
                    console.log("errrrrroorrrr: "+ex);
                }
            }
            Play();


        </script>
@endsection
