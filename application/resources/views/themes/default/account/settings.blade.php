@extends (Theme::get().'.layout.app')

@section ('seo')

{!! SEO::generate() !!}

@endsection

@section ('content')

<!-- account settings -->
<div class="row">

	<!-- Session Messages -->
	<div class="col-md-12">
		@if (Session::has('success'))
		<div class="alert bg-success alert-styled-left">
			<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
			{{ Session::get('success') }}
	    </div>
	    @endif
	    @if (Session::has('error'))
		<div class="alert bg-danger alert-styled-left">
			<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
			{{ Session::get('error') }}
	    </div>
	    @endif
	</div>

	@include (Theme::get().'.account.include.sidebar')
	
	<!-- Account Settings -->
	<div class="col-md-9">

		<!-- User settings -->
		<div class="panel">

			<div class="panel-body">
				<form action="{{ Protocol::home() }}/account/settings" method="POST" enctype="multipart/form-data" class="form-validate-jquery">

					{{ csrf_field() }}

					<!-- First && Last Name -->
					<div class="form-group">
						<div class="row">

							<!-- First Name -->
							<div class="col-md-6">
								<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
									<label>{{ Lang::get('account/settings.lang_first_name') }}</label>
									<input required="required" class="form-control input-sm" placeholder="{{ Lang::get('account/settings.lang_first_name_placeholder') }}" type="text" value="{{ $user->first_name }}" name="first_name">
									@if ($errors->has('first_name'))
									<span class="help-block">
										{{ $errors->first('first_name') }}
									</span>
									@endif
								</div>
							</div>

							<!-- Last Name -->
							<div class="col-md-6">
								<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
									<label>{{ Lang::get('account/settings.lang_last_name') }}</label>
									<input required="" class="form-control input-sm" placeholder="{{ Lang::get('account/settings.lang_last_name_placeholder') }}" type="text" value="{{ $user->last_name }}" name="last_name">
									@if ($errors->has('last_name'))
									<span class="help-block">
										{{ $errors->first('last_name') }}
									</span>
									@endif
								</div>
							</div>

						</div>
					</div>

					<!-- Username && Email -->
					<div class="form-group">
						<div class="row">

							<!-- Username -->
							<div class="col-md-6">
								<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
									<label>{{ Lang::get('account/settings.lang_username') }}</label>
									<input required="" class="form-control input-sm" placeholder="{{ Lang::get('account/settings.lang_username_placeholder') }}" type="text" value="{{ $user->username }}" name="username">
									@if ($errors->has('username'))
									<span class="help-block">
										{{ $errors->first('username') }}
									</span>
									@endif
								</div>
							</div>

							<!-- E-mail Address -->
							<div class="col-md-6">
								<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
									<label>{{ Lang::get('account/settings.lang_email_address') }}</label>
									<input id="validateEmail" class="form-control input-sm" placeholder="{{ Lang::get('account/settings.lang_email_address_placeholder') }}" type="email" value="{{ $user->email }}" name="email">
									@if ($errors->has('email'))
									<span class="help-block">
										{{ $errors->first('email') }}
									</span>
									@endif
								</div>
							</div>

						</div>
					</div>

					<!-- Gender && Country -->
					<div class="form-group">
						<div class="row">

							<!-- Gender -->
							<div class="col-md-6">
								<div class="form-group form-group-material {{ $errors->has('gender') ? 'has-error' : '' }}">
									<label>{{ Lang::get('account/settings.lang_gender') }}</label>
									<select required="" class="select" name="gender">
										@if ($user->gender)
										<option value="1">{{ Lang::get('account/settings.lang_gender_male') }}</option>
										<option value="0">{{ Lang::get('account/settings.lang_gender_female') }}</option>
										@else
										<option value="0">{{ Lang::get('account/settings.lang_gender_female') }}</option>
										<option value="1">{{ Lang::get('account/settings.lang_gender_male') }}</option>
										@endif
									</select>
									@if ($errors->has('gender'))
									<span class="help-block">
										{{ $errors->first('gender') }}
									</span>
									@endif
								</div>
							</div>

							<!-- Country -->
							<div class="col-md-6">
								<div class="form-group form-group-material {{ $errors->has('country') ? 'has-error' : '' }}">
									<label>{{ Lang::get('create/ad.lang_country') }}</label>
									<select required="" class="select-search" name="country" onchange="getStates(this.value)">
										@foreach ($countries as $country)
	                                    <option {{ $user->country_code == $country->sortname ? 'selected' : '' }} value="{{ $country->sortname }}">{{ $country->name }}</option>
	                                    @endforeach
									</select>
									@if ($errors->has('country'))
									<span class="help-block">
										{{ $errors->first('country') }}
									</span>
									@endif
								</div>
							</div>

						</div>
					</div>

					<!-- State && City -->
					<div class="form-group">
						<div class="row">

							@if (Helper::settings_geo()->states_enabled)
							<!-- State -->
							<div class="{{ !Helper::settings_geo()->cities_enabled ? 'col-md-12' : 'col-md-6' }}">
								<div class="form-group form-group-material {{ $errors->has('state') ? 'has-error' : '' }}">
									<label>{{ Lang::get('create/ad.lang_state') }}</label>
									<select required="" data-placeholder="{{ Lang::get('create/ad.lang_select_state') }}" class="select-search" name="state" onchange="getCities(this.value)" id="putStates">
	                                    @foreach ($states as $state)
	                                    <option value="{{ $state->id }}" {{ $user->state == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
	                                    @endforeach
	                                </select>
	                                @if ($errors->has('state'))
									<span class="help-block">{{ $errors->first('state') }}</span>
									@endif
								</div>
							</div>
							@endif

							@if (Helper::settings_geo()->cities_enabled)
							<!-- City -->
							<div class="{{ !Helper::settings_geo()->states_enabled ? 'col-md-12' : 'col-md-6' }}">
								<div class="form-group form-group-material {{ $errors->has('city') ? 'has-error' : '' }}">
									<label>{{ Lang::get('create/ad.lang_city') }}</label>
									<select required="" data-placeholder="{{ Lang::get('create/ad.lang_select_city') }}" class="select-search" name="city" id="putCities">
										@foreach ($cities as $city)
	                                    <option value="{{ $city->id }}" {{ $user->city == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
	                                    @endforeach
	                                    <option></option>
	                                </select>
	                                @if ($errors->has('city'))
									<span class="help-block">{{ $errors->first('city') }}</span>
									@endif
								</div>
							</div>
							@endif

						</div>
					</div>

					<!-- Phone number && Phone Hidden -->
					<div class="form-group">
						<div class="row">

							<!-- Phone number -->
							<div class="col-md-6">
								<div class="row">

									<!-- Phone Code -->
									<div class="col-md-3">
										<div class="form-group {{ $errors->has('phonecode') ? 'has-error' : '' }}">
											<label>Phone code</label>
											<select required="" class="select-search" name="phonecode" id="putPhoneCode">
												@foreach ($countries as $phonecode)
												<option value="{{ $phonecode->phonecode }}" {{ $user->phonecode == $phonecode->phonecode ? 'selected' : '' }}>+{{ $phonecode->phonecode }}</option>
												@endforeach
											</select>
											@if ($errors->has('phonecode'))
											<span class="help-block">
												{{ $errors->first('phonecode') }}
											</span>
											@endif
										</div>
									</div>

									<!-- Phone Number -->
									<div class="col-md-9">
										<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
											<label>{{ Lang::get('account/settings.lang_phone_number') }}</label>
											<input required="" class="form-control input-sm" placeholder="{{ Lang::get('account/settings.lang_phone_number_placeholder') }}" type="text" value="{{ $user->phone }}" name="phone">
											@if ($errors->has('phone'))
											<span class="help-block">
												{{ $errors->first('phone') }}
											</span>
											@endif
										</div>
									</div>

								</div>
							</div>

							<!-- Phone hidden -->
							<div class="col-md-6">
								<div class="form-group form-group-material {{ $errors->has('phone_hidden') ? 'has-error' : '' }}">
									<label>{{ Lang::get('account/settings.lang_hide_phone_number') }}</label>
									<select required="" class="select" name="phone_hidden">
										@if ($user->phone_hidden)
	                                    <option value="1">{{ Lang::get('account/settings.lang_hide_phone') }}</option>
	                                    <option value="0">{{ Lang::get('account/settings.lang_show_phone') }}</option>
	                                    @else 
	                                    <option value="0">{{ Lang::get('account/settings.lang_show_phone') }}</option>
	                                    <option value="1">{{ Lang::get('account/settings.lang_hide_phone') }}</option>
	                                    @endif
	                                </select>
	                                @if ($errors->has('phone_hidden'))
									<span class="help-block">{{ $errors->first('phone_hidden') }}</span>
									@endif
								</div>
							</div>

						</div>
					</div>

					<!-- avatar -->
					<div class="form-group">
						<div class="row">

							<div class="col-md-12">
								<div class="form-group form-group-material {{ $errors->has('avatar') ? 'has-error' : '' }}">
									<label style="width: 100%;">{{ Lang::get('account/settings.lang_upload_avatar') }}</label>
									<input type="file" class="file-styled" name="avatar" accept="image/*">
	                                @if ($errors->has('avatar'))
									<span class="help-block">{{ $errors->first('avatar') }}</span>
									@endif
								</div>
							</div>

						</div>
					</div>

					<hr>
					
					<!-- Change Password -->
					<div class="form-group">
						<div class="row">

							<!-- Old Password -->
							<div class="col-md-6">
								<div class="form-group form-group-material {{ $errors->has('old_password') ? 'has-error' : '' }}">
									<label style="width: 100%;">{{ Lang::get('account/settings.lang_old_password') }}</label>
									<input placeholder="{{ Lang::get('account/settings.lang_old_password_placeholder') }}" class="form-control" type="password" name="old_password">
	                                @if ($errors->has('old_password'))
									<span class="help-block">{{ $errors->first('old_password') }}</span>
									@endif
								</div>
							</div>

							<!-- New Password -->
							<div class="col-md-6">
								<div class="form-group form-group-material {{ $errors->has('new_password') ? 'has-error' : '' }}">
									<label style="width: 100%;">{{ Lang::get('account/settings.lang_new_password') }}</label>
									<input placeholder="{{ Lang::get('account/settings.lang_new_password_placeholder') }}" class="form-control" type="password" name="new_password">
	                                @if ($errors->has('new_password'))
									<span class="help-block">{{ $errors->first('new_password') }}</span>
									@endif
								</div>
							</div>

						</div>
					</div>

                    <div class="pull-left mt-20">
                    	<span class="label label-flat border-grey text-grey-600">{{ Lang::get('account/settings.lang_last_login', ['date' => Helper::date_ago($user->last_login_at), 'country' => Tracker::ip($user->last_login_ip)->country()]) }}</span>
                    </div>

                    <div class="pull-right">
                    	<button type="submit" class="btn btn-primary legitRipple">{{ Lang::get('account/store/settings.lang_save_changes') }}</button>
                    </div>

				</form>
			</div>
		</div>

	</div>



</div>

<script type="text/javascript">
    
    /**
    * Get States
    */
    function getStates(country) {
        var _root = $('#root').attr('data-root');
        var country_id = country;
        $.ajax({
            type: "GET",
            url: _root + '/tools/geo/states/states_by_country',
            data: {
                country_id: country_id
            },
            success: function(response) {
                if (response.status == 'success') {

                	// Check if states enabled
                	if (response.states) {

                		$('#putStates').find('option').remove();
	                    $('#putStates').append($('<option>', {
	                        text: '{{ __('home.lang_state') }}',
	                        value: 'all'
	                    }));
	                    $.each(response.data, function(array, object) {
	                        $('#putStates').append($('<option>', {
	                            value: object.id,
	                            text: object.name
	                        }))
	                    });

                	}else if (response.cities) {

                		// Cities
                		$('#putCities').find('option').remove();
	                    $('#putCities').append($('<option>', {
	                        text: '{{ __('home.lang_city') }}',
	                        value: 'all'
	                    }));
	                    $.each(response.data, function(array, object) {
	                        $('#putCities').append($('<option>', {
	                            value: object.id,
	                            text: object.name
	                        }))
	                    });

                	}

                    // Change phonecode
                    //document.getElementById('putPhoneCode').value = response.phonecode;
                }
                if (response.status == 'error') {
                    alert(response.msg)
                }
            }
        })
    }

    /**
    * Get Cities
    */
    function getCities(state) {
        var _root = $('#root').attr('data-root');
        var state_id = state;
        $.ajax({
            type: "GET",
            url: _root + '/tools/geo/cities/cities_by_state',
            data: {
                state_id: state_id
            },
            success: function(response) {
                if (response.status == 'success') {
                    $('#putCities').find('option').remove();
                    $('#putCities').append($('<option>', {
                        text: 'Select city',
                        value: 'all'
                    }));
                    $.each(response.data, function(array, object) {
                        $('#putCities').append($('<option>', {
                            value: object.id,
                            text: object.name
                        }))
                    });
                }
                if (response.status == 'error') {
                    alert(response.msg)
                }
            }
        })
    }

</script>

@endsection