@extends('admin.layout.index')
@section('con')

  <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
             
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              
                <div class="col-lg-6 col-lg-offset-3">
                    <form role="form" method="post" action="{{url('/admin/shopedit')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label>店家账号</label>
                            <input value="{{$data[0]->phone}}" class="form-control" type="text" name="phone" placeholder="11位电话号码" required="">
                        </div>
                        <div class="form-group">
                            <label>密码</label>
                            <input value="" class="form-control" type="password" name="password" placeholder="8-20位数字或字母" required="">                           
                        </div>                      
                        <div class="form-group">
                            <label>店名</label>
                            <input value="{{$data[0]->shopname}}" class="form-control" type="text" name="shopname" placeholder="1-8位字母或汉字" required="">
                        </div>
                         <div class="form-group">
                            <label>地址</label>
                            <input value="{{$data[0]->pos}}" class="form-control" type="text" name="pos" placeholder="地址" required="">
                        </div>
                        <div class="form-group">
                            <label>活动通告</label>
                            <input value="{{$data[0]->info}}" class="form-control" type="text" name="info" placeholder="活动通告" required="">
                        </div>
                         <div class="form-group">                            
                            <label>餐饮类别</label>
                            <select class="form-control" name="type">
                                  <option value="简餐">简餐</option>                                  
                                  <option value="香锅米线">香锅米线</option>                                  
                                  <option value="麻辣烫">麻辣烫</option>                                  
                                  <option value="汉堡速食">汉堡速食</option>                                  
                                  <option value="甜品">甜品</option>                                  
                                  <option value="奶茶果汁">奶茶果汁</option>                                  
                                  <option value="咖啡">咖啡</option>                                  
                                  <option value="水果">水果</option>                                  
                                  <option value="蔬菜">蔬菜</option>                                  
                                  <option value="海鲜">海鲜</option>                                  
                                  <option value="鲜花">鲜花</option>                                  
                                  <option value="蛋糕">蛋糕</option>                                  
                                  <option value="面包">面包</option>                                  
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <label>头像上传</label><br>
                            <img src="{{$data[0]->pic}}" alt="">
                            <input type="file" name="pic">
                        </div>
                        
                        <input type="hidden" name="id" value="{{$data[0]->id}}">
                        <button class="btn btn-default" type="submit">修改</button>
                        <button class="btn btn-default" type="reset">重置</button>
                    </form>
                </div>
             
            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
@stop