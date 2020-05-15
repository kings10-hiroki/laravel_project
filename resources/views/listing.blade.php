@extends('layouts.html')

@include('includes.messages')



@section('sidebar')
@parent
<p>This is appended to the sidebar</p>
@endsection