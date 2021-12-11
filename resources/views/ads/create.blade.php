@extends('layouts.app')

@section('content')
<form action="/ads/store" method="POST">
    {{ csrf_field() }}
    <div class="mx-auto" style="width: 500px;">
        <label for="title" class="col-lg-12 col-form-label">عنوان آگهی</label>
        <input type="text" name="title" class="blue form-control form-control-lg" id="title" placeholder="عنوان آگهی را اینجا وارد کنید">

        <label for="description" class="col-lg-12 col-form-label">توضیحات آگهی</label>
        <textarea name="description" class="form-control" id="description" rows="3" placeholder="توضیحات آگهی را اینجا وارد کنید"></textarea>

        <label for="price" class="col-lg-12 col-form-label">قیمت آگهی</label>
        <input type="number" name="price" class="blue form-control form-control-lg" id="price" placeholder="قیمت آگهی را اینجا وارد کنید">

        <label for="address" class="col-lg-12 col-form-label">آدرس آگهی</label>
        <input type="text" name="address" class="blue form-control form-control-lg" id="address" placeholder="آدرس آگهی را اینجا وارد کنید">

        <label for="phoneNumber" class="col-lg-12 col-form-label">شماره تلفن آگهی</label>
        <input type="number" name="phoneNumber" class="blue form-control form-control-lg" id="phoneNumber" placeholder="شماره تماس آگهی را اینجا وارد کنید">

        <select name="categoryID">
            @foreach ($categories as $category)
            <option value="{{$category->id}}">
                {{$category->name}}
            </option>
            @endforeach
        </select>

        <input type="hidden" name="userID" value="{{auth()->user()->id}}">

        <button class="my-3 container btn btn-danger" type="submit">ذخیره</button>
    </div>
</form>


@if($errors->any())
<div class="alert alert-danger">
<ol>
@foreach($errors->all() as $item)
{{$item}}
@endforeach
</ol>
@endif


@endsection