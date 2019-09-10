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
					<a href="#">add products</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>add products</h2>
						
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
						<form class="form-horizontal" action="{{ url('/save-products')}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">products name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="products_name" required="">
							  </div>
							</div> 
							 <div class="control-group">
								<label class="control-label" for="selectError3">products category</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">
								  	<option>selet category</option>
								  	<?php 
                                 
                                 $all_published_category=DB::table('tbl_category')
                                 ->where('publication_status',1)
                                 ->get();


                               foreach($all_published_category as $v_category){?>

									<option value="{{($v_category->category_id)}}">{{($v_category->category_name)}}</option>

									<?php } ?>
								  </select>
								</div>
							  </div>  
							   <div class="control-group">
								<label class="control-label" for="selectError3">manufacture name</label>
								<div class="controls">
								  <select id="selectError3" name="manufacture_id">
									<option>selet manufacture</option>
									<?php 
                                 
                                 $all_published_manufacture=DB::table('tbl_manufacture')
                                 ->where('publication_status',1)
                                 ->get();


                               foreach($all_published_manufacture as $v_manufacture){?>

									<option value="{{($v_manufacture->manufacture_id)}}">{{($v_manufacture->manufacture_name)}}</option>

									<?php } ?>
								  </select>
								</div>
							  </div>      
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">products short description</label>
							  <div class="controls">
								<textarea class="cleditor" name="products_short_description" rows="3" required=""></textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">products long description</label>
							  <div class="controls">
								<textarea class="cleditor" name="products_long_description" rows="3" required=""></textarea>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">products price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="products_price" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="products_image" id="fileInput" type="file">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">products size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="products_size" required="">
							  </div>
							</div>
                             <div class="control-group">
							  <label class="control-label" for="date01">products color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="products_color" required="">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">publication status</label>
                                <input type="checkbox" name="publication_status" value="1">
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">add products</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection