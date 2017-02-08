<?php

$ip = '192.168.255.200';
$community = 'public_ro';

// 接続
$session = new SNMP(SNMP::VERSION_1, $ip, $community);

// 機器のFQDN取得
$fqdn   = $session->get('system.sysName.0');

// SNMPエージェントが起動してからの時間を取得
$uptime = $session->get('system.sysUpTime.0');

// udp/tcpに関する情報を取得
$udp = $session->walk('udp');
$tcp = $session->walk('tcp');

// ネットワーク送受信モジュールに関する情報を取得
$transmission = $session->walk('transmission');

// snmpに関する情報を取得
$snmp = $session->walk('snmp');

$session->close();
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SNMPを使った情報取得サンプル</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script></head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                SNMPを使ったサンプルコード
            </a>
        </div>
    </div>
</nav>
<div class="container">
    <dl>
        <dt>FQDN</dt>
        <dd><?= $fqdn ?></dd>
    </dl>
    <dl>
        <dt>SNMPエージェント起動経過時間</dt>
        <dd><?= $uptime ?></dd>
    </dl>
    <dl>
        <dt>TCP</dt>
        <dd>
            <?php foreach ($tcp as $item) {
                echo $item . "<br>";
            }
            ?>
        </dd>
    </dl>
    <dl>
        <dt>UDP</dt>
        <dd>
        <?php foreach ($udp as $item) {
            echo $item . "<br>";
        }
        ?>
        </dd>
    </dl>
    <dl>
        <dt>ネットワーク送受信モジュール</dt>
        <dd>
            <?php foreach ($transmission as $item) {
                echo $item . "<br>";
            }
            ?>
        </dd>
    </dl>
    <dl>
        <dt>SNMP</dt>
        <dd>
            <?php foreach ($snmp as $item) {
                echo $item . "<br>";
            }
            ?>
        </dd>
    </dl>
</div>
</body>
</html>
