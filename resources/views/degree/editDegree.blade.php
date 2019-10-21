<div>
  <div class="row">
    <form id="editEmployee" class="tmarg">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      <div class="col-sm-6 m_b20">
        <div class="form-group">
          <label for="fname">Degree Name</label>
          <input type="hidden" name="id" value="<?php echo $degree[0]->id ?>" class="form-control" id="id">
          <input type="text" name="degreeName" value="<?php echo $degree[0]->degreeName ?>" class="form-control" id="degreeName_edit" placeholder="Enter Degree Name" required>
        </div>
      </div>
      <div class="col-sm-6 m_b20">
        <div class="form-group">
          <label for=" ">Qualification</label>
          <select data-placeholder="Select Industry" name="qualificationId" class=" chosen-select form-control required">
            <option value="" >select</option>
            @foreach($qualification as $q)
            <option value="{{$q->id}}" @if($degree[0]->qualificationId==$q->id) {{ "selected" }} @endif >{{$q->qualificationName}}</option>
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