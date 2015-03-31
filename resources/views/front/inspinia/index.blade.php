@if(!Request::ajax())

@extends('front.inspinia.template')
@section('main')
<div id="wrapper">
  <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav" id="side-menu">
        <li class="nav-header">
          <div class="dropdown profile-element">
            <span>
              @if(Gravatar::exists($user->email))
              <img alt="image" class="img-circle" src="{!!Gravatar::get($user->
              email)!!}" width="49">
                          @else
              <img alt="image" class="img-circle" src="http://www.lok-datenbank.de/imgs/user/unknown.png" width="49">
              @endif</span>
            <a data-toggle="dropdown" class="dropdown-toggle" href="">
              <span class="clear">
                <span class="block m-t-xs"> <strong class="font-bold">
                  {{$user->username}}
                  </strong>

                </span>

                <span class="text-muted text-xs block">
                  {{ $user->role->title }} <b class="caret"></b>
                </span>
              </span>
            </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
              <li></li>
              <li></li>
              @if(session('statut') == 'admin')
              <li>
                {!! link_to_route('admin', trans('front/site.administration')) !!}
              </li>
              @endif
              <li></li>

              <li class="divider"></li>
              <li>{!! link_to('auth/logout', trans('front/site.logout')) !!}</li>
            </ul>
          </div>
          <div class="logo-element">IN+</div>
        </li>
        @foreach ($specialty as $spec)
        <li>
         <a href="">
         @if($spec->icon_class)
          <i class="fa {{$spec->icon_class}}"></i>
         @endif  
           @if($spec->short_name)
          <span class="nav-label">{{$spec->short_name}}</span> 
          @else
           <span class="nav-label">{{$spec->name}}</span> 
          @endif
         </a>
        </li>
        @endforeach


        

      </ul>
    </div>
  </nav>


<div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v1.9.2/search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Поиск..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">КОЛЛЕДЖ БИЗНЕСА И ПРАВА</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="http://webapplayers.com/inspinia_admin-v1.9.2/#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">0</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                    <li>Новые уведомления отсуствуют</li>
                    </ul>
                </li>


                <li>
                    <a href="/auth/logout">
                        <i class="fa fa-sign-out"></i> Выход
                    </a>
                </li>
            </ul>





      </nav>
      </div>


<div class="wrapper wrapper-content">

<div class="col-lg-12 animated fadeInRight">
            <div class="mail-box-header">

                <form method="get" action="index.html" class="pull-right mail-search">
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
                    <td class="mail-subject"><a class="news-href" href="/blog/{{$post->slug}}">{{ $post->title }}</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">{!! $post->created_at . ($post->created_at != $post->updated_at ? trans('front/blog.updated') . $post->updated_at : '') !!}</td>
                </tr>
               @endforeach
             
               
             
                
               
               
               
                
              
                
               
               
                
               
                </tbody>
                </table>


                </div>
            </div>
          </div>




    </div>

</div>
@stop




@section('head')
{!! HTML::style('inspinia/css/plugins/toastr/toastr.min.css') !!}
@stop

@section('scripts')
{!! HTML::script('inspinia/js/script.js') !!}
{!! HTML::script('inspinia/js/plugins/pace/pace.min.js') !!}
{!! HTML::script('inspinia/js/plugins/toastr/toastr.min.js') !!}
{!! HTML::script('inspinia/js/plugins/metis-menu/jquery.metisMenu.js') !!}

 
@stop


@else

<div class="col-lg-12 animated fadeInRight">
            <div class="mail-box-header">

                <form method="get" action="index.html" class="pull-right mail-search">
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
                    <td class="mail-subject"><a class="news-href" href="/blog/{{$post->slug}}">{{ $post->title }}</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">{!! $post->created_at . ($post->created_at != $post->updated_at ? trans('front/blog.updated') . $post->updated_at : '') !!}</td>
                </tr>
               @endforeach
             
               
             
                
               
               
               
                
              
                
               
               
                
               
                </tbody>
                </table>


                </div>
            </div>
     


@endif
