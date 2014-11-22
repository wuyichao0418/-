@extends('layouts.main')

@section('shoprofile')
	
<div class="sec_part">
	<div class="container profile_content">
		<div class="row">
			<div class="alert alert-info" role="alert">
				欢迎回来 <strong>{{ $shopusers->shop_name }}</strong>
			</div>

			<div class="col-sm-6">
				<legend>商店Logo</legend>
				@if ( $shopusers->shop_image == '') 
					<div class="alert alert-warning" role="alert">您还没有上传商店图片哦</div>
					<a href="#">
						{{ HTML::image('img/profile_default.gif', 'default image', array('class' => 'img-responsive')) }}
					</a>
				@else
					{{ HTML::image($shopusers->shop_image, 'shop logo', array('class' => 'img-responsive')) }}
				@endif
			</div>

			<div class="col-sm-6">
				<legend>资料更改</legend>
				<div class="col-sm-6"> 
					{{ Form::open(array('url' => 'account/profile-update', 'files' => 'true')) }}
					<p>
						{{ Form::label('shop_phone', '电话')}}
						{{ Form::text('shop_phone', $shopusers->shop_phone, array('class'=>'form-control', 'placeholder' => '')) }}
					</p>
					<p>
						{{ Form::label('shop_address', '地址')}}
						{{ Form::text('shop_address', $shopusers->shop_address, array('class'=>'form-control', 'placeholder' => '')) }}
					</p>

					<p>
						{{ Form::label('shop_suburb', '区域')}}
						{{ Form::text('shop_suburb', $shopusers->shop_suburb, array('class'=>'form-control', 'placeholder' => '')) }}
					</p>
				</div>
				<div class="col-sm-6"> 
					<p>
						{{ Form::label('shop_postcode', '邮编')}}
						{{ Form::text('shop_postcode', $shopusers->shop_postcode, array('class'=>'form-control', 'placeholder' => '')) }}
					</p>

					<p>
						{{ Form::label('shop_hour', '营业时间')}}
						{{ Form::text('shop_hour', $shopusers->shop_hour, array('class'=>'form-control', 'placeholder' => '')) }}
					</p>
					&nbsp;
					<p>
						{{ Form::label('shop_state', '州')}}
						{{ Form::select('shop_state', array('0'=>'Select','n'=>'New South Wales', 'q'=>'Queensland') ,array('class'=>'btn btn-success')) }}
					</p>
					<p>
						{{ Form::label('image', '更换餐馆 Logo') }}
						{{ Form::file('image') }}
					</p>
				</div>
				<div class="col-sm-12">
					<p>
						{{ Form::label('shop_description', '餐馆描述')}}
						{{ Form::textarea('shop_hour', $shopusers->shop_description, array('class'=>'form-control', 'placeholder' => '')) }}
					</p>
					{{ Form::submit('更新资料', array('class'=>'btn btn-primary btn-success btn-block')) }}
				</div>
				{{ Form::close() }}	
			</div>

			
		</div>
	</div>
</div>
@stop