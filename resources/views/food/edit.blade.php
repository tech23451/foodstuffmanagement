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
                    <form action="" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2" for="expiration_date">賞味期限</label>
                    <div class="col-md-10">
            
                            <input type="checkbox" id="use_time" name="use_time" value="1" 
                            {{ old('use_time', $food_form->use_time) ? 'checked' : '' }}>
                            <label for="use_time">時刻を使用する</label>

            
                    @if(old('use_time', $food_form->use_time))
                
                            <input type="datetime-local" class="form-control" id="expiration_date" name="expiration_date" 
                            value="{{ old('expiration_date', $food_form->expiration_date) }}">
                    @else
                
                            <input type="date" class="form-control" id="expiration_date" name="expiration_date" 
                            value="{{ old('expiration_date', $food_form->expiration_date) }}">
                    @endif
                    </div>
                    </div>

                                        <button type="submit">送信</button>
                    </form>
                    
                    </div>
                
                    <div class="form-group row">
                        <label class="col-md-2" for="purchase_date">購入日</label>
                        <div class="col-md-10">
                        <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="{{ old('purchase_date') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $food_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $food_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>