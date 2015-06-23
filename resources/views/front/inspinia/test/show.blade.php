@extends('front.inspinia.template')

@section('main')



    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>{{$test -> name}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/umc/public/">Главная</a>
                </li>
                <li>
                    <a href="/umc/public/{{$obj -> specialty[0] -> slug}}">{{$obj -> specialty[0] -> short_name}}</a>
                </li>
                <li>
                    <?php $group = DB::table('groups')->where('id', $user->groups_id)->pluck('slug')?>
                    <a href="/umc/public/{{$obj -> specialty[0] -> slug}}/{{$group}}/{{$obj -> slug}}">{{$obj -> name}}</a>
                </li>
                <li class="active">
                    <strong>{{$test -> name}}</strong>
                </li>
                <div class="pull-right">Преподователь: <strong>{{$obj -> user -> username}}</strong></div>
            </ol>

        </div>
    </div>

    <div class="row animated fadeInRight">
        <br>
        <div class="col-lg-12 animated fadeInRight">
            <div class="mail-box-header">
                <div class="pull-right tooltip-demo">
                    <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Распечатать лекцию"><i class="fa fa-print"></i> </a>
                    <a href="" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="В избранное"><i class="fa fa-star"></i> </a>
                </div>
                <h2>
                    Прохождение теста
                </h2>

            </div>
            <div class="mail-box">


                <div class="mail-body" id="slickQuiz">
                    <h1 class="quizName"><!-- where the quiz name goes --></h1>

                    <div class="quizArea">
                        <div class="quizHeader">
                            <!-- where the quiz main copy goes -->

                            <a class="button startQuiz" href="#">Начать тестирование.</a>
                        </div>

                        <!-- where the quiz gets built -->
                    </div>

                    <div class="quizResults">
                        <h3 class="quizScore">Ваша оценка: <span><!-- where the quiz score goes --></span></h3>

                        <h3 class="quizLevel"><strong>Ранк:</strong> <span><!-- where the quiz ranking level goes --></span></h3>

                        <div class="quizResultsCopy">
                            <!-- where the quiz result copy goes -->
                        </div>
                    </div>
                </div>



                <div class="clearfix"></div>

            </div>
        </div>
    </div>
    <br><br>
@stop


@section('scripts')
    {!! HTML::script('inspinia/js/slickQuiz-config.js') !!}
    {!! HTML::script('inspinia/js/slickQuiz.js') !!}
    {!! HTML::script('inspinia/js/master.js') !!}
@stop

@section('head')
    {!! HTML::style('inspinia/css/slickQuiz.css') !!}
@stop