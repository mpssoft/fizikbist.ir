@extends('layouts.app')

@section('content')

<div class="h-full bg-white dark:bg-slate-900 overflow-auto transition-colors duration-300">

<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
    <div class="flex gap-2 items-center">
    <!-- Article Title -->
    <h1 class="text-2xl   font-bold text-gray-900 dark:text-white  leading-tight">{{$blog->title}}</h1>

    </div>
    <!-- Article Meta -->
    <div class="flex flex-wrap items-center gap-4 sm:gap-6 mb-8 mt-4  border-gray-200 dark:border-slate-700">
        <div class="flex items-center gap-3">
            <img src="{{asset($blog->author_image ?? Storage::disk('users')->url( 'thumbs/'.$blog->user->image))}}" alt="{{$blog->author ?? $blog->user->name}}" class="w-12 h-12 rounded-full object-cover">
            <div class="flex flex-col gap-3 ">
                <div class="flex gap-3">

                    <div class="flex gap-2 md:gap-3   !text-xs">
                        <div class="flex items-center gap-1 md:gap-2 text-gray-600 dark:text-slate-400"><i class="fas fa-calendar-alt"></i> <span class="text-sm">{{Morilog\Jalali\Jalalian::forge($blog->created_at)->format("%d %B %Y")}}</span>
                        </div>
                        <div class="flex items-center gap-1 md:gap-2 text-gray-600 dark:text-slate-400"><i class="fas fa-clock"></i> <span class="text-sm">{{$blog->reading_time}} دقیقه مطالعه</span>
                        </div>
                        <div class="flex items-center gap-1 md:gap-2 text-gray-600 dark:text-slate-400"><i class="fas fa-eye"></i> <span class="text-sm">{{$blog->view}} بازدید</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2 md:gap-5">
                    <div class=" text-sm  text-gray-900 dark:text-white">
                        {{$blog->author ?? $blog->user->name}}
                    </div>
                @foreach($blog->categories as $category)
                    <span class="px-3 bg-gray-100 dark:bg-slate-800 hover:bg-gray-200 dark:hover:bg-slate-700 text-gray-800 dark:text-slate-300 rounded-3xl text-sm font-medium transition-colors">{{$category->name}}</span>
                @endforeach
                </div>

            </div>
        </div>

    </div><!-- Cover Image -->
    <div class="relative w-full h-96 sm:h-[500px] rounded-xl overflow-hidden mb-12 shadow-lg">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600 via-purple-600 to-pink-600 flex items-center justify-center">
            <div class="text-center w-full h-full text-white ">
               <img src="{{asset($blog->cover_image)}}" alt="{{$blog->name}}" class="w-full h-full object-cover">
            </div>
        </div>
    </div><!-- Article Content -->
        <article class=" !text-sm p-5 bg-gradient-to-br from-blue-50 to-purple-50 dark:from-slate-800 dark:to-slate-700 rounded-2xl border border-blue-100 dark:border-slate-600">

       {!! $blog->content !!}
    </article>
    <!-- Like and Share Section -->
    @include('like::partials.like-view',['model'=>$blog])

    <!-- Author Bio -->
    <div class="mt-6 p-8 bg-gradient-to-br from-blue-50 to-purple-50 dark:from-slate-800 dark:to-slate-700 rounded-2xl border border-blue-100 dark:border-slate-600">
        <div class="flex flex-col sm:flex-row items-start gap-6">
            <div class="w-full flex flex-col items-center ">
                <img src="{{$blog->author?  $blog->author_image:Storage::disk('users')->url( 'thumbs/'.$blog->user->image)}}" alt="{{$blog->author ?? $blog->user->name}}" class="w-24 h-24 rounded-full object-cover shadow-md">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white ">{{$blog->author ?? $blog->user->name}}</h3>
            </div>
            <div class="flex">
                <p class="text-gray-700 dark:text-slate-300 leading-relaxed mb-4">{{$blog->author? $blog->author_about:$blog->user->about}}</p>
            </div>
        </div>
    </div>
    <!-- Tags -->

    <div class="mt-6 flex items-center gap-4  pt-8 border-t border-gray-200 dark:border-slate-700">
        <h3 class="text-sm font-semibold text-gray-600 dark:text-slate-400  flex items-center gap-2"><i class="fas fa-tags"></i>  برچسب ها </h3>
        <div class="flex flex-wrap gap-2">
            @foreach(explode(',',$blog->tags) as $tag)
            <span class="px-4 py-2 bg-gray-100 dark:bg-slate-800 hover:bg-gray-200 dark:hover:bg-slate-700 text-gray-800 dark:text-slate-300 rounded-lg text-sm font-medium transition-colors">#{{$tag}}</span>
            @endforeach
        </div>
    </div>

@if($relatedBlogs->count()>0)
    <!-- Related Articles -->
        <h2 class="text-2xl mt-4 font-bold text-slate-900 dark:text-slate-100 mb-2">مقالات مرتبط</h2>
        <div class="bg-white  dark:bg-slate-900 rounded-3xl shadow-xl border border-slate-200 dark:border-slate-800 p-2 md:p-4">
        <div class="grid md:grid-cols-2 gap-6">
            @foreach($relatedBlogs as $rb)
                <a href="{{route('article.show',$rb->id)}}">
            <article class="group bg-slate-50 dark:bg-slate-800 overflow-hidden hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors rounded-xl cursor-pointer">

                    <img src="{{asset($rb->cover_image)}}" alt=" {{$rb->title}}" class=" w-full object-cover" />

                <div class=" p-6  h-full ">

                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100  group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">
                        {{$rb->title}}</h3>
                    <span class="text-sm mb-3 text-slate-600 dark:text-slate-400" >نویسند:  {{$rb->author ?? $rb->user->name}}</span>
                    <p class="text-slate-600 dark:text-slate-300 text-sm mb-4">{{$rb->description}}</p>
                    <div class="text-xs text-slate-500 dark:text-slate-500"> {{ \Morilog\Jalali\Jalalian::forge($rb->created_at)->format("%d %B %Y") }};
                        {{$rb->reading_time}} دقیقه مطالعه</div>
                </div>
            </article>
                </a>
            @endforeach

        </div>
    </div>
@endif
</main>
</div>
@push('scripts')
    @include('like::partials.like-script')
@endpush

@endsection


