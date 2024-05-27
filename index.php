<?php
$host = $_SERVER['HTTP_HOST'];
$configFile = 'config/opd_config.json';

if (!file_exists($configFile)) {
    die("Configuration file not found.");
}

$configData = json_decode(file_get_contents($configFile), true);

if (array_key_exists($host, $configData)) {
    header("Location: login.php?opd=" . urlencode($host));
    exit();
} else {
    die("Configuration for this domain not found.");
}
?>
