<?php

namespace App\Database\Commands;

use Illuminate\Database\DatabaseManager;

abstract class Command
{
    /** @var DatabaseManager */
    protected $databaseManager;

    /**
     * constructor
     * @param DatabaseManager $databaseManager
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }
}
