<?php

namespace AGT\Includes;

class Installer
{
  function __construct()
  {
  }

  public function run()
  {
    $this->add_version();
  }

  public function add_version()
  {
    $is_installed = get_option('agt_is_installed');
    if (!$is_installed) {
      update_option('agt_is_installed', time());
    }
    update_option('agt_is_installed', AGT_VERSION);
  }
}
