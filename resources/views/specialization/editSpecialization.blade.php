<div>
	<div class="row">       
		<form id="editEmployee" class="tmarg">
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
			<div class="col-sm-6 m_b20">
				<div class="form-group">
					<label for="fname">Specialization Name</label>
					<input type="hidden" name="id" value="<?php echo $specialization[0]->id ?>" class="form-control" id="id">
					<input type="text" name="specializationName" required value="<?php echo $specialization[0]->specializationName ?>" class="form-control" id="specializationName_edit" placeholder="Enter Specialization Name">
				</div>
			</div>
			<div class="col-sm-6 m_b20">
				<div class="form-group">
					<label for=" ">Degree *</label>
					<select required data-placeholder="Select Industry" name="degreeId" class="required chosen-select form-control">
						<option value="" >select</option>
						@foreach($degree as $d)
						<option value="{{$d->id}}" @if($specialization[0]->degreeId==$d->id) {{ "selected" }} @endif >{{$d->degreeName}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-sm-12 text-right m_t20 m_b20">
				<button class="bg-red btn-curvy"> Submit </button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
 /* $("#editEmployee").validate();
  $('#unitId_edit').trigger('change');
  $('#divisionId_edit').trigger('change');
  $('#unitId_edit').trigger('change');
  $('#unitId_edit').trigger('change');*/
</script>