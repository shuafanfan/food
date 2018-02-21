@extends('home.layout.index')
@section('title','饿了么官网')
@section('search')
	<div class="container">
			<h2>Delicious food from the <br> <span>Best Chefs For you.</span></h2>
				<div class="agileits_search">
                    @if(session('error'))
                        <div class="alert alert-success  alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            {{session('error')}}
                        </div>
                    @endif
					<form action="{{url('/shopdo/search')}}" method="get">
						{{ csrf_field() }}
						 <input type="text" id="cityChoice" style="width:140px; height:50px" class="form-control" value="北京">

						<input style="margin-left:28px; height:50px"  name="search" type="text" placeholder="请输入您所在地区"  class="form-control">
						 
                        <!-- <input type="text" value="" name="search"> -->
						<input type="submit" value="搜索" class='search'>
                       
					</form>
				</div> 
	</div>	

   
        
<script>
    var cityPicker = new HzwCityPicker({
        data: data,
        target: 'cityChoice',
        valType: 'k-v',
        hideCityInput: {
            name: 'city',
            id: 'city'
        },
        hideProvinceInput: {
            name: 'province',
            id: 'province'
        }
       
    });

    cityPicker.init();
</script>
@stop
 