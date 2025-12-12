<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в админ-панель</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: '#D4AF37',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gold mb-2">Туркестан</h1>
            <p class="text-gray-400">Панель управления</p>
        </div>

        <!-- Login Form -->
        <div class="bg-gray-800 rounded-2xl p-8 shadow-xl">
            <h2 class="text-2xl font-bold text-white mb-6 text-center">Вход</h2>

            @if($errors->any())
                <div class="bg-red-500/20 border border-red-500 text-red-400 px-4 py-3 rounded-lg mb-6">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf
                
                <div class="mb-4">
                    <label for="email" class="block text-gray-300 mb-2">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-gold transition-colors"
                        placeholder="admin@fake.kz"
                        required
                    >
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-300 mb-2">Пароль</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-gold transition-colors"
                        placeholder="••••••••"
                        required
                    >
                </div>

                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center text-gray-400">
                        <input type="checkbox" name="remember" class="mr-2 rounded bg-gray-700 border-gray-600 text-gold focus:ring-gold">
                        Запомнить меня
                    </label>
                </div>

                <button 
                    type="submit" 
                    class="w-full py-3 bg-gold text-white font-semibold rounded-lg hover:bg-yellow-600 transition-colors"
                >
                    Войти
                </button>
            </form>
        </div>

        <!-- Back to site -->
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-gray-400 hover:text-gold transition-colors">
                ← Вернуться на сайт
            </a>
        </div>
    </div>
</body>
</html>
