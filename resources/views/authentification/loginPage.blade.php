<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Tailwind Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#090d16] min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    <div class="absolute -top-12 -left-12 w-80 h-80 bg-indigo-600/60 rounded-full blur-[90px] animate-pulse"></div>
    <div class="absolute -bottom-12 -right-12 w-80 h-80 bg-purple-600/60 rounded-full blur-[90px] animate-pulse delay-700"></div>
    <div class="relative z-10 w-full max-w-md p-8 sm:p-10 bg-white/[0.03] border border-white/10 backdrop-blur-xl rounded-3xl shadow-2xl">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white tracking-tight mb-2">Welcome Back</h2>
            <p class="text-sm text-slate-400">Enter your credentials to access your account</p>
        </div>
        <form class="space-y-5"  method="post" action="{{ route("loginLogic") }}">
            @method("post")
            @csrf
            <div>
                <label for="email" class="block text-xs font-medium text-slate-300 mb-2">Email Address</label>
                <input type="email" id="email" required placeholder="name@company.com" name="email"
                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:bg-white/[0.08] focus:ring-1 focus:ring-indigo-500 transition-all duration-200">
            </div>
            <div>
                <label for="password" class="block text-xs font-medium text-slate-300 mb-2">Password</label>
                <div class="relative flex items-center">
                    <input type="password" id="password" required placeholder="••••••••" name="password"
                        class="w-full px-4 py-3 pr-12 bg-white/5 border border-white/10 rounded-xl text-white text-sm placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:bg-white/[0.08] focus:ring-1 focus:ring-indigo-500 transition-all duration-200">
                    <button type="button" id="togglePassword" class="absolute right-4 text-slate-500 hover:text-slate-300 transition-colors" value="{{ old("email") }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
            </div>
            @error("email")
                <p>{{$message}}</p>
            @enderror
            <button type="submit"
                class="w-full py-3.5 px-4 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 active:scale-[0.99] transition-all duration-200">
                Sign In
            </button>
        </form>
    </div>
</body>
</html>
