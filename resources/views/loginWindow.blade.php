<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="grid  place-items-center h-screen">
        <div class="flex">
            <div class="m-2">
                <p>Login</p>
                <form action="{{ route("adminLogin") }}" method="post" class="border flex flex-col  w-fit ">

                    @csrf
                    <input type="email" name="email" id="" placeholder="admin@mail.com" class="border mx-5 my-3 p-1.5">
                    <input type="password" name="password" id="" placeholder="************" class="border mx-5 m-2 p-1.5">
                    <button type="submit" class="border m-5 bg-black text-white p-1.5">Login</button>
                </form>
            </div>
            <div class="m-2">
                <p>SignUp</p>
                <form action="{{ route('adminSignup') }}" method="post" class="border flex flex-col w-fit">
                    @csrf
                    <input type="text" name="name" placeholder="Your Name" class="border mx-5 my-3 p-1.5" required>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@mail.com" class="border mx-5 my-3 p-1.5" required>

                    <input type="password" name="password" placeholder="************" class="border mx-5 m-2 p-1.5" required>

                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="border mx-5 m-2 p-1.5" required>

                    <button type="submit" class="border m-5 bg-black text-white p-1.5">SignUp</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>