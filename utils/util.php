<?php

function validateToken ($user) {
    $user_id = $user->ID;

    if(!$user_id > 0) return false;

    return true;
}

function expire_token() {
    return time() + (60*60);
}
