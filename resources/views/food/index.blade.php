@extends('layouts.admin')
@section('title', '登録済み食材の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>食材一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('food.add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('food.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">食材</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="" value="">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-food col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">名前</th>
                                <th width="20%">賞味期限</th>
                                <th width="20%">購入日</th>
                                <th width="20%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $food)
                                <tr>
                                    <td>{{ $food->id }}</td>
                                    <td>{{ Str::limit($food->ingreduent, 100) }}</td>
                                    <td>{{ Str::limit($food->expiration_date, 100) }}</td>
                                    <td>{{ Str::limit($food->purchase_date, 100) }}</td>
                                    <td></td>
                                    <div>
                                            <a href="{{ route('food.edit', ['id' => $food->id]) }}">編集</a>
                                        </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection