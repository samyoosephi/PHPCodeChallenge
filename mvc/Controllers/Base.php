<?php

namespace Controllers;

use Models\DatabaseSqlite;

class Base {
    
    public function database()
    {
        return DatabaseSqlite::getInstance();
    }
}