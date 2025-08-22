

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
        <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-4 bg-gray-50/50 dark:bg-gray-900/30">
                <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">فرستنده</div>
                <div class="text-gray-900 dark:text-gray-100 font-semibold">{{$message->sender->name}}</div>
                <div class="text-sm text-gray-600 dark:text-gray-300 ltr:font-mono">{{$message->mobile}}</div>
            </div>
            <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-4 bg-gray-50/50 dark:bg-gray-900/30">
                <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">گیرنده</div>
                <div class="text-gray-900 dark:text-gray-100 font-semibold">{{$message->receiver->name}}</div>
                <div class="text-sm text-gray-600 dark:text-gray-300 ltr:font-mono">{{$message->receiver->mobile}}</div>
            </div>


        </section>

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
