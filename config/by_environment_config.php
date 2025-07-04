<?php

declare(strict_types=1);

/*
 * 環境に依存する設定(dev)
 */

// デバッグ表示をonにしておく
// XXX本番用の設定ならoffに
ini_set('display_errors', 1);
error_reporting(-1);

// Noticeであろうとも、エラーが出たら速やかに例外をぶん投げる
set_error_handler(
    function (int $errno, string $errstr, string $errfile, int $errline): bool {
        if (0 !== $errno & error_reporting()) {
            throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
        }
        return true;
    }
);

/* 設定本体 */
return [
];
