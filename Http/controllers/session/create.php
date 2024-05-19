<?php

use Core\Session;
// Session::destroy();
view('session/create.view.php', [
  'errors' => Session::get('errors')
]);
