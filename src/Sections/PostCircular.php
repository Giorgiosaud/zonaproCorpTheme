<?php 
namespace jorgelsaud\ZonaproCorpTheme\Sections;
use jorgelsaud\ZonaproCorpTheme\CustomPosts;
class PostCircular{
	protected $titulo;
	protected $subtitulo;
	protected $tipoDePost;
	protected $cantiad;
	private $orderBy;
	public function __construct($titulo,$subtitulo,$tipoDePost,$cantiad,$length='informacion_corporativa_length',$orderBy){
		$this->titulo = $titulo;
		$this->subtitulo = $subtitulo;
		$this->tipoDePost = $tipoDePost;
		$this->cantiad = $cantiad;
		$this->orderBy=$orderBy;
		$rand=null;
		if($this->orderBy==true){
		$rand='rand';
		}
		
		$this->posts=CustomPosts::getPosts($this->tipoDePost,$this->cantiad,$length,null,$rand);
	}
	public function show(){
		ob_start()?>
		<div class="PostCirculares">
			<div class="PostCirculares__Titulo">
				<?= $this->titulo ?>
			</div>
			<div class="PostCirculares__Subtitulo">
				<?= $this->subtitulo ?>
			</div>
			<div class="PostCirculares__Items">
				<?php foreach($this->posts as $post):?>
				<div class="PostCircular__Item">
					<div class="PostCircular__Item__Imagen">
						<img src="<?= $post['imagen_circular']?>" alt="Imagen Circular">
					</div>
					<div class="PostCircular__Item__Titulo">
						<?=$post['title']?>
					</div>

					<div class="PostCircular__Item__Resumen">
						<?=$post['resumen']?>
					</div>
						<a href="<?=$post['link']?>" class="btn PostCircular__Item__Boton btn-default"><?php _e('Ver Mas','zonaprocorptheme')?></a>	
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
