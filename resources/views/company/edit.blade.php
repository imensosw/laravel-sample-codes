@extends('layouts.main')
@section('content')
{!! Form::open(array('route' => ['company.update', $company->id] ,'method'=>'PATCH','files'=>'true')) !!}
 <div class="content-area">
    <div class="info-panel scroll_y">
      <div class="padded">
        <div class="clogo text-center">
          <img src="{{ url('images/companylogo/'.$company->logo) }}" class="">
        </div>
        <div class="page-title mt5">
          {{ csrf_field() }}
          <div class="form-group float-label-control">
              <label for="">Company Name </label>
              {!! Form::text('companyName', $company->companyName , array('placeholder' => 'Enter Company Name','class' => 'form-control' )) !!}
              <span class="error_txt">{{ $errors->first('companyName') }}</span>
          </div>
          <div class="form-group float-label-control">
              <label for="">Website</label>
              {!! Form::text('website', $company->website, array('placeholder' => 'Enter Website URL','class' => 'form-control')) !!}
          </div>
          <div class="form-group float-label-control">
              <label for="">Industry</label>
              <?php $url = url('getSectorOption') ; ?>
                {!! Form::select('industryId', $industries,$company->industryId, array('class' => 'chosen-select form-control','id'=>'industryId',  
                'onChange'=>"nestedDropdown(this,'$url','sectorId')"      
                )) !!}
          </div>
          <div class="form-group float-label-control">
              <label for="">Sectors </label>
               {!! Form::select('sectorId', array($company->sectorId=>$company->sectors->sectorName ),NULL, array('class' => 'chosen-select form-control','id'=>'sectorId')) !!}
          </div>
          <div class="form-group float-label-control">
              <label for="">Company Size</label>
              {!! Form::text('companySize', $company->companySize, array('placeholder' => 'Enter Company Size','class' => 'form-control')) !!}
          </div>
           <div class="form-group float-label-control">
              <label for="">Turnover</label>
              {!! Form::text('turnover', $company->turnover, array('placeholder' => 'Enter Company turnover','class' => 'form-control')) !!}
          </div>
         <div class="form-group float-label-control">
              <label for="">Business Verticals</label>
              {!! Form::text('businessVerticals', $company->businessVerticals, array('placeholder' => 'Enter Company Business Verticals','class' => 'form-control')) !!}
          </div>
        <div class="form-group float-label-control">
              <label for="">Market Share</label>
              {!! Form::text('share', $company->share, array('placeholder' => 'Enter Company share','class' => 'form-control')) !!}
          </div>
        <div class="form-group float-label-control">
              <label for="">Stock price</label>
              {!! Form::text('stockPrice', $company->stockPrice, array('placeholder' => 'Enter Stock Price','class' => 'form-control')) !!}
          </div>
        <div class="form-group float-label-control">
              <label for="">Product portfolio</label>
              {!! Form::text('productportfolio', $company->productportfolio, array('placeholder' => 'Enter Product portfolio','class' => 'form-control')) !!}
          </div>
        <div class="form-group float-label-control">
              <label for="">Conversation History</label>
              {!! Form::text('conversation', $company->conversation, array('placeholder' => 'Conversation History','class' => 'form-control')) !!}
          </div>                   
           <div class="form-group float-label-control">
              <label for="">Client Since</label>
              <input type="text" class="form-control" value="" placeholder="Client Since" name="Client Since">
          </div>
         <div class="form-group float-label-control">
              <label for="">Country</label>
              {!! Form::select('countryId', $countries , $company->countryId , array('class'=>'chosen-select form-control' )) !!}
          </div>
           <div class="form-group float-label-control">
              <label for="">City</label>
              {!! Form::text('location', $company->location, array('placeholder' => 'Enter City Name','class' => 'form-control')) !!}
          </div>
          <div class="form-group float-label-control">
              <label for="">Key Competitors</label>                        
               {!! Form::text('keyCompetitors', $company->keyCompetitors, array('placeholder' => 'Enter Company Key Competitors','class' => 'form-control')) !!}
          </div>
          <div class="form-group float-label-control">
            <label for="logo" class="filupp">
                <span class="filupp-file-name js-value1">Companey Logo</span>
                <input type="file" name="logo"  id="logo"/>
            </label>
          </div>
          <div class="form-group float-label-control">
            <button class="btn-orange"  type="submit" >Save Changes </button>
          </div>
          <br><br>
           <div class="form-group float-label-control">
              <button class="btn-blue" onclick="pleaseConfirm(this,{{ $company->id }},'company.destroy/25')"  type="button" >Delete Companey </button>
          </div>
        </div>
      </div>
    </div>

    <div class="action-panel">
      <div class="inline_block">
        <h4 class="mt3 mb3">Top Management
          <div class="pull-right mt-1">
              <a class="link-btn link-btn_1" href="javascript:;" onclick="addMoreContact()">
                <i class="fa fa-plus"></i> Add Contact Person
              </a>
              <button class="btn-orange"  type="submit" >Save Changes </button>
          </div>
        </h4>
        </div>
        <div class="panel ">
          <div class="panel-body Management_area"> 
                <div class="col-md-3">
                    <div class="form-group float-label-control">
                        <label for="">CEO/MD</label>
                         {!! Form::text('CEO', $company->CEO, array('placeholder' => 'CEO','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group float-label-control">
                        <label for="">CFO</label>
                        {!! Form::text('CFO', $company->CFO, array('placeholder' => 'CFO','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="form-group float-label-control">
                        <label for="">CHRO (HR Head)</label>
                        {!! Form::text('CHRO', $company->CHRO, array('placeholder' => 'CHRO','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="form-group float-label-control">
                        <label for="">CTO</label>
                         {!! Form::text('CTO', $company->CHRO, array('placeholder' => 'CTO','class' => 'form-control')) !!}
                    </div>
                </div>
               
          </div><!--/panel-body-->            
        </div><!--/panel-->        

        <h4 class="mt3 mb3">Contact Person</h4>
        <div class="row">

     <div id="divPerson"> 
        <?php 
        $i = 1 ;

        foreach ($company->person as $personDetail) 
        {
        ?>
          @include('person.edit', [ 'person' => $personDetail ,'personNo' => $i])
        <?php  
         $i++ ; 
        }
        ?>
      </div>
        
        <div class="clearfix"></div>
        
        <div class="mt5 text-right">
          <a class="link-btn link-btn_1" href="javascript:;" onclick="addMoreContact()">
            <i class="fa fa-plus"></i> Add Contact Person
          </a> 
            <button class="btn-orange"  type="submit" >Save Changes </button>
        </div>
  
           
       
    </div><!--/action-panel-->
    </div><!--/content-area-->

{!! Form::close() !!}
<script type="text/javascript">
function addMoreContact() 
{

  var  personNo = $("input[name^='personNo']").max() ;
  if( '-Infinity' == personNo )
  {
    personNo = 1 ;
  }
  $.ajax({
      url: "{{ url('getPersonForm') }}" ,
      type: "post",
      dataType: "html",
      data : {"_token": "{{ csrf_token() }}", personNo :  personNo } ,
      success:function(data) {
          $("#divPerson").append(data);
      }
  });
}  

function closeDivPersonForm(no)
{         
  $(".divPersonFormClass"+no).html('');
  $(".divPersonFormClass"+no).css('display','none');    
}

</script>
@endsection