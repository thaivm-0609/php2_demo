@extends('layout.main')
@section('content')
    @if (isset($_SESSION['errors']))
        <ul>
            @foreach ($_SESSION['errors'] as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('store')}}" method="POST">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name">
        </div>  
        <div>
            <label for="">Email</label>
            <input type="text" name="email">
        </div>  
        <div>
            <label for="">Gender</label>
            <select name="gender" value="{{$student->gender}}">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>  
        <button type="submit" name="create">Thêm mới</button>
    </form>
@endsection