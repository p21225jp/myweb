<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="frontends/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="frontends/bootstrap/css/bootstrap-theme.min.css">
  <title>bootstrap</title>
  @yield('styles')
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="#">MyBootstrap</a>
	  </div>
	  <div id="navbar" class="collapse navbar-collapse">
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">问答</a></li>
	      <li><a href="#">文章</a></li>
	      <li><a href="#">活动</a></li>
	      <li><a href="#">标签</a></li>
	      <li><a href="#">榜单</a></li>
	      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">...</a>
		    <ul class="dropdown-menu" role="menu">
	      	  <li><a href="#">子站</a></li>
	        </ul>
	      </li>  
	    </ul>
	    <ul class="nav navbar-nav navbar-right hidden-sm">
	      <li><a href="#" class="">直接登录</a></li>
	    </ul>
	  </div>
    </div>
  </nav>
  @yield('content')

  <script src="frontends/bootstrap/js/jquery-1.11.1.min.js"></script>
  <script src="frontends/bootstrap/js/bootstrap.min.js"></script>
  @yield('scripts')
</body>
</html>