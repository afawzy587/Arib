@extends('layouts/contentLayoutMaster')

@section('title', $configData['title'])

@section('content')
{{-- Data list view starts --}}
<section id="contextual-colors" class="card">
{{--@php--}}
{{--dd(auth()->user()->getAllPermissions()->toArray())--}}
{{--@endphp--}}

        <div class="card-header">
             <h4 class="card-title">{{$configData['title']}}</h4>
             @include('includes.addButton',['route'=>'cities', 'name'=>'lang.cities.create','permission' =>'cities.create'])
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  table-bordered table-striped table-hover-animation mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('lang.name')}}</th>
                                <th scope="col">{{__('lang.status')}}</th>
                                <th scope="col">{{__('lang.settings')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $city)
                                  <tr id="tr_{{$city->id}}">
                                      <td><a href="{{route('cities.show',['id'=>$city->id])}}" >{{$city->id}}</a></td>
                                      <td>{{$city->name}}</td>
                                      <td>@include('includes.statusIndex',['route'=>'cities', 'model'=>$city,'permission' =>'cities.active'])</td>
                                      <td>
                                        @include('includes.delete',['route'=>'cities', 'model'=>$city,'permission' =>'cities.delete'])
                                        @include('includes.edit',['route'=>'cities', 'model'=>$city,'permission' =>'cities.edit'])
                                     </td>

                                  </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center">
              {!! $cities->links('vendor.pagination.bootstrap-5') !!}
            </div>
        </div>
</section>
  {{-- Data list view end --}}
@endsection
@section('page-script')
@endsection
