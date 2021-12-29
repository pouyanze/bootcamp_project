@extends('layouts.adminDashboard')
@section('content')

<div class="d-flex justify-content-center bg-dark text-white m-4 p-3 rounded">
    <h3>لیست لایکها و دیسلایک های عالی و زیبا</h3>
</div>

<div class="border border-primary rounded text-white bg-dark sticky-top d-flex justify-content-center m-2 p-2">
    @foreach ($add as $ad)
    <table class="text-white m-3 p-4">
        <tr>
            <td>
            <h4>{{$ad->description}}</h4>
            </td>
            <td>
                <h4>:متن آگهی</h4>
            </td>
        </tr>
    </table>
    <table class="text-white m-3 p-4">
        <tr>
            <td>
            <h4>{{$ad->title}}</h4>
            </td>
            <td>
                <h4>:عنوان آگهی</h4>
            </td>
        </tr>
    </table>
    
    @endforeach
</div>


@foreach ($users as $user)
<hr>
<label for="title">اسم لایک کننده</label><br>
<h3 id="title" class="form-control">{{$user->name}}</h3>
<label for="description">ایمیل لایک کننده</label><br>
<h3 id="description" class="form-control">{{$user->email}}</h3>
<hr>
@endforeach



{{-- Pagination --}}
<div class="pagination justify-content-center page-item">
    {!! $users->links() !!}
</div>
@endsection