<?php

include('simple_html_dom/simple_html_dom.php');
#require_once('/var/www/schekino/data/www/schekino.net/wp-config.php');
require_once('/var/www/schekino/data/www/schekino.net/wp-load.php');
require_once('/var/www/schekino/data/www/schekino.net/wp-includes/wp-db.php');
require_once('/var/www/schekino/data/www/schekino.net/wp-includes/pluggable.php');
require_once('/var/www/schekino/data/www/schekino.net/wp-admin/includes/image.php');
require_once('/var/www/schekino/data/www/schekino.net/wp-admin/includes/file.php');
require_once('/var/www/schekino/data/www/schekino.net/wp-admin/includes/media.php');

# параметры

# as_qdr=w - за последнюю неделю
# hl=ru - язык русский
# num=100 - количество результатов на странице

# запросы для поиска
# щекино, Ясная Поляна, Крапивна, Советск, Щекинский район

$sources = [];

# источники

# успешно парсятся 
$sources[0] = 'Тульская пресса (пресс';
$sources[1] = 'Тульские СМИ: 25 газет во всех районах области';
$sources[2] = 'Тульская пресса (пресс';
$sources[3] = 'Тульская служба новостей';
$sources[4] = 'Комсомольская правда';
$sources[5] = 'Моя Слобода';
$sources[6] = 'NEWS.ru';
$sources[7] = 'РИА Новости';
$sources[8] = 'МК в Туле';
$sources[9] = 'Тульский футбол (пресс';
$sources[10] = 'http://nnmsk.ru/‎';
$sources[11] = 'newstula.ru';
$sources[12] = 'Щекинский химик';
$sources[13] = 'Известия';
$sources[14] = 'Тульская пресса (пресс-релиз)';
$sources[15] = 'Комсомольская правда Тула';
$sources[16] = 'Молодой коммунар';
$sources[17] = 'Tass.ru';

# не парсятся, не работает curl();

#$sources[2] = 'Первый Тульский';
#   http://www.n71.ru/ (Сатира) (пресс
    
# Не обработал источники

#   Вести-Тула	
#   Рамблер/новости
#   Интерфакс-Недвижимость (пресс-релиз)
#   vTule.ru
#   http://www.znamyuzl.ru/
#   ИА "Вологда Регион"‎ - 6 дн. назад
#   Агентство "Москва"
#   Гудок
#   http://www.mchsmedia.ru
#   gazeta-schekino.ru

