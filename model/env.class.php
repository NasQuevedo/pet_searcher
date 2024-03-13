<?php
class Env {
    public function ReadEnv()
    {
        return parse_ini_file('.env');
    }
}