@extends('layouts.main')
@section('content')
<style type="text/css">
  .nav_menu {left: 70px !important;}
</style>
<div class="right_col" role="main" style="margin-left: 70px !important; padding: 30px !important;">
 <div class="container-fluid gutter">
   <div class="row">
    <div class="col-md-12 m_t20">      
       <div class="well-2">
          <div class="bmarg" style="border:none;">
               <span class="org-meta">Business Units</span>
               <span class="org-stat shade_1">{{ $data['units'] }}</span>               
          </div>
          <div class="bmarg">
               <span class="org-meta">Divisions</span>
               <span class="org-stat shade_2">{{ $data['divisions'] }}</span>               
          </div>
          <div class="bmarg">
                <span class="org-meta">Departments</span>
               <span class="org-stat shade_3">{{ $data['departments'] }}</span>              
          </div>
          <div class="bmarg">
               <span class="org-meta">Sub Departments</span>
               <span class="org-stat shade_4">{{ $data['subDepartments'] }}</span>               
          </div>
          <div class="bmarg">
               <span class="org-meta">Roles</span>
               <span class="org-stat shade_5">{{ $data['roles'] }}</span>               
          </div>
          <div class="bmarg">
               <span class="org-meta">Candidates</span>
               <span class="org-stat shade_6">{{ $data['candidates'] }}</span>               
          </div>
          <div class="bmarg">
              <a href="{{ url('skillmanage') }}">
               <span class="org-meta">Unverified Skills</span>
               <span class="org-stat shade_7">{{ $data['unverifiedSkills'] }}</span>
              </a>               
          </div>
          <div class="clearfix"></div>
       </div>
      </div>
       <div class="col-md-12">
        <div class="form_heading fh-inverse">
              <h2>Appraisal Request</h2>
        </div>
        <table class="table table-request">
            <tbody>
            <?php $jobApply = $data['jobApply'] ;  ?>
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
                        <img width="200" src="{{ url('images/no-record.png') }}    ">
                        <h5 class="text-muted">No record found</h5>
                      </div>
                    </td>
                </tr>
              @endif
            </tbody>
        </table>     
   </div>
  
  </div>
</div>
@endsection
