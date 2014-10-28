use Framework;

class DefaultController extends \Framework\BaseController 
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function defaultAction() 
    {

        // Put your code here

        // Render defaultAction example
        $this->_render(
             'Default.twig',
             array(
                 'param1'       => 'Value of 1',
                 'param2' => 'Value of 2',
                 'paramN'   => 'Value of N..'
             )
        );
    }
}
