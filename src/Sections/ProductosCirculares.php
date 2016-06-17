<?php 
namespace jorgelsaud\ZonaproCorpTheme\Sections;
use jorgelsaud\ZonaproCorpTheme\CustomPosts;
class ProductosCirculares{
	public $titulo;
	public $subtitulo;
	public $tax;
	public function __construct($titulo,$subtitulo,$tax)
	{
		$this->titulo = $titulo;
		$this->subtitulo = $subtitulo;
		$this->tax = $tax;
//		$this->posts=CustomPosts::getPosts($this->tax,$this->cantiad);
	}
	public function show(){
		ob_start()?>
		<div class="ProductoCirculares">
			<div class="ProductoCirculares__Titulo">
				<?= $this->titulo ?>
			</div>
			<div class="ProductoCirculares__Subtitulo">
				<?= $this->subtitulo ?>
			</div>
			<div class="ProductoCirculares__Items">
				<?php foreach($this->tax as $term):?>
				<div class="ProductoCircular__Item">
					<div class="ProductoCircular__Item__Imagen">
						<img src="<?php the_field('imagen','tipo_de_producto_'.$term->term_id)?>
" alt="Imagen Circular">
					</div>
					<div class="ProductoCircular__Item__Titulo">
						<?= $term->name?>
					</div>

					<div class="ProductoCircular__Item__Resumen">
						<?= $term->description; ?>
					</div>

					<a href="<?= get_term_link($term)?>" class="btn ProductoCircular__Item__Boton btn-default"><?php _e('Ver Mas','zonaprocorptheme')?></a>	
				</div>
				<?php endforeach?>
			</div>
		</div>
		<?php
		echo ob_get_clean();
		return true;
	}
}
?>
