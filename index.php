<?php
require_once __DIR__ . '/crest/crestcurrent.php';

$userResponse = CRestCurrent::call('user.current');
if (!empty($userResponse['result'])) {
    $userId = $userResponse['result']['ID'];
}

header("Location: salary_cert.php?user_id={$userId}");
exit();
