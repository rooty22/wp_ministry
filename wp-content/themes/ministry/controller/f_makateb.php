<?php
function filter_posts_by_category() {
    $category_id = $_POST['catID'];

    $args = array(
        'post_type' => 'makateb',
        'posts_per_page' => -1, 
        'orderby' => 'date',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'makateb',
                'field'    => 'term_id',
                'terms'    => $category_id,
            ),
        ),
    );
    
    $query = new WP_Query($args);
    $n = 1;
    if($query->have_posts()) : 
      while($query->have_posts()): $query->the_post();
        ?>
            <td>
                <!-- <input type="checkbox" class="row-checkbox" /> -->
            </td>
            <td class="gray-bg">
                <?= $n;?>
            </td>
            <td>
                <textarea class="table-input" placeholder="نص تعريفي">
                    <?php the_title();?>
                </textarea>
            </td>
            <td>
                <!-- <input type="date" /> -->
                <?php the_field('التاريخ_من');?>
            </td>
            <td>
                <!-- <input type="date" /> -->
                <?php the_field('التاريخ_الى');?>
            </td>
            <td>
                <textarea class="table-input" placeholder="نص تعريفي">
                    <?php the_field('الفئة_المستهدفة');?>
                </textarea>
            </td>
            <td>
                <input type="number" class="table-number" value="<?php the_field('العدد');?>" />
            </td>
            <td>
                <input type="number" class="table-number" value="<?php the_field('مؤشر_الأداء');?>" />

            </td>
            <td>
                <input type="number" class="table-number" value="<?php the_field('خطط_الأساس');?>" />

            </td>
            <td>
                <input type="number" class="table-number" value="<?php the_field('المستهدف');?>" />

            </td>
            <td>
                <input type="number" class="table-number" value="<?php the_field('تحقق_المؤشر');?>" />

            </td>
            <td>
                <?php the_field('حالة_التنفيذ');?>
                <!-- <div class="radio-container">
                    <input type="radio" id="notStarted" name="stateStatic1" />
                    <label for="notStarted">لم يبدأ</label>
                </div>
                <div class="radio-container">
                    <input type="radio" id="continue" name="stateStatic1" />
                    <label for="continue">مستمر</label>
                </div>
                <div class="radio-container">
                    <input type="radio" id="finished" name="stateStatic1" />
                    <label for="finished">انتهي</label>
                </div>
                <div class="radio-container">
                    <input type="radio" id="stopped" name="stateStatic1" />
                    <label for="stopped">متوقف</label>
                </div> -->
            </td>
            <td>
                <textarea class="table-input" placeholder="نص تعريفي">
                    <?php the_field('الصعوبات_ان_وجد');?>
                </textarea>
            </td>
            <td>
                <textarea class="table-input" placeholder="نص تعريفي">
                    <?php the_field('المقترحات_والحلول');?>
                </textarea>
            </td>
            <?php $shawa = get_field('الشواهد');?>
            <td>
                <!-- <button type="button" class="base-btn" data-toggle="modal" data-target="#fileModal">رابط</button> -->
                <a href="<?= $shawa['رابط_الزر'];?>" class="btn base-btn">
                    <?= $shawa['اسم_الزر'];?>
                </a>
            </td>
        <?php
        $n++;
      endwhile;
    else:
        $the_query = new WP_Query(array(
            'post_type' => 'makateb', 
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'ASC',
        ));
        $n = 1;
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) :
                $the_query->the_post();
        ?>
<td>
                <!-- <input type="checkbox" class="row-checkbox" /> -->
            </td>
            <td class="gray-bg">
                <?= $n;?>
            </td>
            <td>
                <textarea class="table-input" placeholder="نص تعريفي">
                    <?php the_title();?>
                </textarea>
            </td>
            <td>
                <!-- <input type="date" /> -->
                <?php the_field('التاريخ_من');?>
            </td>
            <td>
                <!-- <input type="date" /> -->
                <?php the_field('التاريخ_الى');?>
            </td>
            <td>
                <textarea class="table-input" placeholder="نص تعريفي">
                    <?php the_field('الفئة_المستهدفة');?>
                </textarea>
            </td>
            <td>
                <input type="number" class="table-number" value="<?php the_field('العدد');?>" />
            </td>
            <td>
                <input type="number" class="table-number" value="<?php the_field('مؤشر_الأداء');?>" />

            </td>
            <td>
                <input type="number" class="table-number" value="<?php the_field('خطط_الأساس');?>" />

            </td>
            <td>
                <input type="number" class="table-number" value="<?php the_field('المستهدف');?>" />

            </td>
            <td>
                <input type="number" class="table-number" value="<?php the_field('تحقق_المؤشر');?>" />

            </td>
            <td>
                <?php the_field('حالة_التنفيذ');?>
                <!-- <div class="radio-container">
                    <input type="radio" id="notStarted" name="stateStatic1" />
                    <label for="notStarted">لم يبدأ</label>
                </div>
                <div class="radio-container">
                    <input type="radio" id="continue" name="stateStatic1" />
                    <label for="continue">مستمر</label>
                </div>
                <div class="radio-container">
                    <input type="radio" id="finished" name="stateStatic1" />
                    <label for="finished">انتهي</label>
                </div>
                <div class="radio-container">
                    <input type="radio" id="stopped" name="stateStatic1" />
                    <label for="stopped">متوقف</label>
                </div> -->
            </td>
            <td>
                <textarea class="table-input" placeholder="نص تعريفي">
                    <?php the_field('الصعوبات_ان_وجد');?>
                </textarea>
            </td>
            <td>
                <textarea class="table-input" placeholder="نص تعريفي">
                    <?php the_field('المقترحات_والحلول');?>
                </textarea>
            </td>
            <?php $shawa = get_field('الشواهد');?>
            <td>
                <!-- <button type="button" class="base-btn" data-toggle="modal" data-target="#fileModal">رابط</button> -->
                <a href="<?= $shawa['رابط_الزر'];?>" class="btn base-btn">
                    <?= $shawa['اسم_الزر'];?>
                </a>
            </td>

        <?php endwhile; else : endif ; wp_reset_query();

    endif;
    
    wp_reset_postdata();
    die(); 
}

add_action('wp_ajax_filterPostsByCategory', 'filter_posts_by_category');
add_action('wp_ajax_nopriv_filterPostsByCategory', 'filter_posts_by_category');
