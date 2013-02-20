<?php
Route::get('courses/(:any)', array('as' => 'courses', 'uses' => 'courses@show'));
Route::put('courses/', array('as' => 'courses', 'uses' => 'courses@show'));
Route::post('courses', function() {
	return 'YES SUR';
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('trajects', array('as'=>'trajects', 'uses'=>'trajects@index'));
Route::get('trajects/(:any)', array('as'=>'traject', 'uses'=>'trajects@view'));
Route::any('trajects/(:num)/edit', array('as'=>'edit_traject', 'uses'=>'trajects@edit')); 

Route::get('clients', array('as'=>'clients', 'uses'=>'clients@index'));
Route::get('clients/(:any)', array('as'=>'client', 'uses'=>'clients@view'));
Route::any('clients/(:num)/edit', array('as'=>'edit_client', 'uses'=>'clients@edit')); 
Route::put('clients/update', array('uses'=>'clients@update'));

Route::any('contacts/(:num)/edit', array('as'=>'edit_contact', 'uses'=>'clients@edit_contact'));
Route::any('contacts/(:num)/add', array('as'=>'add_contact', 'uses'=>'clients@add_contact'));
Route::post('contacts/add', array('uses'=>'clients@contact'));
Route::put('contacts/update', array('uses'=>'clients@update_contact'));

Route::get('/', function()
{
	$trajects = Trajects::all();
	return View::make('home.index')->with('trajects', $trajects);
});

// Present the user with login form
Route::get('login', function() {
    return View::make('home.login');
});
 
// Process the login form
Route::post('login', function() {
 
    $userinfo = array(
        'username' => Input::get('username'),
        'password' => Input::get('password')
    );
    echo '<pre>'; print_r($userinfo); echo '</pre>';
    /*
    if ( Auth::attempt($userinfo) )
    {
        return Redirect::to('admin');
    }
    else
    {
        return Redirect::to('login')
            ->with('login_errors', true);
    }
    */
});
 
// Process Logout process
Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});

/*$posts = Post::with('user')->order_by('updated_at', 'desc')->paginate(5);
return View::make('home')
    ->with('posts', $posts);*/

Route::any('contact-us', function()
{
    return 'yes here it is';
});

Route::any('api/v1/todos/(:num?)', array('as' => 'api.todos', 'uses' => 'api.todos@index'));

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	//return 'ERROROR';
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/


Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	//if (Auth::guest()) return Redirect::to('login');
});