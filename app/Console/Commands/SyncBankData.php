<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Exception;
use App\Transaction;

class SyncBankData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:bank-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A command to add latest bank transactions to the local DB.';

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
        try {
            DB::transaction(function () {
              $yesterday = Carbon::yesterday()->toDateString();
              $token = env('BANK_TOKEN', null);

              if (!$token) throw new Exception('Bank API token not found.');

              $response = Http::get('https://www.fio.cz/ib_api/rest/periods/'.$token.'/'.$yesterday.'/'.$yesterday.'/transactions.json');
              foreach (json_decode($response->getBody())->accountStatement->transactionList->transaction as $t) {
                  $transaction = new Transaction;
                  if ($t->column0) $transaction->date = str_replace('+0200', '', $t->column0->value);
                  if ($t->column1) $transaction->amount = $t->column1->value ?: null;
                  if ($t->column2) $transaction->account = $t->column2->value ?: null;
                  $transaction->save();
              }
            });

            return Command::SUCCESS;
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return Command::FAILURE;
        }

    }
}
