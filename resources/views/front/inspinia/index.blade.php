@extends('front.inspinia.template')


@section('main')

 <div id="wrapper">
  <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
              <ul class="nav" id="side-menu">
              <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                         	@if(Gravatar::exists($user->email)) 
                           <img alt="image" class="img-circle" src="{!!Gravatar::get($user->email)!!}" width="53">
                          @else
                          <img alt="image" class="img-circle" src="">
                          @endif
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="">
                            <span class="clear"> <span class="block m-t-xs"> 
                              <strong class="font-bold">David Williams</strong>
                             
                             </span> 
                              <span class="text-muted text-xs block">Art Director 
                                <b class="caret"></b>
                              </span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li class="divider"></li>
                                <li>{!! link_to('auth/logout', trans('front/site.logout')) !!}</li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
              
              
              </ul>
    </div>
   </nav>
</div>





@stop




@section('scripts')

{!! HTML::script('inspinia/js/plugins/pace/pace.min.js') !!}
@stop


