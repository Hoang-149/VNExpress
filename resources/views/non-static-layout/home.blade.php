@extends('.layout.main-layout')
@section('content') 
@php  
    App\Http\Controllers\CookieController::set('url','/');
@endphp
    <!--satrt main-->
    <div class="container py-4">
        <!-- start main news  -->
        <div class="row bt">
            <div class="col-md-9">
                <div class="row">
                    <a href="/details/{{$post_new['id']}}" class="col-md-8 pr-0" >
                        <img src="{{$post_new['rootImage']}}" class="img-fluid" alt="">
                    </a>
                    <div class="col-md-4 bg-light">
                        <a href="/details/{{$post_new['id']}}"><h4>{{$post_new['name']}}</h4></a> 
                        <p>{{$post_new['shortDescription']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <img src="https://scr.vn/wp-content/uploads/2020/07/T%E1%BA%BFt-n%C3%A0y-%C4%91%C6%B0a-g%E1%BA%A5u-v%E1%BB%81-nh%C3%A0.jpg" class="img-fluid" alt="">
            </div>
        </div>
        <!-- end main news  -->
        <div class="row py-4 bt">
            <!-- start left news  -->
            <div class="col-md-5 br " style="padding-left: 0px;">
                <div class="bt pb-3">
                        <img src="https://s1.vnecdn.net/vnexpress/restruct/i/v728/banner/tethyvong_home_pc.png" class="img-fluid" alt="">
                </div>
                <!-- viewest -->
                @foreach($view_posts as $viewpost)
                <div class="bt py-3">
                    <a href="/details/{{$viewpost->id}}" >{{$viewpost->name}}</a>
                    <div class="row pt-3">
                        <a href="/details/{{$viewpost->id}}" class="col-md-5">
                            <img src="{{$viewpost->rootImage}}" class="img-fluid" alt="">
                        </a>
                        <div class="col-md-7 pl-0">
                            <p>{{$viewpost->shortDescription}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- viewest -->
            </div>
            <!-- end left news  -->
            <div class="col-md-7 ">
                <!-- tin th??? gi???i -->
                <div class="bt pb-3">
                    <ul class="ti-ul">
                        <li><a href="" class="a-k" >Th??? gi???i</a></li>
                    </ul>
                    @php  
                        $news_world = App\Http\Controllers\PostController::getpost('Th??? gi???i');
                    @endphp
                    <div class="row ">
                        <div class="col-md-8 br">
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0;">
                                    <a href="/details/{{$news_world[0]['id']}}" class="h-100">
                                        <img src="{{$news_world[0]['rootImage']}}" class="img-fluid h-100 " alt="">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                <div>
                                    <a href="/details/{{$news_world[0]['id']}}">{{$news_world[0]['name']}}</a>
                                    <p class="ab">{{$news_world[0]['shortDescription']}}</p>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <a href="/details/{{$news_world[1]['id']}}">{{$news_world[1]['name']}}</a>
                                <p class="ab">{{$news_world[1]['shortDescription']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tin th??? gi???i -->
                <!-- tin kinh doanh -->
                <div class="bt pb-3">
                    <ul class="ti-ul">
                        <li><a href="" class="a-k" >Kinh Doanh</a></li>
                    </ul>
                    @php  
                        $news = App\Http\Controllers\PostController::getpost('Kinh doanh');
                    @endphp
                    <div class="row ">
                        <div class="col-md-8 br">
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0;">
                                    <a href="/details/{{$news[0]['id']}}" class="h-100">
                                        <img src="{{$news[0]['rootImage']}}" class="img-fluid h-100 " alt="">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                <div>
                                    <a href="/details/{{$news[0]['id']}}">{{$news[0]['name']}}</a>
                                    <p class="ab">{{$news[0]['shortDescription']}}</p>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <a href="/details/{{$news[1]['id']}}">{{$news[1]['name']}}</a>
                                <p class="ab">{{$news[1]['shortDescription']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tin kihnh doanh -->
                <!-- tin th???i s??? -->
                <div class="bt pb-3">
                    <ul class="ti-ul">
                        <li><a href="" class="a-k" >Th???i s???</a></li>
                    </ul>
                    @php  
                        $news = App\Http\Controllers\PostController::getpost('Th???i s???');
                    @endphp
                    <div class="row ">
                        <div class="col-md-8 br">
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0;">
                                    <a href="/details/{{$news[0]['id']}}" class="h-100">
                                        <img src="{{$news[0]['rootImage']}}" class="img-fluid h-100 " alt="">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                <div>
                                    <a href="/details/{{$news[0]['id']}}">{{$news[0]['name']}}</a>
                                    <p class="ab">{{$news[0]['shortDescription']}}</p>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <a href="/details/{{$news[1]['id']}}">{{$news[1]['name']}}</a>
                                <p class="ab">{{$news[1]['shortDescription']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tin th???i s??? -->
                <!-- tin podcasts -->
                <div class="bt pb-3">
                    <ul class="ti-ul">
                        <li><a href="" class="a-k" >?????i s???ng</a></li>
                    </ul>
                    @php  
                        $news = App\Http\Controllers\PostController::getpost('?????i s???ng');
                    @endphp
                    <div class="row ">
                        <div class="col-md-8 br">
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0;">
                                    <a href="/details/{{$news[0]['id']}}" class="h-100">
                                        <img src="{{$news[0]['rootImage']}}" class="img-fluid h-100 " alt="">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                <div>
                                    <a href="/details/{{$news[0]['id']}}">{{$news[0]['name']}}</a>
                                    <p class="ab">{{$news[0]['shortDescription']}}</p>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <a href="/details/{{$news[1]['id']}}">{{$news[1]['name']}}</a>
                                <p class="ab">{{$news[1]['shortDescription']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tin podcasts -->
                <!-- tin gi???i tr?? -->
                <div class="bt pb-3">
                    <ul class="ti-ul">
                        <li><a href="" class="a-k" >Gi???i tr??</a></li>
                    </ul>
                    @php  
                        $news = App\Http\Controllers\PostController::getpost('Gi???i tr??');
                    @endphp
                    <div class="row ">
                        <div class="col-md-8 br">
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0;">
                                    <a href="/details/{{$news[0]['id']}}" class="h-100">
                                        <img src="{{$news[0]['rootImage']}}" class="img-fluid h-100 " alt="">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                <div>
                                    <a href="/details/{{$news[0]['id']}}">{{$news[0]['name']}}</a>
                                    <p class="ab">{{$news[0]['shortDescription']}}</p>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <a href="/details/{{$news[1]['id']}}">{{$news[1]['name']}}</a>
                                <p class="ab">{{$news[1]['shortDescription']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tin gi???i tr?? -->
            </div>
        </div>
        <div class="row bt py-3">
            <div class="col-md-12 pl-0">
                <ul class="ti-ul">
                    <li><a href="/category/domestic" class="a-k">Tin trong n?????c</a></li>
                </ul>
            </div>
            @php  
                $news_dometic = App\Http\Controllers\PostController::DomesticPost();
            @endphp
            <div class="col-md-6 pl-0">
                <div class="bt pb-3">
                    <div class="row ">
                        <div class="col-md-12 br">
                            <div class="row">
                                <a href="/details/{{$news_dometic[1]['id']}}" class="col-md-3" style="padding-right: 0;">
                                    <div class="h-100">
                                        <img src="{{$news_dometic[1]['rootImage']}}" class="img-fluid h-100 " alt="">
                                    </div>
                                </a>
                                <div class="col-md-9">
                                   <div>
                                        <a href="/details/{{$news_dometic[1]['id']}}" class="row2-title" >{{$news_dometic[1]['name']}}</a>
                                        <p class="ab">{{$news_dometic[1]['shortDescription']}}</p>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row ">
                    <div class="col-md-12 ">
                        <div class="row">
                            <a href="/details/{{$news_dometic[2]['id']}}" class="col-md-3" style="padding-right: 0;">
                                <div class="h-100">
                                    <img src="{{$news_dometic[2]['rootImage']}}" class="img-fluid h-100 " alt="">
                                </div>
                            </a>
                            <div class="col-md-9">
                               <div>
                                <a href="/details/{{$news_dometic[2]['id']}}" class="row2-title" >{{$news_dometic[2]['name']}}</a>
                                <p class="ab">{{$news_dometic[2]['shortDescription']}}</p>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bt py-3">
            <div class="col-md-6 pl-0">
                <div class="bt pb-3">
                    <div class="row ">
                        <div class="col-md-12 br">
                            <div class="row">
                                <a href="/details/{{$news_dometic[3]['id']}}" class="col-md-3" style="padding-right: 0;">
                                    <div class="h-100">
                                        <img src="{{$news_dometic[3]['rootImage']}}" class="img-fluid h-100 " alt="">
                                    </div>
                                </a>
                                <div class="col-md-9">
                                   <div>
                                        <a href="/details/{{$news_dometic[3]['id']}}" class="row2-title" >{{$news_dometic[3]['name']}}</a>
                                        <p class="ab">{{$news_dometic[3]['shortDescription']}}</p>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row ">
                    <div class="col-md-12 ">
                        <div class="row">
                            <a href="/details/{{$news_dometic[4]['id']}}" class="col-md-3" style="padding-right: 0;">
                                <div class="h-100">
                                    <img src="{{$news_dometic[4]['rootImage']}}" class="img-fluid h-100 " alt="">
                                </div>
                            </a>
                            <div class="col-md-9">
                               <div>
                                <a href="/details/{{$news_dometic[4]['id']}}" class="row2-title" >{{$news_dometic[4]['name']}}</a>
                                <p class="ab">{{$news_dometic[4]['shortDescription']}}</p>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row bt py-3">
            <div class="col-4 pl-0 br">
                <div class="bt pb-3">
                    <ul class="ti-ul">
                        <li><a href="" class="a-k">Kinh doanh</a></li>
                    </ul>
                    <div>
                        <img src="https://i1-vnexpress.vnecdn.net/2022/12/08/huy-7327-1670472720-4642-1670472801.jpg?w=380&h=228&q=100&dpr=1&fit=crop&s=oeKkEbBrkTEAoh1zpHV0zQ" class="img-fluid" alt="">
                        <a href="">????? xu???t nghi??n c???u b??? sung quy ho???ch 9 s??n bay m???i</a>
                        <p>C???c H??ng kh??ng Vi???t Nam v???a ????? xu???t B??? Giao th??ng V???n t???i ti???p t???c nghi??n c???u, ????a v??o quy ho???ch 9 s??n bay m???i khi ????? ??i???u ki???n. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 br">
                <div class="bt pb-3">
                    <ul class="ti-ul">
                        <li><a href="" class="a-k">Kinh doanh</a></li>
                    </ul>
                    <div>
                        <img src="https://i1-vnexpress.vnecdn.net/2022/12/09/tau-dau-iran-1670545360-4950-1670545561.jpg?w=380&h=228&q=100&dpr=1&fit=crop&s=ok2L2G1BUIvcmdqbF2164w" class="img-fluid" alt="">
                        <a href="">M??? tr???ng ph???t doanh nh??n mua b??n d???u Iran</a>
                        <p>B??? T??i ch??nh M??? ??p l???nh tr???ng ph???t doanh nh??n Th??? Nh?? K??? v?? c???m v???n 20 c??ng ty d?????i quy???n ??ng v?? c??o bu???c mua b??n d???u Iran. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 br">
                <div class="bt pb-3">
                    <ul class="ti-ul">
                        <li><a href="" class="a-k">Kinh doanh</a></li>
                    </ul>
                    <div>
                        <img src="https://i1-vnexpress.vnecdn.net/2022/12/08/huy-7327-1670472720-4642-1670472801.jpg?w=380&h=228&q=100&dpr=1&fit=crop&s=oeKkEbBrkTEAoh1zpHV0zQ" class="img-fluid" alt="">
                        <a href="">????? xu???t nghi??n c???u b??? sung quy ho???ch 9 s??n bay m???i</a>
                        <p>C???c H??ng kh??ng Vi???t Nam v???a ????? xu???t B??? Giao th??ng V???n t???i ti???p t???c nghi??n c???u, ????a v??o quy ho???ch 9 s??n bay m???i khi ????? ??i???u ki???n. </p>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!--end main-->
@endsection