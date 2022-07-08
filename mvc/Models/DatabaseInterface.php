<?php

namespace Models;

interface DatabaseInterface
{
    function connection();
    function execute($sql);
    function select($sql);
    function fetch($result);
    function last_id();
    function num_rows($result);
    function error();
}