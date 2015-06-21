@extends('back.template')


@section('main')


    @include('back.partials.entete', ['title' => trans('back/test.dashboard'), 'icone' => 'file', 'fil' => link_to('tests', trans('back/test.dashboard')) . ' / ' . trans('back/test.creation')])

    <div class="col-sm-12">

        {!! Form::open(['url' => 'tests', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}
        {!! Form::control('text', 0, 'title', $errors, trans('back/lection.name')) !!}
        {!! Form::selection('objects_id', $select, null, trans('back/lection.nameobjects')) !!}

        <h2>Конструктор теста</h2>


        <div id="demo" data-quiz="auto">
            <input type="hidden" class="quiz-store">

            <h5>
               Создать новый вопрос с:
            </h5>
            <a href="#" class="quiz-new-text btn btn-primary">Текстовый ответ</a>
            <a href="#" class="quiz-new-radios btn btn-primary">Несколько вариантов &ndash; Один ответ</a>
            <a href="#" class="quiz-new-checkboxes btn btn-primary">Несколько вариантов &ndash; Несколько ответов</a>

            <hr>

            <div class="quiz-text template question" style="display: none">
                <div class="question-content">
                    <textarea class="input form-control" style="width: 50%;margin-bottom: 10px;">Вопрос</textarea>

                    <div class="container option">
                        <div class="eleven offset-by-one columns option-content">
                            <textarea class="form-control" style="width: 50%;margin-left: 45px">Ответ</textarea>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="twelve columns alignright">
                        <a href="#" class="tiny delete btn btn-danger" style="margin-top: 10px;margin-left: 42.6%;">Удалить вопрос</a>
                    </div>
                </div>

                <hr>
            </div>

            <div class="quiz-radios template question" style="display: none">
                <div class="question-content">
                    <textarea class="input form-control" style="width: 50%;margin-bottom: 10px;">Вопрос</textarea>

                    <div class="container option">
                        <div class="option-validation" style="display: inline-block;">
                            <input name="unique" type="radio">
                        </div>

                        <div class="nine columns option-content" style="display: inline-block;">
                            <textarea class="form-control" style="width: 250%;">Ответ</textarea>
                        </div>

                        <div class="two columns" style="display: inline-block;">
                            <a href="#" class="button tiny remove btn btn-danger" style="margin-left: 175%;margin-top: -35%;height: 53px;line-height: 38px;">Удалить вариант</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="nine columns">
                        <a href="#" class="button tiny add btn btn-success" style="margin-left: 46px;">Добавить вариант</a>
                    </div>
                    <div class="three columns alignright">
                        <a href="#" class="button delete btn btn-danger" style="margin-top: 10px;margin-left: 50%;">Удалить вопрос</a>
                    </div>
                </div>
                <hr>

            </div>

            <div class="quiz-checkboxes template question" style="display: none">
                <div class="twelve columns question-content">
                    <textarea class="input form-control" style="width: 50%;margin-bottom: 10px;">Вопрос</textarea>

                    <div class="container option">
                        <div class="one columns option-validation" style="display: inline-block;">
                            <input type="checkbox">
                        </div>
                        <div class="nine columns option-content" style="display: inline-block;">
                            <textarea class="form-control" style="width: 250%;">Ответ</textarea>
                        </div>
                        <div class="two columns" style="display: inline-block;">
                            <a href="#" class="button tiny remove btn btn-danger" style="margin-left: 175%;margin-top: -35%;height: 53px;line-height: 38px;">Удалить вариант</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="nine columns">
                        <a href="#" class="button tiny add btn btn-success" style="margin-left: 46px;">Добавить вариант</a>
                    </div>
                    <div class="three columns alignright">
                        <a href="#" class="button delete btn btn-danger" style="margin-top: 10px;margin-left: 50%;">Удалить вопрос</a>
                    </div>
                </div>

                <hr>
            </div>
        </div>


        {!! Form::submit(trans('front/form.send')) !!}
        {!! Form::close() !!}
    </div>

    <h3>Предпросмотр</h3>




@stop

@section('scripts')
    {!! HTML::script('js/jquery.quizbuilder.js') !!}
@stop

