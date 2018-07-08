<?php
/**
 * The template for displaying the header.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php generate_body_schema();?> <?php body_class(); ?>>
  <?php
  /**
   * generate_before_header hook.
   *
   * @since 0.1
   *
   * @hooked generate_do_skip_to_content_link - 2
   * @hooked generate_top_bar - 5
   * @hooked generate_add_navigation_before_header - 5
   */
  do_action( 'generate_before_header' );

  /**
   * generate_header hook.
   *
   * @since 1.3.42
   *
   * @hooked generate_construct_header - 10
   */
  do_action( 'generate_header' );

  /**
   * generate_after_header hook.
   *
   * @since 0.1
   *
   * @hooked generate_featured_page_header - 10
   */
  do_action( 'generate_after_header' );
  ?>


  <?php if ( is_active_sidebar( 'content-top-1' ) ) : ?>
      <div id="content-top-1" class="hfeed site grid-container container grid-parent">
          <?php dynamic_sidebar( 'content-top-1' ); ?>
      </div> <!-- content-top-1 -->
  <?php endif; ?>
 
  <?php if ( is_active_sidebar( 'content-top-2' ) ) : ?>
      <div id="content-top-2" class="hfeed site grid-container container grid-parent">
          <?php dynamic_sidebar( 'content-top-2' ); ?>
      </div> <!-- content-top-2 -->
  <?php endif; ?>

  <?php if ( is_active_sidebar( 'content-top-3' ) ) : ?>
      <div id="content-top-3" class="hfeed site grid-container container grid-parent">
          <?php dynamic_sidebar( 'content-top-3' ); ?>
      </div> <!-- content-top-3 -->
  <?php endif; ?>

  <?php if ( is_active_sidebar( 'content-top-4' ) ) : ?>
      <div id="content-top-4" class="hfeed site grid-container container grid-parent">
          <?php dynamic_sidebar( 'content-top-4' ); ?>
      </div> <!-- content-top-4 -->
  <?php endif; ?>

  <div id="page" class="hfeed site grid-container container grid-parent">
    <div id="content" class="site-content">
      <?php
      /**
       * generate_inside_container hook.
       *
       * @since 0.1
       */
      do_action( 'generate_inside_container' );
