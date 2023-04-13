@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-uppercase">{{ __('home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        Welcome to the Employee Management System! This system is designed to simplify and streamline the process of managing employee data and information. Whether you're an HR manager, a supervisor, or a team leader, this system will provide you with the tools and resources you need to effectively manage your employees.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
