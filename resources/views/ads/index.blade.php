@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>لیست آگهی ها</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th scope="col">نام آگهی</th>
                            <th scope="col">اصلاح نام آگهی</th>
                            <th scope="col">توضیحات آگهی</th>
                            <th scope="col">اصلاح توضیحات آگهی</th>
                            <th scope="col">پاک کردن</th>
                        </tr>
                        @foreach ($ads as $ad)
                        <tr>
                            <td>{{$ad->title}}</td>
                            <td><a href="{{$ad->id}}/edit">اصلاح نام</a></td>
                            <td>{{$ad->description}} </td>
                            <td><a href="{{$ad->id}}/edit">اصلاح توضیحات</a></td>
                            <td><a href="{{$ad->id}}/destroy">پاک کردن</a></td>
                        </tr>
                        @endforeach
                    </table>

                    <a class="page-link d-flex justify-content-center border m-5 text-success bg-dark" href='{{$url = route("user/create")}}'>آگهی جدید ایجاد کنید</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection