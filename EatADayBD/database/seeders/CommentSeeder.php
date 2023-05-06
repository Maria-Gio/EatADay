<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'title' => '¿Que rutina me recomiendas para principiantes?',
            'text' => 'La mejor manera de progresar es entrenar todo el cuerpo tres veces por semana con 4-6 ejercicios
            Considérate como una semilla preparándose para florecer: necesitas cierta cantidad de agua administrada en
            intervalos adecuados. Darte más agua más seguido no te hará crecer más rápido, igual y hasta te ahoga.
            Tampoco necesitas (tanta) variedad. No requieres dividir tus entrenamientos por grupos musculares (lunes
            de pecho y bíceps, miércoles de pierna, etc.), ni hacer 8 diferentes ejercicios para cada uno de ellos.
            Como principiante, te recuperas rápidamente de una sesión de entrenamiento. Requieres 24-72 horas para adaptarte
            a un estímulo, es decir, puedes hacer una rutina de cuerpo completo el lunes y repetir la misma rutina el miércoles,
            y aún así progresar. Al entrenar todo el cuerpo de manera intermitente avanzarás más rápido y ahorrarás tiempo.',

            'user_id'=>2,
            'isChecked' => true,
        ]);
        Comment::create([
            'title' => '¿Cuantas kcal necesito al dia?',
            'text' => 'Una de las claves para mantener un peso ideal consiste en comer sano y con moderación. Aunque no todo es cuestión
            de contar calorías, nunca está de más saber cuántas se deben consumir diariamente, según aconsejan los expertos. La ingesta
            calórica correcta siempre va a depender de cada persona, tal como señala la Fundación Española de Nutrición, que apunta que
            las necesidades nutricionales varían según la edad, el sexo y el estado de salud. En general, la Organización Mundial de la
            Salud establece un cálculo genérico: entre 1.600 y 2.000 calorías al día para las mujeres, y para los hombres entre 2.000 y 2.500.
            Pero para conocer la necesidad energética de cada persona de manera más exacta hay que tener en cuenta 2 factores: el metabolismo
            basal y la actividad física.',

            'user_id'=>3,
            'isChecked' => true,
        ]);
        Comment::create([
            'title' => 'kcal por gramo de chocolate',
            'text' => 'El chocolate y sus derivados
            contienen elementos nutritivos altamente beneficiosos para el organismo. El chocolate es un alimento rico en grasas, carbohidratos
            y proteínas, nutrientes indispensables para aportar energía al organismo humano. Además, su consumo aporta bienestar psicológico debido
            a su agradable sabor. Los principales componentes de la semilla del cacao son las grasas (24 por ciento) y los hidratos de carbono (45
            por ciento). El valor nutritivo y energético de este alimento es muy alto. De hecho,el cacao proporciona 293 calorías por cada 100 gramos
            y el chocolate, según su composición, aporta entre 450 y 600 calorías.',

            'user_id'=>1,
            'isChecked' => true,
        ]);
        Comment::create([
            'title' => 'Diferencia entre grasas saturadas e insaturadas',
            'text' => 'Las grasas tienen un papel esencial para la salud y hay una diferencia muy marcada entre los distintos tipos de grasa, ya que algunas no son
            saludables, mientras que otras son esenciales para sentirnos bien. ¿Cuál es la diferencia entre grasas saturadas y grasas insaturadas?
            Las grasas saturadas La mayoría de las grasas saturadas proviene de la grasa animal y alimentos procesados; por ejemplo, la mantequilla, los embutidos,
            las carnes grasas y la bollería industrial. Este tipo de grasa es negativa para el organismo (sobre todo si se ingiere en grandes cantidades) porque
            aumenta los niveles de colesterol en la sangre y, por tanto, consumirla es un riesgo para la salud cardiovascular. Las grasas insaturadas Saber cuál
            es la diferencia entre grasas saturadas y grasas insaturadas es fundamental para tener una buena salud, porque las grasas saturadas tienen el papel opuesto
            de las insaturadas.',

            'user_id'=>3,
            'isChecked' => true,
        ]);
        Comment::create([
            'title' => 'kcal por gramo de pan',
            'text' => 'Según la FEN (Fundación Española de Nutrición) el pan blanco aporta 277 kilocalorías por cada 100 gramos, una cantidad similar al del pan de molde (260 Kcal) y el pan integral
            (258 Kcal). No hay una gran variación calórica entre el pan normal y el integral. La única diferencia que existe entre ambos es que el segundo, al estar elaborado con harina integral, aporta
            más fibra a la dieta y por tanto es un gran aliado para combatir el estreñimiento.',

            'user_id'=>2,
            'isChecked' => true,
        ]);
        Comment::create([
            'title' => '¿es malo cenar pasta?',
            'text' => 'Una creencia extendida en cuanto a nutrición es que comer pasta o arroz por las noches es contraproducente, ya sea porque hace engordar o porque es malo para la salud. Lo cierto
            de todo es que estos alimentos se pueden consumir a cualquier hora del día, pero hay que hacerlo de manera eficiente. Lo primero que se debe de tener en cuenta es que estos productos son
            fundamentalmente energéticos. Por lo tanto, su función es aportar energía o ayudar a recuperar al organismo tras un esfuerzo. Entonces, en lo posible deben de ser utilizados con este fin,
            dejando a un lado su sabor.',

            'user_id'=>1,
            'isChecked' => true,
        ]);
        Comment::create([
            'title' => '¿Es malo desayunar siempre lo mismo?',
            'text' => 'Está demostrado que se toman mejores decisiones cuando no se está cansado. Así que optar siempre por el mismo desayuno nos permite “ahorrar” la energía que necesitaremos para otras cosas.
            Especialmente en un momento del día en que nos acabamos de levantar y no tenemos la cabeza demasiado en forma.',

            'user_id'=>1,
            'isChecked' => true,
        ]);
        Comment::create([
            'title' => '¿Es malo comer patatas con brotes?',
            'text' => 'Nunca coma papas (patatas) que estén dañadas o verdes bajo la cáscara. Siempre elimine los brotes o retoños. Las papas (patatas) que no estén verdes y a las que se les hayan quitado brotes o
            retoños se pueden comer sin problema.',

            'user_id'=>1,
            'isChecked' => true,
        ]);
        // Comment::create([
        //     'title' => 'No va una mierda1',
        //     'text' => 'Este es el relleno del mensaje 1',
        //     'isFrequent' => false,
        //     'user_id'=>4
        // ]);
        // Comment::create([
        //     'title' => 'No va una mierda1',
        //     'text' => 'Este es el relleno del mensaje 1',
        //     'isFrequent' => false,
        //     'user_id'=>3
        // ]);
        // Comment::create([
        //     'title' => 'No va una mierda1',
        //     'text' => 'Este es el relleno del mensaje 1',
        //     'isFrequent' => false,
        //     'user_id'=>5
        // ]);
        // Comment::create([
        //     'title' => 'No va una mierda1',
        //     'text' => 'Este es el relleno del mensaje 1',
        //     'isFrequent' => false,
        //     'user_id'=>3
        // ]);Comment::create([
        //     'title' => 'No va una mierda1',
        //     'text' => 'Este es el relleno del mensaje 1',
        //     'isFrequent' => false,
        //     'user_id'=>3
        // ]);
        // DB::table('comments')->insert([
        //     'title' => 'No va una mierda2',
        //     'text' => 'Este es el relleno del mensaje 2',
        //     'isFrequent' => true,
        //     'user_id'=>2
        // ]);
        // DB::table('comments')->insert([
        //     'title' => 'No va una mierda3',
        //     'text' => 'Este es el relleno del mensaje 3',
        //     'isFrequent' => false,
        //     'user_id'=>3
        // ]);
    }
}
