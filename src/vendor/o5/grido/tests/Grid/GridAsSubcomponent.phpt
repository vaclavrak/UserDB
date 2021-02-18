<?php

/**
 * Test: Grid.
 *
 * @author     Svaťa Šimara
 * @package    Grido\Tests
 */

namespace Grido\Tests;

use Tester\Assert,
    Grido\Grid;

require_once __DIR__ . '/../bootstrap.php';

class SubComponent extends \Nette\Application\UI\Control {}

class GridInSubcomponentTest extends \Tester\TestCase
{

    function testSessionsInDifferentGridsWithTheSameNameAreIndenpendent()
    {
        Helper::grid(function(){})->run();
        $presenter = Helper::$presenter;

        $presenter->onStartUp[] = function(TestPresenter $presenter){

            $subcomponent1 = new Subcomponent();
            $presenter->addComponent($subcomponent1, 'subcomponent1');
            $grid1 = new Grid();
            $subcomponent1->addComponent($grid1, 'grid1');
            $grid1->setRememberState();
            $session1 = $grid1->getRememberSession();
            $session1->name = 'a';
            Assert::same($session1->name, 'a');

            $subcomponent2 = new Subcomponent();
            $presenter->addComponent($subcomponent2, 'subcomponent2');
            $grid2 = new Grid();
            $subcomponent2->addComponent($grid2, 'grid2');
            $grid2->setRememberState();
            $session2 = $grid2->getRememberSession();
            $session2->name = 'b';

            Assert::same($session1->name, 'a');
            Assert::same($session2->name, 'b');
        };

        $request = new \Nette\Application\Request('Test', \Nette\Http\Request::GET, []);
        $presenter->run($request);
    }
}

run(__FILE__);
