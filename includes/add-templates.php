<?php
if ( !defined ( 'ABSPATH' ) ) exit;

if(get_option('add_lbk_inline_post')) require_once LBK_ELEMENTS_PATH .'/includes/templates/lbk_inline_posts.php';
if(get_option('add_lbk_progess_line')) require_once LBK_ELEMENTS_PATH .'/includes/templates/lbk_progess_line.php';
if(get_option('add_lbk_slider_with_sub_imgs')) require_once LBK_ELEMENTS_PATH .'/includes/templates/lbk_slider_with_sub_imgs.php';
if(get_option('add_lbk_submenu_in_title')) require_once LBK_ELEMENTS_PATH .'/includes/templates/submenu_in_title.php';