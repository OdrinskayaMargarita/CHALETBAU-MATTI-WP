<?php
$top_members = get_field('top_members');
$members = get_field('members');
?>
<section class="team-grid">
    <div class="team-grid__cont cont">
        <?php get_members($top_members); ?>
        <?php get_members($members); ?>
    </div>
</section>