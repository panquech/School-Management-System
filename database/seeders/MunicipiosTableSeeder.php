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
            11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11

        ];

        $municipios = [
            // Ciudad de México
            "Álvaro Obregón", "Azcapotzalco", "Benito Juárez", "Coyoacán", "Cuajimalpa de Morelos", "Gustavo A. Madero", "Iztacalco", 
            "Iztapalapa", "Magdalena Contreras", "Miguel Hidalgo", "Milpa Alta", "Tlalpan", "Tláhuac", "Venustiano Carranza", 
            "Xochimilco",
            // Estado de México
            "Acolman", "Almoloya de Alquisiras", "Almoloya de Juárez", "Amanalco", "Amecameca", "Apaxco", "Atenco", "Atizapán de Zaragoza", 
            "Atlacomulco", "Axapusco", "Ayapango", "Calimaya", "Capulhuac", "Chalco", "Chapa de Mota", "Chapultepec", "Chiautla", 
            "Chicoloapan", "Chimalhuacán", "Coacalco de Berriozábal", "Cocotitlán", "Coyotepec", "Cuautitlán", "Cuautitlán Izcalli", 
            "Donato Guerra", "Ecatepec de Morelos", "El Oro", "Hueypoxtla", "Hueytlalpan", "Ixtapaluca", "Ixtapan de la Sal", 
            "Ixtapan del Oro", "Jaltenco", "Jiquipilco", "Jocotitlán", "Joquicingo", "La Paz", "Lerma", "Luvianos", "Malinalco", 
            "Melchor Múzquiz", "Metepec", "Mexicaltzingo", "Morelos", "Naucalpan de Juárez", "Nextlalpan", "Nezahualcóyotl", 
            "Ocoyoacac", "Otzolotepec", "Otumba", "Ozumba", "Polotitlán", "Rayón", "San Antonio la Isla", "San Felipe del Progreso", 
            "San Martín de las Pirámides", "San Mateo Atenco", "San Simón de Guerrero", "Santo Tomás", "Tepetlaoxtoc", "Teoloyucan", 
            "Teotihuacán", "Tepetlixpa", "Tequixquiac", "Texcoco", "Tlalmanalco", "Tlalnepantla de Baz", "Toluca", "Tultepec", 
            "Tultitlán", "Valle de Bravo", "Valle de Chalco Solidaridad", "Villa de Allende", "Villa de Arista", "Villa Guerrero", 
            "Villa Victoria", "Xonacatlán", "Zacazonapan", "Zacualpan", "Zinacantepec"
        ];

        for($i=0; $i<count($municipios); $i++){
            Municipio::create(['state_id' => $state_id[$i], 'name' => $municipios[$i]]);
        }
    }

}
