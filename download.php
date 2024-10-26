<?php
require_once 'utils.php';

if (isset($_POST['documentType'])) {
    $documentType = $_POST['documentType'];
    $templatePath = __DIR__ . "/templates/" . ($documentType === 'salary_certificate' ? 'Salary.docx' : ($documentType === 'noc' ? 'NOC.docx' : ''));

    if (empty($templatePath) || !file_exists($templatePath)) {
        echo "Invalid document type.";
        exit;
    }

    $currentUser = CRest::call('user.current');
    $userId = $currentUser['result']['ID'];

    $user = getUserInfo($userId);
    if (!$user) {
        echo "User information could not be retrieved.";
        exit;
    }

    // Sanitize the user's full name for filename
    $fullName = trim($user['NAME'] . ' ' . $user['LAST_NAME']);
    $sanitizedFileName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $fullName);

    // Generate the Word document
    $wordFile = generateWordDocument(
        $templatePath,
        $user,
        $_POST['startDate'] ?? null,
        $_POST['endDate'] ?? null,
        $_POST['currentSalaryNoc'] ?? null,
        $_POST['currentSalary'] ?? null
    );

    if ($wordFile) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment; filename="' . basename($templatePath, '.docx') . '_' . $sanitizedFileName . '.docx"');
        header('Content-Length: ' . filesize($wordFile));
        readfile($wordFile);

        unlink($wordFile);
        exit;
    } else {
        echo "Failed to generate the document.";
    }
} else {
    echo "No document type specified.";
}
