<?php

use PHPUnit\Framework\TestCase;

final class AITest extends TestCase
{
    public function  testGender_Male()
    {
        $result = AI::getGender('สวัสดีครับ');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }

    public function  testGender_Female()
    {
        $result = AI::getGender('สวัสดีค่ะ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }

    public function  testGender_MaleCase2()
    {
        $result = AI::getGender('สวัสดีครัช');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }

    public function  testSentiment_Positive()
    {
        $result = AI::getSentiment('ดีใจ');
        $expected_result = 'Positive';
        $this->assertEquals($expected_result, $result);
    }

    public function  testSentiment_Neutral()
    {
        $result = AI::getSentiment('เฉยๆ');
        $expected_result = 'Neutral';
        $this->assertEquals($expected_result, $result);
    }

    public function  testSentiment_Negative()
    {
        $result = AI::getSentiment('ไรวะ');
        $expected_result = 'Negative';
        $this->assertEquals($expected_result, $result);
    }

    public function  testLanguages_Thai()
    {
        $result = AI::getLanguages('ไรวะ');
        $expected_result = ['TH'];
        $this->assertEquals($expected_result, $result);
    }

    public function  testLanguages_English()
    {
        $result = AI::getLanguages('hello');
        $expected_result = ['EN'];
        $this->assertEquals($expected_result, $result);
    }

    public function  testLanguages_ThaiEnlish()
    {
        $result = AI::getLanguages('ไรวะqweqwe');
        $expected_result =  ['TH', 'EN'];
        $this->assertEquals($expected_result, $result);
    }

    public function  testRudeWords_notRude()
    {
        $result = AI::getRudeWords('อะไรเอ๋ย');
        $expected_result =  ['พูดเพราะมาก'];
        $this->assertEquals($expected_result, $result);
    }

    public function  testRudeWords_Rude()
    {
        $result = AI::getRudeWords('ฟวย');
        $expected_result =  ['ฟวย'];
        $this->assertEquals($expected_result, $result);
    }

    public function  testRudeWords_MultiRude()
    {
        $result = AI::getRudeWords('ฟวยแสส');
        $expected_result =  ['ฟวย','แสส'];
        $this->assertEquals($expected_result, $result);
    }
}