<?php 	
	
	$nombreMenu = "Login";
	//$linkMenu = "javascript:loadContent('#content2','".base_url()."seguridad/login');";
	$linkMenu = base_url()."seguridad/login";
	$currentLogin = ($pantalla == "login")?'current':'';
	$opcionMenu = '<li class="'.$currentLogin.'"><a href="'.$linkMenu.'">'.$nombreMenu.'</a></li>"';
	
	if($usuarioAutenticado != null){
		$opcionMenu = '<li><a href="#">'.$usuarioAutenticado->getUsuario().'</a>
			<ul>';
		foreach ($usuarioAutenticado->getPerfiles() as $posicion => $perfil){
			$opcionMenu .='<li><a href="'.base_url().'seguridad/cambiarPerfil/'.$posicion.'"> '.$perfil->getDescripcion().'</a></li>';
		}
		$opcionMenu .= '<li ><a href="'.base_url().'seguridad/logout">Salir</a></li>
			</ul>
		</li>"';
	}
?>
<!-- Menu Horizontal -->
<ul class="menu">
	<li><a href="javascript:void(0);" id="btnnAtras"><span class="icon" data-icon=":" title="Atras"></span></a></li>
	<li><a href="javascript:void(0);" id="btnnAdelante"><span class="icon" data-icon=";" title="Adelante"></span></a></li>
	<li><a href="javascript:void(0);" id="btnnActualizar"><span class="icon" data-icon="&nbsp;" title="Actualizar"></span></a></li>	
	<li class="<?php echo ($pantalla == "inicio")?'current':'';?>"><a href="javascript:loadContent('#content2','<?php echo base_url();?>')"><span class="icon" data-icon="I"></span>Inicio</a></li>	
	<?php	$controladorPantalla = new TipoPantalla(); 
		if($usuarioAutenticado != null):?>
		<?php  $tipoPantallas = $controladorPantalla->obtenerTodos(); 
		foreach($tipoPantallas as $tipoPantalla):
			if($tipoPantalla->getEstado()->getId() != ID_ESTADOINACTIVO ):?>
				
					
					<?php $contador=0;
						$menusConPermiso = array(); 
						foreach($usuarioAutenticado->getPerfil()->getPermisos() as $permiso){
							if($permiso->getPantalla()->getTipoPantalla()->getId()==$tipoPantalla->getId() && $permiso->getLectura() == TRUE && $permiso->getPantalla()->getEstado()->getId() != ID_ESTADOINACTIVO){
								$contador++;
								array_push($menusConPermiso, $permiso);
							}							
						}	
					
					if($contador > 0):?>
					<li class="<?php echo ($pantalla == $tipoPantalla->getControlador())?'current':'';?>"><a href="javascript:loadContent('#content2','<?php echo base_url().$tipoPantalla->getControlador();?>');"><span class="icon" data-icon="<?php echo $tipoPantalla->getIcono();?>"></span><?php echo $tipoPantalla->getNombre();?></a>
						<ul>						
							<?php foreach ($menusConPermiso as $permiso):?>
								<li class="<?php echo ($pantalla == $permiso->getPantalla()->getNombreLogico())?'current':'';?>"><a href="javascript:loadContent('#content2','<?php echo base_url().$permiso->getPantalla()->getNombreLogico();?>');"><?php echo  $permiso->getPantalla()->getNombreFisico();?></a>
							<?php endforeach;?>						
						</ul>	
					</li>
					<?php endif;?>		
				
		<?php endif; 
		endforeach;?>
	<?php endif;?>
	<!-- <li><a href=""><span class="icon" data-icon="U"></span>Organizaciones</a></li>
		<li><a href=""><span class="icon" data-icon="9"></span><?php //echo utf8_encode("Comunicación"); ?></a></li>
		<li><a href=""><span class="icon" data-icon="Y"></span>Agencias</a></li>
		<li><a href=""><span class="icon" data-icon="w"></span><?php // utf8_encode("Educación"); ?></a></li>
		<li><a href=""><span class="icon" data-icon="u"></span>Personal</a></li>
		<li><a href=""><span class="icon" data-icon="G"></span><?php //echo utf8_encode("Configuración"); ?></a></li>
	 -->
	<?php echo $opcionMenu;?>					
</ul>

<div id="content">
	<!-- <form id="frmInformacion" name="frmInformacion" action="#" method="post"> -->
		<div id="content2">
            
 