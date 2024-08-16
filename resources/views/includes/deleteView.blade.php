@can($permission)
    <button class="btn btn-outline-danger ViewDelete" data-id="{{$model->id}}" data-routeRedirect="{{route($route. '.index')}}" yes="{{__('lang.yes')}}" no="{{__('lang.no')}}" confirm_msg="{{__('lang.confirm_msg_del')}}" success_msg="{{__('lang.success_msg_del')}}" data-route="{{route($route. '.destroy', $model->id)}}"><i class="feather icon-trash-2"></i> {{__('lang.delete')}}</button>
@endcan
@cannot($permission)
    <button class="btn btn-outline-danger " title="{{__('lang.NoPermisson')}}" yes="{{__('lang.yes')}}" no="{{__('lang.no')}}" confirm_msg="{{__('lang.confirm_msg_del')}}" success_msg="{{__('lang.success_msg_del')}}" data-route="{{route($route. '.destroy', $model->id)}}"><i class="feather icon-trash-2"></i> {{__('lang.delete')}}</button>
@endcannot
