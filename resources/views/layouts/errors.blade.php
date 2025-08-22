
@if ($errors->any())
    <div class="mb-6 rounded-xl border border-rose-300/60 bg-rose-50/80 text-rose-700 dark:border-rose-500/40 dark:bg-rose-900/30 dark:text-rose-200 p-4">

        <ul class="list-disc pr-5 text-sm space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
