@extends('layouts/fullLayoutMaster')

@section('title', __('auth.CreateAccount'))

@section('page-style')
        {{-- Page Css files --}}
        <link rel="stylesheet" href="{{ asset('css/pages/authentication.css') }}">
@endsection
@section('content')
<section class="row flexbox-container">
  <div class="col-xl-8 col-10 d-flex justify-content-center">
      <div class="card bg-authentication rounded-0 mb-0">
          <div class="row m-0">
              <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                  <img src="{{ asset('images/pages/register.jpg') }}" alt="branding logo">
              </div>
              <div class="col-lg-6 col-12 p-0">
                  <div class="card rounded-0 mb-0 p-2">
                      <div class="card-header pt-50 pb-1">
                          <div class="card-title">
                              <h4 class="mb-0"> @lang('auth.CreateAccount')</h4>
                          </div>
                      </div>
                      <div class="card-content">
                          <div class="card-body pt-0">
                            @if(session('error'))
                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                <i class="feather icon-info mr-1 align-middle"></i>
                                <span>{!! session('error') !!}</span>
                            </div>
                          @endif
                            <form method="POST" action="{{ route('register') }}" id="registerForm">
                              @csrf
                                  <div class="form-label-group form-group">
                                      <input id="name" type="text" class="form-control " name="name" placeholder="@lang('auth.Username')" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                      <label for="name">@lang('auth.Username')</label>
                                  </div>
                                  <div class="form-label-group form-group">
                                      <input id="email" type="email" class="form-control " name="email" placeholder="@lang('auth.Email')" value="{{ old('email') }}" required autocomplete="email">
                                      <label for="email">@lang('auth.Email')</label>
                                 
                                  </div>
                                  <div class="form-label-group form-group">
                                      <input id="password" type="password" class="form-control" name="password" placeholder="@lang('auth.Password')"  autocomplete="new-password">
                                      <label for="password">@lang('auth.Password')</label>
                                  </div>
                                  <div class="form-label-group form-group has-feedback has-error">
                                        <div class="col-xs-9 col-xs-offset-3">
                                            <!-- The message container -->
                                            <div id="messageContainer"></div>
                                        </div>
                                    </div>

                                  <div class="form-label-group form-group">
                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="@lang('auth.ConfirmPassword')" required autocomplete="new-password">
                                      <label for="password-confirm">@lang('auth.ConfirmPassword') </label>
                                  </div>
                                  <a href="{{route('login')}}" class="btn btn-outline-primary float-left btn-inline mb-50">@lang('auth.login')</a>
                                  <button type="submit" class="btn btn-primary float-right btn-inline mb-50">@lang('auth.Register')</a>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection

