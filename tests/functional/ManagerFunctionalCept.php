<?php

use App\Http\Controllers\ManagerController;

$I = new FunctionalTester($scenario);
$I->wantTo('test registration logic');
$I->amOnPage('/');
$I->see('Авторизация');
$I->click('Авторизация');
$I->see('Введите email');
$I->see('Введите пароль');
$I->see('Войти');
$I->fillField('Введите email', 'admin@gmail.com');
$I->fillField('Введите пароль', 'admin');
$I->click('Войти');
$I->seeCurrentUrlEquals('/admin_panel');
$I->see('Активные заявки');
//$I->click('Отметить как рассмотренную','.is_reviewed9');
//$I->amOnRoute('reviewAppeal', ['id' => 9]);
//$I->amOnAction(ManagerController::class . '@reviewAppeal');
//$I->canSeeResponseCodeIs(204);
$I->seeRecord('user_appeals', ['appeal_id' => '1', 'is_reviewed' => 1]);

$I->seeLink('Рассмотренные заявки');
$I->seeLink('Log Out');
$I->click('Рассмотренные заявки');
$I->seeCurrentUrlEquals('/admin_panel/reviewed');
$I->seeLink('Активные заявки');

