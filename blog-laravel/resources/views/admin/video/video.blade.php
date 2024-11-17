@extends('layouts.admin')
@section('breadcrumb')
    <ol class="breadcrumb mb-2">
        <li class="breadcrumb-item"><a href="{{route('admin.home',app()->getLocale())}}"><i class="icon-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.videos',app()->getLocale())}}">{{__('Videos')}}</a></li>
    </ol>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admin/dist/css/summernote.css')}}"/>
    <style>
        .fb-video{
            max-height: 500px!important;
            width: auto;
        }
    </style>
@endsection
@section('content')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0" nonce="u9Ssiwax"></script>

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        <a href="{{route('admin.videos',app()->getLocale())}}" class="btn btn-xs btn-link"><h3><i class="fa fa-arrow-left"></i> {{__('Videos')}}</h3></a>
                        <a href="{{route('admin.video-create',app()->getLocale())}}" class="btn btn-primary">{{__('Add new')}} <i class="fas fa-plus"></i></a>
                    @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <h4 class="card-title mb-3">{{$video->title}}</h4>
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <input hidden id="url_type" name="url_type" value="{{$video->url_type}}">
                        <input hidden id="url_link" name="link" value="{{$video->link}}">
                        <div class="form-group row">
                            <label for="video-link" class="col-sm-2 col-form-label">{{__('Video Link')}}</label>
                            <div class="col-sm-10">
                                <input id="video-link" name="name" type="text" class="form-control" value="{{$video->link}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10" id="video-frame">
                                <div id="fb_vid" style="{{$video->url_type == 'iframe'?'display: none':''}}" class="fb-video" data-href="{{$video->link}}" data-show-text="false" data-width="auto"></div>
                                <iframe id="you_vid" style="{{$video->url_type == 'facebook'?'display: none':''}}" width="727" height="409" src="{{$video->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-sm-2 col-form-label">{{__('Slug')}}</label>
                            <div class="col-sm-10">
                                <input id="slug" name="slug" type="text" class="form-control" value="{{$video->slug}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">{{__('Status')}}</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <option <?php if($video->status) echo 'selected' ?> value="1">{{__('Published')}}</option>
                                    <option <?php if(!$video->status) echo 'selected' ?> value="0">{{__('Not Published')}}</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="upd_id" value="{{$video->id}}">
                        <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
                            <li class="nav-item">
                                <a href="#home-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                    <span class="d-lg-block">{{__('Russian')}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile-b2" data-toggle="tab" aria-expanded="true" class="nav-link">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-lg-block">{{__('English')}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#settings-b2" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                    <span class="d-lg-block">{{__('Armenian')}}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="home-b2">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">{{__('Title')}}</label>
                                    <div class="col-sm-10">
                                        <input id="title" name="title_ru" type="text" class="form-control" value="{{isset($video->translations['title']['ru'])?$video->translations['title']['ru']:''}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="content" class="col-sm-2 col-form-label">{{__('Content')}}</label>
                                    <div class="col-sm-10">
                                        <textarea id="content" name="content_ru" class="summernote">{{isset($video->translations['content']['ru'])?$video->translations['content']['ru']:''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane show" id="profile-b2">
                                <div class="form-group row">
                                    <label for="title_en" class="col-sm-2 col-form-label">{{__('Title')}}</label>
                                    <div class="col-sm-10">
                                        <input id="title_en" name="title_en" type="text" class="form-control" value="{{isset($video->translations['title']['en'])?$video->translations['title']['en']:''}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="content" class="col-sm-2 col-form-label">{{__('Content')}}</label>
                                    <div class="col-sm-10">
                                        <textarea id="content" name="content_en" class="summernote">{{isset($video->translations['content']['en'])?$video->translations['content']['en']:''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active" id="settings-b2">
                                <div class="form-group row">
                                    <label for="title_am" class="col-sm-2 col-form-label">{{__('Title')}}</label>
                                    <div class="col-sm-10">
                                        <input id="title_am" name="title_am" type="text" class="form-control" value="{{isset($video->translations['title']['am'])?$video->translations['title']['am']:''}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="content" class="col-sm-2 col-form-label">{{__('Content')}}</label>
                                    <div class="col-sm-10">
                                        <textarea id="content" name="content_am" class="summernote">{{isset($video->translations['content']['am'])?$video->translations['content']['am']:''}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div> <!-- end card-body-->
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{asset('admin/dist/js/summernote.js')}}"></script>
    @if(app()->getLocale() == 'ru')
        <script src="{{asset('admin/dist/js/lang/summernote-ru-RU.js')}}"></script>
    @endif
    <script>
        $(function() {
            $('.summernote').summernote({
                height: 300,
                focus: true,
                @if(app()->getLocale() == 'ru')
                lang: 'ru-RU',
                @endif
                onpaste: function() {
                    alert('You have pasted something to the editor');
                }
            });
        });
    </script>
    <script>
      function createVideo(a) {
        var b, c = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/,
            d = a.match(c),
            e = /(?:www\.|\/\/)instagram\.com\/p\/(.[a-zA-Z0-9_-]*)/,
            f = a.match(e),
            g = /\/\/vine\.co\/v\/([a-zA-Z0-9]+)/,
            h = a.match(g),
            i = /\/\/(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/,
            j = a.match(i),
            k = /.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/,
            l = a.match(k),
            m = /\/\/v\.youku\.com\/v_show\/id_(\w+)=*\.html/,
            n = a.match(m),
            o = /^.+.(mp4|m4v)$/,
            p = a.match(o),
            q = /^.+.(ogg|ogv)$/,
            r = a.match(q),
            s = /^.+.(webm)$/,
            t = a.match(s);
        if (d && 11 === d[1].length) {
          var u = d[1];
          b = $("#you_vid").attr("frameborder", 0).attr("src", "//www.youtube.com/embed/" + u).attr("width", "640").attr("height", "360")
        } else if (f && f[0].length) b = $("<iframe>").attr("src", "https://instagram.com/p/" + f[1] + "/embed/").attr("width", "612").attr("height", "710").attr("scrolling", "no").attr("allowtransparency", "true");
        else if (h && h[0].length) b = $("<iframe>").attr("frameborder", 0).attr("src", h[0] + "/embed/simple").attr("width", "600").attr("height", "600").attr("class", "vine-embed");
        else if (j && j[3].length) b = $("<iframe webkitallowfullscreen mozallowfullscreen allowfullscreen>").attr("frameborder", 0).attr("src", "//player.vimeo.com/video/" + j[3]).attr("width", "640").attr("height", "360");
        else if (l && l[2].length) b = $("<iframe>").attr("frameborder", 0).attr("src", "//www.dailymotion.com/embed/video/" + l[2]).attr("width", "640").attr("height", "360");
        else if (n && n[1].length) b = $("<iframe webkitallowfullscreen mozallowfullscreen allowfullscreen>").attr("frameborder", 0).attr("height", "498").attr("width", "510").attr("src", "//player.youku.com/embed/" + n[1]);
        else {
          if (!(p || r || t)) return !1;
          b = $("<video controls>").attr("src", a).attr("width", "640").attr("height", "360")
        }
        return b.addClass("note-video-clip"), b[0]
      }
    </script>
    <script>
        var slug = function(str) {
            var $slug = '';
            var trimmed = $.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        }
        $("#title_am").keyup(function(){
            var text = $(this).val();
            $("#slug").val(url_slug(text));
        });
        $("#video-link").keyup(function() {
          var text = $(this).val();
          if (text.includes('https://www.facebook.com/', 0)) {
            $("#you_vid").hide();
            $("#fb_vid").show();
            $("#fb_vid").attr('data-href', text);
            $("#url_type").val('facebook');
            $("#url_link").val(text);
            FB.XFBML.parse(document.getElementById('video-frame'))
          } else {
            $("#fb_vid").hide();
            $("#you_vid").show();
            createVideo(text);
            $("#url_type").val('iframe');
            $("#url_link").val($("#you_vid").attr('src'));
          }
        });
    </script>
@endsection
