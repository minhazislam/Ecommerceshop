@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			

			<div class="register-req">
				<p>Please fillup this form</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>shipping details</p>
							<div class="form-one">
							 <form action="{{url('/save-shipping-details')}}" method="post">
									{{csrf_field()}}
					<input type="text" name="shipping_email" placeholder="Email*" required="">
					<input type="text" name="shipping_First_Name" placeholder="First Name *" required="">
					<input type="text" name="shipping_Last_Name" placeholder="Last Name *" required="">
					<input type="text" name="shipping_Address" placeholder="Address  *" required="">
					<input type="text" name="shipping_mobile_number" placeholder="mobile number  *" required="">
					<input type="text" name="shipping_city" placeholder="city  *" required="">
					<input type="submit" class="btn btn-default" value="Done" required="">
								
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
			
			
		</div>
	</section> <!--/#cart_items-->
@endsection