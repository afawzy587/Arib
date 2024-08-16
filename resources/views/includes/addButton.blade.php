@if($permission)
  @can($permission)
      <a class="btn btn-primary mr-1 mb-1" href="{{route($route. '.create')}}">{{__($name)}}</a>
  @endcan
@endif
