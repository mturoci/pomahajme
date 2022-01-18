<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->decimal('amount', $precision=10, $scale=2);
            $table->string('account');
        });

        DB::table('transactions')->insert([
            ['date' => '2021-03-05', 'amount' => 4.88, 'account' => 'AT146000010310289367' ],
            ['date' => '2021-04-08', 'amount' => 10, 'account' => 'SK0975000000004024595844' ],
            ['date' => '2021-03-08', 'amount' => 5, 'account' => 'SK9609000000005152924037' ],
            ['date' => '2021-02-08', 'amount' => 10, 'account' => 'SK3609000000005041096339' ],
            ['date' => '2021-03-08', 'amount' => 8, 'account' => 'SK1202000000003165522951' ],
            ['date' => '2021-03-08', 'amount' => 10, 'account' => 'SK5056000000007331068001' ],
            ['date' => '2021-03-08', 'amount' => 200, 'account' => 'SK4183300000002201942423' ],
            ['date' => '2021-03-10', 'amount' => 40, 'account' => 'SK2609000000000011417696' ],
            ['date' => '2021-07-10', 'amount' => 15, 'account' => 'SK7409000000005160070617' ],
            ['date' => '2021-03-10', 'amount' => 3, 'account' => 'SK5011000000002935464432' ],
            ['date' => '2021-03-10', 'amount' => 50, 'account' => 'AT293303800000208256' ],
            ['date' => '2020-03-10', 'amount' => 25, 'account' => 'SK7665000000000017733884' ],
            ['date' => '2020-03-10', 'amount' => 50, 'account' => 'AT293303800000208256' ],
            ['date' => '2021-10-11', 'amount' => 20, 'account' => 'SK3409000000000321512875' ],
            ['date' => '2021-03-15', 'amount' => 15, 'account' => 'SK4875000000004021966830' ],
            ['date' => '2021-09-15', 'amount' => 20, 'account' => 'SK4909000000000273812952' ],
            ['date' => '2021-03-15', 'amount' => 20, 'account' => 'SK7602000000003479809656' ],
            ['date' => '2021-08-15', 'amount' => 10, 'account' => 'SK2402000000003043647182' ],
            ['date' => '2021-06-16', 'amount' => 5, 'account' => 'SK0456000000004988080001' ],
            ['date' => '2021-03-16', 'amount' => 5, 'account' => 'SK3211000000002616507028' ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
