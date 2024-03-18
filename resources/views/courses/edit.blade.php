<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h2>Edit Course</h2>

    <form action="{{route("courses.update",['id' => $course->id])}}" method="post">
        @csrf
        @method('put')
        <label for="">Name</label>
        <input type="text" name="name" value="{{$course->name}}">
        <input type="submit">
    </form>
</body>
</html>
