<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RoutestoryProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/lang/{locale}', ['as' => 'site.lang', 'uses' => 'LangController@postIndex']);
Route::get('/markAsRead', function(){
    Auth::guard('admins')->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');

Route::group(['namespace' => 'Site'], function () {
    Route::get('/register', ['as' => 'site.register.get', 'uses' => 'Auth\AuthController@getRegister']);
    Route::post('/register', ['as' => 'site.register', 'uses' => 'Auth\AuthController@register']);
    Route::get('/login', ['as' => 'site.login', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('/login', ['as' => 'site.login', 'uses' => 'Auth\AuthController@postLogin']);
    Route::get('/logout', ['as' => 'site.logout', 'uses' => 'Auth\AuthController@logout']);
    Route::get('/phone', ['as' => 'member.phone', 'uses' => 'Auth\AuthController@phone']);
    Route::Post('/verify', ['as' => 'phone.verify', 'uses' => 'Auth\AuthController@verify']);
    Route::get('/error', ['as' => 'site.error', 'uses' => 'Auth\AuthController@error']);
    Route::get('/forget', ['as' => 'site.forget', 'uses' => 'Auth\AuthController@forget']);

    Route::get('/', ['as' => 'site.home', 'uses' => 'HomeController@getIndex']);
    Route::get('/about', ['as' => 'site.about', 'uses' => 'HomeController@getAbout']);
    Route::get('/category/{id}', ['as' => 'site.category', 'uses' => 'ProductController@getCat']);
    Route::get('/sub/{id}', ['as' => 'site.sub', 'uses' => 'ProductController@getSub']);
    Route::get('/contact', ['as' => 'site.contact', 'uses' => 'ContactController@getIndex']);
    Route::post('/send', ['as' => 'site.message', 'uses' => 'ContactController@message']);
    Route::get('/storys', ['as' => 'site.storys', 'uses' => 'HomeController@getstorys']);
    Route::get('/blog', ['as' => 'site.posts', 'uses' => 'BlogController@getPosts']);
    Route::get('/post/{id}', ['as' => 'site.post', 'uses' => 'BlogController@getPost']);
    Route::get('/products', ['as' => 'site.products', 'uses' => 'ProductController@getIndex']);
    Route::get('/product/{id}', ['as' => 'site.product', 'uses' => 'ProductController@getProduct']);
    Route::get('/add/{id}', ['as' => 'product.add', 'uses' => 'ProductController@getAdd']);
    Route::post('/add/{id}', ['as' => 'product.add', 'uses' => 'ProductController@insert']);
    Route::post('/review', ['as' => 'product.review', 'uses' => 'ProductController@review']);
    Route::get('/wishlist/{id}', ['as' => 'site.wishlist', 'uses' => 'WishController@getIndex']);
    Route::post('/wishlist/{id}', ['as' => 'wishlist.add', 'uses' => 'WishController@create']);
    Route::get('/delete/{id}', ['as' => 'wishlist.delete', 'uses' => 'WishController@delete']);
    Route::get('/cart/{id}', ['as' => 'site.cart', 'uses' => 'CartController@getIndex']);
    Route::get('/checkout', ['as' => 'site.checkout', 'uses' => 'CartController@checkout']);
    Route::get('/paypal', ['as' => 'site.paypal', 'uses' => 'CartController@paypal']);
    Route::post('/cart/{id}', ['as' => 'cart.add', 'uses' => 'CartController@create']);
    Route::post('/editCart/{id}', ['as' => 'cart.edit', 'uses' => 'CartController@edit']);
    Route::get('/itemdelete/{id}', ['as' => 'cart.delete', 'uses' => 'CartController@delete']);
    Route::post('/order/{id}', ['as' => 'order.add', 'uses' => 'CartController@order']);
    Route::get('/profile', ['as' => 'site.profile', 'uses' => 'ProfileController@getIndex']);
    Route::get('/dashboard', ['as' => 'site.dashboard', 'uses' => 'ProfileController@dashboard']);
    Route::get('/orders', ['as' => 'site.orders', 'uses' => 'ProfileController@orders']);
    Route::get('/addresses', ['as' => 'site.addresses', 'uses' => 'ProfileController@addresses']);
    Route::get('/edit', ['as' => 'site.profile.edit', 'uses' => 'MembersController@getIndex']);
    Route::post('/edit', ['as' => 'profile.update', 'uses' => 'MembersController@update']);
    Route::post('/profileimage', ['as' => 'profile.image', 'uses' => 'MembersController@update']);
    Route::post('/ownermessage', ['as' => 'owner.message', 'uses' => 'MembersController@message']);
    Route::get('/ownermessages/{id}', ['as' => 'owner.messages', 'uses' => 'MembersController@getMessages']);
    Route::get('/items/{id}', ['as' => 'owner.messages', 'uses' => 'MembersController@getMessages']);
    Route::get('/items/{id}', ['as' => 'owner.items', 'uses' => 'MembersController@getItems']);
    Route::get('/search', ['as' => 'product.search', 'uses' => 'ProductController@search']);
    Route::get('/BlogSearch', ['as' => 'blog.search', 'uses' => 'BlogController@search']);
    Route::get('/public/{id}', ['as' => 'profile.public', 'uses' => 'ProfileController@getIndex']);
    Route::post('/subscribe', ['as' => 'site.subscribe', 'uses' => 'HomeController@subscribe']);
    Route::post('/password', ['as' => 'password.get', 'uses' => 'Auth\AuthController@password']);

    Route::get('/markAllAsRead', function(){
        Auth::guard('members')->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('markAllAsRead');

});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('/', 'AuthController@getIndex');
        Route::get('/login', 'AuthController@getIndex');
        Route::post('/login', 'AuthController@postLogin')->name('admin.login');
        Route::get('/logout', 'AuthController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@getIndex']);
        Route::get('/contacts', ['as' => 'admin.contacts', 'uses' => 'ContactsController@getContacts']);
        Route::post('/contacts', ['as' => 'admin.contacts.update', 'uses' => 'ContactsController@updateContacts']);
        Route::get('/data', ['as' => 'admin.data', 'uses' => 'DataController@getData']);
        Route::post('/data', ['as' => 'admin.data.update', 'uses' => 'DataController@updateData']);

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', ['as' => 'admin.categories', 'uses' => 'CategoriesController@getIndex']);
            Route::get('/add', ['as' => 'admin.category.add', 'uses' => 'CategoriesController@getAdd']);
            Route::post('/add', ['as' => 'admin.category.add', 'uses' => 'CategoriesController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.category.edit', 'uses' => 'CategoriesController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.category.edit', 'uses' => 'CategoriesController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.category.delete', 'uses' => 'CategoriesController@delete']);
        });

        Route::group(['prefix' => 'specifications'], function () {
            Route::get('/', ['as' => 'admin.specifications', 'uses' => 'SpecificationsController@getIndex']);
            Route::get('/add', ['as' => 'admin.specification.add', 'uses' => 'SpecificationsController@getAdd']);
            Route::post('/add', ['as' => 'admin.specification.add', 'uses' => 'SpecificationsController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.specification.edit', 'uses' => 'SpecificationsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.specification.edit', 'uses' => 'SpecificationsController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.specification.delete', 'uses' => 'SpecificationsController@delete']);
        });

        Route::group(['prefix' => 'products'], function () {
            Route::get('/', ['as' => 'admin.products', 'uses' => 'ProductsController@getIndex']);
            Route::get('/add', ['as' => 'admin.product.add', 'uses' => 'ProductsController@getAdd']);
            Route::post('/add', ['as' => 'admin.product.add', 'uses' => 'ProductsController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.product.edit', 'uses' => 'ProductsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.product.edit', 'uses' => 'ProductsController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.product.delete', 'uses' => 'ProductsController@delete']);
            Route::get('/gallery', ['as' => 'admin.product.gallery', 'uses' => 'ProductsController@getGallery']);
            Route::post('/gallery', ['as' => 'admin.product.images', 'uses' => 'ProductsController@getPostImages']);
            Route::post('/addImages', ['as' => 'admin.product.addImages', 'uses' => 'ProductsController@addImages']);
            Route::get('/deleteImg/{id}', ['as' => 'admin.product.deleteImg', 'uses' => 'ProductsController@deleteImage']);
        });

        Route::group(['prefix' => 'sliders'], function () {
            Route::get('/', ['as' => 'admin.sliders', 'uses' => 'SlidersController@getIndex']);
            Route::get('/add', ['as' => 'admin.slider.add', 'uses' => 'SlidersController@getAdd']);
            Route::post('/add', ['as' => 'admin.slider.add', 'uses' => 'SlidersController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.slider.edit', 'uses' => 'SlidersController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.slider.edit', 'uses' => 'SlidersController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.slider.delete', 'uses' => 'SlidersController@delete']);
        });

        Route::group(['prefix' => 'cats'], function () {
            Route::get('/', ['as' => 'admin.cats', 'uses' => 'CatsController@getIndex']);
            Route::get('/add', ['as' => 'admin.cats.add', 'uses' => 'CatsController@getAdd']);
            Route::post('/add', ['as' => 'admin.cats.add', 'uses' => 'CatsController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.cats.edit', 'uses' => 'CatsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.cats.edit', 'uses' => 'CatsController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.cats.delete', 'uses' => 'CatsController@delete']);
        });

        Route::group(['prefix' => 'posts'], function () {
            Route::get('/', ['as' => 'admin.posts', 'uses' => 'PostsController@getIndex']);
            Route::get('/add', ['as' => 'admin.post.add', 'uses' => 'PostsController@getAdd']);
            Route::post('/add', ['as' => 'admin.post.add', 'uses' => 'PostsController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.post.edit', 'uses' => 'PostsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.post.edit', 'uses' => 'PostsController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.post.delete', 'uses' => 'PostsController@delete']);
        });

        Route::group(['prefix' => 'stories'], function () {
            Route::get('/', ['as' => 'admin.stories', 'uses' => 'StoriesController@getIndex']);
            Route::get('/add', ['as' => 'admin.story.add', 'uses' => 'StoriesController@getAdd']);
            Route::post('/add', ['as' => 'admin.story.add', 'uses' => 'StoriesController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.story.edit', 'uses' => 'StoriesController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.story.edit', 'uses' => 'StoriesController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.story.delete', 'uses' => 'StoriesController@delete']);
        });

        Route::group(['prefix' => 'ads'], function () {
            Route::get('/', ['as' => 'admin.ads', 'uses' => 'AdsController@getIndex']);
            Route::get('/edit/{id}', ['as' => 'admin.ad.edit', 'uses' => 'AdsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.ad.edit', 'uses' => 'AdsController@postEdit']);
        });

        Route::group(['prefix' => 'teams'], function () {
            Route::get('/', ['as' => 'admin.teams', 'uses' => 'TeamController@getIndex']);
            Route::get('/add', ['as' => 'admin.team.add', 'uses' => 'TeamController@getAdd']);
            Route::post('/add', ['as' => 'admin.team.add', 'uses' => 'TeamController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.team.edit', 'uses' => 'TeamController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.team.edit', 'uses' => 'TeamController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.team.delete', 'uses' => 'TeamController@delete']);
        });

        Route::group(['prefix' => 'subscribers'], function () {
            Route::get('/', ['as' => 'admin.subscribers', 'uses' => 'SubscribersController@getIndex']);
            Route::get('/send/{id}', ['as' => 'admin.subscriber.send', 'uses' => 'SubscribersController@getEmail']);
            Route::post('/sendMail', ['as' => 'sendMail', 'uses' => 'SubscribersController@sendEmail']);
            Route::get('/getAll', ['as' => 'getAll', 'uses' => 'SubscribersController@getAll']);
            Route::post('/sendAll', ['as' => 'sendAll', 'uses' => 'SubscribersController@sendAll']);
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', ['as' => 'admin.users', 'uses' => 'UsersController@getIndex']);
            Route::get('/add', ['as' => 'admin.user.add', 'uses' => 'UsersController@getAdd']);
            Route::post('/add', ['as' => 'admin.user.add', 'uses' => 'UsersController@insertUser']);
            Route::get('/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UsersController@getUser']);
            Route::post('/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UsersController@updateUser']);
            Route::get('/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'UsersController@deleteU']);
            Route::post('/active', ['as' => 'admin.user.active', 'uses' => 'UsersController@postActive']);
            Route::post('/disActive', ['as' => 'admin.user.disActive', 'uses' => 'UsersController@postDisActive']);
            Route::post('/block', ['as' => 'admin.user.block', 'uses' => 'UsersController@postBlock']);
        });

        Route::group(['prefix' => 'members'], function () {
            Route::get('/', ['as' => 'admin.members', 'uses' => 'MembersController@getIndex']);
            Route::get('/add', ['as' => 'admin.member.add', 'uses' => 'MembersController@getAdd']);
            Route::post('/add', ['as' => 'admin.member.add', 'uses' => 'MembersController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.member.edit', 'uses' => 'MembersController@getMember']);
            Route::post('/edit/{id}', ['as' => 'admin.member.edit', 'uses' => 'MembersController@update']);
            Route::get('/delete/{id}', ['as' => 'admin.member.delete', 'uses' => 'MembersController@delete']);
            Route::post('/active', ['as' => 'admin.member.active', 'uses' => 'MembersController@postActive']);
            Route::post('/disActive', ['as' => 'admin.member.disActive', 'uses' => 'MembersController@postDisActive']);
            Route::post('/block', ['as' => 'admin.member.block', 'uses' => 'MembersController@postBlock']);
        });


        Route::get('/message', ['as' => 'admin.message', 'uses' => 'MessageController@getIndex']);
        Route::get('/orders', ['as' => 'admin.orders', 'uses' => 'HomeController@orders']);
        Route::post('/upload', ['as' => 'admin.upload.post', 'uses' => 'UploadController@getPost']);
        Route::post('/uploads', 'DataController@dropzoneStore')->name('admin.dropzoneStore');
        Route::post('/upload/images', ['as' => 'admin.upload.images', 'uses' => 'CatsController@getPostImages']);
    });
});