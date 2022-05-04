<!-- ADD Modal content -->
<div id="addModal" class="modal" >
				<!-- Modal content -->
				<div class="modal-content" style="width:30%;">
					<div class="modal-body">
					<div class="modal-header">
						<span class="close" onclick="closebtn()">&times;</span>
					</div>

					<div class="form-group">
						<label>Description</label>
						<input id="addDepreciationDescription" name="addDepreciationDescription" type="text" class="form-control mb-1">
						<label>Reducing Balance Rate
						<input id="addDepreciationRBR" name="addDepreciationRBR" type="number" class="form-control w-100">
						</label>
						<b> % Annually</b>


					</div>
					
					
					<div class="modal-footer">
						<button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
						<button id="addDepreciation" type="button" class="btn btn-success">SAVE</button>
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
						<label>Description</label>
						<input hidden id="updateDepreciationId" name="updateDepreciationId" type="text" class="form-control mb-1">
						<input hidden id="originalDepreciationDescription" name="originalDepreciationDescription" type="text" class="form-control mb-1">
						<input id="updateDepreciationDescription" name="updateDepreciationDescription" type="text" class="form-control mb-1">

						<label>Reducing Balance Rate
						<input id="updateDepreciationRBR" name="updateDepreciationRBR" type="number" class="form-control w-100">
						<input hidden id="originalDepreciationRBR" name="originalDepreciationRBR" type="number" class="form-control w-100">
						</label>
						<b> % Annually</b>

					</div>
					
					
					<div class="modal-footer">
						<button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
						<button id="updateDepreciation" type="button" class="btn btn-success">UPDATE</button>
					</div>       
					</div>
				</div>
</div> 
<!-- UPDATE Modal content -->