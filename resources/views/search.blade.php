@extends('layouts.app')

@section('content')
        <section class="page-title">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                        <div class="content-box clearfix">
                            <div class="title pull-left">
                                <h1>Search</h1>
                            </div>
                            <ul class="bread-crumb pull-right clearfix">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li>Search</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@if($rows)
@foreach($rows as $row)
<h1>{{ $row['User']['name'] }}</h1>
@endforeach
@endif
@endsection	