    @extends('back.template')

    @section('main')





        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Справочный материал по Административному разделу
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <span class="fa fa-user"></span> Справка
                    </li>
                </ol>
            </div>
        </div>




        <div class="container form-group">
            <div class="row">


                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Как добавить пользователя.
                </a>
                <br>
                <div class="collapse" id="collapseExample">
                    <div class="well">
                        Раздел "пользователи" в правом меню административной панели содержит 3 подраздела. "Просмотр, добовление и роли"
                    </div>
                </div>

            </div>
        </div>



    <div class="container form-group">
    <div class="row">


        <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
            Как добавить специальность.
        </a>
        <br>
        <div class="collapse" id="collapseExample1">
            <div class="well">
                Сущность специальности находится в информационном разделе "Структура" расположенной в левой колонке административного раздела.
            </div>
        </div>

    </div>
    </div>

        <div class="container form-group">
            <div class="row">


                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                    Как добавить специализацию.
                </a>
                <br>
                <div class="collapse" id="collapseExample2">
                    <div class="well">
                        ...
                    </div>
                </div>

            </div>
        </div>
        <div class="container form-group">
            <div class="row">


                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
                    Как добавить группу.
                </a>
                <br>
                <div class="collapse" id="collapseExample3">
                    <div class="well">
                        ...
                    </div>
                </div>

            </div>
        </div>
        <div class="container form-group">
            <div class="row">


                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4">
                    Как добавить предмет.
                </a>
                <br>
                <div class="collapse" id="collapseExample4">
                    <div class="well">
                        ...
                    </div>
                </div>

            </div>
        </div>
        <div class="container form-group">
            <div class="row">


                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample5" aria-expanded="false" aria-controls="collapseExample5">
                    Как добавить материал.
                </a>
                <br>
                <div class="collapse" id="collapseExample5">
                    <div class="well">
                        ...
                    </div>
                </div>

            </div>
        </div>



    @stop