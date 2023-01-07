<?php $metaAppTitle = "Belgian's Beers"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $metaPageTitle ? "{$metaAppTitle} - {$metaPageTitle}" : $metaAppTitle ?></title>
  <link rel="stylesheet" href="/assets/stylesheets/styles.css">
</head>

<body>
<?php include_once "views/layouts/layout-header.php"; ?>
<?php include_once "views/layouts/layout-alert.php"; ?>
<?php include_once "views/{$actionView}";?>
<?php include_once "views/layouts/layout-footer.php";?>
</body>

</html>
