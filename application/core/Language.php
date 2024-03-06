<?php

namespace application\core;
class Language
{
    private $language;
    private $default;
    private $list;
    private $lang_vars;

    public function __construct()
    {
        $config = require_once 'application/config/language.php';
        $this->default = $config['default'];
        $this->list = $config['list'];
        $this->lang_vars = array();
        $this->language = $this->GetLanguage();
    }

    public function SetLanguage($language)
    {
        $language = strtolower($language);
        $exists = in_array($language, $this->list);
        if ($exists) {
            $this->language = $language;
            return true;
        }
        return false;
    }

//    public function GetLanguage()
//    {
//        $language = $this->default;
//        if (isset($_COOKIE['selected_language'])) {
//            $language = $_COOKIE['selected_language'];
//        }
//        $this->language = $language;
//        return $this->language;
//    }
    function GetLanguage()
    {
        $url = $_SERVER['REQUEST_URI'];
        $parts = explode('/', trim($url, '/'));
        return isset($parts[0]) ? $parts[0] : $this->default; // Default to English if no language specified
    }


    public function LoadLanguageValues()
    {
        if ($this->language == "") {
            $this->language = $this->default;
        }
        $lang = require_once('application/config/languages/' . $this->language . '.php');
        $this->lang_vars = array_merge($this->lang_vars, $lang);
    }

    public function GetVar($name)
    {
        return $this->lang_vars[$name] ?? null;
    }

    public function GetLangList()
    {
        return $this->list;
    }
//    public function
}