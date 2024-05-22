<?php

namespace WPAdminify\Pro\RedirectUrls;

use WPAdminify\Inc\Utils;
// no direct access allowed
if (!defined('ABSPATH')) {
	exit;
}

/**
 * WPAdminify
 *
 * @package Redirect URLs
 *
 * @author Jewel Theme <support@jeweltheme.com>
 */

class RedirectUrlsSettings extends RedirectUrlsModel
{

	public function __construct()
	{
		// this should be first so the default values get stored
		$this->redirect_urls_settings();
		parent::__construct((array) get_option($this->prefix));
	}


	public function get_defaults()
	{
		return [
			'redirect_urls_options' => [
				'new_login_url'      => '',
				'redirect_admin_url' => '',
				'new_register_url'   => '',
				'new_logout_url'     => '',
				'login_redirects'	 => [
					'user_types' => 'user_role',
					'redirect_user' 	=> 'user_role',
					'redirect_role' 	=> '',
					'redirect_cap' 		=> '',
					'redirect_url' 		=> '',
					// 'redirect_order' 	=> 10,
				],
				'logout_redirects'	 => [
					'user_types' 		=> 'user_role',
					'redirect_user' 	=> 'user_role',
					'redirect_role' 	=> '',
					'redirect_cap' 		=> '',
					'redirect_url' 		=> '',
					// 'redirect_order' 	=> 10,
				]
			],

		];
	}

	/**
	 * Settings Fields
	 *
	 * @return void
	 */
	public function roles_redirect_tabs(&$roles_redirect)
	{
		$login_redirect_fields = [];
		$logout_redirect_fields = [];
		$this->login_redirect_tab_fields($login_redirect_fields);
		$this->logout_redirect_tab_fields($logout_redirect_fields);

		$roles_redirect[] =     array(
			'id'         => 'roles_redirect_tabs',
			'type'       => 'button_set',
			'title'      => __('Redirect Rules Type', 'adminify'),
			'options'    => array(
				'login'  => __('Login Redirect ', 'adminify'),
				'logout' => __('Logout Redirect ', 'adminify'),
			),
			'default'      => 'login',
		);

		// Heading
		$roles_redirect[] = [
			'type'    => 'heading',
			'content' => __('Login Redirect ', 'adminify'),
			'dependency'  => ['roles_redirect_tabs', '==', 'login'],
		];
		// Heading
		$roles_redirect[] = [
			'type'    => 'notice',
			'style'   => 'success',
			'class'		=> 'roles_notices',
			'content' => __('Add Login conditions to redirect users to different pages based on their user names, roles & capabilities', 'adminify'),
			'dependency'  => ['roles_redirect_tabs', '==', 'login'],
		];
		$roles_redirect[] = [
			'id'                     => 'login_redirects',
			'type'                   => 'group',
			'title'                  => '',
			'accordion_title_prefix' => __('Login Redirect: ', 'adminify'),
			'accordion_title_number' => true,
			'accordion_title_auto'   => true,
			'button_title'           => __('Add New Login Redirect', 'adminify'),
			'fields'                 => $login_redirect_fields,
			'dependency'  => ['roles_redirect_tabs', '==', 'login'],
		];



		// Logout Heading
		$roles_redirect[] = [
			'type'    => 'heading',
			'content' => __('Logout Redirect ', 'adminify'),
			'dependency'  => ['roles_redirect_tabs', '==', 'logout'],
		];
		// Heading
		$roles_redirect[] = [
			'type'    => 'notice',
			'style'   => 'success',
			'class'		=> 'roles_notices',
			'content' => __('Add Logout conditions to redirect users to different pages based on their user names, roles & capabilities', 'adminify'),
			'dependency'  => ['roles_redirect_tabs', '==', 'logout'],
		];
		$roles_redirect[] = [
			'id'                     => 'logout_redirects',
			'type'                   => 'group',
			'title'                  => '',
			'accordion_title_prefix' => __('Logout Redirect: ', 'adminify'),
			'accordion_title_number' => true,
			'accordion_title_auto'   => true,
			'button_title'           => __('Add New Logout Redirect', 'adminify'),
			'fields'                 => $logout_redirect_fields,
			'dependency'  => ['roles_redirect_tabs', '==', 'logout'],
		];
	}

