@extends('app')

@section('title')
    ユーザー作成画面
@endsection

@section('content')
    <a href="{{ route('dashboard') }}" class="btn btn-danger">戻る</a>
    <form action="{{ route('user_store') }}" method="post">
        @csrf
        name: <input type="text" name="name" id="">
        email: <input type="email" name="email" id="">
        memo: <input type="text" name="memo" id="">
        password: <input type="text" name="password" id="">
        <input type="submit" value="登録" class="btn btn-primary">
        @if (session('message'))
            <div class="alert alert-primary">{{ session('message') }}</div>
        @endif
    </form>
@endsection
