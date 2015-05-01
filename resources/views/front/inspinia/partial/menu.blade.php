
<nav class="navbar-default navbar-static-side" role="navigation">
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
      <li></li>

      <li class="divider"></li>
      <li>{!! link_to('auth/logout', trans('front/site.logout')) !!}</li>
    </ul>
  </div>
  <div class="logo-element"><img width="50" src="/img/logo_icon.png"></div>
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

  @if(count($spec->objects) != 0)
  <span class="fa arrow"></span>
   @endif
  </a>

  @if(count($spec->objects) != 0)
  <ul class="nav nav-second-level">
           @foreach($spec->objects as $object)
              <li {!! Request::is('/objects/show/{{$object->name}}') ? 'class="active"' : '' !!}><a href="/objects/show/{{$object->name}}">{{$object->name}}</a></li>
           @endforeach
  </ul>

  @endif

</li>
@endforeach




</ul>
</div>
</nav>