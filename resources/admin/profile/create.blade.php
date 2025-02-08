@extends('layouts.profile')

@section('title', 'プロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール</h2>
                <form action="{{ route('admin.profile.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                               <li>{{ $e }}</li>
                            @endforeach
                         </ul>
                     @endif
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-10">
                             <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="col-md-2">性別</label>
                        <select name="gender">
                        <option value="man"{{ old('gender') == 'man' ? ' selected' : ' '}}>男</option>
                        <option value="woman"{{ old('gender') == 'woman' ? ' selected' : ' '}}>女</option> 
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="introduction" value="{{ old('introduction') }}">
                        </div>
                        </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection



