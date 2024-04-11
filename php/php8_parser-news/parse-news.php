<?php

include('simple_html_dom/simple_html_dom.php');
$path = '/var/www/schekino/data/www/schekino.net/';

require_once($path.'wp-config.php');
require_once($path.'wp-load.php');
require_once($path.'wp-includes/wp-db.php');
require_once($path.'wp-includes/pluggable.php');
require_once($path.'wp-admin/includes/image.php');
require_once($path.'wp-admin/includes/file.php');
require_once($path.'wp-admin/includes/media.php');

class parseNews {

    public function __construct (
        private string $searchQuery = 'щекино',
        //private int $numberOfNews = 2
        ) {
    }

    private function getData(string $url) : string{
        $ch = curl_init($url);
        $content = '';
        $ch = curl_init('');
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1');
        curl_setopt($ch,CURLOPT_HEADER,false);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch,CURLOPT_AUTOREFERER,true);
        curl_setopt($ch,CURLOPT_REFERER,'');
        curl_setopt($ch,CURLOPT_TIMEOUT,30);
        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }

    public function getNews(string $baseUrl, string $siteUrl, string $pattern) : array {
        
        $content = $this->getData($siteUrl.$this->searchQuery);
        $html = new simple_html_dom();
        $html->load($content);
        
        $elements = $html->find($pattern);

        $news_links = [];

        foreach ($elements as $el){
            if (substr($el->href, 0, 4) != 'http')
                $news_links[] = $baseUrl.$el->href;
            else 
                $news_links[] = $el->href;
        }

        $html->clear(); 
        unset($html);

        return $news_links;
    }
    
    public function getDetailedNews(array $news, 
                                    string $baseUrl, 
                                    string $titlePattern, 
                                    string $contentElementsPattern, 
                                    string $imgPattern) : array {

        $item[0]['url'] = '';
        $item[0]['title'] = '';
        $item[0]['content'] = '';
        $item[0]['img'] = '';
        
        $i = 0;

        foreach ($news as $k => $url){

            $content = $this->getData($url);
            
            $html = new simple_html_dom();
            $html->load($content);
            
            // url
            $item[$i]['url'] = $url;

            // title
            $item[$i]['title'] = trim($html->find($titlePattern)[0]->innertext);

            // content elements
            $elements = $html->find($contentElementsPattern);
            $item[$i]['content'] = '';
            foreach ($elements as $el)
                $item[$i]['content'] .= $el->outertext;
            
            // img
            $img = $html->find($imgPattern);
            if (sizeOf($img) == 0)
                $img = "https://www.schekino.net/wp-content/uploads/2021/03/nophoto.jpg";
            else
                $img = $html->find($imgPattern)[0]->src;
                if (substr($img, 0, 4) != 'http')
                    $item[$i]['img'] = $baseUrl.$img;
                else
                    $item[$i]['img'] = $img;
            
            $i++;

            $html->clear();
            unset($html);

        }

        echo "Обработан источник " . $baseUrl . "\n";
        return $item;

    }

    public function setNews(array $newsDetailed) : void {
        
        global $wpdb;

        $i = 0;

        foreach ($newsDetailed as $k => $item){
            
            $uniqrowFlag = $wpdb->get_results("SELECT * FROM kl72Yui_posts WHERE post_title = '".$item["title"]."';");
            
            if (sizeOf($uniqrowFlag) > 0)
                $uniqrowFlag = false; 
            else 
                $uniqrowFlag = true;
            
            if ($uniqrowFlag) {

                $post_data = [
                    'post_title'    => $item['title'],
                    'post_content'  => $item['content']."<p>&nbsp;</p><p>Источник: <a href='".$item['url']."' title=''>".$item['url']."</a></p>",
                    'post_status'   => 'publish',
                    'post_author'   => 1,
                    'post_category' => [15]
                ];
                
                $post_id = wp_insert_post($post_data, true); 
                
                $url = $item['img'];
                $description = $item['title'];
                $file_array = array();
                $tmp = download_url($url);
                preg_match('/[^\?]+\.(jpg|jpe|jpeg|gif|png)/i', $url, $matches);
                $file_array['name'] = basename($matches[0]);
                $file_array['tmp_name'] = $tmp;
                $media_id = media_handle_sideload($file_array, $post_id, $description);
                if( is_wp_error($media_id) ) {
                    @unlink($file_array['tmp_name']);
                    echo $media_id->get_error_messages();echo "\n";
                }
                @unlink($file_array['tmp_name']);
                set_post_thumbnail($post_id, $media_id);
            
                echo "Записано в базу"."\n";

            } else {

                echo "Запись не уникальная"."\n";
                
            }

        }

    } 

    public function parse() : void {
        
        // 1. https://mktula.ru
        // get news list pattern
        $baseUrl = "https://mktula.ru";
        $siteUrl = "https://mktula.ru/search/?q=";
        $pattern = "div.search-page hr ~ a";
        // get detailed news patterns
        $titlePattern = ".content h1";
        $contentElementsPattern = ".poster_content_block p";
        $imgPattern = ".poster_content_img > img";
        // setNews
        $this->setNews($this->getDetailedNews($this->getNews($baseUrl, $siteUrl, $pattern), $baseUrl, $titlePattern, $contentElementsPattern, $imgPattern));

        // 2. https://tula.mk.ru/
        // get news list pattern
        $baseUrl = "https://www.tsn24.ru";
        $siteUrl = "https://www.tsn24.ru/search/?q=";
        $pattern = "a.catalog-card";
        // get detailed news patterns
        $titlePattern = "h1.text_block-title";
        $contentElementsPattern = ".text div[data-container='text']";
        $imgPattern = ".text_preview picture img";
        // setNews
        $this->setNews($this->getDetailedNews($this->getNews($baseUrl, $siteUrl, $pattern), $baseUrl, $titlePattern, $contentElementsPattern, $imgPattern));


        // 3. https://tula-football.ru/?s=щекино
        // get news list pattern
        $baseUrl = "https://tula-football.ru";
        $siteUrl = "https://tula-football.ru/?s=";
        $pattern = ".td-ss-main-content h3.entry-title a";
        // get detailed news patterns
        $titlePattern = "header.td-post-title h1.entry-title";
        $contentElementsPattern = ".td-post-content p";
        $imgPattern = ".td-post-featured-image > img";
        // setNews
        $this->setNews($this->getDetailedNews($this->getNews($baseUrl, $siteUrl, $pattern), $baseUrl, $titlePattern, $contentElementsPattern, $imgPattern));


        // 4. https://gazeta-schekino.ru/news/
        // get news list pattern
        $baseUrl = "https://gazeta-schekino.ru";
        $siteUrl = "https://gazeta-schekino.ru/news/?q=";
        $pattern = "a.news-list-preview__title";
        // get detailed news patterns
        $titlePattern = ".news-detail-page__title";
        $contentElementsPattern = ".news-detail-page__text";
        $imgPattern = ".news-detail-page__image-wrapper img.news-detail-page__image";
        // setNews
        $this->setNews($this->getDetailedNews($this->getNews($baseUrl, $siteUrl, $pattern), $baseUrl, $titlePattern, $contentElementsPattern, $imgPattern));


        // 5. https://www.interfax-russia.ru/search?query=щекино
        // get news list pattern
        $baseUrl = "https://www.interfax-russia.ru";
        $siteUrl = "https://www.interfax-russia.ru/search?query=";
        $pattern = "section.mb-20 a.stretched-link";
        // get detailed news patterns
        $titlePattern = "section.news-body h1";
        $contentElementsPattern = "section.news-body .editor-content";
        $imgPattern = "section.news-body div[itemprop='image'] img";
        // setNews
        $this->setNews($this->getDetailedNews($this->getNews($baseUrl, $siteUrl, $pattern), $baseUrl, $titlePattern, $contentElementsPattern, $imgPattern));


        // 6. https://tula.aif.ru/search?text=%D1%89%D0%B5%D0%BA%D0%B8%D0%BD%D0%BE
        // get news list pattern
        $baseUrl = "https://tula.aif.ru";
        $siteUrl = "https://tula.aif.ru/search?text=";
        $pattern = "section.article_list .text_box a";
        // get detailed news patterns
        $titlePattern = "section.article h1";
        $contentElementsPattern = "section.article div.article_text p";
        $imgPattern = "section.article div.img_box img";
        // setNews
        $this->setNews($this->getDetailedNews($this->getNews($baseUrl, $siteUrl, $pattern), $baseUrl, $titlePattern, $contentElementsPattern, $imgPattern));

        // 7. https://ti71.ru/search/?s=&q=%D1%89%D0%B5%D0%BA%D0%B8%D0%BD%D0%BE
        // get news list pattern
        $baseUrl = "https://ti71.ru";
        $siteUrl = "https://ti71.ru/search/?s=&q=";
        $pattern = ".search-page__list a.search-card-news";
        // get detailed news patterns
        $titlePattern = "section.news-detail h1.news-detail__title";
        $contentElementsPattern = "section.news-detail div.news-detail__detail-text p";
        $imgPattern = "section.news-detail img.detail-picture-wrap__img";
        $this->setNews($this->getDetailedNews($this->getNews($baseUrl, $siteUrl, $pattern), $baseUrl, $titlePattern, $contentElementsPattern, $imgPattern));


        // 8. https://71.xn--b1aew.xn--p1ai/search?q=%D1%89%D0%B5%D0%BA%D0%B8%D0%BD%D0%BE&group=
        // get news list pattern
        $baseUrl = "https://71.xn--b1aew.xn--p1ai";
        $siteUrl = "https://71.xn--b1aew.xn--p1ai/search?q=";
        $pattern = "div.section-list div.sl-item-title a";
        // get detailed news patterns
        $titlePattern = "div.ln-content-holder h1";
        $contentElementsPattern = "div.ln-content-holder div.article";
        $imgPattern = "div.bn-logo a img";
        $this->setNews($this->getDetailedNews($this->getNews($baseUrl, $siteUrl, $pattern), $baseUrl, $titlePattern, $contentElementsPattern, $imgPattern));
    
    }

}

// $n = new parseNews("щекино");
// $news = $n->getNews($baseUrl, $siteUrl, $pattern);
// $newsDetailed = $n->getDetailedNews($news, $baseUrl, $titlePattern, $contentElementsPattern, $imgPattern);
// $n->setNews($newsDetailed);

$n = new parseNews("щекино");
$n->parse();
unset($n);

sleep(600);

$n = new parseNews("щёкино");
$n->parse();
unset($n);

sleep(600);

$n = new parseNews("щекиноазот");
$n->parse();
unset($n);

sleep(600);

$n = new parseNews("щёкиноазот");
$n->parse();
unset($n);

sleep(600);

$n = new parseNews("щекинский район");
$n->parse();
unset($n);

sleep(600);

$n = new parseNews("щёкинский район");
$n->parse();
unset($n);

sleep(600);

$n = new parseNews("ясная поляна");
$n->parse();
unset($n);

$n = new parseNews("машей москалевой");
$n->parse();
unset($n);

$n = new parseNews("маша москалева");
$n->parse();
unset($n);

?>