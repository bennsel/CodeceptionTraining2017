<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Codeception\TestInterface;
use Codeception\Util\Locator;

class Acceptance extends \Codeception\Module
{
    /**
     * mapping
     *
     * @var array
     */
    protected $mapping = [];

    public function _before(TestInterface $test)
    {
        parent::_before($test);

        $this->setMapping([
            "jersey designer" => "#jerseyform",
            "jersey preview" => ".c-jersey-designer-preview-jersey",
            "tab home" => Locator::contains(".c-jersey-designer-tabs__item","HOME"),
            "tab away" => Locator::contains(".c-jersey-designer-tabs__item","AWAY"),
            "tab event" => Locator::contains(".c-jersey-designer-tabs__item","EVENT"),
            "tab torwart" => Locator::contains(".c-jersey-designer-tabs__item","Torwart"),
            "home jersey picture" => ".c-jersey-designer-preview-jersey__image[src*=home]",
            "away jersey picture" => ".c-jersey-designer-preview-jersey__image[src*=away]",
            "flock option" => "#flockingtext_designer",
            "number" => "#flock-individual-number_designer",
            "name" => "#flock-individual-text_designer",
            "size option" => "#size_designer",
            "logo option" => "#logo_designer",
            "number 0" => ".c-jersey-designer-number--0",
            "IN MEINEN WARENKORB" => "#jd_add_button",
            "main area" => ".o-page-wrap",
            "Absenden" => '#neusta_clubportal_contactbundle_form_type_contact_save',
            "error message" => '.c-alert',
        ]);
    }


    public function setMapping(array $mapping)
    {
        $this->mapping = array_merge($this->mapping, $mapping);
    }

    public function getMapping()
    {
        return $this->mapping;
    }

    /**
     * getMappedVariable
     *
     * @param $var
     * @return mixed
     */
    public function getMappedVariable($var)
    {
        return $this->mapping[$var] ?? $var;
    }
}
