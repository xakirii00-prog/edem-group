<?php

namespace Database\Seeders;

use App\Models\Venue;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Отель Edem
        Venue::create([
            'name' => 'Edem',
            'slug' => 'hotel-edem',
            'type' => 'hotel',
            'brand' => 'Edem',
            'description' => 'Гостиница Edem — это современный комфортабельный отель в историческом городе Туркестан, расположенный по адресу улица Кожанова, 6/1.

Мы предлагаем уютные номера различных категорий: одноместные, улучшенные двухместные и трёхместные номера. Все номера оснащены всем необходимым для комфортного проживания.

Наши гости могут воспользоваться бесплатным Wi-Fi, услугами прачечной, а также насладиться изысканными блюдами в нашем этно-ресторане Fake, расположенном в этом же здании.

Отель работает круглосуточно. Идеально подходит для туристов, посещающих мавзолей Ходжи Ахмеда Ясави и другие достопримечательности Туркестана.',
            'short_description' => 'Современная гостиница в Туркестане с рестораном Fake',
            'address' => 'Улица Кожанова, 6/1',
            'city' => 'Туркестан',
            'latitude' => 43.301314,
            'longitude' => 68.276411,
            'phone' => '+7 702 000 90 66',
            'email' => 'edem.hotel@mail.ru',
            'working_hours' => [
                'Режим работы' => 'Круглосуточно',
            ],
            'image' => 'https://i4.photo.2gis.com/photo-gallery/ac5f9f84-13b1-469f-b5b5-5fe70c0f4645.jpg',
            'gallery' => [
                'https://i4.photo.2gis.com/photo-gallery/ac5f9f84-13b1-469f-b5b5-5fe70c0f4645.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560049064191_6f19.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560049064196_9f7c.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560049064197_6da3.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560049063173_7c43.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560049063174_0e2e.jpg',
            ],
            'vr_images' => [
                'https://i4.photo.2gis.com/images/branch/0/30258560049064191_6f19.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560049064196_9f7c.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560049064197_6da3.jpg',
            ],
            'features' => ['Wi-Fi для клиентов', 'Завтрак', 'Прачечная', 'Кафе/Ресторан', 'Интернет', 'Круглосуточная рецепция'],
            'price_from' => 18000,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        // Ресторан Fake
        Venue::create([
            'name' => 'Fake',
            'slug' => 'restaurant-fake',
            'type' => 'restaurant',
            'brand' => 'Fake',
            'description' => 'Fake — это этно-ресторан при гостинице Edem в Туркестане, расположенный по адресу улица Кожанова, 6/1.

Мы предлагаем изысканную турецкую и казахскую кухню. В нашем меню вы найдёте: пиццу, шашлык, стейки, люля-кебаб, хачапури, плов, а также авторские салаты и десерты.

Особенные блюда:
• Хрустящие баклажаны с казы — 2 690 ₸
• Салат Fake — 2 590 ₸
• Микс салата с креметтой и кониной — 1 890 ₸

Средний чек: 4 500 ₸, бизнес-ланч от 3 000 ₸.

Ресторан работает ежедневно с 11:00 до 24:00. Доступна доставка и кофе с собой. Идеально подходит для романтических ужинов, деловых обедов и семейных торжеств.',
            'short_description' => 'Этно-ресторан с турецкой и казахской кухней при гостинице Edem',
            'address' => 'Улица Кожанова, 6/1',
            'city' => 'Туркестан',
            'latitude' => 43.301122,
            'longitude' => 68.276279,
            'phone' => '+7 707 774 09 09',
            'email' => 'fake.restaurant@mail.ru',
            'website' => 'https://instagram.com/fake.restaurant',
            'working_hours' => [
                'Ежедневно' => '11:00 - 24:00',
            ],
            'image' => 'https://i0.photo.2gis.com/photo-gallery/3fa55c9f-ef6d-4920-bdf6-0a1a527971ab.jpg',
            'gallery' => [
                'https://i0.photo.2gis.com/photo-gallery/3fa55c9f-ef6d-4920-bdf6-0a1a527971ab.jpg',
                'https://i0.photo.2gis.com/images/branch/0/30258560114598490_4f36.jpg',
                'https://i0.photo.2gis.com/images/branch/0/30258560114598489_9f15.jpg',
                'https://i0.photo.2gis.com/images/branch/0/30258560114598488_7aef.jpg',
                'https://i0.photo.2gis.com/images/branch/0/30258560114598487_7fa2.jpg',
                'https://i0.photo.2gis.com/images/branch/0/30258560114598486_4a8b.jpg',
            ],
            'vr_images' => [
                'https://i0.photo.2gis.com/images/branch/0/30258560114598490_4f36.jpg',
                'https://i0.photo.2gis.com/images/branch/0/30258560114598489_9f15.jpg',
                'https://i0.photo.2gis.com/images/branch/0/30258560114598488_7aef.jpg',
            ],
            'features' => ['Доставка', 'Кофе с собой', 'Заказ столиков', 'Wi-Fi', 'Оплата по QR-коду'],
            'menu_highlights' => ['Хрустящие баклажаны с казы', 'Салат Fake', 'Пицца', 'Стейки', 'Шашлык', 'Люля-кебаб', 'Хачапури', 'Плов'],
            'price_from' => 3000,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        // Wow Plov на Саттарханова
        Venue::create([
            'name' => 'WOW PLOV на Саттарханова',
            'slug' => 'wow-plov-sattarkhanova',
            'type' => 'restaurant',
            'brand' => 'Wow Plov',
            'description' => 'WOW PLOV — сеть ресторанов аутентичной восточной кухни в Туркестане. Филиал на проспекте Бекзата Саттарханова, 25/1.

Рейтинг 4.8 на основе более 1342 оценок!

Мы гордимся тем, что готовим настоящий узбекский плов по традиционным рецептам. В меню также представлены: лагман, манты, салаты, супы, бургеры, наггетсы, пельмени и многое другое.

Особое внимание уделяем маленьким гостям — у нас есть детские сеты, бургеры, наггетсы и картофель фри специально для детей!

Средний чек: 3 000 ₸. Работает доставка через Wolt.',
            'short_description' => 'Ресторан восточной кухни с рейтингом 4.8 ★',
            'address' => 'Проспект Бекзата Саттарханова, 25/1',
            'city' => 'Туркестан',
            'latitude' => 43.29459,
            'longitude' => 68.286652,
            'phone' => '+7 707 770 09 09',
            'email' => 'wow.plov@mail.ru',
            'website' => 'https://instagram.com/wow.plov',
            'working_hours' => [
                'Ежедневно' => '11:00 - 24:00',
            ],
            'image' => 'https://i4.photo.2gis.com/images/branch/0/30258560114598491_7c3f.jpg',
            'gallery' => [
                'https://i4.photo.2gis.com/images/branch/0/30258560114598491_7c3f.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560081043736_3fad.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560081043735_1f4b.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560081043734_0f7a.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560081043733_7e17.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560081043732_9a4c.jpg',
            ],
            'vr_images' => [
                'https://i4.photo.2gis.com/images/branch/0/30258560081043736_3fad.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560081043735_1f4b.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560081043734_0f7a.jpg',
            ],
            'features' => ['Доставка Wolt', 'Детское меню', 'VIP-зал', 'Wi-Fi', 'Халяльная кухня', 'Заказ навынос'],
            'menu_highlights' => ['Плов узбекский', 'Лагман', 'Манты', 'Пельмени', 'Бургеры', 'Салаты', 'Супы', 'Наггетсы', 'Детские сеты'],
            'price_from' => 3000,
            'is_active' => true,
            'sort_order' => 3,
        ]);

        // Wow Plov в TURAN Mall
        Venue::create([
            'name' => 'WOW PLOV в TURAN Mall',
            'slug' => 'wow-plov-turan-mall',
            'type' => 'restaurant',
            'brand' => 'Wow Plov',
            'description' => 'WOW PLOV в торгово-развлекательном центре TURAN Mall — филиал популярной сети ресторанов восточной кухни в Туркестане.

Рейтинг 4.9 на основе более 1399 оценок — лучший филиал сети!

Расположен в ТРЦ TURAN Mall по адресу: 160-й квартал, 417/2. Идеальное место для семейного обеда во время шопинга.

Меню включает: узбекский плов, лагман, манты, пельмени, бургеры, салаты, супы и наггетсы. Есть специальное детское меню.

Средний чек: 3 000 ₸. Работает доставка через Wolt.',
            'short_description' => 'Ресторан восточной кухни в ТРЦ TURAN Mall с рейтингом 4.9 ★',
            'address' => 'ТРЦ TURAN Mall, 160-й квартал, 417/2',
            'city' => 'Туркестан',
            'phone' => '+7 707 770 09 09',
            'email' => 'wow.plov@mail.ru',
            'website' => 'https://wolt.com/ru/kaz/turkestan/restaurant/wow-plov-turan-mall',
            'working_hours' => [
                'Ежедневно' => '10:00 - 22:00',
            ],
            'image' => 'https://i4.photo.2gis.com/images/branch/0/30258560081043980_7f1a.jpg',
            'gallery' => [
                'https://i4.photo.2gis.com/images/branch/0/30258560081043980_7f1a.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560081043979_7d45.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560081043978_8a9d.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560081043977_5a9b.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560081043976_3c8d.jpg',
            ],
            'vr_images' => [
                'https://i4.photo.2gis.com/images/branch/0/30258560081043980_7f1a.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560081043979_7d45.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560081043978_8a9d.jpg',
            ],
            'features' => ['Доставка Wolt', 'Детское меню', 'Wi-Fi', 'Халяльная кухня', 'Заказ навынос', 'В торговом центре'],
            'menu_highlights' => ['Плов узбекский', 'Лагман', 'Манты', 'Пельмени', 'Бургеры', 'Салаты', 'Супы', 'Наггетсы', 'Детские сеты'],
            'price_from' => 3000,
            'is_active' => true,
            'sort_order' => 4,
        ]);

        // Wow Plov на Әл қожа Ата
        Venue::create([
            'name' => 'WOW PLOV на Әл қожа Ата',
            'slug' => 'wow-plov-al-kozha-ata',
            'type' => 'restaurant',
            'brand' => 'Wow Plov',
            'description' => 'WOW PLOV на улице Әл қожа Ата — третий филиал популярной сети ресторанов восточной кухни в Туркестане.

Рейтинг 4.9 на основе более 1068 оценок!

Расположен по адресу: улица Әл қожа Ата, 2 к1. Уютная атмосфера и традиционный интерьер создают особую восточную атмосферу.

В меню: узбекский плов, лагман, манты, пельмени, бургеры, салаты, супы. Халяльная кухня.

Средний чек: 3 000 ₸.

Примечание: филиал временно не работает.',
            'short_description' => 'Ресторан восточной кухни с рейтингом 4.9 ★ (временно закрыт)',
            'address' => 'Улица Әл қожа Ата, 2 к1',
            'city' => 'Туркестан',
            'phone' => '+7 707 770 09 09',
            'email' => 'wow.plov@mail.ru',
            'website' => 'https://instagram.com/wow.plov',
            'working_hours' => [
                'Статус' => 'Временно не работает',
            ],
            'image' => 'https://i4.photo.2gis.com/images/branch/0/30258560049063899_8c2a.jpg',
            'gallery' => [
                'https://i4.photo.2gis.com/images/branch/0/30258560049063899_8c2a.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560049063898_7f3e.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560049063897_0a8d.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560049063896_4c1b.jpg',
            ],
            'vr_images' => [
                'https://i4.photo.2gis.com/images/branch/0/30258560049063899_8c2a.jpg',
                'https://i4.photo.2gis.com/images/branch/0/30258560049063898_7f3e.jpg',
            ],
            'features' => ['Халяльная кухня', 'Узбекская кухня', 'Заказ навынос'],
            'menu_highlights' => ['Плов узбекский', 'Лагман', 'Манты', 'Пельмени', 'Бургеры', 'Салаты', 'Супы'],
            'price_from' => 3000,
            'is_active' => false,
            'sort_order' => 5,
        ]);
    }
}
