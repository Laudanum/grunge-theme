<?php
// $Id: node.tpl.php,v 1.1 2010/09/11 20:29:12 atelier Exp $
?>

<div id="node-<?php print $node->nid; ?>" class="node <?php print implode(' ', $classes_array); ?>">
  <div class="inner">
    <?php // removed as it prints a zero // print render($picture); ?>

    <?php if ($page == 0): ?>
    <h2 class="title"><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
    <?php endif; ?>

    <?php if ($submitted): ?>
    <div class="meta">
      <span class="submitted"><?php print $submitted ?></span>
    </div>
    <?php endif; ?>

    <?php if ($node_top && !$teaser): ?>
    <div id="node-top" class="node-top row nested">
      <div id="node-top-inner" class="node-top-inner inner">
        <?php print $node_top; ?>
      </div><!-- /node-top-inner -->
    </div><!-- /node-top -->
    <?php endif; ?>

    <div class="content clearfix">
      <?php 
        hide($content['comments']);
        hide($content['links']);
        print render($content);
      ?>
    </div>

      <?php if (!empty($content['links']['terms'])): ?>
        <div class="terms terms-inline">
          <?php print render($content['links']['terms']); ?>
        </div>
      <?php endif; ?>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

  </div><!-- /inner -->

  <?php if ($node_bottom && !$teaser): ?>
  <div id="node-bottom" class="node-bottom row nested">
    <div id="node-bottom-inner" class="node-bottom-inner inner">
      <?php print $node_bottom; ?>
    </div><!-- /node-bottom-inner -->
  </div><!-- /node-bottom -->
  <?php endif; ?>
</div><!-- /node-<?php print $node->nid; ?> -->
