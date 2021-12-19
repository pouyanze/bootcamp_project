@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="text-center">
            <div>
                <div>
                @foreach ($Categories as $Category)
                    <h1>:تمام آگهی های دسته بندی<br> {{$Category->name}}</h1>
                @endforeach
                    <hr>
                    @foreach ($ads as $ad)
                    <div class="row justify-content-around col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="col-3">عنوان</th>
                                    <th scope="col" class="col-3">توضیحات</th>
                                    <th scope="col" class="col-1">قیمت</th>
                                    <th scope="col" class="col-2">آدرس</th>
                                    <th scope="col" class="col-1">شماره تماس</th>
                                    <th scope="col" class="col-3">دسته بندی</th>
                                </tr>
                            </thead>
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
                                    <form action="/{{$Category->id}}/listCategorized" method="post">
                                        @csrf
                                        <input type="submit" class="form-control" value="{{$Category->name}}"></input>
                                    </form>
                                    @endif
                                    @endforeach
                                </td>

                            </tr>
                        </table>
                    </div>
                    @endforeach
                </div>
                <a class="font-weight-bold page-link justify-content-center border text-danger bg-dark h3" href='{{$url = route("create")}}'>آگهی جدید ایجاد کنید</a>
            </div>
        </div>
    </div>
</div>
</div>

@endsection