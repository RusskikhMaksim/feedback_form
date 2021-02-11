<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Check that MainPage is work');
$I->amOnPage('/');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->see('Start page'); // ! Тут часть фразы с вашей главной
