<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>BB TEST</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('laravel/css/style.css') }}
	{{ Asset::container('bootstrapper')->styles(); }}
	{{ Asset::container('bootstrapper')->scripts(); }}
	
	<script src="http://underscorejs.org/underscore.js"></script>
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="http://backbonejs.org/backbone.js"></script>
	
	<script>
		$(function() {
			"use strict"
			
			window.Course = Backbone.Model.extend({
				defaults: {
					title: '',
					url: ''
				},
				urlRoot: 'index.php/courses/'
			});
		});
	</script>
</head>
<body>
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="{{ URL::base() }}">Blog</a>
          <div class="btn-group pull-right">
                 
            @if ( Auth::guest() )
              <a class="btn" href="{{ URL::to('login')}}">
                <i class="icon-user"></i> Login
              </a>
            @else
            Welcome, <strong>{{ HTML::link('admin', Auth::user()->username) }} </strong> |
                {{ HTML::link('logout', 'Logout') }}
            @endif
                 
          </div>
          <div class="nav-collapse">
            <ul class="nav">
            	<li><a href="{{ URL::base() }}">Home</a></li>
            	<li>{{ HTML::link_to_route('clients', 'Klanten') }}</li>
            	<li>{{ HTML::link_to_route('trajects', 'Trajecten') }}</li>
              @if ( !Auth::guest() )
              <li><a href="{{ URL::to('admin') }}">Create New</a></li>
              @endif
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
 
    <div class="container">
          <div class="row">
          @yield('content')
          </div>
          @yield('pagination')
    </div><!--/container-->
 
    <div class="container">
        <footer>
            <p>Blog &copy; 2012</p>
        </footer>
      </div>
</body>
</html>
