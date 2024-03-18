<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-4">

    <nav class="bg-blue-600 p-4 mb-8">
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

    <form action="{{ route('courses.store') }}" method="post" class="mb-8">
        @csrf
        @method('post')
        <div class="flex mb-4">
            <label for="name" class="mr-2 font-semibold">Name:</label>
            <input type="text" name="name" id="name"
                class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-500 flex-1">
        </div>
        <button type="submit"
            class="bg-blue-500 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Submit</button>
    </form>

    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left">Id</th>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr class="fadeIn">
                        <td class="border px-4 py-2 text-center">{{ $course->id }}</td>
                        <td class="border px-4 py-2 text-center">{{ $course->name }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('courses.edit', ['id' => $course->id]) }}"
                                class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                            <form action="{{ route('courses.destroy', ['id' => $course->id]) }}" method="post"
                                class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="text-red-500 hover:text-red-700 focus:outline-none">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
