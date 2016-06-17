<?php 
namespace jorgelsaud\ZonaproCorpTheme\Sections;
class Html{
	private $content;
	public function __construct($content)
	{
		$this->content=$content;
	}
	public function show(){
		$output="<div class='Section'>";
		$output.=do_shortcode($this->content);
		$output.="</div>";
		echo $output;
		return true;
	}
}
?>
