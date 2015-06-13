<li {!!
    Request::is('lection/*') ||
    Request::is('lection') ||
    Request::is('practical/*') ||
    Request::is('practical') ||
    Request::is('tests/*') ||
    Request::is('tests')
    ? 'class="active"' : '' !!}>
<a href="#" data-toggle="collapse" data-target="#material_list"><span
            class="fa fa-fw fa-file"></span> {{ trans('back/admin.material') }} <span
            class="fa fa-fw fa-caret-down"></span></a>
<ul id="material_list" class="collapse">
    <li {!! Request::is(
    'lection/*') || Request::is('lection') ? 'class="active"' : '' !!}>
    <a href="{!! url('lection') !!}"><span class="fa fa-file-text"></span> &nbsp {{ trans('back/admin.lection') }}</a>
    </li>

    <li {!! Request::is(
    'practical/*') || Request::is('practical') ? 'class="active"' : '' !!}><a href="{!! url('practical') !!}"><span class="fa fa-file-text"></span>
            &nbsp {{ trans('back/admin.practical') }}</a></li>
    <li {!! Request::is(
    'lection/*') || Request::is('lection') ? 'class="active"' : '' !!}>
    <a href="#" data-toggle="collapse" data-target="#test_list"><span
                class="fa fa-fw fa-file"></span> {{ trans('back/admin.tests') }} <span
                class="fa fa-fw fa-caret-down"></span></a>
    <ul id="test_list" class="collapse">
        <li><a class="rdlevel" href="{!! url('tests') !!}"><span class="fa fa-file-text"></span>
                &nbsp {{ trans('back/admin.test') }}</a>
    </ul>
    </li>

    <li><a href="{!! url('supporting') !!}"><span class="fa fa-file-text"></span>
            &nbsp {{ trans('back/admin.supporting') }}</a></li>
</ul>
</li>