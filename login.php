<?php
$host = isset($_GET['opd']) ? urldecode($_GET['opd']) : '';
$configFile = 'config/opd_config.json';

if (!file_exists($configFile)) {
    die("Configuration file not found.");
}

$configData = json_decode(file_get_contents($configFile), true);

if (!array_key_exists($host, $configData)) {
    die("Configuration for this domain not found.");
}

$opdConfig = $configData[$host];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?php echo htmlspecialchars($opdConfig['name']); ?></title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        body {
            background-image: url('<?php echo htmlspecialchars($opdConfig['background_image']); ?>');
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="<?php echo htmlspecialchars($opdConfig['logo']); ?>" alt="Logo" class="logo">
        <h1><?php echo htmlspecialchars($opdConfig['name']); ?></h1>
        <form action="authenticate.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
