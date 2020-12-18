<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>
    <link rel="stylesheet" href="./App/Public/App.css">
    <style>
        body {
            height: 100%;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php echo $__env->make($view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH /home/vitalik/projects/JarvisFramework/App/Views//Layouts/MasterView.blade.php ENDPATH**/ ?>