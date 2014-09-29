<?php
/*
MIIC5jCCApACAQAwgY8xEjAQBgNVBAMTCWR1bGFjb3J0ZTEOMAwGA1UECxMFYWRt
aW4xHjAcBgNVBAoTFWVkdWFyZG9sYWNvcnRlLmNvbS5icjEfMB0GA1UEBx4WAFMA
YQBuAHQAbwAgAEEAbgBkAHIA6TEbMBkGA1UECB4SAFMA4wBvACAAUABhAHUAbABv
MQswCQYDVQQGEwJCUjBcMA0GCSqGSIb3DQEBAQUAA0sAMEgCQQDZbyo6CpSiTPd4
MozJxJmUX47IRhaGZ5cUKK3JQQLHxFbRidyC2q8Bnd9F7taQEwuNwJ3ZMK1WLfAZ
Tb40G7wpAgMBAAGgggGZMBoGCisGAQQBgjcNAgMxDBYKNS4xLjI2MDAuMjB7Bgor
BgEEAYI3AgEOMW0wazAOBgNVHQ8BAf8EBAMCBPAwRAYJKoZIhvcNAQkPBDcwNTAO
BggqhkiG9w0DAgICAIAwDgYIKoZIhvcNAwQCAgCAMAcGBSsOAwIHMAoGCCqGSIb3
DQMHMBMGA1UdJQQMMAoGCCsGAQUFBwMBMIH9BgorBgEEAYI3DQICMYHuMIHrAgEB
HloATQBpAGMAcgBvAHMAbwBmAHQAIABSAFMAQQAgAFMAQwBoAGEAbgBuAGUAbAAg
AEMAcgB5AHAAdABvAGcAcgBhAHAAaABpAGMAIABQAHIAbwB2AGkAZABlAHIDgYkA
n/hGE5NMpHm7EIJTcBK5j0gFi3YHyIzR23hx40TDoyvFQwFtFRvC06opP/U8Q4r6
4S1qcdom/5enWFlz2NuNU+clOr8hFtUbHLz3HoPePpIK8HDQtZoReUR/1qpNcE3N
JYOfOjxZMAPQBSQbGXReJHZ+do/LORRIZhmERdgIsA0AAAAAAAAAADANBgkqhkiG
9w0BAQUFAANBAKDnezLLlFBBB3HA2mVjk/ljXAPqz9kkS/+PsBtpe9DG7r+EL5eO
fLQUGA8vWkd9xiIusW22L7+shx2qnIqERPU=
*/
// FileName="Connection_php_mysql.htm"
// Type="MYSQL"
// HTTP="true"

$soft_laser_host = "mysql01.softlaser.hospedagemdesites.ws";
$soft_laser_db = "softlaser";
$soft_laser_user = "softlaser";
$soft_laser_password = "ALKSS*";
$soft_laser_conn = mysql_connect($soft_laser_host, $soft_laser_user, $soft_laser_password) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($soft_laser_db, $soft_laser_conn);

mysql_set_charset('utf8',$soft_laser_conn);

//header('Cache-Control: no-cache');
//header('Pragma: no-cache');
?>