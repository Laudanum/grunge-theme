
  <div id="page" class="page">
    <div id="page-inner" class="page-inner">
      <div id="skip-link">
        <a href="#main-content-area"><?php print t('Skip to Main Content Area'); ?></a>
      </div>
      
      <div class="topline"></div>

      <div id="branding-wrapper" class="branding-wrapper">
      	<div id="branding-inner" class="branding-inner">

            <?php if ($logo): ?>
              <div id="logo">
                <a href="<?php print check_url($front_page); ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
              </div>
            <?php endif; ?>
            
            <?php if ($page['header_top']): ?>
							<?php print theme('grid_block', array('content'=>render($page['header_top']), 'id'=>'header-top')); ?>
          	<?php endif; ?>
            
        </div>
      </div>
      
      <div class="topcuts"></div>
      
      <!-- header-group row: width = grid_width -->
      <div id="header-group-wrapper" class="header-group-wrapper full-width">
        <?php print render($page['main_menu']); ?>
        <div id="header-group" class="header-group row <?php print $grid_width; ?>">
          <div id="header-group-inner" class="header-group-inner inner clearfix">
            <?php print render($page['header']); ?>
          </div><!-- /header-group-inner -->
        </div><!-- /header-group -->
      </div><!-- /header-group-wrapper -->
      
      <!-- preface-top row: width = grid_width -->
      <?php print render($page['preface-top']); ?>

			<div id="breadcrumbs-wrapper">
      	<?php print theme('grid_block', array('content'=>$breadcrumb, 'id'=>'breadcrumbs')); ?>
      </div>

      <!-- main row: width = grid_width -->
      <div id="main-wrapper" class="main-wrapper full-width clearfix <?php print theme_get_setting('sidebar_layout'); ?>-<?php print $sidebar_first_width; ?>-<?php print $sidebar_second_width; ?>">

        <div id="main" class="main region <?php print $grid_width; ?>">
          <div id="main-inner" class="main-inner inner clearfix">
            <?php print render($page['sidebar_first']); ?>

            <!-- main group: width = grid_width - sidebar_first_width -->
            <div id="main-group" class="main-group row nested <?php print $main_group_width; ?>">
              <div id="main-group-inner" class="main-group-inner inner">
                <?php print render($page['preface-bottom']); ?>

                <div id="main-content" class="main-content row nested">
                  <div id="main-content-inner" class="main-content-inner inner">
                    <!-- content group: width = grid_width - (sidebar_first_width + sidebar_last_width) -->
                    <div id="content-group" class="content-group row nested <?php print $content_group_width; ?>">
                      <div id="content-group-inner" class="content-group-inner inner">

                        <?php if ( $page['help'] || $messages): ?>
                        <div id="content_top" class="content-top row nested">
                          <div id="content-top-inner" class="content-top-inner inner">
                            <?php print theme('grid_block', array('content'=>render($page['help']), 'id'=>'content-help')); ?>
                            <?php print theme('grid_block', array('content'=>$messages, 'id'=>'content-messages')); ?>
                          </div><!-- /content-top-inner -->
                        </div><!-- /content-top -->
                        <?php endif; ?>

                        <div id="content-region" class="content-region row nested">
                          <div id="content-region-inner" class="content-region-inner inner">
                            <a name="main-content-area" id="main-content-area"></a>

                            <?php if ($tabs = render($tabs)): ?>
                            <?php print theme('grid_block', array('content'=>$tabs, 'id'=>'content-tabs')); ?>                              
                            <?php endif; ?>
                            <div id="content-inner" class="content-inner block">
                              <div id="content-inner-inner" class="content-inner-inner inner">
                                <?php if ($title): ?>
                                <h1 class="title gutter"><?php print $title; ?></h1>
                                <?php endif; ?>
                                <div id="content-content" class="content-content">
                                  <?php print render($title_suffix); ?>
                                  <?php if ($action_links): ?>
                                    <ul class="action-links"><?php print render($action_links); ?></ul>
                                  <?php endif; ?>
                                  <?php print render($page['content']); ?>
                                </div><!-- /content-content -->
                              </div><!-- /content-inner-inner -->
                            </div><!-- /content-inner -->
                          </div><!-- /content-region-inner -->
                        </div><!-- /content-region -->

                        <?php print render($page['content_bottom']); ?>
                      </div><!-- /content-group-inner -->
                    </div><!-- /content-group -->

                    <?php print render($page['sidebar_second']); ?>
                  </div><!-- /main-content-inner -->
                </div><!-- /main-content -->

                <?php print render($page['postscript-top']); ?>
              </div><!-- /main-group-inner -->
            </div><!-- /main-group -->
          </div><!-- /main-inner -->
        </div><!-- /main -->
      </div><!-- /main-wrapper -->

      <!-- postscript-bottom row: width = grid_width -->
      <div class="bottomtopper"></div>
      
      <div id="postscript-bottom-wrapper" class="postscript-bottom-wrapper full-width">
				<div id="postscript-bottom" class="postscript-bottom row <?php print $grid_width; ?>">
					<div id="postscript-bottom-inner" class="postscript-bottom-inner inner clearfix">
          	<?php print render($page['postscript_bottom']); ?>
          </div>
				</div>
			</div>

      <!-- footer row: width = grid_width -->
      <?php print render($page['footer']); ?>

    </div><!-- /page-inner -->
  </div><!-- /page -->
