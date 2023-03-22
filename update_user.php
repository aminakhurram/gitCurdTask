<div class="modal fade" id="update_modal<?php echo $fetch['id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="update_query.php">
				<div class="modal-header">
					<h3 class="modal-title">Update User</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Name</label>
							<input type="hidden" name="id" value="<?php echo $fetch['id']?>"/>
							<input type="text" name="username" value="<?php echo $fetch['username']?>" class="form-control" required="required"/>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" value="<?php echo $fetch['email']?>" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="text" name="Password" value=" <?php  $Password=$fetch['Password'];
							 echo base64_decode($Password);?>  " class="form-control" required="required"/>
						</div>
						<div class="form-group">
							
							<label for="role">Choose role:</label>

                           <select name="role" id="role">
                           <option value="user" <?php if($role=='user'){ echo "selected";}?> >user</option>
                    
						   <option value="admin" <?php if($role=='admin'){ echo "selected";}?> >admin</option>
                         
						   <option value="employee" <?php if($role=='employee'){ echo "selected";}?> >employee</option>
                          </select> 

						</div>
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button name="update" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>