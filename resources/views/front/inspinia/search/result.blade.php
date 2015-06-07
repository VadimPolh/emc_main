@if (count($result) > 0)

    <h2 class="search-title">
        {{count($result)}} найдено по запросу <span class="text-navy">“{{$keywords}}”</span>
    </h2>


    @foreach($result as $item)

        <div class="hr-line-dashed"></div>

        <div class="search-result">
            <h3><a href="#">{{$item->title}}</a></h3>
            <a href="/{{$specialty->slug}}/{{$user->group->slug}}/ " class="search-link">/{{$specialty->slug}}/{{$user->group->slug}}/{{$item->slug}}</a>
            <p>
              {{ str_limit($item->summary, $limit = 100, $end = '...') }}
            </p>
        </div>

    @endforeach

    @else

    <h2 class="search-title">
       Извините ничего не найдено.
    </h2>


@endif