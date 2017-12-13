<!DOCTYPE html>
<html>
<head>
    <?php og_facebook(); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="robots" content="index, follow">
    <meta name="description" content="Liceo Pedro Aguirre Cerda Puerto Varas es una institución de educación Cientifico Humanista y Colegio Tecnico">
    <meta name="theme-color" content="#78909c">
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/materialize.css"  media="screen,projection"/>
    <title><?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<header>
    <div class="navbar-fixed blue-grey hide-on-large-only">
        <nav class="blue-grey lighten-1">
            <div class="nav-wrapper">
                <ul class="left">
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                </ul>
                <ul class="left">
                    <a href="<?php echo home_url(); ?>" class="responsive-text"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
                </ul>
            </div>
        </nav>
    </div>
    <?php if (is_single() || is_page('pei') || is_page('pme') || is_search() ): ?>
        <div class="navbar-fixed">
            <nav class="blue-grey lighten-1">
                <div class="nav-wrapper">
                    <?php if (is_search()): ?>
                        <ul class="flow-text center-align"><?php echo $wp_query->found_posts; ?> <?php _e( 'Resultados para el termino', 'locale' ); ?>: "<?php the_search_query(); ?>"</ul>
                    <?php else: ?>
                        <ul class="flow-text center-align"><?php the_title(); ?></ul>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    <?php endif; ?>
    <ul id="slide-out" class="side-nav fixed">
        <li>
            <div class="userView z-depth-3">
                <div class="background">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/office.jpg">
                </div>
                <div class="center">
                    <a href="#!">
                        <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png">
                        <div class="white-text flow-text logo-text">Símbolo de un esfuerzo renovado</div>
                    </a>
                </div>
                <br>
            </div>
            <div class="row">
                <div class="blue-grey lighten-4">
                    <form method="get" action="<?php echo home_url(); ?>" role="search">
                        <div class="input-field col s12">
                            <input name="s" placeholder="Buscar" id="first_name" type="text" class="validate">
                        </div>
                        <div class="col s12">
                            <button class="search-submit btn waves-light blue-grey lighten-1 col s12" type="submit" role="button">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        <li><div class="divider"></div></li>
        </li>
        <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Inicio" href="//www.liceopac.cl/"><i class="material-icons">home</i>Liceo Pedro Aguirre Cerda</a></li>
        <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Noticias" href="/noticias/"><i class="material-icons">assignment</i>Noticias Liceo PAC</a></li>
        <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Reglamento, Emergencias y Seguridad" href="/documentos/"><i class="material-icons">cloud</i>Documentación</a></li>
        <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Proyecto Educativo Institucional (P.E.I)" href="/pei/"><i class="material-icons">extension</i>Proyecto Educativo</a></li>
        <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Plan Mejoramiento Educacional (P.M.E)" href="/pme/"><i class="material-icons">timeline</i>Plan de Mejoramiento</a></li>
        <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Técnico Profesional" href="/tecnico-profesional/"><i class="material-icons">work</i>Técnico Profesional</a></li>
        <li><a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Admisión y matrícula 2018" href="/admision-2018/"><i class="material-icons">school</i>Admisión</a></li>
        <li class="center-align middle"><div class="fb-like middle" data-href="https://www.liceopac.cl" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div></li>
    </ul>
</header>
<main class="grey lighten-4">
<!-- header -->