function getDetail( $url, $source, array $sources ){

# получаем страницу

    $contentPage = '';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
    curl_setopt($ch, CURLOPT_URL, $url);
    
    curl_close($ch);

    $htmlt = new simple_html_dom();
    $htmlt->load($contentPage);

    $item['news_date'] = "";
    $item['news_content'] = "";
    $item['news_full_img'] = "";

    switch ($source) {
        
        case 'Молодой коммунар':
            $item['news_date'] = $htmlt->find(".data_news p span")[0]->plaintext;
            $el = $htmlt->find(".poster_content_block p");
            foreach ($el as $it)
                $item['news_content'] .= $it->innertext;			
            if ($htmlt->find(".poster_content_img img")[0]->src)
                $item['news_full_img'] = 'https://'.substr($htmlt->find(".poster_content_img img")[0]->src,2);
            if ($htmlt->find("slide-img img")[0]->src)
                $item['news_full_img'] = 'https://'.substr($htmlt->find("slide-img img")[0]->src,2);			
            echo "Обработан источник 'Молодой коммунар'"."\n";;
            break;
                
        case 'МК в Туле':
            $item['news_date'] = $htmlt->find('span.date')[0]->plaintext;
            $el = $htmlt->find('.inread-content p');
            foreach ($el as $it)
                $item['news_content'] .= $it->innertext;
            $item['news_full_img'] = $htmlt->find(".big_image > img")[0]->src;
            echo "Обработан источник 'МК в Туле'"."\n";
            break;
            
        case 'РИА Новости':
            $item['news_date'] = $htmlt->find('.article__info-date')[0]->plaintext;
            $el = $htmlt->find('.article__block .article__text');
            foreach ($el as $it)
                $item['news_content'] .= $it->innertext;
            $item['news_full_img'] = $htmlt->find(".photoview__open > img")[0]->src;
            echo "Обработан источник 'РИА Новости'"."\n";
            break;
        
        case 'NEWS.ru':
            $item['news_date'] = $htmlt->find('.info span.hours')[0]->plaintext;
            $el = $htmlt->find('.text p');
            foreach ($el as $it)
                $item['news_content'] .= $it->innertext;
            $item['news_full_img'] = $htmlt->find("main-photo > img")[0]->src;
            echo "Обработан источник 'NEWS.ru'"."\n";
            break;
        
        case 'newstula.ru':
            #$article = $html->find('article');
            $item['news_date'] = $htmlt->find('article .pubDate')[0]->plaintext;
            $item['news_content'] = $htmlt->find('article .post-content')[0]->innertext;
            $item['news_full_img'] = $htmlt->find('article img.post-image')[0]->src;
            echo "Обработан источник 'newstula.ru'"."\n";
            break;
            
        case 'Тульская пресса (пресс':
            $item['news_date'] = $htmlt->find('.print_date_show')[0]->plaintext;
            $el = $item['news_content'] = $htmlt->find('.post p');
            foreach ($el as $it)
                $item['news_content'] .= $it->outertext;			
            $item['news_full_img'] = $htmlt->find('div.images a.fancybox')[0]->href;
            echo "Обработан источник 'Тульская пресса (пресс'"."\n";
            break;
        
        case 'Тульская пресса (пресс-релиз)':
            $item['news_date'] = $htmlt->find('.print_date_show')[0]->plaintext;
            $el = $item['news_content'] = $htmlt->find('.post p');
            foreach ($el as $it)
                $item['news_content'] .= $it->outertext;			
            $item['news_full_img'] = $htmlt->find('div.images a.fancybox')[0]->href;
            echo "Обработан источник 'Тульская пресса (пресс'"."\n";
            break;
        
        case 'Тульские СМИ: 25 газет во всех районах области':
            $item['news_date'] = $htmlt->find('.info span')[0]->plaintext;
            
            #если текст внутри <p>
            #$el = $htmlt->find(".info");
            #foreach ($el as $it)
            #	$item['news_content'] .= $it->outertext;
            
            #если текст без <p>
            $item['news_content'] = preg_replace('|[\s]+|s', ' ', $htmlt->find(".info")[0]->plaintext);
            
            $htmlt->find('.post-thumbnail a')[0]->href <> "" ? $item['news_full_img'] = 'http://tulasmi.ru'.$htmlt->find('.post-thumbnail a')[0]->href : $item['news_full_img']="";
            echo "Обработан источник 'Тульские СМИ: 25 газет во всех районах области'"."\n";
            break;		
            
        case 'http://www.n71.ru/ (Сатира) (пресс':
            $item['news_date'] = $htmlt->find('.news-item .news-date')[0]->plaintext;
            $el = $htmlt->find("div.news-content p[style='text-align: justify;']");
            foreach ($el as $it)
                $item['news_content'] .= $it->innertext;
            $item['news_full_img'] = $htmlt->find(".news-content p img")[0]->src;
            echo "Обработан источник 'http://www.n71.ru/ (Сатира) (пресс'"."\n";
            break;		
        
        case 'Первый Тульский':
            $item['news_date'] = "";
            $el = $htmlt->find(".view-content p");
            foreach ($el as $it)
                $item['news_content'] .= $it->outertext;			
            $item['news_full_img'] = $htmlt->find(".news")[0]->style;
            $item['news_full_img'] = substr($item['news_full_img'], 17);
            $item['news_full_img'] = "https://1tulatv.ru".substr($item['news_full_img'], 0, -56);
            echo "Обработан источник 'Первый Тульский'"."\n";
            break;
        
        case 'http://nnmsk.ru/‎':
            $item['news_date'] = "";
            $el = $htmlt->find(".post-single-content")[0]->innertext;
            $item['news_full_img'] = "";
            echo "Обработан источник 'http://nnmsk.ru/‎'"."\n";
            break;	
        
        case 'Тульская служба новостей':
            $item['news_date'] = "";
            $el = $htmlt->find(".detail__text p");
            foreach ($el as $it)
                $item['news_content'] .= $it->innertext;
            
            $item['news_full_img'] = 'https://www.tsn24.ru'.$htmlt->find(".detail__picture img")[0]->src;
            echo "Обработан источник 'Тульская служба новостей'"."\n";
            break;
                    
        case 'Комсомольская правда':
            $item['news_date'] = $htmlt->find(".header time > span")[0]->innertext;
            $el = $htmlt->find(".js-mediator-article p");
            foreach ($el as $it)
                $item['news_content'] .= $it->innertext;			
            $item['news_full_img'] = "";
            echo "Обработан источник 'Комсомольская правда'"."\n";;
            break;
        
        case 'Моя Слобода':
            $item['news_date'] = $htmlt->find(".authorDetails-info")[0]->innertext;
            $item['news_content'] = $htmlt->find("#mainContentFromPage")[0]->innertext;
            $item['news_full_img'] = $htmlt->find(".newsDetails img")[0]->src;
            echo "Обработан источник 'Моя Слобода'"."\n";;
            break;		
        
        case 'Тульский футбол (пресс':
            $item['news_date'] = $htmlt->find(".td-post-author-name > span")[0]->innertext;
            $el = $htmlt->find(".td-post-content p");
            foreach ($el as $it)
                $item['news_content'] .= $it->innertext;				
            $item['news_full_img'] = $htmlt->find(".td-post-featured-image img")[0]->src;
            echo "Обработан источник 'Тульский футбол (пресс'"."\n";;
            break;		
        
        case 'Щекинский химик':
            #$item['news_date'] = $htmlt->find(".td-post-author-name > span")[0]->innertext;
            $el = $htmlt->find(".paragraphs p");
            foreach ($el as $it)
                $item['news_content'] .= $it->innertext;				
            $item['news_full_img'] = $htmlt->find(".paragraphs div a")[0]->href;
            echo "Обработан источник 'Щекинский химик'"."\n";
            break;
            
        case 'Известия':
            #$item['news_date'] = $htmlt->find(".article_page__left__top__time__label div time")[0]->innertext;
            $el = $htmlt->find(".text-article__inside div div p");
            foreach ($el as $it)
                $item['news_content'] .= $it->innertext;				
            echo "Обработан источник 'Известия'"."\n";
            break;
        
        case 'Регион Online':
            #$item['news_date'] = $htmlt->find(".article_page__left__top__time__label div time")[0]->innertext;
            $el = $htmlt->find(".item-textD p");
            foreach ($el as $it)
                $item['news_content'] .= $it->innertext;				
            $item['news_full_img'] = $htmlt->find(".item-image img")[0]->src;
            echo "Обработан источник 'Регион Online'"."\n";
            break;
        
        case 'Комсомольская правда - Тула':
            #$item['news_date'] = $htmlt->find(".header time > span")[0]->innertext;
            $el = $htmlt->find(".js-mediator-article p");
            foreach ($el as $it)
                $item['news_content'] .= $it->innertext;			
            $item['news_full_img'] = 'https://'.substr($htmlt->find(".photo.fullimg img")[0]->src,2);
            
            echo "Обработан источник 'Комсомольская правда Тула'"."\n";;
            break;		
        
        
        default:
            echo "Обработан источник 'null'"."\n";;
            break;
    }		
    
    $htmlt->clear(); 
    unset($htmlt);

    return $item;

}

