<?php

namespace App\Console\Commands;
use App\Models\CoingeckoCoin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
class CoingeckoAPIData extends Command
{
    protected $signature = 'coingecko:fetch';
    
    protected $description = 'Fetches data from the Coingecko API and stores it in the database.';
    
    public function handle()
    {
        //Fetching data from api
        $response = Http::get('https://api.coingecko.com/api/v3/coins/list?include_platform=true');
        
        //Handling failed response
        if ($response->failed()) {
            dd($response);
            $this->error('Failed to fetch data from Coingecko API.');
            return;
        }
        //Handling true response
        else{
            //Handling fetchied data
            try {
                //Converting response to json format
                $coingecko_coins = $response->json();
        
                //Inserting the data into database table
                foreach ($coingecko_coins as $coingecko_coin) {
                $data=DB::table('coingecko_coins')->insert([
                    'coin_id'=>$coingecko_coin['id'],
                    'symbol'=>$coingecko_coin['symbol'],
                    'name'=>$coingecko_coin['name'],
                    'platforms'=>json_encode($coingecko_coin['platforms']),
                ]);
                }
        
                $this->info('Data fetched and stored successfully!');
            } 
            //Handling data insertion failed scenario
            catch (QueryException $e) {
                $errorMessage = $e->getMessage();
                
                if (strpos($errorMessage, 'Duplicate entry') !== false) {
                    // Extracting the primary key value from the error message that which record causing it
                    preg_match("/Duplicate entry '(.+)' for key/", $errorMessage, $matches);
                    $primaryKeyValue = $matches[1];
                    
                    // Display a error message that which record violating the constraint.
                    echo "The record with primary key '$primaryKeyValue' already exists.So data not get inserted";
                } else {
                    // Display a generic error message
                    echo "An error occurred while inserting the record.";
                }
            }
       }
    }
    
}