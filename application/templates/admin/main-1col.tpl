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
            <div class="grid_16" id="top-account">
                {container name='top-myaccount'}
                <ul class="nav main">
                    <li>
                        <a href="#" title="My account">Welcome, {$oUser->username}</a>
                    </li>
                    <li class="secondary">
                        <a href="/sign/out" title="Logout">Logout</a>
                    </li>
                    <li class="secondary">
                        <a href="#" title="My account">My account</a>
                    </li>
                </ul>
                {/container}
            </div>
            <div class="clear"></div>

            <!-- Header-->
            <div class="grid_16">
                {container name='branding'}
                <h1 id="branding">
                    <a href="/">Site.tld</a>
                </h1>
                {/container}
            </div>
            <div class="clear"></div>
            <!-- /Header-->
            
            <!--Top navigation-->
            <div class="grid_16">
                {container name='top-navigation'}
                    {include file='admin/top-menu.tpl'}
                {/container}
            </div>
            <div class="clear"></div>
            <!-- /Top navigation-->

            <!--Page title-->
            <div class="grid_16">
                {container name='page-title'}
                    <h2 id="page-heading">You are viewing {$page->title}</h2>
                {/container}
            </div>
            <div class="clear"></div>
            <!-- /Page title-->
            

            <!--//
              Content
            //-->
            {container name='content'}
            <div class="grid_16">
                <div class="box">
                    <h2>Design Influences</h2>
                    <div class="block">
                        <p>The words "design influences" can be understood as both a plural noun and as subject and verb. The plural noun speaks of those who have come before us and paved the way. The verb speaks of the responsibility of design to lead the way. By understanding where we have come from, we have a better idea of where we are going and, perhaps, where we should be heading.</p>
                    </div>
                </div>
            </div>
            {/container}
            <div class="clear"></div>
            <!--//
              / Content
            //-->

            <!--//
              Footer
            //-->
            <div class="grid_16" id="site_info">
                {container name='footer'}
                    <div class="box">
                        <p>&copy; 2009 &#151; <a href="/">Site.tld</a> <span style="margin-left: 60%;">Released under the
                            <a href="licenses/GPL_license.txt">GPL</a>/
                            <a href="licenses/MIT_license.txt">MIT</a>
                            <a href="README.txt">Licenses</a>.</span></p>
                    </div>
                {/container}
            </div>
            <div class="clear"></div>
            <!--//
             /Footer
            //-->
        </div>
    </body>
</html>