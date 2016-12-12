<?php
/**
 * ivt functions and definitions
 *
 * @package ivt
 */

if ( ! function_exists( 'ivt_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ivt_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ivt, use a find and replace
	 * to change 'ivt' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ivt', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'ivt' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ivt_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // ivt_setup
add_action( 'after_setup_theme', 'ivt_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ivt_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ivt_content_width', 640 );
}
add_action( 'after_setup_theme', 'ivt_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ivt_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ivt' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'ivt_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ivt_scripts() {
	wp_enqueue_style( 'ivt-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ivt-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ivt-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ivt_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Для вывоад миниатюр в посте
 */
add_theme_support( 'post-thumbnails' ); // для всех типов постов
/* Добавление фиксированного размера миниатюрам */
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 150, 100, true ); 
 
}

function the_breadcrumb() {

	/* === OPTIONS === */
	$text['home']     = 'Главная'; // text for the 'Home' link
	$text['category'] = '%s'; // text for a category page
	$text['search']   = 'Search Results for "%s" Query'; // text for a search results page
	$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
	$text['author']   = 'Articles Posted by %s'; // text for an author page
	$text['404']      = 'Error 404'; // text for the 404 page
	$text['page']     = 'Page %s'; // text 'Page N'
	$text['cpage']    = 'Comment Page %s'; // text 'Comment Page N'

	$delimiter      = '/'; // delimiter between crumbs
	$delim_before   = '<span class="divider">'; // tag before delimiter
	$delim_after    = '</span>'; // tag after delimiter
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_current   = 1; // 1 - show current page title, 0 - don't show
	$show_title     = 1; // 1 - show the title for the links, 0 - don't show
	$before         = '<span class="current">'; // tag before the current crumb
	$after          = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */

	global $post;
	$home_link      = home_url('/');
	$link_before    = '<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
	$link_after     = '</span>';
	$link_attr      = ' itemprop="url"';
	$link_in_before = '<span itemprop="title">';
	$link_in_after  = '</span>';
	$link           = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
	$frontpage_id   = get_option('page_on_front');
	$parent_id      = $post->post_parent;
	$delimiter      = ' ' . $delim_before . $delimiter . $delim_after . ' ';

	if (is_home() || is_front_page()) {

		if ($show_on_home == 1) echo '<div id="breadcrumb"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';

	} else {

		echo '<div id="breadcrumb">';
		if ($show_home_link == 1) echo sprintf($link, $home_link, $text['home']);

		if ( is_category() ) {
			$cat = get_category(get_query_var('cat'), false);
			if ($cat->parent != 0) {
				$cats = get_category_parents($cat->parent, TRUE, $delimiter);
				$cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				if ($show_home_link == 1) echo $delimiter;
				echo $cats;
			}
			if ( get_query_var('paged') ) {
				$cat = $cat->cat_ID;
				echo $delimiter . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $delimiter . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current == 1) echo $delimiter . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
			}

		} elseif ( is_search() ) {
			if ($show_home_link == 1) echo $delimiter;
			echo $before . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			if ($show_home_link == 1) echo $delimiter;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			if ($show_home_link == 1) echo $delimiter;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			if ($show_home_link == 1) echo $delimiter;
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ($show_home_link == 1) echo $delimiter;
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($show_current == 0 || get_query_var('cpage')) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
				if ( get_query_var('cpage') ) {
					echo $delimiter . sprintf($link, get_permalink(), get_the_title()) . $delimiter . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
				} else {
					if ($show_current == 1) echo $before . get_the_title() . $after;
				}
			}

		// custom post type
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			if ( get_query_var('paged') ) {
				echo $delimiter . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $delimiter . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current == 1) echo $delimiter . $before . $post_type->label . $after;
			}

		} elseif ( is_attachment() ) {
			if ($show_home_link == 1) echo $delimiter;
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			if ($cat) {
				$cats = get_category_parents($cat, TRUE, $delimiter);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_page() && !$parent_id ) {
			if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($show_home_link == 1) echo $delimiter;
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
			}
			if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_tag() ) {
			if ($show_current == 1) echo $delimiter . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
			if ($show_home_link == 1) echo $delimiter;
			global $author;
			$author = get_userdata($author);
			echo $before . sprintf($text['author'], $author->display_name) . $after;

		} elseif ( is_404() ) {
			if ($show_home_link == 1) echo $delimiter;
			echo $before . $text['404'] . $after;

		} elseif ( has_post_format() && !is_singular() ) {
			if ($show_home_link == 1) echo $delimiter;
			echo get_post_format_string( get_post_format() );
		}

		echo '</div><!-- .breadcrumbs -->';

	}
} 



