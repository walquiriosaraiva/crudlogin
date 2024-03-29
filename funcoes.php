<?php

function debugDie()
{
    $arLocal = array();
    $trace = debug_backtrace();

    while ($arLocal = array_shift($trace)) {
        if (preg_match('/(MyDebugger|eval\(\))+/', $arLocal['file'])) {
            $arLocal = array_shift($trace);
            continue;
        }
        break;
    }
    $stLocal = 'Arquivo :' . $arLocal['file'] . ' ---> Linha ' . $arLocal['line'];

    echo "
    <link rel='stylesheet' href='/bootstrap-4.1.3-dist/css/bootstrap.min.css'>
    <style>
        .pre-scrollable {
            max-height: 600px;
        }
    </style>
    <div style='display:none'>on line 0</div>
<div class='container-fluid'>
    <div class='page-header '>
      <h1>" . __FUNCTION__ . "</h1> <small>{$stLocal}</small>
      </div> ";
    if (count(func_get_args())) {
        $class = func_num_args() > 1 ? 'pre-scrollable' : '';
        foreach (func_get_args() as $idx => $arg) {
            echo '
        <div class="card">
            <div class="card card-header alert alert-danger"><strong>ARGUMENTO[' . $idx . ']</strong></div>
            <div class="card-body">
            <pre class="' . $class . '">' . print_r($arg, true) . '</pre>
            </div>
        </div>';
        }
    } else {
        echo "Sem argumentos!";
    }
    echo "</div>";
    flush();
    die();
}

function debug()
{
    $arLocal = array();
    $trace = debug_backtrace();

    while ($arLocal = array_shift($trace)) {
        if (preg_match('/(MyDebugger|eval\(\))+/', $arLocal['file'])) {
            $arLocal = array_shift($trace);
            continue;
        }
        break;
    }
    $stLocal = 'Arquivo :' . $arLocal['file'] . ' ---> Linha ' . $arLocal['line'];

    echo "
    <link rel='stylesheet' href='/bootstrap-4.1.3-dist/css/bootstrap.min.css'>
    <style>
        .pre-scrollable {
            max-height: 600px;
        }
    </style>
    <div style='display:none'>on line 0</div>
<div class='container-fluid'>
    <div class='page-header '>
      <h1>" . __FUNCTION__ . "</h1> <small>{$stLocal}</small>
      </div> ";
    if (count(func_get_args())) {
        $class = func_num_args() > 1 ? 'pre-scrollable' : '';
        foreach (func_get_args() as $idx => $arg) {
            echo '
        <div class="card">
            <div class="card card-header alert alert-info"><strong>ARGUMENTO[' . $idx . ']</strong></div>
            <div class="card-body">
            <pre class="' . $class . '">' . print_r($arg, true) . '</pre>
            </div>
        </div>';
        }
    } else {
        echo "Sem argumentos!";
    }
    echo "</div>";
    flush();
}