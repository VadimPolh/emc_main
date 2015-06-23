<div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Контроль знаний<span class="label label-warning-light" style="float: right;"></span></h5>
           <div class="ibox-tools">
             <a class="slide-link">  
             <i class="fa fa-chevron-up"></i>
             </a>   
             <a class="collapse-link">
                    <i class="fa fa-chevron-left"></i>
                  
                </a>
             
             
            </div>
        </div>
  @if (count($object->tests))
    <div class="ibox-content ibox-heading">
             <h3>Доступен новый тест</h3>
      <small><i class="fa fa-map-marker"></i> Тема: {{$object->tests[0]->name}}</small>
    </div>
    @endif
        <div class="ibox-content">
          <div>
                <div class="feed-activity-list">
                    <?php $i = 1?>
                        <?php $group = DB::table('groups')->where('id', $user->groups_id)->pluck('slug')?>

                        @foreach($object->tests as $test)
                            <div class="feed-element">
                                <a href="/umc/public/{{$object -> specialty[0] -> slug}}/{{$group}}/{{$object->slug}}/test/{{$test->slug}}" class="pull-left">
                                    <div class="randomize-box">{{$i}}</div>
                                </a>
                                <div class="media-body" style="  margin-top: 6px;">
                                    <a href="/umc/public/{{$object -> specialty[0] -> slug}}/{{$group}}/{{$object->slug}}/test/{{$test->slug}}">  <strong>{{$test->name}}</strong></a>
                                </div>
                            </div>


                            <?php $i++;?>
                        @endforeach



                </div>



            </div>

        </div>
          </div>