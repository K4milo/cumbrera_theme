<?php get_header(); $home_url = get_home_url(); ?>
<div id="container">
    <section>
<?php
$post_type = get_post_type();
$id = get_the_ID();

//DETALLE PROYECTO
if($post_type == 'proyecto'){

//----- ENVIO CONTACTO ----
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $formulario = "proyecto";
  $emails = get_field('e-mail_sala_de_ventas');
  require_once("inc/contacto.php");
}
//----- ENVIO CONTACTO ----
$link = get_permalink();
$nombre = $post->post_title;
$fotos = get_field('fotos_del_proyecto');
$areas = get_field('areas_del_proyecto');
$ubicacion = get_field('ubicacion');
$estado = get_field('estado');
$ciudad = get_field('ciudad');
$relacionados = get_field('proyectos_relacionados');
$coords = get_field('proj_latitude');
$coords2 = get_field('proj_latitude2');
$address = get_field('direccion_del_proyecto');
$address2 = get_field('direccion_2_del_proyecto');
$redes = get_field('redes');
$zonas_comunes = get_field('descripcion_zonas_comunes');
$servicios = get_field('servicios');
$ubicacion2 = get_field('ubicacion2');
$beneficios = get_field('descripcion_beneficios');
?>
<div class="w-1000 c_detalle">
  <div class="miga antialias">
    <a href="javascript:void(0);">Home</a> / <a href="<?php echo $home_url; ?>/proyectos"><span>Proyectos</span></a> / <a href="<?php echo $$link; ?>"><span><?php echo $nombre; ?></span></a>
  </div>
  <div class="c_slide_principal">

    <div id="owl-detalle" class="owl-carousel owl-theme">
      <div class="item"><img src="<?php echo get_field('imagen_principal'); ?>" class="bg"></div>
    <?php if(count($fotos)>0){
      foreach($fotos as $f){ ?>
      <div class="item"><img src="<?php echo $f['imagen']; ?>" class="bg"></div>
    <?php }} ?>
    </div>
  </div>

  <div class="c1_detalle clearfix">

    <div class="left cont_2">
      <img src="<?php echo get_field('imagen_descripcion'); ?>">
    </div>
    <div class="left cont_1">
      <h3 class="antialias tit"><?php echo get_field('slogan'); ?></h3>
      <?php echo get_field('descripcion');?>
    </div>
  </div>
</div>
<?php if(!empty($areas)>0){?>
<div class="w-1000">
  <div class="c_medidas center">
    <div id="owl-medidas" class="owl-carousel">
      <?php foreach($areas as $a){ ?>
        <div class="item"><span><?php echo $a['descripcion_boton']; ?></span></div>
      <?php } ?>
    </div>
  </div>
  <div class="planos">
    <div id="owl-planos" class="owl-carousel">
    <?php foreach($areas as $a){ ?>
        <div class="item clearfix">
          <p><?php echo $a['descripcion_render']; ?></p>
          <a href="<?php echo $a['imagen']; ?>" class="zoom_img swipebox" title="<?php echo $a['nombre']; ?>">
            <img src="<?php echo $a['imagen']; ?>" alt=""> <span><img src="<?php bloginfo('template_url'); ?>/images/ico_zoom.png" alt=""></span>
          </a>

        </div>

        <?php } ?>
    </div>
  </div>
</div>
  <?php } ?>
<div class="w-1000">
  <div class="formulario c1_detalle clearfix">
    <div class="item-formulario form-left" style="padding: 5%; ">

      <p style="font-size: 26px; text-align:center;">¡Queremos saber más sobre tus sueños
de vivienda!</p>
<p style="font-size: 26px; margin-top:20px;">Déjanos tus datos y con mucho gusto
nos contactaremos contigo y te
contaremos sobre nuestros proyectos.
</p>
    </div>
    <div class="item-formulario form-right">
      <div class="container-formulario">
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/shell.js"></script>
  <script>
    hbspt.forms.create({
    portalId: "6607382",
    formId: "96a129c1-df87-4eea-9719-37b365ede7a7"
  });
  </script>
      </div>

      <!--<?php echo do_shortcode('[contact-form-7 id="997" title="landings"]'); ?>-->
    </div>

  </div>
</div>

