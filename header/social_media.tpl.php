<div class="row">
  <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0">
    <ul class="list-inline social_media">
      <?php if ( !empty($social_media['youtube']) ) : ?>
      <li>
        <a href="https://www.youtube.com/channel/<?php echo $social_media['youtube'] ?>" title="YouTube" target="_blank">
          <i class="fa fa-youtube fa-lg" aria-hidden="true"></i>
        </a>
      </li>
      <?php endif; ?>
      
      <?php if ( !empty($social_media['facebook']) ) : ?>
      <li>
        <a href="https://www.facebook.com/<?php echo $social_media['facebook'] ?>" title="Facebook" target="_blank">
          <i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i>
        </a>
      </li>
      <?php endif; ?>
      
      <?php if ( !empty($social_media['google-plus']) ) : ?>
      <li>
        <a href="https://plus.google.com/<?php echo $social_media['google-plus']; ?>" title="Google plus" target="_blank">
          <i class="fa fa-google-plus-official fa-lg" aria-hidden="true"></i>
        </a>
      </li>
      <?php endif; ?>
      
      <?php if ( !empty($social_media['instagram']) ) : ?>
      <li>
        <a href="https://www.instagram.com/<?php echo $social_media['instagram']; ?>" title="Instagram" target="_blank">
          <i class="fa fa-instagram fa-lg" aria-hidden="true"></i>
        </a>
      </li>
      <?php endif; ?>
      
      <?php if ( !empty($social_media['twitter']) ) : ?>
      <li>
        <a href="https://twitter.com/<?php echo $social_media['twitter']; ?>" title="Twitter" target="_blank">
          <i class="fa fa-twitter fa-lg" aria-hidden="true"></i>
        </a>
      </li>
      <?php endif; ?>
      
      <?php if ( !empty($social_media['flickr']) ) : ?>
      <li>
        <a href="https://www.flickr.com/photos/<?php echo $social_media['flickr']; ?>" title="Flickr" target="_blank">
          <i class="fa fa-flickr fa-lg" aria-hidden="true"></i>
        </a>
      </li>
      <?php endif; ?>
      
      <?php if ( !empty($social_media['soundcloud']) ) : ?>
      <li>
        <a href="https://soundcloud.com/<?php echo $social_media['soundcloud']; ?>" title="SoundCloud" target="_blank">
          <i class="fa fa-soundcloud fa-lg" aria-hidden="true"></i>
        </a>
      </li>
      <?php endif; ?>
      
      <?php if ( !empty($social_media['slideshare']) ) : ?>
      <li>
        <a href="https://www.slideshare.net/<?php echo $social_media['slideshare']; ?>" title="Slideshare" target="_blank">
          <i class="fa fa-slideshare fa-lg" aria-hidden="true"></i>
        </a>
      </li>
      <?php endif; ?>
      
      <?php if ( !empty($social_media['rss']) && $social_media['rss'] === '1' ) : ?>
      <li>
        <a href="<?php echo url(NULL, array('absolute' => TRUE)); ?>rss.xml" title="Rss" target="_blank">
          <i class="fa fa-rss fa-lg" aria-hidden="true"></i>
        </a>
      </li>
      <?php endif; ?>
      
    </ul>
  </div>
</div>