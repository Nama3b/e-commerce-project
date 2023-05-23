<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Delivery\DeliveryController;
use App\Http\Controllers\Delivery\ShippingController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\OrderDetailController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Resource\CommentController;
use App\Http\Controllers\Resource\FavoriteController;
use App\Http\Controllers\Resource\ImageController;
use App\Http\Controllers\Resource\TagController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\User\AdminController;
use App\Http\Controllers\User\MemberController;
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


Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('lohin', [LoginController::class, 'login']);
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/home', function () {
    return view('admin.home');
})->name('home')->middleware('auth');

Route::middleware(['auth:web'])->prefix('admin')->group(function () {
    Route::get('admin/new', [AdminController::class, 'new']);
    Route::post('admin/profile/update', [AdminController::class, 'updateProfile'])->name('profile-update');
    Route::get('admin/change-password', [AdminController::class, 'password'])->name('change-pass');
    Route::post('admin/change-password', [AdminController::class, 'changePassword'])->name('update-pass');

    Route::get('member', [MemberController::class, 'list'])
        ->name('member')
        ->middleware(['checkManagerPermission:VIEW_MEMBER']);
    Route::get('member/detail/{member}', [MemberController::class, 'detail'])
        ->name('member.detail')
        ->middleware(['checkManagerPermission:VIEW_MEMBER']);
    Route::get('member/store', [MemberController::class, 'store'])
        ->name('member.store')
        ->middleware(['checkManagerPermission:CREAT_MEMBER']);
    Route::get('member/edit/{user}', [MemberController::class, 'edit'])
        ->name('member.edit')
        ->middleware(['checkManagerPermission:EDIT_MEMBER']);
    Route::get('member/delete/{member}', [MemberController::class, 'delete'])
        ->name('member.delete')
        ->middleware(['checkManagerPermission:DELETE_MEMBER']);

    Route::get('role', [RoleController::class, 'list'])
        ->name('role')
        ->middleware(['checkManagerPermission:VIEW_ROLE']);
    Route::get('role/detail/{role}', [RoleController::class, 'detail'])
        ->name('role.detail')
        ->middleware(['checkManagerPermission:VIEW_ROLE']);
    Route::post('role/store', [RoleController::class, 'store'])
        ->name('role.store')
        ->middleware(['checkManagerPermission:CREATE_ROLE']);
    Route::post('role/edit/{role}', [RoleController::class, 'edit'])
        ->name('role.edit')
        ->middleware(['checkManagerPermission:EDIT_ROLE']);
    Route::delete('role/delete/{role}', [RoleController::class, 'delete'])
        ->name('role.delete')
        ->middleware(['checkManagerPermission:DELETE_ROLE']);

    Route::get('permission', [PermissionController::class, 'list'])
        ->name('permission')
        ->middleware(['checkManagerPermission:VIEW_PERMISSION']);
    Route::get('permission/detail/{permission}', [PermissionController::class, 'detail'])
        ->name('permission.show')
        ->middleware(['checkManagerPermission:SHOW_PERMISSION']);
    Route::post('permission/store', [PermissionController::class, 'store'])
        ->name('permission.store')
        ->middleware(['checkManagerPermission:CREATE_PERMISSION']);
    Route::post('permission/edit/{permission}', [PermissionController::class, 'edit'])
        ->name('permission.edit')
        ->middleware(['checkManagerPermission:EDIT_PERMISSION']);
    Route::delete('permission/delete/{permission}', [PermissionController::class, 'delete'])
        ->name('permission.delete')
        ->middleware(['checkManagerPermission:DELETE_PERMISSION']);

    Route::get('product_category', [ProductCategoryController::class, 'list'])
        ->name('product_category')
        ->middleware(['checkManagerPermission:VIEW_PRODUCT_CATEGORY']);
    Route::get('product_category/detail/{product_category}', [ProductCategoryController::class, 'detail'])
        ->name('product_category.detail')
        ->middleware(['checkManagerPermission:VIEW_PRODUCT_CATEGORY']);
    Route::post('product_category/store', [ProductCategoryController::class, 'store'])
        ->name('product_category.store')
        ->middleware(['checkManagerPermission:CREATE_PRODUCT_CATEGORY']);
    Route::post('product_category/edit/{product_category}', [ProductCategoryController::class, 'update'])
        ->name('product_category.edit')
        ->middleware(['checkManagerPermission:EDIT_PRODUCT_CATEGORY']);
    Route::delete('product_category/delete/{product_category}', [ProductCategoryController::class, 'delete'])
        ->name('product_category.delete')
        ->middleware(['checkManagerPermission:DELETE_PRODUCT_CATEGORY']);

    Route::get('product', [ProductController::class, 'list'])
        ->name('product')
        ->middleware(['checkManagerPermission:VIEW_PRODUCT']);
    Route::get('product/detail/{product}', [ProductController::class, 'detail'])
        ->name('product.detail')
        ->middleware(['checkManagerPermission:VIEW_PRODUCT']);
    Route::post('product/store', [ProductController::class, 'store'])
        ->name('product.store')
        ->middleware(['checkManagerPermission:CREATE_PRODUCT']);
    Route::post('product/edit/{product}', [ProductController::class, 'update'])
        ->name('product.edit')
        ->middleware(['checkManagerPermission:EDIT_PRODUCT']);
    Route::delete('product/delete/{product}', [ProductController::class, 'delete'])
        ->name('product.delete')
        ->middleware(['checkManagerPermission:DELETE_PRODUCT']);

    Route::get('delivery', [DeliveryController::class, 'list'])
        ->name('delivery')
        ->middleware(['checkManagerPermission:VIEW_DELIVERY']);
    Route::get('delivery/detail/{delivery}', [DeliveryController::class, 'detail'])
        ->name('delivery.detail')
        ->middleware(['checkManagerPermission:VIEW_DELIVERY']);
    Route::post('delivery/store', [DeliveryController::class, 'store'])
        ->name('delivery.store')
        ->middleware(['checkManagerPermission:CREATE_DELIVERY']);
    Route::post('delivery/edit/{delivery}', [DeliveryController::class, 'update'])
        ->name('delivery.edit')
        ->middleware(['checkManagerPermission:EDIT_DELIVERY']);
    Route::delete('delivery/delete/{delivery}', [DeliveryController::class, 'delete'])
        ->name('delivery.delete')
        ->middleware(['checkManagerPermission:DELETE_DELIVERY']);

    Route::get('shipping', [ShippingController::class, 'list'])
        ->name('shipping')
        ->middleware(['checkManagerPermission:VIEW_SHIPPING']);
    Route::get('shipping/detail/{shipping}', [ShippingController::class, 'detail'])
        ->name('shipping.detail')
        ->middleware(['checkManagerPermission:VIEW_SHIPPING']);
    Route::post('shipping/store', [ShippingController::class, 'store'])
        ->name('shipping.store')
        ->middleware(['checkManagerPermission:CREATE_SHIPPING']);
    Route::post('shipping/edit/{shipping}', [ShippingController::class, 'update'])
        ->name('shipping.edit')
        ->middleware(['checkManagerPermission:EDIT_SHIPPING']);
    Route::delete('shipping/delete/{shipping}', [ShippingController::class, 'delete'])
        ->name('shipping.delete')
        ->middleware(['checkManagerPermission:DELETE_SHIPPING']);

    Route::get('order', [OrderController::class, 'list'])
        ->name('order')
        ->middleware(['checkManagerPermission:VIEW_ORDER']);
    Route::get('order/detail/{order}', [OrderController::class, 'detail'])
        ->name('order.detail')
        ->middleware(['checkManagerPermission:VIEW_ORDER']);
    Route::post('order/store', [OrderController::class, 'store'])
        ->name('order.store')
        ->middleware(['checkManagerPermission:CREATE_ORDER']);
    Route::post('order/edit/{order}', [OrderController::class, 'update'])
        ->name('order.edit')
        ->middleware(['checkManagerPermission:EDIT_ORDER']);
    Route::delete('order/delete/{order}', [OrderController::class, 'delete'])
        ->name('order.delete')
        ->middleware(['checkManagerPermission:DELETE_ORDER']);

    Route::get('order_detail', [OrderDetailController::class, 'list'])
        ->name('order_detail')
        ->middleware(['checkManagerPermission:VIEW_ORDER_DETAIL']);
    Route::get('order_detail/detail/{order_detail}', [OrderDetailController::class, 'detail'])
        ->name('order_detail.detail')
        ->middleware(['checkManagerPermission:VIEW_ORDER_DETAIL']);
    Route::post('order_detail/store', [OrderDetailController::class, 'store'])
        ->name('order_detail.store')
        ->middleware(['checkManagerPermission:CREATE_ORDER_DETAIL']);
    Route::post('order_detail/edit/{order_detail}', [OrderDetailController::class, 'update'])
        ->name('order_detail.edit')
        ->middleware(['checkManagerPermission:EDIT_ORDER_DETAIL']);
    Route::delete('order_detail/delete/{order_detail}', [OrderDetailController::class, 'delete'])
        ->name('order_detail.delete')
        ->middleware(['checkManagerPermission:DELETE_ORDER_DETAIL']);

    Route::get('post', [PostController::class, 'list'])
        ->name('post')
        ->middleware(['checkManagerPermission:VIEW_NEWS']);
    Route::get('post/detail/{post}', [PostController::class, 'detail'])
        ->name('post.detail')
        ->middleware(['checkManagerPermission:VIEW_POST']);
    Route::post('post/store', [PostController::class, 'store'])
        ->name('post.store')
        ->middleware(['checkManagerPermission:VIEW_POST']);
    Route::post('post/edit/{post}', [PostController::class, 'update'])
        ->name('post.edit')
        ->middleware(['checkManagerPermission:EDIT_POST']);
    Route::delete('post/delete/{post}', [PostController::class, 'delete'])
        ->name('post.delete')
        ->middleware(['checkManagerPermission:DELETE_POST']);

    Route::get('comment', [CommentController::class, 'list'])
        ->name('comment')
        ->middleware(['checkManagerPermission:VIEW_COMMENT']);
    Route::get('comment/detail/{comment}', [CommentController::class, 'detail'])
        ->name('comment.detail')
        ->middleware(['checkManagerPermission:VIEW_COMMENT']);
    Route::post('comment/store', [CommentController::class, 'store'])
        ->name('comment.store')
        ->middleware(['checkManagerPermission:CREATE_COMMENT']);
    Route::post('comment/edit/{comment}', [CommentController::class, 'update'])
        ->name('comment.edit')
        ->middleware(['checkManagerPermission:EDIT_COMMENT']);
    Route::delete('comment/delete/{comment}', [CommentController::class, 'delete'])
        ->name('comment.delete')
        ->middleware(['checkManagerPermission:DELETE_COMMENT']);

    Route::get('favorite', [FavoriteController::class, 'list'])
        ->name('favorite')
        ->middleware(['checkManagerPermission:VIEW_FAVORITE']);
    Route::post('favorite/store', [FavoriteController::class, 'store'])
        ->name('favorite.store')
        ->middleware(['checkManagerPermission:CREATE_FAVORITE']);

    Route::get('image', [ImageController::class, 'list'])
        ->name('image')
        ->middleware(['checkManagerPermission:VIEW_IMAGE']);
    Route::get('image/detail/{image}', [ImageController::class, 'detail'])
        ->name('image.detail')
        ->middleware(['checkManagerPermission:VIEW_IMAGE']);
    Route::post('image/store', [ImageController::class, 'store'])
        ->name('image.store')
        ->middleware(['checkManagerPermission:CREATE_IMAGE']);
    Route::post('image/edit/{image}', [ImageController::class, 'update'])
        ->name('image.edit')
        ->middleware(['checkManagerPermission:EDIT_IMAGE']);
    Route::delete('image/delete/{image}', [ImageController::class, 'delete'])
        ->name('image.delete')
        ->middleware(['checkManagerPermission:DELETE_IMAGE']);

    Route::get('tag', [TagController::class, 'list'])
        ->name('tag')
        ->middleware(['checkManagerPermission:VIEW_TAG']);
    Route::get('tag/detail/{tag}', [TagController::class, 'detail'])
        ->name('tag.detail')
        ->middleware(['checkManagerPermission:VIEW_TAG']);
    Route::post('tag/store', [TagController::class, 'store'])
        ->name('tag.store')
        ->middleware(['checkManagerPermission:CREATE_TAG']);
    Route::post('tag/edit/{tag}', [TagController::class, 'update'])
        ->name('tag.edit')
        ->middleware(['checkManagerPermission:EDIT_TAG']);
    Route::delete('tag/delete/{tag}', [TagController::class, 'delete'])
        ->name('tag.delete')
        ->middleware(['checkManagerPermission:DELETE_TAG']);

});
