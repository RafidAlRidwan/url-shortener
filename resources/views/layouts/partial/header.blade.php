 <header class="header-section" style="background: #2c18b4;top: 0;">

   <div class="container">
     <div class="header-wrapper">
       <ul class="menu">
         <li>
           <a href="/">Home</a>
         </li>
         @if(Auth::check())
         <li class="d-sm-none text-center">
           <a href="{{route('logout')}}" class="header-button active">Logout</a>
         </li>
         @else
         <li class="d-sm-none text-center">
           <a href="{{route('login')}}" class="header-button active">Login</a>
         </li>
         <li class="d-sm-none text-center">
           <a href="{{route('register')}}" class="mb-4 header-button">Register</a>
         </li>
         @endif

       </ul>
       <div class="header-bar d-lg-none mr-sm-3">
         <span></span>
         <span></span>
         <span></span>
       </div>
       <div class="header-right">
         @if(Auth::check())
         <form id="logoutForm" method="post" action="{{route('logout')}}" style="display: none">
           @csrf
         </form>
         <a href="{{route('dashboard')}}" class="header-button d-none d-sm-inline-block m-0 active">My Dashboard</a>
         <a href="#" onclick="document.getElementById('logoutForm').submit();" class="header-button d-none d-sm-inline-block m-0">Logout</a>
         @else
         <a href="{{route('login')}}" class="header-button d-none d-sm-inline-block m-0 active">Login</a>
         <a href="{{route('register')}}" class="header-button d-none d-sm-inline-block m-0">Register</a>
         @endif
       </div>
     </div>
   </div>
 </header>