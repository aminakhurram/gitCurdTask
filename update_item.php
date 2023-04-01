

<div class="modal fade" id="update_modal<?php echo $fetch['id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="update_item_query.php">
				<div class="modal-header">
					<h3 class="modal-title">Update Item</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
						<img src="uploaded_img/<?php echo $fetch['image'] ?>" height="200" alt="">
							<label>Name</label>
							<input type="hidden" name="id" value="<?php echo $fetch['id']?>"/>
							
							<input type="text" name="name" value="<?php echo $fetch['name']?>" class="form-control" required="required"/>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="number" min="0" name="price" value="<?php echo $fetch['price']?>" class="form-control" required="required" />
						</div>

						<div class="form-group">
							<label>Image</label>
							<input type="file"  class="form-control"required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
						
                      
						</div>
						
						
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
				<button  name="update_product" type="submit"  class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>  