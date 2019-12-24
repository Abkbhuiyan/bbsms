<?php

use Illuminate\Database\Seeder;

class SerologyTestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serology_tests = [
            [
                'test_name' => 'Hepatitis B – HBsAg',
                'test_description' => 'Hepatitis B surface antigen (HBsAg) detection Hepatitis B core antibody (anti-HBc) detection Nucleic acid amplification testing (NAT) for HBV',
                'normal_result' => 'Negative'
            ],
            [
                'test_name' => 'Hepatitis C - anti-HCV | HCV NAT',
                'test_description' => 'Hepatitis C virus antibody (anti-HCV) detection Nucleic acid amplification testing (NAT) for HCV',
                'normal_result' => 'Negative'
            ],
            [
                'test_name' => 'HIV Types 1 & 2',
                'test_description' => 'HIV-1 and HIV-2 antibody (anti-HIV-1 and anti-HIV-2) detection Nucleic acid amplification testing (NAT) for HIV-1',
                'normal_result' => 'Negative'
            ],
            [
                'test_name' => 'Treponema pallidum (syphilis)',
                'test_description' => 'Anti-treponemal antibody detection',
                'normal_result' => 'Negative'
            ],
            [
                'test_name' => 'West Nile virus (WNV)',
                'test_description' => 'Nucleic acid amplification testing (NAT) for WNV',
                'normal_result' => 'Negative'
            ],
            [
                'test_name' => 'Zika Virus (ZIKV)',
                'test_description' => 'Nucleic acid amplification testing (NAT) for ZikV',
                'normal_result' => 'Negative'
            ],
            [
                'test_name' => 'Malarial antibodies',
                'test_description' => 'Malarial antibody test for donation ',
                'normal_result' => 'Negative'
            ],
        ];

        DB::table('serology_tests')->insert($serology_tests);
    }
}
