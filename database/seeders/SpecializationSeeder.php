<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $check = DB::table('specializations')->count();
        if($check < 1){
        	$specializations = array(
                "Accounts maths tax",
                "Addiction Psychiatry",
                "All subjects",
                "Applied math",
                "Biochemistry",
                "Biochemistry and Molecular Biology",
                "Biological sciences",
                "Biology",
                "Biology chemistery",
                "Biology", 
                "pharmacology", 
                "biochemistry",
                "Business studies and commerce",
                "Chemistry biology and physics",
                "Computer science",
                "Computers", 
                "English", 
                "Sciences",
                "Economics",
                "Economics",
                "Finance",
                "Education",
                "Education", 
                "Training", 
                "mental health", 
                "human resource management",
                "Electrical engineering",
                "Electronics manufacturing",
                "Engineering", 
                "humanities", 
                "environment",
                "English",
                "English and French course",
                "English Literature and Sociology",
                "English Literature Language IELTS ELT Spoken English",
                "English Tutor",
                "Finance",
                "Geography, History, Urdu",
                "History",
                "History of Mughals",
                "IELTS",
                "Informatic, visual Basic, Macros",
                "Informatics",
                "Journalism",
                "Kindergarten teacher",
                "Law",
                "mÃ©dico",
                "Management",
                "Managment / Leadership",
                "Marketing",
                "Math",
                "MATH teacher",
                "Mathematics",
                "Maths",
                "Maths Science and Mnemonics",
                "Maths, eng",
                "Medical",
                "Medicine", 
                "physiology", 
                "biological sciences",  
                "anatomy",  
                "biochemistry",  
                "microbiology",  
                "pharmacology",
                "Music physics  maths",
                "Pakistan studies",
                "PGT MATHEMATICS",
                "Pharmacology",
                "Philosophy", 
                "Politics and Economics",
                "Physics",
                "Quran",
                "Reading books",
                "Science",
                "Science .urdu.islamiat",
                "Science and biology",
                "Science",
                "biology",
                "arts",
                "painting",
                "Sciences",
                "Sociology",
                "Study",
                "Teaching",
                "Teaching and freelancing",
                "Teaching English",
                "Teaching English language",
                "Tutor",
                "Tutoring",
                "Urdu",
                "Urdu,islamiat,quran",
                "Worked as a teacher and then as a section head",
                "Chartered accountant",
                "Mental Health",
                "All subjects",
                "Operation research ADVANCED calculus",
                "Researcher",
                "Human Genetics",
                "Biology",
                "Dental surgeon",
                "M.phil Zoology",
                "Women Health Physical Therapy",
                "Food and nutrition",
                "Radiology",
                "Business studies",
                "Chemistry and education",
                "MS",
                "English",
                "Computers",
                "Economics",
                "Msc economics",
                "Economics",
                "Assessment and evaluation",
                "Education",
                "Educational psychology",
                "English",
                "Medicine",
                " HR",
                "Training",
                "Computer",
                "Electronics and Telecommunication",
                "Environmental laws",
                "English grammar",
                "English Literature and Grammar",
                "Language and literature",
                "Mphil English Linguistics",
                "English and French conversation",
                "English Literature",
                "English",
                "English Language Teaching",
                "Ms finance",
                "S.Studies",
                "Political science",
                "History of Pakistan",
                "English language",
                "Petroleum",
                "education",
                "human resources",
                "Data base administration",
                "Writing",
                "Kindergarten teacher",
                "Law",
                "toxicologÃ­a",
                "Project Management",
                "Industrial Relations Specialist and Social Sciences Phd",
                "Digital Marketing",
                "Maths",
                "BTech civil",
                "Electronics and communications",
                "Mathematics",
                "Mathematics and Project Management",
                "Maths",
                "Maths and Science",
                "None",
                "Maths and science",
                "Mtech Energy Technology",
                "Gre",
                " gat",
                " sat ",
                "net",
                "NAT",
                "lat",
                "Continue",
                "Endocrinology/physiology",
                "Music library Science  physics maths",
                "Pakistan affairs",
                "Diffenentiation",
                "geometry",
                "coordinate geometry",
                "series",
                "integral",
                "diff. Equations",
                "statics and dynamics",
                "Pharmacy",
                "Economics",
                "Physics",
                "Qirat",
                "translation and explanation of holy quran",
                "Arabic Literature",
                "Biology",
                "Chemistry ",
                " biology",
                "sciences",
                "Physics",
                "Science",
                "Science English primary level",
                "Science sub",
                "Science.urdu",
                "Botany",
                "Cardiac perfusion technology",
                "Biology. Chemistry",
                "Sociology",
                "Maths",
                "All subjects of primary classes",
                "Biology",
                "science",
                "Economics",
                "Economics + Education",
                "English",
                "English Sst",
                "IELTS",
                "SPOKEN ENGLISH",
                "OET",
                "M pharmacy",
                "Masters in Teaching Education",
                "Math ",
                "English",
                "Economics",
                "Maths English",
                "Science",
                "Spanish and French",
                "Masters in English",
                "Master's in English lit",
                "Graduate diploma in TESOL",
                "Chemistry",
                "Msc Mass Communication",
                "Urdu",
                "Quran and Islamic studies",
                "Can teach primary level"
                ,"Others");
        	$i = 1;
        	foreach ($specializations as $row) {
        		DB::table('specializations')->insert([
	        		'id' => $i++,
	        		'name' => $row
	        	]);
        	}
        }
    }
}
