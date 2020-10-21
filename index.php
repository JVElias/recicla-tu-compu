<?php
error_reporting(0);

// #########################################
//      CONFIGURACION
$title = "Recicla tu compu, recicla tu mundo."; // Titulo para la encuesta
$subtitle = "Encuesta para evaluar cuánto aprendimos."; // Subtitulo para la encuesta
$address = "index.php"; // direccion a la que nos va a llevar el link al finalizar la encuesta
$randomizequestions ="no"; // Setear en "si" para que las preguntas aparezcan en orden aleatorio
//      FINAL CONFIGURACION
// #########################################
//      PREGUNTAS
// Para evitar el uso de bases de datos colocamos todas las preguntas en un array 
// donde la posicion "0" contiene la pregunta, 
// las posiciones "1" a "5" contienen las posibles respuestas y
// la posicion "6" contiene un numero entero que indica en que posicion está la respuesta correcta
$a = array(
1 => array(
   0 => "Qué es el ambiente?",
   1 => "Es un sistema de elementos físicos.",
   2 => "Es todo aquello que nos rodea, incluye seres vivos y componente físicos.",
   3 => "Es un fluido que nos rodea.",
   6 => 2
),
2 => array(
   0 => "Sabemos que existen distintos tipos de residuos, pero ¿por qué los separamos?",
   1 => "Es más fácil para que después junten todos los que son iguales y los tiren en un mismo lugar.",
   2 => "Porque la inadecuada gestión de residuos constituye un peligro para la salud pública y las condiciones sanitarias en general.",
   3 => "Porque ahora hay influencers que promueven la separación de residuos.",
   6 => 2
),
3 => array(
   0 => "Hay un tipo de residuos, que se denominan RAEE, ¿cuáles son?",
   1 => "Residuos de Aparatos Electrógenos y Eléctricos",
   2 => "Residuos de Aparatos Electrógenos y Electrónicos.",
   3 => "Residuos de Aparatos Eléctricos y Electrónicos.",
   6 => 3
),
4 => array(
   0 => "Cuando un aparato se convierte en RAEE, puede darse por tres situaciones, Obsolescencia real, Obsolescencia Programada, Obsolescencia inducida, esta última a cuál corresponde?",
   1 => "Cuando un aparato se rompe debido a su uso y ya no cumple su función.",
   2 => "Cuando el mercado nos hace creer que nuestro aparato paso de moda.",
   3 => "Cuando el fabricante planifica la vida útil del aparato, para que en un tiempo determinado este se vuelva obsoleto, no funcional, inútil o inservible.",
   6 => 2
),
5 => array(
   0 => "Los equipos informáticos, tienen componentes dañinos, pero cuándo se tornan peligrosos para la salud?",
   1 => "Cuando se descartan de una forma incorrecta generan contaminación en nuestro ambiente y pueden provocar enfermedades debido a los metales pesados que poseen.",
   2 => "Nunca son peligrosos, porque cuando se queman se evaporan.",
   3 => "Cuando los usamos.",
   6 => 1
),
6 => array(
   0 => "¿A pesar de los componentes que tienen, se recomienda no utilizar los equipos electrónicos?",
   1 => "No, siempre los podemos utilizar, simplemente debemos de tener cuidado cuando los tiramos junto con los residuos domiciliarios.",
   2 => "No, pero hay que reducir su uso para no enfermarnos.",
   3 => "No, siempre los podemos utilizar, solo tenemos que saber que para desecharlos, se hacen de manera responsable y separarlos de los residuos domiciliarios.",
   6 => 3
),
7 => array(
   0 => "El concepto de las 3R´S esta definido por 3 aspectos básicos, cómo los ordenarías?",
   1 => "Reducir, Reutilizar, Reciclar.",
   2 => "Reciclar, Reducir, Reutilizar.",
   3 => "Reutilizar, Reciclar, Reducir.",
   6 => 1
),
8 => array(
   0 => "¿Qué elementos recibe el Programa E-BASURA?",
   1 => "Equipos Eléctricos y Electrónicos, como heladeras, computadoras, planchas.",
   2 => "Baterías, Toners, Pilas.",
   3 => "Equipos Electrónicos como pcs, Notebooks, Impresoras, Celulares.",
   6 => 3
),
);

$max=8;

