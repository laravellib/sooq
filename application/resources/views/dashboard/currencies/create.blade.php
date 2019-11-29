@extends ('dashboard.layout.app')

@section ('content')

<div class="row">
    <div class="col-md-12">

        <!-- Session Messages -->
        @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }} 
        </div>
        @endif
        @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }} 
        </div>
        @endif

        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <span class="caption-subject font-blue bold uppercase"> إنشاء عملة جديدة</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" class="form-horizontal" action="{{ Protocol::home() }}/dashboard/currencies/create" method="POST">
                    {{ csrf_field() }}
                    <div class="form-body">

                        <!-- Currency Code -->
                        <div class="form-group form-md-line-input {{ $errors->has('code') ? 'has-error' :'' }}">
                            <label class="col-md-2 control-label" for="code">عملة</label>
                            <div class="col-md-10">
                                <select class="form-control" id="code" name="code">
                                    @foreach (config('currency') as $key => $value)
                                    <option {{ old('code') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="form-control-focus"> </div>
                                @if ($errors->has('code'))
                                <span class="help-block">{{ $errors->first('code') }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Country -->
                        <div class="form-group form-md-line-input {{ $errors->has('country') ? 'has-error' :'' }}">
                            <label class="col-md-2 control-label" for="country">بلد العملة</label>
                            <div class="col-md-10">
                                <select class="form-control" id="country" name="country">
                                    @foreach ($countries as $country)
                                    <option {{ old('country') == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-control-focus"> </div>
                                @if ($errors->has('country'))
                                <span class="help-block">{{ $errors->first('country') }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Locale -->
                        <div class="form-group form-md-line-input {{ $errors->has('locale') ? 'has-error' :'' }}">
                            <label class="col-md-2 control-label" for="locale">لغة العملة</label>
                            <div class="col-md-10">
                                <select class="form-control" id="locale" name="locale">
                                    @foreach (config('locale') as $key => $value)
                                    <option {{ old('locale') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="form-control-focus"> </div>
                                @if ($errors->has('locale'))
                                <span class="help-block">{{ $errors->first('locale') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn default btn-block">إنشاء العملات</button>
                    </div>
                </form>
            </div>
        </div>

@endsection