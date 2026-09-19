<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Transaction</title>

    <link
        rel="stylesheet"
        href="/assets/css/output.css"
    >

</head>

<body class="min-h-screen bg-[#c0c0c0] flex items-center justify-center p-3 sm:p-5 font-mono">

    <form
        method="POST"
        class="w-full max-w-lg
               max-h-[95vh]
               overflow-y-auto
               bg-[#c0c0c0]
               border-4 border-black
               shadow-[6px_6px_0_#404040]"
    >

        <!-- Window Header -->

        <div class="bg-[#000080] text-white px-4 py-3 border-b-4 border-black">

            <h1 class="font-black text-lg">
                EDIT TRANSACTION.EXE
            </h1>

        </div>


        <!-- Form Content -->

        <div class="p-4 sm:p-6">


            <!-- CSRF -->

            <input
                type="hidden"
                name="csrf_token"
                value="<?= e(csrfToken()) ?>"
            >


            <!-- Category -->

            <div class="mb-4">

                <label
                    for="categoryId"
                    class="block font-black mb-2"
                >
                    CATEGORY
                </label>

                <input
                    type="text"
                    name="categoryId"
                    id="categoryId"
                    value="<?= e($transaction['category_id']) ?>"
                    class="w-full
                           bg-[#7cff00]
                           border-4 border-black
                           px-3 py-2
                           font-bold
                           outline-none
                           focus:bg-[#9aff3d]"
                >

            </div>


            <!-- Type -->

            <div class="mb-4">

                <label
                    for="type"
                    class="block font-black mb-2"
                >
                    TYPE
                </label>

                <select
                    name="type"
                    id="type"
                    class="w-full
                           bg-[#7cff00]
                           border-4 border-black
                           px-3 py-2
                           font-bold
                           outline-none
                           cursor-pointer"
                >

                    <option
                        value="income"
                        <?= $transaction['type'] === 'income' ? 'selected' : '' ?>
                    >
                        INCOME
                    </option>

                    <option
                        value="expense"
                        <?= $transaction['type'] === 'expense' ? 'selected' : '' ?>
                    >
                        EXPENSE
                    </option>

                </select>

            </div>


            <!-- Amount -->

            <div class="mb-4">

                <label
                    for="amount"
                    class="block font-black mb-2"
                >
                    AMOUNT
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="amount"
                    id="amount"
                    value="<?= e($transaction['amount']) ?>"
                    class="w-full
                           bg-[#7cff00]
                           border-4 border-black
                           px-3 py-2
                           font-bold
                           outline-none
                           focus:bg-[#9aff3d]"
                >

            </div>


            <!-- Description -->

            <div class="mb-4">

                <label
                    for="description"
                    class="block font-black mb-2"
                >
                    DESCRIPTION
                </label>

                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="w-full
                           bg-[#7cff00]
                           border-4 border-black
                           px-3 py-2
                           font-bold
                           outline-none
                           resize-y
                           focus:bg-[#9aff3d]"
                ><?= e($transaction['description']) ?></textarea>

            </div>


            <!-- Date -->

            <div class="mb-5">

                <label
                    for="transactionDate"
                    class="block font-black mb-2"
                >
                    TRANSACTION DATE
                </label>

                <input
                    type="date"
                    name="transactionDate"
                    id="transactionDate"
                    value="<?= e($transaction['transaction_date']) ?>"
                    class="w-full
                           bg-[#7cff00]
                           border-4 border-black
                           px-3 py-2
                           font-bold
                           outline-none
                           focus:bg-[#9aff3d]"
                >

            </div>


            <!-- Submit -->

            <button
                type="submit"
                class="w-full
                       bg-[#808080]
                       text-black
                       border-4 border-black
                       px-4 py-3
                       font-black
                       shadow-[4px_4px_0_#404040]
                       hover:bg-[#a0a0a0]
                       active:translate-x-[3px]
                       active:translate-y-[3px]
                       active:shadow-none
                       cursor-pointer"
            >
                UPDATE TRANSACTION
            </button>


        </div>

    </form>

</body>

</html>