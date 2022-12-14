<?php
	
	session_start();
	// get the HTML
     ob_start();
	 if (!isset($_SESSION['user_id'])){
			exit;
		}
	/* Connect To Database*/
	include("config/db.php");
	include("config/conexion.php");
	include("libraries/inventory.php");
	include("currency.php");//Archivo que obtiene los datos de la moneda
	//Ontengo variables pasadas por GET
	$charge_id=intval($_GET['id']);
	//Final variables GET
	$query=mysqli_query($con,"select * from charges where charge_id='$charge_id'");
	$row=mysqli_fetch_array($query);
	$payment_date=date("d/m/Y",strtotime($row['payment_date']));
	$sale_id=get_id('charges','sale_id','charge_id',$charge_id);
	$sale_prefix=get_id('sales','sale_prefix','sale_id',$sale_id);//Obtiene el prefijo de documento de venta
	$sale_number=get_id('sales','sale_number','sale_id',$sale_id);//Obtiene el numero de documento de venta
	$customer_id=get_id('sales','customer_id','sale_id',$sale_id);//Obtiene el id del cliente
	$cliente=get_id('customers','name','id',$customer_id);//Obtiene el nombre del cliente
	$total=get_id('charges','total','charge_id',$charge_id);//Obtiene el monto
	/*Datos de la empresa*/
		$sql_empresa=mysqli_query($con,"SELECT business_profile.name, business_profile.industry, business_profile.tax, business_profile.address,  currencies.symbol, business_profile.city, business_profile.state, business_profile.postal_code, business_profile.phone, business_profile.email, business_profile.logo_url, business_profile.number_id FROM  business_profile, currencies where business_profile.currency_id=currencies.id and business_profile.id=1");
		$rw_empresa=mysqli_fetch_array($sql_empresa);
		$moneda=$rw_empresa["symbol"];
		$tax=$rw_empresa["tax"];
		$bussines_name=$rw_empresa["name"];
		$industry=$rw_empresa['industry'];
		$address=$rw_empresa["address"];
		$city=$rw_empresa["city"];
		$state=$rw_empresa["state"];
		$postal_code=$rw_empresa["postal_code"];
		$phone=$rw_empresa["phone"];
		$email=$rw_empresa["email"];
		$logo_url=$rw_empresa["logo_url"];
		$number_id=$rw_empresa["number_id"];
	/*Fin datos empresa*/

	require_once(dirname(__FILE__).'/pdf/html2pdf.class.php');
		

    
     include(dirname('__FILE__').'/pdf/documentos/html/recibo.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('L', array(215.9, 139.7), 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Orden_Compra.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
