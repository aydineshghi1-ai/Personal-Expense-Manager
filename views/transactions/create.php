<head>
    <link rel="stylesheet" href="/assets/css/output.css">
</head>

<body class="min-h-screen bg-[#c0c0c0] flex items-center justify-center p-3 sm:p-5 font-mono">

    <form
        method="POST"
        action="../../transactions/create.php"
        enctype="multipart/form-data"
        class="w-full max-w-lg
       max-h-[95vh]
       overflow-y-auto
       bg-[#c0c0c0]
       border-4 border-black
       shadow-[6px_6px_0_#404040]"
    >

        <!-- Window Header -->
        <div class="bg-[#000080]
                    text-white
                    px-4 py-3
                    border-b-4 border-black
                    flex items-center justify-between">

            <span class="font-black">
                CREATE_TRANSACTION.EXE
            </span>

            <span class="bg-[#c0c0c0] text-black px-2 border-2 border-white border-r-black border-b-black font-black">
                ×
            </span>

        </div>


        <!-- Form Content -->
        <div class="p-8">

            <h1 class="text-3xl font-black mb-2">
                CREATE TRANSACTION
            </h1>

            <div class="h-1 bg-black mb-8"></div>


            <!-- Category -->
            <div class="flex flex-col gap-2 mb-5">

                <label
                    for="categoryId"
                    class="font-black text-lg"
                >
                    CATEGORY
                </label>

                <select
                        name="categoryId"
                        id="categoryId"
                        class="h-12
                        px-3
                        bg-[#7cff00]
                        text-black
                        border-4 border-black
                        outline-none
                        font-bold
                        shadow-[4px_4px_0_#404040]"
                        >
                    <?php foreach ($categories as $category): ?>

                        <option
                                value="<?= e($category['id']) ?>"
                                data-type="<?= e($category['type']) ?>"
                        >
                            <?= e(strtoupper($category['name'])) ?>
                        </option>

                    <?php endforeach; ?>
                </select>

            </div>


            <!-- Type -->
            <div class="flex flex-col gap-2 mb-5">

                <label
                    for="type"
                    class="font-black text-lg"
                >
                    TYPE
                </label>

                <select
                    name="type"
                    id="type"
                    class="h-12
                           px-3
                           bg-[#7cff00]
                           text-black
                           border-4 border-black
                           outline-none
                           font-bold
                           shadow-[4px_4px_0_#404040]"
                >
                    <option value="expense">EXPENSE</option>
                    <option value="income">INCOME</option>
                </select>

            </div>


            <!-- Amount -->
            <div class="flex flex-col gap-2 mb-5">

                <label
                    for="amount"
                    class="font-black text-lg"
                >
                    AMOUNT
                </label>

                <input
                    type="number"
                    name="amount"
                    id="amount"
                    step="0.01"
                    class="h-12
                           px-3
                           bg-[#7cff00]
                           text-black
                           border-4 border-black
                           outline-none
                           font-bold
                           shadow-[4px_4px_0_#404040]
                           focus:bg-[#9cff33]"
                >

            </div>


            <!-- Description -->
            <div class="flex flex-col gap-2 mb-5">

                <label
                    for="description"
                    class="font-black text-lg"
                >
                    DESCRIPTION
                </label>

                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="px-3 py-2
                           bg-[#7cff00]
                           text-black
                           border-4 border-black
                           outline-none
                           font-bold
                           font-mono
                           resize-none
                           shadow-[4px_4px_0_#404040]
                           focus:bg-[#9cff33]"
                ></textarea>

            </div>


            <!-- Transaction Date -->
            <div class="flex flex-col gap-2 mb-5">

                <label
                    for="transactionDate"
                    class="font-black text-lg"
                >
                    TRANSACTION DATE
                </label>

                <input
                    type="date"
                    name="transactionDate"
                    id="transactionDate"
                    class="h-12
                           px-3
                           bg-[#7cff00]
                           text-black
                           border-4 border-black
                           outline-none
                           font-bold
                           shadow-[4px_4px_0_#404040]"
                >

            </div>


            <!-- Receipt -->
            <div class="flex flex-col gap-2 mb-8">

                <label
                    for="receipt"
                    class="font-black text-lg"
                >
                    RECEIPT
                </label>

                <input
                    type="file"
                    name="receipt"
                    id="receipt"
                    class="w-full
                           bg-[#808080]
                           text-black
                           border-4 border-black
                           p-2
                           font-bold
                           shadow-[4px_4px_0_#404040]"
                >

                <span class="text-xs font-bold text-[#404040]">
                    JPG / PNG / PDF — MAX 2MB
                </span>

            </div>


            <!-- Submit -->
            <div class="flex justify-end">

                <button
                    type="submit"
                    class="px-7 py-3
                           bg-[#808080]
                           text-black
                           border-4 border-white
                           border-r-black
                           border-b-black
                           font-black
                           text-lg
                           shadow-[4px_4px_0_#404040]
                           hover:bg-[#a0a0a0]
                           active:translate-x-[3px]
                           active:translate-y-[3px]
                           active:shadow-none"
                >
                    [ CREATE TRANSACTION ]
                </button>

            </div>

        </div>

    </form>

    <script>
        const typeSelect = document.getElementById('type');
        const categorySelect = document.getElementById('categoryId');

        function filterCategories() {

            const selectedType = typeSelect.value;

            let firstVisibleCategory = null;

            Array.from(categorySelect.options).forEach(option => {

                const categoryType = option.dataset.type;

                if (categoryType === selectedType) {
                    option.hidden = false;

                    if (!firstVisibleCategory) {
                        firstVisibleCategory = option;
                    }

                } else {
                    option.hidden = true;
                }

            });

            if (firstVisibleCategory) {
                categorySelect.value = firstVisibleCategory.value;
            }
        }

        typeSelect.addEventListener('change', filterCategories);

        filterCategories();
    </script>

</body>