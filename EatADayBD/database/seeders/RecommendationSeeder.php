<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recommendations')->insert([
            'title' => 'MEDITERRÁNEA',
            'text' => 'La dieta mediterránea es el modo de alimentarse basado en la cocina tradicional de la cuenca mediterránea. Esto lo diferencia de la gastronomía mediterránea, la cual se da de forma natural en los países mediterráneos y es inherente a ellos; cuando se habla de «dieta mediterránea» se hace referencia a la adopción consciente de los patrones alimenticios (dieta) propios del Mediterráneo, pero que se puede dar en cualquier lugar del mundo y por cualquier persona.
            Las características principales de esta alimentación son un alto consumo de productos vegetales (frutas, verduras, legumbres, frutos secos), pan y otros cereales (siendo el trigo un alimento opcional), el aceite de oliva como grasa principal, el vinagre y el consumo de vino en cantidades moderadas.
            Las propiedades saludables que se le atribuyen se basan en la constatación de que, aunque en los países mediterráneos se consume más grasa que en los Estados Unidos, la incidencia de enfermedades cardiovasculares es mucho menor. Las causas de tales propiedades parecen estar en el mayor consumo de productos ricos en ácidos grasos monoinsaturados, presentes en el aceite de oliva (que reduce el nivel de colesterol en sangre). También se atribuye al consumo de pescado, en especial pescado azul, rico en ácidos grasos omega 3 y, finalmente, al consumo moderado de vino tinto (por sus antocianos y resveratrol). El vino también está asociado a otro efecto cardioprotector denominado la paradoja francesa.
            Los polifenoles estilbenos, que se encuentran en la piel de la uva y se concentran en el vino tinto, y los lignanos, presentes en las aceitunas, el aceite de oliva virgen, las semillas de lino, las semillas de sésamo y los cereales integrales están asociados con efectos protectores frente a la mortalidad.
            Parece ser que la dieta mediterránea está asociada con un menor riesgo de deterioro cognitivo leve tanto durante el envejecimiento como durante la etapa de transición entre la demencia o deterioro cognitivo leve a la enfermedad de Alzheimer.
            Llevar un régimen de dieta mediterránea se asocia a menor índice de obesidad abdominal, que predice el riesgo de diabetes, hipertensión, infarto o de accidente cerebrovascular. La adherencia a la dieta mediterránea reduce en un 30% el riesgo de padecer diabetes tipo 2, sin necesidad de reducir la ingesta calórica, el peso o realizar ejercicio físico. También mejora el desarrollo embrionario y fetal, y disminuye los problemas disovulatorios y de infertilidad.',
            'photo' => "https://e00-elmundo.uecdn.es/assets/multimedia/imagenes/2022/04/12/16497610143946.jpg",
            'video' => null
        ]);

        DB::table('recommendations')->insert([
            'title' => 'VEGETARIANA',
            'text' => 'Una dieta vegetariana se enfoca a la alimentación con verduras. Esto incluye frutas, verduras, guisantes y alubias secas, granos, semillas y nueces. No existe un único tipo de dieta vegetariana. Los modelos de alimentación vegetariana suelen entrar en uno de los siguientes grupos:
            La dieta vegetariana estricta, que excluye todas las carnes y productos animales
            La dieta lacto vegetariana, que incluye alimentos derivados de las plantas y productos lácteos
            La dieta lacto-ovo vegetariana, que incluye productos lácteos y huevos
            
            Las personas que siguen dietas vegetarianas pueden obtener todos los nutrientes que necesitan. Sin embargo, deben tener cuidado de comer una amplia variedad de alimentos para cubrir sus necesidades nutricionales. Los nutrientes vegetarianos deben enfocarse en incluir proteínas, hierro, calcio, zinc y vitamina B12.
            Una manera de hacer la transición a una dieta vegetariana es reducir progresivamente la carne en la dieta mientras aumentas el consumo de frutas y verduras.',
            'photo' => "https://www.elcorreogallego.es/binrepository/716x506/0c0/0d0/none/102922340/JLPU/piram-vegetariana_422-3459274_20210610114523.jpg",
            'video' => null

        ]);

        DB::table('recommendations')->insert([
            'title' => 'VEGANA',
            'text' => 'El veganismo es una forma de vida que trata de evitar, todas las formas de explotación y crueldad hacia los animales, incluyendo el uso de animales para la alimentación, la ropa y el calzado, la cosmética y cualquier otra actividad que cause su muerte o sufrimiento, como los circos, zoológicos y carreras de caballos. El veganismo se opone al uso de animales en investigación médica y militar y promueve la búsqueda de alternativas más seguras, eficientes y humanas a estas prácticas.
            En cuanto a la alimentación, la persona vegana sigue una dieta 100% vegetal, es decir, una dieta en la que se excluyen todos los tipos de carne, el pescado y el marisco, los productos lácteos, los huevos y la miel.

            Aunque para la mayor parte de las personas que viven en los países occidentales y que basan su alimentación en productos animales, esto suena restrictivo, lo cierto es que una alimentación 100% vegetal puede y de hecho suele ser mucho más variada que la dieta occidental típica. Esto es así porque las personas veganas incluyen en su dieta muchos alimentos vegetales que, habiendo formado parte de la alimentación tradicional durante siglos, han sido recientemente relegados en favor de los alimentos animales.
            
            Lo que la dieta vegana incluye, además de toda clase de frutas y verduras, es:
            Cereales integrales
            Legumbres
            Frutos Secos y semillas
            Setas
            Cereales
            Algas, etc...
            
            Si se planifica adecuadamente, una dieta vegana puede proporcionar todos los nutrientes que una persona necesita.',
            'photo' => "https://www.dietistasnutricionistas.es/wp-content/uploads/2014/02/UVE_pir%C3%A1mide_alim_vegana.jpg",
            'video' => null

        ]);
        
        DB::table('recommendations')->insert([
            'title' => 'KETO',
            'text' => 'La dieta cetogénica es un plan de alimentación bajo en hidratos de carbono y rico en grasas que comparte muchas similitudes con las dietas Atkins y aquellas bajas en carbohidratos.
            Esta dieta implica reducir los carbohidratos de forma drástica y reemplazarlos por grasas. Esta disminución expone al cuerpo a un estado metabólico llamado cetosis.
            Cuando ocurre esto, el cuerpo se vuelve increíblemente eficiente y consigue convertir toda la grasa en energía. También convierte la grasa en cetonas dentro del hígado, lo que puede suministrar más energía al cerebro.
            
            Las dietas cetogénicas pueden causar reducciones en el azúcar de la sangre y en los niveles de insulina. Esto, junto al incremento de cetonas, proporciona numerosos beneficios para la salud.
            Existen muchas versiones de dietas cetogénicas, entre las que se incluyen:

            La dieta cetogénica estándar (DCE): Es un plan de alimentación muy bajo en hidratos de carbono, con una ingesta moderada de proteínas y alto en grasas. Normalmente contiene un 75% de grasas, un 20% de proteínas y solo un 5% de carbohidratos.
            La dieta cetogénica cíclica (DCC): Este plan implica periodos de recargas más altas en carbohidratos , por ejemplo, 5 días cetogénicos seguidos de 2 días con carbohidratos.
            La dieta cetogénica adaptada (DCA): Te permite añadir carbohidratos los días de entrenamientos.
            La dieta cetogénica alta en proteínas: Es similar a una dieta cetogénica estándar, pero incluye más proteínas. Lo normal suele ser un 60% de grasas, un 35% de proteínas y un 5% de carbohidratos.',
            'photo' => "https://t1.uc.ltmcdn.com/es/posts/1/1/3/que_es_la_dieta_keto_alimentos_permitidos_menu_semanal_y_contraindicaciones_51311_orig.jpg",
            'video' => null

        ]);

        DB::table('recommendations')->insert([
            'title' => 'YOGA',
            'text' => 'El yoga es una práctica que conecta el cuerpo, la respiración y la mente. Esta práctica utiliza posturas físicas, ejercicios de respiración y meditación para mejorar la salud general. El yoga se desarrolló como una práctica espiritual hace miles de años. Hoy en día la mayoría de las personas en occidente hace yoga como ejercicio y para reducir el estrés.
            El yoga puede mejorar el nivel general de su estado físico y mejorar su postura y su flexibilidad. También puede:

            Reducir su presión arterial y su frecuencia cardíaca
            Ayudarle a relajarse
            Mejorar su confianza en usted mismo
            Reducir el estrés
            Mejorar su coordinación
            Mejorar su concentración
            Ayudarle a dormir mejor
            Ayudar a la digestión

            Adicionalmente, practicar yoga también puede ayudar con las siguientes afecciones:
            Ansiedad
            Dolor de espalda
            Depresión',
            'photo' => null,
            'video' => "https://www.youtube.com/embed/a01D1PzTVFc"
        ]);

        DB::table('recommendations')->insert([
            'title' => 'RUNNING',
            'text' => 'El running, footing, correr o jogging, son algunos de los términos más usados en la actualidad para referirse a la carrera continua, el acto por el que alternativamente los pies tocan el suelo a una velocidad mayor que al andar. Esta disciplina, en principio, la puede practicar cualquier persona y se suele realizar al aire libre. En los últimos años ha aumentado considerablemente el número de personas que se ha sumado al running por los beneficios físicos y mentales que aporta al organismo.
            
            Las ventajas de esta práctica deportiva frente a llevar una vida sedentaria son muchas. Entre las principales, destacan las siguientes:
            
            Disminuye la posibilidad de contraer enfermedades: Correr de forma regular reduce considerablemente el riesgo de desarrollar hipercolesterolemia, obesidad, hipertensión o diabetes tipo 2. Además, también disminuye el riesgo de padecer embolias, cáncer de mama u osteoporosis, entre otras patologías.
            
            Mejora la salud: Otros beneficios asociados a correr son la mejora del sistema inmunológico y del sistema cardiovascular, la estimulación de la capacidad pulmonar, la aceleración del metabolismo o que eleva los niveles de colesterol bueno. Por otro lado también disminuye el riesgo de que se formen coágulos de sangre.
            
            Fortalece los huesos: El ejercicio de impacto, como el running, ayuda a que los huesos se fortalezcan y aumenten su densidad lo que previene la osteoporosis.
            
            Ayuda a combatir la ansiedad y el estrés: Al correr se segregan endorfinas que mejoran la actitud mental del corredor y favorecen que el deportista haga frente a problemas como la ansiedad.
            
            Ayuda a controlar el peso: La quema calórica que se realiza en el running ayuda a que el gasto calórico del día aumente y propicie la pérdida de peso o el mantenimiento. Si el objetivo del deportista es adelgazar, los especialistas recomiendan combinar el ejercicio con una buena dieta alimentaria.
            
            Lucha contra la celulitis: Correr ayuda a disminuir la grasa corporal, incluso la que se acumula generando la celulitis.
            
            Tonifica: Con el running no sólo se tonifican y fortalecen las piernas. Los brazos, el abdomen y la espalda también se ven beneficiados.
            
            Ayuda a descansar mejor: El esfuerzo de la carrera y de la actividad del día favorece que por la noche sea más fácil conciliar el sueño.
            
            Aumenta la autoestima: Si se realiza con frecuencia, marcarse objetivos y conseguirlos y las mejoras físicas que sufre el organismo consigue aumentar la autoestima del corredor.',
            'photo' => null,
            'video' => "https://www.youtube.com/embed/M9dHBu_Ir0k"
        ]);

        DB::table('recommendations')->insert([
            'title' => 'CROSSFIT',
            'text' => 'CrossFit se define como un sistema de entrenamiento de fuerza y acondicionamiento basado en ejercicios funcionales constantemente variados realizados a una alta intensidad. Esto significa que nos valemos de una gran cantidad de ejercicios y disciplinas deportivas (gimnasia, halterofilia, carrera…), de entre las cuales seleccionamos técnicas o movimientos aplicables a la vida diaria y los combinamos de muchas formas diferentes en entrenamientos intensos, resultando no solo un experiencia exigente durante la cual el carácter lúdico y la camaradería cobran un papel primordial, sino también un programa insuperable para desarrollar las diez capacidades físicas generales: resistencia cardiovascular, resistencia energética, fuerza, flexibilidad, potencia, velocidad, coordinación, agilidad, equilibrio y precisión.
            Gracias a su tremenda efectividad como sistema de preparación física, en sus orígenes el CrossFit fue elegido por numerosas academias militares, cuerpos de policía, artistas marciales y cientos de deportistas de élite en todo el mundo como programa de acondicionamiento y entrenamiento de fuerza estándar.

            No obstante, a día de hoy, el CrossFit se ha popularizado en todos los sectores de la población. El hecho de ser un programa diseñado para ser fácilmente adaptable lo convierte en el sistema de entrenamiento perfecto para cualquier persona con motivación, independientemente de su edad, sexo, capacidades o experiencia previa. Una de las grandes maravillas del CrossFit es que durante su práctica, un mismo entrenamiento puede ser realizado simultáneamente por un anciano con problemas cardiovasculares o de movilidad reducida y un bombero en un estado de forma óptima.',
            'photo' => null,
            'video' => "https://www.youtube.com/embed/qdUf5SFo_OQ"
        ]);

        DB::table('recommendations')->insert([
            'title' => 'TONIFICACIÓN',
            'text' => 'Se entiende por ejercicios de tonificación a aquellos ejercicios en los que el individuo busca únicamente una apariencia más definida, evitando grandes ganancias musculares.
            
            Los ejercicios que se utilizan popularmente para mejorar la tonificación son principalmente ejercicios de levantamiento de peso realizados con altas repeticiones y baja resistencia (bajo peso), con breves períodos de descanso.

            Lo que se propugna es una rutina de ejercicios que implica:

            Entrenamiento de fuerza: Para estimular la degradación muscular y la reparación (aumentar la masa muscular aumentará el metabolismo, al tener el músculo un mayor consumo calorífico que la grasa).
            Ejercicio cardiovascular (en particular en el entrenamiento de intervalos): Para quemar calorías.
            Nutrición óptima: Para manipular la ingesta de calorías y proporcionar una nutrición suficiente para el crecimiento muscular. El requisito principal para buscar la tonificación es la obtención de baja grasa corporal, ya que la grasa proporciona un aspecto "blando".',
            'photo' => null,
            'video' => "https://www.youtube.com/embed/q9b9afJ-GnA"
        ]);
    }
}
