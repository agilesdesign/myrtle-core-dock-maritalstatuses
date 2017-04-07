<?php

namespace Myrtle\Core\Docks;

use Myrtle\MaritalStatuses\Models\MaritalStatus;
use Myrtle\MaritalStatuses\Policies\MaritalStatusPolicy;

class MaritalStatusesDock extends Dock
{
    /**
     * Description for Dock
     *
     * @var string
     */
    public $description = 'Marital Status manager';

    /**
     * Explicit Gate definitions
     *
     * @var array
     */
    public $gateDefinitions = [
        'maritalstatuses.admin' => MaritalStatusPolicy::class . '@admin',
        'maritalstatuses.access.admin' => MaritalStatusPolicy::class . '@accessAdmin',
    ];

    /**
     * Policy mappings
     *
     * @var array
     */
    public $policies = [
        MaritalStatus::class => MaritalStatusPolicy::class,
        MaritalStatusPolicy::class => MaritalStatusPolicy::class,
    ];

    /**
     * List of config file paths to be loaded
     *
     * @return array
     */
    public function configPaths()
    {
        return [
            'docks.' . self::class => dirname(__DIR__, 3) . '/config/docks/maritalstatuses.php',
            'abilities' => dirname(__DIR__, 3) . '/config/abilities.php',
        ];
    }

    /**
     * List of migration file paths to be loaded
     *
     * @return array
     */
    public function migrationPaths()
    {
        return [
            dirname(__DIR__, 3) . '/database/migrations',
        ];
    }

    /**
     * List of routes file paths to be loaded
     *
     * @return array
     */
    public function routes()
    {
        return [
            'admin' => dirname(__DIR__, 3) . '/routes/admin.php',
        ];
    }
}
