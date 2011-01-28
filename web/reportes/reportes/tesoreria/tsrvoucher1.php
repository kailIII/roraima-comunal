<?php session_start();
include_once("../../lib/general/headhtml.php");
require_once("../../lib/modelo/business/tesoreria.class.php");

$bd=new basedatosAdo();


//OBJETO CODIGO EMPLEADO
$catalogo[] = tesoreria::catalogo_numche_tscheemi('numchedes');
$catalogo[] = tesoreria::catalogo_numche_tscheemi('numchehas');

$_SESSION['tsrvoucher'] = $catalogo;

$titulo='VOUCHER';
$orientacion='VERTICAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>

            <!--AQUI SE COPIAN LAS CAJITAS DE TEXTO PERTENECIENTES AL REPORTE-->
            <tr>
              <td class="form_label_01"> <div align="left"><strong>N&uacute;mero
                  Cheque:</strong></div></td>
              <td> <div align="left">
		<input name="numchedes" type="text" class="breadcrumb" id="numchedes"
                value="<?$sql="SELECT min(numche) as cod FROM tscheemi";
           	LlenarTextoSql($sql,"cod",$bd); ?>" size ="15">
  		<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrvoucher',0); "></a>
                </div></td>
              <td>
		<input name="numchehas" type="text" class="breadcrumb" id="numchehas"
                value="<?$sql="SELECT max(numche) as cod FROM tscheemi";
           	LlenarTextoSql($sql,"cod",$bd); ?>" size ="15">
  		<a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('tsrvoucher',1); "></a>
	       </td>
            </tr>
          <tr>
              <td class="form_label_01"><strong>Realizado por:</strong></td>
              <td colspan="2"><input name="hecho" type="text" class="breadcrumb" id="hecho"></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Revisado por:</strong></div></td>
              <td colspan="2"> <div align="left">
                  <input name="revi" type="text" class="breadcrumb" id="revi">
                </div></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Autorizado por:</strong></td>
              <td colspan="2"><input name="auto" type="text" class="breadcrumb" id="apro"></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Contabilidad:</strong></div></td>
              <td colspan="2"> <div align="left">
                  <input name="conta" type="text" class="breadcrumb" id="conta">
                </div></td>
            </tr>

            <!-- HASTA AQUI SE COPIAN LAS CAJITAS DEL REPORTE -->


<?php include_once("../../lib/general/formbottom.php")?>