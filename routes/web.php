<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','LandingPageController@index')->name('/');
Route::get('blog','BlogController@index')->name('blog.index');
Route::get('blog/{id}','BlogController@show')->name('blog.show');

Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
        ->group(function () {
            Route::group(['as' => 'admin.'], function(){
                Route::resources([
                    'dashboard' => 'DashboardController',
                    'title' => 'TitleController',
                    'service' => 'ServiceController',
                    'pricing' => 'PricingController',
                    'portfolio' => 'PortfolioController',
                    'category' => 'CategoryController',
                    'testimoni' => 'TestimoniController',
                    'team' => 'TeamController',
                    'client' => 'ClientController',
                    'blog' => 'BlogController',
                    'faq' => 'FAQController',
                    'contact' => 'ContactController',
                    'footer' => 'FooterController',
                    'tags' => 'TagsController',
                    'blogcategory' => 'BlogCategoryController',
                ]);
                //about
                Route::get('about','CompanyController@about')->name('about');
                Route::post('about','CompanyController@aboutstore')->name('about.store');
                //detail-pricing
                Route::get('detail-pricing/{id}','PricingController@detailpricing')->name('detailpricing');
                Route::post('detail-pricing/{id}','PricingController@detailpricingstore')->name('detailpricing.store');
                Route::delete('detail-pricing/{id}','PricingController@detailpricingdestroy')->name('detailpricing.destroy');
                //counts
                Route::get('counts','CompanyController@counts')->name('counts');
                Route::post('counts','CompanyController@countsstore')->name('counts.store');
            });
        });

Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
