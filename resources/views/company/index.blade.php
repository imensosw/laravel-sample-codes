@extends('layouts.main')
@section('content')

<section class="burger">
  <div class="container"> 
    <div class="row">
      <div class="col-md-3"><h3>Company Profiles</h3></div>        
      <div class="col-md-9 text-right">
         <a class="link-btn" href=""> <i class="fa fa-plus"></i> Add New Company Profile</a>
        
      </div>
    </div>
    <div class="row mt3">
      <div class="col-md-3">
        <div class="work-menu">
          <ul>
            <li><a href="#" class="active">
                  <span class="glyphicon glyphicon-th-list"></span> All <span class="pull-right">25</span>
              </a></li>
            <li><a href="#" class="">
                  <span class="glyphicon glyphicon-star"></span> Leads <span class="pull-right">5</span>
              </a></li>              
            <li><a href="#" class="">
                  <span class="glyphicon glyphicon-book"></span> Prospects <span class="pull-right">15</span>
              </a></li>
            <li><a href="#" class="">
                  <span class="glyphicon glyphicon-user"></span> Clients <span class="pull-right">5</span>
              </a></li>
          </ul>
        </div>
       
      </div>        
      <div class="col-md-9">
        <form class="search-cmp" role="search">
                <div class="input-group">
                    <input class="form-control" placeholder="Search a Company…" type="text">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn_companey_search">Search</button>
                    </span>
                </div>
        </form>
        <div class="panel mt2">
          <div class="panel-body">
            <div class="work-list">

              <div class="row remove_border" >
                <div class="col-md-12 table-responsive">
                   <table id="tblCompaney" class="display table" width="100%" cellspacing="0">
 
                  </table>
                </div>
              </div>  

              <!-- <div class="row">
                <div class="col-md-5">
                 <h4><a href="#" class=""> Campari Group</a></h4>
                  <p>Singapore<br>
                    <span class="text-muted sml-text">Added: 5 Aug 2017 | Edited : 7 Aug 2017</span>
                  </p>                
                </div>
                <div class="col-md-2 col-md-offset-1">
                  <span class="bubble bubble-lead">Lead</span>
                </div>
                <div class="col-md-4">
                   <div class="input-group text-right">
                    <button class="btn act-btn btn-default" type="text">View</button>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span></button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Convert to Prospect</a></li>
                            </ul>
                        </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-5">
                  <h4><a href="#" class=""> Campari Group</a></h4>
                  <p>Singapore<br>
                    <span class="text-muted sml-text">Added: 5 Aug 2017 | Edited : 7 Aug 2017</span>
                  </p>                
                </div>
                <div class="col-md-2 col-md-offset-1">
                  <span class="bubble bubble-prospect">Prospect</span>
                </div>
                <div class="col-md-4">
                  <div class="input-group text-right">
                    <button class="btn act-btn btn-default" onclick="location.href='view_company-profile-2.html';">View</button>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span></button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Convert to Prospect</a></li>
                            </ul>
                        </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-5">
                  <h4><a href="#" class=""> Campari Group</a></h4>
                  <p>Singapore<br>
                    <span class="text-muted sml-text">Added: 5 Aug 2017 | Edited : 7 Aug 2017</span>
                  </p>                
                </div>
                <div class="col-md-2 col-md-offset-1">
                  <span class="bubble bubble-client">Client</span>
                </div>
                <div class="col-md-4">                  
                  <div class="input-group text-right">
                    
                    <button class="btn act-btn btn-default" onclick="location.href='view_company-profile-2.html';">View</button>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span></button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Convert to Prospect</a></li>
                            </ul>
                        </div>
                  </div>
                </div>
              </div>
               <hr>
              <div class="row">
                <div class="col-md-5">
                  <h4><a href="#" class=""> Campari Group</a></h4>
                  <p>Singapore<br>
                    <span class="text-muted sml-text">Added: 5 Aug 2017 | Edited : 7 Aug 2017</span>
                  </p>                
                </div>
                <div class="col-md-2 col-md-offset-1">
                  <span class="bubble bubble-lead">Lead</span>
                </div>
                <div class="col-md-4">
                   <div class="input-group text-right">
                    <button class="btn act-btn btn-default" onclick="location.href='view_company-profile-2.html';">View</button>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span></button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Convert to Prospect</a></li>
                            </ul>
                        </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-5">
                 <h4><a href="#" class=""> Campari Group</a></h4>
                  <p>Singapore<br>
                    <span class="text-muted sml-text">Added: 5 Aug 2017 | Edited : 7 Aug 2017</span>
                  </p>                
                </div>
                <div class="col-md-2 col-md-offset-1">
                  <span class="bubble bubble-prospect">Prospect</span>
                </div>
                <div class="col-md-4">
                  <div class="input-group text-right">
                    <button class="btn act-btn btn-default" onclick="location.href='view_company-profile-2.html';">View</button>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span></button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Convert to Prospect</a></li>
                            </ul>
                        </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-5">
                  <h4><a href="#" class=""> Campari Group</a></h4>
                  <p>Singapore<br>
                    <span class="text-muted sml-text">Added: 5 Aug 2017 | Edited : 7 Aug 2017</span>
                  </p>                
                </div>
                <div class="col-md-2 col-md-offset-1">
                  <span class="bubble bubble-client">Client</span>
                </div>
                <div class="col-md-4">                  
                  <div class="input-group text-right">
                    <button class="btn act-btn btn-default" onclick="location.href='view_company-profile-2.html';">View</button>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span></button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Convert to Prospect</a></li>
                            </ul>
                        </div>
                  </div>
                </div> -->
              </div><!--/row-->
            </div><!--/work-list-->
          </div><!--/panel-body-->
        </div><!--/panel-panel-->
      </div><!--/panel-col-->
    </div><!--/panel-row-->
  </div><!--/panel-container-->
