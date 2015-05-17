@extends('front.inspinia.template')
@section('main')
    <div class="wrapper wrapper-content">
        <div class="col-lg-12 animated fadeInRight">
            <div class="mail-box-header">

                <form method="get" action="" class="pull-right mail-search">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm" name="search" placeholder="Поиск новостей">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-sm btn-primary">
                                Поиск
                            </button>
                        </div>
                    </div>
                </form>
                <h2>
                    Новости ({{count($posts)}})
                </h2>

            </div>
            <div class="mail-box">

                <table class="table table-hover table-mail">
                    <tbody>
                    @foreach($posts as $post)
                        <tr class="unread">
                            <td class="check-mail">
                                {{$post->id}}
                            </td>
                            <td class="mail-ontact"><a href="#">{{ $post->user->username }}</a></td>
                            <td class="mail-subject"><a class="news-href"
                                                        href="/blog/{{$post->slug}}">{{ $post->title }}</a></td>
                            <td class=""></td>
                            <td class="text-right mail-date">{!! $post->created_at . ($post->created_at !=
                                $post->updated_at ? trans('front/blog.updated') . $post->updated_at : '') !!}
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInUp">
        <ul class="notes">
            <li>
                <div>
                    <small>12:03:28 12-04-2015</small>
                    <h4>Записка от преподователя</h4>

                    <p>Пожалуйста сдайте отчеты и первые процентовки во время</p>
                    <a href="#"><i class="fa fa-trash-o "></i></a>
                </div>
            </li>

        </ul>
    </div>
@stop

@if(session()->has('ok'))

    <script>
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 5000
            };
            toastr.info('Удачного дня и успешного обучения!');

        }, 1300);
    </script>


@endif



