<!-- Dashboard Summary Cards -->

<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-6">


    <!-- Total Income -->

    <div
        class="bg-[#c0c0c0]
               border-4 border-black
               shadow-[6px_6px_0_#404040]"
    >

        <!-- Window Header -->

        <div
            class="bg-[#000080]
                   text-white
                   px-3 py-2
                   border-b-4 border-black
                   font-mono
                   font-black"
        >
            TOTAL_INCOME.EXE
        </div>


        <!-- Value -->

        <div class="p-4">

            <div
                class="bg-[#7cff00]
                       border-4 border-black
                       px-4 py-5
                       text-2xl
                       font-mono
                       font-black
                       text-black
                       text-center"
            >
                <?= e($dashboardData['totalIncome']) ?>
            </div>

        </div>

    </div>



    <!-- Total Expense -->

    <div
        class="bg-[#c0c0c0]
               border-4 border-black
               shadow-[6px_6px_0_#404040]"
    >

        <!-- Window Header -->

        <div
            class="bg-[#000080]
                   text-white
                   px-3 py-2
                   border-b-4 border-black
                   font-mono
                   font-black"
        >
            TOTAL_EXPENSE.EXE
        </div>


        <!-- Value -->

        <div class="p-4">

            <div
                class="bg-[#7cff00]
                       border-4 border-black
                       px-4 py-5
                       text-2xl
                       font-mono
                       font-black
                       text-black
                       text-center"
            >
                <?= e($dashboardData['totalExpense']) ?>
            </div>

        </div>

    </div>



    <!-- Balance -->

    <div
        class="bg-[#c0c0c0]
               border-4 border-black
               shadow-[6px_6px_0_#404040]"
    >

        <!-- Window Header -->

        <div
            class="bg-[#000080]
                   text-white
                   px-3 py-2
                   border-b-4 border-black
                   font-mono
                   font-black"
        >
            BALANCE.EXE
        </div>


        <!-- Value -->

        <div class="p-4">

            <div
                class="bg-[#7cff00]
                       border-4 border-black
                       px-4 py-5
                       text-2xl
                       font-mono
                       font-black
                       text-black
                       text-center"
            >
                <?= e($dashboardData['balance']) ?>
            </div>

        </div>

    </div>

</div>
<!-- Current Month Transactions -->
<head>
    <link rel="stylesheet" href="/assets/css/output.css">
</head>
<div class="mt-8">

    <!-- Section Header -->
    <div class="flex items-center justify-between mb-4">

        <h2 class="text-2xl font-black font-mono">
            CURRENT MONTH TRANSACTIONS
        </h2>

        <div class="bg-[#000080] text-white px-3 py-1 border-2 border-black font-mono text-sm font-bold">
            TRANSACTIONS.EXE
        </div>

    </div>


    <!-- Table Window -->
    <div class="bg-[#c0c0c0] border-4 border-black shadow-[6px_6px_0_#404040] overflow-x-auto">

        <!-- Window Bar -->
        <div class="bg-[#000080] text-white px-3 py-2 border-b-4 border-black font-mono font-bold">
            CURRENT_MONTH.DAT
        </div>


        <table class="w-full border-collapse font-mono text-sm">

            <!-- Table Header -->
            <thead>
                

                <tr class="bg-[#808080] text-black">

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

                </tr>

            </thead>


            <!-- Table Body -->
            <tbody>
                <?php foreach ($dashboardData['currentMonthTransactions'] as $transaction): ?>
                
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
                
                    </tr>
                
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>

</div>