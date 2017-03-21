<?php
/**
 * Contains admin notices to the user
 */

/**
 * Sets an admin notice to announce that config needs to be done.
 */
function edu_notice_config_incomplete()
{
    add_action('admin_notices', function () {
        $class = 'notice notice-error';
        printf('<div class="%1$s"><p>%2$s</p></div>', $class, edu_notice_config_incomplete_message());
    });
}

function edu_notice_config_incomplete_message() {
    return "Please complete the <strong>EduAdmin</strong> configuration: " .
        "<a href=\"" . admin_url() . "admin.php?page=eduadmin-settings\">Api Authentication</a>";
}