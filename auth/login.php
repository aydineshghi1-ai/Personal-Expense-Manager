<?php
    require_once("../controllers/AuthController.php");

    $authController = new AuthController();

    if($_SERVER["REQUEST_METHOD"] === 'POST') {
        $authController->login();
    };
?>

<head>
    <link rel="stylesheet" href="../assets/css/output.css">
</head>

<body class="min-h-screen bg-zinc-700 flex items-center justify-center font-mono">

    <!-- Retro Window -->
    <form
        method="POST"
        class="w-[420px] bg-[#c0c0c0] border-4 border-black shadow-[8px_8px_0_#404040]"
    >

        <!-- Title Bar -->
        <div class="bg-[#000080] text-white px-3 py-2 flex items-center justify-between border-b-4 border-black">

            <div class="flex items-center gap-2 font-bold">
                <span class="text-[#00ff00]">■</span>
                <span>PERSONAL EXPENSE MANAGER</span>
            </div>

            <button
                type="button"
                class="w-6 h-6 bg-[#c0c0c0] text-black border-2 border-white border-r-black border-b-black flex items-center justify-center font-bold leading-none"
            >
                ×
            </button>

        </div>


        <!-- Window Content -->
        <div class="p-8">

            <!-- Header -->
            <div class="mb-8">

                <h1 class="text-3xl font-black tracking-tight">
                    LOGIN
                </h1>

                <div class="mt-2 h-1 bg-black"></div>

                <p class="mt-3 text-sm font-bold text-[#404040]">
                    ENTER YOUR ACCOUNT INFORMATION <br> 
                    (It’s in your own best interest to be right.)
                </p>

            </div>


            <!-- Inputs -->
            <div class="flex flex-col gap-6">

                <!-- Email -->
                <div class="flex flex-col gap-2">

                    <label
                        for="email"
                        class="text-lg font-black"
                    >
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="w-full h-12 px-3
                               bg-[#7cff00]
                               text-black
                               border-4 border-black
                               outline-none
                               font-mono font-bold
                               shadow-[4px_4px_0_#404040]
                               focus:bg-[#9cff33]
                               focus:shadow-[2px_2px_0_#404040]"
                    >

                </div>


                <!-- Password -->
                <div class="flex flex-col gap-2">

                    <label
                        for="password"
                        class="text-lg font-black"
                    >
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="w-full h-12 px-3
                               bg-[#7cff00]
                               text-black
                               border-4 border-black
                               outline-none
                               font-mono font-bold
                               shadow-[4px_4px_0_#404040]
                               focus:bg-[#9cff33]
                               focus:shadow-[2px_2px_0_#404040]"
                    >

                </div>

            </div>


            <!-- Login Button -->
            <div class="mt-8 flex justify-end">

                <button
                    type="submit"
                    class="px-8 py-3
                           bg-[#808080]
                           text-black
                           border-4 border-white
                           border-r-black
                           border-b-black
                           font-mono
                           text-lg
                           font-black
                           shadow-[4px_4px_0_#404040]
                           active:translate-x-[3px]
                           active:translate-y-[3px]
                           active:shadow-none
                           hover:bg-[#a0a0a0]"
                >
                    [ LOGIN ]
                </button>

            </div>


            <!-- Status Bar -->
            <div
                class="mt-8
                       border-2 border-[#404040]
                       border-r-white
                       border-b-white
                       px-3 py-2
                       text-xs
                       font-bold
                       text-[#404040]"
            >
                SYSTEM READY...
            </div>

        </div>

    </form>

</body>