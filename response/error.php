<?php

define("ERROR_ACESS", ["ERROR_ACESS", "usuario não possui permissão"]);

function responseError($error, $status) {
    return new WP_Error($error[0],  $error[1], array('status' => $status));
};