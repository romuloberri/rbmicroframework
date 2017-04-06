<html>
<head>
    <title>App name</title>
</head>
<body>
    <h1>App name</h1>
    <?php if ($user_name != ''): ?>
        <h5>Welcome <?php echo $user_name ?></h5>
    <?php endif; ?>
    <?php require $view_file; ?>
</body>
</html>