<div class="ventajas">
  <div class="w-1000">
    <h3 class="tit antialias">VENTAJAS</h3>
    <ul class="reset_list center">
      <li>
        <img src="<?php bloginfo('template_url'); ?>/images/i1.png" alt="">
        <h4>UBICACIÓN</h4>
        <?php echo get_field('descripcion_ubicacion'); ?>
      </li>
      <?php if($ubicacion2): ?>
      <li>
        <img src="<?php bloginfo('template_url'); ?>/images/i1.png" alt="">
        <h4>UBICACIÓN 2</h4>
      <?php echo $ubicacion2 ?>
      </li>
    <?php endif; ?>
      <?php if($zonas_comunes): ?>
      <li>
        <img src="<?php bloginfo('template_url'); ?>/images/i2.png" alt="">
        <h4>ZONAS COMUNES</h4>
        <?php echo $zonas_comunes ?>
      </li>
    <?php endif; ?>
    <?php if($servicios): ?>
    <li>
      <img src="<?php bloginfo('template_url'); ?>/images/s1.png" alt="">
      <h4>SERVICIOS</h4>

      <?php echo $servicios ?>
    </li>
  <?php endif; ?>
  <?php if($beneficios): ?>
      <li>
        <img src="<?php bloginfo('template_url'); ?>/images/i3.png" alt="">
        <h4>BENEFICIOS</h4>
        <?php echo $beneficios; ?>
      </li>
    <?php endif; ?>
    </ul>
  </div>
</div>


<?php

// Build map
if($coords){
  ?>

  <div class="map_wrapper container">
    <div id="theMap" class="map_wrapper__embed" data-coords="<?php echo $coords; ?>" data-dir="<?php echo $address; ?>"></div>
  </div>

  <?php
} ?>
<?php

// Build map2
if($coords2){
  ?>

  <div class="map_wrapper container">
    <h2>UBICAICÓN 2</h2>
    <div id="theMap2" class="map_wrapper__embed" data-coords="<?php echo $coords2; ?>" data-dir="<?php echo $address2; ?>"></div>
  </div>

  <?php
} ?>
<div class="social">
  <div>
    <?php foreach($redes as $r){ ?>
      <div class="social-item"><a href="<?php echo $r['link']; ?>" target="_blank" class="<?php echo $r['nombre_red']; ?>" aria-hidden="true"></a></div>
    <?php } ?>
 </div>
</div>
<?php
if(!empty($relacionados)>0){ ?>
<div class="w-1000 relacionados">
  <h2 class="tit antialias">PROYECTOS <br> RELACIONADOS</h2>
  <ul class="list_proyectos reset_list">
    <?php
  foreach($relacionados as $r){
      $ciudad = get_field('ciudad', $r);
      $barrio = get_field('zona_o_barrio', $r);
      $tipo = get_field('tipo_inmueble', $r);
  ?>
    <li>
      <a href="<?php echo get_permalink($r); ?>" >
        <img src="<?php echo get_field('imagen_principal', $r); ?>" class="img_listado">
        <img src="<?php echo get_field('logo_proyecto', $r); ?>" class="pos_logo">
        <h3 class="antialias"><span><?php echo get_the_title($r).'<br>'.$ciudad->post_title.' / '.$barrio->post_title.' <br>'.$tipo[0]; ?></span></h3>
      </a>
    </li>
    <?php } ?>
  </ul>
</div>
<?php }
}

//LANDING
if($post_type ==  "landing"){

$id_proyecto = get_field('proyecto', $id);
$ciudad = get_field('ciudad',$id_proyecto[0]);
$barrio = get_field('zona_o_barrio',$id_proyecto[0]);
?>
<div class="w-1000">
  <div class="landing">
    <div>
      <div class="text">
        <div class="tabla">
          <div class="celda">
          <h2 class="antialias"><?php echo get_field('slogan', $id_proyecto[0]).'<br><br>'.$ciudad->post_title.' / '.$barrio->post_title; ?></h2>
          <a href="<?php echo get_permalink($id_proyecto[0]); ?>" class="btn">Conoce más</a>
          </div>
        </div>
      </div>
      <img src="<?php echo get_field('logo_proyecto',$id_proyecto[0]); ?>" class="logo_landing">
      <img src="<?php echo get_field('imagen_principal',$id_proyecto[0]); ?>" class="bg">
    </div>
  </div>
</div>

<?php } //Landing ?>

</section>
<?php get_footer();?>
</div>
