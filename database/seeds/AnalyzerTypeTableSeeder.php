<?php
use Illuminate\Database\Seeder;

class AnalyzerTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('analyzer_type')->delete();

        \DB::table('analyzer_type')->insert([
          [
            'id_analyzer'=>1,
            'analyzer_name'=>'Manual',
          ],
          [
            'id_analyzer'=>2,
            'analyzer_name'=>'BA400',
          ],
          [
            'id_analyzer'=>3,
            'analyzer_name'=>'BA200',
          ],
        ]);

    }
}
