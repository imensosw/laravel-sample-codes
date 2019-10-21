@extends('layouts.main')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="width_25 pos_fix prof_area">
        @include('layouts.rightpanel_employee', [])
    </div>
        <h1 class="main_heading m_t10">
             Job Alerts</h1>
             <p class="text-muted">You are eligible to apply on following positions.</p>
                <div class="row search_result">
                    <div class="col-sm-12 m_30">
                        <div class="table-responsive">
                            @if( count($result) == 0  )
                              <div class="no-record text-center">
                                  <img src="{{ url('images/no-record.png') }}" width="200" />
                                  <h5 class="text-muted">No record found</h5>
                              </div>
                            @else
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                  <tr>
                                    <th>Job Title</th>
                                    <th>Division</th>
                                    <th>Education</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($result as $data)
                               
                                  <tr id="{{ $data->id }}" class="main_tr {{ $data->id }}">
                                    <td>{{ $data->jobRoleName }}</td>
                                    <td>{{ $data->divisionName }}</td>
                                    <td>{{ $data->divisionName }}</td>

                                    <?php if($data->status_id == 1 ){?>
                                    <td><a href="javascript:;" class="btn s_btn bg-green" >Applied </a></td>
                                    <?php
                                    }
                                    else
                                    {?>
                                    <td><a href="javascript:;" class="apply btn s_btn bg-red"  data-id="{{ $data->id }}">Express Interest </a></td>
                                    <?php }?>
                                
                                  @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function(){
          $('.main_tr').each(function(){
            data=$(this).attr('id');
          
            if($('.'+data).length==3)
            {
                 // alert($('#'+data).length);
                $(this).removeClass(data);
            }
            else
            {
                //$(this).remove();
            }

          });


        $(document).on('click','.apply',function(){ 
                var id=$(this).attr('data-id');
                a=$(this);
             //   alert(id);
                    $.ajax({
                         type: "post",
                         url:"employee/jobApply",
                         data:{"_token": "{{ csrf_token() }}",'id':id} ,
                         success: function(data)
                       { 
                         a.removeClass('bg-red');
                         a.removeClass('apply');
                         a.addClass('bg-green');
                         a.html('Applied');
                        alert(data);
                        
                      }, 
                      error:function(data)
                      {
                           var errors = data.responseJSON; 
                           if(errors.success==false && errors.emsg=="validation")
                          { 
                                  errorsHtml = '';

                                  $.each( errors.errors , function( key, value ) {
                                      errorsHtml += value[0]+"\n"; //showing only the first error.
                                  });
                                  errorsHtml += "\n";
                                      
                                  alert(errorsHtml);
                          }
                          else
                          {
                             alert('false');
                          }
                      },
                       dataType:"json"
                    }); 
            return false;
        }); 


    });
</script>
@endsection