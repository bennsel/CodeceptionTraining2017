<?php


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
     * @Given am on web page
     */
    public function amOnWebPage()
    {
        $this->amOnUrl($this->portalUrl);
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
}
