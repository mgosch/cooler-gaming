@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css"> 

<div class="container">
    <div id="about_header_area" class="about_area">
        <div class="about_area_inner_wrapper">
            <div id="about_games_hero" class="about_games_hero">
                <div class="cta_content">
                    <h2 class="cta_title">
                        Accede a los juegos al instante				</h2>
                    <div class="cta_text">
                        Con casi 30 000 juegos publicados; desde grandes compañías hasta estudios independientes pasando por todo lo intermedio. Lo novedoso de esta plataforma es que te permitirá probarlos sin tener que incurrir en el pago total del software.  Disfruta de ofertas exclusivas, actualizaciones automáticas y otras grandes ventajas.				</div>
                    <div class="cta_btn">
                        <a href="{{ url('/home') }}">Explorar la tienda</a>
			      </div>
			</div>
                </div>
            </div>
            <div id="about_monitor_video">
                <video width="100%" height="auto" autoplay="" muted="" loop="" poster="https://cdn.cloudflare.steamstatic.com/store/about/videos/about_hero_loop_web.png">
                    <source src="https://cdn.cloudflare.steamstatic.com/store/about/videos/about_hero_loop_web.webm" type="video/webm">
                    <source src="https://cdn.cloudflare.steamstatic.com/store/about/videos/about_hero_loop_web.mp4" type="video/mp4">
                </video>
                <div id="about_monitor_video_gradient"></div>
            </div>
        </div>
    </div>
</div>
@endsection
