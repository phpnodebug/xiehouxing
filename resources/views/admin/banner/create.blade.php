@extends('app')



@section('content')
{!! Form::open(['url'=>'/admin/banners','enctype'=>'multipart/form-data']) !!}
{{-- <form action="/admin/banners" method="POST" enctype="multipart/form-data"> --}}


@include('admin.banner.form',['action'=>'添加'])
			

{!! Form::close() !!}
{{-- </form>	 --}}

@endsection

@section('js')



@endsection