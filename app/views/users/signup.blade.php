@extends('layouts.main')

@section('signup')

<div class="sec_part">
	<div class="container mid-content login_part">
		<div class="row">
			<div class="col-sm-4">
				{{ HTML::image('img/nfc.png', 'nfc' ,array('class'=>'img-responsive')) }}
			</div>

			<div class="col-sm-8">
				<div class="col-sm-5">
					@if ($errors->has())
						<div class="alert alert-danger" role="alert">
							<span class="sr-only">注册错误:</span>
							<ul>
								@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{{ Form::open(array('url'=>'account/create', 'method'=>'post')) }}
						<legend>账号注册</legend>

							<p>
								{{ Form::label('username', '*用户名')}}
								{{ Form::text('username', '', array('class'=>'form-control', 'placeholder' => 'Michael Lee')) }}
							</p>

							<p>
								{{ Form::label('customer_email', '*邮箱(登录使用)')}}
								{{ Form::text('customer_email', '', array('class'=>'form-control', 'placeholder' => 'example@gmail.com')) }}
							</p>

							<p>
								{{ Form::label('password', '*密码')}}
								{{ Form::password('password', array('class'=>'form-control', 'placeholder' => '')) }}
							</p>

							<p>
								{{ Form::label('password_confirmation', '*确认密码')}}
								{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder' => '')) }}
							</p>

							<p>
								{{ Form::label('telephone', '*电话')}}
								{{ Form::text('telephone', '', array('class'=>'form-control', 'placeholder' => '')) }}
							</p>
						
						{{ Form::submit('提交注册', array('class'=>'btn btn-primary btn-success btn-lg btn-block'))}}

					{{ Form::close() }}
					<!-- <form action="" method="POST" role="form">
						<legend>账号注册</legend>
					
						<div class="form-group">
							<label for="">*用户名</label>
							<input type="text" class="form-control" id="" placeholder="">
							<br>
							<label for="">*电子邮箱</label>
							<input type="text" class="form-control" id="" placeholder="">
							<br>
							<label for="">*密码</label>
							<input type="text" class="form-control" id="" placeholder="">
							<br>
							<label for="">*确认密码</label>
							<input type="password" class="form-control" id="" placeholder="">
							<br>
							<label for="">*电话</label>
							<input type="text" class="form-control" id="" placeholder="">
						</div>

						<button type="submit" class="btn btn-primary btn-success btn-lg btn-block">提交注册</button>
					</form>		 -->
					
				</div>
				<div class="col-sm-1 form_sepr">

				</div>
				<div class="col-sm-5">
						<legend>账号登录</legend>
						<h4>已经有账号？点击下方进行登录</h4>
						<h1></h1>
						{{ HTML::link('account/signin', '马上登录', array('class'=>'btn btn-primary btn-success btn-lg btn-block')) }}
						<br>
						<h4>扫描关注我们最新动态</h4>
						{{ HTML::image('img/barcode.png', 'barcode' ,array('class'=>'img-responsive')) }}
				</div>

			</div>
		</div>
	</div>
</div>

@stop