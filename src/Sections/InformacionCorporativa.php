<?php 
namespace jorgelsaud\ZonaproCorpTheme\Sections;
use jorgelsaud\ZonaproCorpTheme\CustomPosts;
class InformacionCorporativa extends CustomPosts{
	private $id;

	private $length;
	public function __construct($cantidad,$superpuesta,$color_fondo,$color_texto,$length='informacion_corporativa_length')
	{
		$this->length=$length;
		$this->posts=CustomPosts::getPosts('infoCorporativa',$cantidad,$length);
		$this->superpuesta=$superpuesta;
		$this->color_fondo=$color_fondo;
		$this->color_texto=$color_texto;
		$this->qty=count($this->posts);
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
		echo ob_get_clean();
		return true;
	}
}
?>
