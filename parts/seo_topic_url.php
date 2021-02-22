<!--S_E-O-->
<div class="s_e-o-div">
    <h2>文都考研课程主题页</h2>
    <article>
        <?php
        /*
         * 制作针对 链接的SEO
         * */

        $res_urls = request( // 请求数据
            $api_url.'app/list_seo_url',
            'post',
            [ // 参数
                'app_class'=> 'web',
                'user_token'=> $white_app_token,
            ],
            true
        );
        if ($res_urls['state'] == 1){

            $n_html = '';
            $a_html = '';
            $t_html = '';

            // news
            $a_news = $res_urls['content']['res_news'];
            for ($nn=0; $nn < count($a_news); $nn++){
                $info_n = $a_news[$nn];

                $n_news_info_id = $info_n['news_info_id'];
                $n_title = $info_n['title'];
                $n_href = $web_url.'detail/detail-information.php?nav=information&news_info_id='.$n_news_info_id;

                if ($n_title){
                    $n_html = $n_html.'<a '.$a_spider_state.' class="" href="'.$n_href.'" target="_blank" title="'.$n_title.'">'.$n_title.'</a>'.PHP_EOL;
                }

            }
            $n_html = $n_html.PHP_EOL;

            // ask
            $a_ask = $res_urls['content']['res_ask'];
            for ($na=0; $na < count($a_ask); $na++){
                $info_a = $a_ask[$na];

                $a_ask_question_id = $info_a['ask_question_id'];
                $a_ask_title = $info_a['ask_title'];
                $a_href = $web_url.'detail/detail-community.php?nav=ask&ask_question_id='.$a_ask_question_id;

                if ($a_ask_title){
                    $a_html = $a_html.'<a '.$a_spider_state.' class="" href="'.$a_href.'" target="_blank" title="'.$a_ask_title.'">'.$a_ask_title.'</a>'.PHP_EOL;
                }

            }
            $a_html = $a_html.PHP_EOL;

            // topic
            $a_topic = $res_urls['content']['res_topic'];
            for ($nt = 0; $nt < count($a_topic); $nt++) {
                $info_t = $a_topic[$nt];

                $t_title = $info_t['title'];
                $t_url = $info_t['url'];

                if ($t_title && $t_url){
                    $t_html = $t_html.'<a rel="external" class="" href="'.$t_url.'" target="_blank" title="'.$t_title.'">'.$t_title.'</a>'.PHP_EOL;
                }

            }
            $t_html = $t_html.PHP_EOL;

            echo "<p>{$n_html}</p><p>{$a_html}</p><p>{$t_html}</p>";

        }else{
            echo '<div class="tpl-error-div">（request模板渲染无数据）</div>';
        }

        ?>
    </article>
</div>
