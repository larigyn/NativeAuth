@if (Auth::guard('web')->check())
  <p class="text-success">
    You are <strong>Logged In</strong> as a <strong>USER</strong>
  </p>
@else
  <p class="text-danger">
    You are <strong>Logged Out</strong> as a <strong>USER</strong>
  </p>
@endif

@if (Auth::guard('gcj')->check())
  <p class="text-success">
    You are <strong>Logged In</strong> as a <strong>S-ADMIN</strong>
  </p>
@else
  <p class="text-danger">
    You are <strong>Logged Out</strong> as a <strong>S-ADMIN</strong>
  </p>
@endif
