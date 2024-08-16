@can($permission)
<i data-id="{{$model->id}}" id="status_{{$model->id}}" data-status="{{$model->status}}" data-route={{route($route. '.status', $model->id)}} data-type="icon"
    confirm_msg="{{__('lang.status_msg')}}" yes="{{__('lang.yes')}}" no="{{__('lang.no')}}" success_msg ="{{__('lang.status_updated_successfully')}}"
    class="change_status fa fa-toggle-{{boolval($model->status) ? 'on' : 'off' }} fa-2x {{boolval($model->status) ? 'success' : 'danger' }}"></i>
@endcan

@cannot($permission)
    <i  title="{{__('lang.NoPermisson')}}" class=" fa fa-toggle-{{boolval($model->status) ? 'on' : 'off' }} fa-2x {{boolval($model->status) ? 'success' : 'danger' }}"></i>
@endcannot