@section('page-script')
        <!-- Page js files -->

        <script>
            const form = $('#registerForm');
            var PASSWORD_RULES = [
                {
                    name: 'notempty',
                    message: "@lang('auth.InsertPassword')",
                    check: function(value) {
                        return value.length > 0;
                    }
                },
                {
                    name: 'length',
                    message: "@lang('auth.PasswordMinLenght', ['lenght' => '8'])",
                    check: function(value) {
                        return value.length >= 8;
                    }
                },
                {
                    name: 'upperCase',
                    message: "@lang('auth.ItMustAtLestUpperCase')",
                    check: function(value) {
                        return value !== value.toLowerCase();
                    }
                },
                {
                    name: 'lowerCase',
                    message: "@lang('auth.ItMustAtLestLowerCase')",
                    check: function(value) {
                        return value !== value.toUpperCase();
                    }
                },
                {
                    name: 'digit',
                    message: "@lang('auth.ItMustAtLestOneNumber')",
                    check: function(value) {
                        return value.search(/[0-9]/) >= 0;
                    }
                },
                {
                    name: 'sepecialChar',
                    message: "@lang('auth.ItMustAtLestSepcialChar')",
                    check: function(value) {
                        return /[!@#$%^&*()_+.,;:]/.test(value) === true;
                    }
                }
            ];

            for (var i = 0; i < PASSWORD_RULES.length; i++) {
                $('<small/>')
                    .addClass('help-block')
                    .attr('data-rule', PASSWORD_RULES[i].name)
                    .html(PASSWORD_RULES[i].message)
                    .append('<br/>')
                    .hide()
                    .appendTo('#messageContainer');
            }
            $(document).ready(function(){
                form.formValidation({
                    excluded: [':disabled'],
                    fields: {
                        name: {
                            validators: {
                                notEmpty: {
                                    message: "@lang('auth.Username')"+"@lang('auth.required')"
                                },
                                stringLength: {
                                    min: 3,
                                    max: 15,
                                    message: "@lang('auth.StringLength', ['lenght' => '3'])",
                                }
                            }
                        },
                        phone: {
                            validators: {
                                notEmpty: {
                                    message: "@lang('auth.phone')"+"@lang('auth.required')"
                                },
                                 regexp: {
                                    regexp: /^[0-9]{1,30}(?:\.[0-9]{1,2})?$/,
                                    message: "@lang('main.NumberNotCorrect')"
                                },
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: "@lang('auth.Email')"+"@lang('auth.required')"
                                },
                                regexp: {
                                    regexp: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
                                    message: "@lang('auth.EmailIsNotCorrect')"
                                },
                                stringLength: {
                                    max: 100,
                                    message: "@lang('auth.StringLength',['lenght' => '100'])"
                                },remote: {
                                    headers: {
                                        'X-CSRF-Token': '{{ csrf_token() }}',
                                    },
                                    url: '{{url("/email/check")}}',
                                    type: 'POST',
                                    async: false,    // Send Ajax request every 2 seconds
                                }
                            }
                        },
                        password: {
                            validators: {
                                callback: {
                                    callback: function(value, validator, $field) {
                                        if (value === '') {
                                            return true;
                                        }

                                        var passedRules = [];

                                        // Loop over the rules
                                        for (var i = 0; i < PASSWORD_RULES.length; i++) {
                                            if (PASSWORD_RULES[i].check(value)) {
                                                passedRules.push(PASSWORD_RULES[i].name);
                                            }
                                        }

                                        if (passedRules.length < PASSWORD_RULES.length) {
                                            return {
                                                valid: false,
                                                passedRules: passedRules
                                            }
                                        }

                                        return true;
                                    }
                                }
                            }
                        },

                        password_confirmation: {
                            validators: {
                                notEmpty: {
                                    message: "@lang('auth.ConfirmPassword')"+"@lang('auth.required')"
                                },
                                identical: {
                                    field: 'password1',
                                    message: "@lang('auth.PasswordIdentical')"
                                },
                                stringLength: {
                                    min: 8,
                                    message: "@lang('auth.PasswordMinLenght', ['lenght' => '8'])"
                                }
                            }
                        },
                     
                    },
                }).on('err.field.fv', function(e, data) {
                    // Check if the password field doesn't pass the callback validator
                    if (data.field === 'password' && data.validator === 'callback') {
                        // Get the validator result
                        // result consists of valid, passedRules properties
                        var result = data.result;
                        // Hide the default message
                        data.element
                            .closest('.form-group')
                                .find('small[data-fv-for="password"][data-fv-validator="callback"]')
                                .hide();

                        var $messages = $('#messageContainer').find('small[data-rule]');
                        for (var i = 0; i < PASSWORD_RULES.length; i++) {
                            var $message = $messages.filter('[data-rule="' + PASSWORD_RULES[i].name + '"]');

                            $.inArray(PASSWORD_RULES[i].name, result.passedRules) === -1
                                ? $message.fadeIn()     // Show the message if the field doesn't pass the rule
                                : $message.fadeOut();   // Otherwise, hide it
                        }
                    }
                })
                .on('success.field.fv', function(e, data) {
                    if (data.field === 'password') {
                        $('#messageContainer').find('small[data-rule]').hide();
                    }
                });
            });
        </script>
@endsection
