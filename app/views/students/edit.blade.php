@extends('layout.main')
@section('content')
    @if (isset($_SESSION['errors']))
        <ul>
            @foreach ($_SESSION['errors'] as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('update/'.$student->id)}}" method="POST">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{$student->name}}">
        </div>  
        <div>
            <label for="">Email</label>
            <input type="text" name="email" value="{{$student->email}}">
        </div>  
        <div>
            <label for="">Gender</label>
            <select name="gender" value="{{$student->gender}}">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>  
        <button type="submit" name="update">Sửa</button>
    </form>
@endsection