<?php
require_once('../model/layout.php');
$cartsCounter = getCarts($user);

require('../templates/layout.php');