function dateToRussian($date) {
    $month = array("january"=>"января", "february"=>"февраля", "march"=>"марта", "april"=>"апреля", "may"=>"мая", "june"=>"июня", "july"=>"июля", "august"=>"августа", "september"=>"сентября", "october"=>"октября", "november"=>"ноября", "december"=>"декабря");
    $days = array("monday"=>"Понедельник", "tuesday"=>"Вторник", "wednesday"=>"Среда", "thursday"=>"Четверг", "friday"=>"Пятница", "saturday"=>"Суббота", "sunday"=>"Воскресенье");
    return str_replace(array_merge(array_keys($month), array_keys($days)), array_merge($month, $days), strtolower($date));
}



/* Plugin Name: Increase Upload Limit */

add_filter( 'upload_size_limit', 'b5f_increase_upload' );

function b5f_increase_upload( $bytes )
{
    return 33554432; // 32 megabytes
}


/** Последние записи
------------------------------------------------------
$post_num (5) = количество ссылок
$format ('') = {avatar} {author}: {date:j.M.Y} - {a}{title}{/a} ({comments})
$cat ('') = Категории из которых нужно выводить (5,15) или которые нужно исключить (-5,-15), через запятую (одновременно включение и исключение не работает (не имеет смысла) )
$list_tag (li) = Тег списка
*/
function get_ivt_recent_posts ($post_num=3, $format='', $cat='', $list_tag='li', $echo=true){
	global $post, $wpdb;

	$cur_postID = $post->ID;
	
	// исключим посты главного запроса (wp_query)
	foreach( $GLOBALS['wp_query']->posts as $post )
		$IDs .= $post->ID .',';
	$AND_NOT_IN = ' AND p.ID NOT IN ('. rtrim($IDs, ',') .')';

	if ($cat){
		$JOIN = "LEFT JOIN $wpdb->term_relationships rel ON ( p.ID = rel.object_id )
			LEFT JOIN $wpdb->term_taxonomy tax ON ( tax.term_taxonomy_id = rel.term_taxonomy_id  ) ";
		$DISTINCT = "DISTINCT";
		$AND_taxonomy = "AND tax.taxonomy = 'category'";
		$AND_category = "AND tax.term_id IN ($cat)";
		//Проверка на исключение категорий
		if( strpos($cat, '-')!==false )
			$AND_category = 'AND tax.term_id NOT IN ('. str_replace( '-','', $cat ) .')';

	}
	//если нужно показать автора
	if( strpos($format, '{author}')!==false ){
		$JOIN .= " LEFT JOIN $wpdb->users u ON ( p.post_author = u.ID )";
		$SEL = ", u.user_nicename AS author, u.user_email, u.user_url";
		//если нужно показать аватар (gavatar)
		if( strpos($format, '{avatar}')!==false )
			$av = "<img src='http://www.gravatar.com/avatar/%1\$s?s=25' alt='' />";
	}

	$sql = "SELECT $DISTINCT p.ID, post_title, post_date,  comment_count, guid $SEL
	FROM $wpdb->posts p $JOIN
	WHERE post_type = 'post' AND post_status = 'publish' $AND_category $AND_taxonomy $AND_NOT_IN
	ORDER BY post_date DESC LIMIT $post_num";
	$results = $wpdb->get_results($sql);

	if (!$results)
		return false;
	preg_match ('@\{date:(.*?)\}@', $format, $date_m);
	foreach ($results as $pst){
		$x == 'li1' ? $x = 'li2' : $x = 'li1';
		if ( $pst->ID == $cur_postID ) $x .= " current-item";
		$Title = $pst->post_title;
		$a = "<a href='". get_permalink($pst->ID) ."' title='{$Title}'>";

		if ($format){
			$avatar = $av ? sprintf( $av, md5($pst->user_email) ) : '';
			$date = apply_filters('the_time', mysql2date($date_m[1], $pst->post_date));
			$Sformat = str_replace ($date_m[0], $date, $format);
			$Sformat = str_replace(
				array('{title}', '{a}', '{/a}', '{author}',   '{comments}',         '{avatar}'),
				array( $Title,    $a,   '</a>',  $pst->author, $pst->comment_count,  $avatar  ),
				$Sformat
			);
		}
		else $Sformat = "$a$Title</a>";
		$out .= "\n<$list_tag class='$x'>{$Sformat}</$list_tag>";
	}
	if ($echo)
		return print $out;
	return $out;
}

