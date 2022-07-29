<?php
  $video_index = 100;
  $home_id = get_option('page_on_front');
  $video_url = get_field('popup_video_video', $home_id);

  popup_video($video_index, $video_url);
?>