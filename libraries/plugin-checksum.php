<?php
defined( 'EDUADMIN_PLUGIN_PATH' ) || define( 'EDUADMIN_PLUGIN_PATH', dirname( __FILE__, 2 ) );
define( 'EDU_IGNORED_FILES_AND_DIRECTORIES', array(
	'.',
	'..',
	'.git',
	'.idea',
	'.editorconfig',
	'.gitattributes',
	'.github',
	'.gitignore',
	'.gitmodules',
	'.nvmrc',
	'.scrutinizer.yml',
	'.vscode',
	'CHANGELOG.md',
	'CONTRIBUTING.md',
	'Gulpfile.js',
	'LICENSE.md',
	'PLUGIN-CHECKSUM',
	'bin',
	'commitlint.config.js',
	'composer.json',
	'composer.yml',
	'changelog-fixer.js',
	'docs',
	'eduadmin.php',
	'node_modules',
	'package.json',
	'phpunit.xml',
	'readme.md',
	'scripts',
	'compiled',
	'src',
	'tests',
	'tsconfig.json',
	'vendor',
	'website',
	'wp-tests',
	'yarn-error.log',
	'yarn.lock',
) );

class EduAdminPluginIntegrityChecker {
	public static function check_plugin_integrity() {
		$hashObj = new stdClass();

		$hashObj->storedIntegrityHash  = trim( file_get_contents( EDUADMIN_PLUGIN_PATH . '/PLUGIN-CHECKSUM' ) );
		$hashObj->currentIntegrityHash = EduAdminPluginIntegrityChecker::generate_directory_md5( EDUADMIN_PLUGIN_PATH );

		return $hashObj;
	}

	private static function get_sorted_recursive_list( $dir ) {
		if ( ! is_dir( $dir ) ) {
			return false;
		}

		$entries = array();
		$d       = dir( $dir );

		while ( false !== ( $entry = $d->read() ) ) {
			if ( ! in_array( $entry, EDU_IGNORED_FILES_AND_DIRECTORIES ) ) {
				if ( is_dir( $dir . '/' . $entry ) ) {
					$subDirectoryEntries = EduAdminPluginIntegrityChecker::get_sorted_recursive_list( $dir . '/' . $entry );
					foreach ( $subDirectoryEntries as $_entry ) {
						$entries[] = $_entry;
					}
				} else {
					$entries[] = $dir . '/' . $entry;
				}
			} else {
				if ( ( php_sapi_name() === "cli" && ! empty( $argv[1] ) && $argv[1] == "debug" ) || isset( $_GET['edu-debug-integrity'] ) ) {
					echo "<!-- EduAdmin Integrity - Skipping: " . $dir . "/" . $entry . " -->\n";
				}
			}
		}
		$d->close();
		sort( $entries );

		return $entries;
	}

	private static function generate_directory_md5( $dir ) {
		if ( ! is_dir( $dir ) ) {
			return false;
		}

		$files = EduAdminPluginIntegrityChecker::get_sorted_recursive_list( $dir );

		$filemd5s = array();

		foreach ( $files as $file ) {
			$filemd5s[] = md5_file( $file );
			if ( ( php_sapi_name() === "cli" && ! empty( $argv[1] ) && $argv[1] == "debug" ) || isset( $_GET['edu-debug-integrity'] ) ) {
				echo "<!-- EduAdmin Integrity: $file: " . md5_file( $file ) . " -->\n";
			}
		}

		return md5( implode( '', $filemd5s ) );
	}
}

if ( php_sapi_name() === "cli" ) {
	echo EduAdminPluginIntegrityChecker::check_plugin_integrity()->currentIntegrityHash . "\n";
}
