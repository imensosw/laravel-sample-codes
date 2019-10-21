<div style="position: relative; display: inline-block; width: 90%">
	<div class="col-sm-4 m_b30">  
		<label>Qualification: </label> 
		{!! Form::select('qualificationId[]', $qualifications,$data['qualificationId'], array('class' => 'chosen-select form-control','id'=>'qualificationId',  
		'onChange'=>"nestedDropdown(this,'getDegreeOption','degreeId$randomNo',2,'qualiGroup$randomNo','Select Degree')" )) !!}
	</div>
	<div class="col-sm-4 m_b30">
		<label>Degree: </label> 
		{!! Form::select('degreeId[]', array($data['degreeId']=>$data['degreeName']),NULL, array('class' => 'chosen-select form-control qualiGroup$randomNo2','id'=>"degreeId$randomNo",  
		'onChange'=>"nestedDropdown(this,'getSpecializationOption','specializationId$randomNo',1,'qualiGroup','Select Specialization')" )) !!}
	</div>
	<?php $a = 1 ; ?>
	<div class="col-sm-4 m_b30">
		<label>Specialization: </label>  {!! Form::select('specializationId[]', array($data['specializationId']=>$data['specializationName']),NULL, array('class' => "chosen-select form-control qualiGroup$randomNo$a",'id'=>"specializationId$randomNo" )) !!}
	</div>
	<button type="button"  class="close removeSpecialization" title="Remove"> <img src="images/icons/close.svg" class="svg"> </button>
</div>

