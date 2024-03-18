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

    <div class="mt-8">
        <table class="min-w-full bg-gray-200 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="px-4 py-2 text-center">Full Name</th>
                    <th class="px-4 py-2 text-center">Course</th>

                    <th class="px-4 py-2 text-center">Points</th>
                    <th class="px-4 py-2 text-center">Month</th>
                    <th class="px-4 py-2 text-center">Edit</th>
                    <th class="px-4 py-2 text-center">Delete</th>

                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($members->reverse() as $member)
                <tr>
                    <td class="border px-4 py-2 text-center">{{ $member->fullname }}</td>
                    <td class="border px-4 py-2 text-center">{{ $member->course->name }}</td>


                    <td class="border px-4 py-2 text-center">
                        <?php $totalPoints = $member->points->sum('point'); ?>
                        {{ $totalPoints }}
                    </td>

                    <td class="border px-4 py-2 text-center">{{ $member->created_at->format('F d, Y') }}</td>

                    <td class="border px-4 py-2 text-center"><a href="{{ route('members.edit', ['id' => $member->id]) }}"
                            class="text-blue-500">Edit</a></td>
                    <td class="border px-4 py-2 text-center">
                        <form action="{{ route('members.destroy', ['id' => $member->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
