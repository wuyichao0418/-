@extends('layouts.main')

@section('signin')
<div class="sec_part">
	<div class="container mid-content login_part">
		<div class="row">
			<div class="col-sm-4">
				{{ HTML::image('img/nfc.png', 'nfc' ,array('class'=>'img-responsive')) }}
			</div>

			<div class="col-sm-8">
				<div class="col-sm-5">

					<legend>账号注册</legend>
					<h4>还没有账号?点击立刻进行注册</h4>
					<h1></h1>
					{{ HTML::link('account/signup', '马上注册', array('class'=>'btn btn-primary btn-success btn-lg btn-block')) }}
					<br>
					<h4>扫描关注我们最新动态</h4>
					{{ HTML::image('img/barcode.png', 'barcode' ,array('class'=>'img-responsive')) }}

				</div>
				<div class="col-sm-1 form_sepr">

				</div>
				<div class="col-sm-5">

					{{ Form::open(array('url'=>'account/signin')) }}
					<legend>账号登录</legend>
					<br>

					<p>
						{{ Form::label('email', '*邮箱')}}
						{{ Form::text('email', '', array('class'=>'form-control', 'placeholder' => '')) }}
					</p>
					<br>

					<p>
						{{ Form::label('password', '*密码')}}
						{{ Form::password('password', array('class'=>'form-control', 'placeholder' => '')) }}
					</p>
					<br>
					<p>
						<!-- {{ Form::label('logintype', '*登陆方式')}} -->
						{{ Form::radio('logintype', '0') }}&nbsp;用户登陆
						&nbsp;&nbsp;&nbsp;
						{{ Form::radio('logintype', '1') }}&nbsp;商家登陆
					</p>
					<br>
					@if ( Session::has('message') )
					    <div class="alert alert-danger" role="alert">
							<span class="sr-only">注册错误:</span>
						 		{{ Session::get('message') }}
						</div>
					@endif
					{{ Form::submit('登录账户', array('class'=>'btn btn-primary btn-success btn-lg btn-block'))}}
					{{ Form::close() }}

				</div>
			</div>
		</div>
	</div>
</div>
@stop



