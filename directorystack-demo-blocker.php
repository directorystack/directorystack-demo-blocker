<?php
/**
 * Plugin Name:     DirectoryStack Demo Blocker
 * Plugin URI:      https://directorystack.com/
 * Description:     Block certain actions from being performed on demo sites.
 * Author:          Sematico LTD
 * Author URI:      https://sematico.com
 * Text Domain:     directorystack-demo-blocker
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * DirectoryStack Demo Blocker is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * DirectoryStack Demo Blocker is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with DirectoryStack Demo Blocker. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package directorystack-social-login
 * @author Sematico LTD
 */

namespace DirectoryStack\Blocker;

use Exception;

defined( 'ABSPATH' ) || exit;

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require dirname( __FILE__ ) . '/vendor/autoload.php';
}

function triggerDisabledException() {
	throw new Exception( 'This functionality is disabled for this demo.' );
}

/**
 * Disable registration.
 */
add_action(
	'directorystack_before_registration',
	function() {
		throw new Exception( 'Registrations are disabled on this demo. Please login with user: demo & password: testing &mdash; to play around with the demo.' );
	}
);

add_action( 'directorystack_before_password_recovery', __NAMESPACE__ . '\\triggerDisabledException' );
add_action( 'ds_before_data_erasure_request', __NAMESPACE__ . '\\triggerDisabledException' );
add_action( 'ds_before_data_export_request', __NAMESPACE__ . '\\triggerDisabledException' );
add_action( 'directorystack_before_listing_editing', __NAMESPACE__ . '\\triggerDisabledException' );
add_action( 'directorystack_before_delete_account', __NAMESPACE__ . '\\triggerDisabledException' );
add_action( 'directorystack_before_password_change', __NAMESPACE__ . '\\triggerDisabledException' );
add_action( 'directorystack_before_user_update', __NAMESPACE__ . '\\triggerDisabledException' );
add_action( 'ds_before_claim_submission', __NAMESPACE__ . '\\triggerDisabledException' );
add_action( 'ds_reviews_before_review_submission', __NAMESPACE__ . '\\triggerDisabledException' );
add_action( 'ds_abuses_before_listing_report_submit', __NAMESPACE__ . '\\triggerDisabledException' );
add_action( 'ds_abuses_before_review_report_submit', __NAMESPACE__ . '\\triggerDisabledException' );

// Prevent reviews from being deleted.
\add_action(
	'init',
	function() {
		if ( isset( $_GET['delete_review_nonce'] ) ) {
			wp_die( 'This functionality is disabled for this demo.' );
		}
	},
	9
);

// prevent login via social networks
add_action( 'init', function() {
	if ( isset( $_GET['ds_social'] ) ) {
		wp_die( 'Due to privacy rules in EU, social login has been disabled for the purpose of this demo.' );
	}
}, 9 );
