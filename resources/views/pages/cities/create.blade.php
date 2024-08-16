@extends('layouts/contentLayoutMaster')

@section('title', $pageConfigs['title'])

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('content')
{{-- Data list view starts --}}
<section id="contextual-colors" class="card">
        <div class="card-content">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$pageConfigs['title']}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" id="CreatePlan" action="{{ route('cities.store') }}" method="post">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-label-group">
                                            <input type="text" id="name_en"  name="name_en" class="form-control" placeholder="{{__('lang.name_en')}}" value="{{old('name[en]')}}"> <span class="asterisk_input">  </span>
                                            <label for="name_en" >{{__('lang.name_en')}}</label>

                                        @if ($errors->has('name_en'))
                                         <span class="invalid feedback" role="alert" style="color:red;">
                                            <small>{{ $errors->first('name_en') }}</small>
                                         </span>
                                        @endif
                                     </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-label-group">
                                            <input type="text" id="name_ar" name="name_ar" class="form-control" placeholder="{{__('lang.name_ar')}}"  value="{{old('name[ar]')}}"><span class="asterisk_input">  </span>
                                            <label for="name_ar">{{__('lang.name_ar')}}</label>

                                        @if ($errors->has('name_ar'))
                                         <span class="invalid feedback" role="alert" style="color:red;">
                                            <small>{{ $errors->first('name_ar') }}</small>
                                         </span>
                                        @endif
                                     </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">{{__('main.SubmitAdd')}}</button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
  {{-- Data list view end --}}
@endsection

@section('vendor-script')
        <!-- vendor files -->
        <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
@endsection
@section('page-script')
        <!-- Page js files -->
        <script src="{{ asset('js/scripts/forms/select/form-select2.js') }}"></script>

        <script>
            const form = $('#CreatePlan');
            $(document).ready(function(){
                form.formValidation({
                    excluded: [':disabled'],
                    fields: {
                        name_en: {
                            validators: {
                                notEmpty: {
                                    message: "@lang('lang.name_en')"+" "+" @lang('lang.required')"
                                },
                                stringLength: {
                                    min: 3,
                                    max: 15,
                                    message: "@lang('lang.Stringlength' , ['min' => '3' ,'max' => '15'])"
                                },remote: {
                                    headers: {
                                        'X-CSRF-Token': '{{ csrf_token() }}',
                                    },
                                    url: '{{url("/admin/city/check")}}',
                                    type: 'POST',
                                    data: {
                                        name_en: 'name_en',
                                    },
                                    async: true,    // Send Ajax request every 2 seconds
                                }
                            }
                        },
                        name_ar: {
                            validators: {
                                notEmpty: {
                                    message: "@lang('lang.name_ar_required')"
                                },
                                stringLength: {
                                    min: 3,
                                    max: 15,
                                    message: "@lang('lang.name_ar_length')"
                                },remote: {
                                    headers: {
                                        'X-CSRF-Token': '{{ csrf_token() }}',
                                    },
                                    url: '{{url("/admin/city/check")}}',
                                    type: 'POST',
                                    data: {
                                        name_ar: 'name_ar',
                                    },
                                    async: true,    // Send Ajax request every 2 seconds
                                }
                            }
                        },
                    }
                });
            });

         $(".datepicker").flatpickr(
          {
            dateFormat: "Y-m-d",
            "locale": 'ar',
            minDate :"{{now()}}",
         });
        </script>
@endsection
