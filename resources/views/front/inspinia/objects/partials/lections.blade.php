<div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Теоретический раздел<span class="label label-warning-light" style="float: right;">{{count($object->lection)}}</span></h5>
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
                    @foreach($object->lection as $lection)


                            <div class="feed-element">
                        <a href="/{{$object -> specialty[0] -> slug}}/{{$group}}/{{$object->slug}}/lection/{{$lection->slug}}" class="pull-left">
                            <div class="randomize-box">{{$i}}</div>
                        </a>
                        <div class="media-body" style="  margin-top: 6px;">
                            <a href="/{{$object -> specialty[0] -> slug}}/{{$group}}/{{$object->slug}}/lection/{{$lection->slug}}">  <strong>{{$lection->title}}</strong></a>
                        </div>
                        </div>
                        <?php $i++;?>
                    @endforeach





                </div>

                <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Далее</button>

            </div>

        </div>
  
</div>