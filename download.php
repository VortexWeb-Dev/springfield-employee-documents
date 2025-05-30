<?php
require_once __DIR__ . '/utils.php';
require_once __DIR__ . '/crest/crest.php';

if (isset($_POST['documentType'])) {
    $documentType = $_POST['documentType'];
    $templatePath = __DIR__ . "/templates/" . ($documentType === 'salary_certificate' ? 'Salary.docx' : ($documentType === 'noc' ? 'NOC.docx' : ''));

    if (empty($templatePath) || !file_exists($templatePath)) {
        echo "Invalid document type.";
        exit;
    }

    $userId = isset($_POST['userId']) ? intval($_POST['userId']) : 0;
    $user = CRest::call('user.get', ['ID' => $userId])['result'][0] ?? null;

    if (!$user) {
        echo "User data is invalid.";
        exit;
    }

    $fullName = trim($user['NAME'] . ' ' . $user['LAST_NAME']);
    $sanitizedFileName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $fullName);

    $wordFile = generateWordDocument(
        $templatePath,
        $user,
        $_POST['startDate'] ?? null,
        $_POST['endDate'] ?? null,
        $_POST['currentSalaryNoc'] ?? null,
        $_POST['currentSalary'] ?? null,
        $_POST['addressTo'] ?? null,
        $_POST['addressToNoc'] ?? null,
        $_POST['nocReason'] ?? null,
        $_POST['country'] ?? 'UAE'
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
