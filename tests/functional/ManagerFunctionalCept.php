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
$I->click('Отметить как рассмотренную');
$I->canSeeResponseCodeIs(204);
$I->seeRecord('user_appeals', ['appeal_id' => '9', 'is_reviewed' => 1]);
$I->amOnPage('/admin_panel');
$I->seeLink('Рассмотренные заявки');
$I->seeLink('Log Out');
$I->click('Рассмотренные заявки');
$I->seeCurrentUrlEquals('/admin_panel/reviewed');
$I->seeLink('Активные заявки');

