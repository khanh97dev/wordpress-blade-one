<?php
namespace Inc\Menu;

class MenuHome extends \Walker_Nav_Menu {
    public $megaMenuID;
    public $count;
    public $separator = '';
    public function __construct() {
        $this->megaMenuID = 0;
        $this->count = 0;
    }
    public function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"$args->sub_menu\" >\n";
        if ($this->megaMenuID != 0 && $depth == 0) {
            $output .= "<li class=\"megamenu-column\"><ul>\n";
        }
    }
    public function end_lvl(&$output, $depth = 0, $args = array()) {
        if ($this->megaMenuID != 0 && $depth == 0) {
            $output .= "</ul></li>";
            $output .= "<!-- end more than depth 2 -->";
        }
        $output .= "</ul>";
    }
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $hasMegaMenu = get_post_meta($item->ID, 'menu-item-mm-megamenu', true);
        $hasColumnDivider = get_post_meta($item->ID, 'menu-item-mm-column-divider', true);
        $hasDivider = get_post_meta($item->ID, 'menu-item-mm-divider', true);
        $hasFeaturedImage = get_post_meta($item->ID, 'menu-item-mm-featured-image', true);
        $hasDescription = get_post_meta($item->ID, 'menu-item-mm-description', true);
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $li_attributes = '';
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        if ($this->megaMenuID != 0 && $this->megaMenuID != intval($item->menu_item_parent) && $depth == 0) {
            $this->megaMenuID = 0;
        }
        // $column_divider = array_search('column-divider', $classes);
        if ($hasColumnDivider) {
            array_push($classes, 'column-divider');
            $output .= "</ul></li><li class=\"megamenu-column\"><ul>\n";
        }
        // managing divider: add divider class to an element to get a divider before it.
        // $divider_class_position = array_search('divider', $classes);
        if ($hasDivider) {
            $output .= "<li class=\"divider\"></li>\n";
            // unset($classes[$divider_class_position]);
        }
        if ($hasMegaMenu) {
            array_push($classes, 'megamenu');
            $this->megaMenuID = $item->ID;
        }
        $classes[] = ($args->has_children) ? $args->dropdown : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'menu-item-' . $item->ID;
        $classes[] = 'menu-depth-more-than-2';
        // Add Menu Item tag "li"
        // get args item class
        if ($depth && $args->has_children) {
            $classes[] = 'dropdown-submenu text-center';
        }elseif($depth == 0){
            $classes[] = $args->item_class;
        }
        if ($hasFeaturedImage) {
            array_push($classes, 'featured-image');
        }
        if ($hasDescription) {
            array_push($classes, 'description');
        }
        $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id, 'default') . '"' : '';
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
        $attributes = !empty($item->attr_title)
                        ? ' title="' . esc_attr($item->attr_title, 'default') . '"'
                        : '';
        $attributes .= !empty($item->target)
                        ? ' target="' . esc_attr($item->target, 'default') . '"'
                        : '';
        $attributes .= !empty($item->xfn)
                        ? ' rel="' . esc_attr($item->xfn, 'default') . '"'
                        : '';
        $attributes .= !empty($item->url)
                        ? ' href="' . esc_attr($item->url, 'default') . '"'
                        : '';
        // add drop tag a link
        $attributes .= ($args->has_children)
                        ? ' class="badge-primary badge text-white"'
                        : '';
        $item_output = $args->before;
        if($depth === 0)
            $item_output .= '<a' . $attributes . '>';
        else
            $item_output .= '</span><a' . $attributes . '>'.$this->separator.' ';
        // Check if item has featured image
        // Kiểm tra hình đặc trưng của một phần tử
        // $has_featured_image = array_search('featured-image', $classes);
        if ($hasFeaturedImage && $this->megaMenuID != 0) {
            $postID = url_to_postid($item->url);
            $item_output .= "<img alt=\"" . esc_attr($item->attr_title) . "\" src=\"" . get_the_post_thumbnail_url($postID) . "\"/>";
        }
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
           // add support for menu item title
        if (strlen($item->attr_title) > 2) {
            $item_output .= '<h3 class="tit">' . $item->attr_title . '</h3>';
        }
        // add support for menu item descriptions
        if (strlen($item->description) > 2) {
            $item_output .= '</a> <span class="sub"> <span class="new "></span>' . $item->description . '</span>';
        }
        $item_output .= (($depth == 0 || 1) && $args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output) {
        if (!$element) {
            return;
        }
        $id_field = $this->db_fields['id'];
        //display this element
        if (is_array($args[0])) {
            $args[0]['has_children'] = !empty($children_elements[$element->$id_field]);
        } elseif (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }
        $cb_args = array_merge(array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'start_el'), $cb_args);
        $id = $element->$id_field;
        // descend only when the depth is right and there are childrens for this element
        if (($max_depth == 0 || $max_depth > $depth + 1) && isset($children_elements[$id])) {
            foreach ($children_elements[$id] as $child) {
                if (!isset($newlevel)) {
                    $newlevel = true;
                    //start the child delimiter
                    $cb_args = array_merge(array(&$output, $depth), $args);
                    call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                }
                $this->display_element($child, $children_elements, $max_depth, $depth + 1, $args, $output);
            }
            unset($children_elements[$id]);
        }
        if (isset($newlevel) && $newlevel) {
            //end the child delimiter
            $cb_args = array_merge(array(&$output, $depth), $args);
            call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
        }
        //end this element
        $cb_args = array_merge(array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'end_el'), $cb_args);
    }
}