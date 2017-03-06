<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        
        <?=$this->render('user_profile')?>
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <?php if (method_exists($this->context->module, 'getMenuItems')): ?>
                    <?php foreach ($this->context->module->getMenuItems($this->context) as $menu): ?>
                        <?php if (isset($menu['items'])): ?>
                            <li class="<?= isset($menu['active']) && $menu['active'] ? 'active' : ''  ?>">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <?= $menu['label']?>
                                </a>
                                <ul class="ml-menu">
                                    <?php foreach($menu['items'] as $subMenu):?>
                                        <li class="<?= (isset($subMenu['active']) && $subMenu['active']) ? 'active' : ''  ?>">
                                            <a href="<?= $subMenu['url'][0]?>"><?=$subMenu['label']?></a>
                                        </li>
                                    <?php endforeach ?>
                                </ul>


                                <ul class="collapsible collapsible-accordion">
                                    <li class="bold <?= isset($menu['active']) && $menu['active'] ? 'active' : ''  ?>">
                                        <a class="collapsible-header waves-effect waves-cyan <?= isset($menu['active']) && $menu['active'] ? 'active' : ''  ?>"><?= $menu['label']?></a>
                                        <div class="collapsible-body">
                                            <ul>
                                                <?php foreach($menu['items'] as $subMenu):?>
                                                    <li class="<?= (isset($subMenu['active']) && $subMenu['active']) ? 'active' : ''  ?>">
                                                        <a href="<?= $subMenu['url'][0]?>"><?=$subMenu['label']?></a>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="<?= isset($menu['active']) && $menu['active'] ? 'active' : ''  ?>">
                                <a href="<?= $menu['url'][0]?>"><?= $menu['label']?></a>
                            </li>
                        <?php endif ?>
                    <?php endforeach; ?>
                <?php endif ?>  
                
                <!--###################-->
                    <li>
                        <a href="../index.html" class=" waves-effect waves-block">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="../pages/typography.html" class="toggled waves-effect waves-block">
                            <i class="material-icons">text_fields</i>
                            <span>Typography</span>
                        </a>
                    </li>
                    <li>
                        <a href="../pages/helper-classes.html" class=" waves-effect waves-block">
                            <i class="material-icons">layers</i>
                            <span>Helper Classes</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">widgets</i>
                            <span>Widgets</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    <span>Cards</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../pages/widgets/cards/basic.html" class=" waves-effect waves-block">Basic</a>
                                    </li>
                                    <li>
                                        <a href="../pages/widgets/cards/colored.html" class=" waves-effect waves-block">Colored</a>
                                    </li>
                                    <li>
                                        <a href="../pages/widgets/cards/no-header.html" class=" waves-effect waves-block">No Header</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    <span>Infobox</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../pages/widgets/infobox/infobox-1.html" class=" waves-effect waves-block">Infobox-1</a>
                                    </li>
                                    <li>
                                        <a href="../pages/widgets/infobox/infobox-2.html" class=" waves-effect waves-block">Infobox-2</a>
                                    </li>
                                    <li>
                                        <a href="../pages/widgets/infobox/infobox-3.html" class=" waves-effect waves-block">Infobox-3</a>
                                    </li>
                                    <li>
                                        <a href="../pages/widgets/infobox/infobox-4.html" class=" waves-effect waves-block">Infobox-4</a>
                                    </li>
                                    <li>
                                        <a href="../pages/widgets/infobox/infobox-5.html" class=" waves-effect waves-block">Infobox-5</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">swap_calls</i>
                            <span>User Interface (UI)</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../pages/ui/alerts.html" class=" waves-effect waves-block">Alerts</a>
                            </li>
                            <li>
                                <a href="../pages/ui/animations.html" class=" waves-effect waves-block">Animations</a>
                            </li>
                            <li>
                                <a href="../pages/ui/badges.html" class=" waves-effect waves-block">Badges</a>
                            </li>

                            <li>
                                <a href="../pages/ui/breadcrumbs.html" class=" waves-effect waves-block">Breadcrumbs</a>
                            </li>
                            <li>
                                <a href="../pages/ui/buttons.html" class=" waves-effect waves-block">Buttons</a>
                            </li>
                            <li>
                                <a href="../pages/ui/collapse.html" class=" waves-effect waves-block">Collapse</a>
                            </li>
                            <li>
                                <a href="../pages/ui/colors.html" class=" waves-effect waves-block">Colors</a>
                            </li>
                            <li>
                                <a href="../pages/ui/dialogs.html" class=" waves-effect waves-block">Dialogs</a>
                            </li>
                            <li>
                                <a href="../pages/ui/icons.html" class=" waves-effect waves-block">Icons</a>
                            </li>
                            <li>
                                <a href="../pages/ui/labels.html" class=" waves-effect waves-block">Labels</a>
                            </li>
                            <li>
                                <a href="../pages/ui/list-group.html" class=" waves-effect waves-block">List Group</a>
                            </li>
                            <li>
                                <a href="../pages/ui/media-object.html" class=" waves-effect waves-block">Media Object</a>
                            </li>
                            <li>
                                <a href="../pages/ui/modals.html" class=" waves-effect waves-block">Modals</a>
                            </li>
                            <li>
                                <a href="../pages/ui/notifications.html" class=" waves-effect waves-block">Notifications</a>
                            </li>
                            <li>
                                <a href="../pages/ui/pagination.html" class=" waves-effect waves-block">Pagination</a>
                            </li>
                            <li>
                                <a href="../pages/ui/preloaders.html" class=" waves-effect waves-block">Preloaders</a>
                            </li>
                            <li>
                                <a href="../pages/ui/progressbars.html" class=" waves-effect waves-block">Progress Bars</a>
                            </li>
                            <li>
                                <a href="../pages/ui/range-sliders.html" class=" waves-effect waves-block">Range Sliders</a>
                            </li>
                            <li>
                                <a href="../pages/ui/sortable-nestable.html" class=" waves-effect waves-block">Sortable &amp; Nestable</a>
                            </li>
                            <li>
                                <a href="../pages/ui/tabs.html" class=" waves-effect waves-block">Tabs</a>
                            </li>
                            <li>
                                <a href="../pages/ui/thumbnails.html" class=" waves-effect waves-block">Thumbnails</a>
                            </li>
                            <li>
                                <a href="../pages/ui/tooltips-popovers.html" class=" waves-effect waves-block">Tooltips &amp; Popovers</a>
                            </li>
                            <li>
                                <a href="../pages/ui/waves.html" class=" waves-effect waves-block">Waves</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">assignment</i>
                            <span>Forms</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../pages/forms/basic-form-elements.html" class=" waves-effect waves-block">Basic Form Elements</a>
                            </li>
                            <li>
                                <a href="../pages/forms/advanced-form-elements.html" class=" waves-effect waves-block">Advanced Form Elements</a>
                            </li>
                            <li>
                                <a href="../pages/forms/form-examples.html" class=" waves-effect waves-block">Form Examples</a>
                            </li>
                            <li>
                                <a href="../pages/forms/form-validation.html" class=" waves-effect waves-block">Form Validation</a>
                            </li>
                            <li>
                                <a href="../pages/forms/form-wizard.html" class=" waves-effect waves-block">Form Wizard</a>
                            </li>
                            <li>
                                <a href="../pages/forms/editors.html" class=" waves-effect waves-block">Editors</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">view_list</i>
                            <span>Tables</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../pages/tables/normal-tables.html" class=" waves-effect waves-block">Normal Tables</a>
                            </li>
                            <li>
                                <a href="../pages/tables/jquery-datatable.html" class=" waves-effect waves-block">Jquery Datatables</a>
                            </li>
                            <li>
                                <a href="../pages/tables/editable-table.html" class=" waves-effect waves-block">Editable Tables</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">perm_media</i>
                            <span>Medias</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../pages/medias/image-gallery.html" class=" waves-effect waves-block">Image Gallery</a>
                            </li>
                            <li>
                                <a href="../pages/medias/carousel.html" class=" waves-effect waves-block">Carousel</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">pie_chart</i>
                            <span>Charts</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../pages/charts/morris.html" class=" waves-effect waves-block">Morris</a>
                            </li>
                            <li>
                                <a href="../pages/charts/flot.html" class=" waves-effect waves-block">Flot</a>
                            </li>
                            <li>
                                <a href="../pages/charts/chartjs.html" class=" waves-effect waves-block">ChartJS</a>
                            </li>
                            <li>
                                <a href="../pages/charts/sparkline.html" class=" waves-effect waves-block">Sparkline</a>
                            </li>
                            <li>
                                <a href="../pages/charts/jquery-knob.html" class=" waves-effect waves-block">Jquery Knob</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">content_copy</i>
                            <span>Example Pages</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../pages/examples/sign-in.html" class=" waves-effect waves-block">Sign In</a>
                            </li>
                            <li>
                                <a href="../pages/examples/sign-up.html" class=" waves-effect waves-block">Sign Up</a>
                            </li>
                            <li>
                                <a href="../pages/examples/forgot-password.html" class=" waves-effect waves-block">Forgot Password</a>
                            </li>
                            <li>
                                <a href="../pages/examples/blank.html" class=" waves-effect waves-block">Blank Page</a>
                            </li>
                            <li>
                                <a href="../pages/examples/404.html" class=" waves-effect waves-block">404 - Not Found</a>
                            </li>
                            <li>
                                <a href="../pages/examples/500.html" class=" waves-effect waves-block">500 - Server Error</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">map</i>
                            <span>Maps</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../pages/maps/google.html" class=" waves-effect waves-block">Google Map</a>
                            </li>
                            <li>
                                <a href="../pages/maps/yandex.html" class=" waves-effect waves-block">YandexMap</a>
                            </li>
                            <li>
                                <a href="../pages/maps/jvectormap.html" class=" waves-effect waves-block">jVectorMap</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">trending_down</i>
                            <span>Multi Level Menu</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                    <span>Menu Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                    <span>Menu Item - 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    <span>Level - 2</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);" class=" waves-effect waves-block">
                                            <span>Menu Item</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                            <span>Level - 3</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="javascript:void(0);" class=" waves-effect waves-block">
                                                    <span>Level - 4</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="changelogs.html" class=" waves-effect waves-block">
                            <i class="material-icons">update</i>
                            <span>Changelogs</span>
                        </a>
                    </li>
                    <li class="header">LABELS</li>
                    <li>
                        <a href="javascript:void(0);" class=" waves-effect waves-block">
                            <i class="material-icons col-red">donut_large</i>
                            <span>Important</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class=" waves-effect waves-block">
                            <i class="material-icons col-amber">donut_large</i>
                            <span>Warning</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class=" waves-effect waves-block">
                            <i class="material-icons col-light-blue">donut_large</i>
                            <span>Information</span>
                        </a>
                    </li>
                    
                    <!--################-->
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; <?= date('Y')?> <a href="javascript:void(0);">Tsun Yii2</a>.
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>












