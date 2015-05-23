<div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Контроль знаний<span class="label label-warning-light" style="float: right;">{{count($object->tests)}}</span></h5>
           <div class="ibox-tools">
             <a class="slide-link">  
             <i class="fa fa-chevron-up"></i>
             </a>   
             <a class="collapse-link">
                    <i class="fa fa-chevron-left"></i>
                  
                </a>
             
             
            </div>
        </div>
  <div class="ibox-content ibox-heading">
                                    <h3>Доступен новый тест</h3>
                                    <small><i class="fa fa-map-marker"></i> Тема:..... Успешного прохождения!</small>
                                </div>
        <div class="ibox-content">
          <div>
                <div class="feed-activity-list">
                    <?php $i = 1?>
                        <?php $group = DB::table('groups')->where('id', $user->groups_id)->pluck('slug')?>
                   




                </div>

                <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Далее</button>

            </div>

        </div>
          </div>