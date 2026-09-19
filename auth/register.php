<?php
require_once "../controllers/AuthController.php";

$authController = new AuthController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $authController->register();
};
?>

<head>
    <head>
    <link rel="stylesheet" href="../assets/css/output.css">
</head>
</head>


<div class="min-h-screen bg-[#c0c0c0] flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-[#c0c0c0] border-2 border-black shadow-[6px_6px_0px_#000]">

        <!-- Title Bar -->
        <div class="bg-[#000080] text-white px-3 py-2 font-mono font-bold">
            PERSONAL EXPENSE MANAGER
        </div>

        <!-- Form -->
        <div class="p-6">

            <h1 class="text-2xl font-mono font-bold mb-6 text-black">
                CREATE ACCOUNT
            </h1>

            <form method="POST" class="space-y-5">

                <!-- Name -->
                <div>
                    <label
                            for="name"
                            class="block font-mono font-bold mb-2"
                    >
                        Name
                    </label>

                    <input
                            type="text"
                            name="name"
                            id="name"
                            class="w-full bg-[#7cff00] border-2 border-black px-3 py-2 font-mono outline-none focus:bg-[#9aff3f]"
                    >
                </div>

                <!-- Email -->
                <div>
                    <label
                            for="email"
                            class="block font-mono font-bold mb-2"
                    >
                        Email
                    </label>

                    <input
                            type="email"
                            name="email"
                            id="email"
                            class="w-full bg-[#7cff00] border-2 border-black px-3 py-2 font-mono outline-none focus:bg-[#9aff3f]"
                    >
                </div>

                <!-- Password -->
                <div>
                    <label
                            for="password"
                            class="block font-mono font-bold mb-2"
                    >
                        Password
                    </label>

                    <input
                            type="password"
                            name="password"
                            id="password"
                            class="w-full bg-[#7cff00] border-2 border-black px-3 py-2 font-mono outline-none focus:bg-[#9aff3f]"
                    >
                </div>

                <!-- Register Button -->
                <button
                        type="submit"
                        class="w-full bg-[#808080] border-2 border-black px-4 py-2 font-mono font-bold shadow-[3px_3px_0px_#000] active:translate-x-[2px] active:translate-y-[2px] active:shadow-none"
                >
                    REGISTER
                </button>

            </form>

            <!-- Login -->
            <div class="mt-6 pt-4 border-t-2 border-black text-center font-mono">

                <p class="mb-2">
                    Already have an account?
                </p>

                <a
                        href="login.php"
                        class="font-bold underline"
                >
                    LOGIN
                </a>

            </div>

        </div>
    </div>

</div>