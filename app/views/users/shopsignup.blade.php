@extends('layouts.main')

@section('shopsignup')

<div class="sec_part">
	<div class="container mid-content login_part">
		<div class="row">
			<div class="col-sm-4">
				{{ HTML::image('img/nfc.png', 'nfc' ,array('class'=>'img-responsive')) }}
			</div>

			<div class="col-sm-8">
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

					{{ Form::open(array('url'=>'account/create-shop', 'method'=>'post')) }}
						<legend>账号注册</legend>
						<div class="col-sm-5">
							<p>
								{{ Form::label('shop_name', '*商店名称')}}
								{{ Form::text('shop_name', '', array('class'=>'form-control', 'placeholder' => 'eg:吃货小店')) }}
							</p>

							<p>
								{{ Form::label('shop_email', '*邮箱(登录使用)')}}
								{{ Form::text('shop_email', '', array('class'=>'form-control', 'placeholder' => 'example@gmail.com')) }}
							</p>

							<p>
								{{ Form::label('shop_password', '*密码')}}
								{{ Form::password('shop_password', array('class'=>'form-control', 'placeholder' => '')) }}
							</p>

							<p>
								{{ Form::label('shop_password_confirmation', '*确认密码')}}
								{{ Form::password('shop_password_confirmation', array('class'=>'form-control', 'placeholder' => '')) }}
							</p>

							<p>
								{{ Form::label('shop_phone', '*电话')}}
								{{ Form::text('shop_phone', '', array('class'=>'form-control', 'placeholder' => '')) }}
							</p>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-5">
							<p>
								{{ Form::label('shop_address', '*地址')}}
								{{ Form::text('shop_address', '', array('class'=>'form-control', 'placeholder' => '')) }}
							</p>

							<p>
								{{ Form::label('shop_suburb', '*区')}}
								{{ Form::text('shop_suburb', '', array('class'=>'form-control', 'placeholder' => '')) }}
							</p>

							<p>
								{{ Form::label('shop_postcode', '*邮编')}}
								{{ Form::text('shop_postcode', '', array('class'=>'form-control', 'placeholder' => '')) }}
							</p>
							&nbsp;
							<p>
								{{ Form::label('shop_state', '*州')}}
								{{ Form::select('shop_state', array('0'=>'Select','n'=>'New South Wales', 'q'=>'Queensland') ,array('class'=>'selectpicker')) }}
							</p>

							<p>
								{{ Form::label('shop_hour', '*营业时间')}}
								{{ Form::text('shop_hour', '', array('class'=>'form-control', 'placeholder' => '')) }}
							</p>

						</div>
						<div class="col-sm-11">
							<p>
								{{ Form::label('shop_image', '餐厅 Logo') }}
								{{ Form::file('shop_image') }}
							</p>
							<p>
								{{ Form::label('shop_description', '*餐馆描述')}}
								{{ Form::textarea('shop_description', '', array('class'=>'form-control', 'placeholder' => '')) }}
							</p>


							{{ Form::submit('提交注册', array('class'=>'btn btn-primary btn-success btn-lg btn-block'))}}
						</div>
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
				<!-- <div class="col-sm-5">
						<legend>账号登录</legend>
						<h4>已经有账号？点击下方进行登录</h4>
						<h1></h1>
						{{ HTML::link('account/signin', '马上登录', array('class'=>'btn btn-primary btn-success btn-lg btn-block')) }}
						<br>
						<h4>扫描关注我们最新动态</h4>
						{{ HTML::image('img/barcode.png', 'barcode' ,array('class'=>'img-responsive')) }}
				</div> -->

			</div>
		</div>
	</div>
</div>

@stop