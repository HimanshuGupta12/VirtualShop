<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/userhome', function () {
    return view('userhome');
})->middleware(['auth'])->name('userhome');

require __DIR__ . '/auth.php';

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    //admin login route
    Route::match(['get' , 'post'] ,'login', 'AdminController@login')->name('admin/login');

    Route::group(['middleware' => ['admin']] , function(){
        //Admin Dashboard Route
        Route::get('dashboard' , 'AdminController@dashboard')->name('admin/dashboard');

        //update admin password
        Route::match(['get' , 'post'] , 'update-admin-password' , 'AdminController@updateadminpassword')->name('admin/update-admin-password');

        //Check Admin Password
        Route::post('check-admin-password' , 'AdminController@checkAdminPassword');

        //Update Admin Details
        Route::match(['get' , 'post'] , 'update-admin-details' , 'AdminController@updateAdminDetails')->name('admin/update-admin-details');

        //update vendor details
        Route::match(['get' , 'post'] , 'update_sellers_details/{slug}' , 'AdminController@updateSellerDetails');

        //view Admin / Sellers
        Route::get('admins/{type?}' , 'AdminController@admins');

        //view vendor details
        Route::get('view-seller-details/{id}' , 'AdminController@viewSellerDetails');

        //update admin status
        Route::post('update-admin-status' , 'AdminController@updateAdminStatus');

        //Admin logout
        Route::get('logout' , 'AdminController@logout')->name('admin/logout');

        //Section
        Route::get('sections' , 'SectionController@sections')->name('admin/sections');

        //update section status
        Route::post('update-section-status' , 'SectionController@updateSectionStatus');

        //delete section
        Route::get('delete-section/{id}' , 'SectionController@deletesection');

        // add edit section
        Route::match(['get', 'post'], 'add_edit_section/{id?}' ,  'SectionController@addEditSection');

        Route::get('deleted_sections' ,'SectionController@deletedSection');
        Route::get('restore_section/{id}' ,'SectionController@restoreSection');

        //categories
        Route::get('categories' , 'CategoryController@categories')->name('admin/categories');

         //update section status
         Route::post('update-category-status' , 'CategoryController@updateCategoryStatus');

         // add edit section
        Route::match(['get', 'post'], 'add_edit_categories/{id?}' ,  'CategoryController@addEditCategory');

        //append categoreis level
        Route::get('append-categories-level' , 'CategoryController@appendCategoryLevel');


        //delete category
        Route::get('delete-category/{id}' , 'CategoryController@deleteCategory');

        //delete category image
        Route::get('delete-category-image/{id}' , 'CategoryController@deleteCategoryImage');

        //deleted categories
        Route::get('deleted_categories' ,'CategoryController@deletedCategory');
        Route::get('restore_category/{id}' ,'CategoryController@restoreCategory');


        //brand
        Route::get('brands' , 'BrandController@brands')->name('admin/brands');

        //update brand status
        Route::post('update-brand-status' , 'BrandController@updateBrandStatus');

        //delete brand
        Route::get('delete-brand/{id}' , 'BrandController@deleteBrand');

        // add edit brand
        Route::match(['get', 'post'], 'add_edit_brand/{id?}' ,  'BrandController@addEditBrand');

        Route::get('deleted_brands' ,'BrandController@deletedBrands');
        Route::get('restore_brand/{id}' ,'BrandController@restoreBrands');


         //Products
         Route::get('products' , 'ProductsController@products')->name('admin/products');

         //update products status
         Route::post('update-product-status' , 'ProductsController@updateProductStatus');

          //delete products
        Route::get('delete-product/{id}' , 'ProductsController@deleteProduct');

         // add edit products
         Route::match(['get', 'post'], 'add_edit_products/{id?}' ,  'ProductsController@addEditProduct');

        //delete product image
        Route::get('delete-product-image/{id}' , 'ProductsController@deleteProductImage');

        //Restore the product
        Route::get('deleted_products' ,'ProductsController@deletedProduct');
        Route::get('restore_product/{id}' ,'ProductsController@restoreProduct');


        //Product attributes
        Route::match(['get' , 'post'] , 'add_attributes/{id}' , 'ProductsAttributeController@addAttributes');

         //update attributes status
         Route::post('update-attribute-status' , 'ProductsAttributeController@updateAttributeStatus');

          //delete attributes
        Route::get('delete-attribute/{id}' , 'ProductsAttributeController@deleteAttribute');

        //edit attribute
        Route::match(['get' , 'post'],'edit-attribute/{id}' , 'ProductsAttributeController@editAttribute');


        //Add Multiple Product Images
        Route::match(['get' , 'post'] , 'add_images/{id}' , 'ProductsController@addImages');

        //update attributes status
         Route::post('update-image-status' , 'ProductsController@updateImageStatus');

          //delete attributes
        Route::get('delete-image/{id}' , 'ProductsController@deleteImage');

        //Banners
        Route::get('banners' , 'BannerController@banners')->name('admin/banners');

        //update Banner status
        Route::post('update-banner-status' , 'BannerController@updateBannerStatus');

         //delete Banner
         Route::get('delete-banner/{id}' , 'BannerController@deleteBanner');

         //Restore the Banner
        Route::get('deleted_banners' ,'BannerController@deletedBanner');
        Route::get('restore_banner/{id}' ,'BannerController@restoreBanner');

    });
});


//Frontend

Route::namespace('App\Http\Controllers\Front')->group(function(){

    Route::get('/' ,'IndexController@index' );

});
