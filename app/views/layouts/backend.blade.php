<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Viewport metatags -->
<meta name="HandheldFriendly" content="true" />
<meta name="MobileOptimized" content="320" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- iOS webapp metatags -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<!-- iOS webapp icons -->
<link rel="apple-touch-icon-precomposed" href="images/touch-icon-iphone.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/touch-icon-ipad.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/touch-icon-retina.png" />

<!-- CSS Reset -->
<link rel="stylesheet" href="{{{asset('css/bootstrap.css')}}}">
<link rel="stylesheet" type="text/css" href="{{{asset('css/reset.css')}}}" media="screen" />
<!--  Fluid Grid System -->
<link rel="stylesheet" type="text/css" href="{{{asset('css/fluid.css')}}}" media="screen" />
<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="{{{asset('css/dandelion.theme.css')}}}" media="screen" />
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="{{{asset('css/dandelion.css')}}}" media="screen" />
<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="{{{asset('css/demo.css')}}}" media="screen" />
<title>MyWeb</title>
@yield('styles')
</head>
<body>
<!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
	<div id="da-wrapper" class="fluid">
        <!-- Header -->
        <div id="da-header">
        
        	<div id="da-header-top">
                
                <!-- Container -->
                <div class="da-container clearfix">
                    
                    <!-- Logo Container. All images put here will be vertically centere -->
                    <div id="da-logo-wrap">
                        <div id="da-logo">
                            <div id="da-logo-img">
                                <a href="dashboard.html">
                                    <img src="{{{asset('images/logo.png')}}}" alt="Dandelion Admin" />
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Header Toolbar Menu -->
                    <div id="da-header-toolbar" class="clearfix">
                        <div id="da-user-profile">
                            <div id="da-user-avatar">
                                <img src="{{{asset('images/pp.jpg')}}}" alt="" />
                            </div>
                            <div id="da-user-info">
                                {{$user_name}}
                                <span class="da-user-title">Creative Director</span>
                            </div>
                        </div>
                        <div id="da-header-button-container">
                        	<ul>
                            	<li class="da-header-button logout">
                                	<a href="{{url('logout')}}">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>                     
                </div>
            </div>
            
            <div id="da-header-bottom">
                <!-- Container -->
                <div class="da-container clearfix">
                    <!-- Breadcrumbs -->
                    <div id="da-breadcrumb">
                        <ul>
                            <li class="active"><a href="#"><img src="{{{asset('images/icons/black/16/home.png')}}}" alt="Home" />Dashboard</a></li>
                        </ul>
                    </div>                    
                </div>
            </div>
        </div>
        <!-- Content -->
        <div id="da-content">
            <!-- Container -->
            <div class="da-container clearfix">
               @include('layouts.backend_left_nav')
               <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
            
                    <!-- Content Area -->
                    <div id="da-content-area"> 
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery JavaScript File -->
    <script src="{{{asset('js/jquery-1.11.1.min.js')}}}"></script>
    <script src="{{{asset('js/bootstrap.js')}}}"></script>
    <!-- jQuery-UI JavaScript Files -->
    <script type="text/javascript" src="{{{asset('jui/js/jquery-ui-1.8.20.min.js')}}}"></script>
    <script type="text/javascript" src="{{{asset('jui/js/jquery.ui.timepicker.min.js')}}}"></script>
    <script type="text/javascript" src="{{{asset('jui/js/jquery.ui.touch-punch.min.js')}}}"></script>
    <link rel="stylesheet" type="text/css" href="{{{asset('jui/css/jquery.ui.all.css')}}}" media="screen" />
    <!-- Tooltips Plugin -->
    <script type="text/javascript" src="{{{asset('plugins/tipsy/jquery.tipsy-min.js')}}}"></script>
    <link rel="stylesheet" href="{{{asset('plugins/tipsy/tipsy.css')}}}" />
  

    <!-- Core JavaScript Files -->
    <script type="text/javascript" src="{{{asset('js/core/dandelion.core.js')}}}"></script>
    <!-- Customizer JavaScript File (remove if not needed) -->
    <script type="text/javascript" src="{{{asset('js/core/dandelion.customizer.js')}}}"></script>

    <?php 
    $message = Session::get('message'); 
    ?>
    <script>
    @if (isset($message))
    alert('{{$message}}')
    @endif

    $('#da-main-nav ul li').each(function(){
        $(this).removeClass('active')
        var text = $.trim($(this).text())//获取Dom中文本内容时要去除空格
        var class_name ='{{$class_name}}'//要申明一个变量，否则输出类型会变成undefinded
        if (class_name == text) {
            $(this).addClass('active')
            return false
        }
    })
    </script>
    @yield('scripts')
</body>
</html>

