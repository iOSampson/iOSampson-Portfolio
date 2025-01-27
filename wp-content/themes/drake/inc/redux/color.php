<?php 
if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
// Output Customize CSS
function drake_customize_css() { 
    global $drake_options; if ($drake_options['main_color_drake'] == 9) {
?>
	<style>
		:root {
  --default-color: <?php echo esc_html($drake_options['colorcode']); ?>;
}

.theme-btn {
    background: var(--default-color);
    border: 2px solid var(--default-color);
}

.theme-btn:hover {
    color: var(--default-color);
}

.icon-menu:hover {
    border-color: var(--default-color);
}
.icon-menu:hover span {
    background: var(--default-color);
}

.dmenu li a.active,
.dmenu li a:hover,
.dmenu li .scroll-to.active,
.dmenu li .scroll-to:hover {
    color: var(--default-color);
}

.responsive-sidebar-menu .sidebar-menu-inner .sidebar-social ul li a:hover {
    color: var(--default-color);
}

.header-area nav .nav-menu li a:hover {
    color: var(--default-color);
}

.section-header h2 span {
    color: var(--default-color);
}

.left-sidebar .social-profile li a:hover {
    color: var(--default-color);
    border-color: var(--default-color);
}

.hero-section .hero-content h1 span {
    color: var(--default-color);
}

.hero-section .hero-content .facts h2 {
    color: var(--default-color);
}

.resume-area .resume-content .resume-timeline .item:hover::before {
    background: var(--default-color);
}
.resume-area .resume-content .resume-timeline .item:hover .date {
    color: var(--default-color);
}

.services-items .service-item:hover {
    border-color: var(--default-color);
}
.services-items .service-item:hover h3 a {
    color: var(--default-color);
}

.services-items .service-item i {
    color: var(--default-color);
}

.skills .skill:hover .skill-inner {
    border-color: var(--default-color);
}

.skills .skill .skill-inner h2 {
    color: var(--default-color);
}

.testimonial-item .testimonial-item-inner .author p span {
    color: var(--default-color);
}

.testimonial-area .testimonial-slider-wrap .testimonial-footer-nav .testimonial-nav button:hover {
    border-color: var(--default-color);
    color: var(--default-color);
}

.pricing-table-items .pricing-table:hover {
    border-color: var(--default-color);
}

.pricing-table-items .pricing-table .pricing-table-header h2 {
    color: var(--default-color);
}

.pricing-table-items .info a {
    color: var(--default-color);
}

.blog-item .meta li a {

    background: linear-gradient(to top right, var(--default-color) -200%,transparent 300%);
}

.blog-item .meta li a i {
    color: var(--default-color);
}

.blog-item .blog-item-content h2 a {
    background: linear-gradient(to top right,var(--default-color) -200%,transparent 300%);
}

.blog-item .blog-item-content .read-more-btn {
    border-bottom: 2px solid var(--default-color);
}
.blog-item .blog-item-content .read-more-btn:hover {
    color: var(--default-color);
}

.blog-sidebar .blog-sidebar-item h3::before {
    background: var(--default-color);
}

.blog-sidebar .blog-sidebar-item ul li a:hover {
    color: var(--default-color);
}

.search-form input:focus {
    border-color: var(--default-color);
}

.blog-item2 .blog-item-content h2 a:hover {
    color: var(--default-color);
}

.comments-area .comments .comments-list .comment-item .comment-body .comment-content h4 .date {
    color: var(--default-color);
}
.comments-area .comments .comments-list .comment-item .comment-body .comment-content h4 .date::before {
    background: var(--default-color);
}

.comments-area a {
    color: var(--default-color);
}

.comments-area a:hover {
    color: var(--default-color);
}

 	</style>

<?php }
}

  
add_action('wp_head', 'drake_customize_css');
}
?>