<?php 
namespace jorgelsaud\ZonaproCorpTheme\Sections;
use jorgelsaud\ZonaproCorpTheme\CustomPosts;
class InformacionCorporativa extends CustomPosts{

	public function __construct()
	{
		$this->length=get_sub_field('length_function') ? get_sub_field('length_function'):'informacion_corporativa_length';
		$this->posts=CustomPosts::getPosts('infoCorporativa',get_sub_field('cantidad'),$this->length,'ASC','menu_order');
		$this->superpuesta=get_sub_field('superpuesta');
		$this->color_fondo=get_sub_field('color_fondo');
		$this->color_texto=get_sub_field('color_texto');
		$this->qty=count($this->posts);
		echo $this->show();
	}
	public function show(){
		ob_start()?>
		<div class="container informacionesCorporativas <?php if($this->superpuesta) echo 'informacionesCorporativas--superpuestas'?>">
			<?php foreach ($this->posts as $post) { ?>
			<div class="InformacionCorporativa" style="background:<?= $this->color_fondo?>;color:<?= $this->color_texto?>" >
				<div class="InformacionCorporativa__Titulo">
					<?= $post['title']?>
				</div>
				<div class="InformacionCorporativa__Resumen">
					<?= $post['excerpt']?>
				</div>
			</div>
			<?php	} ?>		
		</div>
		<?php
		return ob_get_clean();
	}
}
?>
