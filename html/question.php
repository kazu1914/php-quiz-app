<?php

require __DIR__.'/../lib/functions.php';

$id = escape($_GET['id'] ?? '');
$data = fetchById($id);

if (!$data){
    // HTTPレスポンスのヘッダを404にする
    header('HTTP/1.1 404 Not Found');

    // レスポンスの種類を指定する
    header('Content-Type: text/html; charset=UTF-8');

    include __DIR__.'/../template/404tpl.php';
    exit(0);
}

$formatedData = generateFormattedData($data);
$question = $formatedData['question'];
$answers = $formatedData['answers'];
$correctAnswer = $formatedData['correctAnswer'];
$correctAnswerValue = $answers[$correctAnswer];
$explanation = $formatedData['explanation'];
include __DIR__.'/../template/question.tpl.php';