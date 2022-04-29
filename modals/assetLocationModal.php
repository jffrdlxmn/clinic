<!-- ADD Modal content -->
<div id="addModal" class="modal" >
				<!-- Modal content -->
				<div class="modal-content" style="width:30%;">
					<div class="modal-body">
					<div class="modal-header">
						<span class="close" onclick="closebtn()">&times;</span>
					</div>

					<div class="form-group">
						<label>Status</label>
						<input id="addLocationName" name="addLocationName" type="text" class="form-control mb-1">
					</div>
					
					
					<div class="modal-footer">
						<button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
						<button id="addLocation" type="button" class="btn btn-success">SAVE</button>
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
						<label>Status</label>
						<input hidden id="updateLocationId" name="updateLocationId" type="text" class="form-control mb-1">
						<input hidden id="originalLocationName" name="originalLocationName" type="text" class="form-control mb-1">
						<input id="updateLocationName" name="updateLocationName" type="text" class="form-control mb-1">

					</div>
					
					
					<div class="modal-footer">
						<button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
						<button id="updateLocation" type="button" class="btn btn-success">UPDATE</button>
					</div>       
					</div>
				</div>
</div> 
<!-- UPDATE Modal content -->