// Show Wp-PageNavi when it's active
function unite_content_nav( $nav_id ) {
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) : ?>
	   <?php /* add wp-pagenavi support for posts */ ?>
		<?php if(function_exists('wp_pagenavi') ) : ?>
			<?php wp_pagenavi(); ?>
			<br />
				<?php else: ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">←</span> Older posts', 'twentyeleven' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">→</span>', 'twentyeleven' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif; ?>
	<?php endif;
}





/**
 * Register css and js files.
 */
// if ( !is_admin() ) {
// 	function register_my_js() {
// 	  wp_enqueue_script( 'responsive-menu', get_template_directory_uri().'/js/responsive-menu.js', array( 'jquery' ), '1.0' ); 
// 	} 
// 	add_action('wp_enqueue_scripts', 'register_my_js'); 
// }



    // =========================================================================
    // REMOVE JUNK FROM HEAD
    // =========================================================================
    remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
    remove_action('wp_head', 'wp_generator'); // remove wordpress version

    remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
    remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links

    remove_action('wp_head', 'index_rel_link'); // remove link to index page
    remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)

    remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
	
	remove_action ('wp_head', 'rel_canonical');

	add_action('admin_init', 'my_extra_fields', 1);
	function my_extra_fields() {
	add_meta_box( 'extra_fields', 'Дополнительные данные', 'extra_fields_box_func', 'post', 'normal', 'high' );
	}
	function extra_fields_box_func( $post ){
	?>
	<p><label style="font-weight:bold; width:145px; display: block; float: left;">Англ. версия (url):</label><input type="text" name="extra[enurl]" value="<?php echo get_post_meta($post->ID, 'enurl', 1); ?>" style="width:555px;" /></p>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
	<?php
	}
	// включаем обновление полей при сохранении
	add_action('save_post', 'my_extra_fields_update', 0);
	/* Сохраняем данные, при сохранении поста */
	function my_extra_fields_update( $post_id ){
	if ( !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // проверка
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return false; // если это автосохранение
	if ( !current_user_can('edit_post', $post_id) ) return false; // если юзер не имеет право редактировать запись
	if( !isset($_POST['extra']) ) return false; 
	// Все ОК! Теперь, нужно сохранить/удалить данные
	$_POST['extra'] = array_map('trim', $_POST['extra']);
	foreach( $_POST['extra'] as $key=>$value ){
	if( empty($value) )
	delete_post_meta($post_id, $key); // удаляем поле если значение пустое
	update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
	continue;
	}
	return $post_id;
	}
	//Создаём функйию подключения стилей thickbox 
	function upload_styles() {
	wp_enqueue_style('thickbox');
	}
	add_action('admin_print_scripts', 'upload_scripts'); //Регистрируем скрипты в админке
	add_action('admin_print_styles', 'upload_styles'); //Регестрируем стили в админке
?>