<!DOCTYPE html>
<html>
  <head>
	<?php include("head.php");?>
  </head>
  <body class="hold-transition <?php echo $skin;?> sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
		<?php include("main-header.php");?>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
		<?php include("main-sidebar.php");?>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<?php if ($permisos_ver==1){?>
		<section class="content-header">
          <h1>
          Dashboard General
          </h1>
        </section>
		
		
		        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
         

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="chart">
						            <canvas id="barChart" style="height:450px"></canvas>
				          	  </div>
                    </div><!-- /.col -->
          <div class="col-md-4 title-box-info-custom">
            <h4>General</h4>
          </div>
          <div class="col-sm-4">
					<!-- Info Boxes Style 2 -->
					  <div class="info-box bg-purple">
						<!-- <span class="info-box-icon"><i class="fa fa-tags"></i></span> -->
						<div class="info-box-content">
						  <span class="info-box-text">Inventario Neto</span>
						  <span class="info-box-number"><?php echo sum_inventory();?></span>
						  <span class="progress-description">
							Productos en stock: <?php echo count_stock();?>
						  </span>
						</div><!-- /.info-box-content -->
					  </div><!-- /.info-box -->
				</div>	
				<div class="col-sm-4">
				  <div class="info-box bg-green">
					<!-- <span class="info-box-icon"><i class="fa fa-money"></i></span> -->
					<div class="info-box-content">
					  <span class="info-box-text">Ventas <?php echo date('Y');?></span>
					  <span class="info-box-number"><?php sum_sales();?></span>
					  <span class="progress-description">
						Facturas emitidas: <?php echo count_sales();?>
					  </span>
					</div><!-- /.info-box-content -->
				  </div><!-- /.info-box -->
				</div>
			<div class="col-sm-4">
				  <div class="info-box bg-yellow">
					<!-- <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span> -->
					<div class="info-box-content">
					  <span class="info-box-text">Compras <?php echo date('Y');?></span>
					  <span class="info-box-number">S/<?php sum_purchases();?></span>
					  <span class="progress-description">
						Compras realizadas: <?php count_purchases();?>
					  </span>
					</div><!-- /.info-box-content -->
				  </div><!-- /.info-box -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Últimas ventas</h3>
                  <div class="box-tools pull-right">
                  <a href="new_sale.php" class="btn btn-sm btn-default btn-flat pull-left">Nueva venta</a>
                  <a href="manage_invoice.php" class="btn btn-sm btn-default btn-flat pull-right">Ver todas las facturas</a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table tab_home">
                      <thead>
                        <tr>
                          <th>Factura Nº</th>
                          <th>Cliente</th>
                          <th>Fecha</th>
                          <th class='text-right'>Total	</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
						latest_sales();
						?>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->
            </div><!-- /.col -->

            <div class="col-md-4">
 



              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Nuevos productos</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
				<?php 
					recently_products();
				?>
                 
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="products.php" class="uppercase">Ver todos los productos</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
		
		
		
		
		
		<?php 
		} else{
		?>	
		<section class="content">
			<div class="alert alert-danger">
				<h3>Acceso denegado! </h3>
				<p>No cuentas con los permisos necesario para acceder a este módulo.</p>
			</div>
		</section>		
		<?php
		}
		?>
      </div><!-- /.content-wrapper -->
      <?php include("footer.php");?>
    </div><!-- ./wrapper -->
	<?php //include("js.php");?>
  </body>
</html>

 <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    
    <script>
      $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------
        var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
        const data = {
          labels: meses,
          datasets: [{
            label: 'My First Dataset',
            data: [<?php echo sum_purchases_month(1);?>, <?php echo sum_purchases_month(2);?>, <?php echo sum_purchases_month(3);?>, <?php echo sum_purchases_month(4);?>, <?php echo sum_purchases_month(5);?>, <?php echo sum_purchases_month(6);?>, <?php echo sum_purchases_month(7);?>,<?php echo sum_purchases_month(8);?>,<?php echo sum_purchases_month(9);?>,<?php echo sum_purchases_month(10);?>,<?php echo sum_purchases_month(11);?>,<?php echo sum_purchases_month(12);?>],
            fill: false,
            borderColor: 'rgb(127, 70, 241)',
            tension: 0.5
          },
          {
            label: 'My First Dataset',
            data: [35, 49,50, 31, 65, 55, 63],
            borderColor: 'rgb(236, 113, 0)',
            data: [<?php echo sum_sales_month(1);?>, <?php echo sum_sales_month(2);?>, <?php echo sum_sales_month(3);?>, <?php echo sum_sales_month(4);?>, <?php echo sum_sales_month(5);?>, <?php echo sum_sales_month(6);?>, <?php echo sum_sales_month(7);?>,<?php echo sum_sales_month(8);?>,<?php echo sum_sales_month(9);?>,<?php echo sum_sales_month(10);?>,<?php echo sum_sales_month(11);?>,<?php echo sum_sales_month(12);?>],
            fill: false,
            tension: 0.5
          }]
        };
        const config = {
          type: 'line',
          data: data,
        };

        //-------------
        //- BAR CHART -
        //-------------
        var ctx = document.getElementById("barChart").getContext("2d");
        const barChart = new Chart(ctx, config);
      });
    </script>


	

