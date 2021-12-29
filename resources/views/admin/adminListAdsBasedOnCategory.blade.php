@extends('layouts.adminDashboard')
@section('content')

<div class="d-flex align-items-start flex-column bd-highlight mb-3 align-items-center bg-dark text-white m-3 p-0">
    <h3 class="p-2 bd-highlight">لیست آگهی های عالی و زیبا با دسته بندی زیر</h3>
    <br>
    @foreach ($cat as $cat)
    <h3 class="p-2 bd-highlight">{{$cat->name}}</h3>
    @endforeach
</div>

@foreach ($ads as $ad)
<div class="row justify-content-around col-md-13">

    <table class="table table-bordered table-striped mb-3">

        <thead class="thead-dark text-center">
            <tr>
                <th scope="col" class="col-2">عنوان</th>
                <th scope="col" class="col-2">توضیحات</th>
                <th scope="col" class="col-1">قیمت</th>
                <th scope="col" class="col-2">آدرس</th>
                <th scope="col" class="col-2">شماره تماس</th>
                <th scope="col" class="col-2">ابزار</th>
            </tr>
        </thead>

        <tbody class='text-center m-0 p-0'>
            <tr>
                <td>
                    <span>{{$ad->title}}</span>
                </td>
                <td>
                    <span class="col-2">{{$ad->description}}</span>
                </td>
                <td>
                    <span>{{$ad->price}}</span>
                </td>
                <td>
                    <span>{{$ad->address}}</span>
                </td>
                <td>
                    <span class="col-2">{{$ad->phoneNumber}}</span>
                </td>
                <td class="m-0 p-0">
                    <span class="m-0 p-0">
                        <ul class="list-group list-group-horizontal-sm flex-fill m-0 p-0">
                            <li class="list-group-item list-group-item-primary flex-fill m-0 p-0">
                                <form action="/admin/{{$ad->id}}/comments" method="GET">
                                    @csrf
                                    <button type="submit" name="delete" value="comments" class="btn m-0 p-1" data-toggle="tooltip" data-placement="bottom" title="کامنت ها">
                                        <img src="/images/comments_alt_icon_125319.ico" style="height: 35px;" alt="comments">
                                    </button>
                                </form>
                            </li>
                            <li class="list-group-item list-group-item-danger flex-fill m-0 p-0">
                                <form action="/admin/{{$ad->id}}/destroy" method="post">
                                    @csrf
                                    <button type="submit" name="delete" value="delete" class="btn m-0 p-1" data-toggle="tooltip" data-placement="bottom" title="پاک کردن">
                                        <img src="/images/Iconshock-Vista-General-Trash.ico" alt="پاک پاک" style="height: 25px;">
                                    </button>
                                </form>
                            </li>
                            <li class="list-group-item list-group-item-success flex-fill m-0 p-0">
                                <form action="/admin/{{$ad->id}}/favourites" method="get">
                                    @csrf
                                    <button type="submit" name="likedBy" value="likedBy" class="m-0 p-0 btn" data-toggle="tooltip" data-placement="bottom" title="لیست لایک  و دیسلایک">
                                        <img src="/images/like_dislike_icon_154148.ico" style="height: 35px;" alt="liked by">
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endforeach
{{-- Pagination --}}
<div class="pagination justify-content-center page-item">
    {!! $ads->links() !!}
</div>
@endsection