function setPost( array $item ){
    
    $post_data = [
        'post_title' => $item['item_title'],
        'post_content' => $item['news_content']."<p>&nbsp;</p><p>Источник: <a href='".$item['news_item_url']."' title=''>".$item['news_item_url']."</a></p>",
        'post_status' => 'publish',
        'post_author' => 1,
        'post_category' => [15]
    ];
    
    $post_id = wp_insert_post($post_data, true); 
    
    $url = $item['news_full_img'];
    $description = "Картинка для обложки";
    
    $file_array = array();
    $tmp = download_url($url);
    
    preg_match('/[^\?]+\.(jpg|jpe|jpeg|gif|png)/i', $url, $matches );
    $file_array['name'] = basename($matches[0]);
    $file_array['tmp_name'] = $tmp;
    
    $media_id = media_handle_sideload( $file_array, $post_id, $description);
    
    if( is_wp_error($media_id) ) {
        @unlink($file_array['tmp_name']);
        echo $media_id->get_error_messages();echo "\n";
    }

    @unlink( $file_array['tmp_name'] );

    set_post_thumbnail($post_id, $media_id);
    
}

#$keyword = 'Щекино';
$keyword = 'Тула';
$startUrl = 'https://newsapi.org/v2/everything?q='.$keyword.'&from=2021-08-14&to=2021-09-13&apiKey=8c583b0c32d54d6e99823f4396361053';

$contentPage = '';
$ch = curl_init($startUrl);
curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$contentPage = curl_exec($ch);
$contentPage = json_decode($contentPage, true);
curl_close($ch);

#var_dump($contentPage);
#die();

$newsapi = $contentPage["articles"];

$items = [];
$i = 0;

# Формируем массив $items
foreach ($newsapi as $key => $news){
    $items[$i]["news_item_url"] = $news["url"];
    $items[$i]["news_site_url"] = $news["source"]["name"];
    $items[$i]["item_title"] = $news["title"];
    $items[$i]["item_small_text"] = $news["description"];
    $items[$i]["item_small_image"] = $news["urlToImage"];
    $item_ext = getDetail($items[$i]["news_item_url"], $items[$i]["news_site_url"], $sources);
    $items[$i]['news_date'] = $news['publishedAt'];
    $items[$i]['news_content'] = $news['content'];
    $item_ext['news_full_img'] <> "" ? $items[$i]['news_full_img'] = $item_ext['news_full_img']:$items[$i]['news_full_img']='https://www.schekino.net/images/nophoto/nophoto.jpg';
    $i++;
}

# Пишем в базу setPost()
global $wpdb;

foreach ($items as $key => $item) {
    # Уникальность источника в списке источников
    $source_flag = in_array( $item["news_site_url"], $sources );
    # Уникальность записи в базе
    $uniqrow_flag = $wpdb->get_results("SELECT * FROM kl72Yui_posts WHERE post_title = '".$item["item_title"]."';");
    (sizeOf($uniqrow_flag) > 0)?($uniqrow_flag = false):($uniqrow_flag = true);
    # Пишем запись если уникальна в базе + уникальный источник в списк источников
    if ( $source_flag && $uniqrow_flag) {
        #setPost($item);
    } else {
        echo "Запись не уникальная"."\n";
    }
}

?>