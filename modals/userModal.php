<!-- ADD Modal content -->
<div id="addModal" class="modal" >
				<!-- Modal content -->
				<div class="modal-content" style="width:30%;">
					<div class="modal-body">
					<div class="modal-header">
						<span class="close" onclick="closebtn()">&times;</span>
					</div>

					<div class="form-group">
						<label>Username</label>
						<input id="addUsername" name="addUsername" type="text" class="form-control mb-1" placeholder="Enter Username">
						<label>Password</label>
						<input id="addPassword" name="addPassword" type="password" class="form-control mb-1"  placeholder="Enter Password">
						<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" id="addShowPass"></span>
						<label>Confirm Password</label>
						<input id="addConfirmPassword" name="addConfirmPassword" type="password" class="form-control mb-1"  placeholder="Enter Confirm Password">
					</div>
					
					
					<div class="modal-footer">
						<button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
						<button id="addUser" type="button" class="btn btn-success">SAVE</button>
					</div>       
					</div>
				</div>
			</div> 
<!-- ADD Modal content -->

<!-- UPDATE Modal content -->
<div id="updateModal" class="modal" >
				<!-- Modal content -->
				<div class="modal-content" style="width:30%;">
					<div class="modal-body">
					<div class="modal-header">
						<span class="close" onclick="closebtn()">&times;</span>
					</div>

					<div class="form-group">
						<input hidden id="userId" name="userId" type="text" class="form-control mb-1">
						<label>Username</label>
						<input id="updateUsername" name="updateUsername" type="text" class="form-control mb-1" disabled>
						<label>New Password</label>
						<input id="newPassword" name="newPassword" type="password" class="form-control mb-1"  placeholder="Enter New Password">
						<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" id="updateShowPass"></span>
						<label>Confirm Password</label>
						<input id="confirmPassword" name="confirmPassword" type="password" class="form-control mb-1" placeholder="Enter Confirm Password">
					</div>
					
					
					<div class="modal-footer">
						<button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
						<button id="changePassword" type="button" class="btn btn-success">UPDATE</button>
					</div>       
					</div>
				</div>
</div> 
<!-- UPDATE Modal content -->