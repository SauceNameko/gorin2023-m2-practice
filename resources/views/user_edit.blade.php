@extends('app')

@section('title')
    ユーザー作成画面
@endsection

@section('content')
    <a href="{{ route('dashboard') }}" class="btn btn-danger">戻る</a>
    <form action="{{ route('user_update', $user->id) }}" method="post">
        @csrf
        name: <input type="text" name="name" id="" value="{{ $user->name }}">
        email: <input type="email" name="email" id="" value="{{ $user->email }}">
        memo: <input type="text" name="memo" id="" value="{{ $user->memo }}">
        permission: <input type="checkbox" name="permission" id="" {{ $user->permission == 1 ? 'checked' : '' }}>
        <input type="submit" value="編集" class="btn btn-success">
        @if (session('message'))
            <div class="alert alert-primary">{{ session('message') }}</div>
        @endif
    </form>
@endsection
