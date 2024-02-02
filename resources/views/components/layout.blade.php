<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
 <style>.main{
    position: absolute;
    top: 50%;
    width: 100%;
    transform: translateY(-50%);
    background: rgb(0,212,255);
  background: linear-gradient(90deg, rgba(0,212,255,1) 17%, rgba(4,116,192,1) 42%, rgba(6,52,150,1) 85%, rgba(7,31,136,1) 100%, rgba(153,153,172,1) 100%);
  }
  .counting{
    padding: 40px 0;
    width: 100%;
  }
  .inner-div{
    max-width: 1200px;
    margin: auto;
    display: flex;
  
  }
  .colum{
    flex: 1;
    text-align: center;
    padding: 20px;
    color: #fff;
    text-transform: uppercase;
    border:3px solid #000;
    border-radius: 5px;
    margin-left: 15px;
  }
  .colum i{
    font-size: 40px;
    color: #ffffff;
  }
  .number{
    font-size: 40px;
    margin: 20px 0;
  }</style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#205375",
                    },
                },
            },
        };
    </script>
    <title>Adventure Time</title>
</head>

<body class="mb-48" style="background-color: #EFEFEF">
    <nav class="flex justify-between items-center " style="background-image: linear-gradient(to bottom, #000d1bcc, #000d1b08);">
        <a href="/"><img class="w-36 ml-16" src="{{ asset('images/logo.png') }}" alt="" class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg p-4">
            @auth
                <li>
                    <a href="/adventure/manage" class="hover:text-laravel text-white font-bold"> Account
                    </a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel text-white font-bold">
                        favorite</a>
                </li>
                <li>
                    <form action="/logout" class="inline" method="POST">
                        @csrf
                        <button class="hover:text-laravel text-white font-bold" type="submit">
                            log-out</button>

                    </form>
                </li>
            @else
                <li>
                    <a href="/register" class="hover:text-laravel text-white font-bold"> Register</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel text-white font-bold">
                        Login</a>
                </li>
            @endauth
        </ul>
    </nav>
    <main>
        {{-- @yield('content') --}}
        {{ $slot }}
    </main>

    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold  text-white h-16 mt-24 opacity-90 md:justify-center">
        {{-- <p class="ml-2">Copyright &copy; 2024, All Rights reserved</p> --}}

        <a href="/adventure/create" class="absolute top-1/5 right-10 bg-black text-white py-2 px-5">Share Your Adventures</a>
    </footer>

    <x-flash-message />
</body>

</html>
