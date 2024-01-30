<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Gallery Photo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .scrollbar-hide {
            scrollbar-width: none;
            /* Untuk Firefox */
            -ms-overflow-style: none;
            /* Untuk Internet Explorer */
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
            /* Untuk browser berbasis WebKit (Chrome, Safari, dll.) */
        }
    </style>
</head>

<body>
    <div class="h-screen flex justify-center items-center bg-neutral-600">
        <div class="h-[26em] w-[50em] p-4 bg-white rounded-lg">
            <p class="pb-2 font-medium text-[1.5rem]">mending lu daftar dah</p>
            <form 
            required 
            action="register_process.php" 
            method="post">
                <div class="flex pb-[1em]">
                    <div class="flex flex-col gap-[1em] w-[50%]">
                        <div class="flex flex-col">
                            <label 
                            for="username" 
                            class="pb-1">Username</label>
                            <input 
                            type="text" 
                            name="username" id="username"
                            class="p-2 border-2 border-gray-300 rounded-md w-[93%]">
                        </div>
                        <div class="flex flex-col">
                            <label 
                            for="email" 
                            class="pb-1">Email</label>
                            <input 
                            type="email" 
                            name="email" 
                            id="email"
                            class="p-2 border-2 border-gray-300 rounded-md w-[93%]">
                        </div>
                    </div>
                    <div class="flex flex-col gap-[1em] w-[50%]">
                        <div class="flex flex-col">
                            <label 
                            for="fullname" 
                            class="pb-1">Fullname</label>
                            <input 
                            type="text" 
                            name="fullname" 
                            id="fullname"
                            class="p-2 border-2 border-gray-300 rounded-md w-[95%]">
                        </div>
                        <div class="flex flex-col">
                            <label 
                            for="password" 
                            class="pb-1">Password</label>
                            <input 
                            type="password" 
                            name="password" 
                            id="password"
                            class="p-2 border-2 border-gray-300 rounded-md w-[95%]">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <label 
                    for="address" 
                    class="pb-1">Address</label>
                    <input 
                    for="address" 
                    name="address" 
                    id="address"
                    class="p-2 border-2 border-gray-300 rounded-md w-[97.5%]">
                    </input>
                    <div class="pt-[1em]">
                        <input type="submit" value="Register"
                            class="w-[7em] h-[2.5em] bg-blue-500 text-white rounded-md">
                    </div>
            </form>
            <p class="pt-[1em]">Sudah daftar? <a href="login.php" class="text-blue-500">Login</a></p>
        </div>
    </div>
</body>

</html>