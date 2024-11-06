<?php
namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MunicipiosTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('municipios')->delete();

        $state_id = [
            // Ciudad de México
            7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7,
            // Estado de México
            11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11

        ];

        $municipios = [
            // Ciudad de México
            "Álvaro Obregón", 
            "Azcapotzalco", 
            "Benito Juárez", 
            "Coyoacán", 
            "Cuajimalpa de Morelos", 
            "Cuauhtémoc", 
            "Gustavo A. Madero", 
            "Iztacalco", 
            "Iztapalapa", 
            "La Magdalena Contreras", 
            "Miguel Hidalgo", 
            "Milpa Alta", 
            "Tláhuac", 
            "Tlalpan", 
            "Venustiano Carranza", 
            "Xochimilco",
            // Estado de México
            "Acambay de Ruiz Castañeda", "Acolman", "Aculco", "Almoloya de Alquisiras", "Almoloya de Juárez", 
            "Almoloya del Río", "Amanalco", "Amatepec", "Amecameca", "Apaxco", 
            "Atenco", "Atizapán", "Atizapán de Zaragoza", "Atlacomulco", "Atlautla", 
            "Axapusco", "Ayapango", "Calimaya", "Capulhuac", "Coacalco de Berriozábal", 
            "Coatepec Harinas", "Cocotitlán", "Coyotepec", "Cuautitlán", "Chalco", 
            "Chapa de Mota", "Chapultepec", "Chiautla", "Chicoloapan", "Chiconcuac", 
            "Chimalhuacán", "Donato Guerra", "Ecatepec de Morelos", "Ecatzingo", "Huehuetoca", 
            "Hueypoxtla", "Huixquilucan", "Isidro Fabela", "Ixtapaluca", "Ixtapan de la Sal", 
            "Ixtapan del Oro", "Ixtlahuaca", "Xalatlaco", "Jaltenco", "Jilotepec", 
            "Jilotzingo", "Jiquipilco", "Jocotitlán", "Joquicingo", "Juchitepec", 
            "Lerma", "Malinalco", "Melchor Ocampo", "Metepec", "Mexicaltzingo", 
            "Morelos", "Naucalpan de Juárez", "Nezahualcóyotl", "Nextlalpan", "Nicolás Romero", 
            "Nopaltepec", "Ocoyoacac", "Ocuilan", "El Oro", "Otumba", 
            "Otzoloapan", "Otzolotepec", "Ozumba", "Papalotla", "La Paz", 
            "Polotitlán", "Rayón", "San Antonio la Isla", "San Felipe del Progreso", "San Martín de las Pirámides", 
            "San Mateo Atenco", "San Simón de Guerrero", "Santo Tomás", "Soyaniquilpan de Juárez", "Sultepec", 
            "Tecámac", "Tejupilco", "Temamatla", "Temascalapa", "Temascalcingo", 
            "Temascaltepec", "Temoaya", "Tenancingo", "Tenango del Aire", "Tenango del Valle", 
            "Teoloyucan", "Teotihuacán", "Tepetlaoxtoc", "Tepetlixpa", "Tepotzotlán", 
            "Tequixquiac", "Texcaltitlán", "Texcalyacac", "Texcoco", "Tezoyuca", 
            "Tianguistenco", "Timilpan", "Tlalmanalco", "Tlalnepantla de Baz", "Tlatlaya", 
            "Toluca", "Tonatico", "Tultepec", "Tultitlán", "Valle de Bravo", 
            "Villa de Allende", "Villa del Carbón", "Villa Guerrero", "Villa Victoria", "Xonacatlán", 
            "Zacazonapan", "Zacualpan", "Zinacantepec", "Zumpahuacán", "Zumpango", 
            "Cuautitlán Izcalli", "Valle de Chalco Solidaridad", "Luvianos", "San José del Rincón", "Tonanitla"
        
        ];

        for($i=0; $i<count($municipios); $i++){
            Municipio::create(['state_id' => $state_id[$i], 'name' => $municipios[$i]]);
        }
    }

}
