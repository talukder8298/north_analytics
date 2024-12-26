<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\IndustriesController;
use App\Http\Controllers\AboutUsController;

//Frontend
Route::get('/', [HomeController::class, 'home'])->name('/');

Route::get('insight/all', [HomeController::class, 'blog'])->name('frontend.blog');
Route::get('insight/{slug}',[HomeController::class,'blogDetails'])->name('blog_details');
Route::get('category-wise-insight/{id}',[HomeController::class,'categoryWiseBlog'])->name('category_wise_blog');

Route::get('contact-us', [HomeController::class, 'contact'])->name('contact_us');
Route::get('services', [HomeController::class, 'services'])->name('frontend.services');
Route::get('service/details/{slug}', [HomeController::class, 'servicesDetails'])->name('frontend.services.details');
Route::get('finance', [HomeController::class, 'finance'])->name('frontend.finance');
Route::get('finance-details/{slug}/{type}', [HomeController::class, 'financeDetails'])->name('frontend.finance.details');
Route::get('construction', [HomeController::class, 'construction'])->name('frontend.construction');
Route::post('contact-us', [HomeController::class, 'contactPost']);

Route::get('about/us', [HomeController::class, 'about'])->name('frontend.about');

Route::get('/dashboard', function () {
    return view('backend.pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Slider
    Route::get('slider', [SliderController::class,'index'])->name('slider');
    Route::get('slider/add', [SliderController::class,'add'])->name('slider.add');
    Route::post('slider/add', [SliderController::class,'addPost']);
    Route::get('slider/edit/{slider}', [SliderController::class,'edit'])->name('slider.edit');
    Route::post('slider/edit/{slider}', [SliderController::class,'editPost']);
    Route::post('slider/delete', [SliderController::class,'delete'])->name('slider.delete');

    // Category
    Route::get('category', [CategoryController::class,'index'])->name('category');
    Route::get('category/add', [CategoryController::class,'add'])->name('category.add');
    Route::post('category/add', [CategoryController::class,'addPost']);
    Route::get('category/edit/{category}', [CategoryController::class,'edit'])->name('category.edit');
    Route::post('category/edit/{category}', [CategoryController::class,'editPost']);

    //Blog
    Route::get('blog',[BlogController::class,'index'])->name('blog');
    Route::get('blog/create',[BlogController::class,'create'])->name('blog.add');
    Route::post('blog/create',[BlogController::class,'store']);
    Route::get('blog/edit/{blog}',[BlogController::class,'edit'])->name('blog.edit');
    Route::post('blog/edit/{blog}',[BlogController::class,'update']);
    Route::post('blog/destroy',[BlogController::class,'destroy'])->name('blog.destroy');

    //Service
    Route::get('service',[ServiceController::class,'index'])->name('service');
    Route::get('service/create',[ServiceController::class,'create'])->name('service.add');
    Route::post('service/create',[ServiceController::class,'store']);
    Route::get('service/edit/{service}',[ServiceController::class,'edit'])->name('service.edit');
    Route::post('service/edit/{service}',[ServiceController::class,'update']);
    Route::post('service/destroy',[ServiceController::class,'destroy'])->name('service.destroy');

    //Client
    Route::get('client',[ClientController::class,'index'])->name('client');
    Route::get('client/create',[ClientController::class,'create'])->name('client.create');
    Route::post('client/create',[ClientController::class,'store']);
    Route::get('client/edit/{client}',[ClientController::class,'edit'])->name('client.edit');
    Route::post('client/edit/{client}',[ClientController::class,'update']);
    Route::post('client/destroy',[ClientController::class,'destroy'])->name('client.destroy');

    //Member
    Route::get('member',[MemberController::class,'index'])->name('member');
    Route::get('member/create',[MemberController::class,'create'])->name('member.create');
    Route::post('member/create',[MemberController::class,'store']);
    Route::get('member/edit/{member}',[MemberController::class,'edit'])->name('member.edit');
    Route::post('member/edit/{member}',[MemberController::class,'update']);
    Route::post('member/destroy',[MemberController::class,'destroy'])->name('member.destroy');

    //Industries
    Route::get('industries',[IndustriesController::class,'index'])->name('industries');
    Route::get('industries/create',[IndustriesController::class,'create'])->name('industries.create');
    Route::post('industries/create',[IndustriesController::class,'store']);
    Route::get('industries/edit/{industries}',[IndustriesController::class,'edit'])->name('industries.edit');
    Route::post('industries/edit/{industries}',[IndustriesController::class,'update']);
    Route::post('industries/destroy',[IndustriesController::class,'destroy'])->name('industries.destroy');

    //About Us
    Route::get('about-us',[AboutUsController::class,'viewInformation'])->name('about.information');
    Route::post('about-us/{about}',[AboutUsController::class,'update'])->name('about.update');
    Route::delete('/contents/{id}', [AboutUsController::class, 'destroy'])->name('contents.destroy');

    Route::get('/university/form', function () { return view('backend.pages.addUniversity') ;})->name('backend.university.form');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/countries/index', [CountryController::class, 'index'])->name('countries.index');
    Route::post('/countries/store', [CountryController::class, 'store'])->name('countries.store');
    Route::get('/countries/{id}/edit', [CountryController::class, 'edit'])->name('countries.edit');
    Route::put('/countries/{id}', [CountryController::class, 'update'])->name('countries.update');
    Route::delete('/countries/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');

    Route::get('/universities/all', [UniversityController::class, 'index'])->name('university.all');
    Route::post('/universities/store', [UniversityController::class, 'store'])->name('university.store');
    Route::get('/universities/{id}/edit', [UniversityController::class, 'edit'])->name('university.edit');
    Route::put('/universities/{id}/update', [UniversityController::class, 'update'])->name('university.update');
    Route::post('/universities/{id}/upload-gallery', [UniversityController::class, 'uploadGallery'])->name('university.upload.gallery');
});



require __DIR__.'/auth.php';
