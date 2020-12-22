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

defined( 'ABSPATH' ) || exit;

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * Finally load the addon.
 */
add_action(
	'plugins_loaded',
	function() {

		$plugin = Plugin::instance( __FILE__ );

	}
);
