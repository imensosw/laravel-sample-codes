
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
          My competencies  <a href="{{ url('employeeCompetency') }}" title="Edit" class="pull-right"> <i class="fa fa-pencil"> </i></a>
        </div>
        <div class="panel-body p_t0">
          <div class="row">
             <div class="m_t20">
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
            <div class="col-md-4">
              <div class="row">
                <div class="panel1 m_b0 no-bdr">
                  <div class="flx">
                    <div class="chartcnt">
                      <h2 class="txt_shade_5"><?php echo round($competencyPercent[2]['percent'],2); ?>%</h2>
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

@endsection