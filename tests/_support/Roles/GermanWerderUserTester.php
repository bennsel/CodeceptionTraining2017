<?php
namespace Roles;

use Codeception\Scenario;

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
class GermanWerderUserTester extends \AcceptanceTester
{
    protected $portalUrl = 'https://www.werder.de';
    protected $shopUrl = 'https://www.werder.de/shop';

    public function init()
    {
        $this->setMapping([]);
    }
}