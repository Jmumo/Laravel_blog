@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">{{ __('Admin Panel') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to SeoSight Admin panel!') }}
                </div>
            
          </div>
@endsection
