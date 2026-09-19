<head>
    <link
            rel="stylesheet"
            href="/assets/css/output.css"
    >
</head>
<form
        method="POST"
        action="../../categories/create.php"
        class="bg-[#c0c0c0]
           border-4 border-black
           shadow-[8px_8px_0_#404040]
           p-5
           max-w-xl
           mx-auto
           font-mono"
>

    <!-- Window Header -->

    <div
            class="bg-[#000080]
               text-white
               border-4 border-black
               px-3 py-2
               mb-6
               font-black
               tracking-wide"
    >
        CREATE_CATEGORY.EXE
    </div>


    <!-- CSRF -->

    <input
            type="hidden"
            name="csrf_token"
            value="<?= e(csrfToken()) ?>"
    >


    <!-- Category Name -->

    <div class="mb-5">

        <label
                for="name"
                class="block
                   mb-2
                   font-black
                   uppercase"
        >
            Category Name
        </label>

        <input
                type="text"
                name="name"
                id="name"
                class="w-full
                   bg-[#7cff00]
                   border-4 border-black
                   px-3 py-3
                   font-mono
                   font-bold
                   text-black
                   outline-none
                   focus:bg-[#9cff33]"
        >

    </div>


    <!-- Category Type -->

    <div class="mb-6">

        <label
                for="type"
                class="block
                   mb-2
                   font-black
                   uppercase"
        >
            Type
        </label>

        <select
                name="type"
                id="type"
                class="w-full
                   bg-[#7cff00]
                   border-4 border-black
                   px-3 py-3
                   font-mono
                   font-bold
                   text-black
                   outline-none
                   cursor-pointer
                   focus:bg-[#9cff33]"
        >

            <option value="expense">
                Expense
            </option>

            <option value="income">
                Income
            </option>

        </select>

    </div>


    <!-- Submit -->

    <button
            type="submit"
            class="w-full
               bg-[#808080]
               border-4 border-black
               px-4 py-3
               font-mono
               font-black
               uppercase
               shadow-[4px_4px_0_#000]
               active:translate-x-[3px]
               active:translate-y-[3px]
               active:shadow-none
               hover:bg-[#a0a0a0]
               cursor-pointer"
    >
        CREATE CATEGORY
    </button>

</form>