<?php
$current_page = basename($_SERVER['PHP_SELF']);
$query_string = $_SERVER['QUERY_STRING'];
$query_suffix = $query_string ? '?' . htmlspecialchars($query_string) : '';
?>

<div class="sidebar bg-gray-800 text-white min-h-screen hidden md:flex flex-col justify-between w-max" id="sidebar">
    <div class="p-6">
        <h1 class="font-bold mb-8 text-white text-center hover:text-gray-300">
            <a href="index.php<?php echo $query_suffix; ?>" class="flex flex-col">
                <span class="text-xl">HR</span>
            </a>
        </h1>
        <ul class="flex flex-col gap-2">
            <?php
            $links = [
                'salary_cert.php' => ['Salary Certificate', 'fas fa-money-check-alt'],
                'noc_cert.php' => ['NOC Certificate', 'fas fa-file-alt'],
            ];

            foreach ($links as $link => $data) {
                list($label, $icon) = $data;

                // Mark active item
                $active = ($current_page === $link) ? 'bg-gray-700' : '';

                // Append query string
                $fullLink = $link . $query_suffix;

                echo '<li>
                        <a href="' . $fullLink . '" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 ' . $active . '">
                            <i class="' . $icon . ' mr-2"></i> ' . $label . '
                        </a>
                      </li>';
            }
            ?>
            <li>
                <a href="https://crm.springfieldproperties.ae/bizproc/processes/20/view/0/" target="_blank" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <i class="fas fa-calendar-check mr-2"></i> Leave Application
                </a>
            </li>
            <li>
                <a href="https://crm.springfieldproperties.ae/marketplace/app/37/" target="_blank" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <i class="fas fa-graduation-cap mr-2"></i> Springfield Academy
                </a>
            </li>
            <li>
                <a href="https://crm.springfieldproperties.ae/marketplace/app/47/" target="_blank" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <i class="fas fa-user-plus mr-2"></i> Onboarding
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="md:hidden flex flex-col justify-between w-max">
    <button id="toggleSidebar" class="p-4">
        <i id="menuIcon" class="fas fa-bars hover:text-gray-500"></i>
    </button>
</div>

<!-- Overlay for Mobile View -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden"></div>

<script>
    const toggleButton = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const menuIcon = document.getElementById('menuIcon');

    toggleButton.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
        overlay.classList.toggle('hidden');

        if (sidebar.classList.contains('hidden')) {
            menuIcon.classList.add('fa-bars');
            menuIcon.classList.remove('fa-times');
        } else {
            menuIcon.classList.add('fa-times');
            menuIcon.classList.remove('fa-bars');
        }
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.add('hidden');
        overlay.classList.add('hidden');
        menuIcon.classList.add('fa-bars');
        menuIcon.classList.remove('fa-times');
    });
</script>

<style>
    #overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    #sidebar:not(.hidden)+#overlay {
        display: block;
    }
</style>