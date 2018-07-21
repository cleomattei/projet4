<?php

\Core\Auth\DBAuth::logout();

header('Location: index.php');