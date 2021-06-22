<?php

use App\Map;
use App\User;
use App\Attraction;
use App\AttractionTime;
use App\AttractionImage;
use App\AttractionPosition;
use Illuminate\Database\Seeder;

class AmigoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
                'name' => 'Amigo',
                'email' => "Amigo@gmail.com",
                'role' => 'Traveler',
                'password' => bcrypt('a')
            ]);
        Map::create(['name'=>'España','user_id'=>$user->id]);

        // 番茄節
        $attraction = Attraction::create([
            'name' =>'蕃茄節 （La Tomatina）',
            'website' => 'http://www.thetasteofspain.com/spanish-fiestas/la-tomatina/',
            'tel' =>' ',
            'description' =>'每年八月的最後一個週三，是瓦倫西亞自治區的布紐爾（Buñol）小鎮最舒壓的節日 -- 蕃茄節 （La Tomatina）。 買票入場的參與者們在收到開始的信號後，可以拿起熟透的番茄互相投擲、提起「手打番茄汁」水盆互相潑撒。每年約有40,000名參與者使用超過一噸的番茄一同歡度這個節慶。扔番茄活動大約持續一小時，熟透的番茄將整個城鎮廣場和街道染成紅色小川，甚至可看到許多參與者放鬆地徜徉在這片番茄海中。
            結束後政府會出動消防隊協助清理一地泥濘，令人意外的是，經過番茄洗禮的街道，反而會因為其中的檸檬酸成分，而看起來比原來更加乾淨。',
            'ticket_info' => '門票15美元，坐卡車1126美元',
            'traffic_info' =>  ' ',
            'parking_info' =>  ' ',
            'user_id' => $user->id,
        ]);

        AttractionPosition::create([
            'country' => '西班牙',
            'region' => 'Valencia',
            'town' => 'Buñol',
            'address' => 'Calle Cid, 20, 46360 Buñol, Valencia',
            'lat' => '39.41816198407957',
            'lng' =>  '-0.7905611002884262',
            'attraction_id' => $attraction->id,
        ]);

        AttractionTime::create([
            'startDate' => '2021/8/25',
            'start_year' => '2021',
            'start_month' => '8',
            'start_day' => '25',
            'endDate' => '2021/8/25',
            'end_year' => '2021',
            'end_month' => '8',
            'end_day' => '25',
            'attraction_id' => $attraction->id
        ]);
        
        for($i=1;$i<=3; $i++) {
            AttractionImage::create([
                'url' => '/storage/demo/La_Tomatina_1.jpeg',
                'image_desc' =>  '',
                'attraction_id' => $attraction->id
            ]);
        }

        // user attraction關聯
        $user_id = App\User::where('id',$user->id)->get()->first();
        $attraction->users()->attach($user_id);

        // map關聯
        $map_espana = App\Map::where('name','España')->get()->first();
        $attraction->maps()->attach($map_espana);

        // tags關聯
        $tag_One =App\Tag::where('name','節慶')->get()->first();
        $attraction->tags()->attach($tag_One);


        // 巴塞隆納春之聲 (Primavera Sound) 
        $attraction = Attraction::create([
            'name' =>'巴塞隆納春之聲 (Primavera Sound) ',
            'website' => 'https://www.primaverasound.com/ca',
            'tel' =>' ',
            'description' =>'巴塞隆納春之聲從2001年開始舉辦，現已是西班牙及南歐人最重要的音樂節。通常舉辦於五月底至六月初的巴塞隆納 (Primavera Sound Barcelona) 論壇公園 (Parc del Fòrum)，每年都吸引超過20萬名觀眾前往一飽耳福。因回響熱烈，現在也可以在葡萄牙的波多 (NOS Primavera Sound Porto) 參與春之聲音樂祭典。
            巴塞隆納春之聲的音樂類型豐富，從搖滾、流行、嘻哈、電子樂……。也曾四年邀請台灣樂團前往表演，包括:「漂流出口」、The Fur.、「雷擎」、「落差草原」、Meuko! Meuko!及「血肉果汁機」，將台灣音樂帶往國際舞台，在西班牙及南歐形成一股小旋風。也是少數能在國外聽到台灣音樂的音樂活動。',
            'ticket_info' => 'https://www.primaverasound.com/es/barcelona/primavera-pro',
            'traffic_info' =>  'https://www.primaverasound.com/ca/barcelona/how-to-arrive-primavera-sound-barcelona',
            'parking_info' =>  ' ',
            'user_id' => $user->id,
        ]);

        AttractionPosition::create([
            'country' => '西班牙',
            'region' => 'Barcelona',
            'town' => 'Sant Adrià de Besòs',
            'address' => 'Carrer de la Pau, 12, 08930 Sant Adrià de Besòs, Barcelona',
            'lat' => '41.411346729471944',
            'lng' =>  '2.2246362402514763',
            'attraction_id' => $attraction->id,
        ]);

        AttractionTime::create([ 
            'startDate' => '2021/6/2',
            'start_year' => '2021',
            'start_month' => '6',
            'start_day' => '2',
            'endDate' => '2021/6/4',
            'end_year' => '2021',
            'end_month' => '6',
            'end_day' => '4',
            'attraction_id' => $attraction->id
        ]);
        
        AttractionImage::create([
            'url' => '/storage/demo/Primavera_Sound.jpg',
            'image_desc' =>  '',
            'attraction_id' => $attraction->id
        ]);

        // user attraction關聯
        $user_id = App\User::where('id',$user->id)->get()->first();
        $attraction->users()->attach($user_id);

        // map關聯
        $map_espana = App\Map::where('name','España')->get()->first();
        $attraction ->maps()->attach($map_espana);

        // tags關聯
        $tag_One =App\Tag::where('name','音樂')->get()->first();
        $attraction->tags()->attach($tag_One);

        // 科爾多瓦庭院節（El Festival de Patios）
        $attraction = Attraction::create([
            'name' =>'科爾多瓦庭院節（El Festival de Patios）',
            'website' => 'https://patios.cordoba.es/es/patios',
            'tel' =>' ',
            'description' =>'西班牙南部的科爾多瓦氣候炎熱，從古羅馬時期，人們就積極修築庭院、種植各式植物減緩炎熱所帶來的不適，後來摩爾人傳入阿拉伯文化，將各式花草帶進這座小鎮，讓科爾多瓦的庭院越發美不勝收。
            每年四五月，是科爾多瓦即將開始炎熱起來的時間，這時候平均溫度約30度，也是最適合旅人來拜訪的日子。在庭院節期間，鎮上會安排許多民俗表演，例如:佛朗明哥舞及樂團演出，小鎮裡的住戶則會在門前掛上「patio」的牌子˙，表示歡迎路過的人們入內欣賞主人精心設計及照顧的庭院，在炎熱的南歐享受被花草沖涼的舒適感。熱情的主人也會在家中準備冷湯或飲料，供旅人消暑。阿米狗最喜歡這個活動的地方，就是能和當地人深入交流，炎炎夏日，聽著庭院主人分享侍弄花草的心得，聊聊異國文化，搭配滿園的花草與手中的冷飲，不就是最理想的南歐度假行程嗎?',
            'ticket_info' => 'Free',
            'traffic_info' =>  'https://patios.cordoba.es/es/patios',
            'parking_info' =>  ' ',
            'user_id' => $user->id,
        ]);

        AttractionPosition::create([
            'country' => '西班牙',
            'region' => 'Córdoba',
            'town' => 'Gome',
            'address' => 'Plaza de Don Gome, 2, 14001 Córdoba',
            'lat' => '37.88892567990163',
            'lng' =>  '-4.773972357977273',
            'attraction_id' => $attraction->id,
        ]);

        AttractionTime::create([
            'startDate' => '2021/5/13',
            'start_year' => '2021',
            'start_month' => '5',
            'start_day' => '13',
            'endDate' => '2021/5/16',
            'end_year' => '2021',
            'end_month' => '5',
            'end_day' => '16',
            'attraction_id' => $attraction->id
        ]);
        
        for($i=1;$i<=3; $i++) {
            AttractionImage::create([
                'url' => '/storage/demo/El_Festival_de_Patios_1.jpg',
                'image_desc' =>  '',
                'attraction_id' => $attraction->id
            ]);
        }

        // user attraction關聯
        $user_id = App\User::where('id',$user->id)->get()->first();
        $attraction->users()->attach($user_id);

        // map關聯
        $map_espana = App\Map::where('name','España')->get()->first();
        $attraction ->maps()->attach($map_espana);

        // tags關聯
        $tag_One =App\Tag::where('name','景點')->get()->first();
        $attraction->tags()->attach($tag_One);

         // 法雅節（Las Fallas）
         $attraction = Attraction::create([
            'name' =>'法雅節（Las Fallas）',
            'website' => 'https://www.visitvalencia.com/en/events-valencia/festivities/the-fallas',
            'tel' =>' ',
            'description' =>'法雅節（Fallas Festivity）是瓦倫西亞人用來慶祝春天到來的傳統節慶。其中最具特色的是法雅（Falla） — 一種由數個尼諾（ninot）人偶組成的人偶巨塔。這些人偶出自當地工匠之手，通常工匠們會用幽默的方式融入諷刺社會或評論時事的議題進入人偶設計中，藉此紓發對教堂權威、政府重稅的不滿，因此，在人偶中發現當地政治人物的影子可說是司空見慣。其實法雅一開始是木匠們用來照明的燈，但居民們相信有精靈喜歡躲藏在舊物之中，為了驅逐老舊物品中的精靈，居民會在聖約翰日將舊家具、用品燒毀，但後來人們漸漸開始裝飾這些燈，也才有了現在多樣炫麗的法雅。這也是節日最後一天要燒毀所有法雅的原因之一。
            人偶們從法雅節的第一天開始豎立在廣場中，最後一天則會被燒毀。此舉象徵春天來臨，大地將煥然一新，期許能朝氣蓬勃地迎接新的開始。節日期間當然少不了裝扮遊行、美食美酒與煙火表演。法雅節的另一大亮點，就是法雅皇后比賽。在遊行期間，眾人都會穿著18世紀風格的瓦倫西亞絲綢服裝，並舉行聖母獻花的儀式。評審趁此時機觀察，票選出今年的法雅皇后，皇后的評比是依照服裝的材質，以及候選人舉手投足散發出來的氣質，而非身材與臉蛋。另外當然還有法雅人偶的造型等各項評比。
            法雅節可以說是全球最大的玩火慶典，不只是西班牙，阿根廷及其他共160多個城市都會在每年的3月14~3月19日間歡慶春天的到來，法雅節甚至在2016年被列入聯合國教科文組織無形文化遺產中。由此可知其重要性。是許多人心目中一生一定要去參與一次的文化慶典。',
            'ticket_info' => 'Free',
            'traffic_info' =>  'https://patios.cordoba.es/es/patios',
            'parking_info' =>  ' ',
            'user_id' => $user->id,
        ]);

        AttractionPosition::create([
            'country' => '西班牙',
            'region' => 'Spain',
            'town' => 'València',
            'address' => 'Museu Faller de València, Spain',
            'lat' => '39.45916929893879',
            'lng' =>  '-0.3589415291226534',
            'attraction_id' => $attraction->id,
        ]);

        AttractionTime::create([
            'startDate' => '2021/3/15',
            'start_year' => '2021',
            'start_month' => '3',
            'start_day' => '15',
            'endDate' => '2021/3/19',
            'end_year' => '2021',
            'end_month' => '3',
            'end_day' => '19',
            'attraction_id' => $attraction->id
        ]);
        
        for($i=1;$i<=3; $i++) {
            AttractionImage::create([
                'url' => '/storage/demo/Las_Fallas_1.jpg',
                'image_desc' =>  '',
                'attraction_id' => $attraction->id
            ]);
        }

        // user attraction關聯
        $user_id = App\User::where('id',$user->id)->get()->first();
        $attraction->users()->attach($user_id);

        // map關聯
        $map_espana = App\Map::where('name','España')->get()->first();
        $attraction ->maps()->attach($map_espana);

        // tags關聯
        $tag_One =App\Tag::where('name','節慶')->get()->first();
        $attraction->tags()->attach($tag_One);

        // 奔牛節(La Tomatina)
        $attraction = Attraction::create([
            'name' =>'奔牛節(La Tomatina)',
            'website' => 'https://www.visitvalencia.com/en/events-valencia/festivities/the-fallas',
            'tel' =>' ',
            'description' =>'說到西班牙節慶，肯定第一個想到無人不知無人不曉的奔牛節！潘普洛納的奔牛活動，總長其實只有826公尺，節慶中每一頭重約500公斤，時速約24公里的公牛只需要幾分鐘就可以跑完全程，其實並不長，所以奔牛環節也總是在幾分鐘內結束，卻是整個節慶中受傷率最高的時刻。通常在慶典期間，每天都會放出六頭公牛、六頭閹牛，讓參與奔牛的挑戰者們站進事先圈好的舊城區街道中一同奔跑。為了紀念當地的守護神「聖佛明」，奔牛節正式正名為「聖佛明節」(San Fermín)。希望透過這個節慶，將男子不畏死亡的英勇精神一代又一代的傳承下去。
            官方表示，奔牛活動進行通常只有2-6分鐘，晚上六點半眾人會聚集到全西班牙第二大鬥牛場 — 潘普洛納鬥牛場，觀賞鬥牛士與公牛的對決，下午的活動就是酒精、遊行、摸彩、旋轉木馬和摩天輪等狂歡行程。
            根據記載，奔牛節從公元1591流傳至今，已有430年歷史。奔牛及鬥牛場面驚心動魄，令人繃緊神經，稍有不甚便可能在公牛身前一命嗚呼。為何400年來西班牙人甘於冒險，將個人安全放在一旁，也要堅守這項傳統? 除了彰顯男子氣概外，是不是有更重要的精神，隱藏在這看似血氣方剛的傳統儀式之中? 這些問題，也只能留待各位旅人們出發冒險，在沿途風光中尋找解答。'.'1.著規定服裝:一定要穿白襯衫、白褲子，戴上紅圍巾和紅腰帶。這是約定俗成的裝扮，不一定要完全一樣，但如果自己穿T恤牛仔褲或洋裝的話是會被禁止靠近的。

            2.不要觸碰到牛:奔牛是一項展示勇氣的運動。奔牛的目標是和牛一起奔跑，不是碰觸或激怒牛。參與者們要在公牛前面奔跑，而這只是幾十秒的時間。拍打牛身、觸摸牛角、拉扯牛尾不僅是對當地群眾、法律的侮辱，對自身來說也是非常危險的，因為這樣做會分散公牛的注意力，把你當做攻擊目標。
            
            3.禁止自拍:相機不許攜入奔牛場，若在奔牛場地上自拍會被取消奔牛資格並被警察逮捕。',
            'ticket_info' => 'Free',
            'traffic_info' =>  'https://patios.cordoba.es/es/patios',
            'parking_info' =>  ' ',
            'user_id' => $user->id,
        ]);

        AttractionPosition::create([
            'country' => '西班牙',
            'region' => 'Pamplona',
            'town' => 'Ejército',
            'address' => 'Av. del Ejército, 1, 31001 Pamplona',
            'lat' => '39.45916929893879',
            'lng' =>  '-0.3589415291226534',
            'attraction_id' => $attraction->id,
        ]);

        AttractionTime::create([
            'startDate' => '2021/7/6',
            'start_year' => '2021',
            'start_month' => '7',
            'start_day' => '6',
            'endDate' => '2021/7/14',
            'end_year' => '2021',
            'end_month' => '7',
            'end_day' => '14',
            'attraction_id' => $attraction->id
        ]);
        
        for($i=1;$i<=3; $i++) {
            AttractionImage::create([
                'url' => '/storage/demo/La_Tomatina _1.jpg',
                'image_desc' =>  '',
                'attraction_id' => $attraction->id
            ]);
        }

        // user attraction關聯
        $user_id = App\User::where('id',$user->id)->get()->first();
        $attraction->users()->attach($user_id);

        // map關聯
        $map_espana = App\Map::where('name','España')->get()->first();
        $attraction ->maps()->attach($map_espana);

        // tags關聯
        $tag_One =App\Tag::where('name','節慶')->get()->first();
        $attraction->tags()->attach($tag_One);

    }
}
