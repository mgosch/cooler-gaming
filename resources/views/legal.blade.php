@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css')?>" type="text/css">

<div id="legal_box">
			<h2>Derechos de autor</h2> © 2020 Valve Corporation. Todos los derechos reservados. Valve, el logotipo de Valve, Half-Life, el logotipo de Half-Life, el logotipo de Lambda, Cooler Gaming, el logotipo de Cooler Gaming, Team Fortress, el logotipo de Team Fortress, Opposing Force, Day of Defeat, el logotipo de Day of Defeat, Counter-Strike, el logotipo de Counter-Strike, Source, el logotipo de Source, Counter-Strike: Condition Zero, Portal, el logotipo de Portal, Dota, el logotipo de Dota&nbsp;2 y Defense of the Ancients son marcas comerciales o marcas registradas de Valve Corporation. Todas las demás marcas comerciales son propiedad de sus respectivos propietarios.<br> <br>
        	<h2>Política de Valve sobre vídeos</h2>
            <a href="https://store.coolergaming.com/video_policy">Pulse aquí para obtener más información</a>.<br> <br>
            <h2>Avisos legales relativos a terceros</h2> Cooler Gaming y otros productos de Valve distribuidos a través de Cooler Gaming utilizan algunos materiales de terceros que requieren notificaciones sobre sus condiciones de licencia. Puede encontrar un listado de estas notificaciones en el archivo ThirdPartyLegalNotices.doc, distribuido con el cliente de Cooler Gaming o un determinado producto de Valve. Cuando las condiciones de licencia exijan a Valve publicar el código fuente para la redistribución, podrá encontrar el código <a href="http://developer.valvesoftware.com/wiki/Valve_Open_Source">aquí</a>.<br> <br>
            <h2>Demanda por infracción de los derechos de autor</h2> Valve respeta los derechos de propiedad intelectual de los demás y por ello pedimos a todos los usuarios que utilizan nuestros servicios y sitios de Internet que hagan lo mismo. Todos aquellos que consideren que su trabajo ha sido reproducido en uno de nuestros servicios o sitios de Internet de forma que supone una infracción de sus derechos de autor, podrán notificarlo a Valve a través de <a href="https://Cooler Gamingcommunity.com/dmca/create/">esta página</a>.<br> <br> Es posible obtener más información sobre la ley estadounidense en materia de derechos de autor en la Oficina de Derechos de Autor de Estados Unidos (United States Copyright Office) <a href="http://lcweb.loc.gov/copyright/">http://lcweb.loc.gov/copyright/</a>
			<br> <br>		
			</div>
@include('layouts.footer')
@endsection