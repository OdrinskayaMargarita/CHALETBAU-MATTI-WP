<?php if (have_rows('jobs')): ?>
    <?php while (have_rows('jobs')): the_row();
        $caption = get_sub_field('caption');
        $select_jobs = get_sub_field('select_jobs');
        $count_jobs = count($select_jobs);
        ?>
        <section class="jobs-block" id="jobs-list">
            <div class="jobs__cont cont">
                <?php if (!empty($caption)) : ?>
                    <h2 class="jobs__main-title h2">
                        <span><?php echo $caption; ?></span>
                        <span class="jobs__counter"><?php echo $count_jobs; ?></span>
                    </h2>
                <?php endif; ?>
                <?php if (!empty($select_jobs)) : ?>
                    <div class="jobs__amount">
                        <?php foreach ($select_jobs as $id) :
                            $title = get_the_title($id);
                            $salary = get_field('salary', $id);
                            $job_type = get_field('job_type', $id);
                            $url = get_field('url', $id);
                            ?>
                            <?php if (!empty($url)) : ?>
                            <a href="<?php echo $url; ?>" class="jobs__item" barba-prevent target="_blank">
                                <span class="jobs__main-info">
                                    <span class="jobs__salary"><?php echo !empty($salary) ? $salary : null; ?></span>
                                    <span class="jobs__title"><?php echo $title; ?></span>
                                </span>
                                <span class="jobs__type"><?php echo !empty($job_type) ? $job_type : null; ?></span>
                            </a>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>