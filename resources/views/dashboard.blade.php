@extends('app')

@section('title')
    ダッシュボード画面
@endsection

@section('content')
    <a href="{{ route('logout') }}" class="btn btn-outline-danger">ログアウト</a>
    @if (Auth::user()->admin == true)
        <a href="{{ route('user_create') }}" class="btn btn-primary">ユーザー作成</a>
        <table class="table table-bordered">
            <th>name</th>
            <th>email</th>
            <th>memo</th>
            <th>admin</th>
            <th>permission</th>
            <th></th>
            <th></th>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->memo }}</td>
                    <td>{{ $user->admin }}</td>
                    <td>{{ $user->permission }}</td>
                    <td><a href="{{ route('user_edit', $user->id) }}" class="btn btn-success">編集</a></td>
                    <td><a href="{{ route('user_destroy', $user->id) }}" class="btn btn-danger"
                            onclick="return confirm('本当に削除しますか')">削除</a></td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
