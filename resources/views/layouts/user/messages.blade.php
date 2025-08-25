

@foreach($messages as $message )
    @php
        if($message->sender_id == Auth::id())
            $class= "bg-white bg-gray-800 dark:bg-gray-800";
        else
             $class= "bg-white bg-slate-700 dark:bg-slate-700";
 @endphp
<div class=" {{$class }} rounded-2xl  bg shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
    <div class="p-8 space-y-8">
        <!-- From/To -->
        <!-- Message Body -->
        <section class="space-y-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">متن پیام</h2>
            <div class="rounded-2xl border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900/30 leading-8 text-gray-800 dark:text-gray-100">
                {{ $message->body }}
                @include('layouts.user.messages',['messages' => $message->replies])
            </div>
        </section>


    </div>
</div>
@endforeach