</section>







<div id="app" class="m_main row"> 
  <div class="container"> 
    <div class="col-md-10 col-md-offset-1">
      <div class="heading_area text-center">
        <h1 class="main_heading">I want to view company profile of...</h1>
      </div>
        <div class="search_area">
            <div class="input-group add-on">
              
              <input type="text" placeholder="Research a company" class="form-control" name="searchCompany" id="searchCompany">
              <div class="input-group-btn"> 
                <button class="btn btn-default"  type="button" id="btnSearchCompany" ><i class="glyphicon glyphicon-search"></i></button>
              </div>
            </div>

            <div id="divCompanyList">
            </div>
        </div>
    </div>
  </div>
</div>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>


<script type="text/javascript">
$( "#btnSearchCompany" ).click(function() {
   if( $("#searchCompany").val() == '')
   {
      $("#divCompanyList").html("Please Enter Company Name!");
      return false ;
   }
   $.ajax({
    url : "{{ url('showCompanyList') }}",
    type : "post" ,
    dataType : "html",
    data : { "_token": "{{ csrf_token() }}", searchCompany : $("#searchCompany").val() } ,
    success : function(data)
    {
      $("#divCompanyList").html(data);
    }
  }); 
});

 $( document ).ready(function() {
    var table = $('#tblCompaney').DataTable( {
        'ajax': {
            "type"   : "POST",
            "url"    : "<?php echo  url('admin/getDocuments') ?>",
            "data"   : function( d ) {
              d._token= "{{ csrf_token() }}";
              d.searchCompanyName = 1 ;
            }     
        }, 
        "bPaginate":true,
        "bProcessing": true,
        "scrollX": true ,
        "pageLength": 5,
        "lengthMenu": [[5, 25, 50, -1], [10, 25, 50, "All"]],
        "ordering": false,
        "searching": false,
        "lengthChange": false,
        "columns": [
            { mRender: function (data, type, row) 
               {
                  var title = "Create Prospect";
                  if(row.prospectsId > 0)
                  {
                    title = "Manage Prospect";
                  }
                  return '<div class="row"><div class="col-md-5"><h4><a href="#" class=""> '+row.companyName+'</a></h4><p>Singapore<br><span class="text-muted sml-text">Added: 5 Aug 2017 | Edited : 7 Aug 2017</span></p></div><div class="col-md-2 col-md-offset-1"><span class="bubble bubble-prospect">Prospect</span></div><div class="col-md-4"><div class="input-group text-right"><button class="btn act-btn btn-default" onclick="location.href=\'view_company-profile-2.html\';">View</button><div class="input-group-btn"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span></button><ul class="dropdown-menu pull-right"><li><a href="#">Edit</a></li> <li><a href="<?php echo  url('prospect/create') ?>/'+row.id+'">'+title+'</a></li></ul></div></div></div></div>';    
               }
            }
        ]  
    });
    alert("1");
    // $(".filterDoc").click(function(){
    //      alert("1");
    //     //table.ajax.reload();
       
    // });
});   
alert("0");
</script>
@endsection

