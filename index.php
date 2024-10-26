<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Documents</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-blue-100 to-blue-200">

    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow-lg max-w-3xl mx-auto overflow-hidden">
            <header class="bg-blue-600 text-white py-6 text-center">
                <h1 class="text-3xl font-semibold">Springfield</h1>
                <h2 class="text-2xl mt-2">Employee Documents</h2>
            </header>
            <div class="flex flex-col space-y-6 p-4">
                <!-- Salary Certificate Section -->
                <div class="bg-gray-100 rounded-lg shadow-md p-6 text-center">
                    <h3 class="text-xl font-semibold mb-4">Salary Certificate</h3>
                    <form action="download.php" method="post" class="space-y-4">
                        <input type="hidden" name="documentType" value="salary_certificate">
                        <label for="currentSalary" class="block text-gray-700 text-sm font-bold mb-2">Current Salary:</label>
                        <input required type="number" id="currentSalary" name="currentSalary" placeholder="Enter your current salary" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
                        <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700 transition-colors">
                            Download
                        </button>
                    </form>
                </div>

                <!-- NOC Section with Travel Dates -->
                <div class="bg-gray-100 rounded-lg shadow-md p-6 text-center">
                    <h3 class="text-xl font-semibold mb-4">No Objection Certificate (NOC)</h3>
                    <form action="download.php" method="post" class="space-y-4">
                        <input type="hidden" name="documentType" value="noc">
                        <label for="currentSalaryNoc" class="block text-gray-700 text-sm font-bold mb-2">Current Salary:</label>
                        <input required type="number" id="currentSalaryNoc" name="currentSalaryNoc" placeholder="Enter your current salary" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">

                        <!-- Travel Start Date -->
                        <label for="startDate" class="block text-gray-700 text-sm font-bold mb-2">Travel Start Date:</label>
                        <input required type="date" id="startDate" name="startDate" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">

                        <!-- Travel End Date -->
                        <label for="endDate" class="block text-gray-700 text-sm font-bold mb-2">Travel End Date:</label>
                        <input required type="date" id="endDate" name="endDate" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600">

                        <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700 transition-colors">
                            Download
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>