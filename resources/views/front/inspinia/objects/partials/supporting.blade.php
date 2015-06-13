<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Вспомогательный раздел<span class="label label-warning-light" style="float: right;">{{count($object->supporting)}}</span></h5>
        <div class="ibox-tools">
            <a class="slide-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="collapse-link">
                <i class="fa fa-chevron-left"></i>

            </a>


        </div>
    </div>
    @if(count($object->supporting) != 0)
        <div class="ibox-content">
            <div>
                <div class="feed-activity-list">
                    <?php $i = 1?>
                    <?php $group = DB::table('groups')->where('id', $user->groups_id)->pluck('slug')?>





                </div>
                @if(count($object->supporting) > 5)
                    <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Далее</button>
                @endif
            </div>

        </div>

    @endif

</div>