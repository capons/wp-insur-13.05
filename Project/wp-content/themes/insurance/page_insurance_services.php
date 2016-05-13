<?php
/* Template name: insurance_services */

get_header(); ?>

<?php if(have_posts()): while(have_posts()):the_post();?>




    <section style="min-width: 1000px;" id="main-content">
        <div style="height: 100%" class="insur-container clearfix">
            <!--Display Breadcrumbs -->
            <div style="padding: 5px" class="row">
                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </div>
            </div>

            <div class="row">
                <div id="cont-line-layout2" class="col-xs-11">

                </div>
            </div>
            <div class="row">
                <div  class="col-xs-11 center">
                    <div class="col-xs-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <p style="color: rgb(52,52,52);font-size: 30px"><?php echo get_the_title();?></p>
                            </div>
                        </div>
                        <div style="padding: 20px 0px;" class="row">
                            <div class="col-lg-12">
                                <?php the_content(); ?>
                            </div>
                        </div>

                    </div>
                    <div id="second_layout_menu" class="col-xs-4">
                        <?php
                        //$menu_slug = 'private clients';
                        $menus = get_registered_nav_menus();
                        $curent_menu_elem = array(); //all acordian menu elements
                        foreach ( $menus as $location => $description ) {
                            // echo $location . ': ' . $description . '<br />';
                            $menu_elements = wp_get_nav_menu_items ($location);
                            foreach ($menu_elements as $row) {
                                $curent_menu_elem[$location][] = $row->title; //all accordian menu elements
                            }
                        }
                        $page_title = $wp_query->post->post_title; //curent page title

                        ?>
                        <ul class="nav nav-stacked" id="accordion1 layout_menu">

                            <li  class="panel"> <a id="layout-topmenu-gr" data-toggle="collapse" data-parent="#accordion1" href="#secondLink"><p style="margin-top: 10px;">ПРОВЕРИТЬ СВОЙ ПОЛИС</p></a>
                                <?php
                                //Accordian work correct if each menu contains different pages
                                //wp menu
                                //if current page in accordian menu -> change to active
                                if (in_array($page_title, $curent_menu_elem['check policy'])) {
                                    wp_nav_menu(array(
                                        'menu' => 'check policy',
                                        //'depth' => 2,
                                        'container' => false,
                                        'menu_class' => 'collapse in', //active
                                        'menu_id' => 'secondLink', ////ul id
                                        //Process nav menu using our custom nav walker
                                        'walker' => new wp_bootstrap_navwalker()) //libs/wp-bootstrap
                                    );
                                } else {
                                    wp_nav_menu(array(
                                        'menu' => 'check policy',
                                        //'depth' => 2,
                                        'container' => false,
                                        'menu_class' => 'collapse', //no active
                                        'menu_id' => 'secondLink', ////ul id
                                        //Process nav menu using our custom nav walker
                                        'walker' => new wp_bootstrap_navwalker()) //libs/wp-bootstrap
                                    );
                                }
                                ?>
                            </li>
                            
                            <li  class="panel"> <a id="layout-topmenu-b" data-toggle="collapse" data-parent="#accordion1" href="#firstLink"><p style="margin-top: 10px;">ЧАСТНЫМ КЛИЕНТАМ</p></a>
                                <?php
                                //wp menu
                                //if current page in accordian menu -> change to active
                                    if (in_array($page_title, $curent_menu_elem['private clients'])) {
                                        wp_nav_menu(array(
                                            'menu' => 'private clients',
                                            //'depth' => 2,
                                            'container' => false,
                                            'menu_class' => 'collapse in', //active
                                            'menu_id' => 'firstLink', ////ul id
                                            //Process nav menu using our custom nav walker
                                            'walker' => new wp_bootstrap_navwalker()) //libs/wp-bootstrap
                                        );
                                    } else {
                                        wp_nav_menu(array(
                                            'menu' => 'private clients',
                                            //'depth' => 2,
                                            'container' => false,
                                            'menu_class' => 'collapse', //no active
                                            'menu_id' => 'firstLink', ////ul id
                                            //Process nav menu using our custom nav walker
                                            'walker' => new wp_bootstrap_navwalker()) //libs/wp-bootstrap
                                        );
                                    }
                                ?>
                            </li>
                            <li  class="panel"> <a id="layout-topmenu" data-toggle="collapse" data-parent="#accordion1" href="#thirdLink"><p style="margin-top: 10px;">КОРПОРАТИВНЫМ КЛИЕНТАМ</p></a>
                                <?php
                                //wp menu
                                //if current page in accordian menu -> change to active
                                    if (in_array($page_title, $curent_menu_elem['corporate clients'])) {
                                        wp_nav_menu(array(
                                            'menu' => 'corporate clients',
                                            //'depth' => 2,
                                            'container' => false,
                                            'menu_class' => 'collapse in', // active menu
                                            'menu_id' => 'thirdLink', //ul id
                                            //Process nav menu using our custom nav walker
                                            'walker' => new wp_bootstrap_navwalker()) //libs/wp-bootstrap
                                        );
                                    } else {
                                        wp_nav_menu(array(
                                            'menu' => 'corporate clients',
                                            //'depth' => 2,
                                            'container' => false,
                                            'menu_class' => 'collapse', //no active menu
                                            'menu_id' => 'thirdLink', //ul id
                                            //Process nav menu using our custom nav walker
                                            'walker' => new wp_bootstrap_navwalker()) //libs/wp-bootstrap
                                        );
                                    }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="call-b-bg" class="col-xs-12">
            <div style="padding: 30px;text-align: center" class="col-lg-8 center">
                <p style="font-size: 30px;color: white">
                    Один номер для любого вопроса <b>+7(473) 239 31 07</b>
                </p>
                <div class="row">
                    <div class="col-xs-6">
                        <a id="a-tech" href="#"><span id="technologi"></span>Обратный звонок</a>
                    </div>
                    <div class="col-xs-6">
                        <a id="a-map" href="#"><span id="map_b"></span>Карта проезда</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="min-width: 1000px;">
        <div style="height: 100%" class="insur-container clearfix">
            <!--
            <div style="text-align: center;padding: 10px" class="col-xs-12">
                <img id="ou-clients" src="./image/clients.png" alt="alt">
            </div>
            -->
            <div style="padding: 20px" class="col-xs-12">
                <div  class="col-xs-3 t-elign-c">
                    <img id="b-f-b" src="<?php bloginfo("template_directory");?>/image/b_people.png">
                </div>
                <div class="col-xs-3 t-elign-c">
                    <button id="b-money" style="border: none;background-color: inherit"><p style="text-align: right;font-family: 'Century Gothic';font-weight: 600;font-size: 12px;margin-right: 25px;margin-bottom: 0px">ВОПРОС<br>СПЕЦИАЛИСТУ</p></button>
                </div>
                <div class="col-xs-3 t-elign-c">
                    <button id="b-tool" style="border: none;background-color: inherit"><p style="text-align: right;font-family: 'Century Gothic';font-weight: 600;font-size: 12px;margin-right: 25px;margin-bottom: 0px">СТРАХОВОЙ<br>СЛУЧАЙ</p></button>
                </div>
                <div class="col-xs-3 t-elign-c">
                    <button id="b-agent" style="border: none;background-color: inherit"><p style="text-align: right;font-family: 'Century Gothic';font-weight: 600;font-size: 12px;margin-right: 25px;margin-bottom: 0px">СВЯЗАТЬСЯ С<br>АГЕНТОМ</p></button>
                </div>
            </div>
        </div>
        <div id="orange-line" class="col-lg-12">

        </div>
    </section>






<?php endwhile; endif; ?>

<?php
get_footer();
