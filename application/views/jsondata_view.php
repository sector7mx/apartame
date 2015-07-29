<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <div class="row">
                <li class="text-center">Bienvenid@ <strong><?php echo USER ?></strong><li>
            </div>
            <li><a href="<?php echo base_url('dashboard/index');?>">Inicio</span></a></li>
            <li><a href="<?php echo base_url('dashboard/getcurldata');?>">Ordenes</span></a></li>
            
            <li><a href="<?php echo base_url('welcome/logout');?>">Salir</span></a></li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" class="row">
        <div class="container-fluid">                
            <div class="row">
              <div class="col-lg-12">


                  <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Ordenes Apartadas</h2>
                    </div>
                    <div class="panel-body">
                        <nav class="navbar navbar-default">
                          <div class="container-fluid">
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                              <a class="navbar-brand"></a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                              <ul class="nav navbar-nav navbar-right">
                    
                                <li><a href="#"></a>.</li>
                              </ul>
                              <form class="navbar-form navbar-right">
                                <input type="text" class="form-control" placeholder="Buscar Orden...">
                              </form>
                            </div>
                          </div>
                        </nav>
                        <div class="container">
  
                    <?php
                      print_r($jsondata);
                    ?>
                    </div>
                  </div>   
              </div>
            </div><!-- row well -->
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->