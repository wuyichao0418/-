<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>小明在线</title>

	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/font-awesome.min.css') }}
	{{ HTML::style('css/style.css') }}

</head>
<body>

<div class="first_part">
	<div class="container">
		<div class="row">

			<div class="col-sm-12">
				<div class="navbar navbar-default xiaoming-nav">
				    <div class="navbar-header">
				        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				        </button>
				        {{ HTML::link('/', '小明小吃', array('class'=>'navbar-brand')) }}
				    </div>
				    <div class="navbar-collapse collapse navbar-responsive-collapse">
				        <form class="navbar-form navbar-left">
				        	<div class="form-group">
					             <div class="input-group">
									<label class="sr-only col-sm-4 searchbox" for="search">搜索</label>
									<input type="email" class="form-control" id="searchbox" placeholder="搜索">
									<div class="input-group-addon"><i class="fa fa-search fa-1x"></i></div>
								</div>
					        </div>
				        </form>
				        <ul class="nav navbar-nav navbar-right">
				            <li><a href="javascript:void(0)">购物车</a></li>
				            <li><a href="javascript:void(0)">反馈留言</a></li>
				            <li class="dropdown">

					            @if (Auth::check()) 
				            	 	<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                	&nbsp;{{ Auth::user()->username }}<b class="caret"></b></a>
					                <ul class="dropdown-menu">
					                	<li>{{ HTML::link('account/signout', '登出')}}</li>
                                	</ul>
					            @else

				            	 	<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">账号管理<b class="caret"></b></a>
					                <ul class="dropdown-menu">
					                	<li>{{ HTML::link('account/signin', '登录') }}</li>
					                	<li>{{ HTML::link('account/signup', '注册') }}</li>
					                	<li>{{ HTML::link('account/openshop', '我要开店') }}</li>
					                </ul>
					            @endif
				            </li>
				        </ul>
				    </div>
				</div>
			</div><!-- end 12 -->
		</div><!-- end row -->
	</div><!-- end container -->
</div><!-- 第一部分Ending -->



@if ( Session::has('message') )
    <div class="alert alert-danger" role="alert">
		<span class="sr-only">注册错误:</span>
	 		{{ Session::get('message') }}
	</div>
@endif

@yield('signup')
@yield('signin')
@yield('shopview')
@yield('shopsignup')

{{ HTML::script('js/jquery-1.10.2.min.js') }}
{{ HTML::script('js/bootstrap.js') }}


</body>
</html>