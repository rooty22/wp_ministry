<?php

use LC\Routes;

/*=============================
    [01. GET Routes]
===============================*/

Routes::map('register', function ($params) {
    Routes::load('view/register.php', $params, null, 200);
});
