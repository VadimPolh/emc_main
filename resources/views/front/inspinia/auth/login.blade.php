@extends('front.inspinia.clean')
@section('body-id'){{ 'gray-bg' }}@stop


@section('main')
<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-9 login-box">

            <div class="ibox float-e-margins login-form">
                <div class="ibox-title">
                    <h5>
                        Форма входа
                        <small></small>
                    </h5>
                    <div class="ibox-tools"></div>
                </div>
                <div class="ibox-content">
                    @if(session()->has('error'))
                                    @include('partials/error', ['type' => 'danger', 'message' => session('error')])
                              @endif
                    <div class="row">
                        <div class="col-sm-6 b-r">
                            <h3 class="m-t-none m-b">Войдите</h3>
                            {!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form']) !!}
                                {!! Form::control('text', 12, 'log', $errors, trans('front/login.log')) !!}
                                {!! Form::control('password', 12, 'password', $errors, trans('front/login.password')) !!}
                            <div>
                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"> <strong>Войти</strong>
                                </button>
                                <label>
                                    <div class="icheckbox_square-green" style="position: relative;">
                                        <input type="checkbox" class="i-checks"></div>
                                    Запомнить меня
                                </label>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-sm-6">
                            <h4>Еще не зарегистрированы?</h4>
                            <p>Начните обучение прямо сейчас:</p>
                            <p class="text-center">
                                <a data-toggle="modal" class="" href="#modal-form"> <i class="fa fa-sign-in big-icon"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3 login-text">

                <div class="login-content">
                    <h2 class="font-bold">УЧЕБНО-МЕТОДИЧЕСКИЙ КОМПЛЕКС</h2>

                    <p>Колледж Бизнесса и Права</p>



                    <p>
                        В Pascal можно организовать вызов из программы любой другой программы, которую назовем программой–потомком. Но, чтобы программа–потомок успешно загружалась в память и начала выполняться, требуется выделить ей необходимый объем памяти. Так как программа, которая выполняется в данный момент, по умолчанию захватывает всю свободную динамическую память (кучу) системы, то для загрузки программы–потомка просто нет места.
                    </p>
                    <p>
                        <a href="http://kbp.by" target="_blank" class="btn btn-default">Оффициальный сайт колледжа</a>
                        <a href="http://kbp.by/rasp/timetable/view_beta_tbp/?q=" target="_blank" class="btn btn-default">Рассписание занятий</a>
                    </p>
                    <p>


                    </p>
                </div>

                <div class="row login-content-footer">
                    <div class="col-md-6">
                        <a href="/" class="brand">
                            <img src="http://laravel.com/assets/img/laravel-logo.png" height="20">Laravel</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <small>
                            <a href="http://bevalex.by/" class="copyright">bevalex.by</a>
                            ©2015
                        </small>
                    </div>
                </div>

        </div>
    </div>
    <div id="modal-form" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="m-t-none m-b">Регистрация</h3>
                            <p>Введите требуемые данные в поля ниже</p>

                            {!! Form::open(['url' => 'auth/register', 'method' => 'post', 'role' => 'form']) !!}

                            <div class="form-group">
                               {!! Form::control('email', 6, 'email', $errors, trans('front/register.email')) !!}
                             </div>
                            <div class="form-group">
                                {!! Form::control('password', 6, 'password', $errors, trans('front/register.password'), null, [trans('front/register.warning'), trans('front/register.warning-password')]) !!}
                                {!! Form::control('password', 6, 'password_confirmation', $errors, trans('front/register.confirm-password')) !!}
                            <div>
                                    <label>Номер договора</label>
                                    <input type="dog_id" placeholder="Введите договор" class="form-control"></div>
                                <br>
                                <div>
                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"> <strong>Зарегестрироватся</strong>
                                    </button>

                                </div>

                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop