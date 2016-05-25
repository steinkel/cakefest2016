<?php
use Cake\Log\Log;

Log::config('subscription', [
    'className' => 'File',
    'path' => LOGS,
    'levels' => [],
    'scopes' => ['subscription'],
    'file' => 'subscription.log',
]);
