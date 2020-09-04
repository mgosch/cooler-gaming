@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css')?>" type="text/css">

<div id="main_content" class="newsColumn">
        <h2>Reembolsos en Cooler Gaming</h2>
		<p>Puedes solicitar un reembolso por casi cualquier compra en Steam. Por la razón que sea. Quizá tu PC no cumple con los requisitos necesarios; quizá compraste un juego por error; quizá jugaste y, tras una hora, simplemente no te gustó.</p>
		<p>No se tiene en cuenta. Valve, previa solicitud a través de <a href="https://help.coolergaming.com">help.coolergaming.com</a>, procederá a emitir un reembolso sin importar el motivo, siempre que la solicitud se realice en el periodo de devoluciones estipulado y, en el caso de los juegos, siempre que el título se haya jugado menos de dos horas. Más adelante se exponen más detalles, aunque, si el cliente no cumple estrictamente los requisitos descritos para solicitar un reembolso, aún tiene la opción de solicitarlo para que lo valoremos.</p>
		<p>Se te hará un reembolso completo de tu compra en el plazo de una semana tras su aprobación. Recibirás el reembolso en la Cartera de Steam o mediante el mismo método de pago que utilizaste para hacer la compra. Si, por cualquier razón, Steam no puede realizar un reembolso a través de tu método de pago inicial, se acreditará el importe total en tu Cartera de Steam. (Algunos de los métodos de pago disponibles en Steam en tu país pueden no admitir el reembolso de una compra a la forma de pago original. <a href="https://store.coolergaming.com/steam_refunds_methods">Haz clic aquí para ver una lista completa</a>.)</p>

		<h1>Dónde se aplican los reembolsos</h1>
		<p>La oferta de reembolsos de Steam, en un plazo de dos semanas desde la compra y con menos de dos horas de tiempo de juego, se aplica a los juegos y aplicaciones de software obtenidos en la tienda de Steam. He aquí un resumen de cómo funcionan los reembolsos con otros tipos de compras.</p>

		<h2>Reembolsos en contenido descargable<br>(Contenido de la tienda de Steam utilizable dentro de otro juego o aplicación de software, "DLC")</h2>
		<p>Los DLC adquiridos en la tienda de Steam son reembolsables durante catorce días después de su compra, si el título al que pertenecen se ha jugado menos de dos horas desde la adquisición del DLC, y siempre que este no haya sido consumido, modificado o transferido. Por favor, ten en cuenta que en algunos casos Steam no podrá reembolsar ciertos DLC de terceros (por ejemplo, si el DLC sube de nivel irreversiblemente a un personaje del juego). Estas excepciones estarán claramente señaladas como no reembolsables en la página de la tienda antes de su compra.</p>

		<h2>Reembolsos en compras realizadas dentro de juegos</h2>
		<p>Steam ofrecerá reembolsos para compras realizadas dentro de cualquier juego desarrollado por Valve durante las primeras 48 horas tras su adquisición, siempre y cuando el artículo no haya sido consumido, modificado o transferido. Otros desarrolladores tendrán la opción de activar los reembolsos para artículos adquiridos dentro de sus juegos de acuerdo a estos términos. Steam te informará en el momento de la compra sobre si el desarrollador ha optado por ofrecer reembolsos para el artículo que vas a adquirir. De lo contrario, las compras realizadas dentro de juegos no desarrollados por Valve no son reembolsables a través de Steam.</p>

		<h2>Reembolsos en títulos precomprados</h2>
		<p>Cuando precompres un título en Steam (y hayas pagado por él de antemano), puedes solicitar un reembolso en cualquier momento antes del estreno de ese título. El periodo estándar de reembolso de 14 días/dos horas también se aplica, contando a partir de la fecha de lanzamiento del juego.</p>

		<h2>Reembolsos a la Cartera de Steam</h2>
		<p>Puedes solicitar un reembolso de fondos de la Cartera de Steam durante los siguientes catorce días de la compra si fueron comprados en Steam y no has utilizado ninguno de esos fondos.</p>

		<h2>Hardware de Steam</h2>
		<p>El cliente puede solicitar un reembolso de hardware y accesorios de Steam adquiridos a través de Steam sin importar el motivo, siempre que la solicitud esté dentro del periodo de tiempo estipulado en la <a href="https://store.coolergaming.com/hardware_order_terms">Política de reembolso de hardware</a>. El cliente debe enviar de vuelta dicho hardware en un plazo máximo de catorce (14) días tras solicitar el reembolso siguiendo las instrucciones facilitadas. La <a href="https://store.coolergaming.com/hardware_order_terms">Política de reembolso de hardware</a> contiene más información detallada acerca del proceso de reembolso y cancelación del hardware de Steam y sus accesorios.</p>

		<h2>Reembolsos en packs</h2>
		<p>Puedes recibir un reembolso completo por cualquier pack comprado en la tienda de Steam, siempre y cuando ninguno de los artículos del pack se haya transferido, y el tiempo de uso combinado de todos los artículos del pack sea inferior a dos horas. Si un pack incluye un artículo de juego o DLC que no es reembolsable, Steam te dirá si todo el paquete es reembolsable durante la comprobación.</p>

		<h2>Compras realizadas fuera de Steam</h2>
		<p>Valve no puede proporcionar reembolsos para las compras realizadas fuera de Steam (por ejemplo, claves de producto o tarjetas de la Cartera de Steam compradas a terceros).</p>

		<h2>Bloqueos por VAC</h2>
		<p>Si te han bloqueado por VAC (el sistema antitrampas de Valve) en un juego, pierdes el derecho al reembolso de ese juego.</p>

		<h2>Contenido de vídeo</h2>
		<p>No podemos ofrecer reembolsos por contenido de vídeo en Steam (p. ej., películas, cortos, series, episodios y tutoriales), a menos que el vídeo venga en pack con otro contenido (que no sea de vídeo) reembolsable.</p>

		<h2>Reembolsos en regalos</h2>
		<p>Los regalos que no se hayan activado pueden rembolsarse dentro del período estándar de 14 días/2 horas. Los que sí se hayan activado también pueden rembolsarse en las mismas condiciones, pero debe ser el receptor del regalo quien inicie el proceso de rembolso. En este caso, los fondos utilizados para adquirir el regalo le serán devueltos al comprador original, no al receptor.</p>

		<h2>Derecho de desistimiento europeo</h2>
		<p>Si quieres saber cómo funciona el derecho de desistimiento europeo para los clientes de Steam, <a href="https://support.coolergaming.com/kb_article.php?ref=8620-QYAL-4516">haz clic aquí</a>.</p>

		<h2>Abuso</h2>
		<p>Los reembolsos están diseñados para eliminar el riesgo de compra de títulos en Steam, no como una forma de conseguir juegos gratis. Si nos parece que estás abusando de los reembolsos, podemos dejar de ofrecértelos. No consideramos abuso solicitar un reembolso de un título que fue comprado justo antes de unas rebajas si luego inmediatamente se compra de nuevo ese título por el precio rebajado.</p>

		<h1>Cómo solicitar un reembolso</h1>
		<p>Puedes solicitar un reembolso u otro tipo de asistencia con tus compras de Steam en <a href="https://help.coolergaming.com">help.coolergaming.com</a>.</p>

		<br>
		<p>Última actualización: 30 de abril de 2019</p>
	</div>
@include('layouts.footer')
@endsection