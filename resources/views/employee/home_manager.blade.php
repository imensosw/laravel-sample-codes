@extends('layouts.main')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="pos_fix prof_area">
    @include('layouts.rightpanel_employee', [])
  </div>
  <div class="row m_t20">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          My competency  <a href="{{ url('employeeCompetency') }}" title="Edit" class=" pull-right"> <i class="fa fa-pencil"></i>  </a>
        </div>
        <div class="panel-body p_t0">
          <div class="row">
            <div class="m_t20">
            @if(isset($competencyPercent[0]))
            <div class="col-md-4">
              <div class="row">
                <div class="panel1 m_b0">
                  <div class="flx">
                    <div class="chartcnt">
                      <h2 class="txt_shade_1"><?php echo round($competencyPercent[0]['percent'],2); ?>%</h2>
                      <p>{{ $competencyPercent[0]['skillTypeName'] }} </p>
                    </div>

                    <div class="progress">
                      <div class="progress-bar shade_1" role="progressbar" aria-valuenow="70"
                      aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round($competencyPercent[0]['percent'],2); ?>%">
                        <span class="sr-only">70% Complete</span>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
            @endif
            @if(isset($competencyPercent[1]))
            <div class="col-md-4">
              <div class="row">
                <div class="panel1 m_b0">
                  <div class="flx">
                    <div class="chartcnt">
                      <h2 class="txt_shade_3"><?php echo round($competencyPercent[1]['percent'],2); ?>%</h2>
                      <p>{{ $competencyPercent[1]['skillTypeName'] }} </p>
                    </div>
                    <div class="progress">
                      <div class="progress-bar shade_3" role="progressbar" aria-valuenow="70"
                      aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round($competencyPercent[1]['percent'],2); ?>%">
                        <span class="sr-only">70% Complete</span>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
            @endif
            @if(isset($competencyPercent[2]))
            <div class="col-md-4">
              <div class="row">
                <div class="panel1 m_b0 no-bdr">
                  <div class="flx">
                    <div class="chartcnt">
                      <h2 class="txt_shade_5">
                      <?php echo round($competencyPercent[2]['percent'],2); ?>%
                      </h2>
                      <p>{{ $competencyPercent[2]['skillTypeName'] }} </p>
                    </div> 
                    <div class="progress">
                      <div class="progress-bar shade_5" role="progressbar" aria-valuenow="70"
                      aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round($competencyPercent[2]['percent'],2); ?>%">
                        <span class="sr-only">70% Complete</span>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
            @endif
          </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  

  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Competency Validation Request
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table id="tblVerification" class="display table" width="100%" >
             <thead>
               <tr>
                 <th>Id</th> 
                 <th>name</th>                 
                 <th class="width_50">Action</th>
               </tr>
             </thead>  
           </table>
         </div>
       </div>
     </div>
   </div>
 </div>

 <div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Appraisal Request
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-request">
            <tbody>
              @if( count( $jobApply ) > 0 )
              @foreach( $jobApply as $jobApplyRow )
              <tr>                    
                <td>
                  <div class="media">
                    <a href="#" class="pull-left">
                      <img src="{{ url('images/ar.jpg') }}" class="media-photo">
                    </a>
                    <div class="media-body">                                
                      <h4 class="title">
                        {{ $jobApplyRow->name }}
                        <span class="pull-right new-pos"><span class="media-meta">Applied for</span> {{ $jobApplyRow->jobRoleNameApply }} <span class="media-meta"> on {{ $jobApplyRow->created_at }}</span></span>
                      </h4>
                      <p class="summary">{{ $jobApplyRow->jobRoleName }}</p>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
              @else
              <tr>                    
                <td>
                  <div class="no-record text-center">
                    <img width="200" src="{{ url('images/no-record.png') }}">
                    <h5 class="text-muted">No record found</h5>
                  </div>
                </td>
              </tr>
              @endif
            </tbody>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
  $( document ).ready(function() {

    var table = $('#tblVerification').DataTable( {
      'ajax': {
        "type"   : "POST",
        "url"    : "<?php echo  url('employee/getUnverifiedCompetencyJson') ?>",
        "datatype": "json",
        "data"   : function( d ) {
          d._token= "{{ csrf_token() }}";
              //d.name = 1 ;
            }     
          }, 
          "serverSide": true,
          "bPaginate":true,
          "bProcessing": true,
          "scrollX": true ,
          "pageLength": 2,
          "lengthMenu": [2, 25, 50, 1000],
          "ordering": true,
          "searching": true,
          "lengthChange": true,
          "order": [[ 0, "desc" ]],
          "columns": [
          { "data": "employeeId" },
          { "data": "name" },
          { 
            mRender: function (data, type, row) 
            {
              var id=row.id;
              var href = "{{ url('employee/verifyCompetency') }}/"+id
              var content = '<a href="'+href+'" class="btn bg-orange btn-sm edit_record"  title=""> <img src="images/icons/edit_1.svg" class="svg" alt="edit"> </a>';
              return content ;  
            }
          }
          ]  
        });
  });

    // Uncomment to style it like Apple Watch
/*
if (!Highcharts.theme) {
    Highcharts.setOptions({
        chart: {
            backgroundColor: 'black'
        },
        colors: ['#F62366', '#9DFF02', '#0CCDD6'],
        title: {
            style: {
                color: 'silver'
            }
        },
        tooltip: {
            style: {
                color: 'silver'
            }
        }
    });
}
// */



</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    @endsection


