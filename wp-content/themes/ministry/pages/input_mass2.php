<?php
/**
 * Template Name: Input Mass2
 */

get_header();
?>

<div class="w-100">
            <form id="wizard_form_mess2"> 
                <div class="page-header">
                    <h5>متابعة مهام قسم الإشراف التربوي في العام 1445</h4>
                </div>
                <div class="content">
                    <div class="allSteps">
                        <div class="wizard">
                            <div id="step1" class="step active-step"
                                onclick="showContent(1); toggleContentContainer(1);">1</div>
                            <hr class="steps-hr" />
                            <div id="step2" class="step" onclick="showContent(2); toggleContentContainer(2);">2</div>
                            <hr class="steps-hr" />
                            <div id="step3" class="step" onclick="showContent(3); toggleContentContainer(3);">3</div>
                            <hr class="steps-hr" />
                            <div id="step4" class="step" onclick="showContent(4); toggleContentContainer(4);">4</div>
                        </div>
                        <div>
                            <select class="select-content" id="massForm2">
                                <option class="d-none">
                                    المكاتب
                                </option>
                                <option disabled>المكاتب:</option>

                                <?php

                                    $categories = get_terms( array(
                                        'parent' => 0,
                                        'taxonomy' => 'maktab',
                                        'exclude' => 9,
                                        'hide_empty' => false,
                                    ) );

                                    if (! empty( $categories ) && ! is_wp_error( $categories )) :
                                        foreach ($categories as $category) :
                                            $category_id = $category->term_id;
                                            $category_name = $category->name;
                                ?>
                                
                                <option value="<?= $category_id ?>"><?= $category_name;?></option>
                                <?php endforeach;?>
                                <?php else: 
                                    echo "No Data!";
                                ?>

                                <?php endif;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mission2-page">
                    <div class="table-content">
                        <p class="green-header">
                            تقييم الأداء الإشرافي لمكاتب التعليم العام وفق مؤشرات أداء معتمدة تقيس التزامها بمنهجيات
                            ونماذج
                            وأدوات الإشراف التربوي والضوابط والمعايير المعتمدة له الأنماط التعليم المختلفة ( بما فيها
                            التعليم الإلكتروني والتعليم عن بعد المتزامن وغير المتزامن والمدمج)، وتوظيف نتائج التقويم في
                            تطوير هذه المنهجيات والنماذج والأدوات بالتنسيق مع الإدارة العامة للإشراف التربوي والقطاعات
                            ذات
                            العلاقة، وتقديم الرأي
                            <span class="red-text"> والمشورة التخصصية</span>
                            للمكاتب حيالها، وذلك لتحسين أدائها الإشرافي عبر ورش تعريفية وتطويرية متخصصة بهذا الشأن
                        </p>

                        <div id="content1" class="content-details content-tab">
                            <div class="table-content-2">
                                <p class="green-header text-right w-100 mt-4">أولاً : بيانات أساسية أولية عن التقويم
                                    الداخلي
                                    ( الذاتي ):</p>
                                <div class="table-container">
                                    <table style="overflow-x: auto;">
                                        <tr class="table-header" style="height: 30px;">
                                            <th rowspan="2">
                                                إدارة التعليم
                                            </th>
                                            <th colspan="2">
                                                القطاع

                                            </th>
                                            <th rowspan="2">
                                                مكتب التعليم/
                                                أو فريق التحسين
                                                والتطوير
                                                ( في حالة الفريق
                                                تكتب أسماء
                                                أعضاء الفريق )
                                            </th>
                                            <th rowspan="2">
                                                عدد
                                                المدارس التابعة للمكتب/ أو للفريق
                                            </th>
                                            <th colspan="2" rowspan="2">
                                                عدد
                                                مدارس التهيئة
                                            </th>
                                            <th colspan="2" rowspan="2">
                                                عدد
                                                مدارس النطالق
                                            </th>
                                            <th colspan="2" rowspan="2">
                                                عدد
                                                مدارس التقدم
                                            </th>
                                            <th colspan="2" rowspan="2">
                                                عدد
                                                مدارس التميز
                                            </th>

                                        </tr>
                                        <tr class="table-header" style="height: 30px;">
                                            <th>بنين</th>
                                            <th>بنات</th>
                                        </tr>
                                        <tr>
                                            <td rowspan="2">
                                                <textarea class="table-input" name="post_title" placeholder="نص تعريفي"></textarea>
                                            </td>
                                            <td rowspan="2" colspan="2">
                                                <div>
                                                    <input type="radio" id="sector" checked />
                                                </div>
                                            </td>
                                            <td rowspan="2">
                                                <textarea class="table-input" name="post_maktab" placeholder="نص تعريفي"></textarea>
                                            </td>
                                            <td rowspan="2">
                                                <textarea class="table-input" name="post_addadM" placeholder="نص تعريفي"></textarea>
                                            </td>
                                            <td>
                                                العام الماضي
                                            </td>
                                            <td>
                                                العام الحالي
                                            </td>
                                            <td>
                                                العام الماضي
                                            </td>
                                            <td>
                                                العام الحالي
                                            </td>
                                            <td>
                                                العام الماضي
                                            </td>
                                            <td>
                                                العام الحالي
                                            </td>
                                            <td>
                                                العام الماضي
                                            </td>
                                            <td>
                                                العام الحالي
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="number" name="post_adud" id="post_adud" class="table-number" placeholder="2" />
                                            </td>
                                            <td>
                                                <input type="number" name="post_adud2" id="post_adud2" class="table-number" placeholder="2" />
                                            </td>
                                            <td>
                                                <input type="number" name="post_adud3" id="post_adud3" class="table-number" placeholder="2" />
                                            </td>
                                            <td>
                                                <input type="number" name="post_adud4" id="post_adud4" class="table-number" placeholder="2" />
                                            </td>
                                            <td>
                                                <input type="number" name="post_adud5" id="post_adud5" class="table-number" placeholder="2" />
                                            </td>
                                            <td>
                                                <input type="number" name="post_adud6" id="post_adud6" class="table-number" placeholder="2" />
                                            </td>
                                            <td>
                                                <input type="number" name="post_adud7" id="post_adud7" class="table-number" placeholder="2" />
                                            </td>
                                            <td>
                                                <input type="number" name="post_adud8" id="post_adud8" class="table-number" placeholder="2" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="gray-bg" style="padding: 20px">
                                                نسبة التحسن
                                                <span class="green-text" id="green-text"></span>
                                            </td>
                                            <td colspan="2" id="showe1">
                                                
                                            </td>
                                            <td colspan="2" id="showe2">
                                                
                                            </td>
                                            <td colspan="2" id="showe3">
                                                
                                            </td>
                                            <td colspan="2" id="showe4">
                                                
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <div style="display: block;">
                                <p class="green-header text-right w-100 mt-4">ثانياً : نسبة التوافق بين التقويم الداخلي
                                    ( الذاتي ) والخارجي للمدارس التابعة للمكتب/أو لفريق التحسين والتطوير التي تم تقويمها
                                    خارجياً .</p>
                                <div class="table-container">
                                    <table style="overflow-x: auto;">
                                        <tr class="table-header" style="height: 30px;">
                                            <th colspan="2">
                                                عدد المدارس التي تم تقويمها داخلياً وخارجياً
                                            </th>
                                            <th colspan="2" class="w-50">
                                                نسبة غير المتواقف:
                                                ( عدد المدارس غير المتوافقة في التقويم الداخلي والخارجي / العدد الكلي
                                                للمدارس التي تم تقويمها داخلياً وخارجياً )* 100

                                            </th>
                                        </tr>
                                        <tr>
                                            <td>لمكتب التعليم</td>
                                            <td>لفريق الدعم</td>
                                            <td colspan="2" rowspan="2" class="green-text">56%</td>
                                        </tr>
                                        <tr>
                                            <td class="green-text"><input type="number" class="table-number"
                                                    style="width: 100%; height: 20px;" /></td>
                                            <td class="green-text"><input type="number" class="table-number"
                                                    style="width: 100%; height: 20px;" /></td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="display: block;">
                                    <p class="green-header text-right w-100 mt-4">ثالثاً :عدد زيارات فريق التحسين
                                        والتطوير المنفذة:</p>
                                    <div class="table-container">
                                        <table style="overflow-x: auto">
                                            <tr class="table-header" style="height: 30px;">
                                                <th colspan="2">
                                                    قبل عمليات التقويم
                                                </th>
                                                <th colspan="2">
                                                    أثناء عمليات التقويم
                                                </th>
                                                <th colspan="2">
                                                    بعد صدور تقرير التقويم ( الذاتي/الخارجي )
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>لمكتب التعليم</td>
                                                <td>لفريق الدعم</td>
                                                <td>لمكتب التعليم</td>
                                                <td>لفريق الدعم</td>
                                                <td>لمكتب التعليم</td>
                                                <td>لفريق الدعم</td>
                                            </tr>
                                            <tr>
                                                <td class="green-text">
                                                    <input type="number" class="table-number"
                                                        style="width: 100%; height: 20px;" />
                                                </td>
                                                <td class="green-text">
                                                    <input type="number" class="table-number"
                                                        style="width: 100%; height: 20px;" />
                                                </td>
                                                <td class="green-text">
                                                    <input type="number" class="table-number"
                                                        style="width: 100%; height: 20px;" />
                                                </td>
                                                <td class="green-text">
                                                    <input type="number" class="table-number"
                                                        style="width: 100%; height: 20px;" />
                                                </td>
                                                <td class="green-text">
                                                    <input type="number" class="table-number"
                                                        style="width: 100%; height: 20px;" />
                                                </td>
                                                <td class="green-text">
                                                    <input type="number" class="table-number"
                                                        style="width: 100%; height: 20px;" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="navButton">
                                        <button type="button" class="base-btn" id="prevButton"
                                            onclick="prevStep(1); toggleContentContainer(getCurrentStep());">
                                            <img src="<?= get_template_directory_uri() ?>/assets/imgs/chevron-right.svg" alt="prev" />
                                            السابق</button>
                                        <button type="button" class="base-btn" id="nextButton"
                                            onclick="nextStep(); toggleContentContainer(getCurrentStep());">
                                            التالي
                                            <img src="<?= get_template_directory_uri() ?>/assets/imgs/chevron-left.svg" alt="next" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="content2" class="content-tab" style="display: none;">
                            <div>
                                <p class="green-header text-right w-100 mt-4">
                                    رابعاً : بنود التقييم (تستخدم لقياس أداء المكتب أو فريق التحسين والتطوير):
                                </p>
                                <div class="table-container">
                                    <table style="overflow-x: auto;" class="table-step-2">
                                        <tr class="table-header" style="height: 30px;">
                                            <th rowspan="2">
                                                المرحلة
                                            </th>
                                            <th rowspan="2">
                                                بنود التقييم
                                            </th>
                                            <th colspan="3">
                                                مستوى التنفيذ
                                            </th>
                                            <th rowspan="2">
                                                الوصف
                                            </th>
                                        </tr>
                                        <tr class="table-header" style="height: 30px;">
                                            <th>نفذ</th>
                                            <th>غير مكتمل</th>
                                            <th>لم ينفذ</th>
                                        </tr>
                                        <tr>
                                            <td rowspan="10" class="gray-bg level">
                                                قبل عمليات التقويم الذاتي</td>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    توفر خطة إجرائية مزمنة الآلية دعم المدارس ومساندتها في تنفيذ عمليات
                                                    التقويم
                                                    المدرسي </div>
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    توزيع جميع مدارس المكتب بين المشرفين التربويين مع مراعاة عدد المدارس
                                                    الكلي
                                                    في المكتب والنطاق الجغرافي</div>
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level1" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level1" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level1" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    تقديم الدعم الفني لمنسوبي المدارس في أدوات التقويم المدرسي وآلية
                                                    تطبيقها من
                                                    خلال الزيارات واللقاءات (حضوري / عن بعد) والأساليب الإشرافية الأخرى
                                                </div>
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level2" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level2" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level2" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    المشاركة في حصر الاحتياجات التدريبية لمنسوبي المدارس في مجالات
                                                    التقويم
                                                    المدرسي وتلبيتها.</div>
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level3" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level3" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level3" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    متابعة أداء المشرفين التربويين في تقديم عمليات الدعم والمساندة
                                                    للمدارس
                                                    المسندة إليهم قبل البدء في عمليات التقويم الذاتي.</div>
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level4" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level4" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level4" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="10" class="gray-bg level">
                                                أثناء عمليات التقويم الذاتي
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    تقديم الدعم والمساندة خلال عملية تنفيذ المدارس لأعمال التقويم وحثهم
                                                    على طرح
                                                    أي سؤال أو إشكال قد يعيق أعمال التقويم
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level5" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level5" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level5" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    متابعة أداء المشرفين التربويين في دعم تنفيذ عمليات التقويم المدرسي
                                                </div>
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level6" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level6" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="level6" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>

                                    </table>
                                </div>

                            </div>
                            <div class="navButton">
                                <button type="button" class="base-btn" id="prevButton"
                                    onclick="prevStep(2); toggleContentContainer(getCurrentStep());">
                                    <img src="<?= get_template_directory_uri() ?>/assets/imgs/chevron-right.svg" alt="prev" />
                                    السابق</button>
                                <button type="button" class="base-btn" id="nextButton"
                                    onclick="nextStep(); toggleContentContainer(getCurrentStep());">
                                    التالي
                                    <img src="<?= get_template_directory_uri() ?>/assets/imgs/chevron-left.svg" alt="next" />
                                </button>
                            </div>
                        </div>

                        <div id="content3" class="content-tab" style="display: none;">
                            <div>
                                <p class="green-header text-right w-100 mt-4">
                                    رابعاً : بنود التقييم (تستخدم لقياس أداء المكتب أو فريق التحسين والتطوير):
                                </p>
                                <div class="table-container">
                                    <table style="overflow-x: auto;" class="table-step-2">
                                        <tr class="table-header" style="height: 30px;">
                                            <th rowspan="2">
                                                المرحلة
                                            </th>
                                            <th rowspan="2">
                                                بنود التقييم
                                            </th>
                                            <th colspan="3">
                                                مستوى التنفيذ
                                            </th>
                                            <th rowspan="2">
                                                الوصف
                                            </th>
                                        </tr>
                                        <tr class="table-header" style="height: 30px;">
                                            <th>نفذ</th>
                                            <th>غير مكتمل</th>
                                            <th>لم ينفذ</th>
                                        </tr>
                                        <tr>
                                            <td rowspan="36" class="gray-bg level">
                                                بعد صدور تقرير التقويم (الذاتي / الخارجي)
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    حصر المدارس التي صنفت، وصدرت لها تقارير التقويم المدرسي
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    تصنيف المدارس التي لم تصنف لأي سبب (فنية/ تقنية)
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-1" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-1" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-1" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    تشكيل فرق التحسين والتطوير وفق ضوابط تشكيل فريق التحسين والتطوير
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-2" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-2" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-2" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    تركيز أعمال الفرق على المدارس المصنفة في مستويي (التهيئة والانطلاق)
                                                    بحيث
                                                    تكون الأولوية القصوى لمدارس مستوى فئة (التهيئة).
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-3" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-3" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-3" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    توزيع المدارس على الفرق بواقع (٩-١٥) مدرسة لكل فريق أو بحسب ما يراه
                                                    مدير
                                                    المكتب مراعياً في ذلك عدد المدارس في المستويين التهيئة والانطلاق)
                                                    والنطاق
                                                    الجغرافي
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-4" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-4" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-4" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    توفر خطة عامة مزمنة لزيارات فريق التحسين والتطوير لجميع المدارس
                                                    المسندة لهم
                                                    وفق نتائج التقويم المدرسي وأولوية الدعم.
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-5" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-5" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-5" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    سلامة إجراءات عمل فرق التحسين والتطوير في دراسة النتائج لمدارس
                                                    المكتب من حيث
                                                    مشاركة لجنة التميز وتحديد جوانب القوة والضعف في النتائج والعوامل
                                                    المؤثرة في
                                                    أداء المدارس.
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-6" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-6" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-6" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    سلامة إجراءات عمل فرق التحسين والتطوير في دعم المدارس لإعداد خطط
                                                    التحسين
                                                    والتطوير وبناء البرامج التصحيحية التي تستهدف رفع مستوى تحصيل الطلاب
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-7" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-7" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-7" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    دعم المدرسة في معالجة العوامل المتعلقة بالبيئة المدرسية المؤثرة في
                                                    أداء
                                                    المدارس بالرفع والمتابعة مع الجهات المختصة
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-8" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-8" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-8" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    توثيق المبادرات والخبرات والتجارب الناجحة ونشرها بين المدارس
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-9" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-9" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-9" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    تنفيذ أساليب إشرافية متنوعة (تعليم مصغر، تبادل زيارات، ورش تربوية،
                                                    حلقات
                                                    نقاش...) تتضمن إجراءات تصحيحية وفق نتائج المدرسة بعد تطبيق التقويم
                                                    المدرسي
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-10" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-10" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-10" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    دعم المدارس في تنفيذ مجتمعات تعلم مهنية يشارك فيها المعلمون وفق
                                                    احتياجاتهم
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-11" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-11" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-11" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    فاعلية أداء المشرفين التربويين الذين تم استدعاؤهم لدعم المدارس في
                                                    أحد
                                                    المجالات أو التخصصات
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-12" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-12" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-12" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    مساندة المدارس في بناء خطة تحسين للانتقال لمستوى أعلى
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-12" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-12" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-12" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    تقديم التوصيات المناسبة للمدارس في مستوى (التميز) للمحافظة على
                                                    المستوى
                                                    والثبات عليه
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-13" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-13" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-13" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    قياس رضا المستفيد ( مدير مدرسة – معلم - طالب - ولي أمر) عن الدعم
                                                    المقدم من
                                                    المكتب/ فريق الدعم
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-14" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-14" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-14" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    متابعة عينات مختارة من زيارات الدعم لمشرفي المكتب من الزيارات
                                                    المسجلة في
                                                    برنامج نور وتقديم التغذية الراجعة حولها
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-15" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-15" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-15" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="text_cell">
                                                <div>
                                                    تفاعل مشرفي المكتب في مجتمعات التعلم المهنية الخاصة بالمشرفين
                                                    التربويين
                                            <td rowspan="2">
                                                <input type="radio" name="step3-16" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-16" />
                                            </td>
                                            <td rowspan="2">
                                                <input type="radio" name="step3-16" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea class="table-input"></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <div class="navButton">
                                <button type="button" class="base-btn" id="prevButton"
                                    onclick="prevStep(3); toggleContentContainer(getCurrentStep());">
                                    <img src="<?= get_template_directory_uri() ?>/assets/imgs/chevron-right.svg" alt="prev" />
                                    السابق</button>
                                <button type="button" class="base-btn" id="nextButton"
                                    onclick="nextStep(); toggleContentContainer(getCurrentStep());">
                                    التالي
                                    <img src="<?= get_template_directory_uri() ?>/assets/imgs/chevron-left.svg" alt="next" />
                                </button>
                            </div>
                        </div>

                        <div id="content4" class="content-tab" style="display: none;">
                            <div>
                                <p class="green-header text-right w-100 mt-4">
                                    ملخص المراحل : </p>
                                <div class="table-container">
                                    <table style="overflow-x: auto;" class="table-step-2">
                                        <tr class="table-header" style="height: 30px;">
                                            <th>
                                                المرحلة
                                            </th>
                                            <th>
                                                مجموع النقاط </th>
                                            <th>
                                                النقاط </th>
                                            <th>
                                                النسبة </th>
                                        </tr>
                                        <tr>
                                            <td class="gray-bg green-text">
                                                قبل عمليات التقويم الذاتي </td>
                                            <td>
                                                32
                                            </td>
                                            <td>
                                                43
                                            </td>
                                            <td>
                                                45%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="gray-bg green-text">
                                                أثناء عمليات التقويم الذاتي
                                            </td>
                                            <td>
                                                43
                                            </td>
                                            <td>
                                                56 </td>
                                            <td>
                                                45% </td>
                                        </tr>
                                        <tr>
                                            <td class="gray-bg green-text">
                                                بعد صدور تقرير التقويم (الذاتي / الخارجي) </td>
                                            <td>
                                                23 </td>
                                            <td>
                                                5 </td>
                                            <td>
                                                45% </td>
                                        </tr>

                                    </table>
                                </div>

                                <div class="text-right">
                                    <p class="green-header text-right w-100 mt-4">
                                        التوصيات : </p>
                                    <button class="base-btn mt-4 mb-3" type="button" onclick="addNewInput()">
                                        <img src="<?= get_template_directory_uri() ?>/assets/imgs/Add.svg" alt="add" width="20" height="20" />
                                        إضافة</button>
                                </div>
                                <div class="table-content2">
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="container_inputs">
                                                    <input type="text" placeholder="كتابة توصية" name="tawsya"
                                                        class="form-control recommendation_input py-4 px-2">
                                                    <div class="index">1</div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="navButton">
                                <button type="button" class="base-btn" id="prevButton"
                                    onclick="prevStep(4); toggleContentContainer(getCurrentStep());">
                                    <img src="<?= get_template_directory_uri() ?>/assets/imgs/chevron-right.svg" alt="prev" />
                                    السابق</button>
                                <button type="submit" class="base-btn" id="nextButton">
                                    إنهاء
                                    <img src="<?= get_template_directory_uri() ?>/assets/imgs/chevron-left.svg" alt="next" />
                                </button>
                            </div>
                        </div>

                    </div>
                </div>   
            </form>
        </div>
    </div>

<?php get_footer();?>