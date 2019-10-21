<div class="left-menu-big">
  <div class="sub-nav-area">
    <h4>Settings</h4>
    <ul class="imenu">
        <li>
            <a class="@if( $active == 'users' ) active @endif" href="{{ url('manageUser') }}" title="Users"> 
            <i class="fa fa-users"></i> Users
            </a>
          </li>   
          <li>
            <a class="@if( $active == 'degree' ) active @endif" href="{{ url('manageDegree') }}" title="Degree"> 
            <i class="fa fa-mortar-board"></i> Degree
            </a>
          </li>
          
          <li>
            <a class="@if( $active == 'specialization' ) active @endif" href="{{ url('manageSpecialization') }}" title="Specialization"> 
            <i class="fa fa-star"></i> Specialization
            </a>
          </li>
          <li>
            <a class="@if( $active == 'language' ) active @endif" href="{{ url('manageLanguage') }}" title="Language"> 
            <i class="fa fa-language"></i> Language
            </a>
          </li>
          <li>
            <a class="@if( $active == 'competencies' ) active @endif" href="{{ url('skillmanage') }}" title="Competencies"> 
            <i class="fa fa-legal"></i> Competencies 
            </a>
          </li>
    </ul>
  </div>
</div>