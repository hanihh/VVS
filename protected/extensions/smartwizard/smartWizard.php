<?php
/**
 * smartWizard class file.
 *
 * @author Elijah  G <emwangi.g@gmail.com>
 * @link http://www.esofts.co.ke/
 * @copyright Copyright &copy; 2014-2015 Rodrigo Elijah  G
 * @license http://giix.org/license/ New BSD License
 */

/**
 * GxHtml extends CHtml and provides additional features.
 *
 * @author Rodrigo Coelho <rodrigo@giix.org>
 */
class smartWizard extends CWidget {
  public  $selected=0,  // Selected Step, 0 = first step   
          $keyNavigation=true, // Enable/Disable key navigation(left and right keys are used if enabled)
          $enableAllSteps= false,
          $updateHeight= true,
          $transitionEffect= 'fade', // Effect on navigation, none/fade/slide/slideleft
          $contentURL=null, // content url, Enables Ajax content loading
          $contentCache=true, // cache step contents, if false content is fetched always from ajax url
          $cycleSteps= false, // cycle step navigation
          $includeFinishButton= true, // whether to show a Finish button
          $enableFinishButton =false, // make finish button enabled always          
          $labelNext='Next',
          $labelPrevious='Previous',
          $labelFinish='Finish',          
          $onLeaveStep= null, // triggers when leaving a step
          $onShowStep= null,  // triggers when showing a step
          $onFinish= null ; // triggers when Finish button is clicked

	public $selector='#wizard';
	public $tabs;
	public $styles;



	
    /**
     * Publishes the required assets
     */
    public function init() {
    	 parent::init();
		$this -> publishAssets();
		
    }
    
    public function run() {

     $tabsHeader='<li><a href="#step-{stepNumber}">
                <span class="stepNumber">{stepNumber}</span>
                <span class="stepDesc">
                   {StepTitle}<br />
                   <small>{stepDetails}</small>
                </span>
            </a></li>';
    $contentPane='<div id="step-{stepNumber}"><h2 class="StepTitle">Step {stepNumber}: {StepTitle}</h2>{content}</div>';
            $tabs=$mainContent="";
            $counter=1;
            if(is_array($this->tabs)){
	            foreach ($this->tabs as $key => $tabContents) {
	            	$tabs.=strtr($tabsHeader,array(
	            		"{stepNumber}"=>$counter,
	            		"{StepTitle}"=>$tabContents['StepTitle'],
	            		"{stepDetails}"=>$tabContents['stepDetails'],
	            		));
	            	$mainContent.=strtr($contentPane,array(
	            		"{stepNumber}"=>$counter,
	            		"{StepTitle}"=>$tabContents['StepTitle'],
	            		"{content}"=>$tabContents['content']
	            		));
	            	$counter++;
	            }
           }
            ?>
            <style type="text/css">
             <?php
             echo file_get_contents($this->styles);
             ?>
            </style>
            
			<!-- Tabs -->
			  		<div id="<?=strtr($this->selector,array("#"=>''))?>" class="swMain row-fluid">
			  			<ul>
			  			<?php echo $tabs;?>
			  			</ul>
			  			<?php echo $mainContent;?>
			  		</div>
			 <!-- End SmartWizard Content --> 	
	
		


            <?php
    }

    /**
     * Publises and registers the required CSS and Javascript
     * @throws CHttpException if the assets folder was not found
     */

    public function publishAssets() {
        $assets = dirname(__FILE__) . '/assets';
        $baseUrl = Yii::app() ->assetManager -> publish($assets);
        if (is_dir($assets)) {
            //the css to use
            $this->styles=$assets. '/styles/smart_wizard_vertical.css';
				//Yii::app() ->clientScript -> registerCssFile($baseUrl . '/styles/smart_wizard.css', CClientScript::POS_HEAD);	
			    Yii::app() ->getClientScript() -> registerScriptFile($baseUrl . "/js/jquery.smartWizard-2.0.js", CClientScript::POS_END);
				/*Yii::app() ->getClientScript() -> registerScript('initSmartwizard','
			 $(document).ready(function(){
				$("'.$this->selector.'").smartWizard({ 
				 	  selected: '. $this->selected .',
			          keyNavigation: '. strbool($this->keyNavigation) .',
			          enableAllSteps: '. strbool($this->enableAllSteps) .',
			          updateHeight:'. strbool($this->updateHeight) .',
			          transitionEffect:\''.$this->transitionEffect.'\',
			          contentURL:\''.$this->contentURL.'\', 
			          contentCache:'. strbool($this->contentCache) .',
			          cycleSteps:'. strbool($this->cycleSteps) .', 
			          includeFinishButton: '. strbool($this->includeFinishButton) .', 
			          enableFinishButton: '. strbool($this->enableFinishButton) .',         
			          labelNext:\''.$this->labelNext.'\',
			          labelPrevious:\''.$this->labelPrevious.'\',
			          onShowStep:'. strNull($this->onShowStep) .',
					  //onLeaveStep:'. strNull($this->onLeaveStep) .',
			          onFinish:'. strNull($this->onFinish) .'
	
				 });
			
		
		
				
			});', CClientScript::POS_END);*/
        } else {
            throw new CHttpException(500, __CLASS__ . ' - Error: Couldn\'t find assets to publish.');
        }
    }

}
function strbool($value)
{
    return $value ? 'true' : 'false';
}
function strNull($value)
{
    return is_null($value) ? 'null' : $value;
}