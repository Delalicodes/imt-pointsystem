<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .fadeIn {
            animation: fadeIn ease-in 0.5s;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
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

    <form action="{{ route('points.store') }}" method="post" class="mb-8">
        @csrf
        @method('post')
        <label for="member_id" class="block font-semibold mb-2">Member</label>
        <select name="member_id" id="member_id"
            class="border rounded-lg px-2 py-1 mb-4 w-40 focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-500">
            @foreach ($members as $member)
                <option value="{{$member->id}}">{{$member->fullname}}</option>
            @endforeach
        </select>

        <label for="point" class="block font-semibold mb-2">Points</label>
        <input type="number" name="point" id="point"
            class="border rounded-lg px-2 py-1 mb-4 w-40 focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-500">
        <button type="submit"
            class="bg-blue-500 text-white font-semibold px-4 py-1 rounded-lg hover:bg-blue-700 transition duration-300">Submit</button>
    </form>

    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-center">Full Name</th>
                    <th class="px-4 py-2 text-center">Points</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($points->reverse() as $point)
                    <tr class="fadeIn">
                        <td class="border px-4 py-2 text-center">{{ $point->member->fullname }}</td>
                        <td class="border px-4 py-2 text-center">{{ $point->point }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</body>

</html>
