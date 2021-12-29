@extends('layouts.app')

@section('content')

<div class="card-header text-center mb-3">
    <h1>آگهی های مورد علاقه یا تنفر من</h1>
</div>

@foreach ($ads as $ad)
<div class="container-fluid ">
    <table class="table table-bordered table-hover table-striped text-center mb-3">
        <span class="font-weight-bold page-link justify-content-center border text-danger bg-dark h3 text-center">آگهی</span>
        <thead class="align-middle">
            <tr class="align-middle">
                <th scope="col" class="col-1"> عنوان آگهی</th>
                <th scope="col" class="col-2"> توضیحات آگهی</th>
                <th scope="col" class="col-1"> قیمت</th>
                <th scope="col" class="col-2"> آدرس</th>
                <th scope="col" class="col-1"> شماره تماس</th>
                <th scope="col" class="col-2"> دسته بندی</th>
                <th scope="col" class="col-3">ویرایش علاقه مندی</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            <tr class="align-middle">
                <td class="align-middle">
                    <h3>{{$ad->title}}</h3>
                </td>
                <td>
                    <h3>{{$ad->description}}</h3>
                </td>
                <td>
                    <h3>{{$ad->price}}</h3>
                </td>
                <td>
                    <h3>{{$ad->address}}</h3>
                </td>
                <td>
                    <h3>{{$ad->phoneNumber}}</h3>
                </td>
                <td>
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
                <!-- ----------------------------------------------------- -->
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
                    <img src="/images/heartF.ico" alt="full heart">
                    @elseif ((($favourite->advertisement_id)==($ad->id)) and (($favourite->user_id)==(Auth::user()->id)) and (($favourite->favourite)=='no'))
                    <img src="/images/heartE.ico" alt="empty heart">
                    @endif
                    @endforeach
                </td>
                @endauth
                <!-- ----------------------------------------------- -->
            </tr>
        </tbody>
    </table>
</div>
@endforeach


@endsection