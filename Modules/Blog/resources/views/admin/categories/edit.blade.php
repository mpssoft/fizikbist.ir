
@extends('layouts.admin.master')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">


    <main class="p-6">
        <div class="max-w-4xl mx-auto">
            <!-- Header Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 mb-6">
                <div class="flex items-center justify-between p-6">
                    <div class="flex items-center gap-4">


                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 flex items-center gap-3">
                                <i class="fas fa-plus-circle text-blue-600 dark:text-blue-400"></i>
                                ویرایش دسته‌
                            </h1>

                        </div>
                    </div>


                </div>
            </div>
            @include('layouts.errors')
            <!-- Form Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                        <i class="fas fa-info-circle text-blue-600 dark:text-blue-400"></i>
                        اطلاعات دسته‌بندی
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">فرم زیر را برای ایجاد دسته‌بندی جدید تکمیل کنید</p>
                </div>

                <form action="{{route('admin.categories.update',$category->id)}}" method="post" class="p-6 space-y-6">
                    @csrf
                    @method('put')
                    <!-- Category Name -->
                    <div>
                        <label for="categoryName" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                            <i class="fas fa-tag text-blue-600 dark:text-blue-400"></i>
                            نام دسته‌بندی *
                        </label>
                        <input
                            type="text"
                            id="categoryName"
                            name="name"
                            value="{{old('name',$category->name)}}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 transition-colors"
                            placeholder="نام دسته‌بندی را وارد کنید"
                        >
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">این نام به عنوان عنوان دسته‌بندی نمایش داده می‌شود</p>
                    </div>
                    <!-- Category Icon -->
                    <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2"> <i class="fas fa-icons text-indigo-600 dark:text-indigo-400"></i> آیکون دسته‌بندی * </label>
                        <div class="grid grid-cols-6 sm:grid-cols-8 md:grid-cols-10 gap-3"><label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='laptop-code'? 'checked':''}} value="laptop-code" required class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-laptop-code text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='flask'? 'checked':''}} value="flask" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-flask text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='briefcase'? 'checked':''}} value="briefcase" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-briefcase text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='heart'? 'checked':''}} value="heart" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-heart text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='heartbeat'? 'checked':''}} value="heartbeat" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-heartbeat text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='graduation-cap'? 'checked':''}} value="graduation-cap" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-graduation-cap text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='shopping-cart'? 'checked':''}} value="shopping-cart" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-shopping-cart text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='camera'? 'checked':''}} value="camera" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-camera text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='music'? 'checked':''}} value="music" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-music text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='futbol'? 'checked':''}} value="futbol" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-futbol text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='plane'? 'checked':''}} value="plane" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-plane text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='book'? 'checked':''}} value="book" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-book text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='car'? 'checked':''}} value="car" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-car text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='utensils'? 'checked':''}} value="utensils" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-utensils text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='home'? 'checked':''}} value="home" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-home text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='paint-brush'? 'checked':''}} value="paint-brush" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-paint-brush text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='gamepad'? 'checked':''}} value="gamepad" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-gamepad text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='film'? 'checked':''}} value="film" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-film text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='dumbbell'? 'checked':''}} value="dumbbell" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-dumbbell text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label> <label class="icon-option"> <input type="radio" name="icon" {{$category->icon=='newspaper'? 'checked':''}} value="newspaper" class="hidden peer">
                                <div class="w-full aspect-square border-2 border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/30"><i class="fas fa-newspaper text-xl text-gray-600 dark:text-gray-400"></i>
                                </div></label>
                        </div>

                    </div>
                    <!-- Category Color -->
                    <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2"> <i class="fas fa-palette text-pink-600 dark:text-pink-400"></i> رنگ دسته‌بندی * </label>
                        <div class="grid grid-cols-5 sm:grid-cols-10 gap-3"><label class="color-option"> <input type="radio" name="color" {{$category->color=='blue' ? 'checked':''}} value="blue" required class="hidden peer">
                                <div class="w-full aspect-square bg-blue-500 rounded-lg cursor-pointer border-2 border-transparent peer-checked:border-gray-900 dark:peer-checked:border-white peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-900 dark:peer-checked:ring-white transition-all"></div></label> <label class="color-option"> <input type="radio" name="color" {{$category->color=='green' ? 'checked':''}} value="green" class="hidden peer">
                                <div class="w-full aspect-square bg-green-500 rounded-lg cursor-pointer border-2 border-transparent peer-checked:border-gray-900 dark:peer-checked:border-white peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-900 dark:peer-checked:ring-white transition-all"></div></label> <label class="color-option"> <input type="radio" name="color" {{$category->color=='purple' ? 'checked':''}} value="purple" class="hidden peer">
                                <div class="w-full aspect-square bg-purple-500 rounded-lg cursor-pointer border-2 border-transparent peer-checked:border-gray-900 dark:peer-checked:border-white peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-900 dark:peer-checked:ring-white transition-all"></div></label> <label class="color-option"> <input type="radio" name="color" {{$category->color=='' ? 'checked':''}} value="pink" class="hidden peer">
                                <div class="w-full aspect-square bg-pink-500 rounded-lg cursor-pointer border-2 border-transparent peer-checked:border-gray-900 dark:peer-checked:border-white peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-900 dark:peer-checked:ring-white transition-all"></div></label> <label class="color-option"> <input type="radio" name="color" {{$category->color=='pink' ? 'checked':''}} value="red" class="hidden peer">
                                <div class="w-full aspect-square bg-red-500 rounded-lg cursor-pointer border-2 border-transparent peer-checked:border-gray-900 dark:peer-checked:border-white peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-900 dark:peer-checked:ring-white transition-all"></div></label> <label class="color-option"> <input type="radio" name="color" {{$category->color=='amber' ? 'checked':''}} value="amber" class="hidden peer">
                                <div class="w-full aspect-square bg-amber-500 rounded-lg cursor-pointer border-2 border-transparent peer-checked:border-gray-900 dark:peer-checked:border-white peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-900 dark:peer-checked:ring-white transition-all"></div></label> <label class="color-option"> <input type="radio" name="color" {{$category->color=='cyan' ? 'checked':''}} value="cyan" class="hidden peer">
                                <div class="w-full aspect-square bg-cyan-500 rounded-lg cursor-pointer border-2 border-transparent peer-checked:border-gray-900 dark:peer-checked:border-white peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-900 dark:peer-checked:ring-white transition-all"></div></label> <label class="color-option"> <input type="radio" name="color" {{$category->color=='teal' ? 'checked':''}} value="teal" class="hidden peer">
                                <div class="w-full aspect-square bg-teal-500 rounded-lg cursor-pointer border-2 border-transparent peer-checked:border-gray-900 dark:peer-checked:border-white peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-900 dark:peer-checked:ring-white transition-all"></div></label> <label class="color-option"> <input type="radio" name="color" {{$category->color=='indigo' ? 'checked':''}} value="indigo" class="hidden peer">
                                <div class="w-full aspect-square bg-indigo-500 rounded-lg cursor-pointer border-2 border-transparent peer-checked:border-gray-900 dark:peer-checked:border-white peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-900 dark:peer-checked:ring-white transition-all"></div></label> <label class="color-option"> <input type="radio" name="color" {{$category->color=='slate' ? 'checked':''}} value="slate" class="hidden peer">
                                <div class="w-full aspect-square bg-slate-500 rounded-lg cursor-pointer border-2 border-transparent peer-checked:border-gray-900 dark:peer-checked:border-white peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-gray-900 dark:peer-checked:ring-white transition-all"></div></label>
                        </div>

                    </div>

                    <!-- Description -->
                    <div>
                        <label for="categoryDescription" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                            <i class="fas fa-align-left text-purple-600 dark:text-purple-400"></i>
                            توضیحات
                        </label>
                        <textarea
                            id="categoryDescription"
                            name="description"
                            rows="4"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 transition-colors resize-none"
                            placeholder="توضیح مختصری از این دسته‌بندی وارد کنید"
                        >{{$category->description}}</textarea>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">توضیحات اختیاری برای کمک به کاربران در درک این دسته‌بندی</p>
                    </div>
                    <!-- Status -->
                    <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3 flex items-center gap-2"> <i class="fas fa-toggle-on text-green-600 dark:text-green-400"></i> وضعیت </label> <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="status" value="active" {{$category->status == 'active' ? 'checked':''}} class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 cursor-pointer"> <span class="mr-3 text-sm font-medium text-gray-700 dark:text-gray-300">فعال</span> </label>

                    </div>
                    <!-- Form Actions -->
                    <div class="flex justify-center pt-6 border-t border-gray-200 dark:border-gray-700">
                        <button
                            type="submit"
                            class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors flex items-center gap-2"
                        >
                            <i class="fas fa-plus"></i>
                            ثبت تغییرات دسته‌بندی
                        </button>
                    </div>
                </form>
            </div>


        </div>
    </main>


</div>
@endsection
