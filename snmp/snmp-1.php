<?php

$ip = '192.168.255.200';
$community = 'public_ro';

// 接続
$session = new SNMP(SNMP::VERSION_1, $ip, $community);

// 機器のFQDN取得
$fqdn   = $session->get('system.sysName.0');
echo $fqdn . "<br>";

// SNMPエージェントが起動してからの時間を取得
$uptime = $session->get('system.sysUpTime.0');
echo $uptime . "<br>";

// udp/tcpに関する情報を取得
$udp = $session->walk('udp');
$tcp = $session->walk('tcp');
echo nl2br(print_r($udp, true));
echo nl2br(print_r($tcp, true));

// ネットワーク送受信モジュールに関する情報を取得
$transmission = $session->walk('transmission');
echo nl2br(print_r($transmission, true));

// snmpに関する情報を取得
$snmp = $session->walk('snmp');
echo nl2br(print_r($snmp, true));

$session->close();
?>