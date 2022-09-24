<?php
/*
*
* Home intro section for portfolix section
*
*
*/



function agencyx_hbanner_section_output()
{
  $agencyx_hbanner_show = get_theme_mod('agencyx_hbanner_show', 1);
  if (empty($agencyx_hbanner_show)) {
    return;
  }
  $agencyx_dfimgh = get_template_directory_uri() . '/assets/img/hero.jpg';
  $agencyx_hbanner_img = get_theme_mod('agencyx_hbanner_img', $agencyx_dfimgh);
  $agencyx_hbanner_subtitle = get_theme_mod('agencyx_hbanner_subtitle', __('Welcome To Our Agency', 'agencyx'));
  $agencyx_hbanner_title = get_theme_mod('agencyx_hbanner_title', __('Introduce Our', 'agencyx'));
  $agencyx_color_title = get_theme_mod('agencyx_color_title', __('Creative Agency.', 'agencyx'));
  $agencyx_hbanner_desc = get_theme_mod('agencyx_hbanner_desc');
  $agencyx_btn_text_one = get_theme_mod('agencyx_btn_text_one', __('Our Services', 'agencyx'));
  $agencyx_btn_url_one = get_theme_mod('agencyx_btn_url_one', '#');

?>
  <!-- home -->
  <section class="aghome" id="home">
    <div id="ax-praticals"></div>
    <div class="ax-home-single-slide-all-content">
      <?php if ($agencyx_hbanner_img) : ?>
        <div class="ax-home-bg">
          <img src="<?php echo esc_url($agencyx_hbanner_img); ?>" alt="<?php esc_attr($agencyx_hbanner_title); ?>">
        </div>
      <?php endif; ?>
      <div class="ax-home-details text-center">
        <?php if ($agencyx_hbanner_subtitle) : ?>
          <div class="ax-home-subtitle">
            <p><?php echo esc_html($agencyx_hbanner_subtitle); ?></p>
          </div>
        <?php endif; ?>
        <?php if ($agencyx_hbanner_title || $agencyx_color_title) : ?>
          <div class="ax-home-title">
            <?php if ($agencyx_hbanner_title) : ?>
              <h1><?php echo esc_html($agencyx_hbanner_title); ?>
              </h1>
            <?php endif; ?>
            <?php if ($agencyx_color_title) : ?>
              <h1 class="ax-section-title"><?php echo esc_html($agencyx_color_title); ?>
              <?php endif; ?>
          </div>
        <?php endif; ?>
        <?php if ($agencyx_hbanner_desc) : ?>
          <div class="ax-home-dres">
            <p><?php echo wp_kses_post($agencyx_hbanner_desc); ?></p>
          </div>
        <?php endif; ?>
        <?php if ($agencyx_btn_url_one) : ?>
          <div class="ax-home-btn">
            <a href="<?php echo esc_url($agencyx_btn_url_one); ?>" class="ax-home-first-btn"><?php echo esc_html($agencyx_btn_text_one); ?></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

<?php
}
add_action('agencyx_hbanner', 'agencyx_hbanner_section_output');
