@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Get Rates</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="currency" class="col-md-4 control-label">Currency</label>
                                <select class="form-control" name="currency_name">
                                    @foreach($available_currencies as $currency)
                                        <option value="{{$currency->name}}" name="currency_name">{{$currency->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Get Rates
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
