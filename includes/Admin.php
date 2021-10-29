<?php

namespace AGT\Includes;

class Admin
{
  function __construct()
  {
    add_action('admin_menu', [$this, 'agt_admin_menu']);
  }

  public function agt_admin_menu()
  {
    $hook = add_menu_page(
      __('Awesome Goal Tracker', 'awesome-goal-tracker'),
      __('Awesome Goal Tracker', 'awesome-goal-tracker'),
      'manage_options',
      'awesome-goal-tracker',
      [$this, 'admin_menu_page'],
      'dashicons-text',
      10
    );

    add_action('load-' . $hook, [$this, 'init_hooks']);
  }

  public function init_hooks()
  {
    add_action('admin_enqueue_scripts', [$this, 'enqueue_scripts']);
  }

  public function admin_menu_page()
  {
    echo '<div id="agt-admin-app"></div>';
  }

  public function enqueue_scripts()
  {
    // wp_enqueue_style('wpsfb-admin-style');
    wp_enqueue_script('agt-admin-script');
  }
}
