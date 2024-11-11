<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Documents</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-blue-100 to-blue-300 h-screen w-screen flex items-center justify-center">

    <div class="bg-white rounded-lg shadow-lg w-full max-w-5xl h-[90vh] overflow-hidden flex flex-col">
        <!-- Header -->
        <header class="bg-blue-600 text-white py-4">
            <div class="text-center">
                <h1 class="text-2xl font-semibold">Springfield</h1>
                <h2 class="text-lg mt-1">Employee Documents</h2>
            </div>
        </header>

        <!-- Content Wrapper -->
        <div class="flex-1 flex flex-col md:flex-row p-6 gap-6 overflow-y-auto">
            <!-- Salary Certificate Section -->
            <div class="bg-gray-50 flex-1 rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 text-center mb-4">Salary Certificate</h3>
                <form action="download.php" method="post" class="space-y-4">
                    <input type="hidden" name="documentType" value="salary_certificate">

                    <div>
                        <label for="currentSalary" class="block text-gray-600 text-sm font-medium">Current Salary:</label>
                        <input required type="number" id="currentSalary" name="currentSalary" placeholder="Enter your current salary"
                            class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="country" class="block text-gray-600 text-sm font-medium">Country:</label>
                        <input required type="text" id="country" name="country" placeholder="Enter the country name"
                            class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 mt-4 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                        Download
                    </button>
                </form>
            </div>

            <!-- NOC Section with Travel Dates -->
            <div class="bg-gray-50 flex-1 rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 text-center mb-4">No Objection Certificate (NOC)</h3>
                <form action="download.php" method="post" class="space-y-4">
                    <input type="hidden" name="documentType" value="noc">

                    <div>
                        <label for="currentSalaryNoc" class="block text-gray-600 text-sm font-medium">Current Salary:</label>
                        <input required type="number" id="currentSalaryNoc" name="currentSalaryNoc" placeholder="Enter your current salary"
                            class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="countryNoc" class="block text-gray-600 text-sm font-medium">Country:</label>
                        <input required type="text" id="countryNoc" name="country" placeholder="Enter the country name"
                            class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="startDate" class="block text-gray-600 text-sm font-medium">Travel Start Date:</label>
                        <input required type="date" id="startDate" name="startDate"
                            class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="endDate" class="block text-gray-600 text-sm font-medium">Travel End Date:</label>
                        <input required type="date" id="endDate" name="endDate"
                            class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 mt-4 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                        Download
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-blue-600 text-center py-2">
            <p class="text-sm text-white">&copy; <span id="year"></span> Springfield. All rights reserved.</p>
        </footer>
    </div>

    <script>
        // Set current year in footer
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>

</body>

</html>