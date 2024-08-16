@extends('layouts/contentLayoutMaster')

@section('title', $configData['title'])

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{$configData['title']}}</h4>
        </div>
      <div class="card-body">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                  <div class="card-content">
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-label-group">
                                        <strong class="font-weight-bold col-md-2"> {{__('lang.name_en')}} : </strong> <span class="col-md-4">{{$city->getTranslation('en')->name}} </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-label-group">
                                        <strong class="font-weight-bold col-md-2"> {{__('lang.name_ar')}} : </strong> <span class="col-md-4">{{$city->getTranslation('ar')->name}} </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-label-group">
                                        <strong class="font-weight-bold col-md-2"> {{__('lang.status')}} : </strong> <span class="col-md-4">@if($city->status=='1') {{__('lang.active')}} @else {{__('lang.inactive')}} @endif </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                </div>
              </div>
                <div class="col-12">
                    @include('includes.editButton',['route'=>'cities', 'model'=>$city,'permission'=>'cities.edit'])
                    @include('includes.deleteView',['route'=>'cities', 'model'=>$city,'permission'=>'cities.delete'])
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
  {{-- Data list view end --}}
@endsection



