<?php

namespace WPAdminify\Inc\Admin\Options;

use WPAdminify\Inc\Utils;
use WPAdminify\Inc\Admin\AdminSettingsModel;

if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access directly.

if ( ! class_exists( 'DismissNotices' ) ) {
	class DismissNotices extends AdminSettingsModel {

		public function __construct() {
			$this->admin_notices_options();
		}

		public function get_defaults() {
			return [
				'admin_notice_user_roles'        => [],
				'hide_notices'                   => false,
				'remove_welcome_panel'           => false,
				'remove_php_update_required_nag' => false,
				'remove_try_gutenberg_panel'     => false,
				'core_update_notice'             => false,
				'plugin_update_notice'           => false,
				'theme_update_notice'            => false,
			];
		}

		/**
		 * User Roles
		 */
		public function admin_notices_user_roles( &$fields ) {
			$fields[] = [
				'type'    => 'subheading',
				'content' => Utils::adminfiy_help_urls(
					__( 'Admin Notices Settings', 'adminify' ),
					'https://wpadminify.com/kb/disable-admin-notice-in-wordpress-dashboard/',
					'https://www.youtube.com/playlist?list=PLqpMw0NsHXV-EKj9Xm1DMGa6FGniHHly8',
					'https://www.facebook.com/groups/jeweltheme',
					'https://wpadminify.com/support/'
				),
			];

			$fields[] = [
				'id'          => 'admin_notice_user_roles',
				'type'        => 'select',
				'title'       => __( 'Visible for', 'adminify' ),
				'placeholder' => __( 'Select User roles you want to show', 'adminify' ),
				'options'     => 'roles',
				'multiple'    => true,
				'chosen'      => true,
				'default'     => $this->get_default_field( 'admin_notice_user_roles' ),
			];
		}

		/**
		 * Admin Notices: Settings
		 */
		public function admin_notices_settings( &$fields ) {
			if ( jltwp_adminify()->can_use_premium_code__premium_only() ) {
				$fields[] = [
					'id'         => 'hide_notices',
					'type'       => 'switcher',
					'title'      => __( 'Hide All "Admin Notices"?', 'adminify' ),
					'subtitle'   => sprintf( __( 'Move all Admin Notices to <a href="%s">Dashboard->Notices</a>.', 'adminify' ), esc_url( admin_url( 'index.php?page=wp-adminify-notices' ) ) ),
					'label'      => __( 'Hide All Admin Notices to make your Dashboard Clean', 'adminify' ),
					'default'    => $this->get_default_field( 'hide_notices' ),
					'text_on'    => 'Yes',
					'text_off'   => 'No',
					'text_width' => 80,
				];
			} else {
				$fields[] = [
					'type'     => 'notice',
					'title'    => __( 'Hide All "Admin Notices"?', 'adminify' ),
					'subtitle' => sprintf( __( 'Move all Admin Notices to <a href="%s">Dashboard->Notices</a>.', 'adminify' ), esc_url( admin_url( 'index.php?page=wp-adminify-notices' ) ) ),
					'style'    => 'warning',
					'content'  => Utils::adminify_upgrade_pro(),
				];
			}

			$fields[] = [
				'id'         => 'remove_welcome_panel',
				'type'       => 'switcher',
				'title'      => __( 'Remove Welcome Panel', 'adminify' ),
				'label'      => __( 'Show/Remove Dashboard Welcome Panel', 'adminify' ),
				'text_on'    => 'Yes',
				'text_off'   => 'No',
				'text_width' => 80,
				'default'    => $this->get_default_field( 'remove_welcome_panel' ),
			];

			if ( jltwp_adminify()->can_use_premium_code__premium_only() ) {
				$fields[] = [
					'id'         => 'remove_php_update_required_nag',
					'type'       => 'switcher',
					'title'      => __( 'Remove "PHP Update Required" Notice', 'adminify' ),
					'label'      => __( 'Show/Remove "PHP Update Required" Notice', 'adminify' ),
					'text_on'    => 'Yes',
					'text_off'   => 'No',
					'text_width' => 80,
					'default'    => $this->get_default_field( 'remove_php_update_required_nag' ),
				];
			} else {
				$fields[] = [
					'type'    => 'notice',
					'title'   => __( 'Remove "PHP Update Required" Notice', 'adminify' ),
					'label'   => __( 'Show/Remove "PHP Update Required" Notice', 'adminify' ),
					'style'   => 'warning',
					'content' => Utils::adminify_upgrade_pro(),
				];
			}

			$fields[] = [
				'id'         => 'remove_try_gutenberg_panel',
				'type'       => 'switcher',
				'title'      => __( 'Remove "Try Gutenberg" Panel', 'adminify' ),
				'label'      => __( 'Show/Remove "Try Gutenberg" Panel', 'adminify' ),
				'text_on'    => 'Yes',
				'text_off'   => 'No',
				'text_width' => 80,
				'default'    => $this->get_default_field( 'remove_try_gutenberg_panel' ),
			];

			$fields[] = [
				'type'    => 'subheading',
				'content' => __( 'WordPress Core/Theme/Plugin Notices', 'adminify' ),
			];

			if ( jltwp_adminify()->can_use_premium_code__premium_only() ) {
				$fields[] = [
					'id'         => 'core_update_notice',
					'type'       => 'switcher',
					'title'      => __( 'Hide Core Update Notice', 'adminify' ),
					'label'      => __( 'Show/Hide Core Update Notice', 'adminify' ),
					'text_on'    => 'Yes',
					'text_off'   => 'No',
					'text_width' => 80,
					'default'    => $this->get_default_field( 'core_update_notice' ),
				];
			} else {
				$fields[] = [
					'type'    => 'notice',
					'title'   => __( 'Hide Core Update Notice', 'adminify' ),
					'label'   => __( 'Show/Hide Core Update Notice', 'adminify' ),
					'style'   => 'warning',
					'content' => Utils::adminify_upgrade_pro(),
				];
			}

			if ( jltwp_adminify()->can_use_premium_code__premium_only() ) {
				$fields[] = [
					'id'         => 'plugin_update_notice',
					'type'       => 'switcher',
					'title'      => __( 'Hide Plugin Update Notice', 'adminify' ),
					'label'      => __( 'Show/Hide Plugin Update Notice', 'adminify' ),
					'text_on'    => 'Yes',
					'text_off'   => 'No',
					'text_width' => 80,
					'default'    => $this->get_default_field( 'plugin_update_notice' ),
				];
			} else {
				$fields[] = [
					'type'    => 'notice',
					'title'   => __( 'Hide Plugin Update Notice', 'adminify' ),
					'label'   => __( 'Show/Hide Plugin Update Notice', 'adminify' ),
					'style'   => 'warning',
					'content' => Utils::adminify_upgrade_pro(),
				];
			}

			if ( jltwp_adminify()->can_use_premium_code__premium_only() ) {
				$fields[] = [
					'id'         => 'theme_update_notice',
					'type'       => 'switcher',
					'title'      => __( 'Hide Theme Update Notice', 'adminify' ),
					'label'      => __( 'Show/Hide Theme Update Notice', 'adminify' ),
					'text_on'    => 'Yes',
					'text_off'   => 'No',
					'text_width' => 80,
					'default'    => $this->get_default_field( 'theme_update_notice' ),
				];
			} else {
				$fields[] = [
					'type'    => 'notice',
					'title'   => __( 'Hide Theme Update Notice', 'adminify' ),
					'label'   => __( 'Show/Hide Theme Update Notice', 'adminify' ),
					'style'   => 'warning',
					'content' => Utils::adminify_upgrade_pro(),
				];
			}
		}

		public function admin_notices_options() {
			if ( ! class_exists( 'ADMINIFY' ) ) {
				return;
			}

			$fields = [];
			$this->admin_notices_user_roles( $fields );
			$this->admin_notices_settings( $fields );

			// Admin Notices Section
			\ADMINIFY::createSection(
				$this->prefix,
				[
					'title'  => __( 'Admin Notices', 'adminify' ),
					'icon'   => 'fas fa-exclamation-circle',
					'id'     => 'adminify-admin-notices',
					'fields' => $fields,
				]
			);
		}
	}
}
