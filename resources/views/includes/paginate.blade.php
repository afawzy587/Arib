        <form id="paginate_form" style="float:right; padding-right:50px " action="{{ route($route . '.index') }}" method="get">
                <div class="row">
                    <div class="col-md-2">
                            @php
                                $pagiants = ['20', '50','100','250','500'];
                            @endphp

                            <select style="width:100px; font-weight: bold; font-size:15px" class="form-control paginate" name="paginate">
                                @foreach($pagiants as $paginate)
                                 <option value="{{ $paginate }}" {{ request('paginate') == $paginate ? 'selected' : null}}> {{ $paginate }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
            </form>
