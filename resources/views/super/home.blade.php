@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">SuperAdmin Dashboard for 
                {{-- <strong>{{ ucfirst(trans(Auth::user()->name)) }}</strong> --}}
                    <strong> @fword_uppercase(Auth::user()->name) </strong>                     
                </div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="links">
                        @component('components.online')
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
