<?php
/**
 * Template Name: Show M_One
 */

get_header();
?>

        <div class="w-100">
            <div class="page-header">
                <h5>متابعة مهام قسم الإشراف التربوي في العام 1445</h4>
            </div>
            <div class="table-content mx-3" style="padding-bottom: 15%;">
                <div class="d-flex justify-content-center">
                    <form>
                        <select class="select-content border border-gray" id="outoShow">
                            <option value="all">المكتب</option>

                            <?php

                                $categories = get_terms( array(
                                    'parent' => 0,
                                    'taxonomy' => 'maktab',
                                    'hide_empty' => false,
                                ) );

                                if (! empty( $categories ) && ! is_wp_error( $categories )) :
                                    foreach ($categories as $category) :
                                        $category_id = $category->term_id;
                                        $category_name = $category->name;
                            ?>

                            <option value="<?= $category_id ?>">
                                <?= $category_name;?>
                            </option>
                            <?php endforeach;?>
                            <?php else: 
                                echo "No Data!";
                            ?>

                            <?php endif;?>
                            
                        </select>
                        <button type="button" class="base-btn mr-5 search-btn" id="outoShow">
                            بحث
                        </button>
                    </form>
                    <div id="res"></div>
                </div>
                <hr />
                <!-- <div class="text-right">
                    <p class="text-bold m-0 mission1_title">المهمة الأولى</p>
                    <p class="m-0 mission1_subtitle">عدد البرامج الكلية : 66</p>
                </div> -->
                <div class="table-container">
                    <table class="w-100">
                        <tr class="table-header h-auto">
                            <th>اسم البرامج</th>
                            <th>المكتب</th>
                            <th>الاجراءات</th>
                        </tr>

                        <?php 
                            $the_query = new WP_Query(array(
                                'post_type' => 'makateb', 
                                'posts_per_page' => -1,
                                'orderby' => 'date',
                                'order' => 'ASC',
                            ));
                            if ($the_query->have_posts()) :
                                while ($the_query->have_posts()) :
                                    $the_query->the_post();
                                    
                                    // $categories = get_terms(array('taxonomy' => 'maktab', 'hide_empty' => false));
                                    $post_categories = wp_get_post_terms(get_the_ID(), 'maktab');
                                    $selected_category = !empty($post_categories) ? $post_categories[0]->name : '';
                        
                        ?>
                        <tr id="makeShow">
                            <td>
                                <p>
                                    <?php the_title();?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?= $selected_category;?>
                                </p>
                            </td>
                            <td>
                                <!-- <button class="btn btn-primary edit ml-2">تعديل</button> -->
                                <a href="<?php echo get_permalink(get_page_by_path('edit-post')) . '?post_id=' . get_the_ID(); ?>" class="btn btn-primary edit">
                                    تعديل
                                </a>

                                <button class="btn btn-danger delete ml-2">حذف</button>
                                <!-- <button class="btn btn-success save" style="display: none;">Save</button> -->
                            </td>
                        </tr>
                        <?php 
                            endwhile;
                            else :
                                echo 'No posts found';
                            endif;
                            wp_reset_postdata();
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


    <?//= do_shortcode('[custom_post_table]');?>

<?php get_footer();?>