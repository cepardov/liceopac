<?php

function wp_example_excerpt_length( $length ) {
    return 30;
}

function liceopac_pagination(){
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base'               => str_replace($big, '%#%', get_pagenum_link($big)),
        'format'             => '?paged=%#%',
        'current'            => max(1, get_query_var('paged')),
        'prev_text'          => __('<i class="material-icons">chevron_left</i>'),
        'next_text'          => __('<i class="material-icons">chevron_right</i>')
    ));
}

//Agregamos Open Graph en los Language Attributes
function og_doctype( $output ) {
    return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}

//Añadimos la información Open Graph
function og_facebook() {
    global $post;
    if ( !is_singular()) //Si no es un post o página
        return;
    echo '<meta property="og:url" content="' . get_permalink() . '"/>';
    echo '<meta property="og:title" content="' . get_the_title() . '"/>';
    echo '<meta property="fb:app_id" content="143575972870943"/>';
    if(!has_post_thumbnail( $post->ID )) { //La entrada no tiene imagen destacada, utiliza una imagen predeterminada
        $default_image="https://www.liceopac.cl/wp-content/themes/liceopac/img/logo.png"; //Aquí tienes que poner la ruta de la imagen prefeterminada que se mostrará.
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
    else{
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }
    echo "";
}

function the_page() {
    $content = get_the_content();
    echo $content;
}

function text_content( $content ) {
    $textcontent = preg_replace('/(<)([img])(\w+)([^>]*>)/', '', $content);

    $cadena_resultante= preg_replace("/((http|https|www)[^\s]+)/", '<a href="$1">$0</a>', $textcontent);

    $cadena_resultante= preg_replace("/href=\"www/", 'href="http://www', $cadena_resultante);

    //return $cadena_resultante;
    return $textcontent;

}

function video_embed(){
    $test = get_the_content();

    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    $fullstring = $test;
    $parsed = get_string_between($fullstring, '<iframe', '></iframe>');

    if (strpos($test, '<iframe') !== false) {
        echo '<div class="container"><h5 class="blue-grey-text col s12">Galería de Vídeos</h5><div class="col s12"><iframe' . $parsed . '></iframe></div></div>'; // (result = dog)
    }
}

function contenido(){
    $test = get_the_content();

    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    $fullstring = $test;
    $parsed = get_string_between($fullstring, '[l]', '[/l]');
    $link = preg_split(',', $parsed);
    $name = $link[1];


    echo '<a href="'. $link[0] .'">'. $name .'</a>';
}

function the_text(){
    $cadena_origen= text_content();

    $cadena_resultante= preg_replace("/((http|https|www)[^\s]+)/", '<a href="$1">$0</a>', $cadena_origen);

    $cadena_resultante= preg_replace("/href=\"www/", 'href="http://www', $cadena_resultante);

    echo $cadena_resultante;
}


function the_images_b() {
    $post = get_post();
    $attachments = get_posts( array(
        'post_type' => 'attachment',
        'posts_per_page' => -1,
        'post_parent' => $post->ID,
    ) );

    if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
            $thumbimg = wp_get_attachment_url( $attachment->ID, 'medium', false );

            echo '<div class="col s2">';
            echo '<img class="materialboxed postimg" width="100%" src="'. $thumbimg . '">';
            echo '</div>';
        }
    }

}

function the_images() {
    $post = get_post();
    $attachments = get_posts( array(
        'post_type' => 'attachment',
        'posts_per_page' => -1,
        'post_parent' => $post->ID,
    ) );

    if ( $attachments ) {
        echo '<h4 class="blue-grey-text col s12">Galería de Imágenes</h4>';
        foreach ( $attachments as $attachment ) {
            $thumbimg = wp_get_attachment_image( $attachment->ID, 'thumbnail', false );
            $thumbimgurl = wp_get_attachment_url( $attachment->ID, 'medium', false );

            echo '<div class="col s2 space">';
            echo '<a href="'.$thumbimgurl.'" class="html5lightbox">'.$thumbimg.'</a>';
            echo '</div>';
        }
    }

}

function my_post_queries( $query ) {
    // do not alter the query on wp-admin pages and only alter it if it's the main query
    if (!is_admin() && $query->is_main_query()){

        // alter the query for the home and category pages

        if(is_home()){
            $query->set('posts_per_page', 9);
        }

        if(is_category()){
            $query->set('posts_per_page', 9);
        }

        if(is_search()){
            $query->set('posts_per_page', 9);
        }

    }
}

function my_loginlogo() {
    echo '<style type="text/css">
    h1 a {
      background-image: url(' . get_template_directory_uri() . '/img/logo.png) !important;
    }
  </style>';
}
function my_loginURL() {
    return '//www.liceopac.cl';
}
function my_loginURLtext() {
    return 'Liceo Pedro Aguirre Cerda';
}
function my_logincustomCSSfile() {
    wp_enqueue_style('login-styles', get_template_directory_uri() . '/css/login.css');
    wp_enqueue_script('login-styles', get_template_directory_uri() . '/js/materialize.min.js');
}
add_action('login_enqueue_scripts', 'my_logincustomCSSfile');

add_action( 'pre_get_posts', 'my_post_queries' );

add_filter('login_headertitle', 'my_loginURLtext');

add_filter('login_headerurl', 'my_loginURL');

add_action('login_head', 'my_loginlogo');

add_filter( 'the_content', 'text_content' );


add_action( 'wp_ajax_be_ajax_load_more', 'be_ajax_load_more' );
add_action( 'wp_ajax_nopriv_be_ajax_load_more', 'be_ajax_load_more' );

add_filter('language_attributes', 'og_doctype');
add_action( 'wp_head', 'og_facebook', 3 );
add_action('init', 'liceopac_pagination');
add_filter( 'excerpt_length', 'wp_example_excerpt_length');

add_theme_support( 'post-thumbnails' );