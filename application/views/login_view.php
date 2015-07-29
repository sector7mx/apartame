<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Ordenes Apartame</title>
	<meta name="description" content="Sistema sobre Bootstrap 2.0">
  <meta name="author" content="Luis G. Villaseñor">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="<?php echo base_url(); ?>bootstrap/css/appcedula.css" rel="stylesheet">
  <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
  <style>
     .form-signin {
      max-width: 300px;
      padding: 19px 29px 29px;
      margin: 0 auto 20px;
      background-color: #fff;
      border: 1px solid #e5e5e5;
      -webkit-border-radius: 5px;
         -moz-border-radius: 5px;
              border-radius: 5px;
      -webkit-box-shadow: 0 1px rgba(0,0,0,.05);
         -moz-box-shadow: 0 1px rgba(0,0,0,.05);
              box-shadow: 0 1px rgba(0,0,0,.05);
    }
    .form-signin .form-signin-heading, .form-signin {
      margin-bottom: 10px;
    }
    .form-signin input[type="text"],
    .form-signin input[type="password"] {
      font-size: 16px;
      height: auto;
      margin-bottom: 15px;
      padding: 7px 9px;
    }
     #wrapper2 {
      background-color: transparent;
      margin-top: 40px;
      padding-top: 5px;
      padding-left: 10px;
      padding-right: 10px;
      
    }
    </style>
</head>

<body>
  
<div class="container">
<!--Body content container-fluid-->
    
    <div id="wrapper2" class="row-fluid">
        <div class="span12">
          <!--Body content-->
          <div class="">
            <?php echo form_open(base_url('welcome/index'),'class="form-signin"'); ?>
                <h2 class="form-signin-heading">Acceso</h2>
                  <p>
                      <?php 
                          echo form_label('Usuario: ',  'username' ) ; 
                          echo form_input('username', set_value('username'), 'id="username" class="input-block-level"');
                      ?>                      
                  </p>
                  <p>
                      <?php 
                          echo form_label('Password: ',  'password' ) ; 
                          echo form_password('password', '', 'id="password" class="input-block-level"');
                      ?>
                  </p>
<?php
      if(isset($message_error) && $message_error){
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Ups!</strong> Algo anda mal, vuelve a intentarlo.';
          echo '</div>';             
      }
      echo "<br />";
?>    
                  <p>
                      <?php echo form_submit('submit',  'Iniciar','class="btn btn-medium btn-primary"' ); ?>
                      
                  </p>
            <?php echo form_close(); ?>            
          </div> 


        </div> 
             
    </div>
    
          
    
</div><!— /container-fluid —>
        
<footer>
    
</footer>     

<script src="<?php echo base_url(); ?>bootstrap/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-alert.js"></script>
<script src="js/bootstrap-button.js"></script>
<script src="js/bootstrap-carousel.js"></script>
<script src="js/bootstrap-collapse.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-modal.js"></script>
<script src="js/bootstrap-popover.js"></script>
<script src="js/bootstrap-scrollspy.js"></script>
<script src="js/bootstrap-tab.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-transition.js"></script>
<script src="js/bootstrap-typeahead.js"></script>
    

</body>
</html>

