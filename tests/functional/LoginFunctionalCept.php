<?php
$I = new FunctionalTester($scenario);
$I->wantTo('test sign in logic');
$I->amOnPage('/');
$I->click('Авторизация');
$I->see('Войти');
$I->fillField('Введите email', 'user@gmail.com');
$I->fillField('Введите пароль', 'qwezxcqwe');
$I->click('Войти');
$I->seeCurrentUrlEquals('/appeal');
$I->see('Заявка');
$I->see('Тема');
$I->see('Сообщение');
$I->see('Прикрепить файл');
$I->see('Отправить');


