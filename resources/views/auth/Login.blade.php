@extends('home.layout.index')
@section('title','饿了么登录')
@section('con')
	<div class="login-page about">
		<img class="login-w3img" src="/images/img3.jpg" alt="">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">请登录您的账号</h3>  
			<div class="login-agileinfo"> 
				<form action="{{url('auth/login')}}" method="post"> 
					{!! csrf_field() !!}
				  @if (count($errors) > 0)
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				  @endif   
					<input c lass="agile-ltext" type="text" name="phone" placeholder="账号" required="">
					<input c lass="agile-ltext" type="password" name="password" placeholder="密码" required="">
					<div class="wthreelogin-text"> 
						<ul> 
							<li>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i> 
									<span>记住密码 ?</span> 
								</label> 
							</li>
							<li><a href="#">忘记密码?</a> </li>
						</ul>
						<div class="clearfix"> </div>
					</div>   
					<input type="submit" value="登录">
				</form>
				<p>还没有账号吗? <a href="register">现在注册吧!</a></p> 
			</div>	 
		</div>
	</div>
 
@stop