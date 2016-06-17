<?php 
namespace jorgelsaud\ZonaproCorpTheme\Sections;
class ImagenFW{
	private $imagen;
	private $titulo;
	public function __construct($imagen,$titulo=null)
	{
		$this->imagen=$imagen;
		$this->titulo=$titulo;
	}
	public function show(){
		ob_start()?>
		<div class='ImagenAnchoCompleto'>
			<img src="<?= $this->imagen ?>" alt='Imagen Full Ancho' class='img-responsive ImagenAnchoCompleto__imagen'/>
			<div class="ImagenAnchoCompleto__titulo">
				<p><?= $this->titulo?></p>
			</div>
		</div>
<?php
			echo ob_get_clean();
		return true;
	}
}
?>
