@extends('layouts.main')
@section('content')


<div class="bg_white">
    <div id="app" class="m_main row"> 
      <div class="container"> 
        <div class="col-md-12">
          <div class="heading_area">
            <h1 class="main_heading_2 pull-left">Company Information <a class="orange_txt small_txt" href="{{ url('company') }}/{{ $company->id}}/edit" >Edit Details</a> </h1>            
          </div>  
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-6">
              <table class="col-2">
                <tr>
                <th> Company Name  {{ $company->person }} </th>
                <td> {{ $company["companyName"] }} </td>
                </tr>
                <tr>
                <th> Stock Symbol </th>
                <td> {{ $company->share }} </td>
                </tr>
                <tr>
                <th> Website </th>
                <td> {{ $company->website }} </td>
                </tr>
                <tr>
                <th> Industry </th>
                <td> {{ $company->industryName }} </td>
                </tr>
                <tr>
                <th> Sector </th>
                <td> {{ $company->sectorName }} </td>
                </tr>
                <tr>
                <th> Company Size </th>
                <td> {{ $company->companySize }} </td>
                </tr>
                <tr>
                <th> Turnover </th>
                <td> {{ $company->turnover }} </td>
                </tr>
                <tr>
                <th> Business Verticals </th>
                <td> {{ $company->businessVerticals }} </td>
                </tr>
                <tr>
                <th> Market Share </th>
                <td> {{ $company->share }} </td>
                </tr>
                <tr>
                <th> Key Competitors </th>
                <td> {{ $company->keyCompetitors }} </td>
                </tr>
              </table>
            </div>

            <div class="col-md-6">
              <table class="col-2">
                <tr>
                <th> Country </th>
                <td> {{ $company->countryName }} </td>
                </tr>
                <tr>
                <th> City </th>
                <td> {{ $company->location }} </td>
                </tr>
                <tr>
                <th> Client since </th>
                <td>  </td>
                </tr>
              </table>
            </div>
          </div>
          <br>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12">
            <h1 class="main_heading_2 pull-left">Contact Person</h1>            
               
            </div>
            <div class="col-md-12">
              <table  class="table">
                <tr>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Email Type</th>
                  <th>Email</th>
                  <th>Mobile Code</th>
                  <th>Mobile No</th>
                  <th>Office Code</th>
                  <th>Office No</th>
                  <th>Call By</th>
                  <th>Action</th>
                </tr>
                <?php foreach ($company->persons as  $person) { ?>
                  <tr>
                  <td>{{ $person->personName }}</td>
                  <td>{{ $person->designation }}</td>
                  <td>{{ $person->emailTypeName }}</td>
                  <td>{{ $person->personEmail }}</td>
                  <td>{{ $person->mobileCode }}</td>
                  <td>{{ $person->mobileNo }}</td>
                  <td>{{ $person->officeCode }}</td>
                  <td>{{ $person->officeNo }}</td>
                  <td></td>
                  <td><button class="btn btn-danger small_btn delte-person"
                  onClick="pleaseConfirm(this,{{ $person->id }},'deltePerson')"
                  personId="{{ $person->id }}"  > Delete </button> </td>
                </tr>   
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>      
  </div>


    <!-- <div class="container m_main_2"> 
      <div class="col-md-12">      
        <div class="heading_area">
          <h1 class="main_heading_2 pull-left">Other Information </h1>            
        </div>  
        <div class="clearfix"></div>
        <div class="content_area content_area1">
          <div class="bg_white padding_50 com_other_info">
            <h5>RECENT NEWS</h5>
            <div class="row_1">
              <div class="row">
                <div class="col-md-9 col-sm-9"> 
                  <h3> Campari Group open to selling Captain Morgan rum </h3>
                  <h4>JAMAICA OBSERVER</h4> 
                  <p class="work_desc"> The Campari group is willing to consider selling its Captian Morgan rum brand if offered an attractive price, according to CEO of the global company Bob Kunze-Concewitz. In an interview with the Jamaica Observer while in Jamaica recently, Kunze-Concewitz said that if the company received an "attractive proposal" ... </p>
                  <a href="#" class="readmore"> READ MORE </a>
                </div>
                <div class="col-md-3 col-sm-3 pro_img">
                  <img src="images/product.jpg" alt="project" class="img_border" />
                </div>
              </div>
            </div>
            <div class="row_1">
              <div class="row">
                <div class="col-md-9 col-sm-9"> 
                  <h3> Campari Group Sells Château De Sancerre Wine </h3>
                  <h4>ESM MAGAZINE</h4> 
                  <p class="work_desc"> Italy’s Campari Group has reached an agreement for the sale of the French Château de Sancerre wine business for €20.5 million. The buyer is Maison Ackerman, the wine division of Terrena, a France based company with diversified interests in the agriculture industry. The deal consists of the Sancerre wine... </p>
                  <a href="#" class="readmore"> READ MORE </a>
                </div>
                <div class="col-md-3 col-sm-3 pro_img">
                  <img src="images/product2.jpg" alt="project2" class="img_border" />
                </div>
              </div>
            </div>
          </div>

          <div class="edit_btn">
            <a href="#"> DONE </a>
            <a href="#"> EDIT DETAILS </a>
          </div>
        </div>
      </div>
    </div> -->
@endsection