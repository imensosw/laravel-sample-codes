<?php foreach ($data as $row) { ?>
  <label id="delete{{ $url }}{{ $row->id }}" ><input type="radio" 
  <?php if(isset($updateTo)) { ?> onclick="showData(this, '{{ $updateTo }}')" <?php } ?>
  value="{{ $row->id }}"  no="{{ $no }}" name="{{ $name}}"><span>{{ $row->name }} </span> 
  
  	<?php 
  		$dataValue = $row->name ; 
  		if($no == 5) 
  		{
	  		$dataValue = $row->jobRoleName ;
  		}
  	?>
  	
  	<div class="button123">
	    <button type="button" data-id="{{ $row->id }}" 
	    data-value="{{ $dataValue }}" url="update{{ $url }}"  class="btn btn_primary btn-sm edit_button" data-toggle="modal" data-target="#update-employee" data-placement="bottom" title="{{ $url }}"
	    @if( $no == 5 ) grade='Y' jobRoleGradeId="{{ $row->jobRoleGradeId }}" @endif   > 
	    	<i class="fa fa-pencil" aria-hidden="true"></i>
	    </button>

		<button type="button" data-id="{{ $row->id }}" url="delete{{ $url }}"  class="btn btn_primary btn-sm delete_button" data-toggle="modal" data-target="#delet-employee" data-placement="bottom" title="Delete">  
			<i class="fa fa-trash-o" aria-hidden="true"></i> 
		</button>
	</div>

   	</label>
<?php } ?>
                      