@if($errors->any())
    <div class="mb-4 rounded-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>

@endif
