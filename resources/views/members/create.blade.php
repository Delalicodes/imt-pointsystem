<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Member</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Keyframe animation for fadeIn effect */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animation class for fadeIn effect */
        .fadeIn {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>

<body class="bg-gray-100 p-4">

    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <img src="{{asset('images/logo.png')}}" alt="" class="w-20">
            <div class="flex space-x-4">
                <a href="/members/create" class="text-white hover:text-gray-300">Create Members</a>
                <a href="/courses" class="text-white hover:text-gray-300">Courses</a>
                <a href="/points" class="text-white hover:text-gray-300">Points</a>
                <a href="/members" class="text-white hover:text-gray-300">Summary</a>
            </div>
        </div>
    </nav>

    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md mb-10 mt-8 fadeIn"> <!-- Added mt-8 for top margin -->
        <h1 class="text-3xl font-bold mb-4 text-gray-800">Create Member</h1>
        <form action="{{ route('members.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="fullname" class="block text-sm font-semibold text-gray-600">Full Name</label>
                <input type="text" name="fullname" id="fullname" value="{{ old('fullname') }}"
                    class="border-gray-300 border rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="course_id" class="block text-sm font-semibold text-gray-600">Course</label>
                <select name="course_id" id="course_id"
                    class="border-gray-300 border rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-semibold text-gray-600">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                    class="border-gray-300 border rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-600">Email</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}"
                    class="border-gray-300 border rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="bg-blue-500 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Create</button>
        </form>
    </div>

</body>

</html>
