<div style="position: relative; width: 90%; display: inline-block;">
<div class="col-sm-4 m_b30"> 
	<label>Qualification: </label> {!! Form::select('qualificationId[]', $qualifications,NULL, array('class' => 'chosen-select form-control','id'=>'qualificationId',  
	'onChange'=>"nestedDropdown(this,'getDegreeOption','degreeId$randomNo',2,'qualiGroup$randomNo','Select Degree')" )) !!}
</div>
<div class="col-sm-4 m_b30"> 
	<label>Degree: </label> {!! Form::select('degreeId[]', array(),NULL, array('class' => 'chosen-select form-control qualiGroup$randomNo2','id'=>"degreeId$randomNo",  
	'onChange'=>"nestedDropdown(this,'getSpecializationOption','specializationId$randomNo',1,'qualiGroup','Select Specialization')" )) !!}
</div>
<div class="col-sm-4 m_b30"> 
<?php $a = 1 ; ?>
	<label>Specialization: </label> {!! Form::select('specializationId[]', array(),NULL, array('class' => "chosen-select form-control  qualiGroup$randomNo$a",'id'=>"specializationId$randomNo" )) !!}
</div>

<button type="button" class="close removeSpecialization" title="Remove"> <img src="images/icons/close.svg" class="svg"> </button>

</div>