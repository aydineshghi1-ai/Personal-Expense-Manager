<?php foreach ($categories as $category): ?>
    <head>
        <link
                rel="stylesheet"
                href="/assets/css/output.css"
        >
    </head>
    <div
            class="bg-[#c0c0c0]
               border-4 border-black
               shadow-[6px_6px_0_#404040]
               font-mono"
    >

        <!-- Card Header -->

        <div
                class="bg-[#000080]
                   text-white
                   border-b-4 border-black
                   px-3 py-2
                   font-black"
        >
            CATEGORY.EXE
        </div>


        <!-- Category Info -->

        <div class="p-4">

            <h3
                    class="text-xl
                       font-black
                       uppercase
                       mb-3
                       break-words"
            >
                <?= e($category['name']) ?>
            </h3>

            <div
                    class="bg-[#7cff00]
                       border-4 border-black
                       px-3 py-2
                       mb-4
                       font-black"
            >
                TYPE:
                <?= e($category['type']) ?>
            </div>


            <!-- Actions -->

            <div class="flex flex-col sm:flex-row gap-3">

                <!-- Edit -->

                <a
                        href="edit.php?id=<?= e($category['id']) ?>"
                        class="bg-[#808080]
                           border-4 border-black
                           px-4 py-2
                           font-black
                           text-center
                           shadow-[4px_4px_0_#000]
                           hover:bg-[#a0a0a0]
                           active:translate-x-[3px]
                           active:translate-y-[3px]
                           active:shadow-none"
                >
                    EDIT
                </a>


                <!-- Delete -->

                <form
                        method="POST"
                        action="delete.php"
                        class="flex-1"
                >

                    <input
                            type="hidden"
                            name="csrf_token"
                            value="<?= e(csrfToken()) ?>"
                    >

                    <input
                            type="hidden"
                            name="categoryId"
                            value="<?= e($category['id']) ?>"
                    >

                    <button
                            type="submit"
                            class="w-full
                               bg-[#808080]
                               border-4 border-black
                               px-4 py-2
                               font-black
                               shadow-[4px_4px_0_#000]
                               hover:bg-[#a0a0a0]
                               active:translate-x-[3px]
                               active:translate-y-[3px]
                               active:shadow-none
                               cursor-pointer"
                    >
                        DELETE
                    </button>

                </form>

            </div>

        </div>

    </div>

<?php endforeach; ?>