
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $__env->yieldContent('title', 'Inicio'); ?> | EmpleaU</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
</head>

<body>

<header class="topbar">
    <div class="nav-container">

        <a href="<?php echo e(route('home')); ?>" class="brand">
            <span class="brand-mark">E</span>
            emplea<span>U</span>
        </a>

        <nav class="nav-links">
            <a href="<?php echo e(route('home')); ?>">Inicio</a>
            <a href="<?php echo e(route('jobs.index')); ?>">Vacantes</a>

            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('dashboard')); ?>">Mi panel</a>
                <a href="<?php echo e(route('profile.edit')); ?>">Mi perfil</a>

                <?php if(auth()->user()->role === 'student'): ?>
                    <a href="<?php echo e(route('applications.index')); ?>">Postulaciones</a>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="nav-button">Cerrar sesión</button>
                </form>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>">Ingresar</a>
                <a href="<?php echo e(route('register')); ?>" class="nav-cta">Crear cuenta</a>
            <?php endif; ?>
        </nav>

    </div>
</header>

<main class="container">

    <?php if(session('success')): ?>
        <div class="alert success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert error"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert error">
            <strong>Revisa los siguientes campos:</strong>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>

</main>

<footer class="footer">
    <div class="footer-inner">

        <a href="<?php echo e(route('home')); ?>" class="brand">
            <span class="brand-mark">E</span>
            emplea<span>U</span>
        </a>

        <p>Conectamos tu talento con nuevas oportunidades.</p>

        <small>
            Proyecto académico · Tecnología en Sistemas de Información
        </small>

    </div>
</footer>

</body>
</html>
<?php /**PATH C:\Users\Usuario\OneDrive\Desktop\CATALOGO\bolsa-empleo-estudiantes\resources\views/layouts/app.blade.php ENDPATH**/ ?>