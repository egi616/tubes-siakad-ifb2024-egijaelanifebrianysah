<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50">

    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">

            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Selamat Datang</h2>
                <p class="text-sm text-slate-500 mt-2">Silakan masuk untuk melanjutkan</p>
            </div>
            
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div class="space-y-1.5">
                        <x-input-label for="email" value="Email Address" />
                        <x-text-input type="email" id="email" name="email" required />
                    </div>
                    <div class="space-y-1.5">
                        <x-input-label for="password" value="Password" />
                        <x-text-input type="password" id="password" name="password" required />
                    </div>
                    <x-primary-button>
                        Masuk ke Akun
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>