<?php
$I = new FunctionalTester($scenario);
$I->wantTo('test appeals sending logic');
$I->amLoggedAs(['email' => 'user@gmail.com', 'password' => 'qwezxcqwe']);
$I->amOnPage('/appeal');
$I->see('Заявка');
$I->see('Тема');
$I->see('Сообщение');
$I->see('Прикрепить файл');
$I->see('Отправить');
$I->fillField('Тема', 'test subject');
$I->fillField('Сообщение', 'test message');
$I->attachFile('Прикрепить файл', 'normal.png');
$I->click('Отправить');
$I->seeRecord('user_appeals', ['subject' => 'test subject', 'message' => 'test message']);
$I->seeCurrentUrlEquals('/appeal');
$I->see('Заявка успешно отправлена');
$I->seeLink('Log Out');


