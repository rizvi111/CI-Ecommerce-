<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Forms</a>
	</li>
</ul>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
			<h3 style="color: green;">
<!-- 				<?php 
					// $message=$this->session->userdata('message');
					// if ($message) {
					// 	echo $message;
				// 		// $this->session->unset_userdata('message');
				// }
				?> -->
			</h3>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="<?php echo base_url(); ?>Super_admin/update_category" method="post">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="typeahead">Category Name</label>
						<div class="controls">
							<input type="text" name="category_name" value="<?php echo $category_info->category_name?>" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" required="">
							<input type="hidden" name="category_id" value="<?php echo $category_info->category_id?>" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" required="">
						</div>
					</div>
					
					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Category Description</label>
						<div class="controls">
							<textarea class="cleditor" name="category_description" id="textarea2" rows="3"><?php echo $category_info->category_description?></textarea>
						</div>
					</div>


					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Update changes</button>
					</div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->