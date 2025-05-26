<?php
require_once __DIR__ . '/crest/crestcurrent.php';

$userResponse = CRestCurrent::call('user.current');
if (!empty($userResponse['result'])) {
    file_put_contents(__DIR__ . '/current_user.json', json_encode($userResponse['result']));
}

header("Location: salary_cert.php");
exit();
