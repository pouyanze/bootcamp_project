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
                        <tr style="display: inline;">
                            <th scope="col">--آگهی--</th>
                            <th scope="col">حذف</th>
                        </tr>

                        @foreach ($ads as $ad)
                        <tr style="display: inline;">
                            <div class="mb-3">
                                <form action="{{$ad->id}}/edit" method="post">
                                @csrf
                                    <td>
                                        <!-- <input type="hidden" name="adIDforCRUD" class="adID" value="{{$ad->id}}"> -->
                                        <input type="text" name="newAdTitle" value="{{$ad->title}}" class="form-control">
                                        <input type="text" name="newAdDescription" value="{{$ad->description}}" class="form-control">
                                        <input type="text" name="newAdAdPrice" value="{{$ad->price}}" class="form-control">
                                        <input type="text" name="newAdAddress" value="{{$ad->address}}" class="form-control">
                                        <input type="text" name="newAdPhoneNumber" value="{{$ad->phoneNumber}}" class="form-control">
                                        <button type="submit" name="update" value="update" class="btn btn-success">ذخیره تغییرات</button>
                                    </td>
                                </form>
                                <form action="{{$ad->id}}/destroy" method="post">
                                @csrf
                                    <td>
                                        <button type="submit" name="delete" value="delete" class="btn btn-danger">delete</button>
                                    </td>
                                </form>
                            </div>
                        </tr>

                        @endforeach
                    </table>

                    <a class="page-link d-flex justify-content-center border m-5 text-success bg-dark" href='{{$url = route("create")}}'>آگهی جدید ایجاد کنید</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection