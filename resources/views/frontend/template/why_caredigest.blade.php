@extends('frontend.layouts.master')

@section('title', "$PageData->pagename")

@section('content')


  <!-----------------slider start--------------->
  

  <!-------------------slider END---------------------->






@if($PageData->slug=='pricing')

@include('frontend.template.pricing')

@elseif(in_array($PageData->slug, ['contact', 'contact-us', 'reach-us']))

@include('frontend.template.contact')

@else
{!! $PageData->description !!}
@endif



@endsection