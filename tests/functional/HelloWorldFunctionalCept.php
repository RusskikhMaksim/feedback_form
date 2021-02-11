<?php
$I = new FunctionalTester($scenario);
$I->wantTo('Check that MainPage is work');
$I->amOnRoute('home');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->see('Start page'); // ! Тут часть фразы с вашей главной
