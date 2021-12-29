@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="text-center">
            <div>
                <h1>تمام آگهی ها</h1>
                <hr>
                <div class="row justify-content-around col-md-12">
                    @foreach ($ads as $ad)
                    <table class="table table-bordered table-hover">

                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="col-2">عنوان</th>
                                <th scope="col" class="col-2">توضیحات</th>
                                <th scope="col" class="col-1">قیمت</th>
                                <th scope="col" class="col-2">آدرس</th>
                                <th scope="col" class="col-1">شماره تماس</th>
                                <th scope="col" class="col-2">دسته بندی</th>
                                @auth<th scope="col" class="col-2">مورد علاقه</th>@endauth
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <span>{{$ad->title}}</span>
                                </td>
                                <td>
                                    <span class="col-4">{{$ad->description}}</span>
                                </td>
                                <td>
                                    <span>{{$ad->price}}</span>
                                </td>
                                <td>
                                    <span>{{$ad->address}}</span>
                                </td>
                                <td>
                                    <span>{{$ad->phoneNumber}}</span>
                                </td>
                                <td>
                                    @foreach ($Categories as $Category)
                                    @if(($Category->id)===($ad->categoryID))
                                    <form action="{{$Category->id}}/AdsByOneCategory" method="get">
                                        @csrf
                                        <input type="submit" class="form-control" value="{{$Category->name}}"></input>
                                    </form>
                                    @endif
                                    @endforeach
                                </td>

                                @auth
                                <td>
                                    <form action="/favourites/store" method="post">
                                        @csrf
                                        <input id="yes" type="radio" name="favourite" value="yes">
                                        <label for="yes">بله</label>
                                        <input id="no" type="radio" name="favourite" value="no">
                                        <label for="no">خیر</label>
                                        <input id="newFav" type="hidden" name="userID" value="{{Auth::user()->id}}">
                                        <input id="newFav" type="hidden" name="adID" value="{{$ad->id}}">
                                        <input type="submit" value="ارسال">
                                    </form>
                                    @foreach ($favourites as $favourite)
                                    @if ((($favourite->advertisement_id)==($ad->id)) and (($favourite->user_id)==(Auth::user()->id)) and (($favourite->favourite)=='yes'))
                                    <img src="images/heartF.ico" alt="full heart">
                                    @elseif ((($favourite->advertisement_id)==($ad->id)) and (($favourite->user_id)==(Auth::user()->id)) and (($favourite->favourite)=='no'))
                                    <img src="images/heartE.ico" alt="empty heart">
                                    @endif
                                    @endforeach
                                </td>
                                @endauth

                            </tr>
                        </tbody>
                    </table>

                    <div class=" container-fluid dropdown w-100 p-3">
                        <button class=" btn btn-secondary dropdown-toggle" data-flip="false" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            نظرات
                        </button>
                        <div class=" dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <table class="  table table-striped table-dark table-bordered table-hover">
                                @guest
                                @foreach ($comments->sortBy('userID') as $comment)
                                @if (($comment->adID)==($ad->id))
                                <tr>
                                    <td>
                                        <table class="table table-striped table-dark table-bordered table-hover">
                                            <label class="font-weight-bold page-link justify-content-center border text-success bg-dark h5" for="othersComment">نظر</label>
                                            <tr>
                                                <td>
                                                    <span>{{$comment->title}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span>{{$comment->description}}</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endguest

                                @auth
                                @foreach ($comments->sortBy('userID') as $comment)
                                @if (($comment->adID)==($ad->id))
                                <tr>
                                    <td>
                                        @if((Auth::user()->id)==($comment->userID))
                                        <form action="/comments/{{$comment->id}}/edit" method="post">
                                            <label class="font-weight-bold page-link justify-content-center border text-success bg-dark h5" for="<?php echo ($comment->adID); ?>"> (بفرمایید ادیت)نظر شما </label>
                                            @csrf
                                            <input id="<?php echo ($comment->adID); ?>" type="text" name="newAdCommentTitle" value="{{$comment->title}}" class="form-control">
                                            <input id="<?php echo ($comment->adID); ?>" type="text" name="newAdCommentDescription" value="{{$comment->description}}" class="form-control">
                                            <button type="submit" name="update" value="update" class="btn btn-success">
                                                <img src="/images/Oxygen-Icons.org-Oxygen-Actions-document-edit.ico" alt="ویرایش" style="height: 30px;">
                                            </button>
                                        </form>
                                        @else
                                        <table>
                                            <label class="font-weight-bold page-link justify-content-center border text-success bg-dark h5" for="othersComment">نظرات دیگران</label>
                                            <tr>
                                                <td>
                                                    <p id="othersComment">{{$comment->title}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p id="othersComment">{{$comment->description}}</p>
                                                </td>
                                            </tr>
                                        </table>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                <table class=" table table-striped table-dark table-bordered table-hover table-info ">
                                    <td>
                                        <label class="font-weight-bold page-link justify-content-center border text-success bg-dark h5" for="newComment">نظر جدید</label>
                                        <form action="/comments/store2" method="post">
                                            @csrf
                                            <input id="newComment" type="text" name="title" class="form-control" placeholder="New Commnet Title">
                                            <input id="newComment" type="text" name="description" class="form-control" placeholder="New Commnet Text">
                                            <input id="newComment" type="hidden" name="userID" value="{{Auth::user()->id}}" class="form-control">
                                            <input id="newComment" type="hidden" name="adID" value="{{$ad->id}}" class="form-control">
                                            <button type="submit" name="store" value="update" class="btn btn-success">
                                                <img src="/images/Oxygen-Icons.org-Oxygen-Actions-document-edit.ico" alt="ویرایش" style="height: 30px;">
                                            </button>
                                        </form>
                                    </td>
                                </table>
                                @endauth
                            </table>
                            <hr>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <a class="text-center font-weight-bold page-link justify-content-center border text-danger bg-dark h3" href='{{$url = route("create")}}'>آگهی جدید ایجاد کنید</a>
    </div>
</div>
</div>


{{-- Pagination --}}
<div class="pagination justify-content-center page-item fixed-bottom bg-success text-white w-25 my-auto align-items-center mx-auto rounded col-md-3point5 p-0 m-0">
    {!! $ads->links() !!}
</div>
@endsection