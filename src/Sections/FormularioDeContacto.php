<?php
namespace jorgelsaud\ZonaproCorpTheme\Sections;
class FormularioDeContacto{
	private $mensajeSuperior;
	private $titulo;
	public function __construct($titulo,$mensajeSuperior)
	{
		$this->mensajeSuperior = $mensajeSuperior;
		$this->titulo=$titulo;
	}
	public function show(){
		ob_start() ?>

		<div class="Formulario">
			<div class="Formulario__Titulo">
				<?= $this->titulo?>
			</div>
			<div class="Formulario__Texto">
				<?= $this->mensajeSuperior?>
			</div>
			<form action="" id="FormularioDeContacto">
				<div class="Formulario__Flex_form">
					<div class="Formulario__flexForm_1">
						<div class="form-group">
							<label class="sr-only" for="nombre">Nombre</label>
							<input type="text" class="form-control" id="nombre" name="nombre" placeholder="* Nombre">
						</div>
						<div class="form-group">
							<label class="sr-only" for="telefono">Telefono</label>
							<input type="text" class="form-control" id="telefono" name="telefono" placeholder="* Telefono">
						</div>
						<div class="form-group">
							<label class="sr-only" for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="* Email">
						</div>
					</div>
					<div class="Formulario__flexForm_1">
						<div class="form-group">
							<label class="sr-only" for="email">Mensaje</label>
							<textarea rows="9" class="form-control" placeholder="* Mensaje" name="mensaje"></textarea>
						</div>
					</div>
				</div>
				<div class="pull-right">
					<div class="g-recaptcha pull-left" data-sitekey="6LdB6h4TAAAAAB-INBpeYr6jUwnK7i_Rc3VHg5kI"></div>
					<button  type="submit" class="EnviarEmail Noticia__botonLeerMas btn btn-noticia">Enviar</button>
				</div>
			</form>
		</div>
<?php $content=ob_get_clean();
echo $content;

	}

}
