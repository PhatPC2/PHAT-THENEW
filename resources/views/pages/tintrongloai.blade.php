@extends('layout.index')

@section('title')
   {{$loaitin->Ten}}
@endsection

@section('content')
@foreach($tintuc as $tt)
<a href="{{url('tintrongloai/chitiet',[$tt->id])}}">
   <h2>{{$tt->TieuDe}}</h2>
   <img src="/images/{{$tt->Hinh}}" alt="" width="300px" />
   <h3>{{$tt->TomTat}}</h3>
</a>
   <hr>
@endforeach
@endsection
