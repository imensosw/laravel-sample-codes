<!-- top navigation -->
<div class="top_nav" style="display: none;">
  <div class="nav_menu">
    <div class="col-md-12">
      <nav>
        <div class="nav_center pull-left col-sm-6">
          <!-- <div class="search-big">
            <input placeholder="Search..." class="search-box" type="text">
          </div> -->
        </div>
        <div class="col-sm-6">
          <div class="row">
            <ul class="nav navbar-nav pull-right navbar-right_top">                
              <li class="dropdown">
                <a href="#" class="dropdown-toggle info-number" data-toggle="dropdown">
                  <img src="images/icons/bell.svg" alt="bell" class="svg" />
                  <span class="badge bg-red">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu msg_list">
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Contrary to popular belief, Lorem Ipsum is not simply random text....
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Contrary to popular belief, Lorem Ipsum is not simply random text....
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Contrary to popular belief, Lorem Ipsum is not simply random text....
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Contrary to popular belief, Lorem Ipsum is not simply random text....
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a>
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown">
                  <div class="top_Proimg">
                    
                    <img src="{{asset('public/profile_image/'.\Auth::user()->image)}}" alt="">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                 <!-- <li><a href="javascript:;"> Profile</a></li>
                 <li>
                  <a href="javascript:;">
                    <span class="badge bg-red pull-right">50%</span>
                    <span>Settings</span>
                  </a>
                </li>
                <li><a href="javascript:;">Help</a></li> -->
                <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
              </ul>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>
</div>
<!-- /top navigation -->  