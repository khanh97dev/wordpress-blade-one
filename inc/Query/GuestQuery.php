<?php
namespace Inc\Query;


class GuestQuery
{
    public function __construct()
    {
        if(method_exists($this,'dataFetchSearch')){
            add_action('wp_ajax_get_ajax_posts' , array($this, 'dataFetchSearch'));
        }
        if(method_exists($this,'dataFetchSearch')){
            add_action('wp_ajax_nopriv_get_ajax_posts',array($this, 'dataFetchSearch'));
        }
        if(method_exists($this,'loadMore')){
            add_action('wp_ajax_load_more' , array($this, 'loadMore'));
        }
        if(method_exists($this,'loadMore')){
            add_action('wp_ajax_nopriv_load_more',array($this, 'loadMore'));
        }
    }
    /**
     *
     * Retrieve queried object
     * @return array
     *
     */
    public static function dataFetchSearch()
    {
        $arr = [
            'posts_per_page' => 10,
            's' => esc_attr( $_POST['keyword'] ),
            'post_type' => 'post'
        ];
        $the_query = new \WP_Query( $arr );
        if( $the_query->have_posts() ) :
            // template part
            echo view('partial.forms.form-search-template', array('the_query' => $the_query));
            wp_reset_postdata();
            die();
        endif;
        die();
    }

    /**
     * insert new post Movie
     * @param idParent,title,link add query params
     */
    public static function insertPostMovie($idParent, $title, $link){
        $arr = [
            'post_parent' => $idParent,
            'post_title'  => $title,
            'post_field'  => $link
        ];
        wp_insert_post($arr);
    }

    /**
     * @return array
     */
    public static function relatedQuery($postsPerPage = 3){
        global $post;
        $args = [
            'posts_per_page'   => $postsPerPage,
            'ignore_sticky_posts ' => 1,
            'post_type'        => 'post',
            'orderby'          => 'date',
            'order'            => 'ASC'
        ];
        $query = new \WP_Query($args);
        return $query->get_posts();
    }

    /**
     * get category query related post
     * @return array
     */
    public static function relatedQueryCat($postsPerPage = 3){
        global $post;
        $categories = get_the_category();
        $catID = $categories[0]->term_id;
        $args = [
            'cat'                 => $catID,
            'post__not_in'        => array($post->ID),
            'posts_per_page'      => $postsPerPage,
            'ignore_sticky_posts' => 1,
            'post_type'           => 'post',
            'orderby'             => 'date',
            'order'               => 'ASC'
        ];
        $query = new \WP_Query($args);
        return $query->get_posts();
    }

    public static function loadMore(){
        $args = [
            'paged' => $_GET['page'],
            'post_type' => 'post',
            'category_name' => $_GET['archive'],
        ];
        $query = new \WP_Query($args);

        if( $query->have_posts() ) :
            // template part
            while($query->have_posts()){
                $query->the_post();
                // echo $_GET['archive'];
                echo view('templates.archive');
                // echo $page;
            }
            wp_reset_postdata();
            die();
        endif;
        die();
    }

    public static function homeNews(){
        $args = [
            'post_type'      => 'post',
            'posts_per_page' => 4,
            'orderby'        => 'date',
            'order'          => 'ASC'
        ];
        $query = new \WP_Query($args);

        if( $query->have_posts() ) :
            // template part
            while($query->have_posts()){
                $query->the_post();
                echo ('templates.archive');
            }
            wp_reset_postdata();
        endif;
    }
}