<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Member</title>
</head>

<body>
    <div>
        <h2><a href="/members/create">Create Members</a></h2>
        <h2><a href="/courses">Courses</a></h2>
        <h2><a href="/points">Points</a></h2>
        <h2><a href="/members">Summary</a></h2>
    </div>

    <h1>EDIT MEMBER</h1>
    <form action="{{ route('members.update', ['id' => $member->id]) }}" method="post">

        @csrf
        @method('put')

        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" id="fullname" value="{{ $member->fullname }}">

        <label for="course_id">Course</label>
        <select name="course_id" id="course_id">
            @foreach ($courses as $course)
                <option value="{{ $course->id }}" {{ $member->course_id == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>

        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ $member->phone }}">

        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{ $member->email }}">

        <input type="submit" value="Update">
    </form>
</body>

</html>
