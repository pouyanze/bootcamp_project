@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>آگهی های من</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th scope="col">--آگهی--

                            <th scope="col"> ویرایش</th>

                            </th>
                            <th scope="col">پاک کردن</th>
                        </tr>

                        @foreach ($ads as $ad)
                        <tr>
                            <td class="align-middle">
                                <form action="{{$ad->id}}/edit" method="post">
                                    @csrf
                                    <!-- <input type="hidden" name="adIDforCRUD" class="adID" value="{{$ad->id}}"> -->
                                    <input type="text" name="newAdTitle" value="{{$ad->title}}" class="form-control">
                                    <input type="text" name="newAdDescription" value="{{$ad->description}}" class="form-control">
                                    <input type="text" name="newAdAdPrice" value="{{$ad->price}}" class="form-control">
                                    <input type="text" name="newAdAddress" value="{{$ad->address}}" class="form-control">
                                    <input type="text" name="newAdPhoneNumber" value="{{$ad->phoneNumber}}" class="form-control">
                            <td class="align-middle">
                                <button type="submit" name="update" value="update" class="btn btn-success"><img src="/images/Oxygen-Icons.org-Oxygen-Actions-document-edit.ico" alt="ویرایش" style="height: 30px;"></button>
                            </td>
                            </form>
                            </td>
                            <td class="align-middle">
                                <form action="{{$ad->id}}/destroy" method="post">
                                    @csrf
                                    <button type="submit" name="delete" value="delete" class="btn btn-danger"><img src="/images/Iconshock-Vista-General-Trash.ico" alt="پاک پاک" style="height: 30px;"></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </table>

                    <a class=" font-weight-bold page-link justify-content-center border text-danger bg-dark h3" href='{{$url = route("create")}}'>آگهی جدید ایجاد کنید</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection