<nav class="navbar-default navbar-static-side" role="navigation" xmlns:Request="http://www.w3.org/1999/xhtml">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
    <span>
      @if(Gravatar::exists($user->email))
            <img alt="image" class="img-circle" src="{!!Gravatar::get($user->email)!!}" width="49">
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
                        <li>{!! link_to_route('home', trans('front/site.home')) !!}</li>
                        <li></li>
                        @if(session('statut') == 'admin')
                            <li>
                                {!! link_to_route('admin', trans('front/site.administration')) !!}
                            </li>
                        @endif
                        <li><a href="#" class="about-profile">Информация</a></li>

                        <li class="divider"></li>
                        <li>{!! link_to('auth/logout', trans('front/site.logout')) !!}</li>
                    </ul>
                </div>
                <div class="logo-element"><img width="50" src="/umc/public/img/logo_icon.png"></div>
            </li>

            @foreach ($specialty as $spec)
              @if(session('statut') != 'admin')
                    @if($user->group->specialty->slug == $spec->slug)
                    <li class="active">
                        <a href="">
                            @if($spec->icon_class)
                                <i class="fa {{$spec->icon_class}}"></i>
                            @endif

                            @if($spec->short_name)
                                <span class="nav-label">{{$spec->short_name}}</span>
                            @else
                                <span class="nav-label">{{$spec->name}}</span>
                            @endif

                            @if(count($spec->objects) != 0)
                                <span class="fa arrow"></span>
                            @endif
                        </a>

                        @if(count($spec->objects) != 0)
                            <ul class="nav nav-second-level">
                                @foreach($spec->objects as $object)
                                    <?php $group = DB::table('groups')->where('id', $user->groups_id)->pluck('slug')?>
                                    <li {!! Request::is("/umc/public/$spec->slug/$group/$object->slug") || Request::is("/umc/public/$spec->slug/$group/$object->slug/*") ? 'class="active current-child"' : '' !!}>
                                        <a href="/umc/public/{{$spec->slug}}/{{$group}}/{{$object->slug}}">{{$object->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    @endif
              @else

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

                            @if(count($spec->objects) != 0)
                                <span class="fa arrow"></span>
                            @endif
                        </a>

                        @if(count($spec->objects) != 0)
                            <ul class="nav nav-second-level">
                                @foreach($spec->objects as $object)
                                    <?php $group = DB::table('groups')->where('id', $user->groups_id)->pluck('slug')?>
                                    <li {!! Request::is("$spec->slug/$group/$object->slug") || Request::is("$spec->slug/$group/$object->slug/*") ? 'class="active current-child"' : '' !!}>
                                        <a href="/umc/public/{{$spec->slug}}/{{$group}}/{{$object->slug}}">{{$object->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>

              @endif


            @endforeach

        @if(session('statut') == 'admin')
            <li>
                <center>
                    <a href="#"><i class="fa fa-plus"></i>
                        <span class="nav-label">Добавить</span>
                    </a>
                </center>
            </li>

            @endif


            </ul>
    </div>
</nav>