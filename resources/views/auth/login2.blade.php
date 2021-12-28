<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('gente/images/logo_sumedang.png')}}" type="image/ico" />

    <title>SILPa | Login </title>

   

      <!-- LOGIN Style -->
      <link href="{{asset('gente/build/css/login2.css')}}" rel="stylesheet">

  </head>

  <body>
<div class="background-wrap">
    <div class="background"></div>
  </div>
  
  <form action="/login" method="post">
    <h1 id="litheader">SILPAKAMI</h1>
    <div class="inset">
      <p>
        <input type="text" name="username" id="email" placeholder="Email address">
      </p>
      <p>
        <input type="password" name="password" id="password" placeholder="Access code">
      </p>
      <div style="text-align: center;">
        <div class="checkboxouter">
          <input type="checkbox" name="rememberme" id="remember" value="Remember">
          <label class="checkbox"></label>
        </div>
      </div>
      <input class="loginLoginValue" type="hidden" name="service" value="login" />
    </div>
    <p class="p-container">
      <input type="submit" href="{{route('user')}}" name="Login" id="go" value="Authorize">
    </p>

  </form>


   <!-- jQuery -->
   <script src="{{asset ('gente/vendors/jquery/dist/jquery.min.js')}}"></script>
  <script>
    $(document).ready(function() {
    
        var state = false;
    
        //$("input:text:visible:first").focus();
    
        $('#accesspanel').on('submit', function(e) {
    
            e.preventDefault();
    
            state = !state;
    
            if (state) {
                document.getElementById("litheader").className = "poweron";
                document.getElementById("go").className = "";
                document.getElementById("go").value = "Initializing...";
            }else{
                document.getElementById("litheader").className = "";
                document.getElementById("go").className = "denied";
                document.getElementById("go").value = "Access Denied";
            }
    
        });
    
    });
    </script>
</body>
</html>