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

    <div>
        <h2>کلید لایسنس</h2>
        <textarea><?=$license['spotplayer_key']?></textarea>
    </div>
    <div>
        <h2>دانلود ویدیوها</h2>
        <div>
            <script src="https://dl.spotplayer.ir<?=$license['spotplayer_url']?>?f=js"></script>
            <script type="application/javascript">

                document.write(window.spotplayer_courses.map(function (c) {
                    return '<h3>' + c.name + '</h3>' +
                        c.items.map(function (v) {
                            return '<div class="sp_' + v.type + '">'
                                + '<a href="<?="http://dl.spotplayer.ir" . $license['spotplayer_url'] ?>' + v._id + '.spot">'  + v.name + '</a>'
                                + '</div>';
                        }).join('');
                }).join(''));
            </script>
        </div>
    </div>
@endsection
