<!-- provided by miki -->
<html>
<head>
<title>Cat&aacute;logo de Datos</title>

<link rel="shortcut icon" href="/favicon.ico" />

<script type="text/javascript" src="/sf/prototype/js/prototype.js"></script>

<script type="text/javascript" src="/sf/calendar/calendar.js"></script>
<script type="text/javascript" src="/js/tabpane.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/css/catalogo.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/css/tab.webfx.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sf/calendar/skins/aqua/theme.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sf/sf_admin/css/main.css" />


</head>
<body>
<br>
<br>

<!--form name="f1" action=""
onSubmit="if(this.t1.value!=null && this.t1.value!='')
findString(this.t1.value);return false"
-->
<?
	if ($seguir)
	{
		$nom     = array_keys($arre[0]);  //Titulos
		$objetos = split("-",$objs);      //Objetos
		$campo   = split("-",$campos);    //Campos
		$param = $params;    //Params
	}
?>

<script language="JavaScript" type="text/javascript">
  function aceptar2(tira)
  {
  	 objs='<? print $objs; ?>';
  	 obj=objs.split('-');
  	 tira=tira.split('***');

  	 for (i=0;i<=obj.length-1;i++)
  	 {
  	 	donde=obj[i];
  	 	valor=tira[i];
		opener.document.getElementById(donde).value=valor;
  	 }

  	 foco=obj[0];
  	 opener.document.getElementById(foco).focus();
  	 close();
  }


	   function aceptar(fila)
	   {
		   i           = 0;
		   var concate = '';
		   var sel     = 0;
		   var monto   = 0;
		   var concate = '';
		   var objs    = '<? print $objs; ?>';
		   var param = new Array();
		   param   = '<? print $param; ?>';
		   while (i<=fila)
		   {
				var x="x"+i+"1";
					if (document.getElementById(x).checked==true)
					{
					     obj   = objs.split('-');
						 valor = $F(x);
					  	 tira  = valor.split('***');

					  	 for (ii=0;ii<=obj.length-1;ii++)
					  	 {
					  	 	donde=obj[ii];
					  	 	valor=tira[ii];
					  	 	if (donde==param)
					  	 	{
					  	 		concate=concate+valor+',';
					  	 		opener.document.getElementById(donde).value = '';
					  	 	    opener.document.getElementById(donde).value = concate.substr(0,concate.length-1);
					  	 	}else{

					  	 		opener.document.getElementById(donde).value = valor;
					  	 	}

					  	 }

						sel=sel+1;
					}
				i=i+1;
			}
	  	 	foco=obj[0];
  	 		opener.document.getElementById(foco).focus();
	   		close();
	   }

</script>

<script language="JavaScript">

var TRange=null

function findString (str) {
 if (parseInt(navigator.appVersion)<4) return;
 var strFound;
 if (navigator.appName=="Netscape") {

  // NAVIGATOR-SPECIFIC CODE

  strFound=self.find(str);
  if (!strFound) {
   strFound=self.find(str,0,1)
   while (self.find(str,0,1)) continue
  }
 }
 if (navigator.appName.indexOf("Microsoft")!=-1) {

  // EXPLORER-SPECIFIC CODE

  if (TRange!=null) {
   TRange.collapse(false)
   strFound=TRange.findText(str)
   if (strFound) TRange.select()
  }
  if (TRange==null || strFound==0) {
   TRange=self.document.body.createTextRange()
   strFound=TRange.findText(str)
   if (strFound) TRange.select()
  }
 }
 if (!strFound) alert ("String '"+str+"' not found!")
}

//$('t1').focus();

</script>



<div id="sf_admin_container">

<form name="f1" action=""
onSubmit="if(this.t1.value!=null && this.t1.value!='')
findString(this.t1.value);return false"
>


<div class="tab-pane" id="tabPane1">
	<script type="text/javascript">
	tp1 = new WebFXTabPane( document.getElementById( "tabPane1" ) );
	</script>
	<div class="tab-page" id="tabPage1">
	<h2 class="tab">Registros</h2>
	<script type="text/javascript">tp1.addTabPage( document.getElementById( "tabPage1" ) );</script>

<div id="sf_admin_content">
<table cellspacing="0" class="sf_admin_list" width="100%">
<thead>
<tr>
<?
	foreach ($nom as $n)
	{
?>
	  <th id="sf_admin_list_th_dphart"><? print ucfirst($n); ?></th>
<?
	}
?>
</tr>
</thead>
<tbody>
<?
if ($seguir)
{
	$cont=0;
	foreach ($arre as $keys => $fila)
	{
?>
<tr class="sf_admin_row_0">
	    	<?
	    		$cadena='';
	    		$i=0;
	    		while ($i<=count($campo)-1)
	    		{
	    			$cadena=$cadena.$fila[$campo[$i]].'***';
		    		$i++;
	    		}

				//$fila_keys = array_keys($fila);
				$fila_values = array_values($fila);

				for ($i=0;$i<=count($fila_values)-1;$i++)
				//foreach ($fila as $key => $col)
				{
					//echo $fila_keys[$i];
					//if ($key=='check'){
					if ($i==0){
			?>
					<td class="grid_fila" align="center"><input type="checkbox" name="x<? print $cont;?>1" id="x<? print $cont;?>1" value="<? echo $cadena; ?>"></td>
			<? 		 }else{  ?>
					<td class="grid_fila" name="x<? print $i;?>2" id="x<? print $cont;?>2" value="<? echo $fila_values[$i]; ?>" ><? echo $fila_values[$i]; ?></td>
	    	<?
	    			} //if
				} // for
			?>
</tr>
	<?
	$cont++;
	} // foreach
}
?>

</tbody>
<tfoot>
<tr><th colspan="5">
<div class="float-right">
</div>
<? echo $keys; ?> resultados</th></tr>
</tfoot>


</table>
</div>
</div>

<table>
  <tr>
    <th width="20"><input type="button" name="Button" value="Aceptar" onClick="aceptar('<? echo $keys; ?>');"></th>
    <th width="20"><input type="button" name="Button2" value="Cerrar" onClick="javascript:window.close()"></th>
  </tr>
</table>

</form>

	<script type="text/javascript">
	setupAllTabs();
	</script>
</div>

<script type="text/javascript">
//<![CDATA[

   tp1.setSelectedIndex(0);

//]]>
</script></div>


</body>
</html>
<!-- provided by miki -->