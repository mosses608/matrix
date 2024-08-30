<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'welcome']);

Route::get('/register', [Controller::class, 'register_user']);

Route::get('/main-dashboard', [Controller::class, 'main_dashboard']);

//Route::post('/accounts', [Controller::class, 'store_accounts']);

//BUSINESS
Route::get('/business/business-profile', [Controller::class, 'business_profile']);

Route::get('/business/add-product', [Controller::class, 'add_product']);

Route::get('/business/my-posts', [Controller::class, 'my_posts']);

Route::get('/business/view-feedbacks', [Controller::class, 'view_feedbacks']);

Route::post('/logout', [Controller::class, 'invalidate']);

Route::put('/accounts/edut-profile/{account}', [Controller::class, 'edit_account']);

Route::put('/accounts/changeapss-user/{account}', [Controller::class, 'edit_pass_user']);

Route::post('/products', [Controller::class, 'store_products']);

Route::get('/business/read-more/{product}', [Controller::class, 'find_single_product']);

Route::put('/products/edit-product/{product}', [Controller::class, 'edit_rest_product']);

Route::delete('/delete-product/{product}', [Controller::class, 'delete_product_post']);

//LOGIN
Route::post('/authenticate', [Controller::class, 'authenticate']);

Route::get('/personal-profile', [Controller::class, 'personal_profile']);

//Route::post('/orders', [Controller::class, 'store_orders']);

Route::get('/my-orders', [Controller::class, 'show_orders']);

Route::get('/feedbacks', [Controller::class, 'send_feedbacks']);

Route::post('/feedbacks', [Controller::class, 'store_feedbacsk']);

Route::get('/reset-password', [Controller::class, 'reset_pass']);



//ADMIN
Route::get('/admin/admin-dashboard', [Controller::class, 'admin_dashboard'])->middleware('auth');

Route::get('/admin/view-single-order/{order}', [Controller::class, 'view_single'])->middleware('auth');

Route::put('/orders/edit_status/{order}', [Controller::class, 'edit_status_order'])->middleware('auth');

Route::get('/admin/all-orders', [Controller::class, 'view_all_orders'])->middleware('auth');

Route::get('/admin/my-profile', [Controller::class, 'my_profile_admin'])->middleware('auth');

Route::put('/users/edit-profile/{user}', [Controller::class, 'edit_profile'])->middleware('auth');

Route::put('/users/changecode-user/{user}', [Controller::class, 'edit_pass_username_admin'])->middleware('auth');

Route::get('/admin/feedbacks', [Controller::class, 'show_feedbacks'])->middleware('auth');


//Login
Route::get('/login', [Controller::class, 'go_login'])->name('/login');

Route::get('/admin/add-project', [Controller::class, 'add_project'])->middleware('auth');

Route::post('/projects', [Controller::class, 'store_projects']);

Route::get('/admin/news', [Controller::class, 'load_to_news'])->middleware('auth');

Route::post('/notifications', [Controller::class, 'store_news'])->middleware('auth');

Route::get('/admin/read-more/{project}', [Controller::class, 'read_more']);

Route::post('/orders', [Controller::class, 'store_my_orders']);

Route::post('/accounts', [Controller::class, 'create_account']);

Route::get('/admin/projects', [Controller::class, 'view_all_projects']);

Route::get('/admin/more-about/{project}', [Controller::class, 'single_project']);

Route::get('/admin/view-action/{order}', [Controller::class, 'single_order']);

Route::delete('/orders/delete/{order}', [Controller::class, 'order_delete']);

Route::put('/orders/status/{order}', [Controller::class, 'edit_status']);

Route::put('/projects/edit/{project}', [Controller::class, 'edit_posted_project']);

Route::post('/feedback', [Controller::class, 'store_comments']);

Route::get('/order-components',[Controller::class, 'go_to_order']);

Route::get('/admin/add-component', [Controller::class, 'add_compoenent']);

Route::post('/components', [Controller::class, 'store_components']);

Route::get('/order-component/{component}', [Controller::class, 'order_component']);

Route::post('/comporders', [Controller::class, 'store_component_orders']);

Route::get('/admin/view-components', [Controller::class, 'view_components']);

Route::get('/admin/view-component-order/{order}', [Controller::class, 'component_order']);

Route::put('/comporders/status/{order}', [Controller::class, 'comp_order_status']);

Route::delete('/comporders/delete/{order}', [Controller::class, 'delete_comp_order']);

Route::get('/about', [Controller::class, 'about']);

Route::get('/contact', [Controller::class, 'contact_us']);

Route::get('/news', [Controller::class, 'our_news']);