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
                            <input type="text" class="form-control" name="cond_ingreduent" value="{{ $cond_ingreduent}}">
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
                                <th width="10%">画像</th>
                                <th width="10%">賞味期限</th>
                                <th width="10%">購入日</th>
                                <th width="10%">操作</th>
                                <th width="20%">状態</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $food)
                                <tr>
                                    <td>{{ $food->id }}</td>
                                    <td>{{ Str::limit($food->ingreduent, 100) }}</td>
                                    <td>
                                        @if($food->image_path)
                                            <img src="/storage/image/{{ $food->image_path }}" style="width:auto;height:90px;">
                                        @else
                                            <span>未登録</span>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($food->expiration_date, 100) }}</td>
                                    <td>{{ Str::limit($food->purchase_date, 100) }}</td>
                                    <td><a href="{{ route('food.edit', ['id' => $food->id]) }}">編集</a></td>
                                    <td>
                                        @if($food->condition == 0)
                                                使用中
                                        @elseif($food->condition == 1)
                                                 使い切った
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection