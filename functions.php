<?php
/**
 * Infinity Design LP Theme Functions
 * 
 * @package InfinityDesignLP
 */

// テーマのセットアップ
function infinity_lp_setup() {
    // タイトルタグのサポート
    add_theme_support('title-tag');
    
    // アイキャッチ画像のサポート
    add_theme_support('post-thumbnails');
    
    // HTML5のサポート
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'infinity_lp_setup');

// スタイルとスクリプトの読み込み
function infinity_lp_enqueue_scripts() {
    // メインスタイル
    wp_enqueue_style('infinity-lp-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // カスタムスタイル
    wp_enqueue_style('infinity-lp-custom', get_template_directory_uri() . '/css/style.css', array(), '1.0.0');
    
    // メインスクリプト
    wp_enqueue_script('infinity-lp-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'infinity_lp_enqueue_scripts');

/**
 * 契約前の事前ヒアリングフォームの読み込み
 */
require_once get_template_directory() . '/inc/hearing-form.php';
