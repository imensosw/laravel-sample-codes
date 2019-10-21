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
                   All <span class="pull-right">25</span>
              </a></li>
            <li><a href="#" class="">
                  Leads <span class="pull-right">5</span>
              </a></li>              
            <li><a href="#" class="">
                  Prospects <span class="pull-right">15</span>
              </a></li>
            <li><a href="#" class="">
                  Clients <span class="pull-right">5</span>
              </a></li>
          </ul>
        </div>
       
      </div>        
      <div class="col-md-9">
         <form class="search-cmp" role="search">
                <div class="input-group">
                    <input class="form-control" placeholder="Search a Company…" type="text">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default">Search</button>
                    </span>
                </div>
             </form>
        <div class="panel mt2">
          <div class="panel-body">
            <div class="work-list">
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
              </div><!--/row-->
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
              </div><!--/row-->
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
              </div><!--/row-->
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
              </div><!--/row-->
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
              </div><!--/row-->
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
              </div><!--/row-->
            </div><!--/work-list-->
          </div><!--/panel-body-->
        </div><!--/panel-panel-->
      </div><!--/panel-col-->
    </div><!--/panel-row-->
  </div><!--/panel-container-->
</section>
@endsection

