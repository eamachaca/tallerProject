@extends("_partials.template")
    @section("title","Login Page")
    @push("styles")
        <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">
    @endpush
    @section("content")
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <!-- End Page Loading -->



        <div id="login-page" class="row">
            <div class="col s12 z-depth-2 card-panel">
                @if($errors->first())
                    <div id="card-alert" class="card red">
                        <div class="z-depth-5 card-content white-text">
                            <p>{{$errors->first()}}</p>
                        </div>
                        <button onclick="hide()" type="button" class="white-text"aria-label="Close">
                            <span >×</span>
                        </button>
                    </div>
                @endif
                {!! Form::open(['route' => 'login-post','class'=>'login-form']) !!}
                    <div class="row">
                        <div class="input-field col s12 center">
                            <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
                            <p class="center login-form-text">Material Design Admin Template</p>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-social-person-outline prefix"></i>
                            {{ Form::text('username', '', array('class' => 'field')) }}
                            {{ Form::label('username') }}
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-action-lock-outline prefix"></i>
                            {{ Form::password('password',['class' => 'field']) }}
                            {{ Form::label('password') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12  login-text">

                            {{ Form::checkbox('remember', null, null, ['id' => 'remember_me']) }}
                            {{ Form::label('remember_me') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12" onclick="$('form').submit()">
                            {{ Form::submit('Login',['class' => 'btn waves-effect waves-light col s12']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <p class="margin center medium-small">{{ HTML::linkRoute('login', 'Sign In') }}</p>
                        </div>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
        @push('scripts')
            <script>
                function hide() {
                    $('#card-alert').animateCss('fadeOutDownBig', function() {
                        $('#card-alert').remove();
                    });
                }
            </script>
        @endpush
    @endsection

    @push('ready')
        setTimeout(hide,3500);
    @endpush