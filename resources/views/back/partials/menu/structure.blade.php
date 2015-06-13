<li {!! Request::is('content/*') || Request::is('specialty/*') || Request::is('specializations/*') || Request::is('groups/*') || Request::is('groups')? 'class="active"' : '' !!}>
    <a href="#" data-toggle="collapse" data-target="#content_list"><span class="fa fa-fw fa-file"></span> {{ trans('back/admin.content') }} <span class="fa fa-fw fa-caret-down"></span></a>
    <ul id="content_list" class="collapse">
        <li><a href="{!! url('content/specialty') !!}">{{ trans('back/admin.specialty') }}</a></li>
        <li><a href="{!! url('content/specializations') !!}">{{ trans('back/admin.specializations') }}</a></li>
        <li><a href="{!! url('groups') !!}">{{ trans('back/admin.groups') }}</a></li>
    </ul>
</li>