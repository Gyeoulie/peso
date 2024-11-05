<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Ensure proper meta tags for PDF rendering -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="flex flex-col m-9 gap-4 w-11/12">
            <!-- Container with border, background color, and fixed height -->
            <div class="flex flex-row gap-4 h-36 w-full border-solid border-b-4 border-blue-400">
                <div class="h-full flex w-40 mr-3 ml-6 justify-center pt-2 rounded-full">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/PESO-Logo.png'))) }}" 
                    alt="Logo" class="mb-2 object-cover">
                </div>

                <div class="h-full flex flex-grow gap-y-2 flex-col border-solid border-l-4 border-blue-400 p-6 pt-2">
                    <div class="text-2xl lg:text-4xl font-bold tracking-widest uppercase text-blue-400">
                        MUNICIPALITY OF PLARIDEL
                    </div>

                    <div class="text-lg lg:text-2xl font-semibold uppercase tracking-wider text-blue-400">
                        PUBLIC EMPLOYMENT SERVICES Office
                    </div>

                    <div class="text-lg lg:text-2xl font-semibold tracking-widest text-blue-400">
                        Province of Bulacan
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>

</html>
