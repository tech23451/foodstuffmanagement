@extends('layouts.admin')
@section('title', '食材新規登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>食材新規登録</h2>
                <form action="{{ route('food.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">購入した食材</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="ingreduent" value="{{ old('ingreduent') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="purchase_date">購入日</label>
                        <div class="col-md-10">
                            <input type="datetime-local" class="form-control" id="purchase_date" name="purchase_date" value="{{ old('purchase_date') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="expiration_date">賞味期限</label>
                        <div class="col-md-10">
                            <input type="datetime-local" class="form-control" id="expiration_date" name="expiration_date" value="{{ old('expiration_date') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection