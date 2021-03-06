<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Tables</a></li>
</ul>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Manage Product</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Product Images</th>
						<th>Product Quantity</th>
						<th>Is Featured</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead> 
				<tbody>
				<?php 
					foreach ($all_product as $v_product) 
					{
				?>
					<tr>
						<td><?php echo $v_product->product_id?></td>
						<td class="center"><?php echo $v_product->product_name?></td>
						<td class="center"><img src="<?php echo base_url().$v_product->product_image?>" width="50" height="50"></td>
						<td class="center"><?php echo $v_product->product_quantity?></td>
						<td class="center"><?php echo $v_product->is_featured?></td>
						<td class="center">
							<?php 
								if ($v_product->publication_status == 1)
								 {
							?>
							<span class="label label-success">Active</span>

							<?php } else{ ?>
							<span class="label label-important">Deactive</span>
							<?php } ?>
						</td>

						<td class="center"> 
							<?php 
								if ($v_product->publication_status == 1)
							{
							?>

							<a class="btn btn-danger" href="<?php echo base_url();?>Super_admin/unpublished_product/<?php echo $v_product->product_id?>">
								<i class="halflings-icon white thumbs-down"></i>  
							</a>

						<?php } else{ ?>

							<a class="btn btn-success" href="<?php echo base_url();?>Super_admin/published_product/<?php echo $v_product->product_id?>">
								<i class="halflings-icon white thumbs-up"></i>  
							</a>

						<?php } ?>

							<a class="btn btn-info" href="<?php echo base_url();?>Super_admin/edit_product/<?php echo $v_product->product_id?>">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="<?php echo base_url();?>Super_admin/delete_product/<?php echo $v_product->product_id?>">
								<i class="halflings-icon white trash"></i> 
							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>            
		</div>
	</div><!--/span-->

</div><!--/row-->