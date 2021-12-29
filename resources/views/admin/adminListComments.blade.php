@extends('layouts.adminDashboard')
@section('content')

<div class="border border-primary rounded text-white bg-dark sticky-top d-flex justify-content-center m-2 p-2" >
    @foreach ($ad as $ad)
    <p>
        <label for="">{{$ad->title}}:نظرات مربوط به آگهی با عنوان</label>
        <br>
        <label for="">{{$ad->description}}:و با متن</label>
    </p>
    @endforeach
</div>

@foreach ($comments as $comment)
<form action="/admin/{{$comment->id}}/commentDelete" method="post" class="d-flex justify-content-center">
    @csrf
    <label for="title">تیتر نظر</label><br>
    <h3 id="title" class="form-control">{{$comment->title}}</h3>
    <label for="description">متن نظر</label><br>
    <h3 id="description" class="form-control">{{$comment->description}}</h3>
    <button type="submit" class="btn btn-primary">پاک کردن</button>
</form>
@endforeach


{{-- Pagination --}}
<div class="pagination justify-content-center page-item">
    {!! $comments->links() !!}
</div>
@endsection