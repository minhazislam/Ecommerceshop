@extends('admin_layout')
@section('admin_content')

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">add manufacture</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>add manufacture</h2>
						
					</div>
					<p class="alert-success">
						<?php
                           $message=Session::get('message');
                           if ($message) {
                           	echo $message;
                           	Session::put('message',null);
                           }

						?>

					</p>

					<div class="box-content">
						<form class="form-horizontal" id="myForm">
							{{csrf_field()}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">manufacture name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="manufacture_name" required="">
							  </div>
							</div>         
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">manufacture description</label>
							  <div class="controls">
								<textarea class="cleditor" name="manufacture_description" rows="3" required=""></textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">publication status</label>
                                <input type="checkbox" name="publication_status" value="1">
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">add manufactury</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
			
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
      <div class="modal-body">
       <h5>Data Saved Success</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>
			@push('scripts')

				<script>
					(function($){

						$('#myForm').submit(function(e){
							e.preventDefault();

							jQuery.ajax({
								url: "{{ url('/save-manufacture')}}",
								method: 'post',
								data: $(this).serialize(),
								success: function(data){
									console.log(data);
									$('#exampleModal').modal('show');
								}
							});
						});
					})(jQuery); 
				</script>

			@endpush
			

@endsection