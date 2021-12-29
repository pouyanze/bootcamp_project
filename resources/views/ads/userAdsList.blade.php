@extends('layouts.app')

@section('content')
<div class="container text-center ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>آگهی های من</h1>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        @foreach ($ads as $ad)
                        <div class="container-fluid ">
                            <table class="table table-bordered table-hover table-striped mb-3my-5">
                                <span class="font-weight-bold page-link justify-content-center border text-danger bg-dark h3 ">آگهی</span>
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-6"> آگهی</th>
                                        <th scope="col" class="col-6"> دسته بندی</th>
                                        <th scope="col" class="col-3">پاک کردن</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">
                                            <form action="/ads/{{$ad->id}}/edit" method="post">
                                                @csrf
                                                <!-- <input type="hidden" name="adIDforCRUD" class="adID" value="{{$ad->id}}"> -->
                                                <label for="">عنوان آگهی</label> <input type="text" name="newAdTitle" value="{{$ad->title}}" class="form-control">
                                                <label for=""> توضیحات آگهی</label> <input type="text" name="newAdDescription" value="{{$ad->description}}" class="form-control">
                                                <label for="">قیمت </label> <input type="text" name="newAdAdPrice" value="{{$ad->price}}" class="form-control">
                                                <label for="">آدرس</label> <input type="text" name="newAdAddress" value="{{$ad->address}}" class="form-control">
                                                <label for="">شماره تماس</label> <input type="text" name="newAdPhoneNumber" value="{{$ad->phoneNumber}}" class="form-control">
                                                <button type="submit" name="update" value="update" class="btn btn-success">
                                                    <img src="/images/Oxygen-Icons.org-Oxygen-Actions-document-edit.ico" alt="ویرایش" style="height: 30px;">
                                                </button>
                                            </form>
                                        </td>

                                        <td class="align-middle">
                                            @foreach ($cats as $cat)
                                            @if (($cat->id)==($ad->categoryID))
                                            <form action="/ads/{{$cat->id}}/UserAdsByOneCategory" method="get">
                                                @csrf
                                                <label for="">دسته بندی</label>
                                                <input type="submit" class="form-control" value="{{$cat->name}}"></input>
                                            </form>
                                            @endif
                                            @endforeach
                                        </td>

                                        <td class="align-middle">
                                            <form action="/ads/{{$ad->id}}/destroy" method="post">
                                                @csrf
                                                <button type="submit" name="delete" value="delete" class="btn btn-danger">
                                                    <img src="/images/Iconshock-Vista-General-Trash.ico" alt="پاک پاک" style="height: 30px;">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- ---------------------------------------------------------------------- -->
                        <div class="container-fluid dropdown w-100 p-3">
                            <button class="btn btn-secondary dropdown-toggle" data-flip="false" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                همه نظرات
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <table class=" table table-dark table-bordered table-hover table-responsive-sm">

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
                                </table>
                                
                                <table class=" table  table-bordered table-hover table-info table-responsive-sm">
                                    <td>
                                        <label class="font-weight-bold page-link justify-content-center border text-success bg-dark h5" for="newComment">نظر جدید</label>
                                        <form action="/comments/store" method="post">
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
                            </div>
                        </div>
                    </div>
                    <!-- ---------------------------------------------------------------------------- -->
                    @endforeach
                </div>
                <a class=" font-weight-bold page-link justify-content-center border text-danger bg-dark h3" href='{{$url = route("create")}}'>آگهی جدید ایجاد کنید</a>
            </div>
        </div>
    </div>
</div>
</div>



@endsection