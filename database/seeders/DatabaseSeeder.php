<?php
namespace Database\Seeders;
use App\Models\{User,Job}; use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder { public function run(): void {
 $company=User::create(['name'=>'Talento Digital S.A.S.','email'=>'empresa@demo.com','password'=>'password','role'=>'company']);
 User::create(['name'=>'Estudiante Demo','email'=>'estudiante@demo.com','password'=>'password','role'=>'student','career'=>'Tecnología en Sistemas de Información','bio'=>'Estudiante interesado en desarrollo web y nuevas tecnologías.']);
 foreach ([['Auxiliar de desarrollo web','Cali, Valle del Cauca','Híbrido','Práctica','Apoya el desarrollo y mantenimiento de aplicaciones web junto al equipo de tecnología.','Conocimientos básicos de HTML, CSS, JavaScript y disposición para aprender.','A convenir'],['Soporte técnico nivel 1','Remoto - Colombia','Remoto','Medio tiempo','Brinda apoyo a usuarios, registra incidentes y realiza seguimiento a solicitudes de soporte.','Comunicación asertiva, manejo básico de sistemas operativos y herramientas ofimáticas.','Por definir'],['Analista de datos junior','Cali, Valle del Cauca','Presencial','Tiempo completo','Apoya la limpieza, organización y análisis de información para reportes internos.','Excel, pensamiento analítico y conocimientos básicos de SQL.','A convenir']] as $j) Job::create(['company_id'=>$company->id,'company_name'=>$company->name,'title'=>$j[0],'location'=>$j[1],'modality'=>$j[2],'type'=>$j[3],'description'=>$j[4],'requirements'=>$j[5],'salary'=>$j[6]]);
} }
