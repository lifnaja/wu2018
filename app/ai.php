<?php

class AI
{
    public static function process($text)
    {
        $result = [
            'gender' => self::getGender($text),
            'sentiment' => self::getSentiment($text),
            'rude_words' => self::getRudeWords($text),
            'languages' => self::getLanguages($text),
        ];
        return $result;
    }

    /**
     * @return string 'Male' or 'Female' or 'Unknown'
     */
    public static function getGender($text)
    {
        if ((strpos($text, 'ค่ะ') !== false) || (strpos($text, 'คะ') !== false)) {
            return 'Female';
        }else if((strpos($text, 'ครับ') !== false) || (strpos($text, 'ครัช') !== false)){
            return 'Male';
        }else{
            return 'Unknown';
        }
        
    }

    /**
     * @return string 'Positive' or 'Neutral' or 'Negative'
     */
    public static function getSentiment($text)
    {
        if ((strpos($text, 'ดีใจ') !== false) || (strpos($text, 'ตื่นเต้น') !== false)) {
            return 'Positive';
        }else if(strpos($text, 'เฉยๆ') !== false){
            return 'Neutral';
        }else{
            return 'Negative';
        }
    }

    /**
     * @return array of all rude words in Thai
     */
    public static function getRudeWords($text)
    {
        $rude =['แสส','ฟวย','ควE'];
        $returnRude = array();
        for($i=0 ; $i < sizeof($rude) ; $i++){
            if ((strpos($text, $rude[$i]) !== false))
                array_push($returnRude,$rude[$i]);
        }

        return  (sizeof($returnRude)==0)?['พูดเพราะมาก']:$returnRude;

    }

    /**
     * @return array of languages (TH, EN)
     */
    public static function getLanguages($text)
    {
        if(preg_replace('/[^ก-๛]/u','',$text)){
            if(preg_replace('/[^a-z]/u','',$text)){
                return ['TH', 'EN'];
            }else{
                return ['TH'];
            }
        }if(preg_replace('/[^a-z]/u','',$text)){
            if(preg_replace('/[^ก-๛]/u','',$text)){
                return ['TH', 'EN'];
            }else{
                return ['EN'];
            }
        }
            
    }
}
