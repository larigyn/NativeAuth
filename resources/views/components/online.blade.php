@if (Auth::guard('web')->check())
  <p class="text-success">
   {{--  <strong>{{ Auth::user()->name }}</strong> --}} are <strong>Logged In</strong> as a <strong>USER</strong>
  </p>
@else
  <p class="text-danger">
   {{--  <strong>{{ Auth::user()->name }}</strong> --}} are <strong>Logged Out</strong> as a <strong>USER</strong>
  </p>
@endif

@if (Auth::guard('gcj')->check())

  <p class="text-success">
    {{-- <strong>{{ Auth::user()->name }}</strong> --}} are <strong>Logged In</strong> as a <strong>S-ADMIN</strong>
  </p>
@else
  <p class="text-danger">
    {{-- <strong>{{ Auth::user()->name }}</strong> --}} are <strong>Logged Out</strong> as a <strong>S-ADMIN</strong>
  </p>
@endif

@if (Auth::guard('admin')->check())
  <p class="text-success">
    {{-- <strong>{{ Auth::user()->name }}</strong> --}} are <strong>Logged In</strong> as a <strong>ADMIN</strong>
  </p>
@else
  <p class="text-danger">
    {{-- <strong>{{ Auth::user()->name }}</strong> --}} are <strong>Logged Out</strong> as a <strong>ADMIN</strong>
  </p>
@endif

@if( Auth::check() )
    Current user: {{ Auth::user()->name }}<br>
    Email Address : {{ Auth::user()->email }}<br>
    
@endif