	/**
	 * Login Redirect Fields
	 *
	 * @param [type] $login_redirect_fields
	 *
	 * @return void
	 */
	public function login_redirect_tab_fields(&$login_redirect_fields)
	{
		$login_redirect_fields[] = [
			'id'          => 'user_types',
			'type'        => 'button_set',
			'title'       => __('User Types', 'adminify'),
			'placeholder' => __('Select User Types', 'adminify'),
			'options'     => array(
				'user_role'  => __('User Role', 'adminify'),
				'user_name'  => __('User Name', 'adminify'),
				'user_cap'  => __('User Capability', 'adminify'),
			),
			'default'     => $this->get_default_field('redirect_urls_options')['login_redirects']['user_types'],
		];

		// Select User Names
		$login_redirect_fields[] = [
			'id'          => 'redirect_user',
			'type'        => 'select',
			'title'       => __('User', 'adminify'),
			'placeholder' => __('Select a user', 'adminify'),
			'options'     => 'users',
			'dependency'  => ['user_types', '==', 'user_name'],
			'default'     => $this->get_default_field('redirect_urls_options')['login_redirects']['redirect_user'],
		];

		// Select User Roles
		$login_redirect_fields[] = [
			'id'          => 'redirect_role',
			'type'        => 'select',
			'title'       => __('Role', 'adminify'),
			'placeholder' => __('Select a Role', 'adminify'),
			'options'     => 'roles',
			'dependency'  => ['user_types', '==', 'user_role'],
			'default'     => $this->get_default_field('redirect_urls_options')['login_redirects']['redirect_role'],
		];

		// Select User Capability
		$login_redirect_fields[] = [
			'id'          => 'redirect_cap',
			'type'     	  => 'select',
			'title'       => __('Capability', 'adminify'),
			'placeholder' => __('Select a Capability', 'adminify'),
			'options'	=> '\WPAdminify\Inc\Classes\Helper::get_capability_options',
			'dependency'  => ['user_types', '==', 'user_cap'],
		];


		// Redirect URL
		$login_redirect_fields[] = [
			'id'          => 'redirect_url',
			'type'        => 'link',
			'class'       => 'new-login-url',
			'title'       => __('Redirect URL', 'adminify'),
			'desc'        => __('Change the URL for a User or User Roles.', 'adminify'),
			'default'     => $this->get_default_field('redirect_urls_options')['login_redirects']['redirect_url'],
		];

		// // Redirect Order
		// $login_redirect_fields[] = [
		// 	'id'          => 'redirect_order',
		// 	'type'    	  => 'number',
		// 	'title'   	  => __('Order', 'adminify'),
		// 	'default'     => $this->get_default_field('redirect_urls_options')['login_redirects']['redirect_order'],
		// ];
	}



	/**
	 * Logout Settings Fields
	 *
	 * @return void
	 */
	public function logout_redirect_tab_fields(&$logout_redirect_fields)
	{
		$logout_redirect_fields[] = [
			'id'          => 'user_types',
			'type'        => 'button_set',
			'title'       => __('User Types', 'adminify'),
			'placeholder' => __('Select User Types', 'adminify'),
			'options'     => array(
				'user_role'  => __('User Role', 'adminify'),
				'user_name'  => __('User Name', 'adminify'),
				'user_cap'  => __('User Capability', 'adminify'),
			),
			'default'     => $this->get_default_field('redirect_urls_options')['logout_redirects']['user_types'],
		];

		// Select User Names
		$logout_redirect_fields[] = [
			'id'          => 'redirect_user',
			'type'        => 'select',
			'title'       => __('User', 'adminify'),
			'placeholder' => __('Select a user', 'adminify'),
			'options'     => 'users',
			'dependency'  => ['user_types', '==', 'user_name'],
			'default'     => $this->get_default_field('redirect_urls_options')['logout_redirects']['redirect_user'],
		];

		// Select User Roles
		$logout_redirect_fields[] = [
			'id'          => 'redirect_role',
			'type'        => 'select',
			'title'       => __('Role', 'adminify'),
			'placeholder' => __('Select a Role', 'adminify'),
			'options'     => 'roles',
			'dependency'  => ['user_types', '==', 'user_role'],
			'default'     => $this->get_default_field('redirect_urls_options')['logout_redirects']['redirect_role'],
		];

		// Select User Capability
		$logout_redirect_fields[] = [
			'id'          => 'redirect_cap',
			'type'     	  => 'select',
			'title'       => __('Capability', 'adminify'),
			'placeholder' => __('Select a Capability', 'adminify'),
			'options'	=> '\WPAdminify\Inc\Classes\Helper::get_capability_options',
			'dependency'  => ['user_types', '==', 'user_cap'],
		];


		// Redirect URL
		$logout_redirect_fields[] = [
			'id'          => 'redirect_url',
			'type'        => 'link',
			'class'       => 'new-login-url',
			'title'       => __('Redirect URL', 'adminify'),
			'desc'        => __('Change the URL for a User or User Roles.', 'adminify'),
			'default'     => $this->get_default_field('redirect_urls_options')['logout_redirects']['redirect_url'],
		];

		// Redirect Order
		// $logout_redirect_fields[] = [
		// 	'id'          => 'redirect_order',
		// 	'type'    	  => 'number',
		// 	'title'   	  => __('Order', 'adminify'),
		// 	'default'     => $this->get_default_field('redirect_urls_options')['logout_redirects']['redirect_order'],
		// ];
	}

