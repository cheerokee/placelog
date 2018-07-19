<?php
namespace Base\View\Helper;

use InvalidArgumentException;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Helper\AbstractHelper;
use Doctrine\Common\Collections\Collection;


final class TemplatedCollection extends AbstractHelper
{
    /**
     * Where shall the template-data be inserted into
     *
     * @var string
     */
    protected $templateWrapper = '<span data-template="%s"></span>';

    /**
     * Invoke helper as function
     *
     * Proxies to {@link render()}.
     *
     * @param  Collection|null $element
     * @param  string   $templatePartial
     * @param  array    $params
     *
     * @return string|FormCollection
     */
    public function __invoke(Collection $collection, $templatePartial, $params = array())
    {
        if (!$templatePartial) {
            throw new InvalidArgumentException('$templatePartial cannot be null');
        }

        return $this->render($collection, $templatePartial, $params);
    }

    /**
     * Render a collection by iterating through all fieldsets and elements
     *
     * @param  Collection $element
     * @param  string $templatePartial Required Template Path for manual rendering of template elements
     * @param array $params
     * 
     * @return string
     */
    public function render(Collection $collection, $templatePartial, $params = array())
    {
        if (!$templatePartial) {
            throw new InvalidArgumentException('$templatePartial cannot be null');
        }
        
        $markup         = '';
        $templateMarkup = '';
        $partialHelper  = $this->getPartialHelper();
        
        if ($collection instanceof Collection) {
            foreach ($collection->getIterator() as $entity) {
                $markup .= $partialHelper($templatePartial, [
                    'collection' => $entity,
                    'params' => $params,
                ]);
            }
        } else {
            $markup .= $partialHelper($templatePartial, [
                'collection' => $collection,
                'params' => $params,
            ]);
        }

        return $templateMarkup . $markup;
    }

    /**
     * Only render a template
     *
     * @param  Collection $collection
     * @param  string     $templatePartial
     *
     * @return string
     */
    public function renderTemplate(Collection $collection, $templatePartial)
    {
        $partialHelper          = $this->getPartialHelper();

        $templateMarkup = $partialHelper($templatePartial, [
            'collection' => $collection
        ]);

        return sprintf($this->templateWrapper,$templateMarkup);
    }

    /**
     * @return \Zend\View\Helper\Partial
     */
    private function getPartialHelper()
    {
        /** @var PhpRenderer $renderer */
        $renderer = $this->getView();

        return $renderer->plugin('partial');
    }
}