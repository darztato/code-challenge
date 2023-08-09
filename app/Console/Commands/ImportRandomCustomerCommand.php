<?php

namespace App\Console\Commands;

use App\Api\RandomUserApi;
use App\Domain\Customer\Controllers\ImportCustomerController;
use App\Domain\Customer\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Console\Command;
use Spatie\EventSourcing\Commands\CommandBus;

final class ImportRandomCustomerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Customer from 3rd party api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $importController = new ImportCustomerController();
        $importController->__invoke(
            app(CommandBus::class),
            app(RandomUserApi::class),
            app(CustomerRepositoryInterface::class)
        );

        return 0;
    }
}
