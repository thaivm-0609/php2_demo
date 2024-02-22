@extends('layout.main')
@section('content')
<table border="1">
    <a href="{{route('create')}}">Thêm mới</a>
    @if (isset($_SESSION['success']))
        <p style="color:green">{{ $_SESSION['success'] }}</p>
    @endif
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Action</th>

    </thead>
    <tbody>
         @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->gender }}</td>
                <th>
                    <a href="{{route('edit/'.$student->id)}}">Sửa</a>
                    <a 
                        href="{{route('delete/'.$student->id)}}" 
                        onclick="return confirm('Bạn có chắc chắn muốn xoá không?')"
                    >Xóa</a>
                </th>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
