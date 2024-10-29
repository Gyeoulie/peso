<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Report</title>
</head>

<body class="bg-white p-10">

    <div class="flex items-center mb-10">
        <img src="{{ asset('assets/img/PESO-Logo.png') }}" alt="Logo" class="h-16 w-auto mr-4">
        <h1 class="text-3xl font-bold text-gray-800">Public Employment Service Office</h1>
    </div>

    <div class="bg-gray-100 p-6 rounded-lg shadow-md mb-10">
        <h2 class="text-2xl font-semibold text-gray-700">Report Title</h2>
        <p class="mt-2 text-gray-600">This is where your report content will go. You can add sections, tables, and other
            content as needed.</p>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200 text-gray-600 text-left">
                    <th class="py-3 px-4 border-b">ID</th>
                    <th class="py-3 px-4 border-b">Name</th>
                    <th class="py-3 px-4 border-b">Position</th>
                    <th class="py-3 px-4 border-b">Date Hired</th>
                    <th class="py-3 px-4 border-b">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">1</td>
                    <td class="py-2 px-4 border-b">John Doe</td>
                    <td class="py-2 px-4 border-b">Employment Officer</td>
                    <td class="py-2 px-4 border-b">2022-01-15</td>
                    <td class="py-2 px-4 border-b">Active</td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">2</td>
                    <td class="py-2 px-4 border-b">Jane Smith</td>
                    <td class="py-2 px-4 border-b">Job Coach</td>
                    <td class="py-2 px-4 border-b">2021-07-20</td>
                    <td class="py-2 px-4 border-b">Active</td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">3</td>
                    <td class="py-2 px-4 border-b">Mike Johnson</td>
                    <td class="py-2 px-4 border-b">Intern</td>
                    <td class="py-2 px-4 border-b">2023-05-10</td>
                    <td class="py-2 px-4 border-b">Pending</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