$question=$_POST["question"] ;
// la siguiente funcion permite que las preguntas se muestren en orden aleatorio.
if ($_POST["Randon"]==0){
        if($randomizequestions =="si"){$randval = mt_rand(1,$max);}else{$randval=1;}
        $randval2 = $randval;
        }else{
        $randval=$_POST["Randon"];
        $randval2=$_POST["Randon"] + $question;
                if ($randval2>$max){
                $randval2=$randval2-$max;
                }
        }
        
$ok=$_POST["ok"] ;

if ($question==0){
        $question=0;
        $ok=0;
        $percentaje=0;
        }else{
        $percentaje= Round(100*$ok / $question);
        }
?>

<HTML lang="es">
	<HEAD>
		<meta charset="utf-8">
		<meta name="description" content="Esta pagina contiene una autoevaluacion para el curso de recicla">
		<meta name="creditos" content="http://www.phptutorial.info/">
		<TITLE>Recicla tu compu, Recicla tu mundo:  <?php print $title; ?></TITLE>

		<SCRIPT LANGUAGE='JavaScript'>
		<!-- la siguiente funcion es la encargada de mostrar si la respuesta que elegimos es o no la correcta
		function Goahead (number){
				if (document.percentaje.response.value==0){
						if (number==<?php print $a[$randval2][6] ; ?>){
								document.percentaje.response.value=1
								document.percentaje.question.value++
								document.percentaje.ok.value++
						}else{
								document.percentaje.response.value=1
								document.percentaje.question.value++
						}
				}
				if (number==<?php print $a[$randval2][6] ; ?>){
						document.question.response.value="Correcto"
				}else{
						document.question.response.value="Incorrecto"
				}
		}
		// -->
		</SCRIPT>
		<style>
			BODY {
			background-image: url('fondo_web.png');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
			}
		</style>

	</HEAD>
<BODY>

	<CENTER>
	<H1><?php print "$title"; ?></H1>
	<H2><?php print "$subtitle"; ?></H2>
	<div class="form" style="background-image: url('fondo_web.png')">
	<TABLE BORDER=0 CELLSPACING=5 WIDTH=500>

		<?php if ($question<$max){ ?> 

		

		<TR><TD>
		<FORM METHOD=POST NAME="question" ACTION=""> <!-- Este formulario es el encargado de mostrar las preguntas-->
		
			<?php print "<b>".$a[$randval2][0]."</b>"; ?>
			<BR> 
			<BR>     <INPUT TYPE=radio NAME="option" VALUE="1"  onClick=" Goahead (1);"><?php print $a[$randval2][1] ; ?>
			<BR>     <INPUT TYPE=radio NAME="option" VALUE="2"  onClick=" Goahead (2);"><?php print $a[$randval2][2] ; ?>
			<?php if ($a[$randval2][3]!=""){ ?>
			<BR>     <INPUT TYPE=radio NAME="option" VALUE="3"  onClick=" Goahead (3);"><?php print $a[$randval2][3] ; } ?>
			<?php if ($a[$randval2][4]!=""){ ?>
			<BR>     <INPUT TYPE=radio NAME="option" VALUE="4"  onClick=" Goahead (4);"><?php print $a[$randval2][4] ; } ?>
			<?php if ($a[$randval2][5]!=""){ ?>
			<BR>     <INPUT TYPE=radio NAME="option" VALUE="5"  onClick=" Goahead (5);"><?php print $a[$randval2][5] ; } ?>
			<BR><BR>      <input type=text name=response size=8>
		</FORM>
		
		<TR><TD ALIGN=RIGHT>
		<FORM METHOD=POST NAME="percentaje" ACTION="<?php print $URL; ?>"> <!-- Este formulario es el encargado de mostrar el avance en la encuesta-->
			<br>Pregunta: <?php print $question+1; ?> / <?php print $max; ?>
			<BR>Porcentaje de respuestas correctas: <?php print $percentaje; ?> %<br>
			<BR><input type=submit value="Siguiente >>">
			<input type=hidden name=response value=0>
			<input type=hidden name=question value=<?php print $question; ?>>
			<input type=hidden name=ok value=<?php print $ok; ?>>
			<input type=hidden name=Randon value=<?php print $randval; ?>>
						
		</FORM>
		<HR>
		</TD></TR>

		<?php
		}else{
		?>
		<TR><TD ALIGN=Center>
		La encuesta ha terminado. Gracias por participar
		<BR>Porcentaje de respuestas correctas: <?php print $percentaje ; ?> %
		<p><A HREF="<?php print $address; ?>">Volver a empezar</a>

		<?php } ?>

		</TD></TR>
		</div>
	</TABLE>

	</CENTER>
</BODY>
</HTML>