<!-- START LEFT SIDEBAR NAV-->
<!--<aside id="left-sidebar-nav">-->
<!--    <ul id="slide-out" class="side-nav fixed leftside-navigation">-->
<!--        <?php if (method_exists($this->context->module, 'getMenuItems')): ?>-->
<!--            <?php foreach ($this->context->module->getMenuItems($this->context) as $menu): ?>-->
<!--                <?php if (isset($menu['items'])): ?>-->
<!--                    <li class="no-padding">-->
<!--                        <ul class="collapsible collapsible-accordion">-->
<!--                            <li class="bold <?= isset($menu['active']) && $menu['active'] ? 'active' : ''  ?>">-->
<!--                                <a class="collapsible-header waves-effect waves-cyan <?= isset($menu['active']) && $menu['active'] ? 'active' : ''  ?>"><?= $menu['label']?></a>-->
<!--                                <div class="collapsible-body">-->
<!--                                    <ul>-->
<!--                                        <?php foreach($menu['items'] as $subMenu):?>-->
<!--                                            <li class="<?= (isset($subMenu['active']) && $subMenu['active']) ? 'active' : ''  ?>">-->
<!--                                                <a href="<?= $subMenu['url'][0]?>"><?=$subMenu['label']?></a>-->
<!--                                            </li>-->
<!--                                        <?php endforeach ?>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                <?php else: ?>-->
<!--                    <li class="bold <?= isset($menu['active']) && $menu['active'] ? 'active' : ''  ?>">-->
<!--                        <a href="<?= $menu['url'][0]?>" class="uncollapsible-header waves-effect waves-cyan"><?= $menu['label']?></a>-->
<!--                    </li>-->
<!--                <?php endif ?>-->
<!--            <?php endforeach; ?>-->
<!--        <?php endif ?>-->
<!--    </ul>-->
<!--    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="material-icons">menu</i></a>-->
<!--</aside>-->
<!-- END LEFT SIDEBAR NAV-->

<?php
// $js = <<<JS
// $(function(){
//     //Main Left Sidebar Menu
//     $('.sidebar-collapse').sideNav({
//       edge: 'left', // Choose the horizontal origin    
//     });
// });
        
// JS;
// $this->registerJs($js);