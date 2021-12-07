@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="text-center">
            <div>
                <div > 
                    <h1>تمام آگهی ها</h1>
                    <hr>
                    @foreach ($ads as $ad)
                    <div class="row justify-content-around col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="col-3">عنوان</th>
                                    <th scope="col" class="col-4">توضیحات</th>
                                    <th scope="col" class="col-1">قیمت</th>
                                    <th scope="col" class="col-3">آدرس</th>
                                    <th scope="col" class="col-1">شماره تماس</th>
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

                            </tr>
                        </table>
                    </div>
                    @endforeach
                </div>
                <a class="page-link d-flex justify-content-center border m-5 text-success bg-dark" href='{{$url = route("create")}}'>آگهی جدید ایجاد کنید</a>
            </div>
        </div>
    </div>
</div>
</div>

@endsection