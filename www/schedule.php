<?php
use Illuminate\Database\Capsule\Manager as DB;
use Carbon\Carbon;
use Exception;
use App\Transaction;
use GuzzleHttp\Client;

require __DIR__.'/../vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

$capsule = new DB;

$capsule->addConnection([
    'driver'    => env('DB_CONNECTION'),
    'host'      => env('DB_HOST'),
    'database'  => env('DB_DATABASE'),
    'username'  => env('DB_USERNAME'),
    'password'  => env('DB_PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

DB::connection()->transaction(function () {
  $yesterday = Carbon::yesterday()->toDateString();
  $token = env('BANK_TOKEN', null);

  if (!$token) throw new Exception('Bank API token not found.');

  $client = new GuzzleHttp\Client(['base_uri' =>'https://www.fio.cz']);
  $response = $client->request('GET', '/ib_api/rest/periods/'.$token.'/'.$yesterday.'/'.$yesterday.'/transactions.json');

  foreach (json_decode($response->getBody())->accountStatement->transactionList->transaction as $t) {
      $transaction = new Transaction;
      if ($t->column0) $transaction->date = explode('+', $t->column0->value)[0];
      if ($t->column1) $transaction->amount = $t->column1->value ?: null;
      if ($t->column2) $transaction->account = $t->column2->value ?: null;
      $transaction->save();
  }
});