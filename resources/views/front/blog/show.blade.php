<div class="col-lg-12 animated fadeInRight">
            <div class="mail-box-header">
                <div class="pull-right tooltip-demo">
                    <a href="/" class="btn btn-white btn-sm to-main" data-toggle="tooltip" data-placement="top" title="Вернутся назад"><i class="fa fa-reply"></i> Вернутся назад</a>
                    <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Распечатать"><i class="fa fa-print"></i> </a>
                   
                </div>
                <h2>
                    {{ $post->title }}
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">                   
                    <h5>
                        <span class="pull-right font-noraml">{!! $post->created_at . ($post->created_at != $post->updated_at ? trans('front/blog.updated') . $post->updated_at : '') !!}</span>
                        <span class="font-noraml">От: </span>{{ $post->user->username }}
                    </h5>
                </div>
            </div>
                <div class="mail-box">


                <div class="mail-body">
                    <p>{!! $post->content !!}</p>
                </div>
                   
            </div>
        </div>