	/**
	 * Settings Fields
	 *
	 * @return void
	 */
	public function login_register_redirect_tab_fields(&$login_register_redirect_tab_fields)
	{
		$settings_fields     = [];
		$login_redirects = [];
		// $logout_redirects = [];
		$this->login_register_url_fields($settings_fields);
		$this->roles_redirect_tabs($login_redirects);
		// $this->logout_redirect_tabs($logout_redirects);

		$login_register_redirect_tab_fields[] = [
			'type'    => 'subheading',
			'content' => Utils::adminfiy_help_urls(
				__('Redirect URL\'s', 'adminify'),
				'https://wpadminify.com/kb/how-to-change-wordpress-login-url/',
				'https://www.youtube.com/watch?v=0X-oneFB9HQ',
				'https://www.facebook.com/groups/jeweltheme',
				'https://wpadminify.com/support/'
			),
		];

		$login_register_redirect_tab_fields[] = [
			'id'    => 'redirect_urls_options',
			'type'  => 'tabbed',
			'title' => '',
			'tabs'  => [
				[
					'title'  => __('Login/Register URL', 'adminify'),
					'fields' => $settings_fields,
				],
				[
					'title'  => __('Roles Redirect', 'adminify'),
					'fields' => $login_redirects,
				],
			],
		];
	}

	public function login_register_url_fields(&$settings_fields)
	{
		$settings_fields[] = [
			'id'          => 'new_login_url',
			'type'        => 'link',
			'class'       => 'new-login-url',
			'title'       => __('New Login URL', 'adminify'),
			'desc'        => __('Change the login URL and prevent access to the wp-admin and <code>' . wp_login_url() . '</code> page directly.', 'adminify'),
			'placeholder' => 'login',
			'before'      => \get_site_url() . '/',
			// 'after'       => '/',
			'default'     => $this->get_default_field('redirect_urls_options')['new_login_url'],
		];

		$settings_fields[] = [
			'id'          => 'redirect_admin_url',
			'type'        => 'link',
			'class'       => 'new-login-url redirect-admin-url',
			'title'       => __('Redirect Admin', 'adminify'),
			'desc'        => __('Redirect users those are not logged in and trying to access <code>' . get_admin_url() . '</code>', 'adminify'),
			'placeholder' => '404',
			'default'     => $this->get_default_field('redirect_urls_options')['redirect_admin_url'],
			'before'      => \get_site_url() . '/',
			// 'after'       => '/',
		];

		$settings_fields[] = [
			'id'          => 'new_register_url',
			'type'        => 'link',
			'class'       => 'new-login-url new-register-url',
			'title'       => __('New Register URL', 'adminify'),
			'subtitle'    => __('Enable <a href="' . admin_url('options-general.php#users_can_register') . '"><b>Membership: "Anyone can register"</b></a> checkbox from Settings.', 'adminify'),
			'desc'        => __('Change the Register URL, to setup the custom designed registration page.', 'adminify'),
			'placeholder' => 'wp-login.php?action=register',
			'before'      => \get_site_url() . '/',
			// 'after'       => '/',
			'default'     => $this->get_default_field('redirect_urls_options')['new_register_url'],
		];
	}

	public function redirect_urls_settings()
	{
		if (!class_exists('ADMINIFY')) {
			return;
		}

		// WP Adminify Custom Header & Footer Options
		\ADMINIFY::createOptions(
			$this->prefix,
			[

				// Framework Title
				'framework_title'         => 'WP Adminify Redirect URLs <small>by WP Adminify</small>',
				'framework_class'         => 'adminify-redirect-urls',

				// menu settings
				'menu_title'              => 'Redirect URLs',
				'menu_slug'               => 'adminify-redirect-urls',
				'menu_type'               => 'submenu',                  // menu, submenu, options, theme, etc.
				'menu_capability'         => 'manage_options',
				'menu_icon'               => '',
				'menu_position'           => 54,
				'menu_hidden'             => false,
				'menu_parent'             => 'wp-adminify-settings',

				// footer
				'footer_text'             => ' ',
				'footer_after'            => ' ',
				'footer_credit'           => ' ',

				// menu extras
				'show_bar_menu'           => false,
				'show_sub_menu'           => false,
				'show_in_network'         => false,
				'show_in_customizer'      => false,

				'show_search'             => false,
				'show_reset_all'          => false,
				'show_reset_section'      => false,
				'show_footer'             => false,
				'show_all_options'        => true,
				'show_form_warning'       => true,
				'sticky_header'           => false,
				'save_defaults'           => true,
				'ajax_save'               => true,

				// admin bar menu settings
				'admin_bar_menu_icon'     => '',
				'admin_bar_menu_priority' => 45,

				// database model
				'database'                => 'options',   // options, transient, theme_mod, network(multisite support)
				'transient_time'          => 0,

				// typography options
				'enqueue_webfont'         => true,
				'async_webfont'           => false,

				// others
				'output_css'              => false,

				// theme and wrapper classname
				'nav'                     => 'normal',
				'theme'                   => 'dark',
				'class'                   => 'wp-adminify-redirect-urls',
			]
		);

		$login_register_redirect_tab_fields = [];
		$this->login_register_redirect_tab_fields($login_register_redirect_tab_fields);

		// Custom CSS/JS Settings
		\ADMINIFY::createSection(
			$this->prefix,
			[
				'title'  => __('Others', 'adminify'),
				'icon'   => 'fas fa-bolt',
				'fields' => $login_register_redirect_tab_fields,
			]
		);
	}
}
