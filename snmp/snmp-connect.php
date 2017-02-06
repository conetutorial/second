<?php

$ip = '192.168.255.200';
$community = 'public_ro';

// 接続 snmpバージョン1で接続
$session = new SNMP(SNMP::VERSION_1, $ip, $community);

// 機器のFQDN取得
$fqdn   = $session->get('system.sysName.0');


$session->close();

echo $fqdn;
?>