@extends('layouts.adminDashboard')
@section('content')

<div class="d-flex justify-content-center bg-dark text-white m-4 p-3 rounded">
    <h3>محل افزودن دسته بندی توسط مدیر عالی و زیبا</h3>
</div>

<form action="/admin/storeCategories" method="POST">
    {{ csrf_field() }}
    <div class="mx-auto" style="width: 500px;">
        <label for="title" class="col-lg-12 col-form-label">نام دسته بندی</label>
        <input type="text" name="title" class="blue form-control form-control-lg" id="title" placeholder="نام دسته بندی را اینجا وارد کنید">

        <label for="title2" class="col-lg-12 col-form-label">نام انگلیسی دسته بندی</label>
        <textarea name="description" class="form-control" id="title2" rows="3" placeholder="نام انگلیسی دسته بندی را اینجا وارد کنید"></textarea>

        <button class="my-3 container btn btn-danger" type="submit">ذخیره</button>
    </div>
</form>


<form action="/admin/storeCategories" method="POST">
    {{ csrf_field() }}
    <div class="mx-auto" style="width: 500px;">
        <label for="title" class="col-lg-12 col-form-label">نام دسته بندی</label>
        <input type="text" name="title" class="blue form-control form-control-lg" id="title" placeholder="نام دسته بندی را اینجا وارد کنید">

        <label for="title2" class="col-lg-12 col-form-label">نام انگلیسی دسته بندی</label>
        <textarea name="description" class="form-control" id="title2" rows="3" placeholder="نام انگلیسی دسته بندی را اینجا وارد کنید"></textarea>

        <button class="my-3 container btn btn-danger" type="submit">ذخیره</button>
    </div>
</form>


@endsection