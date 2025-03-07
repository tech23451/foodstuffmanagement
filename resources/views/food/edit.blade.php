@extends('layouts.admin')
@section('title', '食材の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-m-8 mx-auto">
                <h2>食材編集</h2>
                <form action="{{ route('food.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                    
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">食材</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="ingreduent" value="{{ $food_form->ingreduent }}">
                        </div>
                    </div>
                    
        @csrf
        @method('POST')

    <!-- 賞味期限日付 -->
                    <div class="form-group row">
                        <label class="col-md-2" for="expiration_date">賞味期限</label>
                        <div class="col-md-10">
                            <input type="date" name="expiration_date" id="expiration_date" value="{{ old('expiration_date', $food_form->expiration_date) }}">
                        </div>
                    </div>
    <!-- 賞味期限時間 -->
                    <div class="form-group row">
                        <label class="col-md-2" for="expiration_time">賞味期限時間</label>
                        <div class="col-md-10">
                        <select name="expiration_time" id="expiration_time">
                        <option value="24" {{ old('expiration_time', $food_form->expiration_time) == 24 ? 'selected' : '' }}>指定なし</option>
                        @for ($i = 0; $i <= 23; $i++)
                        <option value="{{ $i }}" {{ old('expiration_time', $food_form->expiration_time) == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                        </div>
                    </div>
    <!-- その他の入力項目 -->
                
                    <div class="form-group row">
                        <label class="col-md-2" for="purchase_date">購入日</label>
                        <div class="col-md-10">
                        <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="{{ old('purchase_date',$food_form->purchase_date) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                            <img src="/storage/image/{{ $food_form->image_path }}" style="width:auto;height:180px;">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-2" for="">状態</label>
    <div class="form-check form-check-inline">
        <input type="radio" name="condition" class="form-check-input" id="condition1" value="0" {{ old ('condition', $food_form->condition) == '0' ? 'checked' : '' }}>
        <label for="condition1" class="form-check-label">使用中</label>
    </div>
    <div class="form-check form-check-inline">
        <input type="radio" name="condition" class="form-check-input" id="condition2" value="1" {{ old ('condition', $food_form->condition) == '1' ? 'checked' : '' }}>
        <label for="condition2" class="form-check-label">使い切った</label>
    </div>
    </label>
</div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $food_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>

                <tr>
                    <td><a href="http://127.0.0.1:8080/home">一覧に戻る</a></td>
                </tr>