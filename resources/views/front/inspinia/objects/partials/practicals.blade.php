<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Практический раздел<span class="label label-warning-light" style="float: right;">{{count($object->practicals)}}</span></h5>
        <div class="ibox-tools">
            <a class="slide-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="collapse-link">
                <i class="fa fa-chevron-left"></i>

            </a>


        </div>
    </div>
    <div class="ibox-content">
        <div>
            <div class="feed-activity-list">
                <?php $i = 1?>
                <?php $group = DB::table('groups')->where('id', $user->groups_id)->pluck('slug')?>

                @foreach($object->practicals as $lection)


                        @if($i <= 5)
                            <div class="feed-element">
                        @else
                            <div class="feed-element" id="dn">
                        @endif

                        <a href="/umc/public/{{$object -> specialty[0] -> slug}}/{{$group}}/{{$object->slug}}/practical/{{$lection->slug}}" class="pull-left">
                            <div class="randomize-box">{{$i}}</div>
                        </a>
                        <div class="media-body" style="  margin-top: 6px;">
                            <a href="/umc/public/{{$object -> specialty[0] -> slug}}/{{$group}}/{{$object->slug}}/practical/{{$lection->slug}}">  <strong>{{$lection->title}}</strong></a>
                        </div>
                    </div>
                    <?php $i++;?>
                @endforeach



            </div>
            @if(count($object->practicals) > 5)
                <button class="btn btn-primary btn-block m-t" id="practical-show"><i class="fa fa-arrow-down"></i> Далее</button>
            @endif
        </div>

    </div>
</div>
         