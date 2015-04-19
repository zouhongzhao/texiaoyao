<?php
/**
 * DDEditor Class File
 * 
 * @author Joachim Werner <joachim.werner@diggin-data.de>
 * @link http://www.diggin-data.de
 */

/**
 * DDEditor creates a textarea editor for Markdown syntax
 * The editor has some buttons to replace selected text in a textarea
 * with common Mardown syntax
 *
 * @author  Joachim Werner <joachim.werner@diggin-data.de>
 * @version 0.1
 */
class DDEditor extends CWidget
{
    // {{{ Members
    /**
     * model - The model upon which the activeTextarea control is based on
     * 
     * @var mixed
     * @access public
     */
    public $model;
    /**
     * The attribute name for which the activeTextarea control shall be created
     * @var mixed
     * @access public
     */
    public $attribute;
    public $name;
    public $value;
    /**
     * Array of additional HTML options for the textarea control
     * 
     * @var array
     * @access public
     */
    public $htmlOptions=array();

    public $additionalSnippets = array();
    
    /**
     * Request which returns via AJAX the rendered preview for the Markdown text 
     * 
     * @var mixed
     * @access public
     */
    public $previewRequest;
    public $hidePreviewButton = false;
    /**
     * The ID of the activeTextarea  
     * 
     * @var mixed
     * @access private
     */
    private $editorId;
    // }}} 
    // {{{ run
    /**
     * Runs the widget 
     * 
     * @access public
     * @return void
     */
    public function run()
    {
        $this->registerClientScripts();
        echo $this->createMarkup();
    } // }}} 
    // {{{ createMarkup
    /**
     * Creates the widget's markup 
     * 
     * @access public
     * @return void
     */
    public function createMarkup()
    {
        if(!isset($this->htmlOptions['rows'])) {
            $attribute = $this->attribute;
            $text = $this->model->$attribute;
            if (strpos($text, "\n") === FALSE) {
                //MAC?!
                $text = str_replace( "\r", "\n", $text );
            } else {
                //Windows has \r\n
                $text = str_replace( "\r", '', $text );
            }
            $this->htmlOptions['rows'] = count(explode("\n", $text))+2;
        }
        if(!isset($this->htmlOptions['cssClass'])) {
            $this->htmlOptions['cssClass'] = "expand200-600";
        } else {
            $this->htmlOptions['cssClass'] .= " expand200-200";
        }
        $this->htmlOptions['class'] = $this->htmlOptions['cssClass'];
        unset($this->htmlOptions['cssClass']);
        if(!is_null($this->model) and !is_null($this->attribute)) {
            $this->render(
                'editor',
                array(
                    'model'=>$this->model,
                    'attribute'=>$this->attribute,
                    'htmlOptions'=>$this->htmlOptions,
                    'editorId' => $this->editorId,
                    'hidePreviewButton'=>$this->hidePreviewButton,
                    'additionalSnippets'=>$this->additionalSnippets,
                )
            );
        } else {
            $this->render(
                'editor',
                array(
                    'name'=>$this->name,
                    'value'=>$this->value,
                    'htmlOptions'=>$this->htmlOptions,
                    'editorId' => $this->editorId,
                    'hidePreviewButton'=>$this->hidePreviewButton,
                )
            );
        }
    } // }}} 
    // {{{ registerClientScripts
    /**
     * Registers the clientside widget files (css & js)
     */
    private function registerClientScripts() {
        // Get the resources path
        $resources = dirname(__FILE__).'/resources';

        $cs = Yii::app()->clientScript;
        // publish the files
        $baseUrl = Yii::app()->assetManager->publish($resources);

        // register the files

        // Stylesheet
        if(is_file($resources.'/styles.css')) {
            $cs->registerCssFile($baseUrl.'/styles.css');
        }
        if(is_file($resources.'/editor.js')) {
            $cs->registerScriptFile($baseUrl.'/editor.js');
        }
        if(is_file($resources.'/jquery.textarea-expander.js')) {
            $cs->registerScriptFile($baseUrl.'/jquery.textarea-expander.js');
        }
        if(is_file($resources.'/editor.js')) {
            $cs->registerScriptFile($baseUrl.'/editor.js');
        }
        if($this->model==null)
            $this->htmlOptions['name'] = $this->name;
        self::resolveNameID($this->model,$this->attribute,$this->htmlOptions);
        $this->editorId = $this->htmlOptions['id'];
        $c=1;
        // Create preview request URL
        $url = Yii::app()->urlManager->createUrl($this->previewRequest,array('attribute'=>$this->attribute));

        $scriptId = uniqid('ed_').'_';
        // Bold
        $cs->registerScript($scriptId.$c++,"jQuery('#".$this->editorId."-editor-bold').click(function(){insertTags('".$this->editorId."','**','**','bold ')});");
        // Italic
        $cs->registerScript($scriptId.$c++,"jQuery('#".$this->editorId."-editor-italic').click(function(){insertTags('".$this->editorId."','_','_','italic ')});");
        // Headings
        $cs->registerScript($scriptId.$c++,"jQuery('#".$this->editorId."-editor-h').change(function(){insertTags('".$this->editorId."',padText('#',this.value)+' ',' '+padText('#',this.value),'Heading '+this.value)});");
        $cs->registerScript($scriptId.$c++,"jQuery('.".$this->editorId."-editor-h').click(function(){var value=this.innerHTML.substr(1,1);insertTags('".$this->editorId."',padText('#',value)+' ',' '+padText('#',value),'Heading '+value)});");
        // Link
        $cs->registerScript($scriptId.$c++,"jQuery('#".$this->editorId."-editor-link').click(function(){insertTags('".$this->editorId."','[','](http://...)','Link Description')});");
        // Image
        $cs->registerScript($scriptId.$c++,"jQuery('#".$this->editorId."-editor-img').click(function(){insertTags('".$this->editorId."','![Alt Text](',' \"Title\")','Image URL')});");
        // List Item
        $cs->registerScript($scriptId.$c++,"jQuery('#".$this->editorId."-editor-li').click(function(){insertTags('".$this->editorId."','* ','','List Item ')});");
        // HR
        $cs->registerScript($scriptId.$c++,"jQuery('#".$this->editorId."-editor-hr').click(function(){insertTags('".$this->editorId."','****bslashN','','')});");
        // Table
        $cs->registerScript($scriptId.$c++,"jQuery('#".$this->editorId."-editor-table').click(function(){insertTags('".$this->editorId."','| Header | Header |bslashN| ------ | ------ | bslashN|  ','  |  Cell  |bslashN','Cell')});");
        // Code
        $cs->registerScript($scriptId.$c++,"jQuery('#".$this->editorId."-editor-code').click(function(){insertTags('".$this->editorId."','`','`','sample code')});");
        // Code2
        $cs->registerScript($scriptId.$c++,"jQuery('#".$this->editorId."-editor-code2').click(function(){if(this.value=='') return;insertTags('".$this->editorId."','~~~~bslashN['+this.value+']bslashN','bslashN~~~~bslashN','// Sample Ccode')});");
        $cs->registerScript($scriptId.$c++,"jQuery('.".$this->editorId."-editor-code2').click(function(){var value=this.innerHTML;if(value=='') return;insertTags('".$this->editorId."','~~~~bslashN['+value+']bslashN','bslashN~~~~bslashN','Sample Code')});");
        // Add Lines
        $cs->registerScript($scriptId.$c++,"jQuery('#".$this->editorId."-editor-addlines').click(function(){jQuery('#".$this->editorId."').attr('rows',jQuery('#".$this->editorId."').attr('rows')+2);});");
        // Remove Lines
        $cs->registerScript($scriptId.$c++,"jQuery('#".$this->editorId."-editor-remlines').click(function(){jQuery('#".$this->editorId."').attr('rows',jQuery('#".$this->editorId."').attr('rows')-2);});");
        // Preview
        $cs->registerScript($scriptId.$c++,"jQuery('#".$this->editorId."-editor-preview').click(function(){jQuery('#".$this->editorId."').toggle();jQuery('#".$this->editorId."-preview').toggle();jQuery.ajax({type:'POST',url: '".$url."',data: jQuery(':parent form').serialize(),success:function(data){jQuery('#".$this->editorId."-preview').html(data);}});});");
        // Additional Snippets
        if(sizeof($this->additionalSnippets)>0) {
            $n=0;
            foreach($this->additionalSnippets as $name=>$additionalSnippet) {
                $cs->registerScript($scriptId.$c++,"jQuery('.".$this->editorId."-editor-addS-".$n."').click(function(){insertTags('".$this->editorId."','','',jQuery(this).attr('data-value'));});");
                $n++;
            }
        }
    } // }}}
    // {{{ resolveNameID
    /**
     * Generates input name and ID for a model attribute.
     * This method will update the HTML options by setting appropriate 'name' and 'id' attributes.
     * This method may also modify the attribute name if the name
     * contains square brackets (mainly used in tabular input).
     * @param CModel the data model
     * @param string the attribute
     * @param array the HTML options
     */
    public static function resolveNameID($model,&$attribute,&$htmlOptions)
    {
            if(!isset($htmlOptions['name']))
                    $htmlOptions['name']=self::resolveName($model,$attribute);
            if(!isset($htmlOptions['id']))
                    $htmlOptions['id']=self::getIdByName($htmlOptions['name']);
            else if($htmlOptions['id']===false)
                    unset($htmlOptions['id']);
            Yii::log("DDEditor/name: {$htmlOptions['name']}, id: {$htmlOptions['id']}");
    } // }}} 
    // {{{ getIdByName
    /**
     * Generates a valid HTML ID based the name.
     * @return string the ID generated based on name.
     */
    public static function getIdByName($name)
    {
            return str_replace(array('[]', '][', '[', ']'), array('', '_', '_', ''), $name);
    } // }}} 
    // {{{ resolveName
    /**
     * Generates input name for a model attribute.
     * Note, the attribute name may be modified after calling this method if the name
     * contains square brackets (mainly used in tabular input) before the real attribute name.
     * @param CModel the data model
     * @param string the attribute
     * @return string the input name
     * @since 1.0.2
     */
    public static function resolveName($model,&$attribute)
    {
            if(($pos=strpos($attribute,'['))!==false)
            {
                    if($pos!==0)  // e.g. name[a][b]
                            return get_class($model).'['.substr($attribute,0,$pos).']'.substr($attribute,$pos);
                    if(($pos=strrpos($attribute,']'))!==false && $pos!==strlen($attribute)-1)  // e.g. [a][b]name
                    {
                            $sub=substr($attribute,0,$pos+1);
                            $attribute=substr($attribute,$pos+1);
                            return get_class($model).$sub.'['.$attribute.']';
                    }
                    if(preg_match('/\](\w+\[.*)$/',$attribute,$matches))
                    {
                            $name=get_class($model).'['.str_replace(']','][',trim(strtr($attribute,array(']['=>']','['=>']')),']')).']';
                            $attribute=$matches[1];
                            return $name;
                    }
            }
            else
                    return get_class($model).'['.$attribute.']';
    } // }}} 
}

/* vim: set ai sw=4 sts=4 et fdm=marker fdc=4: */ 
