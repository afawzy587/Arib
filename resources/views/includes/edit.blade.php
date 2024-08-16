 @can($permission)
    <a href="{{ route($route .'.edit', $model->id) }}" data-toggle="tooltip" data-placement="top" title="{{__('lang.edit')}}" >
      <span class="action-edit"><i class="feather icon-edit" style="font-size:19px;"></i></span>
    </a>
 @endcan

 @cannot($permission)
    <span class="action-edit"><i class="feather icon-edit" title="{{__('lang.NoPermisson')}}" style="font-size:19px;"></i></span>
 @endcannot


