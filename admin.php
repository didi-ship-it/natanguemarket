<!-- ============================== Verification Session ================================= -->

<?php
   session_start();
   if(!$_SESSION['email']){
	 header("Location: login?error=1&message=" . urldecode("Merci de vous connecter!") . "&title=" . urldecode("Acces interdit"));

   }
?>

<!DOCTYPE html>
<html lang="en">
 <!-- ============================== Section head  ================================= -->

 <?php require_once 'view/sections/admin/head.php'; ?>
 
<body>
 
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show">
		<span class="spinner"></span>
	</div>
	<!-- end #page-loader -->

	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- ============================== Section Menu Haut ================================= -->
		<?php require_once 'view/sections/admin/menu_haut.php'; ?>
		
		<!-- ============================== Section Menu Gauche ================================= -->
		<?php require_once 'view/sections/admin/menu_gauche.php'; ?>
		
		<!-- ============================== Section Base Content ================================= -->
		<?php require_once 'view/sections/admin/base_content.php'; ?>
		
		<!-- ============================== Section Config  ================================= -->
		<?php require_once 'view/sections/admin/config.php'; ?>
		
		<!-- ============================== Section Scroll to top  ================================= -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a></div>
    </div>
        <!-- end page container -->

        <!-- ============================== Section Script  ================================= -->

	    <?php require_once 'view/sections/admin/script.php'; ?>

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<!-- ============================== Message Success  ================================= -->
		 
	<?php if (isset($_GET['success']) && $_GET['success'] == 1 && isset($_GET['message']) && isset($_GET['title'])) : ?>
        <script>
            Swal.fire({
                icon: 'success',
				timer:3000,
				timeProgressBar:true,
                title: '<?php echo htmlspecialchars($_GET['title'], ENT_QUOTES); ?>',
                text: '<?php echo htmlspecialchars($_GET['message'], ENT_QUOTES); ?>'
            });
        </script>
    <?php endif; ?>


</body>
</html>