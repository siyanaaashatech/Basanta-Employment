<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'title' => 'About Us',
            'slug' => 'about-us',
            'subtitle' => 'Bring your dream into Reality',
            'image' => '1708111815-Trademark Education - Landscape.png',
            'description' => 'Trademark Education Pvt. Ltd is a pioneer organization in overseas education. The\r\norganization is recognized by various overseas educational institutions and a large number of\r\nstudents who have been successfully placed in different institutions at Universities all over\r\nthe globe.',
            'content' => 'Trademark Education Pvt. Ltd is a pioneer organization in overseas education. The\r\norganization is recognized by various overseas educational institutions and a large number of\r\nstudents who have been successfully placed in different institutions at Universities all over\r\nthe globe. With quality credentials and our trustworthy service guides we excel students to\r\nreach their best possible academic heights based on their academic merit and financial\r\ncapacity.\r\nFacilitating best educational opportunities in the prestigious universities abroad, we rightly\r\nset the academic goals for aspiring students. We have a large number of students to our\r\ncredit, who have been placed in top universities all over the world.\r\nCommitted to the objectives of integrity and excellence, Trademark Education is an\r\nacknowledged leader in overseas educational consultancy in Nepal complementing the\r\naptitudes of students, we recommend nothing less than the best in their academic pursuit.\r\nRelieving you of uncertainties and confusion regarding the career options, we can serve you\r\nby providing the best counseling and guidance to help you make the right decision.\r\n\r\n➢ Trademark Education is an educational organization established with an aim to\r\nprovide an outstanding support to aspiring students, assisting students in expanding\r\ntheir education to new horizons.\r\n➢ Sharing a friendly relation with all the students and guiding them to determine the\r\nmost suitable courses and universities in Australia, USA and UK.\r\n➢ Run by qualified and experiences professionals who have direct links with overseas\r\ncolleges and universities.\r\n➢ Representing more universities and colleges of Australia, USA and many other\r\nuniversities worldwide.\r\n➢ Well-equipped IELTS, PTE, TOFEL, OET, UN SAAT and SAT classes with all the required\r\nmaterials along with a friendly, peaceful environment.\r\n➢ Personal assistance in VISA processing, documentation and interview preparation.\r\n➢ Assistance in IELTS, PTE, TOFEL OET, UN SAT and SAT registration, ticket\r\narrangements, airport pickup and foreign accommodation.\r\n➢ Ministry of Education approved educational consultancy.\r\n➢ Ministry of Education and TITI certified counselor.\r\n➢ QEAC certified Counselor.',


        ]);
        // About::factory()->count(1)->create();
    }
}
