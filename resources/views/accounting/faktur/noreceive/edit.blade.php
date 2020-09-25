@extends('templates.default')

@section('content')
<div class="row">
    <form action="{{ route('accounting.fakturnoreceive.update', $faktur->id) }}" method="POST">
        @csrf
        <input type="date" name="receive_date">
        <button type="submit" class="btn btn-primary btn-md">Save</button>
    </form>
</div>
@endsection
