<!-- Page -->

<head>
    <link rel="stylesheet" href="/assets/css/output.css">
</head>

<body class="font-mono">

<div class="min-h-screen bg-[#c0c0c0] p-6 font-mono">

    <!-- Page Header -->
    <div class="flex items-center justify-between mb-6">

        <h1 class="text-3xl font-black">
            TRANSACTIONS
        </h1>

        <a
            href="create.php"
            class="bg-[#808080]
                   text-black
                   px-5 py-3
                   border-4 border-white
                   border-r-black
                   border-b-black
                   font-black
                   shadow-[4px_4px_0_#404040]
                   hover:bg-[#a0a0a0]
                   active:translate-x-[3px]
                   active:translate-y-[3px]
                   active:shadow-none"
        >
            + CREATE TRANSACTION
        </a>

    </div>


    <!-- Filter Window -->
    <div class="bg-[#c0c0c0]
                border-4 border-black
                shadow-[6px_6px_0_#404040]
                mb-8">

        <!-- Window Header -->
        <div class="bg-[#000080]
                    text-white
                    px-4 py-2
                    border-b-4 border-black
                    font-black">
            TRANSACTION_FILTER.EXE
        </div>


        <!-- Filter Form -->
        <form
            method="GET"
            action="index.php"
            class="p-5"
        >

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-5">

                <!-- Search -->
                <div class="flex flex-col gap-2">

                    <label
                        for="search"
                        class="font-black"
                    >
                        SEARCH
                    </label>

                    <input
                        type="text"
                        id="search"
                        name="search"
                        value="<?= e($_GET['search'] ?? '') ?>"
                        class="h-11
                               px-3
                               bg-[#7cff00]
                               text-black
                               border-4 border-black
                               outline-none
                               font-bold
                               shadow-[3px_3px_0_#404040]
                               focus:bg-[#9cff33]"
                    >

                </div>


                <!-- Type -->
                <div class="flex flex-col gap-2">

                    <label
                        for="type"
                        class="font-black"
                    >
                        TYPE
                    </label>

                    <select
                        id="type"
                        name="type"
                        class="h-11
                               px-3
                               bg-[#7cff00]
                               text-black
                               border-4 border-black
                               outline-none
                               font-bold
                               shadow-[3px_3px_0_#404040]"
                    >

                        <option value="">ALL</option>

                        <option
                            value="income"
                            <?= ($_GET['type'] ?? '') === 'income' ? 'selected' : '' ?>
                        >
                            INCOME
                        </option>

                        <option
                            value="expense"
                            <?= ($_GET['type'] ?? '') === 'expense' ? 'selected' : '' ?>
                        >
                            EXPENSE
                        </option>

                    </select>

                </div>


                <!-- From -->
                <div class="flex flex-col gap-2">

                    <label
                        for="dateFrom"
                        class="font-black"
                    >
                        FROM
                    </label>

                    <input
                        type="date"
                        id="dateFrom"
                        name="dateFrom"
                        value="<?= e($_GET['dateFrom'] ?? '') ?>"
                        class="h-11
                               px-3
                               bg-[#7cff00]
                               text-black
                               border-4 border-black
                               outline-none
                               font-bold
                               shadow-[3px_3px_0_#404040]"
                    >

                </div>


                <!-- To -->
                <div class="flex flex-col gap-2">

                    <label
                        for="dateTo"
                        class="font-black"
                    >
                        TO
                    </label>

                    <input
                        type="date"
                        id="dateTo"
                        name="dateTo"
                        value="<?= e($_GET['dateTo'] ?? '') ?>"
                        class="h-11
                               px-3
                               bg-[#7cff00]
                               text-black
                               border-4 border-black
                               outline-none
                               font-bold
                               shadow-[3px_3px_0_#404040]"
                    >

                </div>


                <!-- Search Button -->
                <div class="flex items-end">

                    <button
                        type="submit"
                        class="w-full
                               h-11
                               bg-[#808080]
                               text-black
                               border-4 border-white
                               border-r-black
                               border-b-black
                               font-black
                               shadow-[3px_3px_0_#404040]
                               hover:bg-[#a0a0a0]
                               active:translate-x-[2px]
                               active:translate-y-[2px]
                               active:shadow-none"
                    >
                        [ SEARCH ]
                    </button>

                </div>

            </div>

        </form>

    </div>


    <!-- Transactions Table -->
    <div class="bg-[#c0c0c0]
                border-4 border-black
                shadow-[6px_6px_0_#404040]
                overflow-x-auto">

        <!-- Window Header -->
        <div class="bg-[#000080]
                    text-white
                    px-4 py-2
                    border-b-4 border-black
                    font-black">
            TRANSACTIONS.DAT
        </div>


        <table class="w-full border-collapse font-mono text-sm">

            <thead>

                <tr class="bg-[#808080]">

                    <th class="border-2 border-black px-4 py-3 text-left font-black">
                        DATE
                    </th>

                    <th class="border-2 border-black px-4 py-3 text-left font-black">
                        CATEGORY
                    </th>

                    <th class="border-2 border-black px-4 py-3 text-left font-black">
                        TYPE
                    </th>

                    <th class="border-2 border-black px-4 py-3 text-left font-black">
                        AMOUNT
                    </th>

                    <th class="border-2 border-black px-4 py-3 text-left font-black">
                        DESCRIPTION
                    </th>

                    <th class="border-2 border-black px-4 py-3 text-left font-black">
                        ACTIONS
                    </th>

                    <th class="border-2 border-black px-4 py-3 text-left font-black">
                        RECEIPT
                    </th>

                </tr>

            </thead>


            <tbody>

                <?php foreach ($transactions as $transaction): ?>

                    <tr class="bg-[#d0d0d0] hover:bg-[#7cff00]">

                        <td class="border-2 border-[#404040] px-4 py-3 font-bold">
                            <?= e($transaction['transaction_date']) ?>
                        </td>

                        <td class="border-2 border-[#404040] px-4 py-3 font-bold">
                            <?= e($transaction['category_name']) ?>
                        </td>

                        <td class="border-2 border-[#404040] px-4 py-3 font-bold">
                            <?= e($transaction['type']) ?>
                        </td>

                        <td class="border-2 border-[#404040] px-4 py-3 font-black">
                            <?= e($transaction['amount']) ?>
                        </td>

                        <td class="border-2 border-[#404040] px-4 py-3">
                            <?= e($transaction['description']) ?>
                        </td>

                        <td class="border-2 border-[#404040] px-4 py-3">

                            <div class="flex gap-2">

                                <a
                                    href="edit.php?id=<?= e($transaction['id']) ?>"
                                    class="bg-[#808080]
                                           px-3 py-1
                                           border-2 border-white
                                           border-r-black
                                           border-b-black
                                           font-bold
                                           hover:bg-[#a0a0a0]"
                                >
                                    EDIT
                                </a>


                                <form
                                    method="POST"
                                    action="delete.php"
                                    class="inline"
                                >

                                    <input
                                        type="hidden"
                                        name="csrf_token"
                                        value="<?= e(csrfToken()) ?>"
                                    >

                                    <input
                                        type="hidden"
                                        name="transactionId"
                                        value="<?= e($transaction['id']) ?>"
                                    >

                                    <button
                                        type="submit"
                                        class="bg-[#808080]
                                               px-3 py-1
                                               border-2 border-white
                                               border-r-black
                                               border-b-black
                                               font-bold
                                               hover:bg-[#a0a0a0]"
                                    >
                                        DELETE
                                    </button>

                                </form>

                            </div>

                        </td>


                        <td class="border-2 border-[#404040] px-4 py-3">

                            <?php if (!empty($transaction['receipt'])): ?>

                                <a
                                    href="receipt.php?id=<?= e($transaction['id']) ?>"
                                    target="_blank"
                                    class="font-black underline hover:bg-black hover:text-[#7cff00]"
                                >
                                    VIEW RECEIPT
                                </a>

                            <?php else: ?>

                                <span class="text-[#606060] font-bold">
                                    NO RECEIPT
                                </span>

                            <?php endif; ?>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>


    <!-- Pagination -->

    <?php if ($totalPages > 1): ?>

        <div class="mt-6 flex justify-center items-center gap-2 font-mono">

            <?php if ($page > 1): ?>

                <a
                    href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>&type=<?= urlencode($type) ?>&dateFrom=<?= urlencode($dateFrom) ?>&dateTo=<?= urlencode($dateTo) ?>"
                    class="px-4 py-2
                           bg-[#808080]
                           border-4 border-white
                           border-r-black
                           border-b-black
                           font-black
                           hover:bg-[#a0a0a0]"
                >
                    &lt; PREVIOUS
                </a>

            <?php endif; ?>


            <?php for ($i = 1; $i <= $totalPages; $i++): ?>

                <a
                    href="?page=<?= $i ?>&search=<?= urlencode($search) ?>&type=<?= urlencode($type) ?>&dateFrom=<?= urlencode($dateFrom) ?>&dateTo=<?= urlencode($dateTo) ?>"
                    class="px-4 py-2
                           border-4 border-black
                           font-black
                           <?= $i === $page
                               ? 'bg-[#000080] text-white'
                               : 'bg-[#c0c0c0] text-black hover:bg-[#7cff00]' ?>"
                >
                    <?= $i ?>
                </a>

            <?php endfor; ?>


            <?php if ($page < $totalPages): ?>

                <a
                    href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>&type=<?= urlencode($type) ?>&dateFrom=<?= urlencode($dateFrom) ?>&dateTo=<?= urlencode($dateTo) ?>"
                    class="px-4 py-2
                           bg-[#808080]
                           border-4 border-white
                           border-r-black
                           border-b-black
                           font-black
                           hover:bg-[#a0a0a0]"
                >
                    NEXT &gt;
                </a>

            <?php endif; ?>

        </div>

    <?php endif; ?>

</div>