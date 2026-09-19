<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Monthly Report</title>

    <link
        rel="stylesheet"
        href="/assets/css/output.css"
    >

</head>

<body class="min-h-screen bg-[#c0c0c0] flex items-center justify-center p-4 font-mono">

    <div
        class="w-full max-w-2xl
               bg-[#c0c0c0]
               border-4 border-black
               shadow-[8px_8px_0_#404040]"
    >

        <!-- Window Header -->

        <div class="bg-[#000080] text-white px-4 py-3 border-b-4 border-black">

            <h1 class="font-black text-lg">
                MONTHLY REPORT.EXE
            </h1>

        </div>


        <!-- Report Content -->

        <div class="p-4 sm:p-6">

            <!-- Income -->

            <div
                class="mb-4
                       bg-[#c0c0c0]
                       border-4 border-black
                       shadow-[4px_4px_0_#404040]"
            >

                <div
                    class="bg-[#808080]
                           border-b-4 border-black
                           px-3 py-2
                           font-black"
                >
                    TOTAL INCOME
                </div>

                <div
                    class="bg-[#7cff00]
                           px-4 py-4
                           text-2xl
                           font-black"
                >
                    <?= e($report['total_income'] ?? 0) ?>
                </div>

            </div>


            <!-- Expense -->

            <div
                class="mb-4
                       bg-[#c0c0c0]
                       border-4 border-black
                       shadow-[4px_4px_0_#404040]"
            >

                <div
                    class="bg-[#808080]
                           border-b-4 border-black
                           px-3 py-2
                           font-black"
                >
                    TOTAL EXPENSE
                </div>

                <div
                    class="bg-[#7cff00]
                           px-4 py-4
                           text-2xl
                           font-black"
                >
                    <?= e($report['total_expense'] ?? 0) ?>
                </div>

            </div>


            <!-- Balance -->

            <div
                class="bg-[#c0c0c0]
                       border-4 border-black
                       shadow-[4px_4px_0_#404040]"
            >

                <div
                    class="bg-[#000080]
                           text-white
                           border-b-4 border-black
                           px-3 py-2
                           font-black"
                >
                    BALANCE
                </div>

                <div
                    class="bg-[#7cff00]
                           px-4 py-5
                           text-3xl
                           font-black"
                >
                    <?= e($report['balance'] ?? 0) ?>
                </div>

            </div>

        </div>

    </div>

</body>

</html>