<?php

namespace AGT\Includes;

class Assets
{
  function __construct()
  {
    if (is_admin()) {
      add_action('admin_enqueue_scripts', [$this, 'register']);
    } else {
      add_action('wp_enqueue_scripts', [$this, 'register']);
    }
  }

  public function register()
  {
    $this->register_scripts($this->get_scripts());
    // $this->register_styles($this->get_styles());
  }

  private function register_scripts($scripts)
  {
    foreach ($scripts as $handle => $script) {
      $deps      = isset($script['deps']) ? $script['deps'] : false;
      $in_footer = isset($script['in_footer']) ? $script['in_footer'] : false;
      $version   = isset($script['version']) ? $script['version'] : AGT_VERSION;

      wp_register_script($handle, $script['src'], $deps, $version, $in_footer);
    }
  }

  // public function register_styles($styles)
  // {
  //   foreach ($styles as $handle => $style) {
  //     $deps = isset($style['deps']) ? $style['deps'] : false;

  //     wp_register_style($handle, $style['src'], $deps, AGT_VERSION);
  //   }
  // }

  public function get_scripts()
  {
    return [
      'agt-admin-script' => [
        'src' => AGT_ASSETS . '/admin/admin.js',
        'deps'      => null,
        'version' => filemtime(AGT_PLUGIN_PATH . '/assets/admin/admin.js'),
        'in_footer' => true
      ],
    ];
  }

  // public function get_styles()
  // {
  //   return [
  //     'wpsfb-admin-style' => [
  //       'src' => WPSFB_ASSETS . '/css/admin.css',
  //       'version' => filemtime(WPSFB_PLUGIN_PATH . '/assets/css/admin.css')
  //     ]
  //   ];
  // }
}
