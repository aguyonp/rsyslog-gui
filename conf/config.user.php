<?php
/*! pimpmylog - 1.7.10 - 65d6f147e509133fc5f09642ba82b149ef750ef2*/
/*
 * pimpmylog
 * http://pimpmylog.com
 *
 * Copyright (c) 2015 Potsky, contributors
 * Licensed under the GPLv3 license.
 */
?>
<?php if(realpath(__FILE__)===realpath($_SERVER["SCRIPT_FILENAME"])){header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');die();}?>
{
	"globals": {
		"_remove_me_to_set_AUTH_LOG_FILE_COUNT"         : 100,
		"_remove_me_to_set_AUTO_UPGRADE"                : false,
		"_remove_me_to_set_CHECK_UPGRADE"               : true,
		"_remove_me_to_set_EXPORT"                      : true,
		"_remove_me_to_set_FILE_SELECTOR"               : "bs",
		"FOOTER"                      : "PimpMyLogs",
		"_remove_me_to_set_FORGOTTEN_YOUR_PASSWORD_URL" : "http:\/\/support.pimpmylog.com\/kb\/misc\/forgotten-your-password",
		"_remove_me_to_set_GEOIP_URL"                   : "http:\/\/www.geoiptool.com\/en\/?IP=%p",
		"_remove_me_to_set_GOOGLE_ANALYTICS"            : "UA-XXXXX-X",
		"_remove_me_to_set_HELP_URL"                    : "http:\/\/pimpmylog.com",
		"_remove_me_to_set_LOCALE"                      : "gb_GB",
		"_remove_me_to_set_LOGS_MAX"                    : 50,
		"_remove_me_to_set_LOGS_REFRESH"                : 0,
		"_remove_me_to_set_MAX_SEARCH_LOG_TIME"         : 5,
		"_remove_me_to_set_NAV_TITLE"                   : "",
		"_remove_me_to_set_NOTIFICATION"                : true,
		"_remove_me_to_set_NOTIFICATION_TITLE"          : "New logs [%f]",
		"_remove_me_to_set_PIMPMYLOG_ISSUE_LINK"        : "https:\/\/github.com\/potsky\/PimpMyLog\/issues\/",
		"_remove_me_to_set_PIMPMYLOG_VERSION_URL"       : "http:\/\/demo.pimpmylog.com\/version.js",
		"_remove_me_to_set_PULL_TO_REFRESH"             : true,
		"_remove_me_to_set_SORT_LOG_FILES"              : "default",
		"_remove_me_to_set_TAG_DISPLAY_LOG_FILES_COUNT" : true,
		"_remove_me_to_set_TAG_NOT_TAGGED_FILES_ON_TOP" : true,
		"_remove_me_to_set_TAG_SORT_TAG"                : "default | display-asc | display-insensitive | display-desc | display-insensitive-desc",
		"_remove_me_to_set_TITLE"                       : "Pimp my Log",
		"_remove_me_to_set_TITLE_FILE"                  : "Pimp my Log [%f]",
		"_remove_me_to_set_UPGRADE_MANUALLY_URL"        : "http:\/\/pimpmylog.com\/getting-started\/#update",
		"_remove_me_to_set_USER_CONFIGURATION_DIR"      : "config.user.d",
		"_remove_me_to_set_USER_TIME_ZONE"              : "Europe\/Paris"
	},

	"badges": {
		"severity": {
			"debug"       : "success",
			"info"        : "success",
			"notice"      : "default",
			"Notice"      : "info",
			"warn"        : "warning",
			"error"       : "danger",
			"crit"        : "danger",
			"alert"       : "danger",
			"emerg"       : "danger",
			"Notice"      : "info",
			"fatal error" : "danger",
			"parse error" : "danger",
			"Warning"     : "warning"
		},
		"http": {
			"1" : "info",
			"2" : "success",
			"3" : "default",
			"4" : "warning",
			"5" : "danger"
		}
	},

	"files": {
		"syslog": {
			"display" : "Syslog",
			"path"    : "/var/log/net/syslog.log",
			"refresh" : 20,
			"max"     : 20,
			"notify"  : false,
			"format"  : {
				"regex": "|([0-9]{1,2}-.*-[0-9]{1,4} [0-9]{1,2}:[0-9]{1,2}:[0-9]{1,2}.[0-9]{1,3}) (.*?) (.*?) (.*?)$|",
				"match": {
					"Date"    : 1,
					"Time"    : 1,
					"IP"  	  : 2,
					"Log Level"   : 3,
					"Message" : 4
				},
				"types": {
					"Date"    : "date:d:M:Y",
					"Time"    : "date:H:i:s",
					"Log Level": "txt",
					"IP"      : "txt",
					"Message" : "txt"
				}
			}
		}
	}
}