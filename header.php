<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site vitrine l'image sans nom, L'Image Sans Nom est un lieu d'exposition et bibliothèque orienté sur la photographie. Il y a de nombreux ouvrages à consutler et des expositions tout au long de l'année ">
    <meta name="keywords" content="L'Image Sans Nom, l'image sans nom, exposition, livre, ouvrage, photographie, photographe, Olivier Cornil, bibliothèque">
    <meta name="author" content="Gilson Nicolas">
    <meta property="og:description" content="Site vitrine l'image sans nom, L'Image Sans Nom est un lieu d'exposition et bibliothèque orienté sur la photographie. Il y a de nombreux ouvrages à consutler et des expositions tout au long de l'année ">
    <meta property="twitter:description" content="Site vitrine l'image sans nom, L'Image Sans Nom est un lieu d'exposition et bibliothèque orienté sur la photographie. Il y a de nombreux ouvrages à consutler et des expositions tout au long de l'année ">
    <meta property="og:title" content="<?= isn_get_title(); ?>">
    <meta name="twitter:title" content="<?= isn_get_title(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isn_get_title(); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?= isn_get_theme_asset('assets/css/styles.min.css'); ?>"/>
    <link rel="icon" href="<?= isn_get_theme_asset('assets/img/logo.png'); ?>"/>

</head>
<body class="flex">

<?php if($moveImg):?>
<header class="home header">
    <?php else:?>
<header class="home">
<?php endif;?>
    <div class="container">
        <div class="home__container flex">
            <a href="../index.php" class="home__link"><span>L'image</span> sans nom</a>
            <nav role="navigation" aria-label="Main Navigation" class="no-active">
                <div class="toggle">
                    <span class="burger-menu"></span>
                </div>

                <ul class="mainNav-link flex">
                    <?php foreach (isn_get_menu('main-menu', 'nav__link') as $i => $link): ?>
                        <li class="link"><a href="<?= $link->url; ?>"
                               <?php if ($link->target): ?>target="<?= $link->target; ?>"<?php endif; ?>
                               <?php if ($link->current): ?>aria-current="page"<?php endif; ?>
                               class="<?= implode(' ', $link->classes); ?>"><?= $link->label; ?></a></li>
                    <?php endforeach; ?>
                    <?php echo do_shortcode('[gtranslate]'); ?>
                </ul>
            </nav>
        </div>


