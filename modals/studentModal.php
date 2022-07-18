<?php

?>
<!-- Print Modal content -->
<div id="printModal" class="modal" >
	<!-- Modal content -->
	<div class="modal-content" style="width:50%;">
		<div class="modal-body">

			<div class="card-body">
				<span class="close mb-3" onclick="closebtn()">&times;</span>
				<iframe id="pdfViewer" src="../../reportPDF/generatePDF.php?name=
				&program=&studentCtrlNo=&healthStatus=&embedded=true" 
				width="100%" height="427" style="border: none;"></iframe>

			</div>
		
		</div>
	</div>
</div> 
<!-- PRINT Modal content -->

<!-- UPDATE Modal content -->
<div id="updateModal" class="modal" >
				<!-- Modal content -->
				<div class="modal-content" style="width:30%;">
					<div class="modal-body">
					<div class="modal-header">
						<span class="close" onclick="closebtn()">&times;</span>
					</div>

					<div class="form-group">
						<input hidden id="updateStudentId" name="updateStudentId" type="text" class="form-control mb-1">
						<input hidden id="originalName" name="originalName" type="text" class="form-control mb-1">
						<input hidden id="originalProgram" name="originalProgram" type="text" class="form-control mb-1">
						<input hidden id="originalHealthStatus" name="originalHealthStatus" type="text" class="form-control mb-1">

						<small>Control no.</small>
						<input  id="UpdateStudentCtrlNo" name="UpdateStudentCtrlNo" type="text" class="form-control mb-1" disabled>
						<small>Name</small>
						<input  id="updateStudentName" name="updateStudentName" type="text" class="form-control mb-1" autocomplete="off" oninput="this.value = this.value.toUpperCase()">
						<small>Program</small>
						<div class="rounded" style="border: 0.5px solid #004d28">
                        <select name="updateStudentProgram" class="form-control" id="updateStudentProgram">
                        <option value="0" selected disabled>Select Program</option>
                          <?php ;
                          foreach($programs as $program)
                          {
                            $programId=$program['id'];
                            $program = $program['program'];
                            echo "<option value='$programId'>$program</option>";
                          }
                          ?>

                        </select>
						</div>
						<small ><b>Health Status</b></small>
						<div class="rounded" style="border: 0.5px solid #004d28">
							<select name="updateHealthStatus" class="form-control" id="updateHealthStatus">
							<option value="0" selected disabled>Select Health Status</option>
							<option value="FIT">FIT</option>
							<option value="UNFIT">UNFIT</option>
							

							</select>
						</div>

						
						
					

					</div>
					
					
					<div class="modal-footer">
						<button onclick="closebtn();" type="button" class="btn btn-danger btn-s">CLOSE</button>
						<button id="updateStudentBtn" type="button" class="btn btn-success">UPDATE</button>
					</div>       
					</div>
				</div>
</div> 
<!-- UPDATE Modal content -->