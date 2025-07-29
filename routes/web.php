<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use Melipayamak\MelipayamakApi ;
Route::get('/', function () {

   /* try{
        $sms = app('melipayamak')->sms();
        //dd($sms);
        $to = '09384056563';
        $from = '50002710099676';
        $text = 'به فیزیک بیست خواش آمدید';
        $response = $sms->send($to,$from,$text);
        $json = json_decode($response);
        echo $json->Value; //RecId or Error Number
    }catch(Exception $e){
        echo $e->getMessage();
    }*/
    return view('home.index');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
