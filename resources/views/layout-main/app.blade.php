<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
  rel="stylesheet" />
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
<script src="https://cdn.tailwindcss.com/3.2.4"></script>
<script>
  tailwind.config = {
    darkMode: "class",
    theme: {
      fontFamily: {
        sans: ["Roboto", "sans-serif"],
        body: ["Roboto", "sans-serif"],
        mono: ["ui-monospace", "monospace"],
      },
    },
    corePlugins: {
      preflight: false,
    },
  };
</script>
     @livewireStyles
     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
     @vite('resources/css/app.css')
     <style>
          [x-cloak] { display: none !important; }
     </style>
</head>
<body>
     <div class="min-h-screen bg-gray-100">
         @include('partials.navbar')
         @include('partials.championnat-navigation')



         @yield('content')
         
         

          {{-- <div class="mt-4 flex flex-col justify-center items-center">
               <div class="w-2/3 border rouded">
                    <div class="flex justify-center bg-blue-700 p-3 rounded text-xl text-white">
                         <a href="#" class="mr-5 p-2 hover:bg-blue-600 hover:rounded">Match</a>
                         <a href="#" class="p-2 hover:bg-blue-600 hover:rounded">Classement</a>
                    </div>
               </div>

               <div class="w-2/3">
                    @yield('')
               </div>
          </div>
     </div> --}}

     @livewireScripts
</body>
</html>