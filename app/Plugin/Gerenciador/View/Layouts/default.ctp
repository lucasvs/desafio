<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo Configure::read('Application.name') ?> - <?php echo !empty($title_for_layout) ? $title_for_layout : ''; ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <style>
  body {
    padding-top: 60px;
    padding-bottom: 40px;
  }
  </style>
  <?php echo $this->Html->css( 'Gerenciador.normalize.css') ?>
  <?php echo $this->Html->css( 'Gerenciador.bootstrap-'.Configure::read('Layout.theme').'.min', null, array('data-extra' => 'theme')) ?>
  <?php echo $this->Html->css( 'Gerenciador.bootstrap-responsive.min') ?>
  <?php echo $this->Html->css( 'Gerenciador.style') ?>
  

  <?php
  # CSS Plugin Path
  $css_path = ROOT . DS . 'app' . DS . 'Plugin' . DS . $this->plugin . DS . 'webroot' . DS . 'css';

  if (is_file($css_path . DS . $this->params->controller . DS . $this->params->action . '.css')) {
    echo $this->Html->css('/'.$this->params->plugin.'/css/'.$this->params->controller . '/' . $this->params->action);
  }
  ?>

  <?php echo $this->Html->script( $this->plugin. '.lib/modernizr') ?>
</head>
<body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
            <![endif]-->

            <div class="navbar navbar-fixed-top">
              <div class="navbar-inner">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <?php echo $this->Html->link( Configure::read('Application.name') ,"/gerenciador",array('class' => 'brand')) ?>
                  <div class="nav-collapse">
                    <ul class="nav">
                      <?php if( AuthComponent::user('id') ) { ?>
                      <li class="<?php echo $this->params->controller == 'photos' ? 'active' : '' ?>">
                        <?php echo $this->Html->link('Fotos',array(
                          'plugin'      => 'gerenciador',
                          'controller'  => 'photos',
                          'action'      => 'index'
                        )) ?>
                      </li>
                      <li class="<?php echo $this->params->controller == 'videos' ? 'active' : '' ?>">
                        <?php echo $this->Html->link('Vídeos',array(
                          'plugin'      => 'gerenciador',
                          'controller'  => 'videos',
                          'action'      => 'index'
                        )) ?>
                      </li>                      
                      <?php } ?>

                      
                    </ul>

                    <?php if( AuthComponent::user('id') ) { ?>
                    <ul class="nav pull-right">
                      <li id="fat-menu" class="dropdown">
                        <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="icon-black icon-user"></i> 
                          <?php echo AuthComponent::user('username') ?> <b class="caret"></b></a>
                          <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                            <li>
                              <?php echo $this->Html->link(
                                '<i class="icon-black icon-off"></i> Logout','/users/logout',
                                array(
                                  'tabindex' => '-1',
                                  'escape' => false
                                  )
                                  ) ?>
                                </li>
                              </ul>
                            </li>
                          </ul>   
                          <?php } ?>

                        </div><!--/.nav-collapse -->
                      </div>
                    </div>
                  </div> 

                  <div class="container" role="main" id="main">

                    <?php echo $this->Session->flash();?>
                    <?php echo $this->fetch('content'); ?>

                    <hr>

                    <footer>
                      <p>&copy; <?php echo Configure::read('Application.name') ?> 2012</p>
                    </footer>

                  </div> <!-- /container -->

                  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
                  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
                  <?php echo $this->Html->script( 'Gerenciador.lib/jquery.tmpl.min') ?>
                  <?php

                  # Path for plugin assets
                  $js_path = ROOT . DS . 'app' . DS . 'Plugin' . DS . $this->plugin . DS . 'webroot' . DS . 'js';

                  if (is_file($js_path . DS . $this->params->controller . DS . $this->params->action . '.js')) {
                    echo $this->Html->script('/'.$this->params->plugin.'/js/'.$this->params->controller . '/' . $this->params->action);
                  }
                  ?>
                  
                  <?php echo $this->Html->script(
                    array(
                      'Gerenciador.lib/bootstrap.min',
                      'Gerenciador.src/scripts.js'
                      ));
                      ?>

                      <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
                      <script>
                      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
                      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                        s.parentNode.insertBefore(g,s)}(document,'script'));
                      </script>
                    </body>
                    </html>