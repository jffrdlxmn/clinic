<!-- ADD Modal content -->
<div id="addModal" class="modal" >
				<!-- Modal content -->
				<div class="modal-content" style="width:30%;">
					<div class="modal-body">
					<div class="modal-header">
						<span class="close" onclick="closebtn()">&times;</span>
					</div>

					<div class="form-group">
						<label>Company Name</label>
						<input id="addName" name="addName" type="text" class="form-control mb-1" placeholder="Enter Company Name">
						<label>Company Number</label>
						<input id="addNumber" name="addNumber" type="text" class="form-control mb-1" placeholder="Enter Company Number">
						<label>Company Website</label>
						<input id="addWebsite" name="addWebsite" type="text" class="form-control mb-1" placeholder="Enter Company Website">
						<label>Company Email </label>
						<input id="addEmail" name="addEmail" type="text" class="form-control mb-1" placeholder="Enter Company Email">
					</div>
					
					
					<div class="modal-footer">
						<button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
						<button id="addVendor" type="button" class="btn btn-success">SAVE</button>
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
						<input hidden id="vendorId" name="vendorId" type="text" class="form-control mb-1">
						
						<input hidden id="originalName" name="originalName" type="text" class="form-control mb-1">
						<input hidden id="originalNumber" name="originalNumber" type="text" class="form-control mb-1">
						<input hidden id="originalWebsite" name="originalWebsite" type="text" class="form-control mb-1">
						<input hidden id="originalEmail" name="originalEmail" type="text" class="form-control mb-1">
						<label>Company Name</label>
						<input id="updateName" name="updateName" type="text" class="form-control mb-1" placeholder="Enter Company Name">
						<label>Company Number</label>
						<input id="updateNumber" name="updateNumber" type="text" class="form-control mb-1" placeholder="Enter Company Number">
						<label>Company Website</label>
						<input id="updateWebsite" name="updateWebsite" type="text" class="form-control mb-1" placeholder="Enter Company Website">
						<label>Company Email </label>
						<input id="updateEmail" name="updateEmail" type="text" class="form-control mb-1" placeholder="Enter Company Email">
					</div>
					
					
					<div class="modal-footer">
						<button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
						<button id="updateVendor" type="button" class="btn btn-success">UPDATE</button>
					</div>       
					</div>
				</div>
</div> 
<!-- UPDATE Modal content -->