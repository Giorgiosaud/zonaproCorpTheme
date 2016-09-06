<?php 
namespace jorgelsaud\ZonaproCorpTheme\Sections;
use jorgelsaud\ZonaproCorpTheme\CustomPosts;
class PostConFondo{
	protected $titulo;
	protected $tipoDePost;
	protected $cantiad;
	protected $colorDeFondo;
	protected $imagen;
	private $tiene_link;
	private $link;
	public function __construct($titulo,$tipoDePost,$cantiad,$colorDeFondo,$imagen,$length='informacion_corporativa_length')
	{
		$this->titulo = $titulo;
		$this->tipoDePost = $tipoDePost;
		$this->cantiad = $cantiad;
		$this->posts=CustomPosts::getPosts($this->tipoDePost,$this->cantiad,$length);
		$this->colorDeFondo = $colorDeFondo;
		$this->imagen = $imagen;
	}
	public function show(){
		ob_start()?>
		<div class="PostConFondo" style="background:linear-gradient(
			<?= hex2rgba($this->colorDeFondo,.8)?>,
			<?= hex2rgba($this->colorDeFondo,.7)?>),
		url(<?=$this->imagen?>);background-size:cover;">
		<div class="PostConFondo__Titulo">
			<?= $this->titulo ?>
		</div>
		<div class="PostConFondo__Items">
			<?php foreach($this->posts as $post):?>

			<div class="PostConFondo__Item">

				<div class="PostConFondo__Item__Imagen">
				<?php if($post['tiene_link']):?>
				<a href="<?= $post['link']?>" target="_blank">
				<?php endif?>
					<img src="<?= $post['imagen_circular']?>" alt="Imagen ConFondo">
					<?php if($post['tiene_link']):?>
			</a>
		<?php endif?>
				</div>
				<div class="PostConFondo__Item__Resumen">
					<?=apply_filters('the_title',$post['resumen'])?>
				</div>
				
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
