<?php

use Illuminate\Database\Seeder;
use App\Rate;
use App\Crane;
use App\Servicio;

class CraneRateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //llegandi la tabla de gruas con los valores de estos
        $campo1 = Crane::create(['servicio' => 'Servicio de Grúa Bicicletas']);
        $campo2 = Crane::create(['servicio' => 'Servicio de Grúa Motocicleta y mototriciclo dentro del perímetro urbano']);
        $campo3 = Crane::create(['servicio' => 'Servicio de Grúa Motocicleta y mototriciclo fuera del perímetro urbano']);
        $campo4 = Crane::create(['servicio' => 'Servicio de Grúa Motocarros dentro del perímetro urbano']);
        $campo5 = Crane::create(['servicio' => 'Servicio de Grúa Motocarros fuera del perímetro urbano']);
        $campo6 = Crane::create(['servicio' => 'Servicio de Grúa Vehículos < de 3 Toneladas dentro del perímetro Urbano']);
        $campo7 = Crane::create(['servicio' => 'Servicio de Grúa Vehículos < de 3 Toneladas fuera del perímetro Urbano']);
        $campo8 = Crane::create(['servicio' => 'Servicio de Grúa Vehículos < de 3 y 6 Toneladas dentro del perímetro Urbano']);
        $campo9 = Crane::create(['servicio' => 'Servicio de Grúa Vehículos < de 3 y 6 Toneladas fuera del perímetro Urbano',]);
        $campo10 = Crane::create(['servicio' => 'Servicio de Grúa Vehículos > de 7 Toneladas dentro del perímetro Urbano']);
        $campo11 = Crane::create(['servicio' => 'Servicio de Grúa Vehículos > de 7 Toneladas fuera del perímetro Urbano']);
        $campo12 = Crane::create(['servicio' => 'Servicio de Grúa a la ciudad de Bucaramanga']);
        $campo12 = Crane::create(['servicio' => 'NO. Es llevado por el conductor']);



        //llenando la tabla de tarifas de valores del parqueo del vehiculo


        $campos1 = Rate::create(['servicio' => 'Inmovilización diaria de bicicletas']);
        $campos2 = Rate::create(['servicio' => 'Inmovilización diaria Motocicletas, Mototriciclos y similares']);
        $campos3 = Rate::create(['servicio' => 'Inmovilizacion diaria motocarros ']);
        $campos4 = Rate::create(['servicio' => 'Inmovilización diaria vehiculos menores de 3 toneladas ']);
        $campos5 = Rate::create(['servicio' => 'Inmovilización diaria Buses, Busetas, Microbus, Similares']);
        $campos6 = Rate::create(['servicio' => 'Inmovilización Vehículos mayor de 3.5 toneladas por dimension (Vehículo doble)
        camión con carrocería tipo grúa, estacas, plataforma, porta contenedor, bomba de hormigón, niñera,
        limpiador alcantarillas, estibas, barredora, taladro, volqueta']);
        $campos7 = Rate::create(['servicio' => 'Inmovilizacion Vehiculos mayor de 3.5 toneladas por dimension (Vehículo con troque sencillo)
        camion con carrocería tipo grúa, estacas, plataforma, porta contenedor, bomba de hormigón, niñera,
        recolector y compactador, tanque bomberos, furgón, mixer, casa rodante, limpiador alcantarillas,
        estibas, barredora, taladro, volqueta ']);

        $campos8 = Rate::create(['servicio' => 'Inmovilización diaria vehículos de carga de 3 a 6 Toneladas ']);
        $campos9 = Rate::create(['servicio' => 'Inmovilizacion diaria vehiculos de carga de 6 a 10 Toneladas ']);
        $campos10 = Rate::create(['servicio' => 'Inmovilizacion diaria vehiculos mas de 10 toneladas ']);

        //llenando la tabla de tarifas de valores del parqueo del vehiculo

        $campo1 =Servicio::create(['anio'=>'2018','crane_id'=>'1','rate_id'=>'1','val_grua' =>'6700','val_parqueadero' =>'6130']);
        $campo2 =Servicio::create(['anio'=>'2018','crane_id'=>'2','rate_id'=>'2','val_grua' =>'41000','val_parqueadero' =>'13620']);
        $campo3 =Servicio::create(['anio'=>'2018','crane_id'=>'3','rate_id'=>'2','val_grua' =>'55700','val_parqueadero' =>'13620']);

        $campo3 =Servicio::create(['anio'=>'2018','crane_id'=>'4','rate_id'=>'4','val_grua' =>'95890','val_parqueadero' =>'22890']);
        $campo4 =Servicio::create(['anio'=>'2018','crane_id'=>'5','rate_id'=>'4','val_grua' =>'110000','val_parqueadero' =>'22890']);

        $campo3 =Servicio::create(['anio'=>'2018','crane_id'=>'6','rate_id'=>'5','val_grua' =>'116700','val_parqueadero' =>'44000']);
        $campo4 =Servicio::create(['anio'=>'2018','crane_id'=>'7','rate_id'=>'5','val_grua' =>'134700','val_parqueadero' =>'44000']);


    }



}
