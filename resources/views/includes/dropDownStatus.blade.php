
@can($permission)

<div class="btn-group">
  <button type="button" class="btn {{$class}} dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="{{$model->id}}_button">
        {{$txt}}
  </button>
  <div class="dropdown-menu">
    <a href="#" class="change_status" style="padding: 10px;" data-id="{{$model->id}}_active" data-txt="@lang('lang.active')" data-status="1" data-route={{route($route. '.status',[ $model->id,1])}}  data-type="anchor"   data-button="{{$model->id}}_button"
    confirm_msg="{{__('lang.status_msg')}}" yes="{{__('lang.yes')}}" no="{{__('lang.no')}}" success_msg ="{{__('lang.status_updated_successfully')}}">@lang('lang.active')</a>
        <div class="dropdown-divider"></div>
    <a href="#" class="change_status" style="padding: 10px;" data-id="{{$model->id}}_inactive" data-txt="@lang('lang.inactive')" data-status="2" data-route={{route($route. '.status',[ $model->id,2])}} data-type="anchor"    data-button="{{$model->id}}_button"
    confirm_msg="{{__('lang.status_msg')}}" yes="{{__('lang.yes')}}" no="{{__('lang.no')}}" success_msg ="{{__('lang.status_updated_successfully')}}">@lang('lang.inactive')</a>
       <div class="dropdown-divider"></div>
    <a href="#" class="change_status" style="padding: 10px;" data-id="{{$model->id}}_block" data-txt="@lang('lang.block')" data-status="0" data-route={{route($route. '.status',[ $model->id,0])}} data-type="anchor"  data-button="{{$model->id}}_button"
    confirm_msg="{{__('lang.status_msg')}}" yes="{{__('lang.yes')}}" no="{{__('lang.no')}}" success_msg ="{{__('lang.status_updated_successfully')}}">@lang('lang.block')</a>
  </div>
</div>
@endcan

@cannot($permission)

@endcannot
