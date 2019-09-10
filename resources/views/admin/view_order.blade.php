@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">

	<div class="box span6">
		<div class="box-header">
			<h2><i class="halflings-icon align-justify"></i><span class="break"></span> details</h2>
			
		</div>
		<div class="box-content">
			<table class="table">
				<thead>
					<tr>
						<th>Username</th>
						<th>mobile</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						@foreach($order_by_id as $v_order)
						@endforeach()
						<td>{{$v_order->customer_name}}</td>
						<td>{{$v_order->mobile_number}}</td>
					</tr>
				</tbody>
			</table>
			
		</div>
		
	</div>
	<div class="box span6">
		<div class="box-header">
		<h2><li class="halflings-icon align-justify"></li><span class="break"></span>shipping details</h2>
     </div>
     <div class="box-content">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Username</th>
						<th>address</th>
						<th>mobile</th>
						<th>email</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						@foreach($order_by_id as $v_order)
						@endforeach()
						<td>{{$v_order->shipping_First_Name}}</td>
						<td>{{$v_order->shipping_Address}}</td>
						<td>{{$v_order->shipping_mobile_number}}</td>
						<td>{{$v_order->shipping_email}}</td>
					</tr>
				</tbody>
			</table>
			
		</div>
	</div>
	
</div> {{--  row end --}}

<div class="row-fluid sortable">
	
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span> order details</h2>
			
		</div>
		<div class="box-content">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>id</th>
						<th>products name</th>
						<th>products price</th>
						<th>products sales quantity</th>
						<th>products sub total</th>
					</tr>
				</thead>
				<tbody>
					@foreach($order_by_id as $v_order)
					<tr>
						<td>{{$v_order->order_id}}</td>
						<td>{{$v_order->products_name}}</td>
						<td>{{$v_order->products_price}}</td>
						<td>{{$v_order->products_sales_quantity}}</td>
						<td>{{$v_order->products_price*$v_order->products_sales_quantity}}</td>
						
					</tr>
					@endforeach()
					
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4"> total with vat:</td>
						<td><strong>={{$v_order->order_total}} tk</strong></td>
					</tr>
				</tfoot>
			</table>
			
		</div>
		
	</div>
</div>

@endsection