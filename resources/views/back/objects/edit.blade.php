@extends('back.template')

@section('main')


@include('back.partials.entete', ['title' => trans('back/objects.dashboard'), 'icone' => 'user', 'fil' => link_to('objects', trans('back/objects.Users')) . ' / ' . trans('back/objects.edition')])



<div class="col-sm-12">
	{!! Form::model($object, ['route' => ['objects.update', $object->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
    {!! Form::control('text', 0, 'name', $errors, trans('back/objects.name')) !!}
  	{!! Form::selection('specialty_id', $select, null, trans('back/objects.specialty')) !!}
    {!! Form::selection('user_id', $select_user, null, trans('back/objects.user')) !!} <a href="#" id="double_teacher">+ Добавить преподователя</a>
    <div class="dt" style="display: none;">
        {!! Form::selection('double_user_id', $select_user, null, trans('back/objects.double_user')) !!}
    </div>
    {!! Form::control('textarea', 0, 'description', $errors, trans('back/objects.description')) !!}
		
  {!! Form::submit(trans('front/form.send')) !!}
  {!! Form::close() !!}
</div>

<br>

<div class="container col-sm-12" ng-app="todoApp" ng-controller="todoController">
    <h3>Темы</h3>
    <div class="row">
        <div class="col-md-12">
            <input type='text' ng-model="todo.name">
            <button class="btn btn-primary btn-md"  ng-click="addTodo()">Добавить</button>
            <i ng-show="loading" class="fa fa-spinner fa-spin"></i>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <tr ng-repeat='todo in todos'>
                    <td>[<%$index + 1%>] <% todo.name %></td>
                    <td><button class="btn btn-danger btn-xs" ng-click="deleteTodo($index)">  <span class="glyphicon glyphicon-trash" ></span></button></td>
                </tr>
            </table>
        </div>
    </div>
</div>

@stop


@section('scripts')

    {!! HTML::script('ckeditor/ckeditor.js') !!}
    {!! HTML::script('https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.min.js') !!}





    <script>var app = angular.module('todoApp', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
	        $interpolateProvider.endSymbol('%>');
        });

        app.controller('todoController', function($scope, $http) {

            $scope.todos = [];
            $scope.loading = false;

            $scope.init = function() {
                $scope.loading = true;
                $http.get('/umc/public/api/topics').
                        success(function(data, status, headers, config) {
                            $scope.todos = data;
                            $scope.loading = false;

                        });
            };

            $scope.addTodo = function() {
                $scope.loading = true;

                $http.post('/umc/public/api/topics', {
                    name: $scope.todo.name,
                    objects_id: {{$object->id}},
                    _token: $('meta[name=_token]').attr('content'),
                    done: $scope.todo.done
                }).success(function(data, status, headers, config) {
                    $scope.todos.push($scope.todo);
                    $scope.todo = '';
                    $scope.loading = false;

                });
            };

            $scope.updateTodo = function(todo) {
                $scope.loading = true;

                $http.put('/umc/public/api/topics/' + todo.id, {
                    title: todo.title,
                    done: todo.done
                }).success(function(data, status, headers, config) {
                    todo = data;
                    $scope.loading = false;

                });
            };

            $scope.deleteTodo = function(index) {
                $scope.loading = true;

                var todo = $scope.todos[index];

                $http.delete('/umc/public/api/topics/' + todo.id)
                        .success(function() {
                            $scope.todos.splice(index, 1);
                            $scope.loading = false;

                        });
            };


            $scope.init();

        });

        //добовление второго преподователя
        
        $('#double_teacher').on('click',function(event){
            event.preventDefault();
            $(this).hide();
            $('.dt').show();

        });

    </script>












    <script>

        var config = {
            codeSnippet_theme: 'kama',
            language: '{{ config('app.locale') }}',
            height: 600,
            filebrowserBrowseUrl: '{!! url($url) !!}',
            toolbarGroups: [
                { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others' },
                //'/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                { name: 'styles' },
                { name: 'colors' }
            ]
        };

        CKEDITOR.replace( 'description', config);





    </script>

@stop