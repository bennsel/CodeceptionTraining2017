<?php

use Codeception\Util\ActionSequence;
use Codeception\Util\Locator;


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * init function should be called at the beginning
     *
     * @internal
     * @return void
     */
    public function init()
    {
        $this->setMapping([]);
    }

    /**
     * @Given am on web page
     */
    public function amOnWebPage()
    {
        $this->init();
        $this->amOnUrl($this->portalUrl);
        $this->executeJS('jQuery(".js-slide-in").remove()');
    }


    /**
     * @Given am on shop page
     */
    public function amOnShopPage()
    {
        $this->init();
        $this->amOnUrl($this->shopUrl);
    }

    /**
     * @Then I see text :arg1
     */
    public function iSeeText($arg1)
    {
        $this->see($arg1);
    }

    /**
     * @Then I count :arg1 elements :arg2
     */
    public function iCountElements($arg1, $arg2)
    {
        $this->seeNumberOfElements($arg2, $arg1);
    }

    /**
     * @Then I see element :arg1
     */
    public function iSeeElement($arg1)
    {
        $this->seeElement($this->getMappedVariable($arg1));
    }

    /**
     * @Then I see in :arg1 element :arg2
     */
    public function iSeeInElement($arg1, $arg2)
    {
        $this->performOn($this->getMappedVariable($arg1), ActionSequence::build()->seeElement($this->getMappedVariable($arg2)));
    }

    /**
     * @Then I see in :arg1 text :arg2
     */
    public function iSeeInText($arg1, $arg2)
    {
        $this->performOn($this->getMappedVariable($arg1), ActionSequence::build()->see($arg2));
    }

    /**
     * @Then I see link :arg1 is active
     */
    public function iSeeLinkIsActive($arg1)
    {
        $this->seeElement(Locator::contains('.c-jersey-designer-tabs__item.is-active', $arg1));
    }

    /**
     * @When I press link :arg1
     */
    public function iPressLink($arg1)
    {
        $this->iScrollTo($this->getMappedVariable($arg1));
        $this->clickWithLeftButton($this->getMappedVariable($arg1));
    }

    /**
     * @When I scroll to :arg1
     */
    public function iScrollTo($arg1)
    {
        $this->scrollTo($this->getMappedVariable($arg1));
        $this->executeJS('window.scroll(0, window.pageYOffset - 225)');
    }

    /**
     * @When I select option :arg1 with :arg2
     */
    public function iSelectOptionWith($arg1, $arg2)
    {
        $this->selectOption($this->getMappedVariable($arg1), $arg2);
    }

    /**
     * @When I fill field :arg1 with :arg2
     */
    public function iFillFieldWith($arg1, $arg2)
    {
        $this->fillField($this->getMappedVariable($arg1), $arg2);
    }

    /**
     * @When I press button :arg1
     */
    public function iPressButton($arg1)
    {
        $this->iScrollTo($this->getMappedVariable($arg1));
        $this->clickWithLeftButton($this->getMappedVariable($arg1));
    }

    /**
     * @Then I see in current url :arg1
     */
    public function iSeeInCurrentUrl($arg1)
    {
        $this->seeInCurrentUrl($arg1);
    }


    /**
     * @When I press link :arg1 in :arg2
     */
    public function iPressLinkIn($arg1, $arg2)
    {
        $this->clickWithLeftButton(Locator::contains($arg2 . ' a', $arg1));
    }

    /**
     * @Then I see text :arg1 in :arg2
     */
    public function iSeeTextIn($arg1, $arg2)
    {
        $this->see($arg1, $this->getMappedVariable($arg2));
    }

    /**
     * @Then I see :arg1 for field :arg2 with :arg3
     */
    public function iSeeForFieldWith($arg1, $arg2, $arg3)
    {
        $containerClass = $this->getMappedVariable($arg1);
        $groupedInput = $this->locatorParentUntil(Locator::contains('label', $arg2), '.c-form-group');

        $this->see($arg3, $groupedInput . '/' . Locator::contains($containerClass, ''));
    }

    /**
     * @Then I dont see :arg1 for field :arg2
     */
    public function iDontSeeForField($arg1, $arg2)
    {
        $containerClass = $this->getMappedVariable($arg1);
        $groupedInput = $this->locatorParentUntil(Locator::contains('label', $arg2), '.c-form-group');
        $this->dontSeeElement($groupedInput . '/' . Locator::contains($containerClass, ''));
    }

    /**
     * @Then I see text :arg1 in field :arg2
     */
    public function iSeeTextInField($arg1, $arg2)
    {
        $groupedInput = $this->locatorParentUntil(Locator::contains('label', $arg2), '.c-form-group');
        $fields = Locator::combine(Locator::contains('input', ''), Locator::contains('textarea', ''));
        $this->seeInField($groupedInput . '/' . $fields, $arg1);
    }

    /**
     * locatorParentUntil
     *
     * @param string $locator
     * @param string $parentElement
     * @return string
     */
    protected function locatorParentUntil(string $locator, string $parentElement) {
        $xpath = (new \Symfony\Component\CssSelector\CssSelectorConverter())->toXPath($parentElement, 'ancestor::');

        return $locator . '/' . $xpath;
    }

}