<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;


class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Recipe::create([
            'title' => 'Macarrones con tomate',
            'photo' => 'https://static-sevilla.abc.es/media/gurmesevilla/2013/08/macarrones-tomate-huevo.jpg',
            'ingredients' => '["macarrones", "tomate", "aceite", "sal"]',
            'displayIngredients' => '["1 rebanada de pan", "3 tomates maduros", "Un pellizco de sal", "4 dientes de ajo"]',
            'preparation' => '
            - Marchamos el tomate casero, sofriendo el ajo y la cebolla cortados en brunoise en cuatro cucharadas de aceite, a fuego medio en una cazuela ancha y honda.
            - Cocemos los macarrones en abundante agua con sal y luego reservar escurridos pero movidos con una gota de aceite para que no se queden pegados.
            - Cuando el tomate esté casi listo corregimos primero el punto de sal del sofrito con sal y pimienta, para después corregir el punto de acidez del tomate con una cucharadita de azúcar blanco o moreno.
            - Emplatamos colocando primero los macarrones y encima la salsa de tomate casera al gusto.',
            'description' => 'Una forma estupenda de conseguir que los niños coman verdura es mezclarla entre sus comidas favoritas.
            Si preparáis una buena salsa de tomate casera junto a la pasta estarán tomando un saludable plato que les llenará de energía.',
            'isChecked' => true,


        ]);

        Recipe::create([
            'title' => 'Arroz y conejo',
            'photo' => 'https://static-sevilla.abc.es/media/gurmesevilla/2013/04/arroz-picante-conejo.jpg',

            'ingredients' => '["arroz", "conejo", "sal", "agua", "aceite", "sal"]',
            'displayIngredients' => '["Pimiento rojo", "1 tomate maduro", "2 pellizcos de sal", "Una cabeza de ajo", "Medio conejo", "180g arroz", "600ml caldo carne", "1 cebolleta"]',
            'preparation' => '
            - Salpimentamos el conejo y lo doramos en la paella. Una vez dorado retiramos y reservamos.
            - Pochamos la cebolleta, el ajo y el pimiento rojo a fuego lento. Ponemos un poco de sal, con cuidado porque el caldo ya le aportará sal.
            - Agregamos el tomate pelado y sin pepitas picado. Rehogamos unos 10 minutos a fuego medio.
            - Incorporamos el arroz bomba.
            - Volvemos a incorporar el conejo y dejamos cocinar unos 20 minutos. Los primero minutos lo pondremos a fuego fuerte y luego bajaremos el fuego para que se termine de hacer el arroz.
            ',
            'description' => 'El arroz con conejo es un plato sabroso, nutritivo y lleno de sabor. A los niños les va a encantar
            porque su sabor es también muy suave',
            'isChecked' => true,
        ]);

        Recipe::create([
            'title' => 'Pantumaka',
            'photo' => 'https://blog.ruralmur.com/wp-content/uploads/2015/09/Pan-tumaca.jpg',
            'ingredients' => '["tomate", "pan", "sal", "ajo"]',
            'displayIngredients' => '["1 rebanada de pan", "Un tomate maduro", "Un pellizco de sal", "Una diente de ajo", "Aceite olivas"]',
            'preparation' => '
            - Comenzaremos cortando el tomate por la mitad sin quitarle la piel, cogemos una de las mitades, la encaramos hacia la miga del pan y extendemos presionando con fuerza el contenido del tomate por la rebanada.
            - El ajo podemos untarlo antes o después del tomate, si lo hacemos antes éste quedará más concentrado.
            - Finalmente echamos un chorrito de aceite y un poco de sal por encima de la miga untada con tomate.
            ',
            'description' => 'plato tradicional catalán habrás disfrutado del sabor que aporta el tomate frotado sobre un buen pan
            de payés, que luego se riega con aceite de oliva virgen extra y sal',
            'isChecked' => true,
        ]);

        Recipe::create([
            'title' => 'Albondigas con tomate',
            'photo' => 'https://static-sevilla.abc.es/media/gurmesevilla/2016/06/albondigasensalsa.jpg',
            'ingredients' => '["pan rallado", "leche entera", "cebolla", "ajo", "perejil", "aceite de oliva", "carne picada", "huevo", "pimienta negra", "sal", "tomate", "harina"]',
            'displayIngredients' => '["50g de miga de pan", "150ml leche", "2 cebollas", "2 dientes de ajo", "1 ramillete de perejil", "2 cucharadas de aceite", "300g de carne picada", "1 huevo", "600g tomate triturado"]',
            'preparation' => '
            - picamos las cebollas y ajos.
            - picamos perejil, calentamos la sarten con aceite, y vertemos todo, una vez terminada lo juntamos y mezclamos todo en un bol con la carne y 1 huevo.
            - ahora vertemos la salsa de tomate a la sartén.
            - Finalmente hacemos pelotitas con la carne y la echamos en la saten con el tomate esperamos a que se cueza y listo',
            'description' => 'Las albóndigas se pueden preparar de muchas maneras, ya que podemos cocinarlas con diferentes salsas. Éstas que os proponemos hoy, son las clásicas albóndigas con tomate, aunque la salsa lleva
            también almendras, lo que las hace muy especiales, y seguro que os vais a chupar los dedos toda la familia.',
            'isChecked' => true,
        ]);

        Recipe::create([
            'title' => 'Huevos rotos con jamon',
            'photo' => 'https://saltandoladieta.com/wp-content/uploads/2022/06/huevos-rotos-con-jamon-iberico.jpg',
            'ingredients' => '["huevo", "patata", "jamon serrano", "aceite de oliva virgen"]',
            'displayIngredients' => '["4 huevos", "4 patatas", "150 g de jamón serrano", "Aceite de oliva virgen", "sal"]',
            'preparation' => '
            - Pelar y lavar las patatas.
            - cortarlas en rodajas finas.
            - poner el aceite en una sartén grande o cazuela y cuando esté caliente poner las patatas.
            - Sacamos las patatas y dejamos sobre papel de cocina paa que escurran bien el aceite.
            - Sobre las patatas poner el jamón, con el calor de las patatas el jamón quedará perfecto..
            - freímos los huevos al gusto, Los ponemos sobre el jamón, encima un poco de sal',
            'description' => 'Los huevos rotos con jamón es una receta fácil de hacer con un resultado espectacular y que gusta a todos, en mi casa si fuera por ellos,  los comerían todos los días.',
            'isChecked' => true,
        ]);

        Recipe::create([
            'title' => 'Fajitas mexicanas',
            'photo' => 'https://static-sevilla.abc.es/media/gurmesevilla/2014/01/fajitas-pollo.jpg',
            'ingredients' => '["tortillas de trigo", "pechugas de pollo", "pimiento verde", "pimiento rojo", "pimiento amarillo", "cebolla"]',
            'displayIngredients' => '["8 tortillas de trigo", "500 g. de pechugas de pollo", "1 pimiento verde", "1 pimiento rojo", "1 pimiento amarillo", "1 cebolla grande"]',
            'preparation' => '
            - Limpiamos muy bien el pollo.
            - Maceramos con el ajo, sal, pimienta negra y comino.
            - Cortamos los pimientos en tiras un poquito gruesas y la cebolla en juliana fina.
            - Ponemos dos cucharadas de aceite de oliva virgen extra en una sartén y cuando esté caliente añadimos la cebolla, salpimentamos y rehogamos bien.\n
            - Añadimos la cucharadita de pimentón dulce.
            - Pasamos el pollo a la otra sartén en la que tenemos la cebolla pochada.
            - Para finalizar ponemos al fuego una sartén pequeña con unas gotas de aceite de oliva virgen extra y calentamos las tortillas de trigo.',
            'description' => 'Las fajitas de pollo son un plato típico de la comida mexicana o, para ser más exactos, de la cocina Tex-Mex fruto de la mezcla de la gastronomía típica mexicana
            con la estadounidense del estado de Texas. ',
            'isChecked' => true,
        ]);

        Recipe::create([
            'title' => 'Tortilla de patatas',
            'photo' => 'https://img2.rtve.es/imagenes/aqui-tierra-tortilla-patatas-sin-patatas/1610394359216.jpg',
            'ingredients' => '["patata", "cebolla", "huevo", "sal", "aceite de oliva"]',
            'displayIngredients' => '["700 g de patatas", "300 g cebollas", "6 huevos", "sal", "aceite de oliva"]',
            'preparation' => '
            - primero de todo caramelizamos la cebolla.
            - pelamos las patatas y las cortamos en rodajas finas.
            - añadimos las patatas y dejamos que se vayan friendo.
            - Sacamos las patatas y las escurrimos bien del aceite y las ponemos en un bol grande.
            - Batimos los huevos y los añadimos al bol, removiendo con un tenedor para que se mezclen bien los tres ingredientes.
            - Cuajamos la tortilla en una sartén con una cucharada de aceite durante unos tres o cuatro minutos y le damos la vuelta.',
            'description' => 'La tortilla de patatas o tortilla española es uno de los platos por excelencia de la gastronomía española. Para hacerla sólo necesitamos tres ingredientes: huevos, patatas y un buen aceite.',
            'isChecked' => true,
        ]);

        Recipe::create([
            'title' => 'Empanadillas de carne',
            'photo' => 'nhttps://www.giulianisgrupo.com/wp-content/uploads/2018/05/nodisponible.png',
            'ingredients' => '["carne picada", "cebolla", "ajo", "huevo", "tomate", "aceite de oliva", "oregano", "comino", "pimentón molido", "masa para empanadas"]',
            'displayIngredients' => '["500 g carne picada de ternera", "1/2 kg de cebolla", "1 diente de ajo picado", "1 cebolla", "2 huevos duros", "1 lata de tomate", "aceite de oliva", "ajo molido", "orégano seco", "1 cucharadita de comino", "1 cucharadita de pimentón", "12 masa para empanadas", "1 huevo batido"]',
            'preparation' => '
            - Rehogar en una sartén la cebolla, el ajo y la cebolla de verdeo.
            - Agregar la carne picada junto al tomate en conserva.
            - Agregar la Maizena disuelta en el agua fría y cocinar por 1 minuto más.
            - Condimentar con las especias y el huevo duro.
            - Dejar reposar y enfriar. Rellenar y montar las empanadas y pintar con el huevo batido.
            - Cocinar en el horno a 200º hasta que se queden doradas.',
            'description' => 'Las empanadas criollas son uno de los platos más tradicionales de ese país.La masa de las empanadas argentinas es muy similar a nuestra receta de empanadillas, y lo que varía es el relleno, que se prepara con carne picada y diferentes especias. Estas empanadas criollas de carne picada las
            puedes preparar fritas o al horno, y en cualquiera de los dos casos están deliciosas.',
            'isChecked' => true,
        ]);

        Recipe::create([
            'title' => 'Pollo al horno',
            'photo' => 'https://static-sevilla.abc.es/media/gurmesevilla/2016/03/receta-pollo-horno-verduras.jpg',
            'ingredients' => '["pollo", "patata", "cebolla", "ajo", "pimienta negra", "prejil", "sal", "limon", "vino blanco", "aceite de oliva"]',
            'displayIngredients' => '["1 pollo entero", "2 patatas", "2 cebolletas", "1 limon", "8 dientes de ajo", "5 granos de pimienta negra", "Unas ramas de tomillo o perejil", "Sal", "3 ramas romero", "Aceite de oliva virgen"]',
            'preparation' => '
            - Precalienta el horno a 180º con calor arriba y abajo. Mientras, limpia el pollo retirando los restos de plumas y excesos de grasa.
            - Mezcla en un bol la pimienta negra y la sal con 2 cucharadas de aceite y el zumo del limón.
            - Remueve bien y una vez esté todo bien integrado, úntalo bien por todo el pollo hasta que quede bien embadurnado. Reserva el resto de mezcla para preparar su cama.
            - Corta las cebolletas en juliana y las patatas en rodajas de un centímetro. Sazona y salpimenta todo en conjunto con la mezcla que te ha sobrado.
            - Unta aceite en una bandeja de horno y coloca los trozos de cebolleta y patata por encima.
            - Remueve bien todo para que quede bien sazonado y hazle un hueco en el centro. Coloca el pollo encima e introdúcele 2 ramitas de romero, un poco de tomillo y los ajos aplastados.
            - Riega todo con un poco de agua (o si lo prefieres caldo, vino blanco o cerveza). Introdúcelo en el horno y ásalo unos 45-55 minutos aproximadamente.
            - Es importante que a mitad de cocción, remuevas la guarnición para que no se quede quede pegada o se queme.
            - Sirve el pollo asado en un plato con su guarnición. Mezcla el jugo de la bandeja de horno con perejil picado y viértelo por encima. Adorna con otra ramita de romero.
            ',
            'description' => 'Hoy toca pollo al horno para comer, una de esas comidas que gusta a toda la familia. ¿Quién no recuerda siendo pequeño esos pollos asados que preparaba tu madre o abuela y que llenaban la casa de olores increíbles…?'
            ,
            'isChecked' => true,

        ]);
    }
}
