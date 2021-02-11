<?php
$I = new FunctionalTester($scenario);
$I->wantTo('test registration logic');
$I->amOnPage('/');
$I->click('Регистрация');
$I->see('email');
$I->see('name');
$I->see('password');
$I->see('Confirm password');
$I->see('Зарегистрироваться');
$I->fillField('email', 'testemail@test.com');
$I->fillField('name', 'testUser');
$I->fillField('password', 'testPassword');
$I->fillField('Confirm password', 'testPassword');
$I->click('Зарегистрироваться');
$I->seeRecord('users', ['name' => 'testUser', 'email' => 'testemail@test.com']);
$I->seeCurrentUrlEquals('/');
$I->see('Start page');


