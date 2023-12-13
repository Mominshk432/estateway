@extends('admin.layouts.layout')
@section('title')
    Seo Settings
@endsection
@section('body')
    <br>
    @include('admin.includes.seo_settings',['page' => 'homepage','settings' => $seoSetting])
@endsection
