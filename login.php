<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="public/templates/templateAdmin/assets/css/default/app.min.css" rel="stylesheet" />

</head>
<body class="pace-top">
		<!-- ============================== Section loader  ================================= -->

    <?php require_once 'view/sections/login/loader.php'; ?>
    <div id="page-container" class="fade">

		<!-- ============================== Section form  ================================= -->

        <?php require_once 'view/sections/login/form.php'; ?>

        <!-- ============================== Section config  ================================= -->

        <?php require_once 'view/sections/login/config.php'; ?>

       <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        
	</div>

	<!-- ============================== Base JS  ================================= -->

    <script src="public/templates/templateAdmin/assets/js/app.min.js"></script>
    <script src="public/templates/templateAdmin/assets/js/theme/default.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="public/js/Validator.js?v=1.1"></script>
    <script src="public/js/login.js?v=1.1"></script>

	<!-- ============================== Message error  ================================= -->

    <?php if (isset($_GET['error']) && $_GET['error'] == 1 && isset($_GET['message']) && isset($_GET['title'])) : ?>
        <script>
            Swal.fire({
          icon : 'error',
		  timer:3000,
		  timeProgressBar:true,
          title:'<?php echo htmlspecialchars($_GET['title'],ENT_QUOTES, 'UTF-8')?>',
          text:'<?php echo htmlspecialchars($_GET['message'],ENT_QUOTES, 'UTF-8')?>'
            });
        </script>
    <?php endif; ?>

</body>
</html>