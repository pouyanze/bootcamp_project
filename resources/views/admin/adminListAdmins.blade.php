@extends('layouts.adminDashboard')
@section('content')

<div class="d-flex justify-content-center bg-dark text-white m-4 p-3 rounded">
    <h3>لیست ادمین های عالی و زیبا</h3>
</div>


@foreach ($admins as $admin)
<div class="row justify-content-around col-md-13">

    <table class="table table-bordered table-striped mb-3">

        <thead class="thead-dark text-center">
            <tr>
                <th scope="col" class="col-2">نام</th>
                <th scope="col" class="col-2">ایمیل</th>
                <th scope="col" class="col-2">ابزار</th>
            </tr>
        </thead>

        <tbody class='text-center m-0 p-0'>
            <tr>
                <td>
                    <span>{{$admin->name}}</span>
                </td>
                <td>
                    <span class="col-2">{{$admin->email}}</span>
                </td>

                <td class="m-0 p-0">
                    <span class="m-0 p-0">
                        <ul class="list-group list-group-horizontal-sm flex-fill m-0 p-0">

                            <li class="list-group-item list-group-item-danger flex-fill m-0 p-0">
                                <form action="/admin/{{$admin->id}}/destroyAdmins" method="post">
                                    @csrf
                                    <button type="submit" name="delete" value="delete" class="btn m-0 p-1" data-toggle="tooltip" data-placement="bottom" title="پاک کردن">
                                        <img src="/images/Iconshock-Vista-General-Trash.ico" alt="پاک پاک" style="height: 25px;">
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
    {!! $admins->links() !!}
</div>
<!-- ----------------------------------------------------------------------------- -->
<div class="container m-0 p-0 justify-content-center bg-secondary text-center">
    <div class="row justify-content-center m-0 p-0">
        <div class="col-4 m-0 p-0 justify-content-center">
            <form action="/admin/createAdmins" method="get">
                @csrf
                <label for="add" class="container m-0 p-0 bg-success text-white w-100">افزودن مدیر جدید</label>
                
                <input type="hidden" name="isAdmin" value="yes" class="form-control form-control">
                
                <label for="name" class="col-lg-12 col-form-label">نام </label>
                <input type="text" name="name" class="form-control form-control" id="name" placeholder="نام مدیر را اینجا وارد کنید">

                <label for="email" class="col-lg-12 col-form-label">ایمیل </label>
                <textarea name="email" class="form-control" id="email" placeholder="ایمیل را اینجا وارد کنید"></textarea>

                <label for="password" class="col-lg-12 col-form-label">پسورد </label>
                <textarea name="password" class="form-control" id="password" placeholder="پسورد را اینجا وارد کنید"></textarea>
                <hr>
                <button id="add" type="submit" name="newManager" value="newManager" class="m-0 p-0 btn" data-toggle="tooltip" data-placement="bottom" title="افزودن مدیر جدید">
                    <img src="/images/create.ico" style="height: 35px;" alt="newManager">
                </button>
            </form>
        </div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------- -->

<!-- ----------------------------------------------------------------------------- -->
@if($errors->any())
<div class="alert alert-danger">
    <ol>
        @foreach($errors->all() as $item)
        {{$item}}
        @endforeach
    </ol>
</div>
@endif
<!-- ------------------------------------------------------------------------------------ -->
@endsection