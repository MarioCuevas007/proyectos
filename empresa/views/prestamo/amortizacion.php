<?php
$inicio = $_GET["inicio"];
$fin = $_GET["termino"];
 
$datetime1=new DateTime($inicio);
$datetime2=new DateTime($fin);
 
# obtenemos la diferencia entre las dos fechas
$interval=$datetime2->diff($datetime1);


 
# obtenemos la diferencia en meses
$intervalMeses=$interval->format("%m");
# obtenemos la diferencia en años y la multiplicamos por 12 para tener los meses
$intervalAnos = $interval->format("%y")*12;

$meses = $intervalMeses+$intervalAnos;
$c = intval($_GET["monto"]); // Capital inicial
$n = $meses; // Numero de CUOTAS
$i =floatval($_GET['tasa'])/100; // Tasa de Interes

$a = $c*(($i)/ (  1 - pow((1+$i) , ($n)*-1) )); // Calcular Amortizacion

$a = number_format($a,2,".",""); // Formatear numero a 2 decimales
$saldo_inicial = $c;
$saldo_inicial = number_format((float)$saldo_inicial,2,".",""); // Formatear numero a 2 decimales

//////// GENERAR TABLA
echo "<h1>CUADRO O TABLA DE AMORTIZACION</h1>";
echo "<table border=1>";
echo "<td>No.</td>";
echo "<td>Saldo Inicial</td>";
echo "<td>Amortizacion</td>";
echo "<td>Interes</td>";
echo "<td>Abono Capital</td>";
echo "<td>Saldo Final</td>";

for($ix=1; $ix<=$n; $ix++){
$interes = $saldo_inicial*$i; // se calcula el interes para este ciclo
$interes = number_format((float)$interes,2,".",""); // Formatear numero a 2 decimales

$abono_capital = $a - $interes; // el abono a capital es la amortizacion menos el interes del ciclo
$abono_capital = number_format((float)$abono_capital,2,".",""); // Formatear numero a 2 decimales

$saldo_final = $saldo_inicial - $abono_capital;
$saldo_final = number_format((float)$saldo_final,2,".",""); // Formatear numero a 2 decimales

echo "<tr>";
echo "<td>".$ix."</td>";
echo "<td>".$saldo_inicial."</td>";
echo "<td>".$a."</td>";
echo "<td>".$interes."</td>";
echo "<td>".$abono_capital."</td>";
echo "<td>".$saldo_final."</td>";

echo "<tr>";

$saldo_inicial = $saldo_final;
$saldo_inicial = number_format((float)$saldo_inicial,2,".",""); // Formatear numero a 2 decimales
}

echo "</table>";
echo "<p><i>Powered by Evilnapsis</i></p>";
/// EVILNAPSIS WAS HERE
?>