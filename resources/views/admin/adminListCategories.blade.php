@extends('layouts.adminDashboard')
@section('content')

<div class="d-flex justify-content-center bg-dark text-white m-4 p-3 rounded">
    <h3>لیست دسته بندی های عالی و زیبا</h3>
</div>

<div class="container m-0 p-0">
    <div class="row justify-content-center m-0 p-0">
        <div class="col-4 m-0 p-0">
            <form action="/admin/createCategories" method="post">
                @csrf
                <label for="add" class="m-0 p-0">افزودن دسته بندی جدید</label>
                <button id="add" type="submit" name="likedBy" value="likedBy" class="m-0 p-0 btn" data-toggle="tooltip" data-placement="bottom" title="افزودن دسته بندی جدید">
                    <img src="/images/create.ico" style="height: 35px;" alt="liked by">
                </button>
            </form>
        </div>
    </div>
</div>

<div class="row justify-content-around col-md-12">

    <table class="table table-striped table-bordered table-hover text-center align-middle">

        <thead class="thead-light">
            <tr>
                <th scope="col" class="col-2">عنوان دسته بندی</th>
                <th scope="col" class="col-2">تعداد آگهی با این دسته بندی</th>
                <th scope="col" class="col-1">ابزار</th>
            </tr>
        </thead>

        
            @foreach ($Categories as $Category)
            <tbody class="m-0 p-0">
            <tr class="m-0 p-0">
                <td class="m-0 p-0">
                    <form action="/admin/{{$Category->id}}/editCategories" method="post">
                        @csrf
                        <label for="name" class="m-0 p-0">عنوان دسته بندی</label> <input id="name" type="text" name="newCatName" value="{{$Category->name}}" class="form-control">
                        <button type="submit" name="edit" value="delete" class="btn m-1 p-0" data-toggle="tooltip" data-placement="bottom" title="ویرایش">
                            <img src="/images/Oxygen-Icons.org-Oxygen-Actions-document-edit.ico" alt="edit" style="height: 25px;">
                        </button>
                    </form>
                </td>
                <td class="align-items-center justify-content-center">
                    @foreach ($adssCount as $adsCount)

                    @if (($adsCount->categoryID)==($Category->id))
                    <span class="m-5 p-0">{{$adsCount->count}}</span><hr>
                    <form action="/admin/{{$Category->id}}/AdminListAdsOfThisCategory" method="post">
                        @csrf
                        <button id='' type="submit" name="AdminListAdsOfThisCategory" value="listAds" class="btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="لیست آگهی ها">
                            <img src="/images/list.ico" alt="AdminListAdsOfThisCategory" style="height: 25px;">
                            <a class="m-0 p-0">لیست آگهی های این دسته بندی</a>
                        </button>
                       
                    </form>
                    @endif

                    @endforeach
                </td>
                <td class="m-0 p-0">
                    <span class="col-5 m-0 p-0 align-middle ">
                        <ul class="list-group list-group-horizontal-sm flex-fill m-0 p-0">
                            <li class="list-group-item list-group-item-danger flex-fill m-0 p-0">
                                <form action="/admin/{{$Category->id}}/destroyCategories" method="post">
                                    @csrf
                                    <button type="submit" name="delete" value="delete" class="m-0 p-0 btn" data-toggle="tooltip" data-placement="bottom" title="پاک کردن">
                                        <img src="/images/Iconshock-Vista-General-Trash.ico" style="height: 35px;" alt="پاک">
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </span>
                </td>
            </tr>
            <hr>
        </tbody>
        @endforeach
    </table>
</div>



{{-- Pagination --}}
<div class="pagination justify-content-center page-item">
    {!! $Categories->links() !!}
</div>
@endsection