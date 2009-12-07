<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>{$page->title}</title>

        <link rel="stylesheet" type="text/css" href="/assets/css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/assets/css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/assets/css/grid.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/assets/css/layout.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/assets/css/nav.css" media="screen" />
        {container name="css"}
        {/container}

        {container name="js"}
        {/container}
    </head>
    <body>
        <div class="container_16">

            <div class="grid_16">
                <ul class="nav main">
                    <li class="secondary">
                        <a href="http://960.gs/" title="960.gs | A CSS grid system developed by Nathan Smith">My account</a>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>

            <!-- Header-->
            <div class="grid_16">
                <h1 id="branding">
                    <a href="./">Fluid 960 Grid System</a>
                </h1>
            </div>
            <div class="clear"></div>
            <!-- /Header-->
            
            <!--Top navigation-->
            <div class="grid_16">
                <ul class="nav main">
                    {if $aTopNavigation}
                        {foreach from=$aTopNavigation item=oPage}
                            <li>
                                <a href="{if $oPage->directory}/{$oPage->directory}{/if}/{$oPage->controller}">{$oPage->menu}</a>
                            </li>
                        {/foreach}
                    {/if}

                    <li class="secondary">
                        <a href="http://960.gs/" title="960.gs | A CSS grid system developed by Nathan Smith">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
            <!-- /Top navigation-->

            <!--Page title-->
            <div class="grid_16">
                <h2 id="page-heading">Templates for Rapid Interactive Prototyping</h2>
            </div>
            <div class="clear"></div>
            <!-- /Page title-->
            
            <!--//
              / Left navigation
            //-->
            <div class="grid_3">
                <div class="box menu">
                    <h2>
                        <a href="#" id="toggle-section-menu">Section Menu</a>
                    </h2>
                    <div class="block" id="section-menu">
                        <ul class="section menu">
                            <li>
                                <a href="#" class="menuitem">Menu 1</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="#">Submenu 1</a>
                                    </li>
                                    <li>
                                        <a href="#">Submenu 2</a>
                                    </li>
                                    <li>
                                        <a href="#" class="active">Submenu 3</a>
                                    </li>
                                    <li>
                                        <a href="#">Submenu 4</a>
                                    </li>
                                    <li>
                                        <a href="#">Submenu 5</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="menuitem">Menu 2</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="#">Submenu 1</a>
                                    </li>
                                    <li>
                                        <a href="#">Submenu 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Submenu 3</a>
                                    </li>
                                    <li>
                                        <a href="#">Submenu 4</a>
                                    </li>
                                    <li>
                                        <a href="#">Submenu 5</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--//
              / Left navigation
            //-->

            <!--//
              Content
            //-->
            <div class="grid_13">
                <div class="box">
                    <h2>Design Influences</h2>
                    <div class="block">
                        <p>The words "design influences" can be understood as both a plural noun and as subject and verb. The plural noun speaks of those who have come before us and paved the way. The verb speaks of the responsibility of design to lead the way. By understanding where we have come from, we have a better idea of where we are going and, perhaps, where we should be heading.</p>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <!--//
              / Content
            //-->

            <!--//
              Footer
            //-->
            <div class="grid_16" id="site_info">
                <div class="box">
                    <p>Fluid 960 Grid System, created by <a href="http://www.domain7.com/WhoWeAre/StephenBau.html">Stephen Bau</a>, based on the <a href="http://960.gs/">960 Grid System</a> by <a href="http://sonspring.com/journal/960-grid-system">Nathan Smith</a>. Released under the
                        <a href="licenses/GPL_license.txt">GPL</a>/
                        <a href="licenses/MIT_license.txt">MIT</a>
                        <a href="README.txt">Licenses</a>.</p>
                </div>
            </div>
            <div class="clear"></div>
            <!--//
             /Footer
            //-->
        </div>
    </body>
</html>