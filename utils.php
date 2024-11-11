<?php

require 'vendor/autoload.php';
require_once 'crest/crest.php';
require_once 'utils.php';

use PhpOffice\PhpWord\TemplateProcessor;

function formatDateRange($startDate, $endDate)
{
    $start = new DateTime($startDate);
    $end = new DateTime($endDate);

    return sprintf(
        "%s to the %s of %s %s",
        $start->format('jS'),
        $end->format('jS'),
        $start->format('F'),
        $start->format('Y')
    );
}

function generateWordDocument($templatePath, $user, $startDate, $endDate, $salaryNoc, $salary, $country)
{
    if (!file_exists($templatePath)) {
        error_log("Template file does not exist: $templatePath");
        return null;
    }

    $templateProcessor = new TemplateProcessor($templatePath);

    // Prepare data for the template
    $templateData = [
        'FULL_NAME' => trim($user['NAME'] . ' ' . $user['LAST_NAME']),
        'NATIONALITY' => $user['UF_USR_1727158576334'],
        'PASSPORT_NUMBER' => $user['UF_USR_1727158618234'],
        'DATE_OF_JOINING' => (new DateTime($user['UF_USR_1727158528318']))->format('F Y'),
        'POSITION' => $user['WORK_POSITION'],
        'TRAVEL_DATE' => formatDateRange($startDate, $endDate),
        'SALARY' => $salary,
        'SALARY_NOC' => $salaryNoc,
        'COUNTRY' => $country,
        'CURRENT_DATE' => getTodayDateFormatted()
    ];

    foreach ($templateData as $placeholder => $value) {
        $templateProcessor->setValue($placeholder, $value);
    }

    // Save the document to a temporary file
    $tempFile = tempnam(sys_get_temp_dir(), 'docx');
    $templateProcessor->saveAs($tempFile);

    return $tempFile;
}

function getUserInfo($userId)
{
    $userResponse = CRest::call('user.get', ['ID' => $userId]);
    return $userResponse['result'][0] ?? null;
}

function getTodayDateFormatted()
{
    return date('jS F Y');
}