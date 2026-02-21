@extends('admin-theme')
@section('title', 'Категории')
@section('content')
    <h1 class="mb-2">Категории</h1>
    <a href="{{ route('admin.categories.create') }}" class="mb-2 btn btn--primary btn--fit-content">Добавить</a>

    <table class="table">
        <thead>
        <tr>
            <th>Название</th>
            <th>Изменить</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn--primary btn--small">Изменить</a>
                </td>
                <td>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn--danger btn--small">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
