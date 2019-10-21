@extends('layouts.main')
@section('content')

<div class="bg_white">
      <div id="app" class="m_main row"> 
        <div class="container"> 
          <div class="col-md-12">
            <div class="heading_area">
              <h1 class="main_heading_2 pull-left"> Company Information </h1>            
            </div>  
            <div class="clearfix"></div>
            <div class="row">
              {!! Form::open(array('route' => 'company.store','method'=>'POST')) !!}
              {{ csrf_field() }}
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Company Name</label>
                    {!! Form::text('companyName', null, array( 'id'=>'companyName' , 'placeholder' => 'Enter Company Name','class' => 'form-control' )) !!}
                    <span class="error_txt">{{ $errors->first('companyName') }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Website</label>
                    {!! Form::text('website', null, array('placeholder' => 'Enter Website URL','class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="col-md-6">  
                  <div class="form-group">
                    <label>Industry</label>
                    <?php $url = url('getSectorOption') ; ?>
                    {!! Form::select('industryId', $industries,NULL, array('class' => 'chosen-select form-control','id'=>'industryId',  
                    'onChange'=>"nestedDropdown(this,'$url','sectorId')"      
                    )) !!}
                    
                  </div>
                </div>
                <div class="col-md-6"> 
                  <div class="form-group">
                    <label>Sector</label>
                    <!-- disabled="disabled" -->
                    {!! Form::select('sectorId', array(),NULL, array('class' => 'chosen-select form-control','id'=>'sectorId')) !!}
                </div>
                </div>
                <div class="col-md-6"> 
                  <div class="form-group">
                    <label>Company Size</label>
                    {!! Form::text('companySize', null, array('placeholder' => 'Enter Company Size','class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="col-md-6"> 
                  <div class="form-group">
                    <label>Turnover</label>
                    {!! Form::text('turnover', null, array('placeholder' => 'Enter Company turnover','class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="col-md-6"> 
                  <div class="form-group">
                    <label>Business Verticals</label>
                    {!! Form::text('businessVerticals', null, array('placeholder' => 'Enter Company Business Verticals','class' => 'form-control')) !!}
                  </div>
                </div>          
                <div class="col-md-6"> 
                  <div class="form-group">
                    <label>Market Share</label>
                    {!! Form::text('share', null, array('placeholder' => 'Enter Company share','class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Key Competitors</label>
                    {!! Form::text('keyCompetitors', null, array('placeholder' => 'Enter Company Key Competitors','class' => 'form-control')) !!}
                  </div>  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Country</label>
                    {!! Form::select('countryId', $countries, '' , array('class'=>'chosen-select form-control' )) !!}
                  </div>
                </div>        
                <div class="col-md-6">
                  <div class="form-group">
                    <label>City</label>
                    {!! Form::text('location', null, array('placeholder' => 'Enter City Name','class' => 'form-control')) !!}
                  </div>
                </div>         
                
               
               <div class="clearfix"></div>
                <!--  <div class="col-md-12">                  
                  <h1 class="main_heading_2"> Other Information </h1>
                  <div class="form-information text-center">
                    <p>Fill in company name to load information...</p>
                  </div>
                </div> -->
                <div id="divPerson"> 
                <?php
                $contactFrequency = \App\Contact_frequency::pluck('contactFrequencyName','id')->prepend('Please Select','');
                $callByUsers = \App\Contact_frequency::pluck('contactFrequencyName','id')->prepend('Please Select','');
                ?>
                <?php
                if ( Session::has('personNos')) 
                {
                  $personNos = session('personNos') ;
                  foreach ( $personNos as $personNo ) 
                  {
                  ?>
                    @include('person.create', ['personNo' => $personNo])
                  <?php 
                  }
                  session()->forget('personNos');
                } 
                else
                { ?>
                  @include('person.create', ['personNo' => 1])
                <?php }
                ?>
                </div>
                <div class="col-md-12">
                    <a href="#" onclick="addMoreContact()">+ADD ANOTHER CONTACT</a> 
                </div>
                <div class="col-md-12 text-center">
                    <button id="saveCompaneyBtn" disabled class="btn bg-red" type="submit" > Save Details </button>
                </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>    
<script type="text/javascript">

$(document).ready( function (){
  if($("#companyName").val() != '')
  {
     $("#saveCompaneyBtn").removeAttr('disabled');
  }
});

$( "#companyName" ).blur(function() {
  if($(this).val() != '')
  {
    $("#saveCompaneyBtn").removeAttr('disabled');
  }
  else
  {
    //$("#saveCompaneyBtn").attr('disabled',true)
  }
});
function addMoreContact() 
{
  var personNo = $("input[name^='personNo']").max() ;
  $.ajax({
      url: "{{ url('getPersonForm') }}" ,
      type: "post",
      dataType: "html",
      data : {"_token": "{{ csrf_token() }}", personNo : personNo } ,
      success:function(data) {
          $("#divPerson").append(data);
          $(".chosen-select").chosen();
      }
  });
}  
</script>
@endsection