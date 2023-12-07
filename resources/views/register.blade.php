<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/css/app.js')
</head>
<body>
    <form method="POST" action="{{url('register')}}">
        @csrf
        <div class="bg-white h-[50rem] flex flex-col">
            <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
                <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                    <h1 class="mb-8 text-3xl text-center">Sign up</h1>
                    <input 
                        type="text"
                        class="block border border-gray-400 w-full p-3 rounded mb-4"
                        name="nama"
                        placeholder="Full Name" />
    
                    <input 
                        type="text"
                        class="block border border-gray-400 w-full p-3 rounded mb-4"
                        name="email"
                        placeholder="Email" />
    
                    <input 
                        type="password"
                        class="block border border-gray-400 w-full p-3 rounded mb-4"
                        name="password"
                        placeholder="Password" />   
    
                    <button
                        name="submit"
                        type="submit"
                        class="w-full text-center py-3 rounded bg-green-400 text-white hover:bg-green-600 focus:outline-none my-1"
                    >Create Account</button>
    
                    <div class="text-center text-sm text-grey-dark mt-4">
                        By signing up, you agree to the 
                        <a class="no-underline border-b border-gray-500 hover:text-blue-500" href="#">
                            Terms of Service
                        </a> and 
                        <a class="no-underline border-b border-gray-500 hover:text-blue-500" href="#">
                            Privacy Policy
                        </a>
                    </div>
                </div>
    
                <div class="text-grey-dark mt-6">
                    Already have an account? 
                    <a class="no-underline border-b border-blue-500 hover:text-blue-400" href="{{url('login')}}">
                        Log in
                    </a>.
                </div>
            </div>
        </div>
    </form>
</body>
</html>