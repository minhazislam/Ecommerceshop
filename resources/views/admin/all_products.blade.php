@extends('admin_layout')
@section('admin_content')

	 
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
			<p class="alert-success">
						<?php
                           $message=Session::get('message');
                           if ($message) {
                           	echo $message;
                           	Session::put('message',null);
                           }

						?>

					</p>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>products ID</th>
								  <th>products Name</th>
								  <th>products Desription</th>
								  <th>products image</th>
								  <th>products price</th>
								  <th>category Name</th>
								  <th>manufacture Name</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
                         @foreach($all_products_info as $v_products)
						  <tbody>
							<tr>
								<td>{{$v_products->products_id}}</td>
								<td class="center">{{$v_products->products_name}}</td>
								<td class="center">{{$v_products->products_short_description}}</td>
								<td > <img src="{{URL::to($v_products->products_image)}}" style="height:80px; width:80px; "></td>
								<td class="center">{{$v_products->products_price}} Tk</td>
								<td class="center">{{$v_products->category_name}}</td>
								<td class="center">{{$v_products->manufacture_name}}</td>

								<td class="center">
									@if($v_products->publication_status==1)
									<span class="label label-success">unactive</span>
									@endif
								</td>

								<td class="center">
									@if($v_products->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/unactive_products/'.$v_products->products_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
										@else
										<a class="btn btn-success" href="{{URL::to('/active_products/'.$v_products->products_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
										@endif
									</a>
									<a class="btn btn-info" href="{{URL::to('fulfill-products/'.$v_products->products_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" onclick="return confirm('আপনি কি নিশ্চিত?')" href="{{URL::to('/delete-products/'.$v_products->products_id)}}" {{-- id="delete" --}}>
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection
 --}}