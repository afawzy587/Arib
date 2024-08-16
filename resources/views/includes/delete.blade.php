@can($permission)
   <a class="delete" confirm_msg="{{__('main.confirm_msg_del')}}" yes="{{__('lang.yes')}}" no="{{__('main.no')}}" success_msg="{{__('main.success_msg_del')}}" data-route="{{route($route. '.destroy', $model->id)}}" data-id="{{$model->id}}" title="{{__('lang.delete')}}" > <span class="action-delete"><i class="feather icon-trash .chip-danger" style="color: red;font-size:19px;"></i></span></a>
@endcan

 @cannot($permission)
   <span class="action-delete"><i class="feather icon-trash .chip-danger" title="{{__('lang.NoPermisson')}}" style="color: red;font-size:19px;"></i></span>
 @endcannot
