@extends('.layout.main-layout')
@section('content')
@if(session('nologin'))
  <script>
    var cf = confirm("{{session('nologin')}} \nbạn hãy đăng nhập để có thể trải nghiệm tốt hơn")
    if(cf){
      location.href = '/login'
    }
  </script>
@endif
@if(App\Http\Controllers\CookieController::checklayout('url'))
  @if(App\Http\Controllers\CookieController::get('url') != "/details/$id")
    @php 
      App\Http\Controllers\PostController::view($id);
    @endphp
  @endif
@else  
  @php  
    App\Http\Controllers\PostController::view($id);
  @endphp
@endif
@php
    App\Http\Controllers\CookieController::set('url',"/details/$id");
@endphp
@php  
  $contents = preg_split('/\n|\r\n?/', $detail['content']);
  $count =0;
@endphp
    <div class="container my-4 position-relative">
      
        <div class="row">
          <div class="col-md-1 ">
            <div class="d-flex flex-column g50 ic" >
              <i class="fa-brands fa-facebook"></i>
              <i class="fa-brands fa-twitter"></i>
              <i class="fa-solid fa-comment"></i>
              <i class="fa-solid fa-print"></i>
              <i class="fa-brands fa-youtube"></i>
              <i class="fa-brands fa-instagram"></i>
            </div>
          </div>
            <div class="col-md-7 ">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <a href="" class="ts">Thời sự</a>
                </div>
                <h2>{{$post['name']}}</h2>
                <div class="nd">
                    <p>{{$post['shortDescription']}}</p>
                </div>
                <div class="mb-2">
                    <img src="{{$post['rootImage']}}" class="img-fluid w-100 mb-2" alt="">
                    <span></span>
                </div>
                <div class="nd">
                @foreach($contents as $content)
                  <p>{{$content}}</p>
                  @php 
                    $count =$count+1;
                    $t = floor(count($contents)/(count($images)+1));
                  @endphp
                  @if($count%($t+1) == 0)
                    @if(!empty($images))
                      </div>
                      <div class="mb-2">
                          <img src="{{$images[$count/($t+1)-1]['link']}}" class="img-fluid w-100 mb-2" alt="">
                          <span>{{$images[$count/($t+1)-1]['title']}}</span>
                      </div>
                      <div class='nd'>
                    @endif
                  @endif
                @endforeach
                </div>
            </div>
            <div class="col-md-4   ">
                <img src="https://scr.vn/wp-content/uploads/2020/07/H%C3%ACnh-T%E1%BA%BFt-h%C3%A0i-vui-g%E1%BB%ADi-s%E1%BA%BFp.jpg" class="img-fluid w-100" alt="">
               <div class="clct my-3 w350 bt">
                <h3>Xem nhiều</h3>
                  @php  
                    $view_posts = App\Http\Controllers\PostController::view_post($id);
                    $view_posts_arr = $view_posts->toArray();
                    $rootImage_view_post_1 = $view_posts_arr[0]['rootImage'];
                    $id_view_post_1 = $view_posts_arr[0]['id']
                  @endphp
                <a href="/details/{{$id_view_post_1}}"><img src="{{$rootImage_view_post_1}}" class="img-fluid w-100 mb-3" alt=""></a>
               @foreach($view_posts as $view_post)
                <div class=" my-3">
                  <a href="/details/{{$view_post->id}}" class="xn" >{{$view_post->name}} </a>
                  <span><i class="fa-solid fa-comment"></i>{{ App\Http\Controllers\CommentController::CountComment($view_post->id) }}</span>
                </div>
                @endforeach
                </div>
               </div>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="row">
            <form method="post" action="/details/{{$id}}/comment" class="col-md-8">
              <h4>Đánh giá của bạn</h4>
              <div class="textare">
                <textarea name="text_cmt" placeholder="Ý kiến của bạn" class="w-100 h30 tx" id="text_cmt"></textarea>
              </div>
              <input type="hidden" name="_token"  value="<?php echo csrf_token(); ?>">
              <input type="submit" value="Bình luận" id="cmt" class="btn btn-dark">
              <div>
                    <!-- Tabs navs -->
                  <ul class="nav nav-tabs my-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                      <div class="nav-link " id="ex1-tab-1" data-mdb-toggle="tab" role="tab" aria-controls="ex1-tabs-1"
                        aria-selected="true">Ý kiến </div>
                    </li>
                  </ul>
                  <!-- Tabs navs -->
                  
                  <!-- Tabs content -->
                  <div class="tab-content" id="ex1-content">
                    <div
                      class="tab-pane fade show active"
                      id="ex1-tabs-1"
                      role="tabpanel"
                      aria-labelledby="ex1-tab-1">
                    @foreach($comments as $comment)
                      <div class="d-flex mb-4 g2">
                        @php  
                          $name = App\Http\Controllers\UserController::getName($comment->user_id);
                          $rootImage = App\Http\Controllers\UserController::rootImage($comment->user_id);
                        @endphp
                        <div style="width: 50px; height:50px;">
                            <img src="{{$rootImage}}" class="img-fluid b50" style="width: 90%; height:90%; margin:10px" alt="">
                        </div>
                        <div class="d-flex flex-column justify-content-between" id="cmt{{$comment->id}}">
                            <div>
                                <strong>{{$name}}</strong><br>
                                <span>{{$comment->content}}</span>
                            </div>
                            <div class="d-flex g3">
                                @if(App\Http\Controllers\LikeController::check(App\Http\Controllers\CookieController::get('user'),$comment->id))
                                  <a href="/details/{{$id}}/unlike/{{$comment->id}}"><i class="fa-solid fa-thumbs-up"></i>{{ App\Http\Controllers\LikeController::Like($comment->id) }}</a>
                                @else
                                  <a href="/details/{{$id}}/like/{{$comment->id}}"><i class="fa-regular fa-thumbs-up"></i>{{ App\Http\Controllers\LikeController::Like($comment->id) }}</a>
                                @endif
                                <a href="#cmt{{$comment->id}}" class="rep btn-light" aria-label="Close" style="border: none;" idform="repcomment{{$comment->id}}">Trả lời</a>
                                @if(App\Http\Controllers\CommentController::check(App\Http\Controllers\CookieController::get('user'), $comment->id))
                                  <a href="/details/{{$id}}/deleteComment/{{$comment->id}}" class="btn-light" aria-label="Close" style="border: none;"><i class="fa-solid fa-trash"></i>Xóa</a>
                                @endif
                                <span>{{$comment->created_at}}</span>
                            </div>
                        </div>
                      </div>
                      @if(App\Http\Controllers\CookieController::checklayout('user'))
                        @php  
                          $rootImageUser = App\Http\Controllers\UserController::rootImage(App\Http\Controllers\CookieController::get('user'));
                        @endphp
                        <div id="repcomment{{$comment->id}}" class="repcmt row g-3" style="margin-left: 50px; display:none;">
                          <form action="/details/{{$id}}/comment" method="post" onsubmit="return false" >
                            <div class="col-auto" style="padding-left:0; padding-right: 0px; line-height:30px;">
                              <img src="{{$rootImageUser}}" alt="" style="width:20px; height:20px;">
                            </div>
                            <div class="col-auto">
                              <input type="text" class="form-control repcomment" name="rep_text" id="rep_text" placeholder="Ý kiến của bạn">
                              <input type="hidden" name="idcmt" value="{{$comment->id}}">
                              <input type="hidden" name="_token"  value="<?php echo csrf_token(); ?>">
                            </div>
                            <div class="col-auto">
                              <input type="submit" class="btn btn-primary mb-3 submit_cmt" value="gữi"/>
                            </div>
                          </form>
                        </div>
                      @endif
                      @php  
                        $list_rep = App\Http\Controllers\CommentController::getRepComment($comment->id);
                      @endphp
                      <div id="{{$comment->id}}">
                        @foreach($list_rep as $rep)
                        <div class="d-flex mb-4 g2" style="margin-left: 20px;">
                          @php  
                            $name = App\Http\Controllers\UserController::getName($rep->user_id);
                            $rootImage = App\Http\Controllers\UserController::rootImage($rep->user_id);
                          @endphp
                          <div style="width: 30px; height:30px;">
                              <img src="{{$rootImage}}" class="img-fluid b50" style="width: 90%; height:90%; margin:10px" alt="">
                          </div>
                          <div class="d-flex flex-column justify-content-between">
                              <div>
                                  <strong>{{$name}}</strong><br>
                                  <span>{{$rep->content}}</span>
                              </div>
                              <div class="d-flex g3">
                                  @if(App\Http\Controllers\LikeController::check(App\Http\Controllers\CookieController::get('user'),$rep->id))
                                    <a href="/details/{{$id}}/unlike/{{$rep->id}}" id="like{{$rep->id}}"><i class="fa-solid fa-thumbs-up"></i>{{ App\Http\Controllers\LikeController::Like($comment->id) }}</a>
                                  @else
                                    <a href="/details/{{$id}}/like/{{$rep->id}}" id="like{{$rep->id}}"><i class="fa-regular fa-thumbs-up"></i>{{ App\Http\Controllers\LikeController::Like($comment->id) }}</a>
                                  @endif
                                  <a href="#cmt{{$rep->id}}" class="rep btn-light" aria-label="Close" style="border: none;" idform="repcomment{{$comment->id}}">Trả lời</a>
                                  @if(App\Http\Controllers\CommentController::check(App\Http\Controllers\CookieController::get('user'), $rep->id))
                                  <a href="/details/{{$id}}/deleteComment/{{$rep->id}}" class="btn-light" aria-label="Close" style="border: none;"><i class="fa-solid fa-trash"></i>Xóa</a>
                                  @endif
                                  <span>{{$rep->created_at}}</span>
                              </div>
                          </div>
                          <hr>
                        </div>
                        @endforeach
                        </div>
                      <hr>
                    @endforeach
                    </div>
                  </div>
  <!-- Tabs content -->
                </form>
            </div>
        </div>
    </div>
<script>
  $(document).ready(function(){
    $('#text_cmt').keypress(function(e){
      var text_cmt = this.value + e.key
      console.log(text_cmt)
      if(e.which == 13){
        $('#cmt').trigger('click');
      }
      
    })
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
  })
</script>
@endsection