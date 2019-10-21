@include('auth.header_1')
<!-- page content -->
<div class="login">
    <div class="container">
        <div class="container_new">
            <div class="login_area">
                <div class="logo logo_bg circle">
                      <a href="#"> <img src="images/ul-icon.png"  alt="logo"> </a>
                </div>
                <!-- manager lgin form -->

                <!-- employee login form / -->

                <!-- admin lgin form -->

                <form class="login_form" id="admin_frm" method="POST" action="{{ route('login') }}">
                    <div class="lc-block toggled" id="l-login">
                        {{ csrf_field() }}
                        <!--  <h1>Please Fill Login Details  </h1> -->
                        <div class="form-group float-label-control{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon radius_0"> <img src="images/icons/avatar.svg" alt="usre name" class="svg"> </span>
                                    <input id="email" type="email" class="form-control radius_0" name="email" value="{{ old('email') }}" placeholder="Enter Mail Id" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif                 
                            </div>                
                        </div>
                        <div class="form-group float-label-control{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon radius_0"> <img src="images/icons/lock.svg" alt="lock" class="svg"></span>
                                    <input type="password" id="password" class="form-control radius_0" name="password" placeholder="Enter password" required />
                                </div>
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>               
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="" value="" id="a">
                            <label for="a">Remember Me </label>
                        </div>
                        <button type="submit" class="btn btn_primery circle"> <!-- <i class="fa fa-long-arrow-right" aria-hidden="true"></i> --> Login </button>
                        <!-- <a class="forgot_pass" href="{{ route('password.request') }}">Forgot Password?</a> -->
                        <div class="forgot_pass hideshow1">Forgot Password?</div>
                    </div>
                </form>
                <form class="login_form" id="admin_frm" method="POST" action="{{ route('login') }}">
                    <div class="lc-block" id="l-forget-password">
                        <div class="col-sm-12"><div class="row"><p class="text-left">Let us know your username and we'll send you an email to reset your password.</p></div></div>
                        <div class="form-group float-label-control">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon radius_0"> <img src="images/icons/avatar.svg" alt="usre name" class="svg"> </span>
                                    <input id="" type="email" class="form-control radius_0" name="email" value="{{ old('email') }}" placeholder="Enter Mail Id" required autofocus>
                                </div>               
                            </div>                
                        </div>
                        <button type="submit" class="btn btn_primery circle"> <!-- <i class="fa fa-long-arrow-right" aria-hidden="true"></i> --> Send </button>
                        <div class="login1 hideshow1">Login</div>
                    </div>
                </form>
                <!-- admin login form / -->
            </div>
        </div>  
    </div>
</div>
<!-- /page content -->

<script scr="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // manager_login
        $("#manager_login").click(function(){
            $(".login_choose").slideUp("fast");
            $("#manager_frm").slideDown("slow");
        });

   // employee_login
   $("#employee_login").click(function(){
    $(".login_choose").slideUp("fast");
    $("#employee_frm").slideDown("slow");
});
   // admin_login
   $("#admin_login").click(function(){
    $(".login_choose").slideUp("fast");
    $("#admin_frm").slideDown("slow");
});
});

 // login forgot pass word area
 $(".login1").click(function(){
   // alert("asdf");
   $("#l-forget-password").removeClass("toggled");
   $("#l-login").addClass("toggled");
});
 $(".forgot_pass").click(function(){
   // alert("asdf");
   $("#l-login").removeClass("toggled");
   $("#l-forget-password").addClass("toggled");
});
</script>
